@extends('layouts.app')

@section('title', 'Blog ' . $user->name)

@section('content')
    <section class="page-section portfolio mt-5" id="blog">
        <div class="container mt-5">
            <h2 class="page-section-heading text-center text-uppercase text-secondary mb-5">
                Blog Punya {{ $user->name }}
            </h2>

            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createBlogModal">
                CREATE BLOG
            </button>

            {{-- ===== DAFTAR BLOG ===== --}}
            <div class="row mt-4">
                @forelse ($blogs as $blog)
                    <div class="col-md-4 mb-2 mt-3">
                        <div class="card h-100 shadow-sm">
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title">{{ $blog->title }}</h5>
                                <p class="card-subtitle mb-2 text-muted">by {{ $blog->author->name }}</p>
                                <p class="card-subtitle mb-2 text-muted">category: {{ $blog->category->name }}</p>
                                <p class="card-text">{{ Str::limit($blog->body, 150) }}</p>

                                {{-- Tombol aksi di bawah kartu --}}
                                <div class="mt-auto d-flex flex-wrap gap-2">
                                    {{-- BACA: pindah ke halaman baca --}}
                                    <a href="/blog/{{ $blog->slug }}" class="btn btn-sm btn-outline-primary">
                                        Baca
                                    </a>

                                    {{-- EDIT: buka modal edit, data kartu dikirim lewat data-* --}}
                                    <button type="button" class="btn btn-sm btn-warning" data-bs-toggle="modal"
                                        data-bs-target="#editBlogModal" data-title="{{ $blog->title }}"
                                        data-category="{{ $blog->category_id }}" data-body="{{ $blog->body }}">
                                        Edit
                                    </button>

                                    {{-- HAPUS: buka modal konfirmasi --}}
                                    <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                        data-bs-target="#deleteBlogModal" data-title="{{ $blog->title }}">
                                        Hapus
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <p>Penulis ini belum menulis artikel.</p>
                @endforelse
            </div>
        </div>
    </section>

    {{-- ===== MODAL CREATE (1x saja) ===== --}}
    <div class="modal fade" id="createBlogModal" tabindex="-1" aria-labelledby="createBlogLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="createBlogLabel">New Blog</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="create-title" class="col-form-label">Judul Blog :</label>
                        <input type="text" id="create-title" class="form-control"
                            placeholder="Tulis judul Anda di sini...">
                    </div>
                    <div class="mb-3">
                        <label for="create-category" class="col-form-label">Category :</label>
                        <select id="create-category" class="form-select">
                            <option selected>Choose...</option>
                            <option>Option 1</option>
                            <option>Option 2</option>
                            <option>Option 3</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="create-body" class="col-form-label">Isi Blog :</label>
                        <textarea id="create-body" class="form-control" rows="10" placeholder="Tulis berita Anda di sini..."></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>

    {{-- ===== MODAL EDIT (1x saja, isinya diisi otomatis oleh JS) ===== --}}
    <div class="modal fade" id="editBlogModal" tabindex="-1" aria-labelledby="editBlogLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="editBlogLabel">Edit Blog</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="edit-title" class="col-form-label">Judul Blog :</label>
                        <input type="text" id="edit-title" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="edit-category" class="col-form-label">Category :</label>
                        <select id="edit-category" class="form-select">
                            <option value="">Choose...</option>
                            <option value="1">Option 1</option>
                            <option value="2">Option 2</option>
                            <option value="3">Option 3</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="edit-body" class="col-form-label">Isi Blog :</label>
                        <textarea id="edit-body" class="form-control" rows="10"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>

    {{-- ===== MODAL HAPUS (konfirmasi, 1x saja) ===== --}}
    <div class="modal fade" id="deleteBlogModal" tabindex="-1" aria-labelledby="deleteBlogLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="deleteBlogLabel">Hapus Blog?</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Yakin mau menghapus blog <strong id="delete-title"></strong>? Tindakan ini tidak bisa dibatalkan.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-danger">Ya, Hapus</button>
                </div>
            </div>
        </div>
    </div>

    {{-- ===== JS: isi modal sesuai kartu yang diklik ===== --}}
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const editModal = document.getElementById('editBlogModal');
            editModal.addEventListener('show.bs.modal', (event) => {
                const btn = event.relatedTarget; // tombol Edit yang diklik
                editModal.querySelector('#edit-title').value = btn.dataset.title;
                editModal.querySelector('#edit-category').value = btn.dataset.category;
                editModal.querySelector('#edit-body').value = btn.dataset.body;
            });

            const deleteModal = document.getElementById('deleteBlogModal');
            deleteModal.addEventListener('show.bs.modal', (event) => {
                deleteModal.querySelector('#delete-title').textContent = event.relatedTarget.dataset.title;
            });
        });
    </script>
@endsection