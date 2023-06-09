@extends('layouts.app')

@section('content')
    <h1>Тут есть форма</h1>

    @include('message')

    <form action={{ route('updateMessage', $data->id)  }} method="post">
        @csrf
        <div class="form">
            <input type="text" name="name" id="name" value="{{ $data->name }}" class="" placeholder="Имя">
            <input type="number" name="age" id="age" value="{{ $data->age }}" class="" placeholder="Возраст">
            <input type="text" name="title" id="title" value="{{ $data->title }}" class="" placeholder="Название новости">
            <input type="text" name="body" id="body" value="{{ $data->body }}" class="" placeholder="Текст новости">

            <button type="submit">Изменить</button>
        </div>

        <a href={{ route('contact-data') }}>Вернуться к списку сообщений</a>

    </form>
@endsection
