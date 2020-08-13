$('#update_id').click(function (){
    
  var btn = $(this);
    btn.button('loading');
   
    var first_name = $('#first_name').val();
    var last_name = $('#last_name').val();
    var dob = $('#dob').val();
    var pass =$('#pass').val();
    var email = $('#email').val();
    var country = $('#country').val();
    var zip = $('#zip').val();
    
 $.get("http://localhost/ManiRoom/hand_made_js/update_id.php", { first_name: first_name,last_name: last_name,dob: dob,pass: pass,email: email,country: country,zip: zip   }, function(data){
  alert("info: " + data);
     
     $('#status').hide().load('http://localhost/ManiRoom/hand_made_js/edit.php').fadeIn('normal');
});

    
});