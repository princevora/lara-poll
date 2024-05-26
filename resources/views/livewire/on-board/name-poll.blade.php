<div>
    <div class="card-header pb-0 text-left bg-transparent">
        <h3 class="font-weight-black text-dark">
            {!! $onBoardTitle !!}
        </h3>
    </div>
        <form role="form" wire:submit.prevent="createPoll">
            <label>Name</label>
            <div class="mb-3">
                <input type="text" class="form-control" placeholder="Enter Poll name"
                    wire:model="pollName" aria-label="Name" aria-describedby="name-addon">
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-dark w-100 mt-4 mb-3">
                    <div wire:loading wire:target="createPoll"
                        class="spinner-border text-primary spinner-border-sm"
                        role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                    <span class="px-1">Create Poll</span>
                </button>
            </div>
        </form>
    </div>
</div>