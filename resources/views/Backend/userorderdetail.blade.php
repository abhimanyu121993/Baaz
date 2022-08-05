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
            <h3>Order Details</h3>
        </div>
        <div class="card-body">
            <table class="dt-column-search table datatable table-responsive table-bordered">
                <thead>
                    <tr>
                        <th>Service Image</th>
                        <th>Service type</th>
                        <th>Service price</th>
                    </tr>

                </thead>
                <tbody>
                    @if($orderDetails)
                            <tr>
                                <td><img src="{{asset($orderDetails->image)}}" class="me-75 bg-light-danger"
                                    style="height:35px;width:35px;" /></td>
                                <td>{{ $orderDetails->name ?? '' }}</td>
                                <td>{{ $orderDetails->price ?? '' }}</td>
                            </tr>
                    @endif
                </tbody>
            </table>

        </div>
    </div>





@endsection

@section('Script-Area')
<script src="{{ asset('Backend/assets/vendors/js/tables/datatable/dataTables.bootstrap5.min.js') }}"></script>
<script src="{{ asset('Backend/assets/vendors/js/tables/datatable/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('Backend/assets/vendors/js/tables/datatable/responsive.bootstrap5.js') }}"></script>
<script src="{{ asset('Backend/assets/vendors/js/pickers/flatpickr/flatpickr.min.js') }}"></script>


@endsection
