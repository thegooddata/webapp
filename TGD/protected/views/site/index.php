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