@extends('layouts.app')

@section('title', 'Главная страница')
@include('partial.header')
@section('content')


    <div class="grid grid-cols-1 md:grid-cols-3 gap-10 mt-10 mb-20">
        @foreach($posts as $post)
            @include('partial.posts.item', ['post'=>$post])
        @endforeach
    </div>


@endsection
