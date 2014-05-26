
<!-- <div id="tgd-page-title">
    <div class="container">
        <div class="row">
            <ul class="clearfix">
                <li><a href="/"><span class="fa fa-home"></span></a></li>
                <li><h2>Donate</h2></li>
            </ul>
        </div>
    </div>
</div>  -->

<?php if ($state == DonateController::RETURN_FROM_GATEWAY && $status == DonateController::TRANSACTION_OK) { ?>   
    <div class="alert alert-success">SUCCESS</div>
<?php } ?>

<?php if ($state == DonateController::RETURN_FROM_GATEWAY && $status == DonateController::TRANSACTION_ERROR) { ?>   
    <div class="alert alert-danger">ERROR</div>
<?php } ?>

<div class="wrapper">
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
                            <button class="btn credit-card" data-toggle="credit-card">Donate with<br> credit card</button>
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
                                        <option value="EUR">EUR</option>
                                        <option value="GBP">GBP</option>
                                    </select>
                                </div>
                            </div>                        
                            <button type="submit" class="btn btn-primary">donate! <span class="fa fa-credit-card"></span></button>

                            
                        </form>
                    </div>
                    <div id="bitcoin">
                        <strong>Choose a fair amount</strong>
                        Thanks for taking this generous decision. Use the form fields bellow
                        to specify a fair amount and the currency in which you wish to make the donation.
                        <form id="donate_bitcoin" action="https://bitpay.com/checkout" method="post" onsubmit="return bp.validateMobileCheckoutForm($('#donate'));">
                            <input name="action" type="hidden" value="checkout">
                            <div class="form-group row">
                                <div class="col-md-8 tgd-no-left-padding">
                                    <input id="amount" class="form-control" name="price" type="number" placeholder="Amount" value="10.00" />
                                </div>
                                <div class="col-md-8 tgd-no-right-padding">
                                    <select id="currency" class="form-control" name="currency" value="aa" >
                                        <option value="USD" selected="selected">USD</option>
                                        <option value="BTC">BTC</option>
                                        <option value="EUR">EUR</option>
                                        <option value="GBP">GBP</option>
                                    </select>
                                </div>
                            </div>

                            <input type="hidden" name="redirectURL" value="" />
                            <input type="hidden" name="data" value="i+8wYLNGk9LIgh913da5SgG/GA7jj8JhA0LTzmCuHJ2A1xPgE/JABmoEwVawN+bsUjzwXKkU5syz/IelMYuZhsb5J6oKZ6n2CQ+hWvueNa4vp3vH7dx9PPgD5/KRTGkqSP568lr7CJ3UecrKSbQpBY0UT6wVK17gIVG98wp8Ld0hEcf0dFKpN/ZFk8T75wsDfnk0dCvnUnDOdEmdWS0aCg52y8OKJJzLNq+o2OaM8Kw=">
                            <button type="submit" id="btnProceedDonationBitcoin" class="btn btn-primary">donate <span class="fa fa-bitcoin"></span></button>

                            <script>
                            $( document ).ready(function() {

                                // $( "#btnProceedDonationCC" ).click(function() {
                                //    alert('CC');
                                //    return false;
                                // });

                                $( "#btnProceedDonationBitcoin" ).click(function() {
                                    
                                   $('#donate_bitcoin input:hidden[name="redirectURL"]').val('<?php 

                                    $param = array(
                                        'transaction_id'=>$transaction_id,
                                        'type'=>DonateController::TYPE_DONATION,
                                        'status'=>DonateController::TRANSACTION_OK
                                    );
                                    
                                    $param_json=json_encode($param);
                                    $param_b64 = base64_encode($param_json);

                                    echo Yii::app()->controller->createAbsoluteUrl('donate/?token='.$param_b64.'&currency=[currency]&amount=[amount]');

                                    ?>'); 

                                   var currency=$('#currency').find(":selected").val();
                                   
                                   var amount=parseInt($('#amount').val()) * 100;

                                   var redirectURL=$('#donate_bitcoin input:hidden[name="redirectURL"]').val();
                                   

                                   redirectURL = redirectURL.replace("[currency]",currency);
                                   redirectURL = redirectURL.replace("[amount]",amount);

                                   
                                   $('#donate_bitcoin input:hidden[name="redirectURL"]').val(redirectURL);

                                   
                                   
                                });
                            });
                            </script>
                        </form>
                    </div>
                </section>
            </div>
        </div>
    </div>
</div>
