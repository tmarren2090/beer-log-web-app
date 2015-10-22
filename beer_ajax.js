jQuery(document).ready(function(){

    jQuery('.beer_ajax').submit( function() {

        $.ajax({
            url     : $(this).attr('action'),
            type    : $(this).attr('method'),
            data    : $(this).serialize(),
            success : function( data ) {
                         $('.beer_ajax')[0].reset();
                         window.location.reload();
                      },
            error   : function(){
                         alert('Something wrong');
                      }
        });

        return false;
    });

});