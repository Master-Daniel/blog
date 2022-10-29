<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\MostReadPost;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\PushSubscriber;
use Illuminate\Support\Facades\Log;

class pagesController extends Controller
{
    public function home() {
        $title = 'Welcome';
        $posts = Post::where('post_status', '1')->orderBy(DB::raw('RAND()'))->get();
        $most_reads = MostReadPost::select('*')->get();
        $categories = Category::select('*')->get();
        return view('welcome', compact('title', 'posts', 'most_reads', 'categories'));
    }

    public function contact() {
        $title = 'Contact';
        $categories = Category::select('*')->get();
        return view('contact', compact('title', 'categories'));
    }

    public function single_post() {
        $title = 'Single Post';
        return view('single-post', compact('title'));
    }

    public function single_post_let() {
        $title = 'Let There Be Peace';
        return view('let-there-be-peace', compact('title'));
    }

    public function single_post_law() {
        $title = 'How A Case of Forgery is Grounded in Law';
        return view('case-forgery', compact('title'));
    }

    public function nightmare_begun() {
        $title = 'OMO-AGEGE\'S NIGHTMARE HAS JUST BEGUN';
        return view('nightmare', compact('title'));
    }

    public function political_career() {
        $title = 'Sheriff Oborevwori Political Career';
        return view('political-career', compact('title'));
    }

    public function subscription(Request $request) {
        try {
            if (is_array($request->all()['subscription']) && isset($request->all()['subscription']['endpoint'])) {
                $subscriber = PushSubscriber::where('endpoint', $request->all()['subscription']['endpoint'])->first();
                $time = $request->all()['subscription']['expirationTime'] ? $request->all()['subscription']['expirationTime'] : 0;
                if (!$subscriber) {
                    PushSubscriber::create([
                        'endpoint' => $request->all()['subscription']['endpoint'],
                        'expirationTime' => $time,
                        'p256dh' => $request->all()['subscription']['keys']['p256dh'],
                        'authKey' => $request->all()['subscription']['keys']['auth'],
                    ]);
                } else {
                    PushSubscriber::where('endpoint', $request->all()['subscription']['endpoint'])->update([
                        'endpoint' => $request->all()['subscription']['endpoint'],
                        'expirationTime' => $time,
                        'p256dh' => $request->all()['subscription']['keys']['p256dh'],
                        'authKey' => $request->all()['subscription']['keys']['auth'],
                    ]);
                }
            }
            return response()->json(['status' => 'ok'], 200);
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            return response()->json(['status' => 'error'], 400);
        }
    }

}