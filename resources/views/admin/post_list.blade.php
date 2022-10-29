@extends('layout.app')

@section('content')
    @include('admin.navigation')
    <div class="nk-wrap">
        @include('admin.top_bar')
        <div class="nk-content ">
            <div class="container-fluid">
                <div class="nk-content-inner">
                    <div class="nk-content-body">
                        <div class="components-preview wide-md mx-auto">
                            <div class="nk-block-head">
                                <div class="nk-block-head-content">
                                    <div class="nk-block-head-sub"><a class="back-to" onclick="window.history.back()" href="javascript:void(0)"><em class="icon ni ni-arrow-left"></em><span>Back</span></a></div>
                                    <div class="toggle-wrap nk-block-tools-toggle" style="display: inline-flex; width: 100% !important">
                                        <h2 class="nk-block-title fw-normal col-lg-10">Post List</h2>
                                    </div>
                                </div>
                            </div>
                            <div class="nk-block nk-block-lg">
                                <div class="card card-preview">
                                    <div class="card-inner">
                                        <div class="preview-block">
                                            @if ($errors->any())
                                                @foreach ($errors->all() as $error)
                                                    <script>
                                                        window.EliteCodec.Toast(`<h5>Error!</h5><p>{{ $error }}</p>`, "error", { position: "top-right" })
                                                    </script>
                                                @endforeach
                                            @endif
                                            @if (session()->has('success'))
                                                <script>
                                                    window.EliteCodec.Toast(`<h5>Success</h5><p>{{ session()->get('success') }}</p>`, "success", { position: "top-right" })
                                                </script>
                                            @endif
                                            <table class="datatable-init nowrap table">
                                                <thead>
                                                    <tr>
                                                        <th>S/N</th>
                                                        <th>Post Title</th>
                                                        <th>Post Category</th>
                                                        <th>Post Sub-Category</th>
                                                        <th>Post Tags</th>
                                                        <th>Publish Status</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($posts as $post)
                                                        <tr>
                                                            <td>{{ $post->id }}</td>
                                                            <td>{{ ucwords($post->post_title) }}</td>
                                                            <td>{{ fetch_category($post->post_category)->category_name }}</td>
                                                            <td></td>
                                                            <td>
                                                                @php
                                                                    $tags = explode(',', $post->post_tags);
                                                                @endphp
                                                                @foreach ($tags as $tag)
                                                                    {{ '#'.$tag }}
                                                                @endforeach
                                                            </td>
                                                            <td>
                                                                @switch($post->post_status)
                                                                    @case(1)
                                                                        <span class="badge badge-success">Published</span>
                                                                        @break
                                                                
                                                                    @default
                                                                    <span class="badge badge-info">Unpublished</span>
                                                                @endswitch
                                                            </td>
                                                            <td>
                                                                <button type="button" class="btn btn-sm btn-danger" id="delete_post" data-id="{{ $post->id }}"><em class="icon ni ni-trash"></em> Delete</button>
                                                                <a href="/store/drug/restock/{{ $post->id }}" class="btn btn-sm btn-primary" id="edit"><em class="icon ni ni-edit-alt"></em> Edit</a>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection