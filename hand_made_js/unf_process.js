$('.free').click(function(){
    
    
       var href = $(this).attr('href');
    $.get(href, function(data){
        alert(data);
        $('#status').hide().load('http://localhost/ManiRoom/hand_made_js/unfriend.php').fadeIn('normal');
        
    });
    
    return false;

});
