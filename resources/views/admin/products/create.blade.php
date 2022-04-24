@extends('layouts.app')
@section('content')
    @include('admin.includes.flash-message')
    @include('admin.includes.errors')
    <div class="card">
        <div class="card-header">
            Upload Excel File
        </div>
        <div class="card-body">
            <form action="{{ route('sale.store') }}" method="post" enctype='multipart/form-data'>
                @csrf
                <div class="form-group">
                    <label for="Descrition">Description</label>
                    <input type="text" class="form-control" name="description" placeholder="Enter the Description">
                </div>
                <form>
                <div class="form-group">
                    <label for="uploadfile">Upload Excel File</label>
{{--                    <input type="file" class="form-control-file" name="excelfile">--}}
                    <input type="file" class="form-control-file" name="mycsv">
                </div>
                <button class="btn btn-info float-right" type="submit">Upload File</button>
            </form>
        </div>
    </div>
@endsection
