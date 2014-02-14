<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="keywords" content="privacy, trackers, block trackers, online privacy, data privacy, data ownership, data protection, data for good, good data, value of data, data locker, data vault, secure vault, data assistant, personal data assistant, social good, philanthropy, donating, donation, charity, social development, economic development, grassroots development, poverty alleviation, social investment, social entrepreneurship, innovation, data cooperative">
        <meta name="author" content="">
        <link rel="shortcut icon" href="favicon.ico">

        <title>User Data</title>

        <!-- Bootstrap core CSS -->
        <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/bootstrap.css" type="text/css">

        <!-- Base -->
        <link href="<?php echo Yii::app()->theme->baseUrl; ?>/css/header-and-footer.css" rel="stylesheet">
        <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/webfonts.css" type="text/css">
        
        <!-- Custom -->
        <link href="<?php echo Yii::app()->theme->baseUrl; ?>/css/main.css" rel="stylesheet">

        <link href="<?php echo Yii::app()->theme->baseUrl; ?>/css/good-data.css" rel="stylesheet">
        <link href="<?php echo Yii::app()->theme->baseUrl; ?>/css/evil-data.css" rel="stylesheet">
        <link href="<?php echo Yii::app()->theme->baseUrl; ?>/css/user-data.css" rel="stylesheet">
        <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/partners.css" type="text/css">

        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->

        <!-- Bootstrap core JavaScript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        
        <!-- Admin -->
        <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/admin.css" type="text/css">


        <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/bootstrap.min.js"></script>
        
    </head>

    <body>

        <header class="navbar  navbar-fixed-top">
            <div>
                <div class="container">
                    <div class="row">
                        <div class="navbar-header">
                            <button data-target=".navbar-collapse" data-toggle="collapse" class="navbar-toggle" type="button">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <a href="#" class="navbar-brand"><img src="img/logo-big.png"/>TheGoodData</a>
                        </div>

                        <?php if (!Yii::app()->user->isGuest){ ?>
                        <div class="collapse navbar-collapse">
                            <ul class="nav navbar-nav">
                                <li class="active"><a href="#">Manage the Company</a></li>
                                <li class="dropdown"><a href="#about" class="dropdown-toggle" data-toggle="dropdown"><img src="img/jacob.jpg" class="avatar"/>Username<b class="caret"></b></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="#">account settings</a></li>
                                        <li class="divider"></li>
                                        <li><a href="#"><span class="glyphicon glyphicon-off"></span> logout</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <?php } else { ?>

                        <nav>
                            <ul class="clearfix">
                                <li><a href="<?php echo Yii::app()->controller->createUrl("user/registration"); ?>">Sign In</a></li>
                                <li class="install"><a class="active" href="#">Install in chrome</a></li>
                            </ul> 
                        </nav>

                        <?php } ?>

                    </div>
                </div>
            </div>
        </header>

        <!-- 
        

        <header class="navbar  navbar-fixed-top">
            <div>
                <div class="container">
                    <div class="row">
                        <div class="navbar-header">
                            <button data-target=".navbar-collapse" data-toggle="collapse" class="navbar-toggle" type="button">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <a href="#" class="navbar-brand"><img src="img/logo-big.png"/>TheGoodData</a>
                        </div>

                        <div class="collapse navbar-collapse">
                            <ul class="nav navbar-nav">
                                <li class="active"><a href="#">Manage the Company</a></li>
                                <li class="dropdown"><a href="#about" class="dropdown-toggle" data-toggle="dropdown"><img src="img/jacob.jpg" class="avatar"/>Username<b class="caret"></b></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="#">account settings</a></li>
                                        <li class="divider"></li>
                                        <li><a href="#"><span class="glyphicon glyphicon-off"></span> logout</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </header> -->
        
        
<!-- 
        <header class="clearfix">
            <div class="wrap">
                <div class="logo">
                    <a href="http://www.thegooddata.org"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/img/logo.png" alt="The Good Data"></a>
                </div>
                <nav>
                    <ul class="clearfix">
                        <li><a href="<?php echo Yii::app()->controller->createUrl("user/registration"); ?>">Sign In</a></li>
                        <li class="install"><a class="active" href="#">Install in chrome</a></li>
                    </ul> 
                </nav>
            </div>
        </header>
 -->

        <div id="secondary-nav">
            <div class="container">
                <div class="row">

                    <?php $this->widget('zii.widgets.CMenu',array(
                        'items'=>array(
                            /*
                            array('label'=>'Home', 'url'=>array('/site/index')),
                            array('label'=>'About', 'url'=>array('/site/page', 'view'=>'about')),
                            array('label'=>'Contact', 'url'=>array('/site/contact')),
                            */
                            array('url'=>Yii::app()->getModule('user')->loginUrl, 'label'=>Yii::app()->getModule('user')->t("LOGIN"), 'visible'=>Yii::app()->user->isGuest),
                            array('url'=>Yii::app()->getModule('user')->registrationUrl, 'label'=>Yii::app()->getModule('user')->t("REGISTER"), 'visible'=>Yii::app()->user->isGuest),
                            

                            array('label'=>'ADMIN', 'url'=>array('/manage/index'), 'visible'=>Yii::app()->user->id == 1),

                            array('label'=>'GOOD DATA', 'url'=>array('/goodData/index'), 'visible'=>!Yii::app()->user->isGuest),
                            array('label'=>'EVIL DATA', 'url'=>array('/evilData/index'), 'visible'=>!Yii::app()->user->isGuest),
                            array('label'=>'YOUR DATA', 'url'=>array('/userData/index'), 'visible'=>!Yii::app()->user->isGuest),

                            /*
                            array('url'=>Yii::app()->getModule('user')->logoutUrl, 'label'=>Yii::app()->getModule('user')->t("Logout"), 'visible'=>!Yii::app()->user->isGuest),
                            */
                            

                            ),
                        'htmlOptions' => array(
                            'class'=>'nav navbar-nav',
                        ),
                        'submenuHtmlOptions' => array(
                            'class' => '',
                        )
                    )); 
                    ?>
                   <!--  <ul class="nav navbar-nav">
                        <li><a href="#">GOOD DATA</a></li>
                        <li><a href="#about">EVIL DATA</a></li>
                        <li class="active"><a href="#contact">YOUR DATA</a></li>
                    </ul> -->
                </div>
            </div>
        </div> 

        <!-- main content -->

        <?php echo $content; ?>

        


        <!-- END main content -->

        <footer>
            <div class="wrap footer">
                <div class="container">
                    <div class="row">
                        <div class="col-1">
                            <ul>
                                <h4>Product</h4>
                                <li>Technology</li>
                                <li>FAQs</li>
                                <li>Support</li>
                            </ul>
                        </div>
                        <div class="col-2">
                            <ul>
                                <h4>Third Parties</h4>
                                <li>Coders' program</li>
                                <li>Partners</li>
                                <li>Media</li>
                            </ul>
                        </div>
                        <div class="col-3">
                            <ul>
                                <h4>Contact</h4>
                                <li>82 Clerkenwell Road</li>
                                <li>London EC1M 5RF, UK</li>
                                <li>Email us</li>
                            </ul>
                        </div>
                        <div class="col-4">
                            <ul>
                                <h4>Legal Stuff</h4>
                                <li>Terms of service</li>
                                <li>Privacy Policy</li>
                                <li>Company Rules</li>
                            </ul>
                        </div>
                        <div class="col-5">
                            <ul>
                                <li><a href="#" class="thegooddata"></a></li>
                                <li><a href="#" class="wordpress"></a></li>
                                <li><a href="#" class="reddit"></a></li>
                                <li><a href="#" class="twitter"></a></li>
                                <li class="name">thegooddata.org</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="license">
                <div class="container">
                    <div class="row">
                        <ul class="col-sm-16 col-md-10 col-md-offset-3 col-lg-10 col-lg-offset-3">
                            <li>
                                <img alt="License" src="<?php echo Yii::app()->theme->baseUrl; ?>/img/license.png">
                                <p>Except where otherwise noted, content on this site is licensed under a <a href="//creativecommons.org/licenses/by/4.0/">Creative Commons Attribution 4.0 License</a>.</p>
                            </li>
                            <li>
                                <a title="Designed by Timeless" href="#">
                                    <img alt="Timeless" src="<?php echo Yii::app()->theme->baseUrl; ?>/img/timeless_logo.png">
                                </a>
                            </li>
                        </ul>

                    </div>
                </div>
            </div>
        </footer>

        
        
        
    </body>
</html>