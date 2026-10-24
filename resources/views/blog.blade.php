@extends('layouts.app')

@section('title', 'Halaman Blog')

@section('content')

    <section class="page-section portfolio mt-5" id="blog">
        <div class="container mt-5">
            <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Blog</h2>
            <div class="row mt-5">
                @forelse ($blogs as $blog)
                    <div class="col-md-4 mb-4">
                        <div class="card h-100 shadow-sm">
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title text-center mb-2">{{ $blog->title }}</h5>
                                <a class="card-subtitle text-muted mb-3">by {{ $blog->author->name }}</a>

                                <h6 class="text-secondary mb-1">Category:</h6>
                                <a class="text-muted">{{ $blog->category->name }}</a>
                                <div class="fw-bold mb-2">{{ $blog->created_at->format('d M Y') }}</div>

                                <p class="card-text">{{ Str::limit($blog->body, 100) }}</p>

                                <div class="mt-auto">
                                    <a href="/blog/{{ $blog->slug }}" class="btn btn-sm btn-primary">Baca Selengkapnya</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <p class="text-center">Belum ada blog yang ditulis.</p>
                @endforelse
                <div class="d-flex justify-content-center mt-4">
                    {{ $blogs->links('pagination::bootstrap-5') }}
                </div>
            </div>
        </div>
    </section>
@endsection
