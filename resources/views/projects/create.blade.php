@extends('layouts.app')
@section('page-title', 'Buat Proyek')

@section('content')

    <div class="container-custom">
        <h1 class="title">Buat Proyek</h1>
        <div class="box">
            <form method="post" action="{{ route('projects.store') }}">
                @csrf
                <div class="field">
                    <div class="control">
                        <input type="text" class="input" name="name" placeholder="Nama Proyek"/>
                    </div>
                </div>
                <div class="field">
                    <div class="control">
                        <textarea type="text" class="textarea" name="description" placeholder="Deskripsi"></textarea>
                    </div>
                </div>
                <div class="field">
                    <div class="control">
                        <div class="select is-fullwidth">
                            <select name="customer_id">
                                <option value="" disabled=true selected>-- Pilih Customer --</option>
                                @foreach($customers as $customer)
                                <option value="{{$customer->id}}">{{$customer->company_name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="field">
                    <div class="control">
                        <textarea type="text" class="textarea" name="address" placeholder="Alamat Proyek"></textarea>
                    </div>
                </div>
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
                        <div class="select is-fullwidth">
                            <select name="department_id">
                                <option value="" disabled=true selected>-- Pilih Departemen --</option>
                                @foreach($departments as $department)
                                <option value="{{$department->id}}">{{$department->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <button type="submit" class="button is-primary">Buat</button>
            </form>
        </div>
    </div>
    
@endsection
