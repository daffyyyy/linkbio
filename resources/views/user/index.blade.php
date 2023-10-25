@extends('layouts.app')

@section('page-title')
{{ __('User dashboard') }}
@endsection
@section('page-description')
{{ __('Welcome to your user dashboard, you can modify your link tab here') }}
@endsection

@section('content')
<div class="row my-3">
    <livewire:user.link-dashboard />
</div>

<div class="row my-3">
    <livewire:user.design-dashboard />
</div>
@endsection
