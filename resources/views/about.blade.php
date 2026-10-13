@extends('layouts.app')

@section('title', 'Halaman About')

@section('content')
<section class="page-section portfolio mt-5" id="blog">
        <div class="container mt-5">
            <h2 class="page-section-heading text-center text-uppercase text-secondary mb-5">Blog Punya {{ $user->name }}</h2>
          <div class="row mt-4">
            @forelse ($blogs as $blog)
                <div class="col-md-4 mb-4">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">{{ $blog->title }}</h5>
                            <p class="card-text">{{ Str::limit($blog->body, 1000000) }}</p>
                            {{-- <a href="{{ url('/blog/' . $blog->slug) }}" class="btn btn-primary btn-sm">Baca Selengkapnya</a> --}}
                        </div>
                    </div>
                </div>
            @empty
                <p>Penulis ini belum menulis artikel.</p>
            @endforelse
        </div>
        </div>
    </section>
@endsection