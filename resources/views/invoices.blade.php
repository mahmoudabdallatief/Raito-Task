@extends('layouts.app')

@section('content')
<div class="container">
    
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"> الفواتير</div>

                <div class="card-body">
                <table class="styled-table" dir="rtl">
  <thead>
    <tr>
      <th>إسم العميل باللغة العربية</th>
      <th>إسم العميل باللغة الإنجليزية</th>
      <th>إسم المنتج باللغة العربية</th>
      <th>إسم المنتج باللغة الإنجليزية</th>
      <th>سعر المنتج</th>
      <th>الكمية</th>
      <th>تاريخ الفاتورة</th>
      <th>الإجمالي</th>
    </tr>
  </thead>
  <tbody>
    @foreach($invoices as $invoice)
      <tr>
        <td>{{$invoice->client->name_ar}}</td>
        <td>{{$invoice->client->name}}</td>
        <td>{{$invoice->product->name_ar}}</td>
        <td>{{$invoice->product->name_en}}</td>
        <td>{{$invoice->product->price}}</td>
        <td>{{$invoice->quantity}}</td>
        <td>{{$invoice->created_at}}</td>
        <td>{{$invoice->total}}</td>
      </tr>
    @endforeach
  </tbody>
  <tfoot>
    <tr class="footer">
    <td colspan="7" style="text-align: right;">
  <strong>إجمالي الإجمالي</strong>
</td>
<td>{{ $sum }}</td>
    </tr>
  </tfoot>
</table>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection