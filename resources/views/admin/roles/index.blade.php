<!DOCTYPE html>
<html lang="en">

<x-admin.layouts.head></x-admin.layouts.head>

<body>

<div class="container-fluid position-relative d-flex p-0">
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-dark position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->


    <!-- Sidebar Start -->
    <x-admin.layouts.sidebar></x-admin.layouts.sidebar>
    <!-- Sidebar End -->

    <!-- Modal Start -->
    <x-admin.modal.modal-role></x-admin.modal.modal-role>
    <!-- Modal End -->

    <x-admin.layouts.content>
        @section('content')
            <div class="container-fluid pt-4 px-4">
                    <div class="bg-secondary text-center rounded p-4">
                        <div class="d-flex align-items-center justify-content-between mb-4">
                            <h6 class="mb-0">List Roles</h6>
                            <button class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#modal-roles">Create</button>
                        </div>
                        <div class="table-responsive">
                            <table class="table text-start align-middle table-bordered table-hover mb-0">
                                <thead>
                                <tr class="text-white">
                                    <th scope="col">Id</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Guard Name</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if (count($roles) === 0)
                                    <tr>
                                        <td colspan="3" >Not data</td>
                                    </tr>
                                @else
                                    @foreach($roles as $value)
                                        <tr>
                                            <td>{{ $value->id }}</td>
                                            <td>{{ $value->name }}</td>
                                            <td>{{ $value->guard_name }}</td>
                                            <td align="center">
                                                <a class="btn btn-sm btn-info" href="">Update</a>
                                                <a class="btn btn-sm btn-primary" href="">Delete</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
        @stop
    </x-admin.layouts.content>


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
</div>

<!-- JavaScript Libraries -->
<x-admin.layouts.library></x-admin.layouts.library>


</body>

</html>
