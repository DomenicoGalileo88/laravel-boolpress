@extends('layouts.app')

@section('content')

<div class="container">

    @if (session('message'))

    <h1>{{session('message')}}</h1>

    <p>
        Torna alla pagina Home, grazie.
    </p>

    @endif

</div>


@endsection

