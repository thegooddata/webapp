<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>The Good Data</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">

        <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/normalize.min.css">  

        <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/home.css"> 
        <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/media_queries.css">
        <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/webfonts.css" type="text/css">
        <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/bootstrap.min.css">              
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/vendor/modernizr-2.6.2.min.js"></script>

    </head>
    <body ontouchstart="">
        <!--[if lt IE 7]>
            <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
        <![endif]-->

        <header class="clearfix">
            <div class="wrap">
                <div class="logo">
                    <a href="http://www.thegooddata.org"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/logo.png" alt="The Good Data"></a>
                </div>
                <nav>
                    <ul class="clearfix">
                        <!-- <li><a href="<?php echo Yii::app()->controller->createUrl("user/login"); ?>">Login</a></li> -->
                        <li><a href="<?php echo Yii::app()->controller->createUrl("user/registration"); ?>">Sign In</a></li>
                        <li><a class="active" href="#">Install in chrome</a></li>
                    </ul> 
                </nav>
            </div> <!-- wrap -->
        </header>
        <div class="slide" id="slide2" data-slide="2" style="overflow: hidden;">
            <section class="intro clearfix">       

                <div class="wrap clearfix">
                    <h1>Browse the web anonymously<br/> while doing some good.</h1>
                    <a href="#">install in chrome</a>
                    <p>The Good Data helps you control<br/> your personal data and make it<br/> work for a good cause.</p>

                    <img class="drops small_drop" src="<?php echo Yii::app()->theme->baseUrl; ?>/images/yellow_small.png" data-stellar-ratio="-3" data-stellar-vertical-offset="-55"alt="">
                    <img class="drops big_drop" src="<?php echo Yii::app()->theme->baseUrl; ?>/images/green_big.png" data-stellar-ratio="-1.2" data-stellar-vertical-offset="-102"alt="">
                    <img class="drops small_drop" src="<?php echo Yii::app()->theme->baseUrl; ?>/images/red_small.png" data-stellar-ratio="-1.5" data-stellar-vertical-offset="-53"alt="">
                    <img class="drops big_drop" src="<?php echo Yii::app()->theme->baseUrl; ?>/images/yellow_big.png" data-stellar-ratio="-2.7" data-stellar-vertical-offset="-25"alt="">
                    <img class="drops small_drop" src="<?php echo Yii::app()->theme->baseUrl; ?>/images/blue_small.png" data-stellar-ratio="-3" data-stellar-vertical-offset="-55"alt="">
                    <img class="drops big_drop" src="<?php echo Yii::app()->theme->baseUrl; ?>/images/blue_big.png" data-stellar-ratio="-1" data-stellar-vertical-offset="-102"alt="">
                    <img class="drops small_drop" src="<?php echo Yii::app()->theme->baseUrl; ?>/images/green_small.png" data-stellar-ratio="-1.5" data-stellar-vertical-offset="-53"alt="">
                    <img class="drops big_drop" src="<?php echo Yii::app()->theme->baseUrl; ?>/images/red_big.png" data-stellar-ratio="-2.7" data-stellar-vertical-offset="-25"alt="">  

                </div> <!-- wrap -->
            </section> <!-- intro -->
        </div><!--End Slide 2 Parallax Scrolling Div -->

        <section id="bag" class="our_product clearfix">
            <div class="wrap clearfix">        
                <div class="content clearfix">
                    <h1>You own your data.</h1>
                    <p>Nobody should have access to it without your consent<br/> and in exchange of nothing. The Good Data extension<br/>blocks browsing data leaks to third parties.</p>
                    <a href="#">our product</a>
                </div> <!-- content -->

                <img class="seeds" src="<?php echo Yii::app()->theme->baseUrl; ?>/images/seed3.png" alt="Your Data">
                <img class="seeds" src="<?php echo Yii::app()->theme->baseUrl; ?>/images/seed4.png" alt="Your Data">
                <img class="seeds" src="<?php echo Yii::app()->theme->baseUrl; ?>/images/seed5.png" alt="Your Data">
                <img id="bag1" src="<?php echo Yii::app()->theme->baseUrl; ?>/images/bag1.png" alt="Your Data">
                <img id="bag2" src="<?php echo Yii::app()->theme->baseUrl; ?>/images/bag.jpg" alt="Your Data">
                <img class="seeds" src="<?php echo Yii::app()->theme->baseUrl; ?>/images/seed1.png" alt="Your Data">
                <img class="seeds" src="<?php echo Yii::app()->theme->baseUrl; ?>/images/seed2.png" alt="Your Data">

            </div> <!-- wrap -->
        </section> <!-- our_product -->

        <section id="hand" class="our_partners clearfix">
            <div class="wrap clearfix">
                <div class="content clearfix">
                    <h1>It's in your hands to<br/> make your data work<br/> for the social good.</h1>
                    <p>Only if you give us consent, we will anonymise and trade<br/> on your behalf a small part of that data. 50% of the<br/> money collected will be lent to microcredit projects in<br/> developing countries via Kiva, the other part will be used<br/> to fund the operations at The Good Data, your company.</p>
                    <a href="#">our partners</a>
                </div> <!-- content -->
                <img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/hand.png" alt="Its in Your Hand">
            </div> <!-- wrap -->
        </section> <!-- our_partners -->

        <section class="your_company clearfix">
            <div class="wrap clearfix">
                <h1>You don't just own just your data,<br/> You also own The Good Data.</h1>
                <p>Winning back data ownership in front of Corporations can only be achieved<br/> with the collaboration of thousands of people like you. That’s why, if you wish,<br/> you can become owner of The Good Data at no cost. You will be informed of<br/> company progress and can take part on major decisions.</p>
                <a href="#">your company</a>  

                <div class="sun clearfix">
                    <img id="sun1" src="<?php echo Yii::app()->theme->baseUrl; ?>/images/sun1.png" alt="">
                    <img id="sun2" src="<?php echo Yii::app()->theme->baseUrl; ?>/images/sun2.png" alt="">
                    <img id="sun3" src="<?php echo Yii::app()->theme->baseUrl; ?>/images/sun3.png" alt="">        
                </div>      
            </div> <!-- wrap -->
            <div class="cloud clearfix">
                <div id="cloud1"></div>
                <div id="cloud2"></div>
            </div>
            <img id="fields" src="<?php echo Yii::app()->theme->baseUrl; ?>/images/fields.png" alt="">
        </section> <!-- your_company -->

        <section class="start clearfix">
            <div class="wrap clearfix">
                <a href="#"><h2>start enjoying your data now</h2></a>            
            </div> <!-- wrap -->
        </section> <!-- start -->      

        <footer class="clearfix">
            <div class="footer clearfix">
                <div class="wrap clearfix">
                    <ul class="clearfix">
                        <h4>product</h4>
                        <li><a href="#">Technology</a></li>
                        <li><a href="#">FAQs</a></li>
                        <li><a href="#">Support</a></li>
                    </ul>
                    <ul class="clearfix">
                        <h4>third parties</h4>
                        <li><a href="#">Coder's Program</a></li>
                        <li><a href="#">Partners</a></li>
                        <li><a href="#">Media</a></li>
                    </ul>
                    <ul class="clearfix">
                        <h4>company</h4>
                        <li><a href="#">Your Company</a></li>
                        <li><a href="#">Member's Area</a></li>
                        <li><a href="#">Donate</a></li>
                    </ul>
                    <ul class="clearfix">
                        <h4>contact</h4>
                        <li>82 Clerkenwell Road</li>
                        <li>London EC1M 5RF, UK</li>
                        <li><a href="#">Email Us</a></li>
                    </ul>
                    <ul id="fifth" class="clearfix">
                        <h4>legal stuff</h4>
                        <li><a href="#">Terms of Service</a></li>
                        <li><a href="#">Privacy Policy</a></li>
                        <li><a href="#">Company Rules</a></li>
                    </ul>        
                    <ul class="social clearfix">
                        <li class="first"><a id="gooddata" href="#"></a></li>
                        <li><a id="wordpress" href="#"></a></li>
                        <li><a id="reddit" href="#"></a></li>
                        <li class="last"><a id="twitter" href="#"></a></li>
                        <em><a href="http://www.thegooddata.org">thegooddata.org</a></em>
                    </ul>
                </div> <!-- wrap -->
            </div>
            <div class="license clearfix">
                <div class="wrap clearfix">
                    <ul class="clearfix">
                        <li>
                            <img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/license.png" alt="License">
                            <p>Except where otherwise noted, content<br/> on this site is licensed under a Creative<br/> Commons Attribution 4.0 License.</p>
                        </li>
                        <li>
                            <a href="#" title="Designed by Timeless">
                                <img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/timeless_logo.png" alt="Timeless">
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </footer>
        <!-- Modal -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h2>Early access</h2>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <!-- welcome message -->
                        <div id="subscribeFormWelcome">
                            <span>Enjoy your data!&nbsp;We are in private beta right now. Please submit your email and we will contact you shortly about joining the beta.</span><br>
                            <br>
                            <span>For frequent updates, follow us&nbsp;</span><a href="https://twitter.com/thegooddata" target="blank">@thegooddata</a>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <form action="<?php echo Yii::app()->controller->createUrl("site/subscribelist"); ?>" method="POST" class="form-inline" role="form">
                            <!-- form -->
                            <input type="hidden" name="u" value="c536df10462fb6afe72117895">
                            <input type="hidden" name="id" value="b5320da781">
                            <div class="form-group">
                                <input class="form-control" type="email" name="MERGE0" id="MERGE0" size="25" placeholder="Enter email">
                            </div>
                            <button type="submit" class="btn btn-primary" name="submit">Send</button>
                            <!-- real people should not fill this in and expect good things -->
                            <div style="position: absolute; left: -5000px;"><input type="text" name="b_c536df10462fb6afe72117895_b5320da781" value=""></div>
                        </form>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->

        <!-- Le JavaScript -->

        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/vendor/jquery-1.9.1.min.js"><\/script>');</script>

        <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/js/plugins.js"></script>
        <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/js/main.js"></script>  
        <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery.stellar.min.js"></script>
        <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/js/early-access.js"></script>
    </body>
</html>