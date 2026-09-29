<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Funkcje PHP</title>
</head>
<body>

<h2>1. SUMA</h2>
<form method="post">
    <input type="number" name="suma1">
    <input type="number" name="suma2">
    <button name="suma">Oblicz sumę</button>
</form>

<?php

function SUMA($a, $b){
    echo "Suma: " . ($a + $b);
}

function PODSTAWY($a, $b){
    echo "Różnica: " . ($a - $b) . "<br>";
    echo "Iloczyn: " . ($a * $b) . "<br>";

    if($b != 0){
        echo "Iloraz: " . ($a / $b);
    }else{
        echo "Nie można dzielić przez 0";
    }
}

function KALKULATOR($a, $b, $dzialanie){
    if($dzialanie == "+"){
        $wynik = $a + $b;
    }elseif($dzialanie == "-"){
        $wynik = $a - $b;
    }elseif($dzialanie == "*"){
        $wynik = $a * $b;
    }elseif($dzialanie == "/"){
        if($b == 0){
            $wynik = "Nie można dzielić przez 0";
        }else{
            $wynik = $a / $b;
        }
    }else{
        $wynik = "Nieprawidłowe działanie";
    }

    echo "<div id='wynik'>$wynik</div>";
}

function MAKS($a, $b, $c){
    echo "Największa liczba: " . max($a, $b, $c);
}

function WZROST($wzrost){
    if($wzrost < 150){
        echo "Niski";
    }elseif($wzrost > 180){
        echo "Wysoki";
    }else{
        echo "Średni";
    }
}

function BMI($wzrost, $waga){
    $bmi = $waga / (($wzrost / 100) * ($wzrost / 100));

    if($bmi < 18.5){
        $komentarz = "za mało!";
    }elseif($bmi > 25){
        $komentarz = "za dużo!";
    }else{
        $komentarz = "OK!";
    }

    echo "<div id='wynik'>" . round($bmi, 2) . " - " . $komentarz . "</div>";
}

function STARSZY($data1, $data2){
    $data1 = new DateTime($data1);
    $data2 = new DateTime($data2);

    if($data1 < $data2){
        echo "Pierwsza osoba jest starsza";
    }elseif($data2 < $data1){
        echo "Druga osoba jest starsza";
    }else{
        echo "Osoby są w tym samym wieku";
    }
}

function PRZESTEPNY($rok){
    if(($rok % 4 == 0 && $rok % 100 != 0) || $rok % 400 == 0){
        echo "Rok jest przestępny";
    }else{
        echo "Rok nie jest przestępny";
    }
}

function SILA($haslo){
    $dlugosc = strlen($haslo);

    if($dlugosc <= 4){
        echo "Hasło słabe";
    }elseif($dlugosc <= 8){
        echo "Hasło średnie";
    }else{
        echo "Hasło mocne";
    }

    if(!preg_match("/[0-9]/", $haslo)){
        echo "<br>Brak cyfry - hasło słabe";
    }

    if(!preg_match("/[A-Z]/", $haslo)){
        echo "<br>Brak dużej litery - hasło słabe";
    }

    if(!preg_match("/[a-z]/", $haslo)){
        echo "<br>Brak małej litery - hasło słabe";
    }

    if(!preg_match("/[^a-zA-Z0-9]/", $haslo)){
        echo "<br>Brak znaku specjalnego - hasło słabe";
    }
}

function TROJKAT($a, $b, $c){
    if($a + $b > $c && $a + $c > $b && $b + $c > $a){
        echo "Można utworzyć trójkąt";
    }else{
        echo "Nie można utworzyć trójkąta";
    }
}

function SZYFR($tekst){
    $wynik = "";

    for($i = 0; $i < strlen($tekst); $i++){
        $znak = $tekst[$i];
        $kod = ord($znak);

        if($kod >= 97 && $kod <= 122){
            $kod += 2;

            if($kod > 122){
                $kod -= 26;
            }

            $wynik .= chr($kod);
        }else{
            $wynik .= $znak;
        }
    }

    echo $wynik;
}


/* OBSŁUGA FORMULARZY */

if(isset($_POST["suma"])){
    SUMA($_POST["suma1"], $_POST["suma2"]);
}

if(isset($_POST["podstawy"])){
    PODSTAWY($_POST["podstawy1"], $_POST["podstawy2"]);
}

if(isset($_POST["kalkulator"])){
    KALKULATOR($_POST["kalk1"], $_POST["kalk2"], $_POST["dzialanie"]);
}

if(isset($_POST["maks"])){
    MAKS($_POST["maks1"], $_POST["maks2"], $_POST["maks3"]);
}

if(isset($_POST["wzrost"])){
    WZROST($_POST["wzrost"]);
}

if(isset($_POST["bmi"])){
    BMI($_POST["bmiwzrost"], $_POST["bmiwaga"]);
}

if(isset($_POST["starszy"])){
    STARSZY($_POST["data1"], $_POST["data2"]);
}

if(isset($_POST["przestepny"])){
    PRZESTEPNY($_POST["rok"]);
}

if(isset($_POST["sila"])){
    SILA($_POST["haslo"]);
}

if(isset($_POST["trojkat"])){
    TROJKAT($_POST["bok1"], $_POST["bok2"], $_POST["bok3"]);
}

if(isset($_POST["szyfr"])){
    SZYFR($_POST["tekst"]);
}

?>

<hr>

<h2>2. PODSTAWY</h2>
<form method="post">
    <input type="number" step="any" name="podstawy1">
    <input type="number" step="any" name="podstawy2">
    <button name="podstawy">Oblicz</button>
</form>

<h2>3. KALKULATOR</h2>
<form method="post">
    <input type="number" step="any" name="kalk1">
    <input type="number" step="any" name="kalk2">

    <select name="dzialanie">
        <option value="+">Suma</option>
        <option value="-">Różnica</option>
        <option value="*">Iloczyn</option>
        <option value="/">Iloraz</option>
    </select>

    <button name="kalkulator">Oblicz</button>
</form>

<h2>4. MAKS</h2>
<form method="post">
    <input type="number" name="maks1">
    <input type="number" name="maks2">
    <input type="number" name="maks3">
    <button name="maks">Sprawdź</button>
</form>

<h2>5. WZROST</h2>
<form method="post">
    <input type="number" name="wzrost">
    <button name="wzrost">Sprawdź</button>
</form>

<h2>6. BMI</h2>
<form method="post">
    <input type="number" step="any" name="bmiwzrost" placeholder="Wzrost cm">
    <input type="number" step="any" name="bmiwaga" placeholder="Waga kg">
    <button name="bmi">Oblicz BMI</button>
</form>

<h2>7. STARSZY</h2>
<form method="post">
    <input type="date" name="data1">
    <input type="date" name="data2">
    <button name="starszy">Sprawdź</button>
</form>

<h2>8. PRZESTĘPNY</h2>
<form method="post">
    <input type="number" name="rok">
    <button name="przestepny">Sprawdź</button>
</form>

<h2>9. SIŁA HASŁA</h2>
<form method="post">
    <input type="text" name="haslo">
    <button name="sila">Sprawdź</button>
</form>

<h2>10. TRÓJKĄT</h2>
<form method="post">
    <input type="number" name="bok1">
    <input type="number" name="bok2">
    <input type="number" name="bok3">
    <button name="trojkat">Sprawdź</button>
</form>

<h2>11. SZYFR</h2>
<form method="post">
    <input type="text" name="tekst">
    <button name="szyfr">Szyfruj</button>
</form>

</body>
</html>
```
