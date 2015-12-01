$(function(){
   $('body').on('click', '#logout', function(e){
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: "php/logout.php",
            success: function(data){
                var response = JSON.parse(data);
                if(response.success){
                    window.location.href = response.location;
                }
            }
        });
   });
});

