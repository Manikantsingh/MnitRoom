
 $('#loading-example-btn').click(function () {
    var btn = $(this);
    btn.button('loading');
     
    var friend_name = $('#last').text();

    $.get("http://localhost/ManiRoom/hand_made_js/friend_request.php", { friend_name: friend_name }, function(data){
  alert("info: " + data);
});
         
     });

   
