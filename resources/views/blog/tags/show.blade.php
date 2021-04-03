@extends('layouts.blog')

@section('page-title')
    {{ $tag->name }}
@endsection

@section('content')
    {{ $tag->name }}
@endsection
