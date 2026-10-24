@extends('layouts.app')

@section('title', 'Blog ' . $user->name)

@section('content')
    <section class="page-section portfolio mt-5" id="blog">
        <div class="container mt-5">
            <h2 class="page-section-heading text-center text-uppercase text-secondary mb-5">
                Blog Punya {{ $user->name }}
            </h2>

            {{-- Pesan sukses (sekali saja, di luar loop) --}}
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            {{-- Tombol CREATE --}}
            @auth
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createBlogModal">
                    CREATE BLOG
                </button>
            @endauth

            {{-- ===== DAFTAR BLOG ===== --}}
            <div class="row mt-4">
                @forelse ($blogs as $blog)
                    <div class="col-md-4 mb-2 mt-3">
                        <div class="card h-100 shadow-sm">
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title mb-2">{{ $blog->title }}</h5>
                                <p class="card-subtitle mb-2 text-muted">by {{ $blog->author->name }}</p>
                                <p class="card-text">{{ Str::limit($blog->body, 150) }}</p>

                                {{-- Tombol di pojok kiri bawah --}}
                                <div class="mt-auto d-flex flex-wrap gap-2">
                                    <a href="/blog/{{ $blog->slug }}" class="btn btn-sm btn-outline-primary">Baca</a>

                                    @auth
                                        @if (auth()->id() === $blog->author_id)
                                            <button type="button" class="btn btn-sm btn-warning" data-bs-toggle="modal"
                                                data-bs-target="#editBlogModal{{ $blog->id }}">
                                                Edit
                                            </button>

                                            <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                                data-bs-target="#deleteBlogModal{{ $blog->id }}">
                                                Hapus
                                            </button>
                                        @endif
                                    @endauth
                                </div>
                            </div>
                        </div>
                    </div>

                    @auth
                        @if (auth()->id() === $blog->author_id)
                            {{-- ===== MODAL EDIT milik blog ini ===== --}}
                            <div class="modal fade" id="editBlogModal{{ $blog->id }}" tabindex="-1"
                                aria-labelledby="editBlogLabel{{ $blog->id }}" aria-hidden="true">
                                <div class="modal-dialog">
                                    <form action="/blog/{{ $blog->id }}" method="POST" class="modal-content">
                                        @csrf
                                        @method('PUT')

                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="editBlogLabel{{ $blog->id }}">Edit Blog</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="mb-3">
                                                <label for="edit-title-{{ $blog->id }}" class="col-form-label">Judul Blog :</label>
                                                <input type="text" name="title" id="edit-title-{{ $blog->id }}"
                                                    class="form-control" value="{{ $blog->title }}">
                                            </div>
                                            <div class="mb-3">
                                                <label for="edit-category-{{ $blog->id }}" class="col-form-label">Category :</label>
                                                <select name="category_id" id="edit-category-{{ $blog->id }}"
                                                    class="form-select">
                                                    <option value="">Choose...</option>
                                                    @foreach ($categories ?? [] as $category)
                                                        <option value="{{ $category->id }}" @selected($blog->category_id == $category->id)>
                                                            {{ $category->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label for="edit-body-{{ $blog->id }}" class="col-form-label">Isi Blog :</label>
                                                <textarea name="body" id="edit-body-{{ $blog->id }}" class="form-control" rows="10">{{ $blog->body }}</textarea>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Batal</button>
                                            <button type="submit" class="btn btn-primary">Update</button>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            {{-- ===== MODAL HAPUS milik blog ini ===== --}}
                            <div class="modal fade" id="deleteBlogModal{{ $blog->id }}" tabindex="-1"
                                aria-labelledby="deleteBlogLabel{{ $blog->id }}" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <form action="/about/{{ $blog->id }}" method="POST" class="modal-content">
                                        @csrf
                                        @method('DELETE')

                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="deleteBlogLabel{{ $blog->id }}">Hapus Blog?</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Yakin mau menghapus blog <strong>{{ $blog->title }}</strong>? Tindakan ini tidak
                                            bisa dibatalkan.
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Batal</button>
                                            <button type="submit" class="btn btn-danger">Ya, Hapus</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        @endif
                    @endauth
                @empty
                    <p>Penulis ini belum menulis artikel.</p>
                @endforelse
            </div>
        </div>
    </section>

    {{-- ===== MODAL CREATE (1x saja, di luar loop) ===== --}}
    @auth
        <div class="modal fade" id="createBlogModal" tabindex="-1" aria-labelledby="createBlogLabel" aria-hidden="true">
            <div class="modal-dialog">
                <form action="/blog" method="POST" class="modal-content">
                    @csrf

                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="createBlogLabel">New Blog</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="create-title" class="col-form-label">Judul Blog :</label>
                            <input type="text" name="title" id="create-title" class="form-control"
                                value="{{ old('title') }}" placeholder="Tulis judul Anda di sini...">
                        </div>
                        <div class="mb-3">
                            <label for="create-category" class="col-form-label">Category :</label>
                            <select name="category_id" id="create-category" class="form-select">
                                <option value="">Choose...</option>
                                @foreach ($categories ?? [] as $category)
                                    <option value="{{ $category->id }}" @selected(old('category_id') == $category->id)>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="create-body" class="col-form-label">Isi Blog :</label>
                            <textarea name="body" id="create-body" class="form-control" rows="10"
                                placeholder="Tulis berita Anda di sini...">{{ old('body') }}</textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    @endauth
@endsection