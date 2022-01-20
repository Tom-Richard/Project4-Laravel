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
@if($orderitems != null)
    @foreach($orderitems as $orderitem_id => $orderitem)
        <p>Pizza {{ $orderitem->pizza->name }}</p>
        @foreach($orderitem->ingredients as $ingredient)
            <p>{{ $ingredient->name }} {{$ingredient->pivot->quantity}}x</p>
        @endforeach
        <p>€{{ number_format($orderitem->price(), 2, ",", ".") }}</p>
    @endforeach
    <p>Totaalprijs: €{{ number_format($pricetotal, 2, ",", ".")}}</p>
    <form method="POST" action="{{route('order.store')}}">
        @csrf
        <button type="submit">Bestellen</button>
    </form>
@else
    <p>Geen pizza's toegevoegd aan winkelwagentje.</p>
@endif

</body>
</html>

