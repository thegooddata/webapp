<section class="ads-leaderboard-container">
  <div class="ads-leaderboard"></div>
</section>

<span class="why_ads" text="Your data and your attention are valuable. With these ads we help you monetize them and contribute to social projects like this one.">why this ads?</span>

<section class="main-container">
  <article class="notification-container">
    <header>
      <img class="inline-middle" src="<?php echo Yii::app()->theme->baseUrl; ?>/img/final-logo-200px.png">
      <h2 class="inline-middle">new project funded with your help!</h2>  
    </header>
    <div class="content-container">
      <div class="content-left-column">
        <?php
        if ( $achievements['image'] )
        {
          $img_src = '/uploads/'.$achievements['id'].'-'.$achievements['image'];
        }
        else
        {
          $img_src = Yii::app()->theme->baseUrl.'/img/notification-test.jpg';
        }
        ?>
        <img src="<?php echo $img_src; ?>"/>
        <div class="share-container">
          <p>SHARE THIS</p>
          <ul class="social">
            <li>
              <a id="facebook" href="#"></a>
            </li>
            <li>
              <a id="twitter" href="#"></a>
            </li>
            <li>
              <a id="instagram" href="#"></a>
            </li>
          </ul>
        </div>
        
      </div>
      <div class="content-right-column">
        <p><?php echo $achievements['text_en']; ?></p>
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
        <a href="http://www.tgd.local/index-test.php/donate" class="btn sharp btn-primary inline-middle">DONATE</a>
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

<section class="ads-medium-rectangle-container">
  <div class="ads-medium-rectangle"></div>
</section>
