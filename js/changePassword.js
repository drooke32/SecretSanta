$(function(){
   $('body').on('click', '#password-submit', function(e){
        e.preventDefault();
        if(ValidateInput()){
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
                        ShowError("Password Reset Failed");
                    }
                },
                error: function(data){
                   ShowError("Password Reset Failed");
                }
            });
        }
    });
});

function ValidateInput(){
    var result = true;
    var pass1 = $('#password').val();
    var pass2 = $('#password2').val();
    if(pass1 === null || pass1 === ""){
        ShowError("Password cannot be empty");
        result = false;
    }
    else if(pass1.length < 6){
        ShowError("Password must be at least 6 characters long");
        result = false;
    }
    if(result && (pass2 === null || pass2 === "" || pass2 !== pass1)){
        ShowError("Passwords must match");
        result = false;
    }  
    return result;
}

function ShowError(errorText){
    $('.error').text(errorText);
    $('.error').removeClass('hidden'); 
}


