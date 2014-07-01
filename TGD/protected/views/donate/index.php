
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

<script>
function create_donate_url(gateway, currency, amount) {
  <?php 

  $param = array(
      'transaction_id'=>$transaction_id,
      'type'=>DonateController::TYPE_DONATION,
      'status'=>DonateController::TRANSACTION_OK
  );
  
  $param_json=json_encode($param);
  $param_b64 = base64_encode($param_json);

  $url=Yii::app()->controller->createAbsoluteUrl('donate/?token='.$param_b64.'&gateway=[gateway]&currency=[currency]&amount=[amount]');

  ?>
  
  var url='<?php echo $url; ?>';
  
  url = url.replace("[gateway]",gateway);
  url = url.replace("[currency]",currency);
  url = url.replace("[amount]",amount);
  
  return url;
}
</script>

<?php if ($state == DonateController::RETURN_FROM_GATEWAY && $status == DonateController::TRANSACTION_OK) { ?>   
    <div class="alert alert-success">SUCCESS</div>
<?php } ?>

<?php if ($state == DonateController::RETURN_FROM_GATEWAY && $status == DonateController::TRANSACTION_ERROR) { ?>   
    <div class="alert alert-danger">
    <p>ERROR</p>
    <?php if (is_array($errors) && count($errors)): ?>
      <ul>
        <?php foreach ($errors as $error): ?>
          <li><?php echo $error; ?></li>
        <?php endforeach; ?>
      </ul>
    <?php endif; ?>
    </div>
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
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        <form id="donate_stripe_form" action="" method="post">
                            
                            <div class="form-group row">
                            
                                <div class="col-md-8 tgd-no-left-padding">
                                    <input class="form-control" name="amount" type="number" placeholder="Amount" value="10.00" />
                                </div>
                                
                                <div class="col-md-8 tgd-no-right-padding">
                                    <select class="form-control" name="currency">
                                        <option value="USD" selected="selected">USD</option>
                                        <option value="EUR">EUR</option>
                                        <option value="GBP">GBP</option>
                                    </select>
                                </div>
                                
                            </div>
                            
                            <button id="btnProceedDonationStripe" type="button" class="btn btn-primary">donate! <span class="fa fa-credit-card"></span></button>
                            
                            
                            <script src="https://checkout.stripe.com/checkout.js"></script>
                            <script>
                              var stripeHandler = StripeCheckout.configure({
                                key: '<?php echo Yii::app()->stripe->getPublishableKey(); ?>',
                                image: '/themes/tgd/img/logo-big.png',
                                token: function(token) {
                                  // Use the token to create the charge with a server-side script.
                                  // You can access the token ID with `token.id`
                                  // console.log(token);
                                  var $form=$('#donate_stripe_form');
                                  $form.append($('<input type="hidden" name="stripeToken" />').val(token.id));
                                  var amount=parseFloat($('#donate_stripe_form input[name="amount"]').val())*100;
                                  var currency=$('#donate_stripe_form select[name="currency"]').val();
                                  $form.attr('action', create_donate_url('stripe', currency, amount));
                                  $form.submit();
                                }
                              });
                            </script>
                            <?php
                            
                            $user=null;
                            if (!Yii::app()->user->isGuest) {
                              $user=Yii::app()->user->model(Yii::app()->user->id);
                            }

                            $stripeHandlerOptions=array(
                              'name'=>'The Good Data',
                              'description'=>'Make a donation',
                              'panelLabel'=>'Donate {{amount}}',
                            );
                            
                            if ($user != null) {
                              $stripeHandlerOptions['email']=$user->email;
                            }
                            
                            Yii::app()->clientScript->registerScript('stripe_checkout_button', "
                            $('#btnProceedDonationStripe').click(function () {
                            
                              var amount=$('#donate_stripe_form input[name=\"amount\"]').val();
                              amount=parseFloat(amount) * 100;
                              var currency=$('#donate_stripe_form select[name=\"currency\"]').val();
                              
                              var stripeHandlerOptions=".CJSON::encode($stripeHandlerOptions)."
                              stripeHandlerOptions.currency=currency;
                              stripeHandlerOptions.amount=amount;
                              
                              // Open Checkout with further options
                              stripeHandler.open(stripeHandlerOptions);

                            });
                            ");
                            ?>

                            
                        </form>
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                    </div>
                    <div id="bitcoin">
                        <strong>Choose a fair amount</strong>
                        Thanks for taking this generous decision. Use the form fields bellow
                        to specify a fair amount and the currency in which you wish to make the donation.
                        <form id="donate_bitcoin" action="https://bitpay.com/checkout" method="post" onsubmit="return bp.validateMobileCheckoutForm($('#donate_bitcoin'));">
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

                                $( "#btnProceedDonationBitcoin" ).click(function() {
                                    
                                   var currency=$('#currency').find(":selected").val();
                                   
                                   var amount=parseInt($('#amount').val()) * 100;

                                   $('#donate_bitcoin input:hidden[name="redirectURL"]').val(create_donate_url('bitcoin', currency, amount));

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
