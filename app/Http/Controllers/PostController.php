<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\MostReadPost;
use App\Models\Post;
use App\Models\PushSubscriber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Minishlink\WebPush\Subscription;
use Minishlink\WebPush\WebPush;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Post List';
        $posts = Post::select('*')->get();
        return view('admin.post_list', compact('title', 'posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Create New Post';
        $categories = Category::select('*')->get();
        return view('admin.create_post', compact('title', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'post_title' => 'required|string',
            'post_summary' => 'required|string',
            'post_category' => 'required|string',
            'file' => 'required|mimes:png,jpg,jpeg',
            'post_body' => 'required|string',
            'post_tags' => 'required|string',
            'post_section' => 'required|string'
        ]);

        try {

            $file = $request->file('file');
            $fileName = time() .'.'.$file->getClientOriginalExtension();
            $file->move(public_path('uploads'), $fileName);

            Post::create([
                'post_title' => $request->post_title,
                'post_summary' => $request->post_summary,
                'post_slug' => strtolower(str_replace(' ', '-', strip_tags(stripslashes(trim(strip_tags($request->post_title)))))),
                'post_category' => $request->post_category,
                'post_sub_category' => $request->post_sub_category,
                'post_image' => $fileName,
                'post_tags' => $request->post_tags,
                'post_body' => $request->post_body,
                'post_section' => $request->post_section
            ]);

            $message = json_encode([
                'title' => $request->post_title,
                'body' => $request->post_summary,
                'icon' => '',
                'badge' => url('/') . public_path('uploads') . $fileName,
                'extraData' => url('/') . '/posts/details/'. strtolower(str_replace(' ', '-', strip_tags(stripslashes(trim(strip_tags($request->post_title)))))),
            ]);

            $subscribers = PushSubscriber::where('expirationTime', '0')->get();
            if ($subscribers) {
                $auth = [
                    'VAPID' => [
                        'subject' => 'mailto: <masterdaniel@elitecodec.com.ng>', // can be a mailto: or your website address
                        'publicKey' => env('PUBLIC_NOTIFICATION_KEY'), // (recommended) uncompressed public key P-256 encoded in Base64-URL
                        'privateKey' => env('PRIVATE_NOTIFICATION_KEY'), // (recommended) in fact the secret multiplier of the private key encoded in Base64-URL
                    ],
                ];

                $push = new WebPush($auth);

                foreach ($subscribers as $subscriber) {
                    $subscription = Subscription::create([
                        "endpoint" => $subscriber->endpoint,
                        "keys" => [
                            'p256dh' => $subscriber->p256dh,
                            'auth' => $subscriber->authKey
                        ]
                    ]);
                    $push->queueNotification($subscription, $message);
                }

                foreach ($push->flush() as $report) {
                    $endpoint = $report->getRequest()->getUri()->__toString();
                    if ($report->isSuccess()) {
                        return redirect()->back()->with(['success' => 'Post created successfully and notification sent to subscribers. View post list to publish post']);
                    } else {
                        Log::error("Unable to send notification for {$endpoint}: {$report->getReason()}");
                        return redirect()->back()->with(['success' => 'Post created successfully. Unable to send notification. view post list to publish post']);
                        echo "Message failed to sent for {$endpoint}: {$report->getReason()}.<br>";
                    }
                }
            }
            return redirect()->back()->with(['success' => 'Post created successfully view post list to publish post']);
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            return redirect()->back()->withErrors('Unable to create post');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post, $slug)
    {
        try {
            $post_details = $post::where('post_slug', $slug)->get()->first();
            $title = ucwords($post_details->post_title);
            $categories = Category::select('*')->get();
            $most_reads = MostReadPost::select('*')->get();
            $posts = Post::where([['post_status', '1'], ['post_section', 'featured']])->orderBy(DB::raw('RAND()'))->Limit(2)->get();
            return view('single-post', compact('title', 'post_details', 'categories', 'most_reads', 'posts'));
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            return abort('404');
        }
    }

    public function search(Request $request) {
        try {
            $search = Post::where('post_title', 'LIKE', '%'.$request->search.'%')->get();
            $title = $request->search;
            $posts = Post::select('*')->get();
            $most_reads = MostReadPost::select('*')->get();
            $categories = Category::select('*')->get();
            return view('search', compact('title', 'posts', 'search', 'categories', 'most_reads'));
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            abort('404');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post, $id)
    {
        try {
            $edit = $post::where('id', $id)->first();
            return response()->json(['post' => $edit], 200);
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            return response()->json(['message' => 'Unable to find post'], 401);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'post_title' => 'required|string',
            'post_summary' => 'required|string',
            'post_slug' => 'required|string',
            'post_category' => 'required|string',
            'post_sub_category' => 'required|string',
            'post_image' => 'required|string',
            'post_body' => 'required|string',
            'post_section' => 'required|string'
        ]);

        try {
            $post::where('id', $request->post)->update([
                'post_title' => $request->post_title,
                'post_summary' => $request->post_summary,
                'post_slug' => $request->post_slug,
                'post_category' => $request->post_category,
                'post_sub_category' => $request->post_sub_category,
                'post_images' => $request->post_image,
                'post_body' => $request->post_body,
                'post_section' => $request->post_section,
            ]);
            return response()->json(['message' => 'Post Updated Successfully'], 200);
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            return response()->json(['message' => 'An error occured'], 401);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post, $id)
    {
        try {
            $post::destroy($id);
            return response()->json(['message' => 'Post Deleted'], 200);
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            return response()->json(['message' => 'An error occured'], 401);
        }
    }
}
