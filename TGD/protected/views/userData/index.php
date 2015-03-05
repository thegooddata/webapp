
<div  class="col-lg-4 col-md-4 col-sm-16">

    <!-- seniority -->

    <section id="seniority">

        <h2>Seniority<i class="glyphicon glyphicon-question-sign" id="seniority-help" data-content="There are <?php echo $seniority_levels['count']; ?> levels of seniority based on data shared, ownership status and particiation on company forums:<?php echo $seniority_levels['levels']; ?>." data-placement="right" data-toggle="popover"></i></h2>

        <div class="seniority">
            <?php echo CHtml::image(Yii::app()->baseUrl."/uploads/seniority/".$queries_percentile_data['icon']); ?>
            <span style="color:<?php echo $queries_percentile_data['color'] ?>"><?php echo $queries_percentile_data['level'];?></span>
        </div>                                      

        <div class="gray">
            <p><b>You have contributed <span class="green"><?php echo $queries_count; ?></span> pieces of data this month.</b></p>
            <?php if ($queries_count==0) { ?>
                <a class="" href="<?php echo Yii::app()->controller->createAbsoluteUrl("/site/faq#search_query_trade");?>">Why are my search queries not being traded?</a>
            <?php } ?>
        </div>

    </section>

    <!-- END seniority -->

    <!-- warrant canary -->
</div>

<div class="col-lg-12 col-md-12 col-sm-16">
    <section id="data-table">
        <!-- Nav tabs -->
        <ul id="tabs" class="nav nav-tabs">
            <li class="active"><a href="#queries" data-toggle="tab">Non-sensitive search queries</a></li>
            <li><a id="sitesvisited" href="#sites" data-toggle="tab">Sites visited</a></li>                            
        </ul>

        <?php if (isset($_GET['tab']) && 'browsing'==$_GET['tab']) { ?>
        <script>
        $(function() {
            $('#sitesvisited').click();
        });
        </script>
        <?php } ?>

        <!-- Tab panes -->
        <div id="tabsContent" class="tab-content">
            <div class="tab-pane fade in active" id="queries">

                <table class="table">
                    <thead>
                        <tr>
                            <th class="query">Query</th>
                            <th class="engine">Engine</th>
                            <th class="date">Date</th>
                            <th class="traded">Traded</th>
                            <th class="sensitive-data">Is it sensitive?</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($queries as $query) { ?>
                        <?php //var_dump($query); ?>
                        <tr>
                            <td class="query"><?php echo urldecode(html_entity_decode($query->data));?></td>
                            <td class="engine"><?php echo $query->provider;?></td>
                            <td class="date"><?php echo date_format(date_create($query->created_at), 'Y-m-d H:i:s')?></td>
                            <td class="traded"><i class="fa fa-check <?php echo($query->share == 'true')?'yes':'';?>"></i></td>
                            <td class="sensitive-data checked"><a href="<?php echo Yii::app()->createUrl('userData/deleteQuery', array('queries_pag' => $queries_pag, 'id_query'=>$query->id))?>" class="glyphicon glyphicon-remove delete"></a></td> 
                        </tr>
                        <?php } ?>

                    </tbody>
                </table>
                <div class="pager gray clearfix">
                    <div class="pull-left">
                        <button type="button" class="btn btn-xs download">DOWNLOAD</button>
                       <button type="button" class="btn btn-xs delete_one">DELETE</button> 
                    </div>
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
                            'showFirstPageNumber' => true,
                            'showLastPageNumber'=>true,
                            'prevPageLabel'=>'<i class="glyphicon glyphicon-arrow-left"></i>',
                            'nextPageLabel'=>'<i class="glyphicon glyphicon-arrow-right"></i>',
                            'htmlOptions'=>array(
                                'class'=>'',
                            ),
                            'pages' => $queries_pages,
                        )); ?>
                      
                    </div>
                </div>
            </div><!-- tab-pane -->

            <div class="tab-pane fade" id="sites">
                <table class="table">
                    <thead>
                        <tr>
                            <th class="query">Domain</th>
                            <th class="engine">URL</th>
                            <th class="date">Date</th>
                            <th class="events">Visits</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($browsing as $browse) { ?>
                            <?php if ($browse->count > 1) { ?>
                            <tr>
                                <td class="collapsed query"><?php echo $browse->domain; ?></td>
                                <td class="engine">Multiple</td>
                                <td class="date">Multiple</td>
                                <td class="events"><?php echo $browse->count; ?></td>
                            </tr>

                            <?php } else { ?>
                            <tr>
                                <td class="query"><?php echo $browse->domain; ?></td>
                                <td class="engine"><?php echo (strlen($browsing_details[$browse->domain][0]->url) > 45) ? substr($browsing_details[$browse->domain][0]->url,0,45).'...' : $browsing_details[$browse->domain][0]->url;?></td>
                                <td class="date"><?php echo date_format(date_create($browsing_details[$browse->domain][0]->created_at), 'Y-m-d H:i:s')?></td>
                                <td class="events">1</td>
                            </tr>
                            <?php } ?>
                        <?php } ?>
                    </tbody>
                </table>
                <div class="pager gray clearfix">
                    <div class="pull-left">
                        <button type="button" class="btn btn-xs download">DOWNLOAD</button>
                        <button type="button" class="btn btn-xs delete_one">DELETE</button>
                    </div>
                    <div class="pull-right">
                    
                        <?php $this->widget('ext.TGDLinkPager', array(
                            'header' => '',
                            'cssFile' => false,
                            'firstPageCssClass'=>'',
                            'previousPageCssClass'=>'',
                            'nextPageCssClass'=>'',
                            'nextPageCssClass'=>'',
                            'lastPageCssClass'=>'',
                            'maxButtonCount'=>5,
                            'showFirstAndLastPages'=>false,
                            'showLastPageNumber'=>true,
                            'showFirstPageNumber' => true,
                            'prevPageLabel'=>'<i class="glyphicon glyphicon-arrow-left"></i>',
                            'nextPageLabel'=>'<i class="glyphicon glyphicon-arrow-right"></i>',
                            'htmlOptions'=>array(
                                'class'=>'',
                            ),
                            'pages' => $browsing_pages,
                        )); ?>

                    </div>
                </div>
            </div><!-- tab-pane -->
        </div><!-- tab-content -->
        <!-- row -->

        <div class="buttons clearfix">
            <a href="#" class="btn btn-primary pull-right delete_all">DELETE ALL DATA</a>
        </div>
    </section>
</div>

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->

<script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/Chart.min.js"></script>

<script>

    $( document ).ready(function() {


        $(document).on('click','.delete',function() {
            if(!confirm('Are you sure that you want to delete this item?')) return false;
            return true;
        });

        $(document).on('click','.delete_all',function() {
            if(!confirm('Are you sure that you want to delete all these items?')) return false;
            
            
            window.location.href = "<?php echo Yii::app()->createUrl('userData/deleteAllQueries',array('queries_pag' => $queries_pag))?>";

        });

        $(document).on('click','.delete_one',function() {
            if(!confirm('Are you sure that you want to delete all these items?')) return false;
            
            if ( $('#queries:visible').length > 0 ){
                window.location.href = "<?php echo Yii::app()->createUrl('userData/deleteQueries',array('queries_pag' => $queries_pag))?>";
            }
            else if ( $('#sites:visible').length > 0 ){
                window.location.href = "<?php echo Yii::app()->createUrl('userData/deleteBrowsing',array('browsing_pag' => $browsing_pag))?>";
            }

        });

        

        $('.download').click(function(){

            if ( $('#queries:visible').length > 0 ){
                window.location.href = "<?php echo Yii::app()->createUrl('userData/exportQueries')?>";
            }
            else if ( $('#sites:visible').length > 0 ){
                window.location.href = "<?php echo Yii::app()->createUrl('userData/exportBrowsing')?>";
            }
        }); 

                     
    });
        

    // Seniority help
    $('#seniority-help').popover({'animation': true, 'trigger': 'hover'});

    // activate tabs
    $('#tabs a').click(function(e) {
        e.preventDefault();
        $(this).tab('show');
    });

</script>

