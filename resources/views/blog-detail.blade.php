@extends('layouts.app')

@section('title', 'Halaman  Blog Detail')

@section('content')
    <section class="page-section mt-5">
        <div class="container mt-5">
            <h1 class="text-uppercase text-secondary text-center mb-4">{{ $blogs->title }}</h1>
            <p class="text-muted">Ditulis oleh {{ $blogs->author->name }}</p>
            <hr>
            <p>{{ $blogs->body }}</p>
            {{-- <a href="{{ url('/blog') }}" class="btn btn-secondary mt-4">Kembali ke Blog</a> --}}
                <a href="{{ url()->previous() }}" class="btn btn-secondary mt-4">
            &larr; Kembali
        </a>
        </div>
    </section>
@endsection