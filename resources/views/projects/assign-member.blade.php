@extends('layouts.app')
@section('page-title', 'Assign Member')

@section('content')

    <div class="container-custom">
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

            <assign-member :project="{{$project}}" :users="{{$users}}" inline-template>
                <div>
                    <div class="columns">
                        <div class="column is-1"></div>
                        <div class="column is-2 has-text-weight-bold">Nama</div>
                        <div class="column is-2 has-text-weight-bold">Role</div>
                        <div class="column is-4 has-text-weight-bold">Skill</div>
                    </div>
    
                    <assign-member-item :data-user="user" :project-id="project.id" v-for="user in users" :key="user.id"></assign-member-item>
                    
                    <div class="is-flex justify-content-end">
                        <button type="button" @click="submit()" class="button is-primary">Simpan</button>
                    </div>
                </div>
            </assign-member>
        </div>
    </div>
    
@endsection
