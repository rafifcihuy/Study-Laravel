@extends('layouts.app')

@section('title', 'Halaman About')

@section('content')
        {{-- @forelse ($deskripsi as $oke) --}}
        <section class="page-section portfolio mt-5" id="about">
            <div class="container mt-5">
                {{-- <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">{{ $judul }}</h2> --}}
                <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Nama pertama :{{ $nama->name }}</h2>
                <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Deskripsi : {{ $deskripsi->body }}</h2>
                <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Penulis :   {{ $deskripsi->author->name }}</h2>
                {{-- <p class="lead">{{ $oke->body }}</p> --}}
            </div>
        </section>
        {{-- @endforelse --}}
@endsection