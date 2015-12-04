$(function(){
   $('body').on('click', '#login-submit', function(e){
        e.preventDefault();
        if(ValidateInput()){
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
                        ShowError("Invalid Username or Password");
                    }
                },
                error: function(data){
                   ShowError("Invalid Username or Password");
                }
            });
        }
    });
});

function ValidateInput(){
    var result = true;
    var username = $('#inputUsername').val();
    var pass = $('#inputPassword').val();
    if(username === null || username === ""){
        ShowError("Enter a Username");
        result = false;
    }
    if(result && (pass === null || pass === "")){
        ShowError("Enter a Password");
        result = false;
    }    
    return result;
}

function ShowError(errorText){
    $('.error').text(errorText);
    $('.error').removeClass('hidden'); 
}
