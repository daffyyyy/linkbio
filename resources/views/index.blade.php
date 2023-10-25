@extends('layouts.app')

@section('content')
<div class="w-100 overflow-hidden position-relative bg-black text-white" data-aos="fade">
    <div class="position-absolute w-100 h-100 bg-black opacity-75 top-0 start-0"></div>
    <div class="container position-relative px-vw-5 text-center">
        <div class="row d-flex align-items-center justify-content-center py-vh-2">
            <div class="col-12 col-xl-10">
                <span class="h5 text-secondary fw-lighter">Make links simple</span>
                <h1 class="display-huge mt-3 mb-3 lh-1">The most important links in one place</h1>
            </div>
            <div class="col-12 col-xl-8">
                <p class="lead text-secondary">We allow you to create your own page with the links that are most
                    important to you, which you can share with others!</p>
            </div>
            <div class="col-12 text-center">
                @guest
                <a href="#" class="btn btn-xl btn-light">Try
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-arrow-right" viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                            d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z" />
                    </svg>
                </a>
                @endguest
            </div>
        </div>
    </div>

</div>

@endsection
