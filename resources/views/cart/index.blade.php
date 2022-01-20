<!-- Alle buttons werken alleen met HTML en nog niet met Laravel -->
<!-- De informatie is gewoon opvulling omdat we nog niks van de docenten gehoord hebben over het bedrijf -->

<!DOCTYPE html>
<html lang="en">
<head>
    <title>StonksPizza</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="CSS/Default.css">
    <link rel="stylesheet" href="{{ URL::asset('css/CSS/Default.css'); }}">

</head>
<body>
@if($pizzas != null)
    @foreach($pizzas as $pizza_id => $pizza)
        <p>Pizza {{$pizza->name }}</p>
        @foreach($pizza->ingredients as $ingredient)
            <p>{{ $ingredient->name }} {{$ingredient->pivot->quantity}}x</p>
        @endforeach
        <p>€{{ number_format($pizza->price(), 2, ",", ".") }}</p>
        <form method="POST" action="{{route('cartpizza.destroy', $pizza_id)}}">
            @csrf
            @method('DELETE')
            <button type="submit">Verwijderen</button>
        </form>
    @endforeach
@endif
<p>Totaalprijs: €{{ number_format($pricetotal, 2, ",", ".")}}</p>
<a href="{{route('order.index')}}">Verder naar bestellen</a>
</body>
</html>

