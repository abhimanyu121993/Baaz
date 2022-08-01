@extends('layouts.adminLayout')
@section('Head-Area')
    <link rel="stylesheet" type="text/css" href="{{ asset('Backend/assets/vendors/css/vendors.min.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('Backend/assets/vendors/css/tables/datatable/dataTables.bootstrap5.min.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('Backend/assets/vendors/css/tables/datatable/responsive.bootstrap5.min.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('Backend/assets/vendors/css/pickers/flatpickr/flatpickr.min.css') }}">
@endsection

@section('Content-Area')
    <div class="card">
        <div class="card-header">
            <h3>Manage Users</h3>
        </div>
        <div class="card-body">
            <table class="dt-column-search table datatable table-responsive table-bordered">
                <thead>
                    <tr>
                        <th>Sr.No</th>
                        <th>Pic</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Action</th>

                    </tr>

                </thead>
                <tbody>
                    @if($users)
                    @php $i=1;@endphp
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td><img src="" class="me-75 bg-light-danger"
                                    style="height:35px;width:35px;" /></td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                <div class="content-header-right text-md-end col-md-3 col-12 d-md-block d-none">
                                    <div class="mb-1 breadcrumb-right">
                                        <div class="dropdown">
                                            <button class="btn-icon btn btn-primary btn-round btn-sm dropdown-toggle"
                                                type="button" data-bs-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false"><i data-feather="grid"></i></button>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                @php $uid=Crypt::encrypt($user->id); @endphp
                                                <a class="dropdown-item" href="#"><i
                                                        class="me-1" data-feather="edit"></i><span
                                                        class="align-middle">Edit</span></a>

                                                <a class="dropdown-item" href="#"
                                                    onclick="event.preventDefault();
                                    document.getElementById('delete-form-{{ $uid }}').submit();"><i
                                                        class="me-1" data-feather="trash-2"></i><span
                                                        class="align-middle">Delete</span></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <form id="delete-form-{{ $uid }}" action="#"
                            method="post" style="display: none;">
                            @method('DELETE')
                            @csrf
                        </form>
                    @endforeach
@endif
                </tbody>
            </table>

        </div>
        <div class="card-footer">
            {!! $users->links('pagination::bootstrap-5') !!}
        </div>
    </div>
@endsection

@section('Script-Area')
    <script src="{{ asset('Backend/assets/vendors/js/tables/datatable/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('Backend/assets/vendors/js/tables/datatable/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('Backend/assets/vendors/js/tables/datatable/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('Backend/assets/vendors/js/tables/datatable/responsive.bootstrap5.js') }}"></script>
    <script src="{{ asset('Backend/assets/vendors/js/pickers/flatpickr/flatpickr.min.js') }}"></script>
    <script src="{{ asset('Backend/assets/js/scripts/tables/table-datatables-advanced.js') }}"></script>

   
@endsection
