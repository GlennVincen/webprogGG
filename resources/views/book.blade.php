<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <table>
        <tr>
            <th>id</th>
            <th>name</th>
            <th>action</th>
        </tr>

        @foreach($books as $book)
            <tr>
                <td>{{$book->id}}</td>
                <td>{{$book->name}}</td>
                <td>
                    <form action="{{url('/books/addToCart')}}" method="post">
                        {{csrf_field()}}
                        <input type="hidden" name="id" value="{{$book->id}}">
                        <input type="submit" value="AddToCart">
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

    <h2>Cart</h2>

@if(!empty($carts))
    <ul>
        @foreach($carts as $cart)
            <li>{{$cart['book']->name}} - {{$cart['total']}}</li>
        @endforeach
    </ul>
@endif
</body>
</html>