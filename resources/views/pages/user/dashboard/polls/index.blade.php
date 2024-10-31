@extends('pages.user.layouts.dashboard.layout')
@section('content')
@section('title', 'Voter - Dashboard')
@section('subheading', 'Polls')
@section('heading', 'My Polls')
<div class="container-fluid py-4 px-5">
    <div class="row">
      <div class="col-12">
        <div class="card card-background card-background-after-none align-items-start mt-4 mb-5">
          <div class="full-background" style="background-image: url('{{ asset('/assets/img/header-blue-purple.jpg') }}')"></div>
          <div class="card-body text-start p-4 w-100">
            <h3 class="text-white mb-2">Manage Your Polls 🔥</h3>
            <img src="{{ asset('/assets/img/3d-cube.png') }}" alt="3d-cube" class="position-absolute top-0 end-1 w-25 max-width-200 mt-n6 d-sm-block d-none" />
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-12">
        <div class="card border shadow-xs mb-4">
          <div class="card-header border-bottom pb-0">
            <div class="d-sm-flex align-items-center">
              <div>
                <h6 class="font-weight-semibold text-lg mb-0">Polls list</h6>
                <p class="text-sm">See information about all Polls</p>
              </div>
            </div>
          </div>
          <div class="card-body px-0 py-0">
                <livewire:user.dashboard.polls />
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection