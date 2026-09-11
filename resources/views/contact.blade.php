@extends('layouts.app')

@section('title', 'Halaman Contact')

@section('content')
        <section class="page-section portfolio mt-5" id="contact">
            <div class="container mt-5">
                <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">{{ $contact }}</h2>
                @forelse ($email as $mail)
                <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">{{ $mail->email }}</h2>
                </div>
                  @empty
            <tr>
                <td colspan="2">Data belum tersedia.</td>
            </tr>
                @endforelse
            </div>
        </section>
@endsection