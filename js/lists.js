$(function(){
   $('#user-select').change(function(){
       var id = $(this).val();
       if(id !== "none"){
           $('form').submit();
       }
   });
});