@extends('layout.layout')

@section('title','Pengeluaran')

@section('content')

<div class="box-body" style="box-sizing: border-box;">
<form action="{{ route('simpan_pengeluaran')}}" method="post" enctype="multipart/form-data">
  {{ csrf_field() }}
  <div class="input-group mb-3">
      <div class="input-group-prepend">
          <span class="input-group-text">Name</span>
      </div>
      <input type="text" class="form-control" name="name">
  </div>
  <br>
  <div class="input-group mb-3">
      <div class="input-group-prepend">
          <span class="input-group-text">Qty</span>
      </div>
      <input type="text" class="form-control" name="qty">
  </div>
  <br>
  <div class="input-group mb-3">
      <div class="input-group-prepend">
          <span class="input-group-text">Value</span>
      </div>
      <input type="text" class="form-control" name="value">
  </div>
  <br>
  <div class="input-group mb-3">
      <label>Input Image</label>
      <input type="file" class="form-control-file" id="exampleFormControlFile1" name="image">
  </div>
  <br>
  <button type="submit" class="btn btn-primary text-right">Create</button>
</form>
</div>
@endsection