<body>
    <!-- header -->
    <div class="header">
        <div class="w3ls_header_top">
            <div class="container">
                <div class="clearfix"> </div>
            </div>
        </div>
        <div class="w3ls_header_middle">
            <div class="container">
                <div class="agileits_logo">
                    <h1><a href="<?php echo base_url(); ?>"><span>Trade</span> Market<i>Trade anytime anywhere</i></a></h1>
                </div>
                <div class="clearfix"> </div>
            </div>
        </div>
    </div>
    <!-- //header -->
    <!-- navigation -->
    <div class="trade_navigation">
        <div class="container">
            <nav class="navbar nav_bottom">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header nav_2">
                    <button type="button" class="navbar-toggle collapsed navbar-toggle1" data-toggle="collapse" data-target="#bs-megadropdown-tabs">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div> 
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
                    <nav class="wthree_nav">
                        <ul class="nav navbar-nav nav_1">
                            <li class="act"><a href="<?php echo base_url(); ?>">Αρχική</a></li>
                            <li><a href="<?php echo base_url('WorkingDays/ViewDays'); ?>">Ημέρες Εργασίας</a></li>
                            <li><a href="<?php echo base_url('PublicMarket/ViewPublicMarket'); ?>">Λαϊκή Αγορά</a></li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Προϊόντα - Πωλήσεις<span class="caret"></span></a>				
                                <div class="dropdown-menu w3ls_vegetables_menu">
                                    <ul>	
                                        <li><a href="<?php echo base_url('Products/ViewProducts'); ?>">Προϊόντα</a></li>
                                        <li><a href="<?php echo base_url('sales'); ?>">Πωλήσεις</a></li>
                                    </ul>             
                                </div>
                            </li>
                        </ul>
                    </nav>
                </div>
            </nav>
        </div>
    </div>
    