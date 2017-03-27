{include file="header.html.php"}
<div class="page-header">
	<h1>Szybka nawigacja</h1>
	</div>
		<div class="row">
		  <div class="col-sm-6 col-md-4">
		    <div class="thumbnail">
		      <div class="caption">
		        <h3>Kategorie</h3>
		        <p><a href="#" class="btn btn-info" role="button">Lista kategorii</a>
							<a href="#" class="btn btn-primary" role="button">Dodaj nową kategorię</a></p>
		      </div>
		    </div>

		  </div>
			  <div class="col-sm-6 col-md-4">
			    <div class="thumbnail">
			      <div class="caption">
			        <h3>Towary</h3>
			        <p><a href="#" class="btn btn-info" role="button">Lista towarów</a>
								<a href="#" class="btn btn-primary" role="button">Dodaj nowy towar</a></p>
			      </div>
			    </div>
			  </div>

				  <div class="col-sm-6 col-md-4">
				    <div class="thumbnail">
				      <div class="caption">
				        <h3>Handel</h3>
				        <p><a href="#" class="btn btn-default" role="button">Bieżące zamówienie</a>
									<a href="#" class="btn btn-success" role="button">Historia handlu</a></p>
				      </div>
				    </div>
				  </div>

					  <div class="col-sm-6 col-md-4">
					    <div class="thumbnail">
					      <div class="caption">
					        <h3>Statystyka</h3>
					        <p><a href="#" class="btn btn-warning" role="button">Zestawienia sprzedaży</a></p>
					      </div>
					    </div>
					  </div>
			</div>

	<h1>To jest index</h1>
	<h2>{d($smarty.session)}</h2>
</div>
{include file="footer.html.php"}
