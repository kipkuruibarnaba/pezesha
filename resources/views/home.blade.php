@extends('layouts.app')

@section('content')
    @include('admin.includes.flash-message')
    @include('admin.includes.errors')
<div class="container">
        <div >
            <div class="card">
                <div class="card-header">{{ __('Customers Products') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                        <table class="table table-striped table-sm table-responsive">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Description</th>
                                <th scope="col">InvoiceNo</th>
                                <th scope="col">StockCode</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">InvoiceDate</th>
                                <th scope="col">UnitPrice</th>
                                <th scope="col">CustomerID</th>
                                <th scope="col">Country</th>
                                <th scope="col">Created at</th>
                                <th scope="col">Edit</th>
                                <th scope="col">Delete</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($products as $product)
                            <tr>
                                <th scope="row">
                                    <badge class="badge badge-info">
                                        {{$product->id}}
                                    </badge>
                                </th>
                                <td>{{$product->Description}}</td>
                                <td>{{$product->InvoiceNo}}</td>
                                <td>{{$product->StockCode}}</td>
                                <td>{{$product->Quantity}}</td>
                                <td>{{$product->InvoiceDate}}</td>
                                <td>{{$product->UnitPrice}}</td>
                                <td>{{$product->CustomerID}}</td>
                                <td>{{$product->Country}}</td>
                                <td>{{$product->create_at}}</td>
                                <td >
                                    <a href="{{ route('item.edit',$product ->id) }}" class="btn btn-warning">Edit</a>
                                </td>
                                <td >
                                    <a href="{{ route('item.delete',$product ->id) }}" class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    <div class="float-right">{{ $products->links('pagination::bootstrap-4') }}</div>
                </div>
            </div>
        </div>
</div>
@endsection
