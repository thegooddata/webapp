
<div id="tgd-page-title">
    <div class="container">
        <div class="row">
            <ul class="clearfix">
                <li><a href="/"><span class="fa fa-home"></span></a></li>
                <li><h2>Share purchase</h2></li>
            </ul>
        </div>
    </div>
</div> 
<div class="wrapper">
    <div id="tgd-page-content" class="container">
        <div class="row">
            <div class="col-sm-16 col-md-10 col-lg-10 tgd-no-horizontal-padding">
                <section id="descriptions">
                    <div>
                        <h2>Your membership application has been accepted!</h2>
                        <p>To comply with UK Industrial and Provident Society rules, you need to
                            buy one share of TheGoodData to become a full right member.</p>
                    </div>
                    <div class="clearfix">
                        <div class='text'>
                            But don't worry! it doesn't mean that you need to pay us anything if you
                            don't want to! To avoid payments we made up a work-around. A 1pence loan
                            that will be cancelled when you end our membership at no cost.
                        </div>
                        <div class="button">
                            <button class="btn loan" data-toggle="loan-agreement">show me the<br> 1p loan</button>
                        </div>
                    </div>
                    <div class="clearfix">
                        <div class="text">
                            Do you still want to pay us that 1 little pence?<br>
                            You can do it via Bitcoin.
                        </div>
                        <div class="button">
                            <button class="btn share" data-toggle="bitcoin-1p">buy my share<br>with bitcoins</button>
                        </div>
                    </div>
                    <div class="clearfix">
                        <div class='text'>
                            Are you a generous person that want to take the opportunity 
                            to support us with a donation? Don't be shy! We accept credit cards :)
                        </div>
                        <div class="button">
                            <button class="btn support" data-toggle="donation">support you<br>with a donation</button>
                        </div>
                    </div>
                    <div id="questions">
                        <a href="<?php echo Yii::app()->controller->createAbsoluteUrl("/site/faq")?>">Have questions?</a>
                    </div>
                </section>
            </div>
            <div class="col-sm-16 col-md-6 col-lg-6 tgd-no-horizontal-padding">
                <section id="form">
                    <div id="loan-agreement">
                        <h2>Loan Agreement</h2>
                        <p>For value received, borrower_name (the “Borrower”) at borrower_address, borrower_city, borrower_country promises to pay to the order of The Good Data Cooperative Ltd (the “Lender”) at Unit 1, 82 Clerkenwell Road, London UK, the sum of $0.01 with no interest.</p>
                        <ol type="I">
                            <li>
                                <h3>Destination of the amount lent</h3>
                                <p>
                                    The amount lent will be exclusively used for the purchase of one membership share of The Good Data Cooperative Ltd.
                                </p>
                            </li>
                            <li>
                                <h3>
                                    Terms of repayment
                                </h3>
                                <p>
                                    The amount lent shall be payable to the Lender in full on any future date on which the Borrower sells or transfers its membership share.
                                </p>
                            </li>
                            <li>
                                <h3>
                                    Security
                                </h3>
                                <p>
                                    This Note will be secured by the membership share of The Good data Cooperative Ltd to be purchased by the Borrower.
                                </p>
                            </li>
                            <li>
                                <h3>
                                    Default        
                                </h3>
                                <p>
                                    If any of the following events occur, this Note and any other obligations of the Borrower to the Lender, shall become due immediately, without demand or notice:
                                </p>
                                <ul>
                                    <li>
                                        <p>the absence of purchase by the Borrower of one membership share of The Good Data Cooperative Ltd. in the same event of the signature of this Loan agreement;</p>
                                    </li>
                                    <li>
                                        <p>the failure of the Borrower to pay the amount lent when due;</p>
                                    </li>
                                    <li>
                                        <p>the death or insolvency of the Borrower;</p>
                                    </li>
                                    <li>
                                        <p>the filing of bankruptcy of the Lender</p>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <h3>
                                    Governing law
                                </h3>
                                <p>
                                    This Note shall be construed in accordance to the English law 
                                </p>
                            </li>
                        </ol>

                        Signed by borrower_name
                        <br>
                        <br>
                        December 19th, 2013
                    </div>
                    <div id="donation">
                        <strong>Please choose a payment method</strong>
                        Are you a generous person that want to take the
                        opportunity to support us with a donation? don't be shy! 
                        We accept credit cards.
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
                            <button type="submit" class="btn btn-primary" disabled="disabled">pay with credit card <span class="fa fa-credit-card"></span></button>
                            <div class="form-separator"><span>or</span></div>
                            <button type="submit" class="btn btn-primary">pay with bitcoins <span class="fa fa-bitcoin"></span></button>
                        </form>
                    </div>
                    <div id="bitcoin-1p">
                        <strong>Make a 1-pence donation</strong>
                        Upon clicking the button below, you will be redirected to a Bitpay platform page, where you'll be able to complete the donation process 
                        using your Bitcoin wallet application and scanning a QR code or clicking on a "Pay with Bitcoin" button.
                        <form action="https://bitpay.com/checkout" method="post" >
                            <input type="hidden" name="action" value="checkout" />
                            <input type="hidden" name="posData" value="" />
                            <input type="hidden" name="data" value="i+8wYLNGk9LIgh913da5SgG/GA7jj8JhA0LTzmCuHJ2A1xPgE/JABmoEwVawN+bsp7DjS+An+ATbMzhpkB6ZHzuuKxHRHnjN2f785x2ENejcv/x1lXq06axFiaAMkw1o8T1uTY7O2UpV1zKo1R7mR5Hds9iiOgRLW9ZItMP7p0wa07EFcardTCTPaxq0Upv5p9eGF8pypHVvrNfvzMjhs3kLI4bf9X9hOwMrA0i898FVHQ+L66xstqBs2+6WDzUH" />
    <!--                        <input type="image" src="https://bitpay.com/img/donate-md.png" border="0" name="submit" alt="BitPay, the easy way to pay with bitcoins." >-->
                            <button type="submit" class="btn btn-primary">make a 1-pence donation <span class="fa fa-bitcoin"></span></button>
                        </form>
                    </div>
                </section>
            </div>
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
