@extends('layouts.app')
@section('page-title', 'Home')
@section('content')
<div class="container-custom">
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

    <!-- <div class="box mt-2">
        <dashboard :requests="{{$requests}}"></dashboard>
    </div> -->

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
            <li>
            {{$paid_leaves}} pengajuan cuti
            </li>
            <li>
            {{$attendance_reports}} pengajuan lembur
            </li>
        </ul>
    </div>
</div>
@endsection

