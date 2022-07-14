@extends('admin.layouts.master')

@section('title')
    List Categories
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div>
                <h4 class="float-left">Categories</h4>
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
                        <th>Description</th>
                        <th>Slug</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </thead>
                    <tbody>
                    @foreach($categories as $key => $category)
                        <tr>
                            <td><input type="checkbox" class="checkthis"/></td>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $category->name }}</td>
                            <td>{{ $category->description }}</td>
                            <td>{{ $category->slug }}</td>
                            <td>
                                <p data-placement="top" data-toggle="tooltip" title="Edit">
                                    <button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal"
                                            data-target="#edit-{{ $category->id }}"><span
                                            class="glyphicon glyphicon-pencil"></span>
                                    </button>
                                    @include('admin.partials.edit.edit-category')
                                </p>
                            </td>
                            <td>
                                <p data-placement="top" data-toggle="tooltip" title="Delete">
                                    <button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal"
                                            data-target="#delete">
                                        <span class="glyphicon glyphicon-trash"></span>
                                    </button>
                                    @include('admin.partials.delete.delete-category')
                                </p>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="clearfix"></div>
                <ul class="pagination pull-right">
                    {{ $categories->onEachSide(1)->links() }}
                </ul>

            </div>

        </div>
    </div>

    {{--    //Modal thêm mới danh mục--}}
    <div class="modal fade" id="create" tabindex="-1" role="dialog" aria-labelledby="create" aria-hidden="true">
        <div class="modal-dialog">
            <form action="{{ route('admin.categories.store') }}" method="post" id="form-create-categories">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span
                                class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                        <h4 class="modal-title custom_align" id="Heading">Create Categories</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <input class="form-control " type="text" id="name" name="name" placeholder="Name"
                                   value="{{ old('name') }}">
                        </div>
                        <div class="form-group">
                        <textarea rows="2" class="form-control" name="description"
                                  placeholder="Description">{{ old('description') }}</textarea>
                        </div>
                    </div>
                    <div class="modal-footer ">
                        <button type="submit" class="btn btn-success btn-lg" style="width: 100%;"><span
                                class="glyphicon glyphicon-ok-sign"></span> Tạo mới
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
        $("#form-create-categories").validate({
            rules: {
                name: {
                    required: true,
                    minlength: 3,
                    maxlength: 200,
                    remote: {
                        url: "{{ route('admin.categories.check-unique-name') }}",
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
                    required: "Please add category name!",
                    minlength: "Enter the category name above 3 characters!",
                    maxlength: "Enter category name under 200 characters!",
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
        $("#form-edit-categories").validate({
            rules: {
                name: {
                    required: true,
                    minlength: 3,
                    maxlength: 200,
                    remote: {
                        url: "{{ route('admin.categories.check-unique-name-in-edit') }}",
                        type: "get",
                        contentType: 'application/json; charset=utf-8',
                        dataType: 'json',
                        async: false,
                        data: {
                            name: function () {
                                return $("#name").val();
                            },
                            id_category: function () {
                                return $("#id_category").val();
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
                    required: "Please enter category name!",
                    minlength: "Enter the category name above 3 characters!",
                    maxlength: "Enter category name under 200 characters!",
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
