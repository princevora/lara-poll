<div>
    @if (!$isAborted)
        <div class="card-header pb-0 text-left bg-transparent">
            <h3 class="font-weight-black text-dark">
                {!! $onBoardTitle !!}
            </h3>
        </div>
    @endif
    <div class="row">
        @if ($isAborted)
            <h2>🎉 We Are Creating Your Poll, Please Wait A moment</h2>
            <div
                class="d-flex justify-content-center align-items-center"
            >
                <div
                    class="spinner-border text-primary spinner-border-xl mb-10 mt-5"
                    role="status"
                >
                    <span class="visually-hidden">Loading...</span>
                </div>
            </div>
        @else
            <div class="col-sm-6">
                <button 
                    type="button" 
                    wire:click="abortMakeAccount"
                    class="btn btn-danger w-100 mt-4 mb-3"
                    >
                    <div 
                        wire:target='abortMakeAccount'
                        wire:loading 
                        >
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
                <button
                    wire:click='continueMakeAccount'
                    type="button"
                    class="btn btn-dark d-flex justify-content-center gap-2 w-100 mt-4 mb-3">
                    Continue
                    <div
                        wire:loading
                        wire:target='continueMakeAccount'
                        class="spinner-border text-primary spinner-border-sm"
                        role="status"
                    >
                        <span class="visually-hidden">Loading...</span>
                    </div>
                </button>
            </div>
        @endif
    </div>
</div>
