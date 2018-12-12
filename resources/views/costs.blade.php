@extends('layout.layout')

@section('title','Pengeluaran')

@section('content')

<!-- The Modal -->
<div class="modal" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">New Expense</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="action modal-body">
                <form action="/api/cost/create" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Name</span>
                        </div>
                        <input type="text" class="form-control" name="name" autocomplete="off">
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Qty</span>
                        </div>
                        <input type="text" class="form-control" name="qty" autocomplete="off">
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Value</span>
                        </div>
                        <input type="text" class="form-control" name="value" autocomplete="off">
                    </div>
                    <div class="input-group mb-3">
                        <label>Input Image</label>
                        <input type="file" class="form-control-file" id="exampleFormControlFile1" name="image">
                    </div>
                    <button type="submit" class="btn btn-primary text-right">Create</button>
                </form>
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div class="container" style="margin-top:5em;">

        <div class="table-position">

            <div class="box box-info">
                <!-- Button to Open the Modal -->
                <h1 style="margin-top: 13px; color:aliceblue;">Expense List</h1>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal" style="margin-left: 40em">
                Create</button>
                <!-- /.box-header -->
                <div class="box-body">
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
                                @foreach(App\Http\Controllers\CostController::GetCost() as $cost)
                                
                                <tr style="color:aliceblue;">
                                    <td>{{$cost->name}}</td>
                                    <td>{{$cost->qty}}</td>
                                    <td>Rp. {{number_format($cost->value,0,",",".")}}</td>
                                    <td>Rp. {{number_format($cost->total,0,",",".")}}</td>
                                    <td><img style="width:100px; height:100px;" src="/{{$cost->image}}"></td>
                                    <td>

                                        <a href="/api/cost/delete/{{$cost->id}}"><button type="button" class="btn btn-danger"><i
                                                    class="fas fa-trash"></i></button></a>
                                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modalUpdate-{{$cost->id}}"><i
                                                class="far fa-edit"></i></button>
                                    </td>
                                </tr>
                                <br>

                                <!-- Modal Update -->
                                <div class="modal" id="modalUpdate-{{$cost->id}}">
                                    <div class="modal-dialog">
                                        <div class="modal-content">

                                            <!-- Modal Header -->
                                            <div class="modal-header">
                                                <h4 class="modal-title">Update</h4>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>

                                            <!-- Modal body -->
                                            <div class="action modal-body">
                                                <form action="/api/cost/update/{{$cost->id}}" method="post" enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">Name</span>
                                                        </div>
                                                        <input type="text" class="form-control" name="name" value="{{$cost->name}}" autocomplete="off">
                                                    </div>
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">Qty</span>
                                                        </div>
                                                        <input type="text" class="form-control" name="qty" value="{{$cost->qty}}" autocomplete="off">
                                                    </div>
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">Value</span>
                                                        </div>
                                                        <input type="text" class="form-control" name="value" value="{{$cost->value}}" autocomplete="off">
                                                    </div>
                                                    <div class="input-group mb-3">
                                                        <label>Input Image</label>
                                                        <input type="file" class="form-control-file" id="exampleFormControlFile1"
                                                            name="image" value="{{$cost->image}}">
                                                    </div>
                                                    <button type="submit" class="btn btn-primary text-right">Update</button>
                                                </form>
                                            </div>

                                            <!-- Modal footer -->
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.table-responsive -->
                    <div style="color:aliceblue;">Total Cost : Rp. {{ number_format(App\Http\Controllers\CostController::SumCost(),0,",",".")}}</div>
                </div>

            </div>
        </div>
    </div>

@endsection