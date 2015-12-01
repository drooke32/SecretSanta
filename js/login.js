$(function(){
   $('body').on('click', '#login-submit', function(e){
        e.preventDefault();
        var formData = $('form').serialize();
        $.ajax({
            type: "POST",
            url: "php/verifyLogin.php",
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
