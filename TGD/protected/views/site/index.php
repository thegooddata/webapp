       
        <div class="slide" id="slide2" style="overflow: hidden;">
            <section id="intro" class="intro clearfix">       

                <div class="container clearfix">
                    <h1>Protect your online data<br/>and make it work for a better cause.</h1>
                    
                    <?php if (Yii::app()->request->getQuery("inline", false)===false): ?>
                      <a class="tgd-button modal-trigger" target="_blank" href="https://chrome.google.com/webstore/detail/thegooddata/elbfekgipcdaikbmepglnkghplljagkd">Get TheGoodData</a>
                    <?php else: ?>
                      <a class="tgd-button modal-trigger" href="javascript:void(0);" onclick="chrome.webstore.install('<?php echo Yii::app()->params['chromeExtensionUrl']; ?>',chromeInstallSuccess,chromeInstallFail); return false;">Get TheGoodData</a>
                    <?php endif; ?>
                    
                    <p>TheGoodData gives you back control<br/>of your valuable browsing data<br/>and lets you do some good with it.</p>

                    <img class="drops small_drop" src="<?php echo Yii::app()->theme->baseUrl; ?>/img/yellow_small.png" data-stellar-ratio="-3" alt="">
                    <img class="drops big_drop" src="<?php echo Yii::app()->theme->baseUrl; ?>/img/green_big.png" data-stellar-ratio="-1.2" alt="">
                    <img class="drops small_drop" src="<?php echo Yii::app()->theme->baseUrl; ?>/img/red_small.png" data-stellar-ratio="-1.5" alt="">
                    <img class="drops big_drop" src="<?php echo Yii::app()->theme->baseUrl; ?>/img/yellow_big.png" data-stellar-ratio="-2.7" alt="">
                    <img class="drops small_drop" src="<?php echo Yii::app()->theme->baseUrl; ?>/img/blue_small.png" data-stellar-ratio="-3" alt="">
                    <img class="drops big_drop" src="<?php echo Yii::app()->theme->baseUrl; ?>/img/blue_big.png" data-stellar-ratio="-1" alt="">
                    <img class="drops small_drop" src="<?php echo Yii::app()->theme->baseUrl; ?>/img/green_small.png" data-stellar-ratio="-1.5" alt="">
                    <img class="drops big_drop" src="<?php echo Yii::app()->theme->baseUrl; ?>/img/red_big.png" data-stellar-ratio="-2.7" alt="">  

                </div> <!-- container -->
            </section> <!-- intro -->
        </div><!--End Slide 2 Parallax Scrolling Div -->

        <section id="bag" class="our_product clearfix">
            <div class="container clearfix">        
                <div class="content clearfix">
                    <h1>You own your data.</h1>
                    <p>No one should have unlimited access to your data <br/> 
                    without your express consent.<br/>
                    Right now, companies use your data to their advantage,<br/> 
                    but give you nothing in exchange.</p>
                    <p>TheGoodData extension prevents third party trackers from <br/>
                    accessing your information so you can take back your privacy online.</p>
                    <a class="tgd-button" href="<?php echo Yii::app()->controller->createUrl("/site/product");?>">About our product</a>
                </div> <!-- content -->

                <img class="seeds" src="<?php echo Yii::app()->theme->baseUrl; ?>/img/seed3.png" alt="Your Data">
                <img class="seeds" src="<?php echo Yii::app()->theme->baseUrl; ?>/img/seed4.png" alt="Your Data">
                <img class="seeds" src="<?php echo Yii::app()->theme->baseUrl; ?>/img/seed5.png" alt="Your Data">
                <img id="bag1" src="<?php echo Yii::app()->theme->baseUrl; ?>/img/bag1.png" alt="Your Data">
                <img id="bag2" src="<?php echo Yii::app()->theme->baseUrl; ?>/img/bag.jpg" alt="Your Data">
                <img class="seeds" src="<?php echo Yii::app()->theme->baseUrl; ?>/img/seed1.png" alt="Your Data">
                <img class="seeds" src="<?php echo Yii::app()->theme->baseUrl; ?>/img/seed2.png" alt="Your Data">

            </div> <!-- container -->
        </section> <!-- our_product -->

        <section id="hand" class="our_partners clearfix">
            <div class="container clearfix">
                <div class="content clearfix">
                    <h1>With TheGoodData, <br/>your data has the power <br/>to do good.</h1>
                    <p>With your consent, we will trade selected anonymous data<br/>
                    to a fraction of those companies who have previously <br/>
                    collected it for free. We will reinvest 50% of the revenues<br/>
                    into TheGoodData - your company - and the other 50% will fund<br/>
                    microloans to people in developing countries <br/>
                    via our partner, Zidisha.</p>
                    <a class="tgd-button" href="<?php echo Yii::app()->controller->createUrl("site/partners"); ?>">About our partners</a>
                </div> <!-- content -->
                <img src="<?php echo Yii::app()->theme->baseUrl; ?>/img/hand.png" alt="Its in Your Hand">
            </div> <!-- container -->
        </section> <!-- our_partners -->

        <section id="your_company" class="your_company clearfix">
            <div class="container clearfix">
                <h1>You don't just own your data,<br/> You also own TheGoodData.</h1>
                <p>The more we collaborate, the less choice companies will have to get <br/>your data for free. So come join us, become an owner of TheGoodData <br/>and you’ll have a say in major company decisions and be kept <br/>updated on company progress - all at no cost.</p>
                <a class="tgd-button" href="<?php echo Yii::app()->controller->createUrl("/site/company");?>">About your company</a>  
                <div class="sun clearfix">
                    <img id="sun1" src="<?php echo Yii::app()->theme->baseUrl; ?>/img/sun1.png" alt="">
                    <img id="sun2" src="<?php echo Yii::app()->theme->baseUrl; ?>/img/sun2.png" alt="">
                    <img id="sun3" src="<?php echo Yii::app()->theme->baseUrl; ?>/img/sun3.png" alt="">        
                </div>      
            </div> <!-- container -->
            <div class="cloud clearfix">
                <div id="cloud1"></div>
                <div id="cloud2"></div>
            </div>
            <img id="fields" src="<?php echo Yii::app()->theme->baseUrl; ?>/img/fields.png" alt="">
        </section> <!-- your_company -->

        <section id="start" class="start clearfix">
            <div class="container clearfix">
                <a class="button modal-trigger" href="https://chrome.google.com/webstore/detail/thegooddata/elbfekgipcdaikbmepglnkghplljagkd" target="_blank"><h2>take back your data now</h2></a>            
            </div> <!-- container -->
        </section> <!-- start -->      

        <section id="mentions" class="start clearfix">
            <div class="container clearfix">
                <span class="helper">
                    <a href="https://gigaom.com/2014/11/27/thegooddata-wants-your-browsing-data-to-benefit-good-causes/" target="_blank">
                    <img src="<?php echo Yii::app()->theme->baseUrl; ?>/img/gigaom.png" alt="placeholder+image">
                    </a>
                </span>

                <span class="helper">
                    <a href="http://www.fastcoexist.com/3026452/instead-of-giving-google-your-data-for-free-now-you-can-donate-it-for-good" target="_blank">
                    <img src="<?php echo Yii::app()->theme->baseUrl; ?>/img/fastcompany.png" alt="">
                    </a>
                </span>
                
                <span class="helper">
                    <a href="http://www.forbes.com/sites/adamtanner/2014/11/28/share-your-data-fund-microloans-to-developing-world/" target="_blank">
                    <img src="<?php echo Yii::app()->theme->baseUrl; ?>/img/forbes.png" alt="placeholder+image">
                    </a>
                </span>
            </div> <!-- container -->
        </section> <!-- start -->      
       
     