<?php

$url_path = Yii::app()->getRequest()->getHostInfo().Yii::app()->getRequest()->getRequestUri();

if ( $achievements->image )
{
  $img_src = Yii::app()->getRequest()->getHostInfo().'/uploads/'.$achievements->id.'-'.$achievements->image;
}
else
{
  $img_src = Yii::app()->getRequest()->getHostInfo().Yii::app()->theme->baseUrl.'/img/notification-test.jpg';
}

$cs=Yii::app()->clientScript;

$cs->registerMetaTag('summary', 'twitter:card');
$cs->registerMetaTag($this->pageDescription, 'twitter:description');
$cs->registerMetaTag($img_src, 'twitter:image');
$cs->registerMetaTag('@thegooddata', 'twitter:site');
$cs->registerMetaTag($this->pageTitle, 'twitter:title');
$cs->registerMetaTag($url_path, 'twitter:url');

$cs->registerMetaTag($this->pageDescription, 'og:description');
$cs->registerMetaTag($img_src, 'og:image');
$cs->registerMetaTag($this->pageTitle, 'og:title');
$cs->registerMetaTag('website', 'og:type');
$cs->registerMetaTag($url_path, 'og:url');
$cs->registerMetaTag('thegooddata', 'og:site_name');

?>

<section class="ads-leaderboard-container">
  <div class="ads-leaderboard"></div>
</section>

<span class="why_ads" text="Your data and your attention are valuable. With these ads we help you monetize them and contribute to social projects like this one.">why this ads?</span>

<section class="main-container">
  <article class="notification-container">
    <header>
      <img class="inline-middle" src="<?php echo Yii::app()->theme->baseUrl; ?>/img/final-logo-200px.png">
      <h2 class="inline-middle">
        <?php 
        if ( $achievements->title )
        {
          echo $achievements->title;
        }
        else
        {
          echo "New project funded with your help!";
        }
        ?>
      </h2>  
    </header>
    <div class="content-container">
      <div class="content-left-column">
        <img src="<?php echo $img_src; ?>" />
        <div class="share-container">
          <p>SHARE THIS</p>
          <ul class="social">
            <li>
              <a id="facebook" href="http://www.facebook.com/sharer.php?s=100&amp;p[url]=<?php echo $url_path; ?>" target="_blank"></a>
            </li>
            <li>
              <a id="twitter" href="https://twitter.com/home?status=<?php echo $url_path; ?>%20TheGoodData%20%7C%20Enjoy%20your%20data" target="_blank"></a>
            </li>
            <li>
              <a id="googleplus" href="https://plus.google.com/share?url=<?php echo $url_path; ?>" target="_blank"></a>
            </li>
          </ul>
        </div>
      </div>
      <div class="content-right-column">
        <p>
          <?php echo $achievements->text_en; ?>
          <?php if ( $achievements->link_en ) : ?>
            <br><br>
            <a href="<?php echo $achievements->link_en ?>" target="_blank">More information</a>
          <?php endif; ?> 
        </p>
      </div> 
    </div>
    
    <div class="statistic-container">
      <div class="statistic-left-column">
        <div class="aid-container inline-middle">
          <img src="<?php echo Yii::app()->theme->baseUrl; ?>/img/heart-aid-people.svg" />
          <span class="aid-text">AID</span>
        </div>
        <p class="inline-middle"><span class="aid-number"><?php echo $loans_count; ?></span>projects funded with your help</p>
      </div>
      <div class="statistic-right-column">
        <div class="shield-container inline-middle">
          <img class="inline-middle shield" src="<?php echo Yii::app()->theme->baseUrl; ?>/img/ico-box.svg" />
          <span class="shield-text">VALUE</span>
        </div>
        <p class="inline-middle"><span class="shield-number"><?php echo $total_money_earned; ?></span>value collected so far</p>
      </div>
    </div>
    
    <footer class="footer-container">
      <div class="footer-left-column">
        <p class="inline-middle">In love with us?</p>
        <a href="<?php echo Yii::app()->controller->createAbsoluteUrl("/donate/index"); ?>" class="btn sharp btn-primary inline-middle">DONATE</a>
      </div>
      <div class="footer-right-column">
<!--        <a href="javascript:void(0);" onclick="removeNotification();">
          <img class="inline-middle" src="<?php //echo Yii::app()->theme->baseUrl; ?>/img/close.png" />
        </a>      -->
        <?php 
        $image = CHtml::image( Yii::app()->theme->baseUrl. '/img/close-yellow-button.svg', 'close', array('class' => 'inline-middle'));
        echo  CHtml::link($image,'#',array('submit'=>array('notificationtab/deactivateNotification'),'confirm' => 'Are you sure you ?'));       
        ?>
        <p class="inline-middle">Don't show again this notification</p>
      </div>
    </footer>
    
  </article>
</section>
<span class="footer-message"><a href="<?php echo Yii::app()->controller->createAbsoluteUrl("/site/index"); ?>" target="_blank">TheGoodData</a> - Help people in need by simply browsing.</span>

<section class="ads-medium-rectangle-container">
  <div class="ads-medium-rectangle"></div>
</section>