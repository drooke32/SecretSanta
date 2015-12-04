$(function(){
    SetupShadowBox();    
    BindItemSubmit();
    BindDeleteSubmit();
    BindEditButton();
    BindAddButton();    
    BindDeleteButton();    
    BindCloseButtons();
});

function SetupShadowBox(){
    var height = ($('body').height() + 80) > 1080 ? $('body').height() + 80 : 1080;
    $('.container-darkened').height(height);
    $('body').on('click', '.container-darkened', function(e){
        e.preventDefault();
        SetFormHidden();
    });
}

function BindItemSubmit(){
    $('body').on('click', '#item-submit', function(e){
        e.preventDefault();
        var formData = $('#item-form').serialize();
        $.ajax({
            type: "POST",
            url: "php/listItemController.php",
            data: formData,
            success: function(data){
                var response = JSON.parse(data);
                if(response.success){
                    if(response.type === "add"){
                        NewItem(response.data);
                    }
                    else{
                        EditItem(response.data);
                    }
                }
                else{
                    ShowError(response.error);
                }
            },
            error: function(data){
                var response = JSON.parse(data);
                ShowError(response.error);
            }
        });
   });
}

function BindDeleteSubmit(){
   $('body').on('click', '#delete-submit', function(e){
        e.preventDefault();
        var formData = $('#delete-form').serialize();
        $.ajax({
            type: "POST",
            url: "php/listItemController.php",
            data: formData,
            success: function(data){
                var response = JSON.parse(data);
                if(response.success){
                    DeleteItem(response.id);
                }
                else{
                    ShowError(response.error);
                }
            },
            error: function(data){
                var response = JSON.parse(data);
                ShowError(response.error);
            }
        });
   }); 
}

function BindEditButton(){
    $('body').on('click', '.edit-button', function(e){
        e.preventDefault();        
        var id = $(this).closest('.list-item').attr('id');
        var itemText = $('#item-desc-'+id).text();
        var locationText = $('#location-'+id).text();
        locationText = locationText.replace('Location: ','');
        $('#item').val(itemText);
        $('#location').val(locationText);
        $('#item-action').val('edit');
        $('#edit-id').val(id);
        $('#item-submit').text("Save");
        SetFormVisible('item-form');
    });
}

function BindAddButton(){
    $('body').on('click', '.add-button', function(e){
        e.preventDefault();
        $('#item').val("");
        $('#location').val("");
        $('#item-action').val('add');
        $('#edit-id').val("");
        $('#item-submit').text("Add Item");
        SetFormVisible('item-form');
    });
}

function BindDeleteButton(){
    $('body').on('click', '.delete-button', function(e){
        e.preventDefault();
        var id = $(this).closest('.list-item').attr('id');
        $('#delete-id').val(id);
        SetFormVisible('delete-form');
    });
}

function BindCloseButtons(){
    $('body').on('click', '.close-button', function(e){
        e.preventDefault();
        SetFormHidden();
    });
}

function NewItem(data){
    $('.no-items').remove();
    $('#list-container').append(data);
    SetFormHidden();
}

function EditItem(data){
    var id = data.Id;
    $('#item-desc-'+id).text(data.Item);
    $('#location-'+id).text("Location: "+data.Location);
    SetFormHidden();
}

function DeleteItem(id){
    $('#'+id).remove();
    SetFormHidden();
}

function ShowError(errorText){
    $('.error').text(errorText);
    $('.error').removeClass('hidden'); 
    SetFormHidden();
}

function SetFormVisible(formID){
    $('#'+formID).addClass('form-active');
    $('.add-button').addClass('hidden');
    $('.container-darkened').addClass('darken');
}

function SetFormHidden(){
    $('.form-active').removeClass('form-active');
    $('.add-button').removeClass('hidden');
    $('.container-darkened').removeClass('darken');
}

function ValidateInput(){
    
}

