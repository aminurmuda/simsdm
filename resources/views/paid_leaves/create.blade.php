@extends('layouts.app')
@section('page-title', 'Ajukan Cuti')

@section('content')

    <div class="container">
        <h1 class="title">Ajukan Cuti</h1>
        <div class="box">
            <form method="post" action="{{ route('paid_leaves.store') }}">
                @csrf
                <div class="field">
                    <div class="control">
                        <div class="columns">
                            <div class="column is-6">
                                <label class="label">Tanggal Mulai</label>
                                <input type="date" class="input" name="start_date">
                            </div>
                            <div class="column is-6">                        
                                <label class="label">Tanggal Selesai</label>
                                <input type="date" class="input" name="end_date">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="field">
                    <div class="control">
                        <textarea type="text" class="textarea" name="reason" placeholder="Alasan"></textarea>
                    </div>
                </div>
                <div class="is-flex justify-content-end">
                    <button type="submit" class="button is-primary">Ajukan Cuti</button>
                </div>
            </form>
        </div>
    </div>
    
@endsection
