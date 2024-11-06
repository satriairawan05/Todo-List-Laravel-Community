@extends('admin.layouts.app')

@section('main')
    <section class="section">
        <div class="section-header">
            <h1>Dashboard</h1>
        </div>

        <div class="section-body">
            <div class="card card-body text-dark">
                <p class="text-bold h2 text-center">Welcome, {{ auth()->user()->name }}</p>
                <p class="text-bold h5">Kita tidak bisa menyelesaikan masalah dengan menggunakan jenis pemikiran yang sama
                    dengan ketika kita menciptakannya. - Albert Einstein</p>
            </div>
        </div>
    </section>
@endsection
