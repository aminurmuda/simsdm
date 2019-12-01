@extends('layouts.app')
@section('page-title', 'Assign Project Manager')

@section('content')

    <div class="container-custom">
        <h1 class="title">Assign Project Manager</h1>
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

            <form method="post" action="/projects/{{$project->id}}/store-assign-manager">
                @method('PUT')
                @csrf
                <input style="display:none;"type="text" class="input" name="name" value="{{ $project->name }}"/>
                <input style="display:none;"type="text" class="input" name="description" value="{{ $project->description }}"/>
                <input style="display:none;"type="text" class="input" name="start_date" value="{{ $project->start_date }}"/>
                <input style="display:none;"type="text" class="input" name="end_date" value="{{ $project->end_date }}"/>

                <div class="field">
                    <div class="control">
                        <div class="select is-fullwidth">
                            <select name="manager_id" id="">
                                <option value="" disabled=true selected>-- Pilih Manager --</option>
                                @foreach($managers as $manager)
                                <option value="{{$manager->id}}" {{ $project->manager_id == $manager->id ? 'selected' : '' }}>{{$manager->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <button type="submit" class="button is-primary">Simpan</button>
            </form>
        </div>
    </div>
    
@endsection
