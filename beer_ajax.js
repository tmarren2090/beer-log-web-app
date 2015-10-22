//Reset form after it is submitted and automatically refresh the page

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

//Count all the rows of the table and display how many beers have been tried

var beerCount = $('tr').length - 1;

$( ".beer_number" ).append( "<p>I have tried " + beerCount + " beers</p>" );