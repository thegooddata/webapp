<div id="tgd-page-title">
    <div class="container">
        <div class="row">
            <h2>Membership resignation</h2>
        </div>
    </div>
</div> 

<section id="tgd-page-content">
    <div class="container">
        <div class="row">
            <section id="form" class="col-sm-16 col-md-8">

            <?php if ($success != ""):?>   
                <p class="alert alert-success"><?php echo $success; ?>
            <?php endif; ?>

            <?php if ($error != ""): ?>   
                <p class="alert alert-danger"><?php echo $error; ?>
            <?php endif; ?>

                <form id="resignation-form" action="<?php echo Yii::app()->controller->createAbsoluteUrl("/resignation"); ?>" method="POST">    
                    <div  class="form-group col-sm-16 col-md-16 col-lg-16">
                        <p>I want to Resign my Membership at The Good Data Cooperative Ltd.</p>
                        <label>Write your password to confirm resignation</label>
                        <input type="password" class="form-control" id="current-password" name="ResignationForm[password]">
                    </div>
                
                    <button type="submit" class="btn btn-primary">Resign my membership</button>
                    <button id="abort" class="btn">No! abort &amp; go back!</button>
                </form>
            </section>
            <section id="description" class="col-sm-16 col-md-7 col-lg-7">
                <p>Once you confirm that you want to resign your Membership at The Good Data Cooperative Ltd, all your usage data will be automatically deleted and your Membership terminated.</p>
                <p>We remind you that you bought one share of the company when becoming a Member. This share has to be sold back to us at the original price. In case that you requested us a loan to buy it, this loan will be automatically cancelled in exchange of getting your share back. If you did pay for your share when becoming a Member, you can request your money back by sending us your share number and payment details in the next three months to <a href="mailto:members@thegooddata.org">members@thegooddata.org</a>, otherwise we will consider that you have donated this amount.</p>
                <p>This operation cannot be undone. Please type in your password to confirm your identity</p>
             </section>
        </div>
    </div>
</section>

<script>
    $(function() {
        var sameSize = function() {
            var formSectionHeight = $('#form').innerHeight();
            var descriptionSectionHeight = $('#description').innerHeight();
            var highest = (formSectionHeight >= descriptionSectionHeight)?formSectionHeight:descriptionSectionHeight;
            $('#description, #form').innerHeight(highest);
        };

        setTimeout(function() {
            sameSize();
        }, 100);

        $('#abort').click(function(event){
            event.preventDefault();
            window.location.href="membership";
        });
    });
</script>
