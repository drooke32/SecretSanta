$(function(){
   $('body').on('click', '#password-submit', function(e){
        e.preventDefault();
        var formData = $('form').serialize();
        $.ajax({
            type: "POST",
            url: "php/verifyPassword.php",
            data: formData,
            success: function(data){
                var response = JSON.parse(data);
                if(response.success){
                    window.location.href = response.data.location;
                }
                else{
                    $('.error').removeClass('hidden');
                }
            },
            error: function(data){
               $('.error').removeClass('hidden'); 
            }
        });
   });
});


