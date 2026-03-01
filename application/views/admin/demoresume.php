<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Munchbox | Demo</title>
        <?php
        $this->load->view("seller/headerscript");
        ?>
        <style>

            .user-cover{
                margin: 20px;
                height: 250px;
                width: 100%;
                background: url(../../../seller_assets/images/others/nav-1.jpg);
                background-size: cover;
                position: relative;
            }
            .cover-label{
                width: 100%;
                height: 250px;
            }
            #cover-img{
                display: none;
            }
            .cover-overlay{
                margin: 0;
                padding:0;
                height: 250px;
                width: 100%;
                background: rgba(0,0,0,0.6);
            }
            .cover-overlay i{
                position: absolute;
                right: 0;
                bottom: 0;
                margin: 10px;
            }
            .cover-overlay i:hover{
                cursor: pointer;
            }
            .main-cover{
                position: relative;
            }
            .cover-img{
                height: 210px;
                width: 210px;
                position: absolute;
                top: 50%;
                left: 10%;
            }
            .img{
                height: 210px;
                width: 210px;
                border-radius: 100%;
            }
            .cover-img:hover .img-overlay i{
                visibility: visible;
            } 
            .img-overlay i{
                visibility: hidden;
            }
            .user-img:hover .img-overlay{
                height: 210px;
                width: 210px;
                border-radius: 100%;
                transition: 1.5s;
                cursor: pointer;
                position: relative;
            }
        </style>
    </head>
    <body>


        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12" style="padding: 0px">
                    <div class="mai n-cover">
                        <label class="cover-label" for="cover-img">
                            <div class="user-cover">
                                <div class="cover-overlay">
                                    <i class="fas fa-camera-retro text-white fa-3x" title="Choose Cover Image"></i>
                                    <input type="file" id="cover-img" style="display: none;" onchange="readURL(this);">
                                </div>
                            </div>  
                        </label>
                        <label class="cover-img" for="user-img">
                            <div class="user-img">
                                <div class="img-overlay">
                                    <img class="img" src="<?php echo base_url(); ?>seller_assets/images/avatars/thumb-1.jpg" >
                                    <i class="fas fa-camera text-white icon" style="font-size: 25px;" title="Choose Profilr Picture"></i>
                                    <input type="file" id="user-img" onchange="readURL1(this);" style="display: none;">                                     
                                </div>
                            </div>  
                        </label>
                    </div>
                </div>
            </div>
        </div>


        <!--        <div class="row">
                    <div class="col-md-12 col-sm-12" >
                        <div class="squere-box-model-box" style="background: #01A8FE;height: 150px;width: 100%;position: relative">
                            <div class="circle-box-model-box" style="background: #fff;height: 109%;width: 11%;z-index: 1;left: 26.3%;position: absolute;border-radius: 100%;margin-top: 4.5%;box-shadow: 1px 1px 12px #000">
                                <img>                                    
                            </div>
                            <div class="name-box" style="height: 70%;width: 38%;background: #fff;position: relative;top: 65%;left: 36%;box-shadow: 1px 1px 12px #000">
                                <center>
                                    <p style="line-height: 100px;font-size: 35px;color: #000;font-weight: 500;">Munchbox Restaurant</p>
                                </center>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-12" style="margin-top: 9%;">
                        <div class="container">
                            <div class="row" style="margin-left: 28%">
                                <div class="col-md-12"  >
                                    <h1 style="margin: 0;letter-spacing: 1px">Contact</h1>
                                    <div class="seller-line" style="border-bottom: 3px solid gray;width: 64%;margin-bottom: 3%"></div>
                                    <br>
                                </div>
                                <div class="col-md-12" style="margin-bottom: 5%">
                                    <div class="media">
                                        <div class="media-left media-middle">
                                            <a href="#">
                                                <i class="fas fa-envelope" style="font-size: 20px;color: #53535F"></i>
                                            </a>
                                        </div>
                                        <div class="media-body" style="padding-left: 7%">
                                            <a href="mailto:munchbox@gmail.com" style="font-size: 15px;color: #53535F;">munchbox@gmail.com</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12" style="margin-bottom: 5%">
                                    <div class="media">
                                        <div class="media-left media-middle">
                                            <a href="#">
                                                <i class="fa fa-globe" style="font-size: 20px;color: #53535F"></i>
                                            </a>
                                        </div>
                                        <div class="media-body" style="padding-left: 7%">
                                            <a href="" style="font-size: 15px;color: #53535F;">www.munchbox.com</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12" style="margin-bottom: 5%">
                                    <div class="media">
                                        <div class="media-left media-middle">
                                            <a href="#">
                                                <i class="fa fa-home" style="font-size: 20px;color: #53535F"></i>
                                            </a>
                                        </div>
                                        <div class="media-body" style="padding-left: 7%">
                                            <span style="font-size: 15px;color: #53535F;">Sudama Chowk, Mota Varachha, Surat</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12" style="margin-bottom: 5%">
                                    <div class="media">
                                        <div class="media-left media-middle">
                                            <a href="#">
                                                <i class="fa fa-phone-alt" style="font-size: 20px;color: #53535F"></i>
                                            </a>
                                        </div>
                                        <div class="media-body" style="padding-left: 7%">
                                            <a href="tel:9532819102" style="font-size: 15px;color: #53535F;">+ 9532819102 </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12" style="margin-bottom: 5%">
                                    <div class="media">
                                        <div class="media-left media-middle">
                                            <a href="#">
                                                <i class="fas fa-clock" style="font-size: 20px;color: #53535F"></i>
                                            </a>
                                        </div>
                                        <div class="media-body" style="padding-left: 7%">
                                            <span style="font-size: 15px;color: #53535F;">9:00 AM - 11:00 PM</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8 col-sm-12">
        
                    </div>
                </div>-->


        <?php
        $this->load->view("seller/footerscript");
        ?>
    </body>
</html>