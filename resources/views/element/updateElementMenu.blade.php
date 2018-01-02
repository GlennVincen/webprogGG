<!doctype html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
</head>
<body>
    <form action="{{url('updateElement/getElementId')}}" method="get">
        <select name="id">
            @foreach($elements as $element)
                <option value="{{$element['id']}}">{{$element['elementName']}}</option>
            @endforeach
        </select>
        <input type="submit" value="Search">
    </form>
</body>
</html>