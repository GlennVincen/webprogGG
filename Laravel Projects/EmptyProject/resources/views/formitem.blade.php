<html>
<head>
    <title>Item Forms</title>
</head>
<body>
<h1>Insert Items</h1>

<form action="{{url('/insertitem')}}" method="get">
    <input type="text" name="name" id="name" placeholder="Item Name">

    <input type="text" name="price" id="price" placeholder="Price">

    <button>Insert</button>
</form>

<h1>Update Items</h1>

<form action="{{url('/updateitem')}}" method="get">
    <input type="number" name="id" id="id">

    <input type="text" name="name" id="name" placeholder="Item Name">

    <input type="text" name="price" id="price" placeholder="Price">

    <button>Update</button>
</form>

<h1>Delete Items</h1>

<form action="{{url('/deleteitem')}}" method="get">
    <input type="number" name="id" id="id">

    <button>Delete</button>
</form>

<form action="{{url('/viewitem')}}" method="get">
    <button>View Item</button>
</form>

@foreach($errors->all() as $error)
    {{$error}}</br>
@endforeach

</body>
</html>