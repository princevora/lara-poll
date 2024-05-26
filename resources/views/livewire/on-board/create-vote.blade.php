
                                {{-- <livewire:{{$page}}> --}}
                                {{-- @if ($onBoardSession === 0) --}}
                                    
                                {{-- @elseif ($onBoardSession === 1)
                                    <form role="form" wire:submit.prevent="submitPoll">
                                        <label>Field Name</label>

                                        @for ($i = 0; $i < $fields; $i++)
                                            <div class="mb-3">
                                                <input type="text" class="form-control"
                                                    placeholder="Enter Field name"
                                                    wire:model="fieldName.{{ $i }}" aria-label="Name"
                                                    aria-describedby="name-addon">
                                            </div>
                                        @endfor


                                        <div class="mb-3">
                                            <button type="button" wire:click.prevent="incrementFields"
                                                class="btn-dark btn btn-sm">
                                                <div wire:loading wire:target="incrementFields"
                                                    class="spinner-border text-primary spinner-border-sm"
                                                    role="status">
                                                    <span class="visually-hidden">Loading...</span>
                                                </div>
                                                <span class="px-1">Add Field +</span>
                                            </button>
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-dark w-100 mt-4 mb-3">
                                                <div wire:loading wire:target="submitPoll">
                                                    <div class="spinner-border text-primary spinner-border-sm"
                                                        role="status">
                                                        <span class="visually-hidden">Loading...</span>
                                                    </div>
                                                </div>
                                                <span class="px-1">Create Poll</span>
                                            </button>
                                        </div>
                                    </form>
                                @elseif ($onBoardSession === 3)
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <button 
                                                type="button" 
                                                wire:click="abortMakeAccount"
                                                class="btn btn-danger w-100 mt-4 mb-3"
                                                >
                                                <div wire:loading >
                                                    <div
                                                        class="spinner-border text-primary spinner-border-sm"
                                                        role="status"
                                                    >
                                                        <span class="visually-hidden">Loading...</span>
                                                    </div>
                                                </div>
                                                <span class="px-1">No</span>
                                            </button>
                                        </div>
                                        <div class="col-sm-6">
                                            <button type="button"
                                                class="btn btn-dark w-100 mt-4 mb-3">Continue</button>
                                        </div>
                                    </div>
                                @elseif ($onBoardSession === 4)
                                    <div
                                        class="d-flex justify-content-center align-items-center"
                                    >
                                        <div
                                            class="spinner-border text-primary spinner-border-sm"
                                            role="status"
                                        >
                                            <span class="visually-hidden">Loading...</span>
                                        </div>
                                    </div>
                                    
                                @endif --}}
                            