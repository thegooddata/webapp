
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="TheGoodData helps you enjoy the benefits of being a data owner. Its browser extension will improve your privacy by blocking data threats that track you online. Moreover, if you you give us express permission, it will also make that data work for a good cause.">
        <meta name="keywords" content="privacy, trackers, block trackers, online privacy, data privacy, data ownership, data protection, data for good, good data, value of data, data locker, data vault, secure vault, data assistant, personal data assistant, social good, philanthropy, donating, donation, charity, social development, economic development, grassroots development, poverty alleviation, social investment, social entrepreneurship, innovation, data cooperative">
        <meta name="author" content="">
        <!--<link rel="shortcut icon" href="/favicon.ico">-->
        <link rel="chrome-webstore-item" href="<?php echo Yii::app()->params['chromeExtensionUrl']; ?>">

        <title>TheGoodData | Enjoy your data <?php echo (isset($this->pageTitle))?$this->pageTitle:'';?></title>
<?php
        $cs=Yii::app()->clientScript;
        
        $cs->registerCoreScript('jquery');
        $cs->registerPackage('bootstrap');

        $cs->registerCssFile(Yii::app()->theme->baseUrl . '/css/vendor/font-awesome.min.css');
        $cs->registerCssFile(Yii::app()->theme->baseUrl . '/css/vendor/webfonts.css');
        $cs->registerCssFile(Yii::app()->theme->baseUrl . '/css/main.css');
        $cs->registerCssFile(Yii::app()->theme->baseUrl . '/css/landing.bootstrap.min.css');
        $cs->registerCssFile(Yii::app()->theme->baseUrl . '/css/landing.style.css');
        
        $cs->registerScriptFile(Yii::app()->theme->baseUrl . '/js/common.js', CClientScript::POS_HEAD);
        $cs->registerScriptFile(Yii::app()->theme->baseUrl . '/js/landing.bootstrap.min.js', CClientScript::POS_HEAD);
        $cs->registerScriptFile(Yii::app()->theme->baseUrl . '/js/dummy-regenerate-1.js', CClientScript::POS_HEAD);
        $cs->registerScriptFile(Yii::app()->theme->baseUrl . '/js/jquery.stellar.min.js', CClientScript::POS_HEAD);
        $cs->registerScriptFile(Yii::app()->theme->baseUrl . '/js/vendor/modernizr-2.6.2.min.js', CClientScript::POS_HEAD);

        ?>    

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
                        <!-- header non-logged -->
                        <?php if (!Yii::app()->user->isGuest){ ?>


                        <div class="collapse navbar-collapse">
                            <ul class="nav navbar-nav">
                                <li class="collaborate"><a href="https://collaborate.thegooddata.org/">Collaborate with us</a></li>
                                <li class="dropdown">
                                    <a data-target="#" class="dropdown-toggle user" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <!-- <img src="<?php echo Yii::app()->theme->baseUrl; ?>/img/jacob.jpg" class="avatar"/> Commented until added on the form -->
                                        <?php echo Yii::app()->user->username; ?>
                                        <b class="caret"></b>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li><a href="<?php echo Yii::app()->controller->createAbsoluteUrl("/user/profile");?>">membership details</a></li>

                                        <li class="divider"></li>
                                        <?php if(Yii::app()->user->isAdmin()):?>
                                            <li><a href="<?php echo Yii::app()->controller->createAbsoluteUrl("/manage/index");?>">Admin</a></li>
                                        <?php endif; ?>
                                        <li><a href="<?php echo Yii::app()->controller->createAbsoluteUrl("/goodData/index");?>">Good data</a></li>
                                        <li><a href="<?php echo Yii::app()->controller->createAbsoluteUrl("/evilData/index");?>">Evil data</a></li>
                                        <li><a href="<?php echo Yii::app()->controller->createAbsoluteUrl("/userData/index");?>">Your data</a></li>
                                        
                                        <?php if (!defined('HIDE_INTERESTS')): ?>
                                          <li><a href="<?php echo Yii::app()->controller->createAbsoluteUrl("/interest");?>">Interests</a></li>
                                        <?php endif; ?>

                                        <li class="divider"></li>
                                        <li><a href="<?php echo Yii::app()->controller->createAbsoluteUrl("/user/logout");?>"><span class="glyphicon glyphicon-off"></span> sign out</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <?php } else { ?>
                        <div class="collapse navbar-collapse">
                            <ul class="nav navbar-nav">
                                <li id="sign-in"><a href="<?php echo Yii::app()->controller->createAbsoluteUrl("/user/login"); ?>">Sign In</a></li>
                                <li class="install"><a href="javascript:void(0);" onclick="chrome.webstore.install('<?php echo Yii::app()->params['chromeExtensionUrl']; ?>',chromeInstallSuccess,chromeInstallFail); return false;">Get TheGoodData</a></li>
                            </ul>
                        </div>
                        <?php } ?>
                        
                    </div>
                </div>
            </div>
        </header>

        <?php if (
            $this->getUniqueId() != "resignation" && 
            // $this->getUniqueId() != "site" && 
            $this->getUniqueId() != "user/registration" && 
            $this->getUniqueId() != "user/profile" &&
            ( isset( $this->displayMenu ) && $this->displayMenu == true ) ) { ?>

        <?php 
        $user = User::model()->findByPk(Yii::app()->user->id); 
        ?>

            <div id="secondary-nav" <?php if (Yii::app()->user->isGuest){ ?> class="public" <?php } ?> >
                <div class="container">
                    <div class="row">

                        <?php
                                                
                            $menu_items=array();
                                
                            if (Yii::app()->user->isGuest) {
                              
                               // Menu for guest users
                               $menu_items=array(
                                  array('url'=>array('/site/index'), 'label'=>'HOME', 'visible'=>Yii::app()->user->isGuest),
                                  array('url'=>array('/site/product'), 'label'=>'PRODUCT', 'visible'=>Yii::app()->user->isGuest),
                                  array('url'=>array('/site/company'), 'label'=>'YOUR COMPANY', 'visible'=>Yii::app()->user->isGuest),
                                  array('url'=>array('/goodData/index'), 'label'=>'GOOD DATA', 'visible'=>Yii::app()->user->isGuest),
                                  array('url'=>array('/donate/index'), 'label'=>'SUPPORT US', 'visible'=>Yii::app()->user->isGuest),
                                  array(
                                    'url'=>'javascript:void(0);', 
                                    'label'=>'GET THEGOODDATA', 
                                    'visible'=>Yii::app()->user->isGuest,
                                    'linkOptions'=>array(
                                      'class'=>'modal-trigger',
                                      'onclick'=>"chrome.webstore.install('". Yii::app()->params['chromeExtensionUrl'] . "',chromeInstallSuccess,chromeInstallFail); return false;",
                                    ),
                                  ),
                               );
                            } else {
                              
                              // Menu for logged in users
                              $menu_items[]=array('label'=>'ADMIN', 'url'=>array('/manage/index'), 'visible'=>Yii::app()->user->isAdmin()); // Admin only
                              
                              // Check if we need to show the GET YOUR SHARE link in the menu. Only if user status is STATUS_PRE_ACCEPTED
                              if ($user->status==User::STATUS_PRE_ACCEPTED) {
                                $menu_items[]=array(
                                    'label'=>'GET YOUR SHARE', 
                                    'url'=>Yii::app()->controller->createAbsoluteUrl('purchase/index'), 
                                  );
                              }
                              
                              // Rest of menu links
                              $menu_items[]=array('label'=>'GOOD DATA', 'url'=>array('/goodData/index'));
                              $menu_items[]=array('label'=>'EVIL DATA', 'url'=>array('/evilData/index'));
                              $menu_items[]=array('label'=>'YOUR DATA', 'url'=>array('/userData/index'));
                              
                              if (!defined('HIDE_INTERESTS')) {
                                $menu_items[]=array('label'=>'INTERESTS', 'url'=>array('/interest/index'));
                              }

                            }
                        
                            $this->widget('zii.widgets.CMenu',array(
                            'items'=>$menu_items,
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
        <div id="chromeModal" tabindex="-1" role="dialog" aria-labelledby="chromeModal" aria-hidden="true" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="myModalLabel">Browser not supported</h4>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="form-group col-sm-16" id="modal-description">
                                We only support Chrome for the time being. We would appreciate your help to extend our service to other browsers either by collaborating in our 
                                <a href="https://github.com/thegooddata">open source developments</a> or 
                                <a href="http://www.tgd.local/index-test.php/donate">giving us a donation.</a>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <form class="form-inline" id="phplist-signup" style="display:none;">
                            <div class="form-group col-sm-10">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" placeholder="enter your email">
                            </div>
                            <button type="submit" class="btn btn-default col-sm-6 tgd-button tgd-send">Send</button>
                        </form>
                        <button type="button" class="btn btn-default col-sm-6 tgd-button tgd-send" data-dismiss="modal" style="display: none;">Close</button>
                        <a type="button" class="btn btn-default tgd-button tgd-send" href="http://www.tgd.local/index-test.php/donate">Continue</a>
                    </div>
                </div>
            </div>

        </div>

        <!-- modal chrome install success -->
        <div id="chromeModalInstallSuccess" tabindex="-1" role="dialog" aria-labelledby="chromeModalInstallSuccess" aria-hidden="true" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Congratulations!</h4>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="form-group col-sm-16">
                                TheGoodData extension has been correctly installed on your browser. Enjoy!
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- modal chrome install fail -->
        <div id="chromeModalInstallFail" tabindex="-1" role="dialog" aria-labelledby="chromeModalInstallFail" aria-hidden="true" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Oops!</h4>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="form-group col-sm-16">
                                TheGoodData extension could not be installed. Please try again.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- main content -->

        <div id="hero-bloc" class="bloc hero">
            <div class="hero-video-container">
                <video autobuffer="" autoplay="" class="hero-video" loop="" muted="muted">
                    <source src="<?php echo Yii::app()->theme->baseUrl; ?>/img/tgd_background.mp4" type="video/mp4"></source>
                    <source src="<?php echo Yii::app()->theme->baseUrl; ?>/img/tgd_background.ogv" type="video/ogg"></source>
                </video>
            </div>
            <div class="v-center text-center">
                <div class="vc-content">
                    <h1 class=" lg-shadow">
                        Browsing is caring
                    </h1>
                    <h3 class=" lg-shadow">
                        Using the value of your browsing<br />data to help people in need
                    </h3>
                    <div class="text-center call-to-action">
                        <a href="javascript:void(0);" onclick="chrome.webstore.install('<?php echo Yii::app()->params['chromeExtensionUrl']; ?>',chromeInstallSuccess,chromeInstallFail); return false;" class="btn btn-lg  btn-dark-coral">Get started</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Hero Bloc END -->

        <!-- bloc-3 -->
        <div class="bloc bgc-white l-bloc" id="bloc-3">
            <div class="container bloc-md">
                <div class="row">
                    <div class="col-sm-12">
                        <h2 class="mg-md text-center tc-united-nations-blue">
                            Our mission
                        </h2>
                    </div>
                    <div class="col-sm-6">
                        <img src="<?php echo Yii::app()->theme->baseUrl; ?>/img/info_a2.png" class="img-circle mg-sm center-block img-frame-rd" width="200" height="200" />
                        <h3 class="mg-md text-center ">
                            The Evil Data
                        </h3>
                        <p class="text-center">
                            The internet is full of hidden companies to track you<br />and make money out of your data without your consent.<br />We call this The Evil Data.
                        </p>
                    </div>
                    <div class="col-sm-6">
                        <img src="<?php echo Yii::app()->theme->baseUrl; ?>/img/info_b2.png" class="img-circle center-block img-frame-rd" width="200" height="200" />
                        <h3 class="mg-md text-center ">
                            The Good Data
                        </h3>
                        <p class="text-center">
                            What if we make sure that you take back the control over<br />your data, get a fair amount of it and reinvest it in<br />developing countries? Then Data is Good.
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <!-- bloc-3 END -->

        <!-- bloc-4 -->
        <div class="bloc bgc-dark-pastel-blue d-bloc" id="bloc-4">
            <div class="container bloc-md">
                <div class="row">
                    <div class="col-sm-2 col-sm-offset-2 text-center">
                        <h3>
                            <div class="amount projects_funded">&nbsp;</div>
                        </h3>
                        <p>
                            Projects supported in developed countries
                        </p>
                    </div>
                    <div class="col-sm-2 text-center">
                        <h3>
                            <div class="amount monthly_adtracks_blocked">&nbsp;</div>
                        </h3>
                        <p class=" text-w-sm">
                            Trackers blocked this month
                        </p>
                    </div>
                    <div class="col-sm-2 text-center">
                        <h3>
                            <div class="amount monthly_visits_stored">&nbsp;</div>
                        </h3>
                        <p class=" text-w-sm">
                            Sites visited by our users this month
                        </p>
                    </div>
                    <div class="col-sm-2 text-center">
                        <h3>
                            <div class="amount monthly_queries_run">&nbsp;</div>
                        </h3>
                        <p class=" text-w-sm">
                            Search queries run this month
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <!-- bloc-4 END -->

        <!-- bloc-5 -->
        <div class="bloc bgc-white l-bloc" id="bloc-5">
            <div class="container bloc-md">
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="mg-lg text-center tc-united-nations-blue">
                            Start making a positive impact now!
                        </h2>
                    </div>
                    <div class="col-sm-6">
                        <div id="carousel-1" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li data-target="#carousel-1" data-slide-to="0">
                                </li>
                                <li data-target="#carousel-1" data-slide-to="1">
                                </li>
                                <li data-target="#carousel-1" data-slide-to="2" class="active">
                                </li>
                            </ol>
                            <div class="carousel-inner">
                                <div class="item">
                                    <img src="<?php echo Yii::app()->theme->baseUrl; ?>/img/screenshot-01.png" />
                                    <div class="carousel-caption">
                                    </div>
                                </div>
                                <div class="item active left">
                                    <img src="<?php echo Yii::app()->theme->baseUrl; ?>/img/screenshot-02.png" />
                                    <div class="carousel-caption">
                                    </div>
                                </div>
                                <div class="item next left">
                                    <img src="<?php echo Yii::app()->theme->baseUrl; ?>/img/screenshot-03.png" />
                                    <div class="carousel-caption">
                                    </div>
                                </div>
                            </div><a class="left carousel-control" href="#carousel-1" role="button" data-slide="prev"><span class="fa fa-chevron-left"></span><span class="sr-only">Previous</span></a><a class="right carousel-control" href="#carousel-1" role="button" data-slide="next"><span class="fa fa-chevron-right"></span><span class="sr-only">Next</span></a>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <h3 class="mg-md">
                            Download our browser extension and:
                        </h3>
                        <ul class="mg-lg">
                            <li>Block The Evil Data trackers contained in every webpage you visit</li>
                            <li>Use our reports to analyze and understand your browsing data</li>
                            <li>Donate the value of your browsing data to people in need!</li>
                        </ul>
                        <a href="javascript:void(0);" onclick="chrome.webstore.install('<?php echo Yii::app()->params['chromeExtensionUrl']; ?>',chromeInstallSuccess,chromeInstallFail); return false;" class="btn  btn-lg pull-left btn-dark-coral">Get started</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- bloc-5 END -->

        <!-- bloc-6 -->
        <div class="bloc tc-beau-blue bgc-snow l-bloc" id="bloc-6">
            <div class="container bloc-md">
                <div class="row">
                    <div class="col-sm-12">
                        <h2 class="text-center mg-md  tc-united-nations-blue">
                            This sounds too good to be real, what&rsquo;s the trick?<br />Well… there&rsquo;s no trick!
                        </h2>
                    </div>
                    
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        <img src="<?php echo Yii::app()->theme->baseUrl; ?>/img/info_05-02.png" class="center-block img-rd-lg" width="150" height="150" />
                        <h3 class="text-center mg-md  tc-united-nations-blue">
                            We are transparent
                        </h3>
                        <p class="text-center ">
                            To be successful in this adventure, we know that our members have to trust completely on us. Because of that, TheGoodData works wiht a compeltely transparent culture. You can see at any moment what new features we are working on or even what our financials are.
                        </p>
                    </div>
                    <div class="col-sm-4">
                        <img src="<?php echo Yii::app()->theme->baseUrl; ?>/img/info_07.png" class="img-responsive center-block" width="150" />
                        <h3 class="text-center mg-md  tc-united-nations-blue">
                            We are collaborative
                        </h3>
                        <p class="text-center ">
                            Not only you can see what&rsquo;s going on, but you can become part of it. Our company embraces open code and open data culture so if you feel there is something you can do to improve TheGoodData service, you are welcome to join our coders program.
                        </p>
                    </div>
                    <div class="col-sm-4">
                        <img src="<?php echo Yii::app()->theme->baseUrl; ?>/img/info_06.png" class="img-responsive center-block" width="150" />
                        <h3 class="text-center mg-md  tc-united-nations-blue">
                            You are the shareholder
                        </h3>
                        <p class="text-center ">
                            It wouldn&rsquo;t be fair if you wouldn&rsquo;t enjoy the value created. That is why users who apply for membership own 100% of shares of TheGoodData, world&rsquo;s first data coop. Moreover this is the best way to ensure that the company is not sold to a third party that would indirectly buy your data.
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <!-- bloc-7 END -->

        <div class="bloc tc-beau-blue bgc-snow l-bloc mentions" id="bloc-7">
            <div class="container bloc-sm">
                <div class="row">

                    <div class="col-sm-4 text-center">
                        <a href="http://www.fastcoexist.com/3026452/instead-of-giving-google-your-data-for-free-now-you-can-donate-it-for-good" target="_blank">
                        <img src="<?php echo Yii::app()->theme->baseUrl; ?>/img/fastcompany.png" alt="">
                        </a>
                    </div>
                    
                    <div class="col-sm-4 text-center">
                        <a href="http://www.forbes.com/sites/adamtanner/2014/11/28/share-your-data-fund-microloans-to-developing-world/" target="_blank">
                        <img src="<?php echo Yii::app()->theme->baseUrl; ?>/img/forbes.png" alt="placeholder+image">
                        </a>
                    </div>

                    <div class="col-sm-4 text-center">
                        <a href="https://gigaom.com/2014/11/27/thegooddata-wants-your-browsing-data-to-benefit-good-causes/" target="_blank">
                        <img src="<?php echo Yii::app()->theme->baseUrl; ?>/img/gigaom.png" alt="placeholder+image">
                        </a>
                    </div>
                </div>
            </div> <!-- container -->
        </div> <!-- start -->     

        <!-- END main content -->
      

        <footer>
            <div class="container">
                <div class="row">
                    <ul class="col-md-2">
                        <h4>service</h4>
                        <li><a href="<?php echo Yii::app()->controller->createAbsoluteUrl("/site/product");?>">Product</a></li>
                        <li><a href="<?php echo Yii::app()->controller->createAbsoluteUrl("/site/faq");?>">FAQs</a></li>
                        <li><a href="mailto:support@thegooddata.org">Support</a></li>
                    </ul>
                    <ul class="col-md-2">
                        <h4>third parties</h4>
                        <li><a href="<?php echo Yii::app()->controller->createAbsoluteUrl("/site/coders");?>">Partners</a></li>
                        <li><a href="http://www.tgd.local/index-test.php/coders">Coders</a></li>
                        <li><a href="mailto:media@thegooddata.org">Media</a></li>
                    </ul>
                    <ul class="col-md-2">
                        <h4>company</h4>
                        <li><a href="<?php echo Yii::app()->controller->createAbsoluteUrl("/site/company");?>">Your Company</a></li>
                        <li><a href="//collaborate.thegooddata.org" class="red exclude">Collaborate</a></li>
                        <li><a href="<?php echo Yii::app()->controller->createAbsoluteUrl("/donate/index");?>" class="red">Donate</a></li>
                    </ul>
                    <ul class="col-md-2">
                        <h4>contact</h4>
                        <li>82 Clerkenwell Road</li>
                        <li>London EC1M 5RF, UK</li>
                        <li><a href="mailto:info@thegooddata.org">Email Us</a></li>
                    </ul>
                    <ul class="col-md-2">
                        <h4>legal stuff</h4>
                        <li><a href="<?php echo Yii::app()->controller->createAbsoluteUrl("/site/legal");?>#terms">Terms of Use</a></li>
                        <li><a href="<?php echo Yii::app()->controller->createAbsoluteUrl("/site/legal");?>#privacy">Privacy & Cookies</a></li>
                        <li><a href="<?php echo Yii::app()->controller->createAbsoluteUrl("/site/legal");?>#rules">Company Rules</a></li>
                    </ul>        
                    <ul class="col-md-2 social">
                        <li class="first">
                            <a id="gooddata" href="//collaborate.thegooddata.org" class="exclude"></a>
                        </li>
                        <li>
                            <a id="wordpress" href="//blog.thegooddata.org"></a>
                        </li>
                        <li>
                            <a id="reddit" href="http://www.reddit.com/r/thegooddata" class="exclude"></a>
                        </li>
                        <li class="last">
                            <a id="twitter" href="https://twitter.com/thegooddata" class="exclude"></a>
                        </li>
                        <em><a href="http://www.thegooddata.org">&copy; 2015, thegooddata.org</a></em>
                    </ul>
                </div> <!-- wrap -->
            </div>

            
            <div class="row">
                <div class="col-md-4 col-md-offset-4 license">
                    <img alt="License" src="<?php echo Yii::app()->theme->baseUrl; ?>/img/license.png">
                    <p>Except where otherwise noted,<br/> content on  this site is licensed under a <br/>
                        <a href="http://creativecommons.org/licenses/by/4.0/" target="_blank" title="Creative Commons, Attribution 4.0 International">
                            Creative Commons Attribution 4.0 International License.
                        </a>
                    </p>
                </div>
            </div>
        </footer>
         <?php if (Yii::app()->params['enableAnalytics'] 
            && !($this instanceof GxController) 
            && !(isset($this->isAdminPage) && $this->isAdminPage === true)): ?>
          <!-- Piwik -->
          <script type="text/javascript">
            var _paq = _paq || [];
            _paq.push(["setDocumentTitle", document.domain + "/" + document.title]);
            _paq.push(["setCookieDomain", "<?php echo Yii::app()->params['piwikCookieDomain']; ?>"]);
            _paq.push(["setDomains", <?php echo CJavaScript::encode(Tools::explodeTrim(",", Yii::app()->params['piwikDomains'])); ?>]);
            _paq.push(['trackPageView']);
            _paq.push(['enableLinkTracking']);
            (function() {
              var u="<?php echo Yii::app()->params['piwikURL']; ?>";
              _paq.push(['setTrackerUrl', u+'piwik.php']);
              _paq.push(['setSiteId', 1]);
              var d=document, g=d.createElement('script'), s=d.getElementsByTagName('script')[0];
              g.type='text/javascript'; g.async=true; g.defer=true; g.src=u+'piwik.js'; s.parentNode.insertBefore(g,s);
            })();
          </script>
          <noscript><p><img src="<?php echo Yii::app()->params['piwikURL']; ?>piwik.php?idsite=1" style="border:0;" alt="" /></p></noscript>
          <!--  End Piwik Code -->
        <?php endif; ?>
        <script type="text/javascript">
            $('.dropdown-toggle').dropdown();
            $.get( "<?php echo Yii::app()->createUrl('goodData/GoodProjectsData')?>", function( result ) {
            $('.projects_funded').html(result.loans_count);
        }, "json" );

            $.get( "<?php echo Yii::app()->createUrl('goodData/CompanyAchievementsData')?>", function( result ) {

            $('.monthly_visits_stored').html(result.monthly_visits_stored);
            $('.monthly_adtracks_blocked').html(result.monthly_adtracks_blocked);
            $('.monthly_queries_run').html(result.monthly_queries_run);
        }, "json" );
        </script>
                
</body>
</html>