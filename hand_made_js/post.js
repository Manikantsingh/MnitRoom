$('#post').click(function (){
    
     var status = $('#status_update').val();
     $.get("http://localhost/ManiRoom/hand_made_js/post.php", { status: status }, function(data){
  alert("info: " + data);
         
    $('#status').hide().load('http://localhost/ManiRoom/hand_made_js/new_status.php').fadeIn('normal');
});
    
    
});