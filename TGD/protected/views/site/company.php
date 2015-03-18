<!-- main content -->

<div class="wrapper">
    <section id="tgd-page-content">
        <div class="container">
            <div class="row">

                <section id="zidisha" class="mission tgd-box col-sm-16 col-md-8 col-lg-8">
                    <h2>Our Mission</h2>
                    <div class="title_head clearfix">
                        <h3>We help customers<br/> enjoy ownership of the <br/> data they produce</h3>
                    </div>                
                    <div class="title_desc">
                        <p>What does this mean? We show you the data your online activity creates, we help you control who has access to it and we make sure that when you allow it to be shared, your data is of maximum benefit to you and to the world.</p>
                        <p>We believe that, provided you have control over your own data, it can be a tool to improve the way the world works. Moreover, acting as the true owner of your data makes companies treat you as a real customer, not merely a user or a product.</p>
                    </div>
                </section>

                <section id="chango" class="values tgd-box col-sm-16 col-md-8 col-lg-8">
                    <h2>Our Values</h2>
                    <div class="title_head clearfix">
                        <h3>Social Good, <br/> collaboration and <br/> openness.</h3>
                    </div>  

                    <div class="title_desc">
                        <p>TheGoodData is not about helping you earn some pennies with your data, but about ensuring that you execise your rights as data owner and that its value returns to the society.</p>
                        <p>Our Mission is so challenging that the only way to make it happen is with the power of crowds. The collaboration of Customers and coders.</p>
                        <p>This is being done in a transparent, open way. You have access to all code and company info.</p>
                    </div>                
                </section>

                <section id="our_people" class="tgd-box col-sm-16 col-md-16 col-lg-16">
                    <h2>Our People</h2>
                    <div class="our_people tgd-box col-sm-16 col-md-8 col-lg-8"></div>
                    <div class="our_people_desc our_people_border tgd-box col-sm-16 col-md-8 col-lg-8">
                        <h4>The best way we know to ensure your collaboration and guarantee continued transparency is to make you the majority owners of TheGoodData. In doing so, our interests will always be aligned with yours, which means we’ll never sell out to another company so your data will always be safe with us.</h4>
                        <p>To ensure we have as many owners as possible, TheGoodData is incorporated as an English Industrial and Provident Society, which means you can apply for membership simply by using the service and registering with us. From that moment on, you’ll be kept up to date with company progress and you’ll be able to take part in major company decisions. If you don’t like something, you can change it!</p>
                    </div>
                    <div class="our_people_border tgd-box col-sm-16 col-md-16 col-lg-16">
                        <ul>
                            <li><span class="glyphicon glyphicon-stop" style="color:<?php echo $colors[6];?>"></span> Director</li>
                            <li><span class="glyphicon glyphicon-stop" style="color:<?php echo $colors[5];?>"></span> Collaborator</li>
                            <li><span class="glyphicon glyphicon-stop" style="color:<?php echo $colors[3];?>"></span> Member</li>
                        </ul>
                        <div class="our_people_avatars col-sm-16 col-md-16 col-lg-16">
                            <?php if(!empty($people)) : ?>
                                <?php foreach($people[0] as $key => $member) : ?>
                                    <div class="col-sm-4 col-md-3 col-lg-3">
                                        <?php
                                        $img = CHtml::image(Yii::app()->baseUrl."/uploads/avatars/".$member['id']."/thumb/".$member['avatar'], '', array('class'=>'thumbnail', 'style' => 'background-color:'.$colors[$member['seniority_level']]));
                                        if(empty($member['url']))
                                            echo $img;
                                        else
                                            echo CHtml::link($img, $member['url']);
                                        ?>
                                        <legend><?php echo $member['username'];?></legend>
                                    </div>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </div>
                        <?php if(!empty($people[1])){
                            echo '<div class="col-sm-16 col-md-16 col-lg-16"><span class="our_people_more" data="1">More</span></div>';
                        } ?>
                    </div>
                </section>
                    
            </div>
        </div>
    </section>
</div>
<script>
    var people = <?php echo json_encode($people); ?>;
    var colors = <?php echo json_encode($colors); ?>;

    $(document).on('click', '.our_people_more', function(){
        var i = $(this).attr('data');
        var html = '';

        $.each(people[i], function(key, data){
            if(data.url){
                html += '<div class="col-sm-4 col-md-3 col-lg-3">'+
                '<a href="'+ data.url +'"><img class="thumbnail" style="background-color:'+colors[data.seniority_level]+'" src="/uploads/avatars/'+ data.id +'/thumb/'+ data.avatar +'" alt=""></a>'+
                '</div>'+
                '<legend>data.username</legend>';
            }else{
                html += '<div class="col-sm-4 col-md-3 col-lg-3">'+
                '<img class="thumbnail"  style="background-color:'+colors[data.seniority_level]+'" src="/uploads/avatars/'+ data.id +'/thumb/'+ data.avatar +'" alt="">'+
                '</div>'+
                '<legend>data.username</legend>';
            }
        })

        $('.our_people_avatars').append(html);
        $('.our_people_more').attr('data', parseInt(i)+1)
    });

</script>