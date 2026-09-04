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
                            <div class="card-body">
                                <h5 class="card-title text-center ">{{ $blog->title }}</h5>
                                <a href="/author/{{ $blog->author_id }}" class="card-subtitle mb-2 text-muted mt-4 hover:underline">by {{ $users->where('id', $blog->author_id)->first()->name }}</a>
                                {{-- <h6 class="card-subtitle mb-2 text-muted mt-4">by {{ $blog->author_id->name }}</h6> --}}
                                <h6 class="card-subtitle mb-2 text-muted text-start">
                                    {{ $blog->created_at->format('d M Y') }}</h6>
                                <p class="card-text">{{ Str::limit($blog->body, 75) }}</p>
                                <a href="{{ url('/blog/' . $blog->slug) }}" class="btn btn-primary btn-sm">Baca
                                    Selengkapnya</a>
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
