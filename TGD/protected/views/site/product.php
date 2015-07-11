<!-- main content -->

<div class="wrapper">
    <section id="tgd-page-content">
        <div class="container">
            <div class="row product-container">
                <div class="col-xs-8 product-tabs" style="padding: 0;"> <!-- required for floating -->
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs tabs-left"><!-- 'tabs-right' for right tabs -->
                        <li class="active"><a href="#prevent" data-toggle="tab"><span>1</span>Our browser extension prevents data tracking</a></li>
                        <li><a href="#securely" data-toggle="tab"><span>2</span>We process your data securely</a></li>
                        <li><a href="#anonymous" data-toggle="tab"><span>3</span>We raise money thanks to your data</a></li>
                        <li><a href="#earnings" data-toggle="tab"><span>4</span>We reinvest our earnings for everybody’s benefit</a></li>
                    </ul>
                </div>

                <div class="col-xs-8 faq product-content">
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div class="tab-pane active blue_drop_list" id="prevent">
                            <ul class="clearfix">
                                <li>
                                    <p>Whenever you’re online, your activity is being traced by third-party web trackers, among others. Our extension blocks these digital spies so that no companies know more about you than you actively choose to tell them.</p>
                                </li>
                                <li>
                                    <p>Our extension lets you approve digital trackers as and when you may want or need to -  in order to see the full functionality of a site, for example.</p>
                                </li>
                                <li>
                                    <p>Our technology is completely open source and has been based on the <a href="https://github.com/disconnectme" target="_blank">disconnect.me</a> code.</p>
                                </li>
                            </ul>
                        </div>
                        <div class="tab-pane red_drop_list" id="securely">
                        
                            <ul class="clearfix">
                                <li>
                                    <p>If you give us permission, we anonymize and store your browsing history and search queries for a limited period of time (3 months).</p>
                                </li>
                                <li>
                                    <p>This valuable information will help us build reports identifying good and evil players in terms of online tracking. We will publish them as soon as we have enough volume of users.</p>
                                </li>
                                <li>
                                    <p>We never store any queries which contain sensitive terms - health, sexual, religious, political or financial scoring - so that you can rest easy about that.</p>
                                </li>
                                <li>
                                    <p>You can access or delete any of your stored information at any time.</p>
                                </li>                          
                            </ul>
                            <ul class="brief_desc clearfix">
                                <li>
                                    <h3>Security Rules</h3>
                                    <p>We do everything in our power to ensure your data is safe from hackers, companies and even public entities. We will implement all commercially feasible rules, processes and technologies to do so.</p>
                                    <img src="<?php echo Yii::app()->theme->baseUrl . '/img/secure_sheild.png';?>" alt="">
                                </li>
                                <li>
                                    <h3>Best Encryption Practices</h3>
                                    <p>ur encryption is top of the line. We leave nothing to chance - our measures include 256-bit AES encryption, forward secrecy (FS) cryptography and the use of HTTPS communications protocol - and have earned our QUALYS
                                        <a href="http://ssllabs.com/ssltest/analyze.html?d=thegooddata.org" target="_blank">A rate</a>
                                    </p>
                                    <img src="<?php echo Yii::app()->theme->baseUrl . '/img/encrypted_key.png';?>" alt="">
                                </li>
                                <li>
                                    <h3>Always Anonymous</h3>
                                    <p>f you provide us with any Personally Identifiable Information we will decouple it from your commercial usage data so that the two cannot be linked. We use  <a target="_blank" href="https://github.com/cloudflare/redoctober">military two-man encryption techniques</a> to do this, which ensures that your personal information is always safe even from our staff!</p>
                                    <img src="<?php echo Yii::app()->theme->baseUrl . '/img/anonymous.png';?>" alt="">
                                </li>
                            </ul>
                        </div>
                        <div class="tab-pane dark_blue_drop_list" id="anonymous">
                            <ul class="clearfix">
                                <li>
                                    <p>At this point we are not trading any anonymous browsing data anymore. Problems with Google Webstore have forced us to postpone this option until we manage a higher volume of users & traffic.</p>
                                </li>
                                <li>
                                    <p>In the meantime we are raising funds from private donors that are sponsoring our users care with their data without getting anything in exchange (no one access your data).</p>
                                </li>
                                <li>
                                    <p>We believe in data consent and respect. If you are interested in sponsoring or buying our users’ anonymized data you can contact us at: data@thegooddata.org</p>
                                </li>                                                       
                            </ul>
                        </div>
                        <div class="tab-pane green_drop_list" id="earnings">
                            <ul class="clearfix">
                                <li>
                                    <p>We reinvest 50% of the money raised in projects run in developing countries by Zidisha, the person-to-person microcredit leader.</p>
                                </li>
                                <li>
                                    <p>We invest the other 50% in developing new features for TheGoodData, protecting your data and ensuring our mission is on track.</p>
                                </li>                           
                            </ul>
                        </div>
                    </div>
                </div>            

            </div>
        </div>
    </section>
</div>


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

