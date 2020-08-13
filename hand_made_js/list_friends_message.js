$('#message_list').click(function(){
    
       var href = $(this).attr('href');
    $('#main_container').hide().load(href).fadeIn('normal');
    
    return false;
});
