@extends('pages.user.layouts.dashboard.layout')
@section('content')
@section('title', 'Voter - Dashboard')
  <div class="container-fluid py-4 px-5">
    <div class="row">
      <div class="col-md-12">
        <div class="d-md-flex align-items-center mb-3 mx-2">
          <div class="mb-md-0 mb-3">
            <h3 class="font-weight-bold mb-0">Hello, 😎
              <span class="text-bold">
                {{ Str::title($user->name) }}
              </span>
            </h3>
            <p class="mb-0">{{ getGreeting() }}!</p>
          </div>
        </div>
      </div>
    </div>
    <hr class="my-0">
    <div class="col-12">
      <div class="card shadow-xs border">
        <div class="card-header pb-0">
          <h6 class="mb-0 font-weight-semibold text-lg">ShortCuts</h6>
          <p class="text-sm mb-1">Go With Your Needs</p>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-xl-4 col-md-6 mb-xl-0">
              <div class="card card-background border-radius-xl card-background-after-none align-items-start mb-4">
                <div class="full-background bg-cover" style="background-image: url('../assets/img/img-8.jpg')"></div>
                <span class="mask bg-dark opacity-1 border-radius-sm"></span>
                <div class="card-body text-start p-3 w-100">
                  <div class="row">
                    <div class="col-12">
                      <div class="blur shadow d-flex align-items-center w-100 border-radius-md border border-white mt-8 p-3">
                        <div class="w-50">
                          <a href="{{ route('vote.create') }}" class="text-dark text-sm font-weight-bold mb-1">Create Poll</a>
                          {{-- <p class="text-xs text-secondary mb-0">20 Jul 2022</p> --}}
                        </div>
                        {{-- <p class="text-dark text-sm font-weight-bold ms-auto">Growth</p> --}}
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-4 col-md-6 mb-xl-0">
              <div class="card card-background border-radius-xl card-background-after-none align-items-start mb-4">
                <div class="full-background bg-cover" style="background-image: url('../assets/img/img-9.jpg')"></div>
                <span class="mask bg-dark opacity-1 border-radius-sm"></span>
                <div class="card-body text-start p-3 w-100">
                  <div class="row">
                    <div class="col-12">
                      <div class="blur shadow d-flex align-items-center w-100 border-radius-md border border-white mt-8 p-3">
                        <div class="w-50">
                          <a href="{{ route('user.polls') }}" class="text-dark text-sm font-weight-bold mb-1">View My Polls</a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-4 col-md-6 mb-xl-0 mb-4">
              <div class="card h-100 card-plain border border-dashed px-5">
                <div class="card-body d-flex flex-column justify-content-center text-center">
                  <a href="javascript:;">
                    <div class="icon icon-shape bg-dark text-center text-white rounded-circle mx-auto d-flex align-items-center justify-content-center mb-2">
                      <svg xmlns="http://www.w3.org/2000/svg" height="19" width="19" viewBox="0 0 24 24" fill="currentColor">
                        <path fill-rule="evenodd" d="M1.5 6a2.25 2.25 0 012.25-2.25h16.5A2.25 2.25 0 0122.5 6v12a2.25 2.25 0 01-2.25 2.25H3.75A2.25 2.25 0 011.5 18V6zM3 16.06V18c0 .414.336.75.75.75h16.5A.75.75 0 0021 18v-1.94l-2.69-2.689a1.5 1.5 0 00-2.12 0l-.88.879.97.97a.75.75 0 11-1.06 1.06l-5.16-5.159a1.5 1.5 0 00-2.12 0L3 16.061zm10.125-7.81a1.125 1.125 0 112.25 0 1.125 1.125 0 01-2.25 0z" clip-rule="evenodd" />
                      </svg>
                    </div>
                    <h5 class="text-dark text-lg"> Create new post </h5>
                    <p class="text-sm text-secondary mb-0">Drive into the editor and add your content.</p>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection