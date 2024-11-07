@extends('admin.layouts.app')

@section('main')
    <section class="section">
        <div class="section-header">
            <h1>Dashboard</h1>
        </div>

        <div class="section-body">
            <div class="card">
                <div class="card-body text-dark text-center">
                    <p class="text-bold h5">Kita tidak bisa menyelesaikan masalah dengan menggunakan jenis pemikiran yang
                        sama
                        dengan ketika kita menciptakannya. - Albert Einstein</p>
                </div>

                <div class="card-footer">
                    <table class="text-bold table text-center table-bordered">
                        <thead>
                            <th colspan="4" class="h2">Rekap Data Todo List {{ auth()->user()->name }}</th>
                        </thead>
                        <thead>
                            <th>Created</th>
                            <th>In Proggress</th>
                            <th>Pending</th>
                            <th>Completed</th>
                        </thead>
                        <tbody>
                            <td>{{ $taskCreated }}</td>
                            <td>{{ $taskProggress }}</td>
                            <td>{{ $taskPending }}</td>
                            <td>{{ $taskCompleted }}</td>
                        </tbody>
                        <tfoot>
                            <td colspan="3">Total</td>
                            <td>{{ $taskTotal }}</td>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection
