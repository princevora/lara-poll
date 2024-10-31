<div class="col-md-6 mx-auto">
    <style>
        .btn {
            margin-bottom: 0px;
        }
    </style>
    @foreach ($fields as $key => $field)
        <div class="mb-3 input-group">
            <button class="btn bg-primary text-white" type="button">
                #{{ $key + 1}}
            </button>
            <input 
                wire:model='fields.{{ $key }}'
                type="text" 
                class="form-control"
                value="{{ $field }}" 
                placeholder="Create a password"
                aria-label="Password" 
                id="field-{{ $key }}" 
                aria-describedby="password-addon"
            >
            <button 
                class="btn btn-outline-danger d-flex gap-2" 
                type="button" 
                wire:click='deleteField({{ $key }})'
            >
                Delete
                <div 
                    wire:loading 
                    wire:target='deleteField({{ $key }})' 
                    class="spinner-border text-primary spinner-border-sm" 
                    role="status"
                >
                    <span class="visually-hidden">Loading...</span>
                </div>
            </button>
        </div>
    @endforeach

    <div class="row">
        <button type="button" wire:click='addField' class=" btn btn-primary btn-lg btn-block">
            Add A Field
            <div
                wire:loading
                wire:target='addField'
                class="spinner-border text-white spinner-border-sm mx-1"
                role="status"
            >
                <span class="visually-hidden">Loading...</span>
            </div>
        </button>
    </div>
</div>
