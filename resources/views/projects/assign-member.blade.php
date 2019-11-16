@extends('layouts.app')
@section('page-title', 'Edit')

@section('content')

    <div class="container">
        <h1 class="title">Assign Project Member</h1>
        <div class="box">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div><br />
            @endif

            <form method="post" action="/projects/{{$project->id}}/store-assign-member">
                @method('PUT')
                @csrf
                <input style="display:none;"type="text" class="input" name="name" value="{{ $project->name }}"/>
                <input style="display:none;"type="text" class="input" name="description" value="{{ $project->description }}"/>
                <input style="display:none;"type="text" class="input" name="customer_id" value="{{ $project->customer_id }}"/>
                <input style="display:none;"type="text" class="input" name="address" value="{{ $project->address }}"/>
                <input style="display:none;"type="text" class="input" name="start_date" value="{{ $project->start_date }}"/>
                <input style="display:none;"type="text" class="input" name="end_date" value="{{ $project->end_date }}"/>
                
                <div class="columns">
                    <div class="column is-1">
                    </div>
                    <div class="column has-text-weight-bold">Nama</div>
                    <div class="column">Departemen</div>
                    <div class="column">Aksi</div>
                </div>
                @foreach($users as $user)
                <div class="columns">
                    <div class="column is-1 is-flex justify-content-center align-items-center">
                        <label style="width:100%;height:100%;"class="checkbox is-flex justify-content-center align-items-center">
                            <input type="checkbox" value="{{$user->id}}" name="selected[]">
                        </label>
                    </div>
                    <div class="column">{{$user->name}}</div>
                    <div class="column"></div>
                    <div class="column"></div>
                </div>
                @endforeach
                <button type="submit" class="button is-primary">Simpan</button>
            </form>
        </div>
    </div>
    
@endsection
