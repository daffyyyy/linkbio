@extends('layouts.app')

@section('page-title')
{{ __('User profile') }}
@endsection
@section('page-description')
{{ __('Welcome to your user profile, you can modify your profile information here') }}
@endsection

@section('content')
    <livewire:user.edit-profile />
@endsection
