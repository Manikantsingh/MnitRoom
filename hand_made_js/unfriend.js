$('#UNFRIEND').click(function(){
    
    
       var href = $(this).attr('href');
    $('#status').hide().load(href).fadeIn('normal');
    
    
    return false;

});
