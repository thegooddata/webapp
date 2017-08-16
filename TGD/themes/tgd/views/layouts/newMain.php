
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="TheGoodData helps you enjoy the benefits of being a data owner. Its browser extension will improve your privacy by blocking data threats that track you online. Moreover, if you you give us express permission, it will also make that data work for a good cause.">
        <meta name="keywords" content="privacy, trackers, block trackers, online privacy, data privacy, data ownership, data protection, data for good, good data, value of data, data locker, data vault, secure vault, data assistant, personal data assistant, social good, philanthropy, donating, donation, charity, social development, economic development, grassroots development, poverty alleviation, social investment, social entrepreneurship, innovation, data cooperative">
        <meta name="author" content="">
        <link rel="shortcut icon" href="<?php echo Yii::app()->baseUrl; ?>/favicon.ico">
        <link rel="chrome-webstore-item" href="<?php echo Yii::app()->params['chromeExtensionUrl']; ?>">

        <title>TheGoodData | Enjoy your data <?php echo (isset($this->pageTitle))?$this->pageTitle:'';?></title>
        
        <?php
        
        $cs=Yii::app()->clientScript;
        
        $cs->registerCoreScript('jquery');
        $cs->registerPackage('bootstrap');

        $cs->registerCssFile(Yii::app()->theme->baseUrl . '/css/vendor/font-awesome.min.css');
        $cs->registerCssFile(Yii::app()->theme->baseUrl . '/css/vendor/webfonts.css');
        $cs->registerCssFile(Yii::app()->theme->baseUrl . '/css/main.css');
        //$cs->registerCssFile(Yii::app()->theme->baseUrl . '/css/landing.style.css');
        $cs->registerCssFile(Yii::app()->theme->baseUrl . '/css/homepage.css');
        $cs->registerCssFile(Yii::app()->theme->baseUrl . '/css/congrats.css');
        
        $cs->registerScriptFile(Yii::app()->theme->baseUrl . '/js/common.js', CClientScript::POS_HEAD);
        $cs->registerScriptFile(Yii::app()->theme->baseUrl . '/js/dummy-regenerate-1.js', CClientScript::POS_HEAD);
        $cs->registerScriptFile(Yii::app()->theme->baseUrl . '/js/jquery.stellar.min.js', CClientScript::POS_HEAD);
        $cs->registerScriptFile(Yii::app()->theme->baseUrl . '/js/vendor/modernizr-2.6.2.min.js', CClientScript::POS_HEAD);

        ?>    
        <script>
         $('.carousel').carousel({
          interval: 8000
        })
         </script>

    </head>

    <body <?php echo ($this->bodyId=='')?'':'id="'.$this->bodyId.'"';?>>

        <header class="navbar-fixed-top">
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
                                <li class="collaborate"><a href="https://thegooddata.slack.com/">Collaborate with us</a></li>
                                <li class="dropdown">
                                    <a data-target="#" class="dropdown-toggle user" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <!-- <img src="<?php echo Yii::app()->theme->baseUrl; ?>/img/jacob.jpg" class="avatar"/> Commented until added on the form -->
                                        <?php echo Yii::app()->user->username; ?>
                                        <b class="caret"></b>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li><a href="<?php echo Yii::app()->controller->createAbsoluteUrl("/user/profile");?>">account details</a></li>

                                        <li class="divider"></li>
                                        <?php if(Yii::app()->user->isAdmin()):?>
                                            <li><a href="<?php echo Yii::app()->controller->createAbsoluteUrl("/manage/index");?>">Admin</a></li>
                                        <?php endif; ?>
                                        <li><a href="<?php echo Yii::app()->controller->createAbsoluteUrl("/goodData/index");?>">Good data</a></li>
                                        <li><a href="<?php echo Yii::app()->controller->createAbsoluteUrl("/evilData/index");?>">Evil data</a></li>
                                        <li><a href="<?php echo Yii::app()->controller->createAbsoluteUrl("/userData/index");?>">Your data</a></li>
                                        
                                        <?php if (!defined('HIDE_INTERESTS')): ?>
                                          <li><a href="<?php echo Yii::app()->controller->createAbsoluteUrl("/interests");?>">Interests</a></li>
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
                                <?php if ( isset( $this->displayGetExtensionButton ) && $this->displayGetExtensionButton == true ) { ?>
                                <li class="install text-uppercase"><a href="javascript:void(0);" onclick="chrome.webstore.install('<?php echo Yii::app()->params['chromeExtensionUrl']; ?>',chromeInstallSuccess,chromeInstallFail); return false;">Get the extension</a></li>
                                <?php } ?>
                                <li class="text-uppercase" id="sign-in"><a href="<?php echo Yii::app()->controller->createAbsoluteUrl("/user/login"); ?>">Sign In<img src="<?php echo Yii::app()->theme->baseUrl; ?>/img/sign-in-arrow.png" alt=""></a></li>
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
                                  array('url'=>array('/goodData/index'), 'label'=>'GOOD DATA', 'visible'=>Yii::app()->user->isGuest),
                                  array('url'=>array('/evilData/index'), 'label'=>'EVIL DATA', 'visible'=>Yii::app()->user->isGuest),
                                  array('url'=>array('/donate/index'), 'label'=>'SUPPORT', 'visible'=>Yii::app()->user->isGuest),
                                  array('url'=>'https://thegooddata.slack.com/', 'label'=>'COLLABORATE', 'visible'=>Yii::app()->user->isGuest),
                                  array('url'=>array('/site/company'), 'label'=>'ABOUT US', 'visible'=>Yii::app()->user->isGuest),                              
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
                                $menu_items[]=array('label'=>'INTERESTS', 'url'=>array('/interests'));
                              }

                            }
                        
                            $this->widget('zii.widgets.CMenu',array(
                            'items'=>$menu_items,
                            'htmlOptions' => array(
                                'class'=>'nav navbar-nav',
                            ),
                            'submenuHtmlOptions' => array(
                                'class' => '',
                            ),
                            'encodeLabel' => false,
                        )); 


                        ?>
                    </div>
                </div>
            </div> 

        <?php } ?>
      
        <?php $this->renderPartial('//layouts/_chromeModal'); ?>

        <!-- main content -->

        <?php echo $content; ?>

        <!-- END main content -->
      
        
        <div class="footer">
            <div class="container">
                <div class="row">
                  <div class="footer-left col-md-6">
                    <img alt="" src="<?php echo Yii::app()->theme->baseUrl; ?>/img/wind-wheel-footer.svg">
                    <div class="footer-bloc-l">
                      <ul class="list-inline">
                        <li><a href="<?php echo Yii::app()->controller->createAbsoluteUrl("/site/company");?>">Your Company</a></li>
                        <li><a href="<?php echo Yii::app()->controller->createAbsoluteUrl("/site/coders");?>">Coders</a></li>
                        <li><a href="<?php echo Yii::app()->controller->createAbsoluteUrl("/site/faq");?>">FAQs</a></li>
                        <li><a href="<?php echo Yii::app()->controller->createAbsoluteUrl("/site/legal");?>">Legal</a></li>
                        <li><a href="<?php echo Yii::app()->controller->createAbsoluteUrl("/donate/index");?>" class="red">Donate</a></li>                    
                      </ul>
                      <br><br>  
                      <div class="social">
                          <span class="fa-stack fa-lg">
                            <i class="fa fa-circle fa-stack-2x"></i>
                            <a id="slack-icon" href="https://thegooddata.slack.com/">
                              <i class="fa fa-slack fa-stack-1x fa-inverse"></i>
                            </a>
                          </span>
                          <span class="fa-stack fa-lg">
                            <i class="fa fa-circle fa-stack-2x"></i>
                            <a id="twitter-icon" href="https://twitter.com/thegooddata">
                              <i class="fa fa-twitter fa-stack-1x fa-inverse"></i>
                            </a>
                          </span>
                          <span class="fa-stack fa-lg">
                            <i class="fa fa-circle fa-stack-2x"></i>
                            <a id="medium-icon" href="https://medium.com/thegooddata">
                              <i class="fa fa-medium fa-stack-1x fa-inverse"></i>
                            </a>
                          </span>
                          <span class="fa-stack fa-lg">
                            <i class="fa fa-circle fa-stack-2x"></i>
                            <a id="mail-icon" href="mailto:info@thegooddata.org">
                              <i class="fa fa-envelope fa-stack-1x fa-inverse"></i>
                            </a>
                          </span>    
                      </div>
                    </div>
                  </div>
                  
                  <div class="footer-right col-md-6">
                    <div class="footer-bloc-r">
                      <a href="https://mutuals.fsa.gov.uk/SocietyDetails.aspx?Number=32340&Suffix=R">The Good Data Cooperative Ltd, Mutuals Register No.32340R</a>

                      <div class="license-container">
                        <br><br>
                        <img alt="License" src="<?php echo Yii::app()->theme->baseUrl; ?>/img/license.png">
                        <p>Except where otherwise noted,<br/> content on  this site is licensed under a <br/>
                            <a href="http://creativecommons.org/licenses/by/4.0/" target="_blank" title="Creative Commons, Attribution 4.0 International">
                                Creative Commons Attribution 4.0 International License.
                            </a>
                        </p>
                      </div>
                    </div>
                  </div>
                </div>  
              </div>
        </div>
        
        <?php if (Yii::app()->params['enableAnalytics'] 
            && !($this instanceof GxController) 
            && !(isset($this->isAdminPage) && $this->isAdminPage === true)): ?>
          <?php $this->renderPartial('//layouts/_analytics'); ?>
        <?php endif; ?>
                
</body>
</html>