
<div id="tgd-page-title">
    <div class="container">
        <div class="row">
            <ul class="clearfix">
                <li><a href="/"><span class="fa fa-home"></span></a></li>
                <li><h2>Donate</h2></li>
            </ul>
        </div>
    </div>
</div> 
<div id="tgd-page-content" class="container">
    <div class="row">
        <div class="col-sm-16 col-md-10 col-lg-10 tgd-no-horizontal-padding">
            <section id="descriptions">
                <div>
                    <h2>Please, support our mission!</h2>
                    <p>Are you a generous person that want to take the opportunity to support us with a donation? don't be shy! We accept credit cards and bitcoins. Every little help is apreciated.</p>
                </div>
                <div class="clearfix">
                    <div class='text'>
                        Click on this button if you wish to pay via credit card.
                    </div>
                    <div class="button">
                        <button class="btn credit-card disabled" data-toggle="credit-card">Donate with<br> credit card</button>
                    </div>
                </div>
                <div class="clearfix">
                    <div class="text">
                        We accept bitcoins as well. Click on this button if this
                        method is more of your liking.
                    </div>
                    <div class="button">
                        <button class="btn bitcoin" data-toggle="bitcoin">Donate with<br> bitcoins</button>
                    </div>
                </div>
                <div id="questions">
                    <a href="<?php echo Yii::app()->controller->createAbsoluteUrl("/site/faq") ?>">Have questions?</a>
                </div>
            </section>
        </div>
        <div class="col-sm-16 col-md-6 col-lg-6 tgd-no-horizontal-padding">
            <section id="form">
                <div id="credit-card">
                    <strong>Choose a fair amount</strong>
                    Thanks for taking this generous decision. Use the form fields bellow
                    to specify a fair amount and the currency in which you wish to make the donation.
                    <form id="donate" action="" method="post" onsubmit="return bp.validateMobileCheckoutForm($('#donate'));">
                        <input name="action" type="hidden" value="checkout">
                        <div class="form-group row">
                            <div class="col-md-8 tgd-no-left-padding">
                                <input class="form-control" name="price" type="number" placeholder="Amount" value="10.00" />
                            </div>
                            <div class="col-md-8 tgd-no-right-padding">
                                <select class="form-control" name="currency" value="" >
                                    <option value="USD" selected="selected">USD</option>
                                    <option value="BTC">BTC</option>
                                    <option value="EUR">EUR</option>
                                    <option value="GBP">GBP</option>
                                </select>
                            </div>
                        </div>                        
                        <button type="submit" class="btn btn-primary" disabled="disabled">donate! <span class="fa fa-credit-card"></span></button>
                    </form>
                </div>
                <div id="bitcoin">
                    <strong>Choose a fair amount</strong>
                    Thanks for taking this generous decision. Use the form fields bellow
                    to specify a fair amount and the currency in which you wish to make the donation.
                    <form id="donate" action="https://bitpay.com/checkout" method="post" onsubmit="return bp.validateMobileCheckoutForm($('#donate'));">
                        <input name="action" type="hidden" value="checkout">
                        <div class="form-group row">
                            <div class="col-md-8 tgd-no-left-padding">
                                <input class="form-control" name="price" type="number" placeholder="Amount" value="10.00" />
                            </div>
                            <div class="col-md-8 tgd-no-right-padding">
                                <select class="form-control" name="currency" value="" >
                                    <option value="USD" selected="selected">USD</option>
                                    <option value="BTC">BTC</option>
                                    <option value="EUR">EUR</option>
                                    <option value="GBP">GBP</option>
                                </select>
                            </div>
                        </div>

                        <input type="hidden" name="data" value="i+8wYLNGk9LIgh913da5SgG/GA7jj8JhA0LTzmCuHJ2A1xPgE/JABmoEwVawN+bsUjzwXKkU5syz/IelMYuZhsb5J6oKZ6n2CQ+hWvueNa4vp3vH7dx9PPgD5/KRTGkqSP568lr7CJ3UecrKSbQpBY0UT6wVK17gIVG98wp8Ld0hEcf0dFKpN/ZFk8T75wsDfnk0dCvnUnDOdEmdWS0aCg52y8OKJJzLNq+o2OaM8Kw=">
                        <button type="submit" class="btn btn-primary">donate <span class="fa fa-bitcoin"></span></button>
                    </form>
                </div>
            </section>
        </div>
    </div>
</div>
<script>
    $('#descriptions button').not(':disabled').click(function() {
        var targetId = '#' + $(this).data('toggle'),
                $target = $(targetId),
                $parent = $target.parent();

        if (!$target.is(':visible')) {
            // hide the rest
            $parent.children().not(targetId).hide();
            // show the target
            $target.show();
        }
    });
</script>
