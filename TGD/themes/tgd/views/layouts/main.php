<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="TheGoodData helps you enjoy the benefits of being a data owner. Its browser extension will improve your privacy by blocking data threats that track you online. Moreover, if you you give us express permission, it will also make that data works for a good cause.">
        <meta name="keywords" content="privacy, trackers, block trackers, online privacy, data privacy, data ownership, data protection, data for good, good data, value of data, data locker, data vault, secure vault, data assistant, personal data assistant, social good, philanthropy, donating, donation, charity, social development, economic development, grassroots development, poverty alleviation, social investment, social entrepreneurship, innovation, data cooperative">
        <meta name="author" content="">
        <link rel="shortcut icon" href="<?php echo Yii::app()->baseUrl; ?>/favicon.ico">

        <title>TheGoodData | Enjoy your data</title>

        <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/vendor/bootstrap.min.css" type="text/css">
        <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/vendor/bootstrap_vertical_tabs.css" type="text/css">
        <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/vendor/font-awesome.min.css" type="text/css">
        <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/vendor/webfonts.css" type="text/css">
        <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/main.css" type="text/css">
        
        <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl . '/js/vendor/jquery-1.9.1.min.js'; ?>"></script>        
        <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl . '/js/bootstrap.min.js'; ?>"></script>
        <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl . '/js/common.js'; ?>"></script>

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
                            <a href="<?php echo Yii::app()->controller->createAbsoluteUrl("/site/index"); ?>" class="navbar-brand"><img alt="TheGoodData" src="<?php echo Yii::app()->theme->baseUrl; ?>/img/logo.png"/></a>
                        </div>

                        <?php if (!Yii::app()->user->isGuest){ ?>


                        <div class="collapse navbar-collapse">
                            <ul class="nav navbar-nav">
                                <li class="collaborate"><a href="https://collaborate.thegooddata.org/">Collaborate with us</a></li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle user" data-toggle="dropdown">
                                        <!-- <img src="<?php echo Yii::app()->theme->baseUrl; ?>/img/jacob.jpg" class="avatar"/> Commented until added on the form -->
                                        <?php echo Yii::app()->user->username; ?>
                                        <b class="caret"></b>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li><a href="<?php echo Yii::app()->controller->createAbsoluteUrl("/user/profile");?>">account settings</a></li>

                                        <li class="divider"></li>
                                        <li><a href="<?php echo Yii::app()->controller->createAbsoluteUrl("/goodData/index");?>">Good data</a></li>
                                        <li><a href="<?php echo Yii::app()->controller->createAbsoluteUrl("/evilData/index");?>">Evil data</a></li>
                                        <li><a href="<?php echo Yii::app()->controller->createAbsoluteUrl("/userData/index");?>">User data</a></li>

                                        <li class="divider"></li>
                                        <li><a href="<?php echo Yii::app()->controller->createAbsoluteUrl("/user/logout");?>"><span class="glyphicon glyphicon-off"></span> logout</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <?php } else { ?>
                        <div class="collapse navbar-collapse">
                            <ul class="nav navbar-nav">
                                <li id="sign-in"><a href="<?php echo Yii::app()->controller->createAbsoluteUrl("/user/login"); ?>">Sign In</a></li>
                                <li class="install"><a href="#">Get TheGoodData</a></li>
                            </ul>
                        </div>
                        <?php } ?>

                    </div>
                </div>
            </div>
        </header>

        <?php if (
            $this->getUniqueId() != "resignation" && 
            $this->getUniqueId() != "site" && 
            $this->getUniqueId() != "user/registration" && 
            $this->getUniqueId() != "user/profile" &&
            $this->getUniqueId() != "purchase" &&
            $this->getUniqueId() != "donate") { ?>

        <?php 
        $user = User::model()->findByPk(Yii::app()->user->id); 
        $user_id_token = base64_encode(Yii::app()->user->id);

        ?>

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
                            // array('url'=>Yii::app()->getModule('user')->loginUrl, 'label'=>Yii::app()->getModule('user')->t("LOGIN"), 'visible'=>Yii::app()->user->isGuest),
                            // array('url'=>Yii::app()->getModule('user')->registrationUrl, 'label'=>Yii::app()->getModule('user')->t("REGISTER"), 'visible'=>Yii::app()->user->isGuest),
                            
                            array('url'=>array('/site/index'), 'label'=>'HOME', 'visible'=>Yii::app()->user->isGuest),
                            array('url'=>array('/site/product'), 'label'=>'PRODUCT', 'visible'=>Yii::app()->user->isGuest),
                            array('url'=>array('/site/partners'), 'label'=>'PARTNERS', 'visible'=>Yii::app()->user->isGuest),
                            array('url'=>array('/site/company'), 'label'=>'YOUR COMPANY', 'visible'=>Yii::app()->user->isGuest),
                            array('url'=>array('/goodData/index'), 'label'=>'GOOD DATA', 'visible'=>Yii::app()->user->isGuest),
                            array('url'=>'#', 'label'=>'SUPPORT US', 'visible'=>Yii::app()->user->isGuest),
                            array('url'=>'#', 'label'=>'GET THEGOODDATA', 'visible'=>Yii::app()->user->isGuest),

                            
                            

                            array('label'=>'ADMIN', 'url'=>array('/manage/index'), 'visible'=>Yii::app()->user->isAdmin()),

                            array('label'=>'GOOD DATA', 'url'=>array('/goodData/index'), 'visible'=>!Yii::app()->user->isGuest),
                            array('label'=>'EVIL DATA', 'url'=>array('/evilData/index'), 'visible'=>!Yii::app()->user->isGuest),
                            array('label'=>'YOUR DATA', 'url'=>array('/userData/index'), 'visible'=>!Yii::app()->user->isGuest),

                            array('label'=>'PURCHASE SHARES', 'url'=>array('/user/purchase/'.$user_id_token), 'visible'=>$user!=null? $user->status == User::STATUS_PRE_ACCEPTED: false),

                            
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
                </div>
            </div>
        </div> 

        <?php } ?>

        <!-- modal chrome only install -->
        <div id="chromeModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="myModalLabel">Browser not supported</h4>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="form-group col-sm-16">
                                We only support Chrome for the time being. We would appreciate your help to extend our service to other browsers either by collaborating in our 
                                <a href="https://github.com/thegooddata">open source developments</a> or 
                                <a href="<?php echo Yii::app()->controller->createAbsoluteUrl('/donate');?>">giving us a donation.</a>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a type="button" class="btn btn-default tgd-button tgd-send" href="<?php echo Yii::app()->controller->createAbsoluteUrl("/donate");?>">Continue</a>
                    </div>
                </div>
            </div>

        </div>

        <!-- main content -->

        <?php echo $content; ?>

        


        <!-- END main content -->
      

        <footer>
            <div class="footer">
                <div class="container clearfix">
                    <ul>
                        <h4>service</h4>
                        <li><a href="<?php echo Yii::app()->controller->createAbsoluteUrl("/site/product");?>">Product</a></li>
                        <li><a href="<?php echo Yii::app()->controller->createAbsoluteUrl("/site/faq");?>">FAQs</a></li>
                        <li><a href="mailto:support@thegooddata.org">Support</a></li>
                    </ul>
                    <ul>
                        <h4>third parties</h4>
                        <li><a href="<?php echo Yii::app()->controller->createAbsoluteUrl("/site/partners");?>">Partners</a></li>
                        <li><a href="<?php echo Yii::app()->controller->createAbsoluteUrl("/site/coders");?>">Coders</a></li>
                        <li><a href="mailto:media@thegooddata.org">Media</a></li>
                    </ul>
                    <ul>
                        <h4>company</h4>
                        <li><a href="<?php echo Yii::app()->controller->createAbsoluteUrl("/site/company");?>">Your Company</a></li>
                        <li><a href="//collaborate.thegooddata.org" class="red exclude">Collaborate</a></li>
                        <li><a href="<?php echo Yii::app()->controller->createAbsoluteUrl("/donate");?>" class="red">Donate</a></li>
                    </ul>
                    <ul>
                        <h4>contact</h4>
                        <li>82 Clerkenwell Road</li>
                        <li>London EC1M 5RF, UK</li>
                        <li><a href="mailto:info@thegooddata.org">Email Us</a></li>
                    </ul>
                    <ul id="fifth">
                        <h4>legal stuff</h4>
                        <li><a href="<?php echo Yii::app()->controller->createAbsoluteUrl("/site/legal");?>#terms">Terms of Use</a></li>
                        <li><a href="<?php echo Yii::app()->controller->createAbsoluteUrl("/site/legal");?>#privacy">Privacy & Cookies</a></li>
                        <li><a href="<?php echo Yii::app()->controller->createAbsoluteUrl("/site/legal");?>#rules">Company Rules</a></li>
                    </ul>        
                    <ul class="social">
                        <li class="first">
                            <a id="gooddata" href="//collaborate.thegooddata.org" class="exclude"></a>
                        </li>
                        <li>
                            <a id="wordpress" href="//news.thegooddata.org"></a>
                        </li>
                        <li>
                            <a id="reddit" href="http://www.reddit.com/user/thegooddata" class="exclude"></a>
                        </li>
                        <li class="last">
                            <a id="twitter" href="https://twitter.com/thegooddata" class="exclude"></a>
                        </li>
                        <em><a href="http://www.thegooddata.org">&copy; 2014, thegooddata.org</a></em>
                    </ul>
                </div> <!-- wrap -->
            </div>

            <div class="license clearfix">
                <div class="wrap clearfix">
                    <ul class="clearfix">
                        <li>
                            <a href="http://creativecommons.org/licenses/by/4.0/" target="_blank" title="Creative Commons, Attribution 4.0 International"><img alt="License" src="<?php echo Yii::app()->theme->baseUrl; ?>/img/license.png">
                                <p>Except where otherwise noted, content<br/> on this site is licensed under a Creative<br/> Commons Attribution 4.0 License.</p></a>
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
    </body>
</html>