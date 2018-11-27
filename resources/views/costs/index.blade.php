@extends('layout.layout')

@section('title','Pengeluaran')

@section('content')

<div class="box-body">
<a href="{{ route('tambah_pengeluaran') }}">Tambah</a>
    <div class="table-responsive">
        <table class="table no-margin">
            <thead class="thead-light">
                <tr>
                    <th>Name</th>
                    <th>Qty</th>
                    <th>Value</th>
                    <th>Total</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>

              {{-- ambil data yg di pass dari fungsi index di CostController --}}
                @foreach($costs as $cost)
                <tr>
                    <td>{{$cost->name}}</td>
                    <td>{{$cost->qty}}</td>
                    <td>Rp. {{number_format($cost->value,0,",",".")}}</td>
                    <td>Rp. {{number_format($cost->total,0,",",".")}}</td>
                    <td><img style="width:100px; height:100px;" src="/{{$cost->image}}"></td>
                    <td>

                        <a href="#"><button type="button" class="btn btn-danger"><i class="fas fa-trash"></i></button></a>
                        <a href="#"><button type="button" class="btn btn-danger"><i class="fas fa-edit"></i></button></a>
                        
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
