@extends('layouts.app')
@section('page-title', 'Edit')

@section('content')

    <div class="container">
        <h1 class="title">Update Project</h1>
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

            <form method="post" action="{{ route('projects.update', $project->id) }}">
                @method('PATCH')
                @csrf
                <div class="field">
                    <div class="control">
                        <input type="text" class="input" name="name" value="{{ $project->name }}" placeholder="Nama Proyek"/>
                    </div>
                </div>
                <div class="field">
                    <div class="control">
                        <textarea class="textarea" name="description"placeholder="Deskripsi">{{ $project->description }}</textarea>
                    </div>
                </div>
                <div class="field">
                    <div class="control">
                        <div class="select is-fullwidth">
                            <select name="customer_id" id="">
                                <option value="" disabled=true>-- Pilih Customer --</option>
                                @foreach($customers as $customer)
                                <option value="{{$customer->id}}" {{ $project->customer_id == $customer->id ? 'selected' : '' }}>{{$customer->company_name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="field">
                    <div class="control">
                        <div class="columns">
                            <div class="column is-6">
                                <input type="date" class="input" name="start_date" value="{{ $project->start_date }}" />
                            </div>
                            <div class="column is-6">                        
                                <input type="date" class="input" name="end_date" value="{{ $project->end_date }}" />
                            </div>
                        </div>
                    </div>
                </div>

                <button type="submit" class="button is-primary">Simpan</button>
            </form>
        </div>
    </div>
    
@endsection
