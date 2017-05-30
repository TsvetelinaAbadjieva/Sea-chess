<?php require_once "common/header.php";?>

<?php
require_once "common/init.php";
checkLogin();
showFlash();
unset ($_SESSION['flash']);

$url="game.php";
if(isset($_POST['logout'])) logout();





$matrix=isset($_GET['matrix'])?(int)htmlspecialchars(trim($_GET['matrix']),3):3;





?>

<div class="row map">
    <div class="border col-md-12 col-xs-12 col-sm-12">
    <div class="row "><div class="col-md-12 col-xs-12 col-sm-12 frame" style="height: 100px;"><h1 style="width:63%;font-size: 55px; padding-left:50px;display:inline-block;">Sea Chess</h1></div></div>

    <div class="col-md-9  col-xs-12 col-sm-12">

            <div class="col-md-9 col-xs-12 col-sm-12">
                <ul class="gamers">
                    <li><label for="" style="font-size:20px; color:limegreen; font-family: Gabriola; margin-top:15px;">Gamer with "X" turns first. Click user's button 'X' to switch the order</label></li>
                    <li><button class="button button2 gbutton" id="#gbutton" value="X">X</button><input  id="gtext" type="text" value="X - <?php echo $_SESSION['username']; ?>"  disabled class="labels" style="margin-left:0px;"></li>
                    <li><button class="button button2 rbutton" id="#rbutton" value="O">O</button><input  id="rtext" type="text" value="O - Robot" disabled class="labels"style="margin-left:0px;"></li>
                    <li><img style="width:120px; height: 100px; margin-left:80px;"src="https://previews.123rf.com/images/sababa66/sababa661008/sababa66100800036/7664287-Sea-Wolf-Standing-At-The-Wheel-Stock-Vector-sailor-captain-boat.jpg" alt=""></li>
                    <li><img style="width:120px; height: 100px; background-color: white; margin-left:160px;"src="css/Captain_Metal.jpg" alt=""></li>
                </ul>
            </div>

    </div>
    <div class="col-md-3  col-xs-6 col-sm-6">
        <form action="" method="post">
            <div>
                <input class="btn btn-logout" type="submit" name="logout" value="Logout"></input>
            </div>
        </form>
        <div style="float:right; padding-top:10px;">
            <label for="" class="username" >Username:  </label>
            <label class="user" style="float:right;"><?php echo $_SESSION['username']; ?></label>

        </div>
    </div>


        <div class="">
            <div class="col-md-9 col-md-9 col-xs-12 col-sm-12">
                <div class="col-md-1 col-xs-1 colsm-1"></div>
                <div class="col-md-8 col-xs-12 col-sm-12">
                    <form action="" method="post">

                        <table class="table" style="margin-left:-10px;">
                            <?php
                            $total_rows=$matrix;
                            $count=1;

                            for($i=1;$i<=$total_rows;$i++) {?>
                                <tr>
                                    <?php for($j=1;$j<=$total_rows;$j++) {?>
                                        <td><input class="box" type="text" value="" name="cell" id="<?php echo $count; ?>"></td>
                                    <?php $count++;} ?>
                                </tr>
                            <?php } ?>
                        </table>

                        <div class="row">
                            <div class="">
                                <label for=""style="font-family: Gabriola; color:darkorange; font-size:30px;">Result</label>
                                <input type="text" name="result" id="result" class="result" value="" readonly style="width:50px; heigh:50px;">

                                <button class="reset save" id="save" name="save" hidden>Save</button>
                                <button class="reset" id="reset" name="reset"hidden>Reset</button>
                            </div>
                        </div>

                        <div class="row col-md-9 col-xs-12 col-sm-12">
                                <div class="gamer col-md-9 col-xs-9 col-sm-9" id="gamerwin" hidden><span><?php echo $_SESSION['username']; ?>, you win on your <label for="" id="gamerStep"></label> step</span></div>
                                <div class="robot col-md-9 col-xs-9 col-sm-9" id="robotwin" hidden><span>Robot is winner on his <label for="" id="robotStep"></label> step</span></div>
                                <div class="nowinner col-md-9 col-xs-9 col-sm-9" id="nowinner"hidden ><span>No one, is winner. Try again! </span></div>
                                <div class="nowinner col-md-9 col-xs-9 col-sm-9" id="message" hidden ><span><?php echo $message; ?> </span></div>
                        </div>
                        <div id="message"></div>

                    </form>

                </div>
            </div>
            <aside class="asside col-md-3 col-xs-8 col-sm-8 border">
                <div class="col-xs-1 col-sm-1"></div>
                <div class="" >
                    <form action="game.php?=<?php echo $matrix ?>" method="get">
                        <label class="matrix" for="dimensions" style="float:left;margin-top:15px;">Matrix dimension </label>

                        <select name="matrix" id="matrix"  class="btn btn-default dropdown-toggle btn1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="margin-top:7px; margin-bottom:7px;  float:right;" onchange="this.form.submit()">
                            <option  value="3" selected>3 X 3</option>
                            <option  value="4" <?php echo (isset($matrix) && ($matrix=='4'))?'selected':''; ?>>4 X 4</option>
                            <option  value="5" <?php echo (isset($matrix) && ($matrix=='5'))?'selected':''; ?>>5 X 5</option>
                            <option  value="6" <?php echo (isset($matrix) && ($matrix=='6'))?'selected':''; ?>>6 X 6</option>
                            <option  value="7" <?php echo (isset($matrix) && ($matrix=='7'))?'selected':''; ?>>7 X 7</option>
                            <option  value="8" <?php echo (isset($matrix) && ($matrix=='8'))?'selected':''; ?>>8 X 8</option>
                            <option  value="9" <?php echo (isset($matrix) && ($matrix=='9'))?'selected':''; ?>>9 X 9</option>
                        </select>

                    </form>
                    <div class="">
                        <button  id="showResults" type="button" class="button button2" style="width:270px; height:38px; font-size:12px; float:right; padding-bottom:5px;">Show results</button>

                    </div>


                </div>
                <div>

                    <table class="table hover table-condensed table-bordered" hidden id="table2">

                    </table>

                </div>
                <div class="">
                    <p>
                    <ul class="pager">
                        <li><a href=""class="prev" id="">Prev</a></li>
                        <li><a href=""class="current" id=""></a></li>
                        <li><a href="" class="next" id="">Next</a></li>
                    </ul>
                    </p>
                </div>
                <div id="close" hidden><p><a type="button" href="">Close table</a></p></div>

                <div class="message">

                </div>

            </aside>

        </div>

        <div class="row"><div class="col-md-12 col-xs-12 col-sm-12" style=""><img src="http://uhd-wallpapers.net/images/wonderful-sea-coast_129.jpeg" alt="" style="width:101.1%; height:110px;"></div></div>
</div>
</div>

    <script type="text/javascript" src="ajax/loadData.js"></script>

    <script src="js/game.js"></script>

<?php require_once "common/footer.php"?>