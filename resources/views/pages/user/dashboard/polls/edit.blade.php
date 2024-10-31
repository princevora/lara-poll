@extends('pages.user.layouts.dashboard.layout')
@section('content')
@section('title', 'Voter - Dashboard')
@section('subheading', 'Polls')
@section('heading', 'My Polls')
<div class="container-fluid py-4 px-5">
    <div class="row">
      <div class="col-12">
        <div class="card border shadow-xs mb-4">
          <div class="card-header border-bottom pb-0">
            <div class="d-sm-flex align-items-center">
              <div>
                <h6 class="font-weight-semibold text-lg mb-0">Edit Poll</h6>
                <p class="text-sm">Update Fields And Edit The poll</p>
              </div>
            </div>
          </div>
        </div>
    </div>
    <livewire:user.dashboard.edit-poll />
    </div>
  </div>
@endsection