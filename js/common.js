$(function(){
    AddMenuToggle();
    AddLogoutClick();
});

function AddLogoutClick(){
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
}

function AddMenuToggle(){
    $('body').on('click', '.menu-container', function(e){
        //e.preventDefault();
        $('.c-hamburger').toggleClass('is-active');
        $('.drop').toggleClass('is-active');
    });
}

