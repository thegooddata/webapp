    <div class="wrapper">
		<div class="container">
            <div class="row block-row">

                <!-- threats identified in your browser -->
                <section id="threats-identified" class="col-lg-6 col-md-6 col-sm-16">
                    <div>
                        <h2 class="no-bottom">Identified threats</h2>

                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#last-week" data-toggle="tab">1 week</a></li>
                            <li><a href="#last-month" data-toggle="tab">1 month</a></li>
                            <li><a href="#last-year" data-toggle="tab">1 year</a></li>
                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div class="tab-pane active chart clearfix" id="last-week">
                                <div class="clearfix no-bottom">
                                    <i class="fa fa-spinner fa-spin"></i>
                                    <div class="item">
                                        <span class="subtext">Total</span>
                                        <span class="amount adtracks">0</span>
                                    </div>
                                    <div class="item">
                                        <span class="amount small top">Top 5%</span>
                                        <span class="subtext">of all users this week</span>
                                    </div>

                                </div>
                                <div class="legend">
                                    <ul>
                                        <li class="first_day"></li>
                                        <li class="last_day"></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="tab-pane chart clearfix" id="last-month">
                                <div class="clearfix no-bottom">
                                    <i class="fa fa-spinner fa-spin"></i>
                                    <div class="item">
                                        <span class="subtext">Total</span>
                                        <span class="amount adtracks">0</span>
                                    </div>
                                    <div class="item">
                                        <span class="amount small top">Top 15%</span>
                                        <span class="subtext">of all users this month</span>
                                    </div>

                                </div>
                                <div class="legend">
                                    <ul>
                                        <li class="first_day"></li>
                                        <li class="last_day"></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="tab-pane chart clearfix" id="last-year">
                                <div class="clearfix no-bottom">
                                    <i class="fa fa-spinner fa-spin"></i>
                                    <div class="item">
                                        <span class="subtext">Total</span>
                                        <span class="amount adtracks">0</span>
                                    </div>
                                    <div class="item">
                                        <span class="amount small top">Top 20%</span>
                                        <span class="subtext">of all users this year</span>
                                    </div>

                                </div>
                                <div class="legend">
                                    <ul>
                                        <li class="first_day">June '13</li>
                                        <li class="last_day">May '14</li>
                                    </ul>
                                </div>
                            </div>
                        </div>



                    </div>                        
                </section>


                <section id="mix-threats" class="col-lg-10 col-md-10 col-sm-16">
                    <div>
                        <h2>Mix of threats</h2>
                        <div class="legend clearfix">
                            <div class="advertising"><span></span>Advertising</div>
                            <div class="analytics"><span></span>Analytics</div>
                            <div class="social"><span></span>Social Widgets</div>
                            <div class="others"><span></span>Content</div>
                        </div>
                        <div class="chart clearfix">
                            <i class="fa fa-spinner fa-spin"></i>
                            <div>You</div>
                            <div><img src="<?php echo Yii::app()->theme->baseUrl; ?>/img/logo-big.png"/></div>
                        </div>
                    </div>
                </section>
            </div>
            <div class="row block-row">
                <section id="threats-ranking" class="col-lg-6 col-md-6 col-sm-16">
                    <div>
                        <h2>Page rank by identified threats</h2>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Website</th>
                                    <th>Avg.threats</th>
                                    <th>Visits</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($adtracks as $adtrack) {?>
                                <tr>
                                    <td><?php echo $adtrack->domain; ?></td>
                                    <td><?php echo $adtrack->adtracks; ?></td>
                                    <td><?php echo $adtrack->visited; ?></td>
                                    <td><?php echo $adtrack->total; ?></td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </section>



                <!-- your risk profile -->
                <section id="risk-profile" class="col-lg-10 col-md-10 col-sm-16">
                    <div>
                        <h2>Your risk profile</h2>
                        <div class="row">
                            <div class="col-md-4 col-lg-4"><div class="square you mid-risk">You</div></div>
                            <div class="col-md-4 col-lg-4">
                                <i class="fa fa-spinner fa-spin"></i>
                                <span class="amount risk you">0</span>
                                <span class="subtext">Threats per page visited</span>
                            </div>
                            <div class="col-md-4 col-lg-4">
                                <i class="fa fa-spinner fa-spin"></i>
                                <span class="amount ratio you">0</span>
                                <span class="subtext">Percentage of threats allowed</span>
                            </div>
                            <div class="col-md-4 col-lg-4 risk-meter"></div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 col-lg-4"><div class="square tgd"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/img/logo-big.png"/></div></div>
                            <div class="col-md-4 col-lg-4">
                            <i class="fa fa-spinner fa-spin"></i>
                            <span class="amount risk average">0</span><span class="subtext">Threats per page visited</span></div>
                            <div class="col-md-4 col-lg-4">
                            <i class="fa fa-spinner fa-spin"></i>
                            <span class="amount ratio average">0</span><span class="subtext">Percentage of threats allowed</span></div>
                            <div class="col-md-4 col-lg-4"></div>
                        </div>
                    </div>

                </section>
            </div>
        </div>
    </div>
    
        <!-- Bootstrap core JavaScript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/Chart.min.js"></script>
        <script>

         

            var $canvasTargetWeek = $('#last-week .no-bottom'),
                $canvasTargetMonth = $('#last-month .no-bottom'),
                $canvasTargetYear = $('#last-year .no-bottom'),

                availableWidth = $canvasTargetWeek.innerWidth(),
                paddingLeft = (parseInt($canvasTargetWeek.css("paddingLeft").replace(/px/, ""))),
                paddingRight = (parseInt($canvasTargetWeek.css("paddingRight").replace(/px/, ""))),
                paddingHorizontal = paddingLeft + paddingRight,
                canvasSide = availableWidth - paddingHorizontal;


            $canvasTargetWeek.after('<canvas id="chart-threats-week"></canvas>');
            $('#chart-threats-week').attr('width', canvasSide).attr('height', '186px');

            $canvasTargetMonth.after('<canvas id="chart-threats-month"></canvas>');
            $('#chart-threats-month').attr('width', canvasSide).attr('height', '186px');

            $canvasTargetYear.after('<canvas id="chart-threats-year"></canvas>');
            $('#chart-threats-year').attr('width', canvasSide).attr('height', '186px');


            // Charts data
            var optionsThreats = {
                scaleShowLabels: false,
                scaleShowGridLines: false,
                barShowStroke: false,
                barValueSpacing : 1,
                tooltipCaretSize: 0,
                scaleLineColor: "rgba(0,0,0,0)",
                scaleGridLineColor: "rgba(0,0,0,0)"

            };
            
            // Bar chart
            $.get( "<?php echo Yii::app()->createUrl('evilData/DataThreatsWeek')?>", function( result ) {



                var dataThreatsWeek = {
                    labels: ["", "", "", "", "", "", ""],
                    datasets: [
                        {
                            fillColor: "rgb(252, 195, 74)",
                            strokeColor: "rgba(220,220,220,1)",
                            data: result.data
                        }
                    ]
                },
                    topBottom = 'Top',
                    $lastWeek = $('#last-week');

                $('#last-week .amount.adtracks').html(result.total);

                if (result.percentile > 50) {
                    result.percentile = 100 - result.percentile;
                    topBottom = 'Bottom';
                }

                $('.amount.small.top', $lastWeek).html(topBottom + ' ' + result.percentile + '%');
                $('.last_day', $lastWeek).html(result.last_day);
                $('.first_day', $lastWeek).html(result.first_day);
                
                var chartThreatsWeekCtx = $("#chart-threats-week").get(0).getContext("2d");
                var chartThreatsWeek = new Chart(chartThreatsWeekCtx).Bar(dataThreatsWeek, optionsThreats);              

                // hide spinner an show contents
                $('.fa-spinner', $lastWeek).hide();
                $('canvas', $lastWeek).css('visibility','visible');

            }, "json" );


            $.get( "<?php echo Yii::app()->createUrl('evilData/DataThreatsMonth')?>", function( result ) {

                var dataThreatsMonth = {
                    labels: ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""],
                    datasets: [
                        {
                            fillColor: "rgb(252, 195, 74)",
                            strokeColor: "rgba(220,220,220,1)",
                            data: result.data
                        }
                    ]
                },
                    topBottom = 'Top',
                    $lastMonth = $('#last-month');
                    
                $('.amount.adtracks', $lastMonth).html(result.total);

                $('.first_day', $lastMonth).html(result.first_day);
                $('.last_day', $lastMonth).html(result.last_day);

                if (result.percentile > 50) {
                    result.percentile = 100 - result.percentile;
                    topBottom = 'Bottom';
                }

                $('.amount.small.top', $lastMonth).html(topBottom + ' ' + result.percentile + '%');
                
                var chartThreatsMonthCtx = $("#chart-threats-month").get(0).getContext("2d");
                var chartThreatsMonth = new Chart(chartThreatsMonthCtx).Bar(dataThreatsMonth, optionsThreats);

                // hide spinner an show contents
                $('.fa-spinner', $lastMonth).hide();
                $('canvas', $lastMonth).css('visibility','visible');
               

            }, "json" );
            

            $.get( "<?php echo Yii::app()->createUrl('evilData/DataThreatsYear')?>", function( result ) {

                var dataThreatsYear = {
                    labels: ["", "", "", "", "", "", "", "", "", "", "", ""],
                    datasets: [
                        {
                            fillColor: "rgb(252, 195, 74)",
                            strokeColor: "rgba(220,220,220,1)",
                            data: result.data
                        }
                    ]
                },
                    topBottom = 'Top',
                    $lastYear = $('#last-year');
            
                $('.amount.adtracks', $lastYear).html(result.total);

                $('.last_day', $lastYear).html(result.last_day);
                $('.first_day', $lastYear).html(result.first_day);

                if (result.percentile > 50) {
                    result.percentile = 100 - result.percentile;
                    topBottom = 'Bottom';
                }

                $('.amount.small.top', $lastYear).html(topBottom + ' ' + result.percentile + '%');
                //$('#last-year .legend li').eq(0).html(months[oneYearAgoMonth] + ' ' + oneYearAgoYear);
                
                var chartThreatsYearCtx = $("#chart-threats-year").get(0).getContext("2d");
                var chartThreatsYear = new Chart(chartThreatsYearCtx).Bar(dataThreatsYear, optionsThreats);

                // hide spinner an show contents
                $('.fa-spinner', $lastYear).hide();
                $('canvas', $lastYear).css('visibility','visible');
               

            }, "json" );
            
            $.get( "<?php echo Yii::app()->createUrl('evilData/RiskRatios')?>", function( result ) {

                var risk_class = 'high-risk',
                    $riskProfile = $('#risk-profile');

               $('.amount.risk.you', $riskProfile).html(result.risk_you);

               switch (result.risk_level){
                    case 'low':
                        risk_class = 'low-risk';
                    break;
                    case 'mid':
                        risk_class = 'mid-risk';
                    break;
               }

               $('.risk-meter', $riskProfile).addClass(risk_class).html(result.risk_level_name);
               $('.amount.risk.average', $riskProfile).html(result.risk_average);

               $('.amount.ratio.you', $riskProfile).html(result.risk_ratio_you+"%");
               $('.amount.ratio.average', $riskProfile).html(result.risk_ratio_average+"%");

               // hide spinner an show contents
               $('.fa-spinner', $riskProfile).hide();
               $('span.you, span.average, .subtext, .risk-meter', $riskProfile).css('visibility','visible');
                
            }, "json" );

            // Donught charts

            var gap = 40,
                $canvasTarget = $('#mix-threats .chart'),
                availableWidth = $canvasTarget.innerWidth(),
                paddingLeft = (parseInt($canvasTarget.css("paddingLeft").replace(/px/, ""))),
                paddingRight = (parseInt($canvasTarget.css("paddingRight").replace(/px/, ""))),
                paddingHorizontal = paddingLeft + paddingRight,
                canvasSide = (availableWidth - paddingHorizontal - gap) / 2;
            
            $canvasTarget.append('<canvas id="chart-you"></canvas>', '<canvas id="chart-tgd"></canvas>');

            $('#chart-you').attr('width', canvasSide).attr('height', canvasSide).css("marginRight", (gap / 2) + "px");
            $('#chart-tgd').attr('width', canvasSide).attr('height', canvasSide).css("marginLeft", (gap / 2) + "px");

            $.get( "<?php echo Yii::app()->createUrl('evilData/AdtracksRatios')?>", function( result ) {
                var options = {tooltipTemplate: "<%if (label){%><%=label%><%}%>", tooltipCaretSize: 0,},              
                    dataYou =result.adtracks_you,
                    totalYou = 0,
                    dataTGD = result.adtracks_average,
                    totalAverage = 0;
                   

                // rearrange last two sections
                dataYou.splice(2, 0, dataYou.splice(3,1)[0]);
                
                for(index in dataYou){
                    totalYou += Number(dataYou[index].value);
                }

                for(index in dataYou){
                    dataYou[index].value = Number(dataYou[index].value);
                    dataYou[index].label = (dataYou[index].value * 100 /totalYou).toFixed(1) + "%";
                }

                // rearrange last two sections
                dataTGD.splice(2, 0, dataTGD.splice(3,1)[0]);

                for(index in dataTGD){
                    totalAverage += Number(dataTGD[index].value);
                }
                for(index in dataTGD){
                    dataTGD[index].value = Number(dataTGD[index].value);
                    dataTGD[index].label = (dataTGD[index].value * 100 /totalAverage).toFixed(1) + "%";
                }

                //Get context with jQuery - using jQuery's .get() method.
                var chartYouCtx = $("#chart-you").get(0).getContext("2d"),
                    chartTGDCtx = $("#chart-tgd").get(0).getContext("2d"),
                    chartYou = new Chart(chartYouCtx).Doughnut(dataYou, options),
                    chartTGD = new Chart(chartTGDCtx).Doughnut(dataTGD, options);

                // hide spinner an show hidden contents
                $('#mix-threats .fa-spinner').hide();
                $('#mix-threats .chart div').css('visibility','visible')
                $('#mix-threats canvas').css('visibility','visible');
               
            }, "json" );

        </script>