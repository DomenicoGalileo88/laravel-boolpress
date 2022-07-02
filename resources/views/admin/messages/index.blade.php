@extends('layouts.admin')

@section('content')

<div class="container my-4">
    <h1>Messages</h1>
    @include('partials.session_mess')
    <div class="row">

        <div class="col">
            <table class="table table-striped table-inverse table-responsive">
                <thead class="thead-inverse">
                    <tr>
                        <th>ID</th>
                        <th>Full_name</th>
                        <th>Email</th>
                        <th>Subject</th>
                        <th>Message</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($messages as $message)
                    <tr>
                        <td>{{$message->id}}</td>
                        <td>{{$message->full_name}}</td>
                        <td>{{$message->email}}</td>
                        <td>{{$message->subject}}</td>
                        <td>{{$message->message}}</td>
                    </tr>
                    @empty
                    <tr>
                        <td scope="row">Not Messages!</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>

        </div>
    </div>
</div>

@endsection