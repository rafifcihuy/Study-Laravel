@extends('layouts.app')

@section('title', 'Halaman Contact')

@section('content')
        <section class="page-section portfolio mt-5" id="contact">
            <div class="container mt-5">
                <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Nama : {{ $user->name }}</h2>
                <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Username : {{ $user->username }}</h2>
                <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Email : {{ $user->email }}</h2>
                </div>
            </div>
        </section>
@endsection