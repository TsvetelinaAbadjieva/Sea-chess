$(document).ready(function(){
    $('#formSend').validate({
        rules:{
            username:{
                minlength:4,
                maxlength:30,
                required:true
            },
    /*
            email:{
                minlength:4,
                maxlength:30,
                required:true,
                email:true
            },

            subject:{
                minlength:4,
                maxlength:100,
                required:true
            },
            message:{
                minlength:4,
                maxlength:300,
                required:true
            },
            */
            password:{
                 minlength:3,
                 maxlength:30,
                 required:true
                 }
            /*
            remote:{
                url:"../php/check_username.php",
                type:post
            }
            */
    },
        messages:{
            username:{
                minlength:"<span style='color:red'>More than <em><b>4 symbols</b></em> expected</span>",
                maxlength:"<span style='color:red'>No more than <em>30 symbols</em> expected</span>",
                required:"<span style='color:red'>Field is <em><b>required<b></em></span>"
            },
     /*       email:{
                minlength:"<span style='color:red'>More than <em><b>4 symbols</b></em> expected</span>",
                maxlength:"<span style='color:red'>No more than <em>30 symbols</em> expected</span>",
                required:"<span style='color:red'>Field is <em><b>required<b></em></span>",
                email: "<span style='color:red'>Enter a <em><b>valid email</b></em> </span>"
            },
            subject:{
                minlength:"<span style='color:red'>More than <em><b>4 symbols</b></em> expected</span>",
                maxlength:"<span style='color:red'>No more than <em><b>30 symbols</b></em></span>expected</span>",
                required:"<span style='color:red'>Field is <em><b>required<b></em></span>"
            },
            message:{
                minlength:"<span style='color:red'>More than <em>4 symbols</em> expected</span>",
                maxlength:"<span style='color:red'>No more than <em>100 symbols</em> expected</span>",
                required:"<span style='color:red'>Field is <em><b>required<b></em></span>"
            },
      */
            password:{
                required:"<span style='color:red'>Field is <em><b>required<b></em></span>",
                minlength:"<span style='color:red'>More than <em><b>6 symbols</b></em> expected</span>"
            },
            //remote: "<span style='color:red'> <em><b>Wrong credentials!<b></em></span>"

        }
    });

    var data={};
    $('#formSend').find('[name]').each(function(key,value){
        var name=$(this).attr('name');
        var value=$(this).val();
        data[name]=value;

    });
    /*
    that.find('[name]').each(function(index,value){
        var that=$(this),
            name=that.attr('name'),
            value=that.val();

        data[name]=value;
    });
    */

$('#submit').click(function(){
    $.ajax({
        url:'php/check_username.php',
        type: 'post',
        data:data,
        success:function(result){
            $('#error').addClass('success');
            $('#error').removeClass('error');
            $('#error').html('Success');
        },
        error:function(result){
            if(result['userExists']==false){
                $('#error').addClass('error');
                $('#error').removeClass('success');

                $('#error').html('Wrong credentials');
            }



        }

    });

});

});