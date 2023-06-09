@extends('layouts.app')

@section('content')
    <h1>Тут есть форма</h1>

    @include('message')

    <form action={{ route('contact-form') }} method="post">
        @csrf
        <div class="form">
            <input type="text" name="name" id="name" class="" placeholder="Имя">
            <input type="number" name="age" id="age" class="" placeholder="Возраст">
            <input type="text" name="title" id="title" class="" placeholder="Название новости">
            <input type="text" name="body" id="body" class="" placeholder="Текст новости">

            <button type="submit">Опубликовать</button>
        </div>

        <a href={{ route('contact-data') }}>Все сообщения</a>

    </form>
@endsection
