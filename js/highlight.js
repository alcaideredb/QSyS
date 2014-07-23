$(document).ready(function(e){
    $('#highlight').css('z-index','99999');
    $('#overlay').fadeIn(300);
});

$('#overlay').click(function(e){
    $('#overlay').fadeOut(300, function(){
        $('.expose').css('z-index','1');
    });
});