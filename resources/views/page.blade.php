@extends('layouts.app')
@section('title')
     page
@endsection

@section('content')
    <div class="single-product mb-50">
        <div class="location-img">
            <img style="width: 400px" src="{!! asset('storage/'. $page->image) !!}" alt="">
        </div>
        <div class="location-details">
            <p style="background: red"><a href="">{!! $page->title !!}<br> {!! $page->text !!}</a></p>
        </div>
    </div>

@endsection
