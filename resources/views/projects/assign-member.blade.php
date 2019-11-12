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
                <input style="display:none;"type="text" class="input" name="start_date" value="{{ $project->start_date }}"/>
                <input style="display:none;"type="text" class="input" name="end_date" value="{{ $project->end_date }}"/>
                
                
                <!-- <div id="app">
                    <add-project-member></add-project-member>
                </div> -->
                <table class="table">
                    <tr>
                        <th></th>
                        <th>Nama</th>
                        <th>Departemen</th>
                        <th>Aksi</th>
                    </tr>
                    @foreach($users as $user)
                    <tr>
                        <td>
                            <label class="checkbox">
                                <input type="checkbox" value="{{$user->id}}" name="selected[]"> Remember me
                            </label>
                        </td>
                        <td>{{$user->name}}</td>
                        <td></td>
                        <td></td>
                    </tr>
                    @endforeach
                </table>
                <button type="submit" class="button is-primary">Simpan</button>
            </form>
        </div>
    </div>
    
@endsection
