<div>
    <div class="border-bottom py-3 px-3 d-sm-flex align-items-center">
        <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
            
            <!-- All -->
            <input type="radio" class="btn-check" value="" wire:model.live="timePeriod" name="btnradiotable" id="btnradiotable1" autocomplete="off" @if(empty($timePeriod)) checked @endif>
            <label class="btn btn-white px-3 mb-0" for="btnradiotable1">All</label>
            
            <!-- 7 Day -->
            <input type="radio" class="btn-check" wire:model.live="timePeriod" value="7" name="btnradiotable" id="btnradiotable2" autocomplete="off">
            <label class="btn btn-white px-3 mb-0" for="btnradiotable2">Last 7 Days</label>
            
            <!-- Last Month -->
            <input type="radio" class="btn-check" wire:model.live="timePeriod" value="28" name="btnradiotable" id="btnradiotable3" autocomplete="off">
            <label class="btn btn-white px-3 mb-0" for="btnradiotable3">Last Month</label>
        </div>
        <div class="input-group w-sm-25 ms-auto">
            <span class="input-group-text text-body">
                <svg xmlns="http://www.w3.org/2000/svg" width="16px" height="16px" fill="none" viewBox="0 0 24 24"
                    stroke-width="1.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z"></path>
                </svg>
            </span>
            <input type="text" class="form-control"  placeholder="Search" wire:model.live="search">
        </div>
    </div>
    <div class="table-responsive p-0">
        <table class="table align-items-center mb-0">
            <thead class="bg-gray-100">
                <tr>
                    <th class="text-secondary text-xs font-weight-semibold opacity-7">Poll ID</th>
                    <th class="text-secondary text-xs font-weight-semibold opacity-7 ps-2">Total Fields</th>
                    <th class="text-center text-secondary text-xs font-weight-semibold opacity-7">Created Time</th>
                    <th class="text-secondary opacity-7"></th>
                </tr>
            </thead>
            {{-- {{var_dump($polls->vote_field)}} --}}
            <tbody>
                @foreach ($polls as $poll)
                    <tr>
                        <td>
                            <div class="d-flex px-2 py-1">
                                <div class="d-flex flex-column justify-content-center ms-1">
                                    <h6 class="mb-0 text-sm font-weight-semibold">
                                        <a href="
                                            {{ route('public.poll', [
                                                'poll_id' => $poll->poll_id
                                                ])
                                            }}"
                                            >
                                            
                                            {{ Str::title($poll->poll_id) }}
                                        </a>
                                    </h6>
                                </div>
                            </div>
                        </td>
                        <td>
                            <p class="text-sm text-dark font-weight-semibold mb-0">
                                {{ count(json_decode($poll->poll_fields, true)) }}
                            </p>
                            <p class="text-sm text-secondary mb-0">Fields</p>
                        </td>
                        <td class="align-middle text-center">
                            <span class="text-secondary text-sm font-weight-normal">
                                {{ $poll->created_at->diffForHumans() }}
                            </span>
                        </td>
                        <td class="align-middle">
                            {{-- <a href="{{ route('dashboard.mypoll.data', ['poll_id' => $poll->poll_id]) }}" class="text-secondary font-weight-bold text-xs">
                                <svg data-bs-toggle="tooltip" data-bs-title="View More Data" width="14" height="14" viewBox="0 0 15 16" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M11.2201 2.02495C10.8292 1.63482 10.196 1.63545 9.80585 2.02636C9.41572 2.41727 9.41635 3.05044 9.80726 3.44057L11.2201 2.02495ZM12.5572 6.18502C12.9481 6.57516 13.5813 6.57453 13.9714 6.18362C14.3615 5.79271 14.3609 5.15954 13.97 4.7694L12.5572 6.18502ZM11.6803 1.56839L12.3867 2.2762L12.3867 2.27619L11.6803 1.56839ZM14.4302 4.31284L15.1367 5.02065L15.1367 5.02064L14.4302 4.31284ZM3.72198 15V16C3.98686 16 4.24091 15.8949 4.42839 15.7078L3.72198 15ZM0.999756 15H-0.000244141C-0.000244141 15.5523 0.447471 16 0.999756 16L0.999756 15ZM0.999756 12.2279L0.293346 11.5201C0.105383 11.7077 -0.000244141 11.9624 -0.000244141 12.2279H0.999756ZM9.80726 3.44057L12.5572 6.18502L13.97 4.7694L11.2201 2.02495L9.80726 3.44057ZM12.3867 2.27619C12.7557 1.90794 13.3549 1.90794 13.7238 2.27619L15.1367 0.860593C13.9869 -0.286864 12.1236 -0.286864 10.9739 0.860593L12.3867 2.27619ZM13.7238 2.27619C14.0917 2.64337 14.0917 3.23787 13.7238 3.60504L15.1367 5.02064C16.2875 3.8721 16.2875 2.00913 15.1367 0.860593L13.7238 2.27619ZM13.7238 3.60504L3.01557 14.2922L4.42839 15.7078L15.1367 5.02065L13.7238 3.60504ZM3.72198 14H0.999756V16H3.72198V14ZM1.99976 15V12.2279H-0.000244141V15H1.99976ZM1.70617 12.9357L12.3867 2.2762L10.9739 0.86059L0.293346 11.5201L1.70617 12.9357Z"
                                        fill="#64748B" />
                                </svg>
                            </a> --}}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
