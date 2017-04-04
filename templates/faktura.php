<?php
$lp = 1;
$imieNabywca = $_POST['imieNabywca'];
$nazwiskoNabywca = $_POST['nazwiskoNabywca'];
$nipNabywca = $_POST['nipNabywca'];
$firma = $_POST['firma'];
$kodPocztowyNabywca = $_POST['kodPocztowyNabywca'];
$miastoNabywca = $_POST['miastoNabywca'];
$ulicaNabywca = $_POST['ulicaNabywca'];
$lokalNabywca = $_POST['lokalNabywca'];
$telefonNabywca = $_POST['telefonNabywca'];
$emailNabywca = $_POST['emailNabywca'];
$bankNabywca = $_POST['bankNabywca'];
$nrKontaNabywca = $_POST['nrKontaNabywca'];

$imieKlient = $_POST['imieKlient'];
$nazwiskoKlient = $_POST['nazwiskoKlient'];
$nipKlient = $_POST['nipKlient'];
$firmaKlient = $_POST['firmaKlient'];
$kodPocztowyKlient = $_POST['kodPocztowyKlient'];
$miastoKlient = $_POST['miastoKlient'];
$ulicaKlient = $_POST['ulicaKlient'];
$lokalKlient = $_POST['lokalKlient'];
$telefonKlient = $_POST['telefonKlient'];
$emailKlient = $_POST['emailKlient'];

$nazwa = $_POST['nazwa'];
$ilosc = $_POST['ilosc'];
$netto = $_POST['netto'];
$rabat = $_POST['rabat'];
$vat = $_POST['vat'];
if($rabat==0)
{
    $poRabacie = $netto;
}
else 
{
    $poRabacie = $netto*$rabat/100;
}
$kwotaNetto = $poRabacie*$ilosc;
$kwotaVAT = $kwotaNetto*$vat/100;
$kwotaBrutto  = $kwotaNetto + $kwotaVAT;
echo(
"
<html>
<body>

    
    <table>
    <tr>
    <td></td><td><b>NABYWCA</b></td><td><b>KLIENT</b></td>
    </tr>
    <tr>
    <td><b>Imie</b></td><td>$imieNabywca</td><td>$imieKlient</td>
    </tr>
    <tr>
    <td><b>Nazwisko</b></td><td>$nazwiskoNabywca</td><td>$nazwiskoKlient</td>
    </tr>
    <tr>
    <td><b>NIP</b></td><td>$nipNabywca</td><td>$nipKlient</td>
    </tr>
    <tr>
    <td><b>Masto</b></td><td>$kodPocztowyNabywca $miastoNabywca</td><td>$kodPocztowyKlient $miastoKlient</td>
    </tr>
    <tr>
    <td><b>Adres</b></td><td>$ulicaNabywca $lokalNabywca</td><td>$ulicaKlient $lokalKlient</td>
    </tr>
    <tr>
    <td><b>Telefon</b></td><td>$telefonNabywca</td><td>$telefonKlient</td>
    </tr>
    <tr>
    <td><b>E-mail</b></td><td>$emailNabywca</td><td>$emailKlient</td>
    </tr>
    <tr>
    <td><b>Bank</b></td><td>$bankNabywca</td><td>--------</td>
    </tr>
    <tr>
    <td><b>Nr_konta</b></td><td>$nrKontaNabywca</td><td>--------</td>
    </tr>
    </table>    

</br>
<table border=1>
<tr>
<td><b>lp.</b></td>
<td><b>Nazwa towaru</b></td>
<td><b>Jednostka miary</b></td>
<td><b>Ilość</b></td>
<td><b>Cena netto</b></td>
<td><b>Rabat</b></td>
<td><b>Kwota netto po rabacie</b></td>
<td><b>VAT</b></td>
<td><b>Kwota netto</b></td>
<td><b>Kwota VAT</b></td>
<td><b>Kwota brutto</b></td>
</tr>

<tr>
<td>$lp</td>
<td>$nazwa</td>
<td>$jednostka</td>
<td>$ilosc</td>
<td>$netto</td>
<td>$rabat</td>
<td>$poRabacie</td>
<td>$vat%</td>
<td>$kwotaNetto</td>
<td>$kwotaVAT</td>
<td>$kwotaBrutto</td>
</tr>
</table>
</body>
</html>
");

//jednoska miary data wystawienia/sprzedzarzy
?>