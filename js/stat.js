$(function(){
      $('#kryterium').change(function(){
         $('#kat')[($(this).val()=='klientKasa' || $(this).val()=='kategoriaKasa') ? 'hide' : 'show']();
         $('#fragment')[$(this).val()=='kategoriaKasa' ? 'hide' : 'show']();
      }).trigger('change');
   });
