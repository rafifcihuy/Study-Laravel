@extends('layouts.app')

@section('title', 'Halaman Home')

@section('content')
        {{-- @forelse ($users as $user) --}}
        <section class="page-section portfolio mt-5" id="home">
            <div class="container mt-5">
                <h2 class="page-section-heading text-center text-uppercase text-secondary mb-5">{{ $judul }}</h2>
                <h2 class="page-section-heading text-center text-uppercase text-secondary">Welcome to {{ $users->name }}</h2>
                <h2 class="page-section-heading text-center text-uppercase text-secondary">Welcome to {{ $kontol->name }}</h2>
                </div>
            </div>
        </section>
        {{-- @endforelse --}}
@endsection