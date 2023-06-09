
    @foreach($data as $el)
        <p>{{ $el->name }}</p>
        <p>{{ $el->title }}</p>
<a href={{ route('contact-data-one', $el->id ) }}><button>Посмотреть полностью</button></a>
    @endforeach


