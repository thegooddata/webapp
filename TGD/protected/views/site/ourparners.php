<!-- 
<a href="<?php echo Yii::app()->controller->createUrl("site/page",array('view'=>'juan'));?>">Pagina de Juan</a> 
-->

<div id="page-title">
    <div class="container">
        <div class="row">
            <h2>Partners</h2>
        </div>
    </div>
</div> 
<section id="page-content">
    <div class="container">
        <div class="row">
            <section id="kiva" class="col-sm-16 col-md-8 col-lg-8">
                <h2>Use of funds partner</h2>
                <div class="logo"></div>
                <div class="very-light-gray">
                    <ul>
                        <li><span class="glyphicon glyphicon-ok-sign"></span>Kiva is the online microproject leader.</li>
                        <li><span class="glyphicon glyphicon-ok-sign"></span>It provides us with the best way to invest part of the money earned in wealth generating projects in developing countries.</li>
                        <li><span class="glyphicon glyphicon-ok-sign"></span>Thanks to their online platform and local presence we can choose and monitor the progress of the projects we support.</li>
                        <li><span class="glyphicon glyphicon-ok-sign"></span>Being loans rather than donations allow TheGoodData to keep growing its asset base.</li>
                    </ul>
                </div>
                <div class="clearfix">
                    <div class="case photo col-sm-16 co-md-8 col-md-8">
                        <img src="<?php echo Yii::app()->theme->baseUrl; ?>/img/adjo.jpg" class="photo"><span class="name">Mohammed</span><img src="<?php echo Yii::app()->theme->baseUrl; ?>/img/flags/png/pe.png" class="flag"/><br>
                        <div class="subtext">$2400 to provide drinking water to students</div>
                    </div>
                    <div class="case photo col-sm-16 co-md-8 col-md-8">
                        <img src="<?php echo Yii::app()->theme->baseUrl; ?>/img/adjo.jpg" class="photo"><span class="name">Mohammed</span><img src="<?php echo Yii::app()->theme->baseUrl; ?>/img/flags/png/pe.png" class="flag"/><br>
                        <div class="subtext">$2400 to provide drinking water to students</div>
                    </div>
                    <div class="case photo col-sm-16 co-md-8 col-md-8">
                        <img src="<?php echo Yii::app()->theme->baseUrl; ?>/img/adjo.jpg" class="photo"><span class="name">Mohammed</span><img src="<?php echo Yii::app()->theme->baseUrl; ?>/img/flags/png/pe.png" class="flag"/><br>
                        <div class="subtext">$2400 to provide drinking water to students</div>
                    </div>
                    <div class="case photo col-sm-16 co-md-8 col-md-8">
                        <img src="<?php echo Yii::app()->theme->baseUrl; ?>/img/adjo.jpg" class="photo"><span class="name">Mohammed</span><img src="<?php echo Yii::app()->theme->baseUrl; ?>/img/flags/png/pe.png" class="flag"/><br>
                        <div class="subtext">$2400 to provide drinking water to students</div>
                    </div>
                </div>
            </section>
            <section id="chango" class="col-sm-16 col-md-8 col-lg-8">
                <h2>Source of funds partner</h2>
                <div class="logo"></div>
                <div class="very-light-gray">
                    <ul>
                        <li><span class="glyphicon glyphicon-ok-sign"></span>Our data trading partners use our processed data in order to display ads in line with your interests.</li>
                        <li><span class="glyphicon glyphicon-ok-sign"></span>We take care that these partners receive that data in an anonymized form and rewarding the cooperative accordingly.</li>
                        <li><span class="glyphicon glyphicon-ok-sign"></span>Without TheGoodData participation, some of those players would have got access to that data without you express consent.</li>
                    </ul>
                </div>
                <div class="very-light-blue">
                    If you are interested in having access to our users data
                    in a respectful, anonimized, consented and rewarded way you can contact us at
                    <a mailto="data@thegooddata.org">data@thegooddata.org</a>
                </div>
            </section>
        </div>
    </div>
</section>

<script>
$(function() {
    var sameSize = function() {
        var kivaGrayHeight = $('#kiva .very-light-gray').innerHeight(),
                picturesHeight = $('#kiva .clearfix').innerHeight();
        $('#chango .very-light-gray').innerHeight(kivaGrayHeight);
        $('#chango .very-light-blue').innerHeight(picturesHeight);
    };

    setTimeout(function(){sameSize();},100);


});
</script>


