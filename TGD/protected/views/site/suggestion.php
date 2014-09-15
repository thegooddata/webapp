
<div id="tgd-page-title">
    <div class="container">
        <div class="row">
            <h2>Suggestions</h2>
        </div>
    </div>
</div> 
<section id="tgd-page-content">
    <div class="container">
        <div class="row">
            <section id="form" class="tgd-box col-sm-16 col-md-7 col-md-offset-1">
              	<div class="form">
              	<?php echo $this->renderPartial('suggestion_ajax', array('model' => $model)); ?>
				</div><!-- form -->

            </section>
            <section id="description" class="tgd-box col-sm-16 col-md-7">
				<p>
				<!-- TODO: fill with description -->
				</p>
            </section>
        </div>
    </div>
</section>
<script>
    $(function() {
        var sameSize = function() {
            var formSectionHeight = $('#form').innerHeight();
            $('#description').innerHeight(formSectionHeight);
        };

        setTimeout(function() {
            sameSize();
        }, 100);
    });
</script>