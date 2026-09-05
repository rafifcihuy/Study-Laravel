@extends('layouts.app')

@section('title', 'Halaman  Blog Detail')

@section('content')
    <section class="page-section mt-5">
        <div class="container mt-5">
            <h1 class="text-uppercase text-secondary text-center">{{ $blog->title }}</h1>
            <p class="text-muted">Ditulis oleh {{ $blog->author }}</p>
            <hr>
            <p>{{ $blog->body }}</p>
            <a href="{{ url('/blog') }}" class="btn btn-secondary mt-4">Kembali ke Blog</a>
        </div>
    </section>
@endsection