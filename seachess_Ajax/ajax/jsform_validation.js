$(document).ready(function(){
    $('#form').validate({
        rules:{
            username:{minlength: 4, maxLength:30, required:true},
            password:{minlength: 4, maxLength:30, required:true},
            remote:{
                url:"../login_phpcode.php",
                type:post
            }
        },
        messages:{
            username:{
                required: "Username is required",
                maxLength: "Enter less than 30 symbols",
                minlength: "Enter more than 4 symbols"
            },
            password:{
                required: "Password is required",
                maxLength: "Enter less than 30 symbols",
                minlength: "Enter more than 4 symbols"
            }
        }
    });

});
