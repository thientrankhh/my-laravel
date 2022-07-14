@extends('admin.layouts.master')

@section('title')
    List Posts
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div>
                <h4 class="float-left">Posts</h4>
                <a href="#" type="submit" class="btn btn-success float-right" data-title="Create" data-toggle="modal"
                   data-target="#create">
                    Create
                </a>
            </div>

            <div class="table-responsive">
                <table id="mytable" class="table table-bordred table-striped">
                    <thead>
                        <th><input type="checkbox" id="checkall"/></th>
                        <th>STT</th>
                        <th>Name</th>
                        <th>Category</th>
                        <th>Description</th>
                        <th>Slug</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </thead>
                    <tbody>
                    @foreach($posts as $key => $post)
                        <tr>
                            <td><input type="checkbox" class="checkthis"/></td>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $post->name }}</td>
                            <td>{{ $post?->category ? $post->category->name : "" }}</td>
                            <td>{{ $post->description }}</td>
                            <td>{{ $post->slug }}</td>
                            <td>
                                <p data-placement="top" data-toggle="tooltip" title="Edit">
                                    <button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal"
                                            data-target="#edit-{{ $post->id }}"><span
                                            class="glyphicon glyphicon-pencil"></span>
                                    </button>
                                    @include('admin.partials.edit.edit-post')
                                </p>
                            </td>
                            <td>
                                <p data-placement="top" data-toggle="tooltip" title="Delete">
                                    <button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal"
                                            data-target="#delete">
                                        <span class="glyphicon glyphicon-trash"></span>
                                    </button>
                                    @include('admin.partials.delete.delete-post')
                                </p>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="clearfix"></div>
                <ul class="pagination pull-right">
                    {{ $posts->onEachSide(1)->links() }}
                </ul>

            </div>

        </div>
    </div>

    {{--    //Modal thêm mới danh mục--}}
    <div class="modal fade" id="create" tabindex="-1" role="dialog" aria-labelledby="create" aria-hidden="true">
        <div class="modal-dialog">
            <form action="{{ route('admin.posts.store') }}" method="post" id="form-create-posts" enctype = "multipart/form-data">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span
                                class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                        <h4 class="modal-title custom_align" id="Heading">Create Post</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <input class="form-control" type="text" id="name" name="name" placeholder="Name"
                                   value="{{ old('name') }}">
                        </div>
                        <div class="form-group">
                            <div class="inputGroupContainer">
                                <select name="category_id" id="" class="form-select-product">
                                    <option value="">Chọn danh mục</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <textarea rows="2" class="form-control" name="description"
                                  placeholder="Description">{{ old('description') }}</textarea>
                        </div>
                        <div class="form-group">
                            <div class="col-md-8 inputGroupContainer">
                                <div class="input-group form-trangthai-product">
                                    <div class="col-md-6">
                                        <input name="outstanding" id="outstanding"
                                               type="checkbox" {{ old('outstanding') == 1 ? "checked" : "" }}>
                                        <span class="ml-4 pt-1">Outstanding</span>
                                    </div>
                                    <div class="col-md-6">
                                        <input name="status" id="status" type="checkbox" {{ old('status') == 1 ? "checked" : "" }} >
                                        <span class="ml-4 pt-1">Active</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <textarea rows="2" class="form-control" name="content"
                                  placeholder="Content">{{ old('content') }}</textarea>
                        </div>
                        <div class="form-group">
                            <div class="inputGroupContainer">
                                <input name="image" accept=".png, .jpg, .jpeg, .gif" placeholder="Choose image" class="form-control"
                                       type="file"
                                       id="file_photo"/>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer ">
                        <button type="submit" class="btn btn-success btn-lg" style="width: 100%;"><span
                                class="glyphicon glyphicon-ok-sign"></span> Create
                        </button>
                    </div>
                </div>
            </form>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
@stop

@push('js-stack')
    <script>
        $("#form-create-posts").validate({
            rules: {
                name: {
                    required: true,
                    minlength: 3,
                    maxlength: 200,
                    remote: {
                        url: "{{ route('admin.posts.check-unique-name') }}",
                        type: "get",
                        contentType: 'application/json; charset=utf-8',
                        dataType: 'json',
                        async: false,
                        data: {
                            name: function () {
                                return $("#name").val();
                            },
                        }
                    },
                },
                description: {
                    required: true,
                    maxlength: 255,
                },
            },
            messages: {
                name: {
                    required: "Please add post name!",
                    minlength: "Enter the post name above 3 characters!",
                    maxlength: "Enter post name under 200 characters!",
                    remote: "This value already exists!",
                },
                description: {
                    required: "Please enter a description!",
                    maxlength: "Enter a description under 255 characters",
                },
            }
        });
    </script>

    <script>
        $("#form-edit-posts").validate({
            rules: {
                name: {
                    required: true,
                    minlength: 3,
                    maxlength: 200,
                    remote: {
                        url: "{{ route('admin.posts.check-unique-name-in-edit') }}",
                        type: "get",
                        contentType: 'application/json; charset=utf-8',
                        dataType: 'json',
                        async: false,
                        data: {
                            name: function () {
                                return $("#name").val();
                            },
                            id_post: function () {
                                return $("#id_post").val();
                            }
                        }
                    },
                },
                description: {
                    required: true,
                    maxlength: 255,
                },
            },
            messages: {
                name: {
                    required: "Please enter post name!",
                    minlength: "Enter the post name above 3 characters!",
                    maxlength: "Enter post name under 200 characters!",
                    remote: "This value already exists!",
                },
                description: {
                    required: "Please enter a description!",
                    maxlength: "Enter a description under 255 characters!",
                },
            }
        });
    </script>
@endpush
