@extends('admin.layouts.admin')

@section('content')
    <div class="card">
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th style="width: 10px">#</th>
                    <th>message</th>
                    <th>name</th>
                    <th>email</th>
                    <th>subject</th>
                </tr>
                </thead>
                <tbody>
                @foreach($contacts as $contact)
                    <tr>
                        <td>{{$contact->id}}</td>
                        <td>{{$contact->message}}</td>
                        <td>{{$contact->name}}</td>
                        <td>{{$contact->email}}</td>
                        <td>{{$contact->subject}}</td>

                        <td>
                            <form class="delete-form" action="{{route('contact.destroy', $contact->id)}}" method="POST">
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
