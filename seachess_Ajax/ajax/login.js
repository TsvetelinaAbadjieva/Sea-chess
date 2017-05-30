$(document).ready(function(){
    var form=$('#loginForm');
    var baseUrl=window.location.origin;
    $('#username').val('');
    $('#password').val('');

    $('#loginForm').validate({
        rules:{
            username:{
                required:true
            },
            password:{
                required:true
            }
        },

        messages:{
            username: {
                required: '<div style="color:indianred" class="has-error"><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span><span class="has-feedback" style="color:indianred; font-size: 14px; font-family: SansSerif">Field is <em><b>required</b></em></span></div>'
            },

            password:{
                required: '<div style="color:indianred" class="has-error"><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span><span class="has-feedback" style="color:indianred; font-size: 14px; font-family: SansSerif">Field is <em><b>required</b></em></span></div>'
            }

        }

    });


/*
    $('form.ajax').on('submit',function(){
        var that=$(this),
            url='/../login_phpcode.php',
            method=that.attr('method'),
            data={};

        that.find('[name]').each(function(index,value){
            var that=$(this),
                name=that.attr('name'),
                value=that.val();

            data[name]=value;
        });
        console.log(data);
        $.post(url,data, function(result){
            if(result!=1){

                alert(result);
                $('#username').val(result['username']);
                $('#password').val(result['password']);
                $('divMessage').html('Wrong Credentials!').show();
            }
            else  window.location.href('game.php');

        });


        return false;
    });
 */
    $('#submit').click(function(){
        $.ajax({
            url:    baseUrl+'/MyPHP_files/seachess_Ajax/login_phpcode.php',
            type:   'POST',
            data:   {'data': $(form).serialize()},
            dataType:'html'
        }).done(function(response){
            if(response!=1){
                $('#divMessage').html('Wrong Credentials!').show();
            }
            else window.location.href='http://mylocal.dev/MyPHP_files/seachess_Ajax/game.php';

        }).fail(function(jqXHR,textStatus){
            alert('Something went wrong: '+textStatus);
        });
    return false;
    });
/*
 function clearFields(){
     $('form.ajax').find('[name]').each(function(){
         $(this).val('');
     })
 }
 */
});