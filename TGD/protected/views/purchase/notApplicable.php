

<div id="tgd-page-title">
    <div class="container">
        <div class="row">
            <h2>This page is not for you...</h2>
        </div>
    </div>
</div> 
<div class="wrapper">
    <div id="tgd-page-content" class="container thanks">
        <div class="row">
            <div class="col-sm-offset-1 col-sm-14 tgd-no-horizontal-padding">
                <div>
                    <h2>This page is not for you...</h2>
                    <p>
                      Shares can only be bought once you have applied for membership and 
                      it has been pre-accepted by us. Pre-acceptance will be notified to the mail you have provided.
                    </p>
                    <p>
                      If you think we have made something wrong please notify us writing to <a href="mailto:members@thegooddata.org">members@thegooddata.org</a>
                    </p>
                    <p>
                      <?php
                      $link=Yii::app()->createAbsoluteUrl('donate');
                      ?>
                      If what you wanted to do is supporting us with a donation, please visit <?php echo CHtml::link($link, $link); ?>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>