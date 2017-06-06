{include file="header.html.php"}

<div class="page-header">
	{if isset($tablicaZamowien)}
	{$lp=1}
	{$wartoscnetto=0}
	{$wartoscvat=0}
	{$wartoscbrutto=0}
	{assign var="licznik" value="0"}
	{foreach $tablicaZamowien as $klient}
	{if $licznik neq '1'}
	{assign var="licznik" value="1"}
	<h2>Faktura VAT nr. {$klient['DataZamowienia']}-{$klient['IdZamowienieSprzedaz']} z dnia {$klient['DataZamowienia']}</h2>
	<h2>Data wystawienia: {$smarty.now|date_format:"%Y"}-{$smarty.now|date_format:"%m"}-{$smarty.now|date_format:"%d"}</h2>
	<h2>Data sprzedaży: {$smarty.post.dataSprzedazy}</h2>
	<h2>Sposob zapłaty: {$klient['SposobZaplaty']}</h2>
	<h2>Termin zapłaty: {$smarty.post.dataZaplaty}</h2>
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
23 1500 1663 6363 9661 8188 7238 PKO SA<br>
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
			<th>Lp.</th><th>Kod towaru</th><th>Nazwa towaru</th><th>Jednostka miary</th><th>Ilość</th><th>Cena netto</th><th>Wartość netto</th><th>Stawka VAT</th><th>Wartość VAT</th><th>Wartość brutto</th>
		</tr>
	</thead>
{if isset($tablicaZamowien)}
  {foreach $tablicaZamowien as $towar}
		<tr>
		<td>{$lp}</td>
		<td>{$towar['KodTowaru']}</td>
		<td>{$towar['NazwaTowaru']}</td>
		<td>{$towar['Nazwa']}</td>
    <td>{$towar['ilosc']}</td>
    <td>{$towar['cena']}</td>
		<td>{$towar['cena']*$towar['ilosc']}</td>
		<td>{$towar['vat']}%</td>
		<td>{$towar['cena']*$towar['ilosc']*$towar['vat']/100}</td>
		<td>{(($towar['cena']*$towar['ilosc']*$towar['vat'])/100)+$towar['cena']*$towar['ilosc']}</td>
		</tr>
		{$lp++}
		{$wartoscnetto = $wartoscnetto+$towar['cena']*$towar['ilosc']}
		{$wartoscvat = $wartoscvat+$towar['cena']*$towar['ilosc']*$towar['vat']/100}
		{$wartoscbrutto = $wartoscbrutto+(($towar['cena']*$towar['ilosc']*$towar['vat'])/100)+$towar['cena']*$towar['ilosc']}
  {/foreach}
	<tr>
	<td></td>
	<td></td>
	<td></td>
	<td></td>
	<td></td>
	<td>Razem:</td>
	<td>{$wartoscnetto}</td>
	<td></td>
	<td>{$wartoscvat}</td>
	<td>{$wartoscbrutto}</td>
	</tr>
{/if}
</table>
Sposób dostawy: {$towar['SposobDostawy']}<br>
Suma: {$towar['Wartosc']}
{if isset($error)}
<strong>{$error}</strong>
{/if}

{include file="footer.html.php"}
