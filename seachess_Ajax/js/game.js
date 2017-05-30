$(document).ready(function() {



    var symbol1=$('.gbutton').attr("value");
    var symbol2=$('.rbutton').attr('value');
    var turnFirst='gamer';
    var box =$('.box');
    counter=1;
    var gameover=false;
    var stepGamer=0;
    var stepRobot=0;
    var dimension=$('#matrix').val();
    if(dimension>4)
        $('.box').css({'width': '-=10', 'height':'-=10'});
    if(dimension>6)
        $('.box').css({'width': '-=15', 'height':'-=15'});

    $("#results").on('click',function(event){
        event.preventDefault();
        $("#table2").slideToggle(1500);
        $("#table2").fadeIn("slow");
        //return false;
    });

    /*prevent gamer to complete column or trying to complete his own column and to win the game*/
      function stop_complete_col(symbol,dimension){

        var count=0;
        var free_pos=0;
        var limit=dimension;

        for(i=1;i<=limit;i++){
            free_pos=0;
            count=0;
            for(j=1;j<=limit;j++){
                if($('#'+(i+(j-1)*dimension)).val() != symbol && $('#'+(i+(j-1)*dimension)).val()!= ''){
                    break;
                }
                else {
                    if($('#'+(i+(j-1)*dimension)).val()== '')
                        free_pos=i+(j-1)*dimension;
                    else count++;
                }
                if(count==(dimension-1) && free_pos!=0)
                    return free_pos;
            }

        }
        return 0;
    }

    /*prevent gamer to complete row or trying to complete his own row and to win the game*/
    function stop_complete_row(symbol,dimension){

        var count=0;
        var free_pos=0;
        var limit=dimension;

        for(i=1;i<=limit;i++){
            free_pos=0;
            count=0;

            for(j=1;j<=limit;j++){
                if($('#'+((i-1)*dimension+j)).val()!= symbol && $('#'+((i-1)*dimension+j)).val()!= ''){
                    break;
                }
                else {
                    if($('#'+((i-1)*dimension+j)).val()== ''){
                        free_pos=((i-1)*dimension+j);
                    }

                    else count++;
                }
                if(count==(dimension-1) && free_pos!=0)
                    return free_pos;


            }

        }
        return 0;
    }

    /*prevent gamer to complete main_diagonal or trying to complete his own and to win the game*/
    function stop_complete_main_diag(symbol,dimension){

        var count=0;
        var free_pos=0;
        var limit=dimension;

            free_pos=0;
            count=0;
            for(i=1;i<=limit;i++){
                if($('#'+((i-1)*dimension+i)).val()!=symbol && $('#'+((i-1)*dimension+i)).val()!= ''){
                    break;
                }
                else {
                    if($('#'+((i-1)*dimension+i)).val()== '')
                        free_pos=((i-1)*dimension+i);
                    else count++;
                }
                if(count==(dimension-1) && free_pos!=0)
                    return free_pos;
            }
        return 0;

    }

    /*prevent gamer to complete second_diagonal or trying to complete his own and to win the game*/
    function stop_complete_second_diag(symbol,dimension){

        var count=0;
        var free_pos=0;
        var limit=dimension;

        free_pos=0;
        count=0;
        for(i=1;i<=limit;i++){
            if($('#'+(i*(dimension-1)+1)).val()!=symbol && $('#'+(i*(dimension-1)+1)).val()!= ''){
                break;
            }
            else {
                if($('#'+(i*(dimension-1)+1)).val()== '')
                    free_pos=(i*(dimension-1)+1);
                else count++;
            }
            if(count==(dimension-1) && free_pos!=0)
                return free_pos;
        }
        return 0;

    }

    /* checking for existing horizontal line of equal symbols  in the matrix with dimension = n*/
    function check_horizontal_line(symbol,dimension){

        var limit=dimension;

        for(i=1;i<=limit;i++){
            var flag=true;
            for(j=1;j<=limit;j++)
                if($('#'+((i-1)*dimension+j)).val()!= symbol){
                    flag=false;
                    break;
                }
            if(flag) return true;
        }

        return flag;
    }


    /* checking for existing vertical line of equal symbols  in the matrix with dimension = n x n*/
    function check_vertical_line(symbol, dimension){

        var limit=dimension;
        for(i=1;i<=limit;i++){
            var flag=true;
            for(j=1;j<=limit;j++)
                if($('#'+(i+(j-1)*dimension)).val() != symbol){
                    flag=false;
                    break;
                }
            if(flag) return true;

        }
        return flag;
    }

    /*checking for existence of equal symbols in the main diagonal with indexes -11,22,33*/
    function chek_main_diagonal(symbol, dimension){

        var limit=dimension;

        var flag=true;
        for(i=1;i<=limit;i++){
            if($('#'+((i-1)*dimension+i)).val()!=symbol) {
                flag = false;
                break;
            }
        }
        return flag;
    }

    /*checking for existence of equal elements in the second diagonal indexes - 13, 22, 31*/
    function check_second_diagonal(symbol,dimension){
        var limit=dimension;
        var flag=true;
        for(i=1;i<=limit;i++){
            if($('#'+(i*(dimension-1)+1)).val()!=symbol){
                flag=false;
                break;
            }

        }
        return flag;
    }
    /* final conclusion of existence or not existence of winner*/
    function winner_exists(symbol,dimension){

        if(check_vertical_line(symbol, dimension) || check_horizontal_line(symbol,dimension)
            || chek_main_diagonal(symbol, dimension) || check_second_diagonal(symbol,dimension))
            return true;
        return false;
    }

    /*These function release the robot pass*/
    // robot turn inline


    $('.gbutton').on('click',function(){
        //var symbol1=$(this).attr("value");
        // alert(symbol1);
        if(counter==1) {
            if ($(this).text() == 'X') {
                $(this).text('O');
                $('.rbutton').text('X');
                $('#gtext').val('O - Gamer');
                $('#rtext').val('X - Robot');
                $(this).attr('value', 'O');
                $('.rbutton').attr('value', 'X');
                $('#gtext').css({'backgroundColor': 'white'});
                $('#rtext').css({'backgroundColor': 'powderblue'});
                turnRobot($('.rbutton').val(),0);
                counter++;
                timerStart(1300);
                turnFirst = 'robot';


            } else {
                $(this).text('X');
                $('.rbutton').text('O');
                $('#gtext').val('X - Gamer');
                $('#rtext').val('O - Robot');
                $(this).attr('value', 'X');
                $('.rbutton').attr('value', 'O').button('refresh');
                $(this).attr('value', 'X').button('refresh');
                turnFirst = 'gamer';
            }
        }


    });

    function timerStart(time){
        setTimeout(function () {
            $('#gtext').css({'backgroundColor': 'gold'});
            $('#rtext').css({'backgroundColor': 'white'});
            $('#gtext').val('You turn');
        }, time);

    }

    function turnGamer(box,symbol1){
        stepGamer++;
        box.val(symbol1);
        $('#gtext').css({'backgroundColor': 'white'});
        $('#rtext').css({'backgroundColor': 'powderblue'});
    }

    function turnRobot(symbol2,id){

        var col=id%dimension;
        var row=Math.floor(id/dimension)+1;
        var flag=false;
        var urgent_pass=0;
        var urgent_pass_col=0;
        var urgent_pass_row=0;
        var urgent_pass_main_diag=0;
        var urgent_pass_second_diag=0;

        if(id%dimension==0) row=row-1;

        /*try to win the game*/
        urgent_pass_row = stop_complete_row(symbol2,dimension);
        urgent_pass_col = stop_complete_col(symbol2,dimension);
        urgent_pass_main_diag = stop_complete_main_diag(symbol2,dimension);
        urgent_pass_second_diag = stop_complete_second_diag(symbol2,dimension);
        if(urgent_pass_col>0) urgent_pass = urgent_pass_col;
        else if(urgent_pass_main_diag>0) urgent_pass = urgent_pass_main_diag;
        else if(urgent_pass_second_diag>0) urgent_pass = urgent_pass_second_diag;
        else if(urgent_pass_row>0) urgent_pass = urgent_pass_row;
        // alert('danger='+urgent_pass);
        if(urgent_pass>0){
            $('#'+urgent_pass).val(symbol2);
            stepRobot++;
            return;
        }


        /*try to block gamer to gain*/
        urgent_pass_row = stop_complete_row(symbol1,dimension);
        urgent_pass_col = stop_complete_col(symbol1,dimension);
        urgent_pass_main_diag = stop_complete_main_diag(symbol1,dimension);
        urgent_pass_second_diag = stop_complete_second_diag(symbol1,dimension);
        if(urgent_pass_col>0) urgent_pass = urgent_pass_col;
        else if(urgent_pass_main_diag>0) urgent_pass = urgent_pass_main_diag;
        else if(urgent_pass_second_diag>0) urgent_pass = urgent_pass_second_diag;
        else if(urgent_pass_row>0) urgent_pass = urgent_pass_row;
       // alert('danger='+urgent_pass);
        if(urgent_pass>0){
            $('#'+urgent_pass).val(symbol2);
            stepRobot++;
            return;
        }

        //check to turn in horizontal line
        flag=false;
        for(i=1;i<=dimension;i++){
            for(j=1;j<=dimension;j++){
                if($('#'+((row-1)*dimension+j)).val()==symbol2){
                    flag=true;
                    break;
                }
            }
            if(flag) break;
            if($('#'+((row-1)*dimension+i)).val()=='' ){
                $('#'+((row-1)*dimension+i)).val(symbol2);
                stepRobot++;
               // alert('Row');
                return;
            }
        }

        //check to turn in vertical line
        flag=false;
        for(i=0;i<dimension;i++){
            for(j=0;j<dimension;j++){
                if($('#'+(col+dimension*j)).val()==symbol2){
                    flag=true;
                    break;
                }
            }
            if(flag) break;
            if($('#'+(col+dimension*i)).val()==''){
                $('#'+(col+dimension*i)).val(symbol2);
                stepRobot++;
               // alert('Col');
                return;
            }

        }

        //check to turn in main diagonal
        flag=false;
        if(row==col)
            for(i=1;i<=dimension;i++) {
                for(j=1;j<=dimension;j++){
                    if($('#' + (dimension * (j - 1) + j)).val() == symbol2){
                        flag=true;
                        break;
                    }

                }
                if(flag) break;

                if ($('#' + (dimension * (i - 1) + i)).val() == '') {
                    $('#' + (dimension * (i - 1) + i)).val(symbol2);
                    stepRobot++;
                   // alert('Main diagonal');
                    return;
                }
            }

        //check to turn in second diagonal
        flag=false;
        for(i=0;i<dimension;i++) {
            for(j=0;j<dimension;j++){
                if ($('#' + ((j + 1) * dimension - j)).val() == symbol2){
                    flag=true;
                    break;
                }
            }
            if(flag) break;
            if ($('#' + ((i + 1) * dimension - i)).val() == '') {
                $('#' + ((i + 1) * dimension - i)).val(symbol2);
                stepRobot++;
               // alert('Second diagonal');
                return;

            }
        }
        // turn hazard
        flag = false;
        number = 0;
        while (!flag && number<30) {
            var index = Math.floor(Math.random() * Math.pow(dimension,2)) + 1;
            if ($('#' + index).val() == '' || $('#' + index).val() == null) {
                flag = true;
                stepRobot++;
                $('#' + index).val(symbol2).show();
                //alert('Hazard');
                break;
            }
            number++;
        }
    }




    $('.box')
        .focus(function () {
            symbol1=$('.gbutton').text();
            symbol2=$('.rbutton').text();

            if(winner_exists(symbol1,dimension)){
                $('#gamerStep').text(stepGamer);
                $('#gamerwin').show();
                $('.reset').show();
                $('#result').val('2').show();
                gameover=true;

            }
            else if(winner_exists(symbol2,dimension)){
                $('#robotStep').text(stepRobot);
                $('#robotwin').show();
                $('.reset').show();
                $('#result').val('0').show();
                gameover=true;

            }
            else {
                if ( $(this).val() == '') {

                        turnGamer($(this),symbol1);
                        gamerId=$(this).attr('id');
                        counter++;
                        turnRobot(symbol2,gamerId);
                        counter++;
                        timerStart(1300);

                }

            }//else

            if (!winner_exists(symbol1, dimension) && !winner_exists(symbol2, dimension) && (counter >= Math.pow(dimension, 2) )) {
                $('#nowinner').show();
                $('.reset').show();
                $('#result').val('1').show();
            }

            $('.reset').on('click',function(){
                $(this).form.reset();
                $('#table2').hide(1500);
                counter=1;
            });


        } );

});


