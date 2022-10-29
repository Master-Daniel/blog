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
                                        <h2 class="nk-block-title fw-normal col-lg-10">Category List</h2>
                                        <a href="javascript:void(0)" class="btn btn-icon btn-trigger toggle-expand mr-n1" data-target="pageMenu"><em class="icon ni ni-more-v"></em></a>
                                        <div class="toggle-expand-content" data-content="pageMenu">
                                            <ul class="nk-block-tools g-3">
                                                <li class="nk-block-tools-opt"><a href="javascript:void(0)" class="btn btn-primary" id="create_new_category"><em class="icon ni ni-plus"></em><span>Create Category</span></a></li>
                                            </ul>
                                        </div>
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
                                            <table class="datatable-init nowrap table">
                                                <thead>
                                                    <tr>
                                                        <th>S/N</th>
                                                        <th>Category Name</th>
                                                        <th>Category Slug</th>
                                                        <th>Category Image</th>
                                                        <th>Category Type</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($categories as $category)
                                                        <tr>
                                                            <td>{{ $category->id }}</td>
                                                            <td>{{ ucwords($category->category_name) }}</td>
                                                            <td>{{ $category->category_slug }}</td>
                                                            <td>{{ $category->category_image }}</td>
                                                            <td>{{ $category->category_type }}</td>
                                                            <td>
                                                                <button class="btn btn-danger btn-sm" id="delete_category" data-id="{{ $category->id }}">Delete</button>
                                                                <button class="btn btn-info btn-sm" id="edit_category" data-id="{{ $category->id }}">Edit</button>
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