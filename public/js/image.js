jQuery(document).ready(function(){
  jQuery('img.imagefield').each(function(){
    var width = jQuery(this).width();
    var new_width = 200; //nuevo tamaño
    if (width > new_width){
      var height = jQuery(this).height();
      var calculo = Math.round((100*new_width)/ width); //porcentaje
      var new_height = Math.round((height*calculo)/100);
      jQuery(this).css( {
        width : new_width+'px',
        height : new_height+'px'
      } );
    }
  });
});