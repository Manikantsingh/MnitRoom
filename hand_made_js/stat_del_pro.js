$('.menu_top_c').click(function(){
    
     var href = $(this).attr('href');
    
    $.get(href, function(data){
       alert(data);
        $('#status').hide().load('http://localhost/ManiRoom/hand_made_js/status_del.php').fadeIn('normal');
    });
    
   
    
   return false;
    
});