<?php
echo'
<html>
<body>
<script type="application/javascript">
function sprawdz()
{
	var formularz = document.getElementById("Formularz");
    
    var blad = "";
	var puste = false;
    var zlyNip = false;
    var literyWRoku = false;
	var pustePola = "";
    var alert = "";
	
    if (formularz.imieNabywca.value == "")
	{
		blad=true;
		puste=true;
		if(pustePola != "")pustePola+=", ";
		pustePola += "imieNabywca";
	}
        

    if((formularz.nipNabywca.value.length != 11) && formularz.nipNabywca.value != "") 
    {
        blad=true;
        zlyNip = true;
    }
	
    for(i=0;i<formularz.nipNabywca.value.length;i++)
        {
            if(isNaN(formularz.nipNabywca.value[i]))
                {
                    blad=true;
                    literyWRoku=true;
                    break;
                }
        }
    
    if(blad==true)
    {
        if(puste == true)
            {
                if(alert != "")alert+="\n";
		          alert += "Wypełnij następujące pola: "+pustePola;
            }
        
        if(zlyNip == true)
            {
                if(alert != "")alert+="\n";
                alert += "Za krótka/długa liczba na NIP."
            }
        
        if(literyWRoku == true)
            {
                if(alert != "")alert+="\n";
                alert += "Wpisałeś litery w dacie."
            }
        
        window.alert(alert);
        return false;
    }
	else window.alert("Dodano książkę.");
	
}
</script>
<form action="faktura.php" method="post" id="Formularz" onsubmit="sprawdz()">
<!--
//---------------------------------------------------------------------------
//-----------------------------NABYWCA----------------------------------------
//---------------------------------------------------------------------------
-->
<fieldset style=width:30%;>
<legend>Nabywca</legend>
<table>
<tr>
<td><label for="imieNabywca">Imie:</label></td>
<td><input type="text" name="imieNabywca"></td>
</tr>

<tr>
<td><label for="nazwiskoNabywca">Nazwisko:</label></td>
<td><input type="text" name="nazwiskoNabywca"></td>
</tr>

</tr>
<td><label for="nipNabywca">NIP:</label></td>
<td><input type="text" name="nipNabywca"></td>
</tr>

</tr>
<td><label for="firma">Firma:</label></td>
<td><input type="text" name="firma"></td>
</tr>

</tr>
<td><label for="kodPocztowyNabywca">Kod_pocztowy:</label></td>
<td><input type="text" name="kodPocztowyNabywca"></td>
</tr>

</tr>
<td><label for="miastoNabywca">Miasto:</label></td>
<td><input type="text" name="miastoNabywca"></td>
</tr>

</tr>
<td><label for="ulicaNabywca">Ulica:</label></td>
<td><input type="text" name="ulicaNabywca"></td>
</tr>

</tr>
<td><label for="lokalNabywca">Lokal:</label></td>
<td><input type="text" name="lokalNabywca"></td>
</tr>

</tr>
<td><label for="telefonNabywca">Telefon:</label></td>
<td><input type="text" name="telefonNabywca"></td>
</tr>

</tr>
<td><label for="emailNabywca">E-mail:</label></td>
<td><input type="text" name="emailNabywca"></td>
</tr>

</tr>
<td><label for="bankNabywca">Bank:</label></td>
<td><input type="text" name="bankNabywca"></td>
</tr>

</tr>
<td><label for="nrKontaNabywca">Nr konta:</label></td>
<td><input type="text" name="nrKontaNabywca"></td>
</tr>
</table>
</fieldset>
</br></br>
<!--
//---------------------------------------------------------------------------
//-----------------------------KLIENT----------------------------------------
//---------------------------------------------------------------------------
-->
<fieldset style=width:30%;>
<legend>Klient</legend>
<table>
<tr>
<td><label for="imieKlient">Imie:</label></td>
<td><input type="text" name="imieKlient"></td>
</tr>

<tr>
<td><label for="nazwiskoKlient">Nazwisko:</label></td>
<td><input type="text" name="nazwiskoKlient"></td>
</tr>

</tr>
<td><label for="nipKlient">NIP:</label></td>
<td><input type="text" name="nipKlient"></td>
</tr>

</tr>
<td><label for="firmaKlient">Firma:</label></td>
<td><input type="text" name="firmaKlient"></td>
</tr>

</tr>
<td><label for="kodPocztowyKlient">Kod_pocztowy:</label></td>
<td><input type="text" name="kodPocztowyKlient"></td>
</tr>

</tr>
<td><label for="miastoKlient">Miasto:</label></td>
<td><input type="text" name="miastoKlient"></td>
</tr>

</tr>
<td><label for="ulicaKlient">Ulica:</label></td>
<td><input type="text" name="ulicaKlient"></td>
</tr>

</tr>
<td><label for="lokalKlient">Lokal:</label></td>
<td><input type="text" name="lokalKlient"></td>
</tr>

</tr>
<td><label for="telefonKlient">Telefon:</label></td>
<td><input type="text" name="telefonKlient"></td>
</tr>

</tr>
<td><label for="emailKlient">E-mail:</label></td>
<td><input type="text" name="emailKlient"></td>
</tr>
</table>
</fieldset>

</br></br>
<!--
//---------------------------------------------------------------------------
//-----------------------------Towar----------------------------------------
//---------------------------------------------------------------------------
-->
<fieldset style=width:30%;>
<legend>Towar</legend>
<table>
<tr>
<td><label for="nazwa">Nazwa_towaru:</label></td>
<td><input type="text" name="nazwa"></td>
</tr>

<tr>
<td><label for="ilosc">Ilość:</label></td>
<td><input type="text" name="ilosc"></td>
</tr>

<tr>
<td><label for="netto">Cena_netto:</label></td>
<td><input type="text" name="netto"></td>
</tr>

<tr>
<td><label for="rabat">Rabat:</label></td>
<td><input type="text" name="rabat"></td>
</tr>

<tr>
<td><label for="vat">Vat:</label></td>
<td><input type="text" name="vat"></td>
</tr>
</table>
</fieldset>
<input type="submit" value="Submit">
</form>
</body>
</html>
';
?>