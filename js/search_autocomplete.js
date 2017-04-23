$(document).ready(function()
{
	//tutaj wstawiamy kod JQuery, który zostanie uruchomiony
	//jak tylko dokument będzie gotowy do manipulowania jego elementami

    $('#towar').autocomplete({
      source: function( request, response ) {
        $.ajax({
          dataType: "json",
          type : 'GET',
          url: './ajax/ajax_autocomplete.php',
          data: {
            term : request.term
          },
          success: function(data) {
          $('#towar').removeClass('ui-autocomplete-loading');
            //	map: przetwarza każdy element tablicy data
            //	na nową tablicę przy pomocy function(item, key)
            response( $.map( data, function(item, key) {
              //return item;
              return {
                label: item,
                value: item,
                id: key
              }
            }));
          },
          error: function(data) {
            $('#towar').removeClass('ui-autocomplete-loading');
          }
        });
      },
      select: function( event, ui ) {
        //alert(ui.item.id);
        var tempId = ui.item.id;
        window.location.assign(location.protocol+"//"+window.location.host+"/PZ/Towar/showone/"+tempId);
      }
    });



});
