@extends('layouts.app')
@section('page-title', 'Edit')

@section('content')

    <div class="container">
        <h1 class="title">Assign Project Member dari {{$project->department->name}}</h1>
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
                
                <div class="columns">
                    <div class="column is-1"></div>
                    <div class="column is-2 has-text-weight-bold">Nama</div>
                    <div class="column is-2 has-text-weight-bold">Role</div>
                    <div class="column is-4 has-text-weight-bold">Skill</div>
                </div>

                @foreach($users as $key=>$user)
                <div class="columns">
                    <div class="column is-1 is-flex justify-content-center align-items-center">
                        <label style="width:100%;height:100%;"class="checkbox is-flex justify-content-center align-items-center">
                            <input type="checkbox" value="{{$user->id}}" name="selected[]">
                        </label>
                    </div>
                    <div class="column is-2 is-flex align-items-center">
                        <a href="/users/{{$user->id}}">
                            {{$user->name}}
                        </a>
                    </div>
                    <div class="column is-2">
                        <input type="text" class="input">
                    </div>
                    <div class="column is-4 is-flex">
                        @foreach($user->skills as $skill)
                            <div class="is-flex align-items-center">
                                <button type="button" class="button is-small is-info">
                                    {{$skill->skill->name}}
                                </button>
                                <div class="ml-0-5 mr-1 is-flex align-items-center justify-content-center">
                                    {{$skill->level}}<i class="material-icons has-text-warning">star</i>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                @endforeach
                <div class="is-flex justify-content-end">
                    <button type="submit" class="button is-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
    
@endsection
