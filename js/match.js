$(function(){
   $('body').on('click', '#match', function(e){
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: "php/matchUsers.php",
            success: function(data){
                var response = JSON.parse(data);
                $('.results-container').html(response.html);
            },
            error: function(data){
                var response = JSON.parse(data);
                $('.results-container').html(response.html);
            }
        });
   });
});


