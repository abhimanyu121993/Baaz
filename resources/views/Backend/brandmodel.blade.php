@extends('layouts.adminLayout')

@section('Head-Area')
    <link rel="stylesheet" type="text/css" href="{{ asset('BackEnd/assets/css/plugins/forms/form-validation.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('BackEnd/assets/css/plugins/forms/pickers/form-flat-pickr.css') }}">
@endsection

@section('Content-Area')
    <div class="card">
        <div class="card-header">
            <h3>
                @if (!isset($brandedit))
                    Brand Model Map
                @else
                    Edit Brand Model Map
                @endif
            </h3>
        </div>
        <div class="card-body">
            <form class="needs-validation"
                action="{{ isset($brandmodeledit) ? route('Backend.brandmodel.update', $brandmodeledit->id) : route('Backend.brandmodel.store') }}"
                method='post' enctype="multipart/form-data">
                @if (isset($brandmodeledit))
                    @method('patch')
                @endif
                @csrf
                <div class="row">
                    <div class="col-md-6 mb-1">
                        <label class="form-label" for="basic-addon-name">Brand Name</label>

                        <select class="form-control">
                            <option ></option>
                        </select>
                        
                    </div>
                    <div class="col-md-6 mb-1">
                        <label class="form-label" for="pic">Image Thumbnail</label>
                        <input type="file" name='pic' id="pic" class="form-control " aria-label="pic"
                            aria-describedby="pic" />
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-2">
                        <button type="submit"
                            class="btn btn-primary waves-effect waves-float waves-light">{{ isset($modeledit) ? 'Edit' : 'Add' }}</button>
                    </div>
                    @if (isset($modeledit))
                        <div class="col-sm-6">
                            <img src="{{ asset('upload/models') }}/{{ $modeledit->image }}" class="bg-light-info"
                                alt="" style="height:100px;width:200px;">
                        </div>
                    @endif
                </div>

            </form>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <h3>Brand Model Map</h3>
        </div>
        <div class="card-body">
            <table class="datatables-basic table datatable table-responsive">
                <thead>
                    <tr>
                        <th>Sr.No</th>
                        <th>Brand Name</th>
                        <th>Brand Model</th>
                        <th>Action</th>
                    </tr>

                </thead>
                <tbody>
                    @if ($brandmodels)
                        @php $i=1;@endphp
                        @foreach ($brandmodels as $bm)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $bm->name }}</td>
                                <td>{{ $bm->name }}</td>

                                <div class="content-header-right text-md-end col-md-3 col-12 d-md-block d-none">
                                    <div class="mb-1 breadcrumb-right">
                                        <div class="dropdown">
                                            <button class="btn-icon btn btn-primary btn-round btn-sm dropdown-toggle"
                                                type="button" data-bs-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false"><i data-feather="grid"></i></button>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                @php $bmid=Crypt::encrypt($bm->id); @endphp
                                                <a class="dropdown-item"
                                                    href="{{ route('Backend.brandmodel.edit', $bmid) }}"><i class="me-1"
                                                        data-feather="check-square"></i><span
                                                        class="align-middle">Edit</span></a>
                                                <a class="dropdown-item" href=""
                                                    onclick="event.preventDefault();document.getElementById('delete-form-{{ $bmid }}').submit();"><i
                                                        class="me-1" data-feather="message-square"></i><span
                                                        class="align-middle">Delete</span></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                </td>
                            </tr>
                            <form id="delete-form-{{ $bmid }}"
                                action="{{ route('Backend.brandmodel.destroy', $bmid) }}" method="post"
                                style="display: none;">
                                @method('DELETE')
                                @csrf
                            </form>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection


@section('Script-Area')
    {{-- <script src="{{asset('BackEnd/assets/js/scripts/forms/form-validation.js')}}"></script> --}}
    <script src="{{ asset('Backend/assets/vendors/js/tables/datatable/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('Backend/assets/vendors/js/tables/datatable/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('Backend/assets/vendors/js/tables/datatable/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('Backend/assets/vendors/js/tables/datatable/responsive.bootstrap5.js') }}"></script>
    <script src="{{ asset('Backend/assets/vendors/js/pickers/flatpickr/flatpickr.min.js') }}"></script>
@endsection
