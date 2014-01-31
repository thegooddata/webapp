<!DOCTYPE html>
<html dir="ltr">
    <head>
        <title>Early Access</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Early Access Email Forms">
        <meta name="keywords" content="Early Access">
        <script type="text/javascript" src="http://www.google.com/jsapi"></script>
        <script type="text/javascript">
            google.load("jquery", "1.7.1");
        </script>
        <script type="text/javascript">
            $(document).ready(function() {
                try {
                    // set focus on first form element
                    $(':input:visible:first').focus();
                    // set class 'odd' to even <li> elements in #archive-list
                    $('#archive-list li:even').addClass("odd");

                    $('.field-group, .field-group input, .field-group select').bind('click', function(event) {
                        if (event.type == 'click') {
                            if ($(this).hasClass('field-group')) {
                                var fg = $(this);
                                if ($(this).children('.datefield').length == 1) {
                                    // Do not select 1st input so date picker will work.
                                } else {
                                    $(this).find('input, select').slice(0, 1).focus();
                                }
                            } else {
                                var fg = $(this).parents('.field-group');
                                $(this).focus();
                            }
                            fg.not('.focused-field').addClass('focused-field').children('.field-help').slideDown('fast');
                            $('.focused-field').not(fg).removeClass('focused-field').children('.field-help').slideUp('fast');
                        }
                        event.stopPropagation();
                    });
                    // set handler for 'click' event on labels
                    $('label').bind('click', function(event) {
                        if (event.type == 'click') {
                            var fg = $(this).next();

                            if (fg.children('.datefield').length == 1) {
                                // Do not select 1st input so date picker will work.
                            } else {
                                fg.find('input, select').slice(0, 1).focus();
                            }
                            fg.not('.focused-field').addClass('focused-field').children('.field-help').slideDown('fast');
                            $('.focused-field').not(fg).removeClass('focused-field').children('.field-help').slideUp('fast');
                        }
                        event.stopPropagation();
                    });
                    // Allow select inputs to be width:auto up to 500px (because max-width doesn't work in IE7)
                    $("select").each(function() {
                        $(this).css("width", "auto");
                        if ($(this).width() > 500) {
                            $(this).css("width", "500px");
                        }
                    });

                } catch (e) {
                    console.log(e);
                }
            });
        </script>

        <script type="text/javascript" src="http://downloads.mailchimp.com/js/jquery.mailcheck.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                try {
                    var domains = ['hp.com', 'hotmail.co.uk',
                        'yahoo.co.uk', 'yahoo.com.tw', 'yahoo.com.au',
                        'yahoo.com.mx', 'gmail.com', 'hotmail.com', 'yahoo.com',
                        'aol.com', 'comcast.net', 'msn.com', 'seznam.cz',
                        'sbcglobal.net', 'live.com', 'bellsouth.net',
                        'hotmail.fr', 'verizon.net', 'mail.ru',
                        'btinternet.com', 'cox.net', 'yahoo.com.br',
                        'bigpond.com', 'att.net', 'yahoo.fr', 'mac.com',
                        'ymail.com', 'googlemail.com', 'earthlink.net',
                        'xtra.co.nz', 'me.com', 'yahoo.gr', 'walla.com',
                        'yahoo.es', 'charter.net', 'shaw.ca', 'live.nl',
                        'yahoo.ca', 'orange.fr', 'optonline.net', 'gmx.de',
                        'wanadoo.fr', 'optusnet.com.au', 'rogers.com',
                        'web.de', 'ntlworld.com', 'juno.com', 'yahoo.com.sg',
                        'rocketmail.com', 'yandex.ru', 'yahoo.co.in',
                        'centrum.cz', 'live.co.uk', 'sympatico.ca', 'libero.it',
                        'walla.co.il', 'bigpond.net.au', 'yahoo.com.hk',
                        'ig.com.br', 'live.com.au', 'free.fr', 'sky.com',
                        'uol.com.br', 'abv.bg', 'live.fr', 'terra.com.br',
                        'hotmail.it', 'tiscali.co.uk', 'rediffmail.com',
                        'aim.com', 'blueyonder.co.uk', 'telus.net',
                        'bol.com.br', 'hotmail.es', 'email.cz',
                        'windowslive.com', 'talktalk.net', 'home.nl',
                        't-online.de', 'yahoo.de', 'telenet.be', '163.com',
                        'embarqmail.com', 'windstream.net', 'roadrunner.com',
                        'bluewin.ch', 'skynet.be', 'laposte.net', 'yahoo.it',
                        'qq.com', 'live.dk', 'planet.nl', 'hetnet.nl',
                        'gmx.net', 'mindspring.com', 'rambler.ru',
                        'iinet.net.au', 'eircom.net', 'yahoo.com.ar', 'wp.pl',
                        'mail.com', 'emmis.com', 'hotmail.de', 'lireo.com',
                        'gmx.at', 'ukr.net', 'zol.co.zw'];
                    var tdomains = [];
                    $('#MERGE0').on('blur', function() {
                        $(this).mailcheck({
                            domains: domains,
                            topLevelDomains: tdomains,
                            suggested: function(element, suggestion) {
                                var msg = 'Hmm, did you mean ' + suggestion.full + '?';
                                if ($('#MERGE0_mailcheck').length > 0) {
                                    $('#MERGE0_mailcheck').html(msg);
                                } else {
                                    element.after('<div id="MERGE0_mailcheck" class="errorText">' + msg + '</div>');
                                }
                            },
                            empty: function(element) {
                                if ($('#MERGE0_mailcheck').length > 0) {
                                    $('#MERGE0_mailcheck').remove();
                                }
                                return;
                            }
                        });
                    });
                } catch (e) {
                    console.log(e);
                }
            });
        </script>
        

        <style type="text/css">

            .wrapper{

                margin:0 auto 10px auto;
                text-align:left;
            }
            .container{
                position:relative;
                margin:0;
                text-align:left;
            }

            label{
                float:none;
                clear:both;
                display:block;
                width:auto;
                margin-top:8px;
                text-align:left;
                font-weight:bold;
                position:relative;
            }
            .field-group{
                float:none;
                margin:3px 0 15px 0;
                padding:5px;
                border-style:solid;
                background:-moz-linear-gradient(top, rgba(255, 255, 255, 0), rgba(255, 255, 255, .25));
                background-image:-webkit-gradient(linear,left top,left bottom,color-stop(0, rgba(255, 255, 255, 0)),color-stop(1, rgba(255, 255, 255, .25)));
                filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#00ffffff', endColorstr='#3fffffff');
                -ms-filter:"progid:DXImageTransform.Microsoft.gradient(startColorstr='#00ffffff', endColorstr='#3fffffff')";
            }
            .field-group input{
                display:block;
                margin:0;
                padding:5px;
                border:0;
                background:none;
                width:98%;
                background-position:97% 50% !important;
            }

            .field-group label{
                clear:none;
            }

            .field-help{
                display:none;
                font-weight:normal;
                position:static;
                float:none;
                clear:both;
                margin:5px -5px -5px -5px;
                width:auto;
                padding:8px 10px;
                line-height:16px;
                font-size:12px;
                -moz-border-radius:0;
                border-radius:0;
                -webkit-border-radius:0;
            }
            .field-help .help{
                min-height:16px;
                text-decoration:none;
            }
            .field-group .feedback br{
                display:none;
            }
            .field-group .feedback div{
                margin:0 !important;
                padding:0 !important;
            }
            .indicates-required{
                text-align:right;
            }
            .indicates-required span{
                font-size:150%;
                font-weight:bold;
            }
            label .asterisk{
                position:absolute;
                top:36px;
                right:10px;
                font-size:30px;
            }
            .error,.errorText{
                margin:5px 0 0 0;
                padding:5px 10px;
            }
            .formstatus{
                margin-bottom:10px;
            }
            .alert{
                background:#e4f3d4;
                border:2px solid #5ca000;
                font-size:14px;
                color:#5ca000;
                margin:10px 0;
                padding:10px;
            }
            .alert a{
                color:#5ca000;
                text-decoration:underline;
            }

            .button,.button-small{
                display:inline-block;
                width:auto;
                white-space:nowrap;
                height:32px;
                margin:5px 5px 0 0;
                padding:0 22px;
                text-decoration:none;
                text-align:center;
                font-weight:bold;
                font-style:normal;
                font-size:15px;
                line-height:32px;
                cursor:pointer;
                border:0;
                -moz-border-radius:4px;
                border-radius:4px;
                -webkit-border-radius:4px;
                vertical-align:top;
            }
            .button-small{
                float:none;
                display:inline-block;
                height:auto;
                line-height:18px !important;
                padding:2px 15px !important;
                font-size:11px !important;
            }
            .button span{
                display:inline;
                
                text-decoration:none;
                font-weight:bold;
                font-style:normal;
                font-size:15px;
                line-height:32px;
                cursor:pointer;
                border:none;
            }

            .poweredWrapper{
                padding:20px 0;
                width:560px;
                margin:0 auto;
            }
            .poweredBy{
                display:block;
                text-align: center;
            }

            .clear{
                clear:both;
            }

            body{
                -webkit-text-size-adjust:none;
            }
            input{
                -webkit-appearance:none;
            }

            body,#bodyTable{
                background-color:#eeeeee;
            }
            .bodyContent{
                line-height:150%;
                font-size:18px;
                color:#1d5987;
                padding:20px;
            }
            a:link,a:active,a:visited,a{
                color:#336699;
            }
            .button:link,.button:active,.button:visited,.button,.button span,.button-small:link,.button-small:active,.button-small:visited,.button-small{
                background-color:#336699;
                color:#ffffff;
            }
            .button:hover,.button-small:hover{
                background-color:#1e5781;
                color:#ffffff;
            }
            label{
                line-height:150%;
                font-size:14px;
                color:#333333;
            }
            .field-group{
                background-color:#eeeeee;
                border-width:2px;
                border-color:#d0d0d0;
            }
            .field-group input,.field-group textarea{
                font-size:16px;
                color:#333333;
            }
            .asterisk{
                color:#cc6600;
            }
            .field-help{
                background-color:#dcdcdc;
                color:#000;
            }
            .error,.errorText{
                font-size:12px;
                color:#6b0505;
                background-color:#f4bfbf;
            }
            html[dir=rtl] .wrapper,html[dir=rtl] .container,html[dir=rtl] label{
                text-align:right !important;
            }

            html[dir=rtl] label .asterisk{
                right:auto;
                left:10px;
            }

            .modal-header{
                font-size: 19px;
                font-weight: bold;
            }
            @media (max-width: 601px){
                body{
                    width:100%;
                    -webkit-font-smoothing:antialiased;
                    padding:10px 0 0 0 !important;
                    min-width:300px !important;
                }

            }	@media (max-width: 601px){
                .wrapper,.poweredWrapper{
                    width:auto !important;
                    max-width:600px !important;
                    padding:0 10px;
                }

            }	@media (max-width: 601px){
                #templateContainer,#templateBody,#templateContainer table{
                    width:100% !important;
                    -moz-box-sizing:border-box;
                    -webkit-box-sizing:border-box;
                    box-sizing:border-box;
                }

            }</style></head>
    <body>
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="<?php echo Yii::app()->controller->createUrl("site/subscribelist"); ?>" method="POST">
                    <div class="modal-header">
                        <h2>Subscribe to our mailing list</h2>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">

                        <div class="wrapper" id="templateContainer">
                            <div id="templateBody" class="bodyContent">

                                <!-- welcome message -->

                                <div id="subscribeFormWelcome">
                                    <span>Enjoy your data!&nbsp;We are in private beta right now. Please submit your email and we will contact you shortly about joining the beta.</span><br>
                                    <br>
                                    <span>For frequent updates, follow us&nbsp;</span><a href="https://twitter.com/DataCoup">@thegooddata</a>

                                </div>

                                <div class="indicates-required"><span class="asterisk">*</span> indicates required</div>

                                <!-- form -->
                                <input type="hidden" name="u" value="c536df10462fb6afe72117895">
                                <input type="hidden" name="id" value="b5320da781">

                                <div id="mergeTable" class="mergeTable">
                                    <div class="mergeRow dojoDndItem mergeRow-email" id="mergeRow-0">
                                        <label for="MERGE0">Email Address <span class="req float-right fwl dim6 asterisk">*</span></label></label>
                                        <div class="field-group">
                                            <input type="email" autocapitalize="off" autocorrect="off" name="MERGE0" id="MERGE0" size="25" value="">
                                        </div>
                                    </div>
                                </div>

                                <!-- real people should not fill this in and expect good things -->
                                <div style="position: absolute; left: -5000px;"><input type="text" name="b_c536df10462fb6afe72117895_b5320da781" value=""></div>



                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Not now, thanks</button>
                        <button type="submit" class="btn btn-primary" name="submit">Subscribe to list</button>
                    </div>
                </form>

            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </body>
</html>
