$('#username').keyup(function(){

    var username = $(this).val();
    
    $('#username_status').text('checking availability.....');
    
    if(username !=''){
        
        $.post('http://localhost/ManiRoom/hand_made_js/check_username.php',{ username: username },function(data){
            
            $('#username_status').text(data);
        });
    }else{
        
        $('#username_status').text('');
    }
});