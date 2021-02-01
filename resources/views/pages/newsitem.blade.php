@extends('layouts.master')

@section('content')

<div class="container">
    <div class="row solo___news">
    <p>{{ $id -> title}}</p>
    <p>{!! $id->body !!}</p>
    </div>
</div>
@endsection