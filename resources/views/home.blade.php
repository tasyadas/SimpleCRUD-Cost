@extends('layout.layout')

@section('title','home')

@section('content')
<div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-3">
        <div class="row profil-img">
            <img src="/img/thanku.png" class="rounded-circle">
        </div>
        <div class="row">
            <div class="col-md-6 profil">
                <ul>
                    <li class="white">Nama Lengkap</li>
                    <li>Tashya Dwi Askara Siahaan</li>
                    <li class="white">Tanggal Lahir</li>
                    <li>02 September, 1997</li>
                </ul>
            </div>
            <div class="col-md-6 profil2">
                <ul>
                    <li class="white">Email</li>
                    <li>tasyadas@yahoo.com</li>
                    <li class="white">Whatsapp</li>
                    <li>083871810366</li>
                    <li class="white">Telephone</li>
                    <li>081919970902</li>
                </ul>
            </div>
        </div>
    </div>
    
    <div class="col-md-8">
        <div class="profil3">
            <h1>About Me</h1>
            <h4 class="white">EDUCATIONAL BACKGROUND</h4>
            <ol>
                <li>04 State El-School – 2009</li>
                <li>239 Junior High School – 2012</li>
                <li>47 Vocational High School (Accounting) – 2015</li>
                <li>Pancasila University (Informatics Engineering)</li>
                <li>English course at LBPP Lia (2013 – 2014, 2016)</li>
            </ol>

            <h4 class="white">HOBIES</h4>
            <ol>
                <li>Playing Volley Ball</li>
                <li>Singing in the Bathroom</li>
                <li>Eat foods that are not good for the body</li>
                <li>Watch animated films</li>
            </ol>
        </div>
    </div>
</div>

@endsection