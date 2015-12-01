$(function(){
   AddShowSecretLogic();
});

function AddShowSecretLogic(){
   $('body').on('click', '#show-secret', function(){
       $('.button-row').addClass('hidden');
       $('.secret-container').removeClass('hidden');
   }); 
}


