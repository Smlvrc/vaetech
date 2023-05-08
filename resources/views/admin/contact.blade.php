@extends('admin.layouts.admin')
@section('content')
<div class="card">
    <div class="card-body">
        <table>
            <thead>
                <th>Id</th>
                <th>Message</th>
                <th>Name</th>
                <th>email</th>
                <th>subject</th>
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
                        <a href="{{route('contact.destroy')}}" class="btn btn-danger">Delete</a>
                    </td>
                </tr>

            @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
