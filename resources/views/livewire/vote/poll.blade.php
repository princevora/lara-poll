<div>
    {{-- <div class="d-flex justify-content-start"> --}}
        <b>
            {{-- {!! $poll_data->poll_name !!} --}}
        </b><br>
            {{-- </h5> &nbsp; --}}
            <!-- SHow Who created The poll -->
            {{-- by a {{$poll_data->created_by == 1 ? 'user' : 'guest'}} · <b> --}}
    
            <!-- SHow when the poll was created -->
            {{-- &nbsp; {{$poll_data->created_at->diffForHumans()}} --}}
    {{-- </div> --}}
    <div class="row">
        <!-- Form column -->
        <div class="col-md-6 mt-4">
            <div class="card-body p-4">
                <div class="card-header pb-0 text-left bg-transparent">
                    <h3 class="font-weight-black text-dark">
                        {{-- {!! $title !!} --}}
                    </h3>
                </div>
                    <form wire:submit.prevent="save">
                        @if (!empty($polldata))
                            @foreach ($polldata as $key => $pollField)
                                <div class="mb-3 form-check">
                                    <input type="radio" 
                                        name="radioDisabled" 
                                        wire:model="vote_field"
                                        value="{{$key}}"
                                        class="form-check-input form-check-input-info" />
                                    <label class="d-flex justify-content-start mx-2">{{$pollField}}</label>
                                </div>
                            @endforeach
            
                            <div class="text-center col-6">
                                <button type="submit" class="btn btn-dark w-100 mt-4 mb-3">
                                    <div wire:loading wire:target="createPoll"
                                        class="spinner-border text-primary spinner-border-sm"
                                        role="status">
                                        <span class="visually-hidden">Loading...</span>
                                    </div>
                                    <span class="px-1">
                                        Submit
                                        <i class=""></i>
                                    </span>
                                </button>
                            </div>
                        @else
                            <h3>Unable TO FInd data</h3>
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>