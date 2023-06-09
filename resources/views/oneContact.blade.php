

        <h2>{{ $data->name }} - age {{ $data->age }}</h2>
        <p class="alert">{{ $data->title }}</p>
        <p>{{ $data->body }}</p>
        <a href={{ route('contact-update', $data->id ) }}><button>Редактировать</button></a>
        <a href={{ route('contact-delete', $data->id ) }}><button>Удалить</button></a>



