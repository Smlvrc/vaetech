@extends('admin.layouts.admin')
@section('content')
    <div class="card">
        <div class="card-body">
            <a href="{{route('page.create')}}" class="btn btn-primary btn-sm">Add</a>
        </div>
    </div>
    <br>
    <div class="card">
        <div class="card-body">
        <table class="table table-bordered">
            <thead>
            <tr>
                <th style="width: 10px">#</th>
                <th>Title</th>
                <th>slug</th>
                <th>Created at</th>
                <th>edit</th>
                <th>delete</th>
            </tr>
            </thead>
            <tbody>
          @foreach($pages as $page)
              <tr>
                  <td>{{$page->id}}</td>
                  <td>{{$page->title}}</td>
                  <td>{{$page->slug}}</td>
                  <td>{{$page->created_at->diffForHumans()}}</td>

                  <td>
                      <a href="{{route('page.edit', $page->id)}}" class="btn btn-secondary">Edit</a>

                  </td>
                  <td>
                      <form class="delete-form" action="{{route('page.destroy', $page->id)}}" method="POST">
                          @method('DELETE')
                          @csrf
                          <button class="btn btn-danger">Delete</button>

                      </form>

                  </td>
              </tr>
          @endforeach

            </tbody>
        </table>

    </div>

@endsection
