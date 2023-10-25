<div>
    <div class="site-title">
        <h3 class="lead">{{ __('Your custom style') }}</h3>
        <p class="text-muted">{{ __('Manage your custom style code here') }}</p>
    </div>

    <div class="row">
        <div class="col-md-6">
            <form wire:submit.prevent='save'>
                @csrf
                <div class="mb-4">
                    <label class="form-label text-secondary">{{ __('CSS') }}</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-filetype-css"></i></span>
                        <textarea wire:model='custom_style' @error('custom_style') is-invalid @enderror
                            class="form-control" rows="7"></textarea>
                    </div>
                    <span class="text-danger">@error('custom_style'){{ $message }}@enderror</span>
                </div>
                <div class="d-grid gap-2 mt-3">
                    <button type="submit" class="btn btn-success"><i class="bi bi-check"></i> {{ __('Save changes') }}</button>
                </div>
            </form>
        </div>
        <div class="col-md-6">
            <iframe width="550px" height="500px" src="{{$preview}}"></iframe>
        </div>
    </div>
</div>
