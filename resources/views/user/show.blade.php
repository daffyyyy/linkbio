@extends('layouts.app')

@if ($user->design)
@section('styles')
@if ($user->design->custom_style)
<style>
    {!! $user->design->custom_style !!}
</style>
@endif
@endsection
@endif

@section('content')
<div class="row justify-content-center align-items-center align-content-center mb-3">
    <div class="col-md-8">

        <div class="card-body d-flex flex-column align-items-center justify-content-center mb-4">
            <img src="{{$user->avatar()}}" class="rounded-circle mb-2 shadow user-avatar" />
            <h5 class="fw-bold">{{$user->name}}</h5>
            @if ($user->bio)
            <p class="text-muted mb-1">{{$user->bio}}</p>
            @endif
            <div class="d-flex gap-5">
                @if ($user->location)
                <div class="d-flex gap-2">
                    <span class="p-0 m-0"><i class="bi bi-geo-alt-fill"></i></span>
                    <p class="p-0 m-0 fw-lighter">{{$user->location}}</p>
                </div>
                @endif
                @if ($user->contact)
                <div class="d-flex gap-2">
                    <span class="p-0 m-0"><i class="bi bi-envelope-fill"></i></span>
                    <p class="p-0 m-0 fw-lighter">{{$user->contact}}</p>
                </div>
                @endif
            </div>
        </div>
    </div>
    <div class=" d-flex flex-column align-items-center justify-content-center user-link-container">
        @foreach ($user->links as $link)
        @if ($link->visible)
        <a href="{{$link->url}}" data-track-id="{{$link->id}}">
            <div class="d-flex flex-column border border-light rounded btn-user-link mb-2 px-2 py-1 user-link-item">
                <div class="d-flex user-link-item-title">
                    @if ($link->icon)
                    <div class="me-2 user-link-item-icon">
                        <i class="{{$link->icon}}"></i>
                    </div>
                    @endif
                    <span>
                        {{$link->title}}
                    </span>
                </div>
                @if ($link->description)
                <p class="p-0 m-0 user-link-item-description">{{$link->description}}</p>
                @endif
            </div>
        </a>
        @endif
        @endforeach
    </div>
</div>
@endsection

@section('scripts')
<script src="https://code.jquery.com/jquery-3.7.1.min.js"
    integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script>
    $('a').click(function(event) {
    event.preventDefault();
    var link = $(this).attr('href');
    var track_id = $(this).attr('data-track-id');
    $.ajax({
        type: "POST",
        url: "/link-track",
        data: track_id,
        contentType: "application/json; charset=utf-8",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
            }).done(function () {
                window.location = link;
                   })
           .fail(function () {
            window.location = link;
                });
        });
</script>
@endsection
