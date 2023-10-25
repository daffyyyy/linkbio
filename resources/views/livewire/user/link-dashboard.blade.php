<div>
    @include('layouts.flash-messages')
    <div class="site-title">
        <h3 class="lead">{{ __('Your links') }}</h3>
        <p class="text-muted">{{ __('Manage links here') }}</p>
    </div>

    <div wire:sortable='updateLinkPosition' class=" d-flex flex-column align-items-center gap-3 user-link-container">
        @foreach ($links as $index => $link)
        <div class="d-flex flex-column border border-light rounded btn-user-link mb-2 px-2 py-1 user-link-item @if(!$link->visible)bg-danger @endif"
            wire:key='link-{{$link->id}}' wire:sortable.item='{{$link->id}}' wire:sortable.handle>
            <div class="d-flex user-link-item-title">
                <div class="col-md-9 text-truncate">
                    @if (!$link->visible)
                    <i class="bi bi-eye-slash-fill me-1"></i>
                    @endif
                    @if ($link->icon)
                    <span class="user-link-item-icon">
                        <i class="{{$link->icon}}"></i>
                    </span>
                    @endif
                    <span>
                        {{$link->title}}
                    </span>
                </div>
                <div class="user-link-item-action col-md-3">
                    <span class="ms-1" wire:click='edit({{$link->id}})'>
                        <i class="bi bi-pencil-square" style="text-shadow: 0px 0px 4px #000;"></i>
                    </span>
                    <span class="ms-1" wire:click='delete({{$link->id}})'>
                        <i class="bi bi-x-circle-fill" style="text-shadow: 0px 0px 4px #000;"></i>
                    </span>
                </div>
            </div>

            @if ($link->description)
            <p class="p-0 m-0 user-link-item-description">{{$link->description}} </p>
            @endif
        </div>
        @endforeach
        <button class="btn btn-outline-success" wire:click='openModal()'>+ {{ __('Add
            more') }}</button>

        @if($isOpen)
        <div class="modal show" id="addMoreModal" tabindex="-1" role="dialog" aria-labelledby="addMoreModalLabel"
            aria-hidden="true" style="display: block;">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">{{ __('Adding link') }}</h5>
                        <button type="button" class="close" data-bs-dismiss="modal" wire:click='closeModal()'
                            aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form wire:submit.prevent='save'>
                        @csrf
                        <div class="modal-body">
                            <div class="mb-2">
                                <label class="form-label">{{ __('Link title') }}</label>
                                <input type="text" class="form-control" wire:model.defer='title' placeholder="My link">
                            </div>
                            <div class="mb-2">
                                <label class="form-label">{{ __('Link description') }}</label>
                                <input type="text" class="form-control" wire:model.defer='description'
                                    placeholder="Link description">
                            </div>
                            <div class="mb-2">
                                <label class="form-label">{{ __('Link url') }}</label>
                                <input type="url" class="form-control" wire:model.defer='url'
                                    placeholder="https://google.pl">
                            </div>
                            <div class="mb-2">
                                <div class="rating-container">
                                    <div class="rating-text">
                                        <p>{{ __('Link icon') }}</p>
                                    </div>
                                    <div class="rating">
                                        <div class="rating-form-1">
                                            <label>
                                                <input type="radio" wire:model.defer='icon' name="rating"
                                                    value="bi bi-link-45deg" />
                                                <i class="bi bi-link-45deg"></i>
                                            </label>
                                            <label>
                                                <input type="radio" wire:model.defer='icon' name="rating"
                                                    value="bi bi-share" />
                                                <i class="bi bi-share"></i>
                                            </label>
                                            <label>
                                                <input type="radio" wire:model.defer='icon' name="rating"
                                                    value="bi bi-facebook" />
                                                <i class="bi bi-facebook"></i>
                                            </label>
                                            <label>
                                                <input type="radio" wire:model.defer='icon' name="rating"
                                                    value="bi bi-twitter-x" />
                                                <i class="bi bi-twitter-x"></i>
                                            </label>
                                            <label>
                                                <input type="radio" wire:model.defer='icon' name="rating"
                                                    value="bi bi-pinterest" />
                                                <i class="bi bi-pinterest"></i>
                                            </label>
                                            <label>
                                                <input type="radio" wire:model.defer='icon' name="rating"
                                                    value="bi bi-telegram" />
                                                <i class="bi bi-telegram"></i>
                                            </label>
                                            <label>
                                                <input type="radio" wire:model.defer='icon' name="rating"
                                                    value="bi bi-tiktok" />
                                                <i class="bi bi-tiktok"></i>
                                            </label>
                                            <label>
                                                <input type="radio" wire:model.defer='icon' name="rating"
                                                    value="bi bi-twitch" />
                                                <i class="bi bi-twitch"></i>
                                            </label>
                                            <label>
                                                <input type="radio" wire:model.defer='icon' name="rating"
                                                    value="bi bi-youtube" />
                                                <i class="bi bi-youtube"></i>
                                            </label>
                                            <label>
                                                <input type="radio" wire:model.defer='icon' name="rating"
                                                    value="bi bi-discord" />
                                                <i class="bi bi-discord"></i>
                                            </label>
                                            <label>
                                                <input type="radio" wire:model.defer='icon' name="rating"
                                                    value="bi bi-steam" />
                                                <i class="bi bi-steam"></i>
                                            </label>
                                            <label>
                                                <input type="radio" wire:model.defer='icon' name="rating"
                                                    value="bi bi-xbox" />
                                                <i class="bi bi-xbox"></i>
                                            </label>
                                            <label>
                                                <input type="radio" wire:model.defer='icon' name="rating"
                                                    value="bi bi-playstation" />
                                                <i class="bi bi-playstation"></i>
                                            </label>
                                            <label>
                                                <input type="radio" wire:model.defer='icon' name="rating"
                                                    value="bi bi-coin" />
                                                <i class="bi bi-coin"></i>
                                            </label>
                                            <label>
                                                <input type="radio" wire:model.defer='icon' name="rating"
                                                    value="bi bi-paypal" />
                                                <i class="bi bi-paypal"></i>
                                            </label>
                                            <label>
                                                <input type="radio" wire:model.defer='icon' name="rating"
                                                    value="bi bi-envelope-fill" />
                                                <i class="bi bi-envelope-fill"></i>
                                            </label>
                                            <label>
                                                <input type="radio" wire:model.defer='icon' name="rating"
                                                    value="bi bi-heart-fill" />
                                                <i class="bi bi-heart-fill"></i>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" role="switch"
                                        wire:model.defer='visible' id="addMoreVisible">
                                    <label class="form-check-label">{{ __('Visible') }}</label>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                                    wire:click='closeModal()'>{{ __('Close') }}</button>
                                <button type="submit" class="btn btn-primary">{{ __('Save changes') }}</button>
                            </div>
                    </form>
                </div>
            </div>
        </div>
        @endif
    </div>
</div>
