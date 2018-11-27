@extends('layout.layout')

@section('title','home')

@section('content')
<div class="row">
    <div class="col-sm-2"></div>
    <div class="col-sm-8 text-center" style="background-color:#efefef; border-radius:2em; margin-top:3em; padding:2em 0 2em 0;">
            <h1>My Profile</h1>
            <img src="/img/thanku.png" class="rounded-circle" style="width:15em;">
    </div>
</div>

<div class="row">
    <div class="col-sm-2"></div>
    <div class="col-sm-8" style="background-color:black; border-radius:2em; margin-top:1em; padding:2em 0 2em 0;">
        <div style="padding:0 2em 2em 2em; color:#efefef;">
            <h2 class="text-left">Formal Education</h2>
            <hr style="background-color:#efefef; width:17em; height:.1em; float:left; ">
            <h2 class="text-right">Informal Education</h2>
            <hr style="background-color:#efefef; width:17em; height:.1em; float:right; ">
        </div>
    </div>
</div>

@endsection