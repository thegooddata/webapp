<link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl . '/css/bootstrap_vertical_tabs.css' ?>" type="text/css"/>
<link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl . '/css/pavan_styles.css' ?>" type="text/css" />

        <!-- main content -->

<div id="tgd-page-title">
    <div class="container">
        <div class="row">
            <ul class="clearfix">
                <li><a href="<?php echo Yii::app()->controller->createAbsoluteUrl("/site/index"); ?>"><span class="fa fa-home"></span></a></li>
                <li><h2>The product</h2></li>
            </ul>
        </div>
    </div>
</div> 
        
<section id="tgd-page-content">
    <div class="container">
        <div class="row">
            <div class="col-xs-8 product-tabs" style="padding: 0;"> <!-- required for floating -->
                <!-- Nav tabs -->
                <ul class="nav nav-tabs tabs-left"><!-- 'tabs-right' for right tabs -->
                  <li class="active"><a href="#home" data-toggle="tab"><span>1</span>Browser extension blocks trackers</a></li>
                  <li><a href="#profile" data-toggle="tab"><span>2</span>Your data is processed securely</a></li>
                  <li><a href="#messages" data-toggle="tab"><span>3</span>Anonymized info is traded on your behalf</a></li>
                  <li><a href="#settings" data-toggle="tab"><span>4</span>Earnings are reinvested for everybody's benefit</a></li>
                </ul>
            </div>

            <div class="col-xs-8 faq product-content">
                <!-- Tab panes -->
                <div class="tab-content">
                    <div class="tab-pane active" id="home">
                        <ul class="clearfix">
                            <li>
                                <p>This processed information is sold to retargeting networks that will show you ads based on your recent queries/interests</p>
                            </li>
                            <li>
                                <p>Buyers of that info pay us some money that would have usually been earned by third parties</p>
                            </li>
                        </ul>
                    </div>
                  <div class="tab-pane" id="profile">
                        <ul class="clearfix">
                            <li>
                                <p>This processed information is sold to retargeting networks that will show you ads based on your recent queries/interests</p>
                            </li>
                            <li>
                                <p>Buyers of that info pay us some money that would have usually been earned by third parties</p>
                            </li>
                            <li>
                                <p>This processed information is sold to retargeting networks that will show you ads based on your recent queries/interests</p>
                            </li>
                            <li>
                                <p>Buyers of that info pay us some money that would have usually been earned by third parties</p>
                            </li>
                            
                        </ul>
                  </div>
                  <div class="tab-pane" id="messages">
                        <ul class="clearfix">
                            <li>
                                <p>This processed information is sold to retargeting networks that will show you ads based on your recent queries/interests</p>
                            </li>
                            <li>
                                <p>Buyers of that info pay us some money that would have usually been earned by third parties</p>
                            </li>
                            <li>
                                <p>This processed information is sold to retargeting networks that will show you ads based on your recent queries/interests</p>
                            </li>                         
                        </ul>
                  </div>
                  <div class="tab-pane" id="settings">
                        <ul class="clearfix">
                            <li>
                                <p>This processed information is sold to retargeting networks that will show you ads based on your recent queries/interests</p>
                            </li>
                            <li>
                                <p>Buyers of that info pay us some money that would have usually been earned by third parties</p>
                            </li>
                            <li>
                                <p>This processed information is sold to retargeting networks that will show you ads based on your recent queries/interests</p>
                            </li>
                            <li>
                                <p>Buyers of that info pay us some money that would have usually been earned by third parties</p>
                            </li>
                            <li>
                                <p>This processed information is sold to retargeting networks that will show you ads based on your recent queries/interests</p>
                            </li>
                            <li>
                                <p>Buyers of that info pay us some money that would have usually been earned by third parties</p>
                            </li>                            
                        </ul>
                  </div>
                </div>
            </div>            
                
        </div>
    </div>
</section>
        </div>
    </div>
</section>



<script>

    $(document).ready(function(){

        $('.product-tabs ul li:first-child').click(function(){
            $('.product-tabs').css('border-right','5px solid #268dcc');
        });

        $('.product-tabs ul li:nth-child(2)').click(function(){
            $('.product-tabs').css('border-right','5px solid #ea6654');
        });

        $('.product-tabs ul li:nth-child(3)').click(function(){
            $('.product-tabs').css('border-right','5px solid #00567b');
        });

        $('.product-tabs ul li:last-child').click(function(){
            $('.product-tabs').css('border-right','5px solid #72bc81');
        });

    });

</script>

    <!-- END main content -->

