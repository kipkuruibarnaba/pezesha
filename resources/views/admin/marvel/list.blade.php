@extends('layouts.app')
@section('content')
    <div class="card">
        <div class="card-header">
            Marvel Universe Characters
        </div>
        <div class="card-body">
            <table class="table table-bordered table-responsive">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Description</th>
                    <th scope="col">Date Modified</th>
                    <th scope="col">Stories</th>
                </tr>
                </thead>
                <tbody>
                @foreach($datas as $data)
                <tr>
                    <th scope="row">
                        <span class="badge badge-pill badge-success">{{ $loop->iteration }}
                        </span>
                    </th>
                    <td >{{@$data->id}}</td>
                    <td>{{@$data->name}}</td>
                    <td>{{@$data->description}}</td>
                    <td>{{\Carbon\Carbon::parse(@$data->modified)->format("Y-m-d H:i:s") }}</td>
                    <td>
                        <table class="table table-bordered">
                            <thead>
                            <tr class="bg-info">
                                <th>Name</th>
                                <th>Type</th>
                            </tr>
                            </thead>
                           @foreach($data->stories->items as $item)
                            <tr>
                                <td>{{@$item->name}}</td>
                                <td>{{@$item->type}}</td>
                            </tr>
                            @endforeach
                        </table>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
