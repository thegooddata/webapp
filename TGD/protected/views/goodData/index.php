    <div class="wrapper">
        <section id="notice">
            <div class="container">
                <div class="row">
                    <div class="col-sm-16 col-md-12 col-md-offset-2 col-lg-12 col-lg-offset-2 alert alert-warning alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <img src="<?php echo Yii::app()->theme->baseUrl; ?>/img/start.png"/> We've just started so we know that the following metrics are still negligible, but we wanted
                        to share them with you from the very beginning. We think company transparency
                        is a must to earn your collaboration.
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
                            <div class="subtext">Total Registered Members</div>
                        </div>
                        <div class="item">
                            <div class="amount monthly_queries_processed">0</div>
                            <div class="subtext">Monthly Queries Processed</div>
                        </div>
                        <div class="item">
                            <div class="amount monthly_queries_traded">0</div>
                            <div class="subtext">Monthly Queries Traded</div>
                        </div>
                        <div class="item">
                            <div class="amount total_money_earned">$0</div>
                            <div class="subtext">Total Money Earned</div>
                        </div>
                    </div>
                    <div id="investments" class="col-sm-4 col-md-4  col-md-offset-2 col-sm-offset-2">
                        <div class="title">
                            <h2>Good investments</h2>
                        </div>
                        <div class="item">
                            <div class="amount money_reserved">$0</div>
                            <div class="subtext">Money available for microloans</div>
                        </div>
                        <div class="item">
                            <div class="amount money_lent">$0</div>
                            <div class="subtext">Money Lent</div>
                        </div>
                        <div class="item">
                            <div class="amount money_repaid">$0</div>
                            <div class="subtext">Money Repaid</div>
                        </div>
                        <div class="item">
                            <div class="amount money_lost">$0</div>
                            <div class="subtext">Money Lost</div>
                        </div>
                        <div class="item">
                            <div class="amount outstanding_portfolio">$0</div>
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
                            <div class="subtext">Projects Paying-Back</div>
                        </div>
                        <div class="item">
                            <div class="amount projects_paid_back">0</div>
                            <div class="subtext">Projects Paid-Back</div>
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
                            <div class="col-1"><a target="_blank" href="<?php echo $loan->loan_url; ?>"><img src="<?php echo Yii::app()->baseUrl; ?>/uploads/<?php echo $loan->image; ?>" class="avatar"/><?php echo $loan->title_en; ?></a><div class="subtext"><?php echo $loan->activity; ?></div></div>
                            <div class="col-2"><img src="<?php echo Yii::app()->baseUrl; ?>/uploads/flags/<?php echo strtolower($loan->code); ?>.png" class="flag"/><?php echo $loan->country; ?><div class="subtext"><?php echo $loan->partner; ?></div></div>
                            <div class="col-3">$<?php echo $loan->amount; ?></div>
                            <div class="col-4"><?php echo $loan->term; ?> months</div>
                            <div class="col-5">$<?php echo $loan->contribution; ?><div class="subtext"><?php echo date('F d, Y', strtotime($loan->loan_date));?></div></div>
                            <div class="col-6">$<?php echo $loan->paidback; ?></div>
                            <div class="col-7"><?php echo $loan->status;?></div>                        
                        </div>
                        <?php } ?>
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
            $('.monthly_queries_processed').html(result.monthly_queries_processed);
            $('.monthly_queries_traded').html(result.monthly_queries_trade_processed);
            $('.total_money_earned').html("$"+result.total_money_earned);
        }, "json" );

        $.get( "<?php echo Yii::app()->createUrl('goodData/GoodInvestmentsData')?>", function( result ) {

            $('.money_reserved').html("$"+result.money_reserved);
            $('.money_lent').html("$"+result.money_lent);
            $('.money_repaid').html("$"+result.money_repaid);
            $('.money_lost').html("$"+result.money_lost);
            $('.outstanding_portfolio').html("$"+result.outstanding_portfolio);
        }, "json" );

        $.get( "<?php echo Yii::app()->createUrl('goodData/GoodProjectsData')?>", function( result ) {

            $('.countries_covered').html(result.loans_countries);
            $('.projects_funded').html(result.loans_count);
            $('.projects_paying_back').html(result.loans_paying_back_count);
            $('.projects_paid_back').html(result.loans_paid_back_count);
            $('.projects_at_lost').html(result.loans_lost_count);
        }, "json" );

        </script>
