   $(function(){
      $('#kryterium').change(function(){
         $('#kat')[$(this).val()=='klientKasa' ? 'hide' : 'show']();
              }).trigger('change');
   });
