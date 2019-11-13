@extends('layouts.app')
@section('page-title', 'Edit')

@section('content')

    <div class="container">
        <h1 class="title">Add Skills</h1>
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

            <form method="post" action="/users/{{$user->id}}/store-skill">
                @method('POST')
                @csrf
                
                <div class="field">
                    <div class="control">
                        <div class="select is-fullwidth">
                            <select name="skill_id" id="">
                                <option value="" disabled=true selected>-- Pilih Skill --</option>
                                @foreach($skills as $skill)
                                <option value="{{$skill->id}}">{{$skill->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="field">
                    <div class="control">
                        <input type="number" name="level" class="input"/>
                    </div>
                </div>
                <button type="submit" class="button is-primary">Tambah</button>
            </form>
        </div>
    </div>
    
@endsection
