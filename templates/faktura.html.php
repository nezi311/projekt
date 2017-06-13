{include file="header.html.php"}

<div class="page-header">
	{if isset($tablicaZamowien)}
	{$lp=1}
	{$vaty=array()}
	{$vatywartosci=array()}
	{$wartosci=array()}
	{$wartoscnetto=0}
	{$wartoscvat=0}
	{$wartoscbrutto=0}
	{assign var="licznik" value="0"}
	{foreach $tablicaZamowien as $klient}

{if $licznik neq '1'}
	{assign var="licznik" value="1"}
	<h3>Faktura VAT nr. {$klient['NrFaktury']} z dnia {$klient['DataWystawienia']}</h3>
	<h3>Data wystawienia: {$klient['DataWystawienia']}</h3>
	<h3>Data sprzedaży: {$klient['DataSprzedazy']}</h3>
	<h3>Sposob zapłaty: {$klient['SposobZaplaty']}</h3>
	<h3>Termin zapłaty: {$klient['TerminZaplaty']}</h3>
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

<table class="table sorttable" style=width:80%;>
	<thead>
		<tr>
			<th>Lp.</th>
			<th>Kod towaru</th>
			<th>Nazwa towaru</th>
			<th>Jednostka miary</th>
			<th>Ilość</th>
			<th style=text-align:right;>Cena netto</th>
			<th style=text-align:right;>Wartość netto</th>
			<th style=text-align:right;>Stawka VAT</th>
			<th style=text-align:right;>Wartość VAT</th>
			<th style=text-align:right;>Wartość brutto</th>
		</tr>
	</thead>
{if isset($tablicaZamowien)}
  {foreach $tablicaZamowien as $towar}
		<tr>
		<td>{$lp}</td>
		<td>{$towar['KodTowaru']}</td>
		<td>{$towar['NazwaTowaru']}</td>
		<td>{$towar['Nazwa']}</td>
    <td align="center">{$towar['ilosc']}</td>
    <td align="right">{number_format($towar['cena'], 2, ',', ' ')} PLN</td>
		<td align="right">{number_format($towar['cena']*$towar['ilosc'], 2, ',', ' ')} PLN</td>
		<td align="right">{$towar['vat']}%</td>
		<td align="right">{number_format($towar['cena']*$towar['ilosc']*$towar['vat']/100, 2, ',', ' ')} PLN</td>
		<td align="right">{number_format((($towar['cena']*$towar['ilosc']*$towar['vat'])/100)+$towar['cena']*$towar['ilosc'], 2, ',', ' ')} PLN</td>
		</tr>
		{$lp=$lp+1}
		{$vaty[]=$towar['vat']}
		{$wartosci[]=$towar['cena']*$towar['ilosc']*$towar['vat']/100}
		{$wartoscnetto = $wartoscnetto+$towar['cena']*$towar['ilosc']}
		{$wartoscvat = $wartoscvat+$towar['cena']*$towar['ilosc']*$towar['vat']/100}
		{$wartoscbrutto = $wartoscbrutto+(($towar['cena']*$towar['ilosc']*$towar['vat'])/100)+$towar['cena']*$towar['ilosc']}
  {/foreach}
	{for $i=0 to sizeof($vaty)-1}
		{if array_key_exists($vaty[$i], $vatywartosci)}
		{$suma=$vatywartosci[$vaty[$i]]}
		{$suma=$suma+$wartosci[$i]}
		{$vatywartosci[$vaty[$i]]=$suma}
		{else}
		{$vatywartosci[$vaty[$i]]=$wartosci[$i]}
		{/if}
	{/for}
	<tr>
	<td></td>
	<td></td>
	<td></td>
	<td></td>
	<td></td>
	<td align="right"><b>Razem:</b></td>
	<td align="right"><b>{number_format($wartoscnetto, 2, ',', ' ')} PLN</b></td>
	<td></td>
	<td align="right"><b>{number_format($wartoscvat, 2, ',', ' ')} PLN</b></td>
	<td align="right"><b>{number_format($wartoscbrutto, 2, ',', ' ')} PLN</b></td>
	</tr>
	{foreach $vatywartosci as $key=>$value}
	<tr>
	<td></td>
	<td></td>
	<td></td>
	<td></td>
	<td></td>
	<td></td>
	<td></td>
	<td align="right"><b>{$key}%</b></td>
	<td align="right"><b>{number_format($value, 2, ',', ' ')} PLN</b></td>
	<td></td>
	</tr>
	{/foreach}
{/if}
</table>
<h3>Sposób dostawy: {$towar['SposobDostawy']}</h3>
<h3>Do zapłaty: {number_format($towar['Wartosc'], 2, ',', ' ')} PLN</h3>
{if isset($error)}
<strong>{$error}</strong>
{/if}

{include file="footer.html.php"}
