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
                        <p>I want to resign my Membership of The Good Data Cooperative Ltd.</p>
                        <label>ENTER YOUR PASSWORD TO CONFIRM RESIGNATION</label>
                        <input type="password" class="form-control" id="current-password" name="ResignationForm[password]">
                    </div>
                
                    <button type="submit" class="btn btn-primary">Resign my membership</button>
                    <button id="abort" class="btn">No! abort &amp; go back!</button>
                </form>
            </section>
            <section id="description" class="col-sm-16 col-md-7 col-lg-7">
                <p>Once you’ve confirmed that you want to resign your Membership of TheGoodData Cooperative Ltd, your usage data will be automatically deleted and your Membership terminated. </p>
                <p>When you became a Member of TheGoodData you purchased one share of the company. In order for your membership to be terminated, this share must be sold back to the company at the original price paid. If you requested a loan from us to purchase your share, we will automatically cancel your loan in exchange for ownership of your share. If you paid for your share yourself when you became a Member, just send your share number and bank details to <a href="mailto:members@thegooddata.org">members@thegooddata.org</a> within three months of cancelling your membership and we will repay your 1 pence. If we don’t hear from you, we will assume that you have donated this amount to us.</p>
                <p>Please type in your password to confirm your identity. This operation cannot be undone.</p>
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
