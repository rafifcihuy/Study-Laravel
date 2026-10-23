@extends('layouts.app')

@section('title', 'Halaman About')

@section('content')
    <section class="page-section portfolio mt-5" id="blog">
        <div class="container mt-5">
            <h2 class="page-section-heading text-center text-uppercase text-secondary mb-5">Blog Punya {{ $user->name }}
            </h2>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"
                data-bs-whatever="@mdo">CREATE BLOG</button>
            <div class="modal fade mt-3" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">New Blog</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form>
                                <div class="mb-3">
                                    <label for="recipient-name" class="col-form-label ">Judul Blog :</label>
                                    <input type="text" class="form-control" id="recipient-name"
                                        placeholder="Tulis Judul Anda di sini...">
                                </div>
                                <div class="mb-3">
                                    <label for="inputState" class="col-form-label">Category :</label>
                                    <select id="inputState" class="form-select">
                                        <option selected>Choose...</option>
                                        <option>Option 1</option>
                                        <option>Option 2</option>
                                        <option>Option 3</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="message-text" class="col-form-label">Isi Blog :</label>
                                    <textarea style="width: 100%; height: 400px; padding: 12px; font-size: 16px;"
                                        placeholder="Tulis berita Anda di sini..."></textarea>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Send message</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-4">
                @forelse ($blogs as $blog)
                    <div class="col-md-4 mb-2 mt-3">
                        <div class="card h-100 shadow-sm">
                            <div class="card-body">
                                <h5 class="card-title">{{ $blog->title }}</h5>
                                <a class="card-subtitle mb-2 text-muted mt-4 hover:underline card-title">by
                                    {{ $blog->author->name }}</a>
                                <p class="card-text">{{ Str::limit($blog->body, 1000000) }}</p>
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal" data-bs-whatever="@mdo">CREATE BLOG</button>
                                <div class="modal fade mt-3" id="exampleModal" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">New Blog</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form>
                                                    <div class="mb-3">
                                                        <label for="recipient-name" class="col-form-label ">Judul Blog
                                                            :</label>
                                                        <input type="text" class="form-control" id="recipient-name"
                                                            placeholder="Tulis Judul Anda di sini...">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="inputState" class="col-form-label">Category :</label>
                                                        <select id="inputState" class="form-select">
                                                            <option selected>Choose...</option>
                                                            <option>Option 1</option>
                                                            <option>Option 2</option>
                                                            <option>Option 3</option>
                                                        </select>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="message-text" class="col-form-label">Isi Blog :</label>
                                                        <textarea style="width: 100%; height: 400px; padding: 12px; font-size: 16px;"
                                                            placeholder="Tulis berita Anda di sini..."></textarea>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger"
                                                    data-bs-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-primary">Send message</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal" data-bs-whatever="@mdo">CREATE BLOG</button>
                                <div class="modal fade mt-3" id="exampleModal" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">New Blog</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form>
                                                    <div class="mb-3">
                                                        <label for="recipient-name" class="col-form-label ">Judul Blog
                                                            :</label>
                                                        <input type="text" class="form-control" id="recipient-name"
                                                            placeholder="Tulis Judul Anda di sini...">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="inputState" class="col-form-label">Category :</label>
                                                        <select id="inputState" class="form-select">
                                                            <option selected>Choose...</option>
                                                            <option>Option 1</option>
                                                            <option>Option 2</option>
                                                            <option>Option 3</option>
                                                        </select>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="message-text" class="col-form-label">Isi Blog :</label>
                                                        <textarea style="width: 100%; height: 400px; padding: 12px; font-size: 16px;"
                                                            placeholder="Tulis berita Anda di sini..."></textarea>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger"
                                                    data-bs-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-primary">Send message</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal" data-bs-whatever="@mdo">CREATE BLOG</button>
                                <div class="modal fade mt-3" id="exampleModal" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">New Blog</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form>
                                                    <div class="mb-3">
                                                        <label for="recipient-name" class="col-form-label ">Judul Blog
                                                            :</label>
                                                        <input type="text" class="form-control" id="recipient-name"
                                                            placeholder="Tulis Judul Anda di sini...">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="inputState" class="col-form-label">Category :</label>
                                                        <select id="inputState" class="form-select">
                                                            <option selected>Choose...</option>
                                                            <option>Option 1</option>
                                                            <option>Option 2</option>
                                                            <option>Option 3</option>
                                                        </select>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="message-text" class="col-form-label">Isi Blog :</label>
                                                        <textarea style="width: 100%; height: 400px; padding: 12px; font-size: 16px;"
                                                            placeholder="Tulis berita Anda di sini..."></textarea>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger"
                                                    data-bs-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-primary">Send message</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{--  --}}
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
