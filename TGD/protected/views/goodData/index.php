    <div class="wrapper">
        <section id="notice">
            <div class="container">
                <div class="row">
                    <div class="col-sm-16 col-md-12 col-md-offset-2 col-lg-12 col-lg-offset-2 alert alert-warning alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <img src="<?php echo Yii::app()->theme->baseUrl; ?>/img/start.png"/>Even though we’re really still at the starting line, we wanted to share our stats with you from the get-go. We believe that transparency is a must in order to ensure real collaboration. Have a look below to find out what we’ve been working on.
                    </div>
                </div>
            </div>
        </section>
        <section id="overview">
            <div class="container">

                <div class="row">
                    <div id="achievements" class="col-sm-4 col-md-4">
                        <div class="title">
                            <h2>Company achievements</h2>
                        </div>
                        <div class="item">
                            <div class="amount monthly_active_users">0</div>
                            <div class="subtext">Monthly Active Users</div>
                        </div>
                        <div class="item">
                            <div class="amount total_registered_members">0</div>
                            <div class="subtext">Registered Members</div>
                        </div>
                        <div class="item">
                            <div class="amount monthly_visits_stored">0</div>
                            <div class="subtext">Monthly Visits Stored</div>
                        </div>
                        <div class="item">
                            <div class="amount monthly_adtracks_blocked">0</div>
                            <div class="subtext">Monthly Threats Blocked</div>
                        </div>
                        <div class="item">
                            <div class="amount monthly_queries_traded">0</div>
                            <div class="subtext">Monthly Queries Traded</div>
                        </div>
                    </div>
                    <div id="investments" class="col-sm-4 col-md-4  col-md-offset-2 col-sm-offset-2">
                        <div class="title">
                            <h2>Good investments</h2>
                        </div>
                        <div class="item">
                            <div class="amount total_money_earned">$0</div>
                            <div class="subtext">Total Money earned</div>
                        </div>
                        <div class="item">
                            <div class="amount total_contribution">$0</div>
                            <div class="subtext">Money Lent</div>
                        </div>
                        <div class="item">
                            <div class="amount total_paidback">$0</div>
                            <div class="subtext">Money Repaid</div>
                        </div>
                        <div class="item">
                            <div class="amount total_lost">$0</div>
                            <div class="subtext">Money Lost</div>
                        </div>
                        <div class="item">
                            <div class="amount total_outstanding">$0</div>
                            <div class="subtext">Outstanding Portfolio</div>
                        </div>
                    </div>

                    <div id="projects" class="col-sm-4 col-md-4  col-md-offset-2 col-sm-offset-2">
                        <div class="title">
                            <h2>Good projects</h2>
                        </div>
                        <div class="item">
                            <div class="amount countries_covered">0</div>
                            <div class="subtext">Countries Covered</div>
                        </div>
                        <div class="item">
                            <div class="amount projects_funded">0</div>
                            <div class="subtext">Projects Funded</div>
                        </div>
                        <div class="item">
                            <div class="amount projects_paying_back">0</div>
                            <div class="subtext">Projects Paying Back</div>
                        </div>
                        <div class="item">
                            <div class="amount projects_paid_back">0</div>
                            <div class="subtext">Projects Paid Back</div>
                        </div>
                        <div class="item">
                            <div class="amount projects_at_lost">0</div>
                            <div class="subtext">Projects at Lost</div>
                        </div>
                    </div>
                </div>

            </div><!-- /.container -->
        </section>
        <section id="details">
            <div class="section-title">
                <div class="container">
                    <div class="row">
                        <h2>Project Details</h2>                        
                    </div>
                </div>            
            </div>
            <div id="table-header">
                <div class="container">
                    <div class="row">
                        <div class="col-1">Loan</div>
                        <div class="col-2">Country/Partner</div>
                        <div class="col-3">Loan Amount</div>
                        <div class="col-4">Loan Term</div>
                        <div class="col-5">We Loaned</div>
                        <div class="col-6">Paid Back</div>
                        <div class="col-7">Status</div>
                    </div>
                </div>
            </div>
            <div id="table-content">
                <div>
                    <div class="container">
                        <?php foreach ($loans as $loan) { ?>
                        <div class="row">
                            <div class="col-1"><a target="_blank" href="<?php echo $loan->loan_url; ?>">
                            <?php if(file_exists(Yii::app()->getBasePath()."/../uploads/".$loan->loan_identifier."-".$loan->image)): ?>
                                <img src="<?php echo Yii::app()->baseUrl."/uploads/".$loan->loan_identifier."-".$loan->image; ?>" class="avatar"/>
                            <?php elseif(file_exists(Yii::app()->getBasePath()."/../uploads/".$loan->image)): ?>
                                <img src="<?php echo Yii::app()->baseUrl."/uploads/".$loan->image; ?>" class="avatar"/>
                            <?php endif; ?>
                            <?php echo $loan->title_en; ?></a><div class="subtext"><?php echo $loan->activity; ?></div></div>
                            <div class="col-2"><img src="<?php echo Yii::app()->baseUrl; ?>/uploads/flags/<?php echo strtolower($loan->code); ?>.png" class="flag"/><?php echo $loan->country; ?><div class="subtext"><?php echo $loan->partner; ?></div></div>
                            <div class="col-3">$<?php echo number_format($loan->amount,2); ?></div>
                            <div class="col-4"><?php echo $loan->term; ?> months</div>
                            <div class="col-5">$<?php echo number_format($loan->contribution,2); ?><div class="subtext"><?php echo date('F d, Y', strtotime($loan->loan_date));?></div></div>
                            <div class="col-6">$<?php echo number_format($loan->paidback,2); ?></div>
                            <div class="col-7"><?php echo $loan->status;?></div>                        
                        </div>
                        <?php } ?>

                        <div class="row pager">
                            <div class="pull-right">
                                  
                                    <?php $this->widget('ext.TGDLinkPager', array(
                                        'header' => '',
                                        'cssFile' => false,
                                        'firstPageCssClass'=>'',
                                        'previousPageCssClass'=>'',
                                        'nextPageCssClass'=>'',
                                        'nextPageCssClass'=>'',
                                        'lastPageCssClass'=>'',
                                        'maxButtonCount'=>3,
                                        'showFirstAndLastPages'=>false,
                                        'showLastPageNumber'=>true,
                                        'prevPageLabel'=>'<i class="glyphicon glyphicon-arrow-left"></i>',
                                        'nextPageLabel'=>'<i class="glyphicon glyphicon-arrow-right"></i>',
                                        'htmlOptions'=>array(
                                            'class'=>'',
                                        ),
                                        'pages' => $loans_pages,
                                    )); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- <div class="container">
                <div class="row">
                    <ul class="pager">
                        <li class="previous disabled"><a href="#">&larr; Previous page</a></li>
                        <li class="next"><a href="#">Next page &rarr;</a></li>
                    </ul>
                </div>
            </div> -->
        </section>
    </div>       
        <script>
        $.get( "<?php echo Yii::app()->createUrl('goodData/CompanyAchievementsData')?>", function( result ) {

            $('.monthly_active_users').html(result.monthly_active_users);
            $('.total_registered_members').html(result.total_registered_members);
            $('.monthly_visits_stored').html(result.monthly_visits_stored);
            $('.monthly_adtracks_blocked').html(result.monthly_adtracks_blocked);
            $('.monthly_queries_traded').html(result.monthly_queries_trade_processed);
        }, "json" );

        $.get( "<?php echo Yii::app()->createUrl('goodData/GoodInvestmentsData')?>", function( result ) {
            $('.total_money_earned').html(result.total_money_earned);
            $('.total_contribution').html(result.total_contribution);
            $('.total_paidback').html(result.total_paidback);
            $('.total_lost').html(result.total_lost);
            $('.total_outstanding').html(result.total_outstanding);
        }, "json" );

        $.get( "<?php echo Yii::app()->createUrl('goodData/GoodProjectsData')?>", function( result ) {

            $('.countries_covered').html(result.loans_countries);
            $('.projects_funded').html(result.loans_count);
            $('.projects_paying_back').html(result.loans_paying_back_count);
            $('.projects_paid_back').html(result.loans_paid_back_count);
            $('.projects_at_lost').html(result.loans_lost_count);
        }, "json" );

        </script>
