//Reset form after it is submitted and automatically refresh the page

$(document).ready(function(){

    $('.beer_ajax').submit( function() {

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

$( ".beer_number" ).append( "<p>I have tried <span class='count_color'>" + beerCount + "</span> beers</p>" );

//Flip font icon when table header is clicked

$("th").click( function(){
  
  if ($(this).hasClass("headerSortDown")){
    
    $("i").removeClass();
    $(this).find('i').addClass("fa fa-sort-desc");
    
  } else if ($(this).hasClass("headerSortUp")) {
  
    $("i").removeClass();
    $(this).find('i').addClass("fa fa-sort-asc");
  
  } else {
  
    $("i").removeClass();
    $(this).find('i').addClass("fa fa-sort");
    
  }
  
});

//Add search function

