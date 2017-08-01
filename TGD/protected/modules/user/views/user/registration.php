
<div id="tgd-page-title">
    <div class="container">
        <div class="row">
            <h2>Become a member</h2>
        </div>
    </div>
</div> 

<div class="wrapper">
    <section id="tgd-page-content">
        <div class="container">
            <div class="row">
                <div id="registration-form-block" class="col-sm-16 col-md-10 col-lg-8">
                    <p>You don’t need to register in order to use TheGoodData 
                    browser extension, but if you want to become an owner/Member 
                    of TheGoodData Cooperative Ltd then we need some details in order 
                    to register you. Before filling this out, please ensure you’ve 
                    <a class="modal-trigger" href="javascript:void(0);" onclick="chrome.webstore.install('<?php echo Yii::app()->params['chromeExtensionUrl']; ?>',chromeInstallSuccess,chromeInstallFail); return false;">downloaded the browser extension</a>.</p>
                    <p>Once you’re a Member, you will be able to access company 
                    information, participate in our collaborative platform and 
                    take part in Annual General Meetings. You will also be able 
                    to elect, or be elected as, a company Director among other 
                    benefits.</p>
                    <p>It is vital that you enter the correct details below, as 
                    the information you provide will determine your legal rights 
                    as a cooperative Member.</p>

<?php if ($success != "") { ?>   
    <div class="alert alert-success"><?php echo $success; ?></div>
<?php } ?>

<?php if ($error != "") { ?>   
    <div class="alert alert-danger"><?php echo $error; ?></div>
<?php } ?>


                    <form method="POST" id="registration-form" action="<?php echo Yii::app()->controller->createAbsoluteUrl("/user/registration"); ?>">
                        <div class="row">
                            <div  class="form-group col-sm-16 col-md-8 col-lg-8">
                                <label>First name</label>
                                <input type="text" class="form-control" id="firstName" name="RegistrationForm[firstName]" value="<?php echo isset($registration_form['firstName']) ? $registration_form['firstName']:''; ?>">
                            </div>
                            <div class="form-group col-sm-16 col-md-8 col-lg-8">
                                <label>Last name</label>
                                <input type="text" class="form-control" id="lastName" name="RegistrationForm[lastName]" value="<?php echo isset($registration_form['lastName']) ? $registration_form['lastName']:''; ?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-sm-16 col-md-16 col-lg-16">
                                <label>Street name</label>
                                <input id="autocomplete" type="text" class="form-control address-search" name="RegistrationForm[streetName]" value="<?php echo isset($registration_form['streetName']) ? $registration_form['streetName']:''; ?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-sm-16 col-md-8 col-lg-8">
                                <label>Street number</label>
                                <input type="text" class="form-control" id="street_number" name="RegistrationForm[streetNumber]" value="<?php echo isset($registration_form['streetNumber']) ? $registration_form['streetNumber']:''; ?>">
                            </div>
                            <div class="form-group col-sm-16 col-md-8 col-lg-8">
                                <label>Street details </label><span class="pull-right">(optional)</span>
                                <input type="text" class="form-control" id="streetDetails" name="RegistrationForm[streetDetails]" value="<?php echo isset($registration_form['streetDetails']) ? $registration_form['streetDetails']:''; ?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-sm-16 col-md-8 col-lg-8">
                                <label>City</label>
                                <input type="text" class="form-control" id="locality" name="RegistrationForm[city]" value="<?php echo isset($registration_form['city']) ? $registration_form['city']:''; ?>">
                            </div>
                            <div class="form-group col-sm-16 col-md-8 col-lg-8">
                                <label>State/County  </label><span class="pull-right">(optional)</span>
                                <input type="text" class="form-control" id="administrative_area_level_1" name="RegistrationForm[stateCounty]" value="<?php echo isset($registration_form['stateCounty']) ? $registration_form['stateCounty']:''; ?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-sm-16 col-md-8 col-lg-8">
                                <label>Country</label>
                                <input type="text" class="form-control" id="country" name="RegistrationForm[country]" value="<?php echo isset($registration_form['country']) ? $registration_form['country']:''; ?>">
                                <input type="hidden" class="form-control" id="country_code" name="RegistrationForm[country_code]" value="<?php echo isset($registration_form['country_code']) ? $registration_form['country_code']:''; ?>">
                            </div>
                            <div class="form-group col-sm-16 col-md-8 col-lg-8">
                                <label>Post code</label>
                                <input type="text" class="form-control" id="postal_code" name="RegistrationForm[postCode]" value="<?php echo isset($registration_form['postCode']) ? $registration_form['postCode']:''; ?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-sm-16 split-3">
                                <label>Birth date</label>
                                <select  class="form-control" id="dayBirthday" name="RegistrationForm[dayBirthday]" >
                                    <option value="0">Day</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                    <option value="10">10</option>
                                    <option value="11">11</option>
                                    <option value="12">12</option>
                                    <option value="13">13</option>
                                    <option value="14">14</option>
                                    <option value="15">15</option>
                                    <option value="16">16</option>
                                    <option value="17">17</option>
                                    <option value="18">18</option>
                                    <option value="19">19</option>
                                    <option value="20">20</option>
                                    <option value="21">21</option>
                                    <option value="22">22</option>
                                    <option value="23">23</option>
                                    <option value="24">24</option>
                                    <option value="25">25</option>
                                    <option value="26">26</option>
                                    <option value="27">27</option>
                                    <option value="28">28</option>
                                    <option value="29">29</option>
                                    <option value="30">30</option>
                                    <option value="31">31</option>
                                </select>
                                <script>
                                    $(document ).ready(function() {
                                        $('#dayBirthday>option:eq(<?php echo isset($registration_form['dayBirthday']) ? $registration_form['dayBirthday']:'0'; ?>)').attr('selected', true);
                                    });
                                </script>
                            </div>
                            <div class="form-group col-sm-16 split-3">
                                <label>&nbsp;</label>
                                <select  class="form-control" id="monthBirthday" name="RegistrationForm[monthBirthday]" >
                                    <option value="0">Month</option>
                                    <option value="1">January</option>
                                    <option value="2">February</option>
                                    <option value="3">March</option>
                                    <option value="4">April</option>
                                    <option value="5">May</option>
                                    <option value="6">June</option>
                                    <option value="7">July</option>
                                    <option value="8">August</option>
                                    <option value="9">September</option>
                                    <option value="10">October</option>
                                    <option value="11">November</option>
                                    <option value="12">December</option>
                                </select>

                                <script>
                                    $(document ).ready(function() {
                                        $('#monthBirthday>option:eq(<?php echo isset($registration_form['monthBirthday']) ? $registration_form['monthBirthday']:'0'; ?>)').attr('selected', true);
                                    });
                                </script>
                            </div>
                            <div class="form-group col-sm-16 split-3">
                                <label>&nbsp;</label>
                                <select  class="form-control" id="yearBirthday" name="RegistrationForm[yearBirthday]" >
                                    <option value="0">Year</option>

                                </select>

                                <script>
                                    $(document ).ready(function() {

                                        var now = new Date().getFullYear(),
                                                to = now - 18,
                                                from = now - 100;

                                        for (; to > from; to -= 1) {
                                            if (to == '<?php echo isset($registration_form['yearBirthday']) ? $registration_form['yearBirthday']:'0'; ?>')
                                            {
                                                 $('<option selected>').appendTo('#yearBirthday').attr('value', to).html(to);
                                            }
                                            else
                                            {
                                                $('<option>').appendTo('#yearBirthday').attr('value', to).html(to);
                                            }  
                                        }

                                    });
                                </script>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-sm-16 col-md-8 col-lg-8 has-info has-feedback">
                                <label>Username</label>
                                <input type="text" class="form-control" id="userName" name="RegistrationForm[userName]" value="<?php echo isset($registration_form['userName']) ? $registration_form['userName']:''; ?>">
                                <span class="glyphicon glyphicon-question-sign form-control-feedback with-popover" data-toggle="popover" data-placement="top" data-content= "Once we register your personal details on our Membership Book, we will delete them from your account. From then on you will be treated by your username."></span>
                            </div>
                            <div class="form-group col-sm-16 col-md-8 col-lg-8 has-info has-feedback">
                                <label>Email</label>
                                <input type="email" class="form-control"  id="userEmail" name="RegistrationForm[userEmail]" value="<?php echo isset($registration_form['userEmail']) ? $registration_form['userEmail']:''; ?>">
                                <span class="glyphicon glyphicon-question-sign form-control-feedback with-popover" data-toggle="popover" data-placement="top" data-content= "Used for password recovery and infrequent legal communications as a company Member"></span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-sm-16 col-md-8 col-lg-8 has-info has-feedback">
                                <label>Password</label>
                                <input type="password" class="form-control"  id="password" name="RegistrationForm[password]" value="<?php echo isset($registration_form['password']) ? $registration_form['password']:''; ?>">
                                <span class="glyphicon glyphicon-question-sign form-control-feedback with-popover" data-toggle="popover" data-placement="top" data-content= "Password must be 8 to 32 characters long and include at least one letter and one number"></span>
                            </div>
                            <div class="form-group col-sm-16 col-md-8 col-lg-8">
                                <label>Confirm password</label>
                                <input type="password" class="form-control"  id="passwordConfirm" name="RegistrationForm[passwordConfirm]" value="<?php echo isset($registration_form['passwordConfirm']) ? $registration_form['passwordConfirm']:''; ?>">
                            </div>
                        </div>
                        <div class="form-group checkbox col-sm-16 col-md-16 co-lg-16">
                            <label>
                                <input type="checkbox" id="agree" name="RegistrationForm[agree]" value="agree"><span>I agree to the Company principles and rules</span>
                            </label>
                        </div>
                        <button type="submit" class="btn btn-primary">Apply for membership</button>
                    </form>
                </div>
                <div id="contract" class="col-sm-16 col-md-6 col-lg-8 legal" style="height: 898px;">
                    <div class="contract-container">
                        <div id="rules">
                            <h2>
                                Co-operative and Community Benefit Societies Act 2014<br>
                                Rules of<br>
                                The Good Data Cooperative Limited</h2>
                            <?php $this->renderPartial('//site/_company_rules'); ?>  
                        </div>
                        <hr/>
                        <div id="principles">
                            <h2>TheGoodData Principles</h2>
                            <div class="row">
                                <div class="title">Data Ownership</div>
                                <div class="description">People are the only owners of the data they produce. That means that they must be aware of its existence, that they can freely decide who should have access to it, and set the terms and benefits to be received in exchange. All these decisions should be presented to the people in an easy and meaningful way. </div>
                            </div>
                            <div class="row">
                                <div class="title">Optimism</div>
                                <div class="description">By ensuring Data ownership, Customers will be happier. They will gain freedom of choice, a more balanced position when dealing with Corporations, and a higher value in exchange of the Data they decide to share, if any. Data can be Good for Customers.</div>
                            </div>
                            <div class="row">
                                <div class="title">Collaboration</div>
                                <div class="description">Collaboration among customers is the only way to fully achieve Data ownership since Corporations and Administrations have many times colliding interests. TheGoodData is an expression of this collaboration. </div>
                            </div>
                            <div class="row">
                                <div class="title">Openness</div>
                                <div class="description">Openness facilitates collaboration of both Customers and Coders, and therefore the development of more and better products. TheGoodData will make its best effort to ensure that all its actions, decisions and assets are visible and open for participation.</div>
                            </div>
                            <div class="row">
                                <div class="title">Individual choice</div>
                                <div class="description">While being a collaborative initiative it's always upon the Customerto decide what to do as an individual with its own data. Individuals should therefore be always entitled to cease all relationship with TGD,export the data created and eliminate it from TheGoodData databases.</div>
                            </div>
                            <div class="row">
                                <div class="title">Protection</div>
                                <div class="description">Data ownership can only be assured with full Data protection. TheGoodData will always implement most robust legal and technical measures to ensure anonymity and avoid unwanted access to data by individuals, Corporations and Administration. TheGoodData expectsthat its Users and Members are diligent as well in this regard. </div>
                            </div>
                            <div class="row">
                                <div class="title">Social Good</div>
                                <div class="description">TheGoodData believes that its Mission can be achieved while doing some Good for the Society. Thus, it will always take intoconsideration the social impact of its actions.</div>
                            </div>
                        </div>
                    </div> <!-- end contract container -->

                </div>       
            </div>
        </div>
    </section>
</div>