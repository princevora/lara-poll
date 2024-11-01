<div class="col-md-6 mx-auto">
    <form wire:submit.prevent='save'>
        <style>
            .btn {
                margin-bottom: 0px;
            }
        </style>

        <div class="mt-2 mb-4">
            <input 
                wire:model='title'
                type="text" 
                class="form-control"
                placeholder="Enter The Title"
                aria-label="Title" 
            >
            @error('title')
                <small class="text-danger">
                    {{ $message }}
                </small>
            @enderror
        </div>

        @foreach ($fields as $key => $field)
            <div class="input-group mb-2">
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
            @error("error_key_{$key}")
                <small class="text-danger">
                    {{ $message }}
                </small>
            @enderror
        @endforeach
    
        <div class="d-flex mt-4 justify-content-center gap-3">
            <button type="button" wire:click='addField' class="btn btn-primary btn-lg d-flex">
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
            <button type="submit" class="btn btn-success btn-lg d-flex">
                Update Poll
                <div
                    wire:loading
                    wire:target='save'
                    class="spinner-border text-white spinner-border-sm mx-1"
                    role="status"
                >
                    <span class="visually-hidden">Loading...</span>
                </div>
            </button>
        </div>
    </form>
</div>
