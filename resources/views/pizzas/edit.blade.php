<!-- Alle buttons werken alleen met HTML en nog niet met Laravel -->
<!-- De informatie is gewoon opvulling omdat we nog niks van de docenten gehoord hebben over het bedrijf -->

<!DOCTYPE html>
<html lang="en">
<head>
<title>StonksPizza</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="CSS/Default.css">
<link rel="stylesheet" href="{{ URL::asset('css/CSS/Default.css') }}">

</head>
<body>

    <a id="backtop" href="#top" onclick="hide()">^</a>

    <header id="top" class="header1">
    <div class="header__bg1"></div>
    <h1 class="header__title1" onclick="location.reload()" onmouseover="this.style.cursor='pointer'">Pizza samenstellen</h1>
    </header>

    <p style="text-align: center; margin-top: 3vw;">U bewerkt momenteel: <strong>Pizza {{ $pizza->name}}</strong></p>
    <div class="fb3">
        <div style="border-top: none;"><p><strong>Ingredientenlijst</strong></p></div>

    @foreach ($pizza->ingredients as $ingredient)
        <div class="fb4">
            <div style="width: 700px;"><p>{{ $ingredient->name }}</p></div>
            <div><p>€ {{ number_format($ingredient->price, 2, ",", ".")}}</p></div>
            <div>
                <form action="{{ route('pizzaingredient.destroy', [$pizza->id, $ingredient->id])}}" method="POST" style="height: 100%">
                    @csrf
                    @method('DELETE')
                    <button id="btn5" type="submit">Verwijder</button>
                </form>
            </div>

        </div>
    @endforeach
        <div class="fb4">
            <div style="width: 700px;"><p>Totaalprijs</p></div>
            <div style="width: 500px;"><p>€ {{number_format($pizza->price(), 2, ",", ".")}}</p></div>
            <div style="width: 200px"></div>
        </div>
        <div class="fb4">
            <div style="width: 700px;"><p>Ingrediënt toevoegen</p></div>
            <form action="{{ route('pizzaingredient.store', $pizza->id) }}" method="POST">
                @csrf
                <select name="ingredientID" style="text-align: center;">
                    @foreach ($ingredienten as $ingredient)
                        <option value="{{$ingredient->id}}">{{ $ingredient->name }}</option>
                    @endforeach
                </select>
                <div><button type="submit" id="btn6">Voeg toe</button></div>
            </form>
            <p><form method="post" action="{{route('cartpizza.store', $pizza->id)}}">@csrf<input type="image" src="{{ asset('images/4.png') }}" style="width: 100px;"></form> Voeg toe aan winkelwagen </p></div>

        </div>
    </div>

      <footer>
          <div class="fb2">
            <div>
                <h3>Services</h3>
                <ul>
                  <li><a href="#">Bestellen</a></li>
                  <li><a href="#">Inloggen gebruiker</a></li>
                  <li><a href="#">Inloggen personeel</a></li>
              </ul>
            </div>
            <div>
              <h3>About</h3>
              <ul>
                <li><a href="#">Over ons</a></li>
                <li><a href="#">Team</Table></a></li>
                <li><a href="#">Contact</Table></a></li>
              </ul>
           </div>
           <div>
              <h3>StonksPizza</h3>
              <p id="about">Cras quis ullamcorper ligula, ut scelerisque mauris. Praesent porta pharetra mi, nec consectetur nisi molestie vel. Praesent a lectus non nunc ullamcorper facilisis a vel nulla.</p>
           </div>
          </div>
          <p id="copyright">©StonksPizza 2021</p>
      </footer>
</body>
<script>
    window.onscroll = function(ev) {

    if ((window.innerHeight + window.scrollY) >= document.body.offsetHeight) {

        document.getElementById("backtop").style.display = "block"
    }
    document.getElementById("backtop").addEventListener("click", click);

    function click() {
        document.getElementById("backtop").style.display = "none"

    }
};
</script>
</html>
