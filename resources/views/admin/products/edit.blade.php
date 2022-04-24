@extends('layouts.app')
@section('content')
    @include('admin.includes.flash-message')
    @include('admin.includes.errors')
    <div class="card">
        <div class="card-header">
            Edit Post <strong>{{ $product->InvoiceNo }}</strong>
        </div>
        <div class="card-body">
            <form action="{{ route('item.update',$product->id) }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="Description">Description</label>
                    <input type="text" class="form-control" name="description" value="{{ $product->Description }}">
                </div>
                <div class="form-group">
                    <label for="InvoiceNo">InvoiceNo</label>
                    <input type="text" class="form-control" name="invoiceno" value="{{ $product->InvoiceNo }}">
                </div>
                <div class="form-group">
                    <label for="StockCode">StockCode</label>
                    <input type="text" class="form-control" name="stockcode" value="{{ $product->StockCode }}">
                </div>
                <div class="form-group">
                    <label for="Quantity">Quantity</label>
                    <input type="text" class="form-control" name="quantity" value="{{ $product->Quantity }}">
                </div>
                <div class="form-group">
                    <label for="InvoiceDate">InvoiceDate</label>
                    <input type="text" class="form-control" name="invoicedate" value="{{ $product->InvoiceDate }}">
                </div>
                <div class="form-group">
                    <label for="UnitPrice">UnitPrice</label>
                    <input type="text" class="form-control" name="unitprice" value="{{ $product->UnitPrice }}">
                </div>
                <div class="form-group">
                    <label for="Description">CustomerID</label>
                    <input type="text" class="form-control" name="customerid" value="{{ $product->CustomerID }}">
                </div>
                <div class="form-group">
                    <label for="Country">Country</label>
                    <input type="text" class="form-control" name="country" value="{{ $product->Country }}">
                </div>
                <button class="btn btn-info float-right" type="submit">Update Item</button>
            </form>
        </div>
    </div>
@endsection
