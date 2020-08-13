$('.menu_top').click(function() {
    
    var href = $(this).attr('href');
   $.get(href, function(data){
       
       $('#noti_area').hide().load('http://localhost/ManiRoom/hand_made_js/pending_request.php').fadeIn('normal');
    
    });
    return false;
    
   
});