{include file="header.html.php"}

<div class="page-header">
	{if isset($tablicaZamowien)}
	{assign var="licznik" value="0"}
	{foreach $tablicaZamowien as $klient}
	{if $licznik neq '1'}
	{assign var="licznik" value="1"}
	<h2>Faktura {$klient['DataZamowienia']}-{$klient['IdZamowienieSprzedaz']}</h2>
	{/if}
	{/foreach}
	{/if}
</div>
<table class="table sorttable" style=width:50%;>
	<thead>
		<tr>
			<th>Sprzedawca</th><th>Nabywca</th>
		</tr>
	</thead>
	{if isset($tablicaZamowien)}
	{assign var="licznik" value="0"}

	  {foreach $tablicaZamowien as $klient}
		{if $licznik neq '1'}
			{assign var="licznik" value="1"}
	<tr>
	<td>
Zbigniew Szpunar<br>
NIP 12345678912<br>
'Hurtownia SZPUNAR'<br>
66-666 Wrocław<br>
Malowanicza 12<br>
Tel 123-344-456<br>
z.szpunar@wp.pl<br>
4774987157985795567349 PKO SA<br>
</td>
<td>
{$klient['Imie']} {$klient['Nazwisko']}<br>
NIP {$klient['NIP']} <br>
'{$klient['NazwaFirmy']} '<br>
{$klient['KodPocztowy']} {$klient['Miasto']} <br>
{$klient['Ulica']} {$klient['Dom']} <br>
Tel {$klient['Telefon']} <br>
{$klient['EMail']} <br>
{$klient['NrKonta']}  {$klient['Bank']} <br>
</td>
</tr>
{/if}
{/foreach}
{/if}
</table>

<table class="table sorttable" style=width:50%;>
	<thead>
		<tr>
			<th>Towar</th><th>Ilość</th><th>Cena netto</th><th>Stawka VAT</th><th>Cena brutto</th>
		</tr>
	</thead>
{if isset($tablicaZamowien)}
  {foreach $tablicaZamowien as $towar}
		<tr>
		<td>{$towar['NazwaTowaru']}</td>
    <td>{$towar['ilosc']}</td>
    <td>{$towar['cena']}</td>
		<td>{$towar['vat']}</td>
		<td>{$towar['cena']+($towar['cena']*$towar['vat'])/100}</td>
		</tr>
  {/foreach}
{/if}
</table>
Sposób dostawy: {$towar['SposobDostawy']}<br>
Suma: {$towar['Wartosc']}
{if isset($error)}
<strong>{$error}</strong>
{/if}

{include file="footer.html.php"}
