@extends('Layouts.adminLayout')
@section('Content-Area')

<div class="row match-height">
    <!-- Medal Card -->
    <div class="col-xl-4 col-md-6 col-12">
      <div class="card card-congratulation-medal">
        <div class="card-body">
          <h5>Congratulations 🎉</h5>
          <p class="card-text font-small-3">Welcome to your Panel</p>
          <h3 class="mb-75 mt-2 pt-50">
            <a href="#">$48.9k</a>
          </h3>
          <button type="button" class="btn btn-primary">View Sales</button>
          <img src="{{asset('BackEnd/assets/images/illustration/badge.svg')}}" class="congratulation-medal" alt="Medal Pic" />
        </div>
      </div>
    </div>
    <!--/ Medal Card -->

    <!-- Statistics Card -->
    <div class="col-xl-8 col-md-6 col-12">
      <div class="card card-statistics">
        <div class="card-header">
          <h4 class="card-title">Statistics</h4>
          <div class="d-flex align-items-center">
            <p class="card-text font-small-2 me-25 mb-0">Updated 1 month ago</p>
          </div>
        </div>
        <div class="card-body statistics-body">
          <div class="row">
            <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-sm-0">
                <div class="d-flex flex-row">
                  <div class="avatar bg-light-danger me-2">
                    <div class="avatar-content">
                      <i data-feather="box" class="avatar-icon"></i>
                    </div>
                  </div>
                  <div class="my-auto">
                    <h4 class="fw-bolder mb-0">1.423k</h4>
                    <p class="card-text font-small-3 mb-0">Users</p>
                  </div>
                </div>
              </div>
            <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-xl-0">
              <div class="d-flex flex-row">
                <div class="avatar bg-light-primary me-2">
                  <div class="avatar-content">
                    <i data-feather="trending-up" class="avatar-icon"></i>
                  </div>
                </div>
                <div class="my-auto">
                  <h4 class="fw-bolder mb-0">2k</h4>
                  <p class="card-text font-small-3 mb-0">Brands</p>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-xl-0">
              <div class="d-flex flex-row">
                <div class="avatar bg-light-info me-2">
                  <div class="avatar-content">
                    <i data-feather="user" class="avatar-icon"></i>
                  </div>
                </div>
                <div class="my-auto">
                  <h4 class="fw-bolder mb-0">8k</h4>
                  <p class="card-text font-small-3 mb-0">Models</p>
                </div>
              </div>
            </div>

            <div class="col-xl-3 col-sm-6 col-12">
              <div class="d-flex flex-row">
                <div class="avatar bg-light-success me-2">
                  <div class="avatar-content">
                    <i data-feather="dollar-sign" class="avatar-icon"></i>
                  </div>
                </div>
                <div class="my-auto">
                  <h4 class="fw-bolder mb-0">$9745</h4>
                  <p class="card-text font-small-3 mb-0">Revenue</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--/ Statistics Card -->
  </div>
@endsection
