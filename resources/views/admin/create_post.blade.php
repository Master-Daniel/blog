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
                                        <h2 class="nk-block-title fw-normal col-lg-10">Add New Post</h2>
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
                                            <div class="nk-block nk-block-lg">
                                                <form action="{{ route('create.post') }}" id="post_form" method="post" enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="nk-block-head">
                                                        <div class="nk-block-head-content">
                                                            <h4 class="title nk-block-title">Enter Post Details</h4>
                                                        </div>
                                                    </div>
                                                    <div class="card">
                                                        <div class="form-group">
                                                            <label for="post_title">Post Title</label>
                                                            <input type="text" class="form-control" id="post_title" value="{{ old('post_title') }}" name="post_title" placeholder="Enter Post Title" />
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="post_summary">Post Summary</label>
                                                            <textarea id="post_summary" name="post_summary" cols="30" rows="5" class="form-control">{{ old('post_summary') }}</textarea>
                                                            <div id="count">Characters: 255</div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="post_body">Enter Post</label>
                                                            <textarea rows="20" name="post_body" class="form-control tinymce-basic">{{ old('post_body') }}</textarea>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-6 form-group">
                                                                <label for="post_category">Post Category</label>
                                                                <select name="post_category" data-search="on" id="post_category" class="form-control form-select">
                                                                    @foreach ($categories as $category)
                                                                        <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="col-6 form-group">
                                                                <label for="post_sub_category">Post Sub-Category</label>
                                                                <select name="post_sub_category" data-search="on" id="post_sub_category" class="form-control form-select">
                                                                    
                                                                </select>
                                                            </div>
                                                            <div class="col-6 form-group">
                                                                <label for="post_date">Post Date</label>
                                                                <input type="text" name="post_date" value="{{ old('post_date') }}" id="date" class="form-control date-picker">
                                                            </div>
                                                            <div class="col-6 form-group">
                                                                <label for="post_tags">Post Tags</label>
                                                                <input type="text" name="post_tags" value="{{ old('post_tags') }}" data-role="tagsinput" id="post_tags" class="form-control" placeholder="Enter tags seperated by comma (,)">
                                                            </div>
                                                            <div class="col-6 form-group">
                                                                <select name="post_section" id="section" class="form-select form-control">
                                                                    <option selected disabled>Select Section</option>
                                                                    <option value="top">Top</option>
                                                                    <option value="hero">Hero</option>
                                                                    <option value="recent">Recent Post</option>
                                                                    <option value="featured">Featured Post</option>
                                                                </select>
                                                            </div>
                                                            <div class="col-6">
                                                                <label for="file" class="custom-file-label">Upload Post Image</label>
                                                                <input type="file" id="file" name="file">
                                                            </div>
                                                        </div>
                                                        <button type="submit" id="" class="btn btn-primary btn-block mt-5">Add Post</button>
                                                    </div>    
                                                </form>
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
    </div>
@endsection