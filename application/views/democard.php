<html>
    <head>
        <title>Democard</title>
        <style>
            .city-card1{
                box-shadow: 1px 1px 10px 1px gray;
                padding: 30px;
                margin: 15px 10px;
            }
            .city-card-child{
                margin-top: 15%;
                box-shadow: 0px 0px 40px 4px orange ;
                border-radius: 100%;
               height: 80%;
               width: 55%;
           
            }
            .city-card-text{
              
                margin-top: 32%;
            }
            .city-card-subchild h1{
                padding: 3%;
            }

        </style>
        <?php
        require_once './CSS.php';
        ?>
    </head>
    <body>
        <div style="height: 300px;" ></div>
        <div class="container">
            <div class="row">
                <?php
                for ($i = 1; $i <= 4; $i++) {
                    ?>
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="city-card1">
                            <div class="city-card-parent">
                                <center>
                                    <div class="city-card-child">
                                        <center>
                                            <div class="city-card-subchild ">
                                                <center>
                                                    <h1>1</h1>
                                                </center>
                                            </div>
                                        </center>
                                    </div>
                                </center>
                            </div>
                            <div class="city-card-text">
                                <center>
                                    <h3 style="color: orangered;">Ahemdabad</h3>
                                </center>
                            </div>
                        </div>
                    </div>  
                    <?php
                }
                ?>
            </div>
        </div>
    </body>
</html>