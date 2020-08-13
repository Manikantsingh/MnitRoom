$('#notifications').click(function (){
   

    $.get('http://localhost/ManiRoom/hand_made_js/pending_request.php', function(data){
        $('#noti_area').html(data);
        
    });
    
});