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
                                <a class="card-subtitle mb-2 text-muted mt-4 hover:underline card-title">by {{ $blog->author->name }}</a>
                            <p class="card-text">{{ Str::limit($blog->body, 1000000) }}</p>
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