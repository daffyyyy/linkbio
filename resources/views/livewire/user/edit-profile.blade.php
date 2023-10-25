<div>
    @include('layouts.flash-messages')
    <div class="row mt-2 d-flex justify-content-center align-items-center">
        <div class="col-md-6">
            <h5 class="fw-lighter">{{ __('Change details') }}</h5>
            <hr />
            <form wire:submit.prevent='save'>
                @csrf
                <div class="mb-4">
                    <div class="text-center">
                        @if ($newAvatar)
                        <img src='{{$newAvatar->temporaryUrl()}}' class="rounded-circle mb-2 shadow user-avatar"
                         />
                        @else
                        <img src='{{$avatarPath}}' class="rounded-circle mb-2 shadow user-avatar" />
                        @endif
                    </div>
                    <label class="form-label text-secondary">{{ __('Avatar') }}</label>
                    <div class="input-group mb-3">
                        <label class="input-group-text"><i class="bi bi-image-fill"></i></label>
                        <input type="file" wire:model='newAvatar' class="form-control">
                    </div>
                    <span class="text-danger">@error('avatar'){{ $message }}@enderror</span>
                </div>

                <div class="mb-4">
                    <label class="form-label text-secondary">{{ __('Current password') }}</label>
                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="bi bi-shield-lock-fill"></i></span>
                        <input type="password" wire:model='currentPassword' @error('currentPassword') is-invalid
                            @enderror class="form-control" placeholder="*********">
                    </div>
                    <span class="text-danger">@error('currentPassword'){{ $message }}@enderror</span>
                </div>
                <div class="mb-4">
                    <label class="form-label text-secondary">{{ __('New password') }}</label>
                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="bi bi-shield-lock-fill"></i></span>
                        <input type="password" wire:model='password' @error('password') is-invalid @enderror
                            class="form-control" placeholder="*********">
                    </div>
                    <span class="text-danger">@error('password'){{ $message }}@enderror</span>
                </div>
                <div class="mb-4">
                    <label class="form-label text-secondary">{{ __('Bio') }}</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-file-person-fill"></i></span>
                        <textarea wire:model='bio' @error('bio') is-invalid @enderror class="form-control"
                            rows="3"></textarea>
                    </div>
                    <span class="text-danger">@error('bio'){{ $message }}@enderror</span>
                </div>
                <div class="mb-4">
                    <label class="form-label text-secondary">{{ __('Location') }}</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-geo-alt-fill"></i></span>
                        <input type="text" wire:model='location' @error('location') is-invalid @enderror
                            class="form-control" placeholder="London">
                    </div>
                    <span class="text-danger">@error('location'){{ $message }}@enderror</span>
                </div>
                <div class="mb-4">
                    <label class="form-label text-secondary">{{ __('Contact') }}</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-envelope-fill"></i></span>
                        <input type="text" wire:model='contact' @error('contact') is-invalid @enderror
                            class="form-control" placeholder="yourEmail@yahoo.com">
                    </div>
                    <span class="text-danger">@error('contact'){{ $message }}@enderror</span>
                </div>
                <div class="d-grid gap-2 mt-3">
                    <button type="submit" class="btn btn-success"><i class="bi bi-check"></i> {{ __('Save changes') }}</button>
                </div>
            </form>
        </div>
    </div>



</div>
