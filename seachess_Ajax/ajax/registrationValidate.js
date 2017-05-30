
$(document).ready(function(){
    //var username=$('#username').val();
    var baseUrl=window.location.origin;
    jQuery.validator.setDefaults({
        debug:true,
        success:  "valid"
    });
    var form=$('#registration');
    var email=$('#email').val();

    $('#registration').validate({
        rules:{
            username:{
                required:true,
                minlength: 4,
                maxlength: 30
            },
            password:{
                required:true,
                minlength:5,
                maxlength:30
            },
            confirmedPassword:{
                required:true,
                minlength:5,
                maxlength:30,
                equalTo: '#password'
            },
            email:{
                required:true,
                email :true,
                validEmail: isValidEmail(email),
                minlength : 8,
                maxlength : 30
            }
        }  ,
        messages:{
            username:{
                required: '<div class="has-error"><span style="color:red; font-size: 14px; font-family: SansSerif">Field is <em><b>required</b></em></span></div>',
                minlength:'<div class="has-error"><span style="color:red; font-size: 14px; font-family: SansSerif">At least <em><b>4 symbols required</b></em></span></div>',
                maxlength:'<div class="has-error"><span style="color:red; font-size: 14px; font-family: SansSerif">Max <em><b>30 symbols required</b></em></span></div>'
            },
            password:{
                required: '<div class="has-error"><span style="color:red; font-size: 14px; font-family: SansSerif">Field is <em><b>required</b></em></span></div>',
                minlength:'<div class="has-error"><span style="color:red; font-size: 14px; font-family: SansSerif">At least <em><b>5 symbols required</b></em></span></div>',
                maxlength:'<div class="has-error"><span style="color:red; font-size: 14px; font-family: SansSerif">Max <em><b>30 symbols required</b></em></span></div>'
            },
            confirmedPassword:{
                required: '<div class="has-error"><span style="color:red; font-size: 14px; font-family: SansSerif">Field is <em><b>required</b></em></span></div>',
                minlength:'<div class="has-error"><span style="color:red; font-size: 14px; font-family: SansSerif">At least <em><b>5 symbols required</b></em></span></div>',
                maxlength:'<div class="has-error"><span style="color:red; font-size: 14px; font-family: SansSerif">Max <em><b>30 symbols required</b></em></span></div>',
                equalTo:'<div class="has-error"><span style="color:red; font-size: 14px; font-family: SansSerif">Password  <em><b> do not match Confirmed Password</b></em></span></div>'
            },

            email:{
                required: '<div class="has-error"><span style="color:red; font-size: 14px; font-family: SansSerif">Field is <em><b>required</b></em></span></div>',
                minlength:'<div class="has-error"><span style="color:red; font-size: 14px; font-family: SansSerif">At least <em><b>8 symbols required</b></em></span></div>',
                maxlength:'<div class="has-error"><span style="color:red; font-size: 14px; font-family: SansSerif">Max <em><b>30 symbols required</b></em></span></div>',
                email: '<div class="has-error"><span style="color:red; font-size: 14px; font-family: SansSerif">Enter a <em><b>valid</b> email address</em></span></div>',
                validEmail: '<div class="has-error"><span style="color:red; font-size: 14px; font-family: SansSerif">Enter a <em><b>valid</b> email address</em></span></div>'
            }


        }

    });
    function isValidEmail(email){
        var pattern= new RegExp('/^[+a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/');
        return pattern.test(email);
    }

    function showError(div,error,message){
        div.addClass('has-error');
        error.html(message);
    }
   $('#submit').click(function(){
       if(form.valid() == true){
           $.ajax({
               url:     baseUrl+'/MyPHP_files/seachess_Ajax/php/insertUser.php',
               type:    'POST',
               dataType:'html',
               data:{data:$(form).serialize()}
           }).done(function(response){

               if(response ==1){
                   $('#message').html('Record is inserted!').show();
                   window.location.href=baseUrl+'/MyPHP_files/seachess_Ajax/game.php';
               }else if(response ==0){
                   $('#message').html('Record is NOT inserted!').show();
               }

           }).fail(function(jqXHR,textStatus){

               alert( "Request failed: " + textStatus);


           });
       }



   });

    function checkUsername(username){
        $('#username').on('blur',function(){
            $.ajax({
                url:    baseUrl+'/MyPHP_files/seachess_Ajax/php/checkFreeUsername.php',
                data:{ username: username},
                type:'POST',
                dataType:'json'
            }).done(function(response){
                if(String(response)===String(true)){
                    console.log(respone);
                    return true;
                }

            }).fail(function(response){
                if(String(response)===String(false)){
                    showError($('#divUsername'),$('#errorUsername'),'This user is already in use');
                    console.log(respone);
                }
            });
        });

    }
    /*
    $('#register').click(function(){

        //event.preventDefault();
        $.ajax({
            url:'http://mylocal.dev/MyPHP_files/seachess_Ajax/php/insertUser.php',
            type:'POST',
            data: $('form').serialize()
        }).done(function(response){
            if(response.result==true)
                $('#userExists').html('Record is inserted!').show();
        }).fail(function(response){
            if(response.result==false)
                $('#userExists').html('Record is NOT inserted!');

        });
    });
    */
    $('#username, #email').blur(function(){
        var username= $('#username').val();
        var email   = $('#email').val();

        $.ajax({
            url:    baseUrl+'/MyPHP_files/seachess_Ajax/php/checkFreeUsername.php',
            type:   'POST',
            data:{ 'username': username,
                   'email'  : email
            },
            dataType:'text'

        }).done(function(response){
            if(String(response)!=''){
                if(response.indexOf('email')>-1)
                    $('#errorEmail').html(response).show();
                else
                    $('#errorUsername').html(response).show();
            }else{
                $('#errorEmail').html(response).hide();
                $('#errorUsername').html(response).hide();
            }
        }).fail(function(response){
            alert('Something went wrong in this request!');
            console.log(response);
        });


    });

});