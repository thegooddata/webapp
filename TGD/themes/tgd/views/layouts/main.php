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

        <title>TheGoodData | Enjoy your data <?php echo $this->pageTitle; ?></title>

        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
        <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/bootstrap.min.css" type="text/css">
        <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/font-awesome.min.css" type="text/css">
        <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/webfonts.css" type="text/css">
        <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/new-main.css" type="text/css">
        
        <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/evil-data.css" type="text/css">
        <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/good-data.css" type="text/css">
        <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/user-data.css" type="text/css">
        
        <!-- Admin -->
        <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/admin.css" type="text/css">
        
        <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl . '/js/vendor/jquery-1.9.1.min.js'; ?>"></script>        
        <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl . '/js/bootstrap.min.js'; ?>"></script>
    </head>

    <body <?php echo ($this->bodyId=='')?'':'id="'.$this->bodyId.'"';?>>

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
                            <a href="<?php echo Yii::app()->controller->createAbsoluteUrl("/site/index"); ?>" class="navbar-brand"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/img/logo-big.png"/>TheGoodData</a>
                        </div>

                        <?php if (!Yii::app()->user->isGuest){ ?>
                        <div class="collapse navbar-collapse">
                            <ul class="nav navbar-nav">
                                <li class="collaborate"><a href="https://collaborate.thegooddata.org/">Collaborate with us</a></li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle user" data-toggle="dropdown"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/img/jacob.jpg" class="avatar"/><?php echo Yii::app()->user->username; ?><b class="caret"></b></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="#">account settings</a></li>
                                        <?php if(Yii::app()->controller->id == 'site'){ ?>
                                        <li class="divider"></li>
                                        <li><a href="<?php echo Yii::app()->controller->createAbsoluteUrl("/goodData/index");?>">Good data</a></li>
                                        <li><a href="<?php echo Yii::app()->controller->createAbsoluteUrl("/evilData/index");?>">Evil data</a></li>
                                        <li><a href="<?php echo Yii::app()->controller->createAbsoluteUrl("/userData/index");?>">User data</a></li>
                                        <?php } ?>
                                        <li class="divider"></li>
                                        <li><a href="<?php echo Yii::app()->controller->createAbsoluteUrl("/user/logout");?>"><span class="glyphicon glyphicon-off"></span> logout</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <?php } else { ?>
                        <div class="collapse navbar-collapse">
                            <ul class="nav navbar-nav">
                                <li id="sign-in"><a href="<?php echo Yii::app()->controller->createAbsoluteUrl("/user/registration"); ?>">Sign In</a></li>
                                <li class="install"><a href="#">Install in chrome</a></li>
                            </ul>
                        </div>
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
                        <li><a href="<?php echo Yii::app()->controller->createAbsoluteUrl("/user/registration"); ?>">Sign In</a></li>
                        <li class="install"><a class="active" href="#">Install in chrome</a></li>
                    </ul> 
                </nav>
            </div>
        </header>
 -->

        <?php if ($this->getUniqueId() != "site" && $this->getUniqueId() != "user/registration") { ?>

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

        <?php } ?>

        <!-- main content -->

        <?php echo $content; ?>

        


        <!-- END main content -->
      

        <footer class="clearfix">
            <div class="footer clearfix">
                <div class="container clearfix">
                    <ul class="clearfix">
                        <h4>product</h4>
                        <li class="pending"><a href="#">Technology</a></li>
                        <li class="pending"><a href="<?php echo Yii::app()->controller->createAbsoluteUrl("/site/faq");?>">FAQs</a></li>
                        <li><a href="mailto:support@thegooddata.org">Support</a></li>
                    </ul>
                    <ul class="clearfix">
                        <h4>third parties</h4>
                        <li><a href="<?php echo Yii::app()->controller->createAbsoluteUrl("/site/coders");?>">Coder's Program</a></li>
                        <li><a href="<?php echo Yii::app()->controller->createAbsoluteUrl("/site/partners");?>">Partners</a></li>
                        <li><a href="mailto:media@thegooddata.org">Media</a></li>
                    </ul>
                    <ul class="clearfix">
                        <h4>company</h4>
                        <li><a href="<?php echo Yii::app()->controller->createAbsoluteUrl("/site/company");?>">Your Company</a></li>
                        <li><a href="//collaborate.thegooddata.org" class="red exclude">Collaborate</a></li>
                        <li class="pending"><a href="#" class="red">Donate</a></li>
                    </ul>
                    <ul class="clearfix">
                        <h4>contact</h4>
                        <li>82 Clerkenwell Road</li>
                        <li>London EC1M 5RF, UK</li>
                        <li><a href="mailto:info@thegooddata.org">Email Us</a></li>
                    </ul>
                    <ul id="fifth" class="clearfix">
                        <h4>legal stuff</h4>
                        <li><a href="<?php echo Yii::app()->controller->createAbsoluteUrl("/site/legal");?>#terms">Terms of Service</a></li>
                        <li><a href="<?php echo Yii::app()->controller->createAbsoluteUrl("/site/legal");?>#privacy">Privacy Policy</a></li>
                        <li><a href="<?php echo Yii::app()->controller->createAbsoluteUrl("/site/legal");?>#rules">Company Rules</a></li>
                    </ul>        
                    <ul class="social clearfix">
                        <li class="first"><a id="gooddata" href="//manage.thegooddata.org" class="exclude"></a></li>
                        <li><a id="wordpress" href="#"></a></li>
                        <li><a id="reddit" href="http://www.reddit.com/user/thegooddata" class="exclude"></a></li>
                        <li class="last"><a id="twitter" href="https://twitter.com/thegooddata" class="exclude"></a></li>
                        <em><a href="http://www.thegooddata.org">&copy; 2014, thegooddata.org</a></em>
                    </ul>
                </div> <!-- wrap -->
            </div>
            <div class="license clearfix">
                <div class="wrap clearfix">
                    <ul class="clearfix">
                        <li>
                            <img alt="License" src="<?php echo Yii::app()->theme->baseUrl; ?>/img/license.png">
                            <p>Except where otherwise noted, content<br/> on this site is licensed under a Creative<br/> Commons Attribution 4.0 License.</p>
                        </li>
                        <li>
                            <a href="http://timeless.co" title="Designed by Timeless">
                                                            <img alt="Timeless" src="<?php echo Yii::app()->theme->baseUrl; ?>/img/timeless_logo.png">
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </footer>


    <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl . '/js/sign-in.js'; ?>"></script>
    <script>
        signInUrl = "<?php echo Yii::app()->controller->createAbsoluteUrl("/site/signin");?>";
    </script>
    </body>
</html>