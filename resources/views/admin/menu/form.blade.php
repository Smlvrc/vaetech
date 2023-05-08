@extends('admin.layouts.admin')
@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ isset($menu) ? route('menu.update', $menu->id) :  route('menu.store')}} " method="POST">
            @csrf
            @isset($menu)
             @method('PUT')
            @endisset
            <div class="form-group">
            <label>Title</label>
            <input type="text" name="title" placeholder="Ttitle" class="form-control" value="{{old('title',$menu->title ?? '')}}">
                @error('title')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>


            <div class="form-group">
                <label>Url</label>
                <input type="text" name="url" placeholder="Url" class="form-control" value="{{old('url', $menu->url ?? '')}}">
                @error('url')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
<button class="btn btn-sm btn-success">Save</button>
        </form>
    </div>
</div>
@endsection
