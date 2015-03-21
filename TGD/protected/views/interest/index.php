<section id="notice">
    <div class="container">
        <div class="row">
            <div class="col-sm-16 col-md-12 col-md-offset-2 col-lg-12 col-lg-offset-2 alert alert-warning alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <?php if(empty($categories)) :?>
                    Here we will show you what data brokers and advertisers may think about you. To do so we would need to have access to your browsing history. To do so open the extension and set "Store navigation" option on.
                <?php else: ?>
                    These are the topics we think that you may be interested at based on your last 30 days browsing history. It may not be very different than what data brokers and advertisers think about you. In the future we will try to feed this footprint with other data sources. For that we would appreciate your support (link to donate page)
                <?php endif;?>
            </div>
        </div>
    </div>
</section>
<?php if(!empty($categories)) :?>
    <div  class="col-lg-4 col-md-4 col-sm-16">

        <section>
            <h2>You are interested at... <i class="glyphicon glyphicon-question-sign" data-content="These are the 3 broad categories you seem to be more interested at comparing to the rest of TheGoodData users" data-placement="right" data-toggle="popover"></i></h2>

            <div class="interest-border">
                <ul>
                    <?php
                    if(!empty($categories->interest)){
                        foreach ($categories->interest as $category) {
                            echo "<li class=\"interest-category-link\" data-id='$category->id'>$category->category</li>";
                        }
                    }
                    ?>
                </ul>
            </div>
        </section>

        <section>
            <h2>You are a fan of... <i class="glyphicon glyphicon-question-sign" data-content="These are the 5 topics you seem to be more interested at comparing to the rest of TheGoodData users" data-placement="right" data-toggle="popover"></i></h2>

            <div class="interest-border">
                <ul>
                    <?php
                    if(!empty($categories->fan)){
                        foreach ($categories->fan as $category) {
                            echo "<li class=\"interest-category-link\" data-id='$category->id'>$category->category</li>";
                        }
                    }
                    ?>
                </ul>
            </div>
        </section>
    </div>

    <div class="col-lg-12 col-md-12 col-sm-16">
        <section>
            <h2>Data view <i class="glyphicon glyphicon-question-sign" data-content="These are the 3 broad categories you seem to be more interested at comparing to the rest of TheGoodData users" data-placement="left" data-toggle="popover"></i></h2>

            <div class="interest-border">
                <div id="interest-chart">
                    <i class="fa fa-spinner fa-spin"></i>
                </div>
            </div>
        </section>
    </div>

    <div class="col-lg-16 col-md-16 col-sm-16">
        <div class="buttons clearfix margin">
            <a href="#" class="btn btn-primary pull-left delete_all">DELETE ALL DATA</a>
        </div>
        <div class="buttons clearfix margin">
            <a href="<?php echo Yii::app()->createUrl('donate/index'); ?>" class="btn btn-primary pull-left amend" data-content="We want you to help improving your digital footprint. In order to do so, we would appreciate your support (link to donate page)" data-placement="right" data-toggle="popover">AMEND</a>
        </div>
    </div>

    <script>
        $( document ).ready(function() {
            ratingChart(0);

            $(document).on('click','.interest-category-link',function() {
                ratingChart($(this).data('id'));
            });

            $(document).on('click','.delete_all',function() {
                if(!confirm('Are you sure that you want to delete all these items?')) return false;

                window.location.href = "<?php echo Yii::app()->createUrl('interest/deleteAll')?>";
            });


            $('.glyphicon-question-sign').popover({'animation': true, 'trigger': 'hover'});

            $('.amend').popover({'animation': true, 'trigger': 'hover'});
        });

        function ratingChart(id){
            $('#interest-chart').html('<i class="fa fa-spinner fa-spin"></i>');

            $.post( "<?php echo Yii::app()->createUrl('interest/rating')?>", {id: id}, function( result ) {

                $('#interest-chart').html(result);
                $('#interest-chart .table').removeClass('hide');

                setTimeout(function(){
                    $('#interest-chart .interest-bar').removeClass('nowidth');
                }, 100)

            }, "html" );
        };
    </script>
<?php endif; ?>
