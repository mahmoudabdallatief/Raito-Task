@extends('layouts.app')

@section('content')
<div class="container">
    
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"> المنتجات</div>

                <div class="card-body">
                <table class="styled-table" dir="rtl">
    <thead>
        <tr>
            
            <th>إسم المنتج باللغة الإنجليزية</th>
            <th>إسم المنتج باللغة العربية</th>
            <th>سعر المنتج</th>
            <th>الكمية  </th>
        </tr>
    </thead>
    <tbody>
        @foreach($products as $product)
        <tr>
            <td>{{$product->name_en}}</td>
            <td>{{$product->name_ar}}</td>
            <td>{{$product->price}}</td>
           
            <td>
            <form action="{{route('add_quantity')}}" method ="POST">
                @csrf
                <input type="number" name="quantity" min="1" value=1>
                <input type="hidden" name="pro_id" value='{{$product->id}}'>
                <button class="btn btn-primary" type="submit">Add Product</button>
            </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection