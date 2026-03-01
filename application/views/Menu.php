<html>
    <head>
    <title>MUNCHBOX | Order Menu</title>
    <?php
    $this->load->view("CSS");
    ?>
</head>
<body>
    <div class="container" id="menu">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="row "> 
                    <div class="col-md-6 col-sm-6 col-xs-6 menu-back">
                        <!--<img src="<?php echo base_url(); ?>assets/img/menu-cover.jpg">-->
                        <div class="item-head">
                            <p class="text-center">Pizza</p>
                            <img src="<?php echo base_url(); ?>assets/img/item-line.png" class="item-line">
                            <?php
                            for ($i = 1; $i <= 15; $i++) {
                                ?>
                                <span class="name">Margherita</span>    
                                <span class="price">99</span>
                                <?php
                            }
                            ?>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-6 menu-back menu-back-one" style="position: absolute;">
                        <!--<img src="<?php echo base_url(); ?>assets/img/menu-cover.jpg">-->
                        <div class="item-head">
                            <p class="text-center">Pizza</p>
                            <img src="<?php echo base_url(); ?>assets/img/item-line.png" class="item-line">
                            <?php
                            for ($i = 1; $i <= 15; $i++) {
                                ?>
                                <span class="name">Margherita</span>    
                                <span class="price">99</span>
                                <?php
                            }
                            ?>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <?php
//        $this->load->view("footer");
        $this->load->view("footerscript");
        ?>
</body>
</html> 
