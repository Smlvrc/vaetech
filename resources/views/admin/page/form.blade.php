@extends('admin.layouts.admin')
@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ isset($page) ? route('page.update', $page->id) :  route('page.store')}} " method="POST" enctype="multipart/form-data">
            @csrf
            @isset($page)
             @method('PUT')
            @endisset
            <div class="form-group">
            <label>Title</label>
            <input type="text" name="title" placeholder="Ttitle" class="form-control" value="{{old('title',$page->title ?? '')}}">
                @error('title')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="form-group">
                <label>Slug</label>
                <input type="text" name="slug" placeholder="slug" class="form-control" value="{{old('slug', $page->slug ?? '')}}">
                @error('slug')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="form-group">
                <label>text</label>
                <textarea id="summernote" name="text" class="form-control" >{{old('text',$page->text ?? '')}}</textarea>
                @error('text')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="form-group">

                @isset($page)
                    <img width="100" class="rounded" src="{{asset('storage/'.$page->image)}}" alt="">
                    <br>
                @endisset
                <input type="File" name="image" class="form-control">
                @error('image')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>

<button class="btn btn-sm btn-success">Save</button>
        </form>
    </div>
</div>
@endsection
@section('js')
    <script src="{{asset('_assets/plugins/summernote/summernote-bs4.min.js')}}"></script>
    <script>
        $('#summernote').summernote();
    </script>
@endsection

@section('css')
    <link rel="stylesheet" href="{{asset('_assets/plugins/summernote/summernote-bs4.min.css')}}">

@endsection
