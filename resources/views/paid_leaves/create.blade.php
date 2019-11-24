@extends('layouts.app')
@section('page-title', 'Create')

@section('content')

    <div class="container">
        <h1 class="title">Create Paid Leave</h1>
        <div class="box">
            <form method="post" action="{{ route('paid_leaves.store') }}">
                @csrf
                <div class="field">
                    <div class="control">
                        <div class="columns">
                            <div class="column is-6">
                                <input type="date" class="input" name="start_date">
                            </div>
                            <div class="column is-6">                        
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

                <button type="submit" class="button is-primary">Buat</button>
            </form>
        </div>
    </div>
    
@endsection
