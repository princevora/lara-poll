<div>
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
                                        id="field-{{ $key }}"
                                        class="form-check-input form-check-input-info" />
                                    <label class="d-flex justify-content-start mx-2" for="field-{{ $key }}">{{$pollField}}</label>
                                </div>
                            @endforeach
            
                            <div class="text-center col-6 d-flex gap-2">
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
                                <a href="{{ route('public.poll.results', $poll_id) }}" class="btn btn-dark w-100 mt-4 mb-3">
                                    Results
                                </a>
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