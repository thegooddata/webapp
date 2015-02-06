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

        <title>TheGoodData | Enjoy your data <?php echo (isset($this->pageTitle))?$this->pageTitle:'';?></title>

        <?php
        $cs=Yii::app()->clientScript;

        $cs->registerCssFile(Yii::app()->theme->baseUrl . '/css/vendor/bootstrap.min.css');
        $cs->registerCssFile(Yii::app()->theme->baseUrl . '/css/vendor/bootstrap_vertical_tabs.css');
        $cs->registerCssFile(Yii::app()->theme->baseUrl . '/css/vendor/font-awesome.min.css');
        $cs->registerCssFile(Yii::app()->theme->baseUrl . '/css/vendor/webfonts.css');
        $cs->registerCssFile(Yii::app()->theme->baseUrl . '/css/main.css');

        $cs->registerScriptFile(Yii::app()->theme->baseUrl . '/js/vendor/jquery-1.9.1.min.js', CClientScript::POS_HEAD);
        $cs->scriptMap=array(
            'jquery.js'=>Yii::app()->theme->baseUrl . '/js/vendor/jquery-1.9.1.min.js',
        );
        $cs->registerScriptFile(Yii::app()->theme->baseUrl . '/js/bootstrap.js', CClientScript::POS_HEAD);
        $cs->registerScriptFile(Yii::app()->theme->baseUrl . '/js/common.js', CClientScript::POS_HEAD);
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
                                        <li><a href="<?php echo Yii::app()->controller->createAbsoluteUrl("/user/profile");?>">membership details</a></li>

                                        <li class="divider"></li>
                                        <?php if(Yii::app()->user->isAdmin()):?>
                                            <li><a href="<?php echo Yii::app()->controller->createAbsoluteUrl("/manage/index");?>">Admin</a></li>
                                        <?php endif; ?>
                                        <li><a href="<?php echo Yii::app()->controller->createAbsoluteUrl("/goodData/index");?>">Good data</a></li>
                                        <li><a href="<?php echo Yii::app()->controller->createAbsoluteUrl("/evilData/index");?>">Evil data</a></li>
                                        <li><a href="<?php echo Yii::app()->controller->createAbsoluteUrl("/userData/index");?>">Your data</a></li>

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
                                <li class="install"><a href="https://chrome.google.com/webstore/detail/thegooddata/elbfekgipcdaikbmepglnkghplljagkd" target="_blank">Get TheGoodData</a></li>
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
                                  array('url'=>array('/site/partners'), 'label'=>'PARTNERS', 'visible'=>Yii::app()->user->isGuest),
                                  array('url'=>array('/site/company'), 'label'=>'YOUR COMPANY', 'visible'=>Yii::app()->user->isGuest),
                                  array('url'=>array('/goodData/index'), 'label'=>'GOOD DATA', 'visible'=>Yii::app()->user->isGuest),
                                  array('url'=>array('/donate/index'), 'label'=>'SUPPORT US', 'visible'=>Yii::app()->user->isGuest),
                                  array(
                                    'url'=>'https://chrome.google.com/webstore/detail/thegooddata/elbfekgipcdaikbmepglnkghplljagkd', 
                                    'label'=>'GET THEGOODDATA', 
                                    'visible'=>Yii::app()->user->isGuest,
                                    'linkOptions'=>array(
                                        'target'=>'_blank',
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
                            <a id="wordpress" href="//blog.thegooddata.org"></a>
                        </li>
                        <li>
                            <a id="reddit" href="http://www.reddit.com/r/thegooddata" class="exclude"></a>
                        </li>
                        <li class="last">
                            <a id="twitter" href="https://twitter.com/thegooddata" class="exclude"></a>
                        </li>
                        <em><a href="http://www.thegooddata.org">&copy; 2014, thegooddata.org</a></em>
                    </ul>
                </div> <!-- wrap -->
            </div>

            
            <div class="license">
                <div class="wrap">
                    <ul class="clearfix">
                        <li>
                            <img alt="License" src="<?php echo Yii::app()->theme->baseUrl; ?>/img/license.png">
                            <p>Except where otherwise noted, content on this site is licensed under a 
                                <a href="http://creativecommons.org/licenses/by/4.0/" target="_blank" title="Creative Commons, Attribution 4.0 International">
                                    Creative Commons Attribution 4.0 International License.
                                </a>
                            </p>
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
        
        <?php if (Yii::app()->params['enableAnalytics']): ?>
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
        
    </body>
</html>
