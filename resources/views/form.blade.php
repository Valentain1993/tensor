<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/app.css">
    <title>Document</title>
</head>

<body>

@if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
            

        </ul>

    </div>

@endif

<form method="POST" action="/check">
@csrf

    <input type="text" name="email" id="email" placeholder="Ввведите email" class="form-control">
    <input type="text" name="subject" id="subject" placeholder="Ввведите отзыв" class="form-control">
    <textarea type="text" name="message" id="message" placeholder="Ввведите сообщение" class="form-control"></textarea></br>

    <button type="submit" class="btn btn-success">Отправить</button>

</form>


<h1>Все отзывы</h1>

            @foreach($reviews as $el)
               <div class="alert alert-warning">
                    <h3>{{ $el->subject }}</h2>
                    <b>{{ $el->email }}</b>
                    <p>{{ $el->message }}</p>
               </div> 
            @endforeach

</body>

</html>