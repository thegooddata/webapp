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
        <div class="row product-container">
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
                    <div class="tab-pane active blue_drop_list" id="home">
                        <ul class="clearfix">
                            <li>
                                <p>While you browse, there are plenty of invisible websites that track you. The extension blocks requests from those sites so they don't get to know what you have done online</p>
                            </li>
                            <li>
                                <p>The extension lets you whitelist certain trackers in case they are needed to properly see the site</p>
                            </li>
                            <li>
                                <p>Technology has been built based on open-source <a href="#">disconnect.me</a></p>
                            </li>
                        </ul>
                    </div>
                    <div class="tab-pane red_drop_list" id="profile">
                        <ul class="clearfix">
                            <li>
                                <p>In case you allow us, your search queries, are stored in order to be sold anonymously. You can revoke this permission at anytime</p>
                            </li>
                            <li>
                                <p>Queries that contain sensitive terms (health, sexual, religious or political) are not stored or traded at all</p>
                            </li>
                            <li>
                                <p>You can always visualize and delete any information we store about you</a></p>
                            </li>                          
                        </ul>
                        <ul class="brief_desc clearfix">
                            <li>
                                <h3>Security Rules</h3>
                                <p>We make everything that is in our hands to avoid unauthorised access to your data by hackers, companies or public entities. We will implement all commercially feasible rules, processes and technologies to do so.</p>
                                <img src="<?php echo Yii::app()->theme->baseUrl . '/img/secure_sheild.png';?>" alt="">
                            </li>
                            <li>
                                <h3>Best Encryption Practices</h3>
                                <p>We have implemented most demanding encription measures including 256 bit AES , https, hsts and foward secrecy <a href="#">A rating from independent provider</a></p>
                                <img src="<?php echo Yii::app()->theme->baseUrl . '/img/encrypted_key.png';?>" alt="">
                            </li>
                            <li>
                                <h3>Always Anonymous</h3>
                                <p>In case you provide us any Personally Identifiable Information it will be decoupled from your comercial usage data and using <a href="https://github.com/cloudflare/redoctober">military two-man encryption techniques</a></p>
                                <img src="<?php echo Yii::app()->theme->baseUrl . '/img/anonymous.png';?>" alt="">
                            </li>
                        </ul>
                    </div>
                    <div class="tab-pane dark_blue_drop_list" id="messages">
                        <ul class="clearfix">
                            <li>
                                <p>This processed information is sold to retargeting networks that will show you ads based on your recent queries/interests</p>
                            </li>
                            <li>
                                <p>Buyers of that info pay us some money that would have usually been earned by third parties</p>
                            </li>                       
                        </ul>
                    </div>
                    <div class="tab-pane green_drop_list" id="settings">
                        <ul class="clearfix">
                            <li>
                                <p>50% on microprojects on developing countries via Kiva</p>
                            </li>
                            <li>
                                <p>The other half, in making The Good Data Mission come true: help you effectively own your data</p>
                            </li>                           
                        </ul>
                    </div>
                </div>
            </div>            

        </div>
    </div>
</section>



<script>

    $(document).ready(function(){

        $('.product-tabs ul li:first-child').click(function(){
            $('.product-content').css('border-left','5px solid #268dcc');
        });

        $('.product-tabs ul li:nth-child(2)').click(function(){
            $('.product-content').css('border-left','5px solid #ea6654');
        });

        $('.product-tabs ul li:nth-child(3)').click(function(){
            $('.product-content').css('border-left','5px solid #00567b');
        });

        $('.product-tabs ul li:last-child').click(function(){
            $('.product-content').css('border-left','5px solid #72bc81');
        });

    });

</script>


<!-- END main content -->

