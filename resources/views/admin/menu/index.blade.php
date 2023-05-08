@extends('admin.layouts.admin')
@section('content')
    <div class="card">
        <div class="card-body">
            <a href="{{route('menu.create')}}" class="btn btn-primary btn-sm">Add</a>
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
                <th>url</th>
                <th>edit</th>
                <th>delete</th>
            </tr>
            </thead>
            <tbody>
          @foreach($menuList as $menu)
              <tr>
                  <td>{{$menu->id}}</td>
                  <td>{{$menu->title}}</td>
                  <td>{{$menu->url}}</td>
                  <td>
                      <a href="{{route('menu.edit', $menu->id)}}" class="btn btn-secondary">Edit</a>

                  </td>
                  <td>
                      <form class="delete-form" action="{{route('menu.delete', $menu->id)}}" method="POST">
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
