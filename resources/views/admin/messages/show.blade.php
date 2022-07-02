@extends('layouts.admin')

@section('content')

<div class="container my-4">
    <h1>Message</h1>

    <div class="row">

        <div class="col">

            <div class="full_name">
                <strong>Full name: </strong>
                {{$message->full_name}}
            </div>

            <div class="email">
                <strong>Email: </strong>
                {{$message->email}}
            </div>

            <div class="subject">
                <strong>Subject: </strong>
                {{$message->subject}}
            </div>

        </div>

        <div class="col">
            <div class="message">
                <strong>Message: </strong>
                {{$message->message}}
            </div>
        </div>
    </div>
</div>

@endsection