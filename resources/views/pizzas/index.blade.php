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

    <a id="backtop" href="#top" onclick="hide()">^</a>

    <header id="top" class="header1">
    <div class="header__bg1"></div>
    <h1 class="header__title1" onclick="location.reload()" onmouseover="this.style.cursor='pointer'">Ons heerlijke menu</h1>
    <div class="header__log">
        <svg class="header__log--icon" width="24" height="24" viewBox="0 0 24 24">
            <path d="M12,4A4,4 0 0,1 16,8A4,4 0 0,1 12,12A4,4 0 0,1 8,8A4,4 0 0,1 12,4M12,14C16.42,14 20,15.79 20,18V20H4V18C4,15.79 7.58,14 12,14Z"></path>
        </svg>
        <p class="header__log--text">Inloggen</p>
    </div>
    </header>

    <div class="Container1" style="margin-top: 10vw;">
    @foreach ($pizzas as $pizza)
                    <div class="FBlist">
                        <img src="images/3.png" class="ImagesInList" style="max-width: 300px;">

                        <div style="margin-left: 20px">
                            <div><strong>Naam:</strong> {{ $pizza->name }}</div>
                            <div><strong>Prijs:</strong> €{{ number_format($pizza->price(), 2)}}</div>
                            <div><strong>Formaat:</strong>
                                <select id="Formaat">
                                @foreach($sizes as $size)
                                <option>{{$size->name}}</option>
                                @endforeach
                                </select>
                            </div>

                            <div>
                            <p><a href="#"><img src="images/4.png" style="width: 100px;"> Voeg toe aan winkelwagen </p></a></div>
                        </div>
                        <p style="position: absolute; width: 300px; right: 0; font-size: medium; color: aquamarine;">Dit product is op voorraad</p>
                        <a style="position: absolute; width: 300px; left: 0; font-size: medium;" href="{{ route('pizza.edit',$pizza->id) }}"><img src="images/6.png" style="max-width: 50px; margin-left: 10px;"></a>


                    </div>
     @endforeach
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
