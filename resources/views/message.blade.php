
@if($errors->any())
    <ul>
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>

@endif

@if(session('success'))
    {{ session('success') }}
@endif
