<div>
    <div class="card-header pb-0 text-left bg-transparent">
        <h3 class="font-weight-black text-dark">
            {!! $onBoardTitle !!}
        </h3>
    </div>
    <form role="form" wire:submit.prevent="submitPoll">
        @if ($errors->any())
            <div class="py-3">
                @foreach ($errors->all() as $error)
                    <li class="text-danger">{{$error}}</li>
                @endforeach
            </div>
        @endif
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
</div>
