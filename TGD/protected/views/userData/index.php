

                <div  class="col-lg-4 col-md-4 col-sm-16">

                    <!-- seniority -->

                    <section id="seniority">

                        <h2>Seniority<i class="glyphicon glyphicon-question-sign" id="seniority-help" data-content="There are 5 levels of seniority based on data shared, ownership status and particiation on company forums: Apprentice, Journeyman, Owner, Expert owner, Manager." data-placement="right" data-toggle="popover"></i></h2>

                        <div class="seniority apprentice">
                            <span><?php echo $queries_percentile_text;?></span>
                        </div>                                      

                        <div class="gray">
                            <p><b>You have contributed with <span class="green"><?php echo $queries_count; ?></span> pieces of data this month.</b></p>
                            <?php if ($queries_count==0) { ?>
                                <a class="" href="<?php echo Yii::app()->controller->createAbsoluteUrl("/site/faq#search_query_trade");?>">Why the extension does not trade the search queries I'm doing?</a>
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

                        <?php if (isset($_GET['browsing_pag'])) { ?>
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
                                            <!-- <th class="events">Events</th> -->
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
                                            <!-- <td class="events">3</td> -->
                                            <td class="sensitive-data checked"><a href="<?php echo Yii::app()->createUrl('userData/deleteQuery', array('queries_pag' => $queries_pag, 'id_query'=>$query->id))?>" class="glyphicon glyphicon-remove delete"></span></td> 
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
                                        <ul class="pagination">

                                            <?php

                                                if ($queries_pag !=0) {
                                            ?>  

                                            <!-- <li><a href="#" class="glyphicon glyphicon-arrow-left"></a></li> -->

                                            <?php

                                                }else{

                                            ?> 

                                            <!-- <li class="disabled"><a href="#" class="glyphicon glyphicon-arrow-left"></a></li> -->

                                            <?php

                                                }
                                                    
                                            ?> 

                                            <?php

                                            $num_pag = ceil($queries_total / $queries_size);
                                            
                                            for ($i=0; $i<$num_pag; $i++){
                                                $pag = $i+1;

                                                if ($i == $queries_pag)
                                                {
                                            ?>                                           
                                                <li class="active"><a href="#"><?php echo $pag; ?></a></li>

                                            <?php
                                                }
                                                else
                                                {
                                            ?>
                                                <li><a href="<?php echo Yii::app()->createUrl('userData/index', array('queries_pag' => $i))?>"><?php echo $pag; ?></a></li>
                                            <?php  
                                                }
                                            
                                            }
                                            
                                            ?>
                                            
                                            <?php

                                                if ($queries_pag ==$num_pag) {
                                            ?>  

                                            <!-- <li><a class="disabled"  href="#" class="glyphicon glyphicon-arrow-right"></a></li> -->

                                            <?php

                                                }else{

                                            ?> 

                                            <!-- <li><a href="#" class="glyphicon glyphicon-arrow-right"></a></li> -->

                                            <?php

                                                }
                                                    
                                            ?>

                                            
                                        </ul>

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
                                            <th class="events">Events</th>
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
                                            <?php foreach ($browsing_details[$browse->domain] as $browsing_detail) { ?>

                                            <tr class="child">
                                                <td class="query"><?php echo $browsing_detail->domain;?></td>
                                                <td class="engine"><?php echo (strlen($browsing_detail->url) > 45) ? substr($browsing_detail->url,0,45).'...' : $browsing_detail->url;?></td>
                                                <td class="date"><?php echo date_format(date_create($browsing_detail->created_at), 'Y-m-d H:i:s')?></td>
                                                <td class="events">1</td>
                                            </tr>

                                            <?php } ?>

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
                                        <ul class="pagination">
                                            <!-- <li class="disabled"><a href="#" class="glyphicon glyphicon-arrow-left"></a></li> -->

                                            <?php

                                            $num_pag = ceil($browsing_total / $browsing_size);
                                            
                                            for ($i=0; $i<$num_pag; $i++){
                                                $pag = $i+1;

                                                if ($i == $browsing_pag)
                                                {
                                            ?>                                           
                                                <li class="active"><a href="#"><?php echo $pag; ?></a></li>

                                            <?php
                                                }
                                                else
                                                {
                                            ?>
                                                <li><a href="<?php echo Yii::app()->createUrl('userData/index', array('browsing_pag' => $i))?>"><?php echo $pag; ?></a></li>
                                            <?php  
                                                }
                                            
                                            }
                                            
                                            ?>

                                            <!-- <li><a href="#" class="glyphicon glyphicon-arrow-right"></a></li> -->
                                        </ul>

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
                            if(!confirm('Are you sure you want to delete this item?')) return false;
                            return true;
                        });

                        $(document).on('click','.delete_all',function() {
                            if(!confirm('Are you sure you want to delete all this items?')) return false;
                            
                            
                            window.location.href = "<?php echo Yii::app()->createUrl('userData/deleteAllQueries',array('queries_pag' => $queries_pag))?>";

                        });

                        $(document).on('click','.delete_one',function() {
                            if(!confirm('Are you sure you want to delete all this items?')) return false;
                            
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
                    // Add "hanging" lines  
                    $('<div class="hanging"></div>').prependTo("tr.child > td:first-child");

                    // Expand / collapse behaviour
                    $('<span class="glyphicon glyphicon-plus"></span>').prependTo('table .collapsed').click(function() {
                        // change +/- label
                        $(this).toggleClass("glyphicon-plus glyphicon-minus");
                        // get parent tr
                        var $parentTr = $(this).parents("tr");
                        // handle lines visibility between rows
                        if ($(this).hasClass('glyphicon-plus')) {
                            $parentTr.find('td').removeAttr('style');
                        } else {
                            $parentTr.find('td').css({'border-bottom-color': 'white'});
                        }
                        // get next consecutive <tr>s with class "child"
                        var $children = getChildren($parentTr);
                        $children.fadeToggle().slice(0, -1).find('td').css({'border-bottom-color': 'white'});

                        function getChildren($parent) {
                            var $return = $();
                            var $currentTr = $parent;
                            var i = 0;
                            while ($currentTr.next().hasClass("child")) {
                                $return = $return.add($currentTr.next());
                                $currentTr = $currentTr.next();
                            }
                            return $return;
                        }
                    });
                </script>

