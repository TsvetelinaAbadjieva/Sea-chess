<div id="fb-root"></div>
<script src="https://connect.facebook.net/en_US/all.js" type="text/javascript"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript">

    $(document).ready(function () {

        FB.init({
            appId: '1245010045611759',
            cookie: true,
            xfbml: true,
            status: true
        });

        FB.getLoginStatus(function (response) {
            if (response.authResponse) {
                //$('#AccessToken').val(response.authResponse.accessToken);
                FB.api('/me?fields=email', function(response) {

                    $('#email').val(response.email);
                    //console.log(response.email);
                });
            } else {
                $('#status').innerHTML="No authorization!";
                FB.login(function(response) {
                }, {scope: 'email'});
            }
        });


    });


</script>

<script type="text/javascript">
/*


     window.fbAsyncInit = function() {
     FB.init({
     appId      : '1245010045611759',
     xfbml      : true,
     version    : 'v2.9'
     });
     FB.getLoginStatus(function(response){
     if(response.status==='connected'){
     document.getElementById('status').innerHTML='You are connected';
     }else if(response.status==='not_authorized'){
     document.getElementById('status').innerHTML='You are not authorized';
     }else {
     document.getElementById('status').innerHTML='You are not logged in to Facebook';
     }
     });
     FB.AppEvents.logPageView();
     };

     (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "//connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
     }(document, 'script', 'facebook-jssdk'));



     function login(){
     FB.login(function(response){
     if(response.authResponse){

     FB.api('/me', function(response) {
     //document.getElementById('status').innerHTML=response.email;
     alert('email is: '+ response.email);
     document.getElementById('email').value = response.email;
     //console.log(response.email);
     });
     }
     },{'scope':'email'});

     }
*/

</script>
<div id="status"></div>
