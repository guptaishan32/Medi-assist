$(document).ready(function(){
    
 $("#sfrm").validate({
           rules: {
               password: { 
                 required: true,
                    minlength: 6,
                    maxlength: 10,

               } , 

           },
     messages:{
         password: { 
                 required:"the password is required"

               }
     }

});

    
    
    
});