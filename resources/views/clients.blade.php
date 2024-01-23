@extends('layouts.app')

@section('content')
<div class="container">
    
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"> العملاء</div>

                <div class="card-body">
                <table class="styled-table" dir="rtl">
    <thead>
        <tr>
            
            <th>الإسم باللغة الإنجليزية</th>
            <th>الإسم باللغة العربية</th>
           
        </tr>
    </thead>
    <tbody>
        @foreach($clients as $client)
        <tr>
            <td>{{$client->name}}</td>
            <td>{{$client->name_ar}}</td>
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
