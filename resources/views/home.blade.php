@extends('layouts.app')
@section('page-title', 'Home')
@section('content')
<div style="padding-left:11rem;" class="pr-2">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                <p class="card-header-title">
                    {{ __('Dashboard') }}
                </p>
                </div>

            </div>
        </div>
    </div>

    <div class="mt-2 box">
        Saat ini anda memiliki:<br>
        <ul>
            <li>
            {{$divisions}} divisi
            </li>
            <li>
            {{$departments}} departemen
            </li>
            <li>
            {{$projects}} proyek
            </li>
            <li>
            {{$requests}} request peminjaman karyawan
            </li>
        </ul>
    </div>
</div>
@endsection
