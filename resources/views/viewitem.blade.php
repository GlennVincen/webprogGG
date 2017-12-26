<html>
<head>
    <title>View Items</title>
</head>
<body>
<table>
    <tr>
        <td>Id</td>
        <td>Name</td>
        <td>Price</td>
    </tr>

    @foreach($items as $item)
        <tr>
            <td>{{$item['id']}}</td>
            <td>{{$item['name']}}</td>
            <td>{{$item['price']}}</td>
        </tr>
    @endforeach
</table>

<form action="{{url('formitem')}}" method="get">
    <button>Back</button>
</form>
</body>
</html>