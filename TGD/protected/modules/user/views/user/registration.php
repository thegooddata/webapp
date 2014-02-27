
<div id="tgd-page-title">
    <div class="container">
        <div class="row">
            <ul class="clearfix">
                <li><a href="<?php echo Yii::app()->controller->createAbsoluteUrl("/site/index"); ?>"><span class="fa fa-home"></span></a></li>
                <li><h2>Become a member</h2></li>
            </ul>
        </div>
    </div>
</div> 

 <?php if ($success != "") { ?>   
    <p>SUCCESS : <?php echo $success; ?>
<?php } ?>

<?php if ($error != "") { ?>   
    <p>ERROR : <?php echo $error; ?>
<?php } ?>


<section id="tgd-page-content">
    <div class="container">
        <div class="row">
            <div id="registration-form-block" class="col-sm-16 col-md-10 col-lg-10">
                <p>You can use TheGoodData extension without registration, 
                    but if you also want to become a Member of TheGoodData
                    Cooperative Ltd., you need to submit your personal 
                    details. To become a Member you must have used the
                    extension first.</p>
                <p>By becoming a member you have the right to access 
                    company data, participate in the collaborative platform
                    as well as in General Meetings, and elect or be elected 
                    as a company Director, among other rights.</p>
                <p>Note it is vital that you enter correct details, as 
                    it determines your legal rights as cooperative member.
                    You may be required later to send proof of ID.</p>



                <form method="POST" id="registration-form" action="<?php echo Yii::app()->controller->createAbsoluteUrl("/user/registration/registration"); ?>">
                    <div class="row">
                        <div  class="col-sm-16 col-md-8 col-lg-8">
                            <div class="form-group">
                                <label>First name</label>
                                <input type="text" class="form-control" id="firstName" name="RegistrationForm[firstName]" value="<?php echo isset($registration_form['firstName']) ? $registration_form['firstName']:''; ?>">
                            </div>
                        </div>
                        <div class="form-group col-sm-16 col-md-8 col-lg-8">
                            <label>Last name</label>
                            <input type="text" class="form-control" id="lastName" name="RegistrationForm[lastName]" value="<?php echo isset($registration_form['lastName']) ? $registration_form['lastName']:''; ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-sm-16 col-md-16 col-lg-16">
                            <label>Street name</label>
                            <input id="autocomplete" type="text" class="form-control" name="RegistrationForm[streetName]" value="<?php echo isset($registration_form['streetName']) ? $registration_form['streetName']:''; ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-sm-16 col-md-8 col-lg-8">
                            <label>Street number</label>
                            <input type="text" class="form-control" id="street_number" name="RegistrationForm[streetNumber]" value="<?php echo isset($registration_form['streetNumber']) ? $registration_form['streetNumber']:''; ?>">
                        </div>
                        <div class="form-group col-sm-16 col-md-8 col-lg-8">
                            <label>Street details</label>
                            <input type="text" class="form-control" id="streetDetails" name="RegistrationForm[streetDetails]" value="<?php echo isset($registration_form['streetDetails']) ? $registration_form['streetDetails']:''; ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-sm-16 col-md-8 col-lg-8">
                            <label>City</label>
                            <input type="text" class="form-control" id="locality" name="RegistrationForm[city]" value="<?php echo isset($registration_form['city']) ? $registration_form['city']:''; ?>">
                        </div>
                        <div class="form-group col-sm-16 col-md-8 col-lg-8">
                            <label>State/County</label>
                            <input type="text" class="form-control" id="administrative_area_level_1" name="RegistrationForm[stateCounty]" value="<?php echo isset($registration_form['stateCounty']) ? $registration_form['stateCounty']:''; ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-sm-16 col-md-8 col-lg-8">
                            <label>Country</label>
                            <input type="text" class="form-control" id="country" name="RegistrationForm[country]" value="<?php echo isset($registration_form['country']) ? $registration_form['country']:''; ?>">
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
                        </div>
                        <div class="form-group col-sm-16 split-3">
                            <label>&nbsp;</label>
                            <select  class="form-control" id="yearBirthday" name="RegistrationForm[yearBirthday]" >
                                <option value="0">Year</option>

                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-sm-16 col-md-8 col-lg-8 has-info has-feedback">
                            <label>Username</label>
                            <input type="text" class="form-control" id="userName" name="RegistrationForm[userName]" value="<?php echo isset($registration_form['userName']) ? $registration_form['userName']:''; ?>">
                            <span class="glyphicon glyphicon-question-sign form-control-feedback"></span>
                        </div>
                        <div class="form-group col-sm-16 col-md-8 col-lg-8 has-info has-feedback">
                            <label>Email</label>
                            <input type="email" class="form-control"  id="userEmail" name="RegistrationForm[userEmail]" value="<?php echo isset($registration_form['userEmail']) ? $registration_form['userEmail']:''; ?>">
                            <span class="glyphicon glyphicon-question-sign form-control-feedback"></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-sm-16 col-md-8 col-lg-8 has-info has-feedback">
                            <label>Password</label>
                            <input type="password" class="form-control"  id="password" name="RegistrationForm[password]" value="<?php echo isset($registration_form['password']) ? $registration_form['password']:''; ?>">
                            <span class="glyphicon glyphicon-question-sign form-control-feedback"></span>
                        </div>
                        <div class="form-group col-sm-16 col-md-8 col-lg-8">
                            <label>Confirm password</label>
                            <input type="password" class="form-control"  id="passwordConfirm" name="RegistrationForm[passwordConfirm]" value="<?php echo isset($registration_form['passwordConfirm']) ? $registration_form['passwordConfirm']:''; ?>">
                        </div>
                    </div>
                    <div class="form-group checkbox col-sm-16 col-md-16 co-lg-16">
                        <label>
                            <input type="checkbox" id="agree" name="RegistrationForm[agree]" value="agree"> I agree to the Company <a href="#">rules and principles</a>                                        
                        </label>
                    </div>
                    <button type="submit" class="btn btn-primary">Apply for membership</button>
                </form>
            </div>
            <div id="contract" class="col-sm-16 col-md-6 col-lg-6 legal" style="height: 898px;">
                <h2>
                    Industrial and Provident Societies Act 1965<br>
                    Rules of<br>
                    The Good Data Cooperative Limited</h2>
                <h3>NAME</h3>

                <ol>
                    <li value="1">
                        The name of the society shall be The Good Data Cooperative Limited. 
                    </li>
                </ol>


                <h3>REGISTERED OFFICE</h3> 

                <ol>
                    <li value="2">
                        The registered office of the society shall be at Unit 1, 82 Clerkenwell Road London    
                    </li>
                </ol>

                <h3>INTERPRETATIONS</h3>

                <ol>
                    <li value="3">
                        In these rules:

                        <p><strong>"Address"</strong> means a postal address or, for the purposes of electronic communication, 
                            a fax number, email address or telephone number for receiving text messages; </p>

                        <p><strong>"the Act"</strong> refers to the Industrial and Provident Societies Act 1965 or any Act or Acts 
                            amending or in substitution of it or them for the time being in force; </p>

                        <p><strong>"Auditor"</strong> means a person eligible for appointment as a company auditor under
                            section 25 of the Companies Act 1989;</p>

                        <p><strong>"The Board of Directors"</strong> or "Board" means all those persons appointed to perform 
                            the duties of directors of the society; </p>

                        <p><strong>"Board Meeting"</strong> includes, except where inconsistent with any legal obligation a 
                            physical meeting, a meeting held by electronic means and a meeting held by telephone;</p>

                        <p><strong>"Clear Days"</strong> in relation to the period of notice does not include the day on which the 
                            meeting is to be held and the day on which the notice is handed to someone or left at 
                            their Address, or the day on which it is sent, is in the process of being sent and is 
                            assumed to be delivered; </p>

                        <p><strong>"Co-operative"</strong> means the above-named society; </p>

                        <p><strong>"Co-operative Principles"</strong> are the principles defined in the International Co-operative 
                            Alliance Statement of Co-operative Identity. The principles are those of voluntary and 
                            open membership, democratic member control, member economic participation, 
                            autonomy and independence, education, training and information, co-operation among 
                            co-operatives and concern for the community; </p>

                        <p><strong>"Director"</strong> means a director of the Co-operative and includes any person occupying 
                            the position of director, by whatever name called; </p>

                        <p><strong>"Document"</strong> includes, unless otherwise stated, any document sent or supplied in electronic form;</p>

                        <p><strong>"Electronic Means"</strong> shall include, for example, email, video links and secure 
                            authenticated website transactions; </p>

                        <p><strong>"Employee"</strong> means anyone over the age of 16 holding a contract of employment with 
                            the Co-operative to perform at least eight hours of work per week for the Co-operative;</p>

                        <p><strong>"Extraordinary Resolution"</strong> means, unless the context requires otherwise, those 
                            decisions requiring an Extraordinary Resolution as detailed under ‘Resolutions’ in these rules;</p>

                        <p><strong>"Founder Member"</strong> means a subscriber to these rules for the purposes of registration;</p>

                        <p><strong>"Member"</strong> has the meaning as detailed under ‘Membership’ in these rules; </p>

                        <p><strong>"Office Holder"</strong> means a receiver, administrative receiver, liquidator, provisional 
                            liquidator or administrator of a Member of all or substantially all of the Member's assets;</p>

                        <p><strong>"Officer"</strong> has the meaning as detailed under ‘Officers’ in these rules; </p>

                        <p><strong>"Person"</strong> means, unless the context requires otherwise, a natural person, 
                            unincorporated body, firm, partnership, corporate body or the nominee of an 
                            unincorporated body, firm, partnership or corporate body; </p>

                        <p><strong>"Registrar"</strong> means the Financial Services Authority (FSA) or any body that succeeds its function;</p>

                        <p><strong>"Regulations"</strong> has the meaning as detailed under ‘Regulations’ in these rules; </p>

                        <p><strong>"Rules"</strong> means these Rules; </p>

                        <p><strong>"Secretary"</strong> means any person appointed to perform the duties of the Secretary of the Co-operative;</p>

                        <p><strong>"Transferable"</strong> means shares that are transferable to another Person who also 
                            qualifies for membership of the Co-operative in accordance with these Rules; </p>

                        <p><strong>"User"</strong> means those persons admitted into membership under these Rules that wish 
                            to use the services of the Co-operative and have agreed to pay any subscription or 
                            other sum due in respect of membership for the use of the Co-operative's services for 
                            a continuous period as decided by the Board from time to time; </p>

                        <p><strong>"Withdrawable"</strong> means shares with the associated right for the Member to withdraw 
                            and receive in return the value of their shares from the Co-operative in accordance 
                            with the provisions of these Rules; </p>

                        <p><strong>"Writing"</strong> means the representation or reproduction of words, symbols or other 
                            information in a visible form by any method or combination of methods, whether sent 
                            or supplied by Electronic Means or otherwise. </p>

                    </li>
                </ol>

                <h3>PURPOSE</h3>

                <ol>
                    <li value="4">
                        The purpose of the Co-operative is to carry out its function as a co-operative and to 
                        abide by the internationally recognised co-operative values and principles of 
                        co-operative identity as defined by the International Co-operative Alliance. This rule 
                        may only be amended by an Extraordinary Resolution. 
                    </li>
                </ol>

                <h3>OBJECTS</h3>

                <ol>
                    <li value="5">
                        The objects of the Co-operative shall be to carry on the business as a co-operative 
                        and to carry on any other trade, business or service and in particular to help 
                        Customers regain ownership of the data they produce. That implies supporting them 
                        identifying, gathering, producing, securing and/or processing the data that they directly 
                        or indirectly collaborate to generate, as well as supporting them keeping it private if the 
                        want, or trading with it or setting up services that trade with it in front of Corporations, 
                        Administrations or other Customers in exchange of a financial benefit and/or any other 
                        tangible or intangible benefit. 
                    </li>
                    <li value="6">
                        The Co-operative may do all such lawful things as may further the Co-operative's 
                        objects and, in particular, may borrow or raise funds for any purpose and on behalf of
                    </li>
                    <li value="7">
                        The Co-operative shall have the power to borrow money from its Members and others 
                        in order to further its objects providing that the amount outstanding at any one time 
                        shall not exceed £10,000,000. 
                    </li>
                    <li value="8">
                        The Co-operative shall have the power to mortgage or charge any of its property, 
                        including the assets and undertakings of the Co-operative, present and future, and to 
                        issue loan stock, debentures and other securities for money borrowed or for the 
                        performance of any contracts of the Co-operative or its customers or Persons having 
                        dealings with the Co-operative. 
                    </li>
                    <li value="9">
                        The rate of interest on money borrowed, except on money borrowed by way of bank 
                        loan or overdraft or from a finance house or on mortgage from a building society or 
                        local authority, shall not exceed 5% per annum or 2% above the Co-operative Bank’s 
                        base rate at the commencement of the loan, whichever is the greater. 
                    </li>
                    <li value="10">
                        The Co-operative may receive from any Person donations or loans free of interest in 
                        order to further its objects but shall not receive money on deposit. 
                        Borrowing from Members     
                    </li>
                    <li value="11">
                        In accordance with the Co-operative Principle of member economic participation the 
                        interest paid by the Co-operative on money borrowed from Members shall not exceed 
                        such rate as is necessary to attract and retain the capital required to further the 
                        Co-operative’s objects and purpose. 
                    </li>
                </ol>

                <h3>FINANCIAL SERVICES AND MARKETS ACT 2000 ACTIVITY </h3>

                <ol>
                    <li value="12">
                        For the avoidance of doubt the Co-operative shall not engage in any activity by virtue 
                        of any of these Rules that would require a permission from the Registrar to carry on 
                        that activity without first having applied for and obtained such permission. 
                    </li>
                </ol>

                <h3>INVESTMENT OF FUNDS</h3>

                <ol>
                    <li value="13">
                        The Co-operative may invest any part of its funds in the manner set out in Section 31 of the Act.
                    </li>
                    <li value="14">
                        The first Members of the Co-operative will be the Founder Members. The Co-
                        operative may admit to membership any individual, corporate body or nominee of 
                        an unincorporated body, firm or partnership that wishes to use the services of the Co-operative.
                    </li>
                    <li value="15">
                        In accordance with the Co-operative Principle of voluntary and open membership, 
                        whilst the Co-operative shall undertake to encourage its users to become Members 
                        membership must be voluntary.     
                    </li>
                    <li value="16">
                        In accordance with the Co-operative Principle of voluntary and open membership, 
                        whilst the Co-operative shall undertake to encourage its stakeholders to become 
                        Members, membership must be voluntary and as a result cannot be a condition of employment.
                    </li>
                </ol>

                <h3>Applications for Membership </h3>

                <ol>
                    <li value="17">
                        No natural person shall be admitted into membership of the Co-operative unless they 
                        have attained the age of 16. All those wishing to become a Member must support the 
                        objects of the Co-operative and complete an application for membership which shall 
                        include an application for at least one share in the Co-operative. Such an application 
                        form must be approved by the Directors and the Directors must approve each 
                        application for membership. 
                    </li>
                    <li value="18">
                        A corporate body which is a Member shall by resolution of its governing body appoint 
                        a representative who may during the continuance of her/his appointment be entitled to 
                        exercise all such rights and powers as the corporate body would exercise if it were an 
                        individual person. Each such corporate body Member shall supply notification in 
                        Writing to the Co-operative of its choice of representative. 
                    </li>
                </ol>

                <h3>Member Commitment</h3>

                <ol>
                    <li value="19">
                        All Members agree to attend general meetings and take an active interest in the 
                        operation and development of the Co-operative and its business. Members have a 
                        duty to respect the confidential nature of the business decisions of the Co-operative. 
                    </li>
                    <li value="20">
                        In accordance with the Co-operative Principle of education, training and information, 
                        the Co-operative shall provide potential Members with information about what the role 
                        of a Member is within the Co-operative and will provide training in the skills required to 
                        be a Member and to participate in the operation of the Co-operative. 
                    </li>
                    <li value="21">
                        The Co-operative shall provide ongoing education and training in co-operative values 
                        and principles and associated topics. The Co-operative shall support its Members by 
                        ensuring that general meetings are accessible and encourage participation. 
                    </li>
                </ol>

                <h3>Termination of Membership</h3>

                <ol>
                    <li value="22">
                        A Member shall cease to be a Member of the Co-operative immediately that they: 
                        <ol type="a">
                            <li>Are no longer eligible for membership; or </li>
                            <li>Fail to pay the annual subscription (if any) within 3 months of it falling due; or </li>
                            <li>Fail to hold the minimum shareholding; or </li>
                            <li>Resign in Writing to the Secretary; or </li>
                            <li>Are expelled from membership in accordance with these Rules; or </li>
                            <li>Die, are wound up or go into liquidation. </li>
                        </ol>
                    </li>
                </ol>

                <h3>Expulsion from Membership</h3>

                <ol>
                    <li value="23">
                        A Member may be expelled for conduct prejudicial to the Co operative by a 
                        Membership sub-committee (to be regulated by the Secondary Rules), provided that 
                        the grounds for expulsion have been specified in the notices calling the sub-committee 
                        meeting and that the Member whose expulsion is to be considered shall be given the 
                        opportunity to make representations to the meeting or, at the option of the Member, an 
                        individual who is there to represent them (who need not be a Member of the Co-
                        operative) has been allowed to make representations to the meeting. 
                    </li>
                    <li value="24">
                        If on due notice having been served the Member fails to attend the meeting the 
                        meeting may proceed in the Member's absence. 
                        <ol type="a">
                            <li>
                                An expelled Member shall be paid the nominal value of shares held by them at the time of expulsion.
                            </li>
                            <li>
                                No Member expelled from membership shall be re admitted except by a Resolution of the Membership sub-committee.
                            </li>
                        </ol>
                    </li>
                </ol>

                <h3>PROCEEDINGS ON DEATH OR BANKRUPTCY OF A MEMBER </h3>

                <ol>
                    <li value="25">
                        Upon a claim being made by: 
                        <ol type="a">
                            <li>The personal representative of a deceased Member; or </li>
                            <li>The trustee in bankruptcy of a Member who is bankrupt; or </li>
                            <li>The Office Holder to any property in the Co-operative belonging to such a 
                                Member, the Co-operative shall transfer or pay property to which the Office
                                Holder has become entitled as the Office Holder may direct them.</li>
                        </ol>                       
                    </li>
                    <li value="26">
                        A Member may in accordance with the Act nominate any individual or individuals to 
                        whom any of her/his property in the Co-operative at the time of her/his death shall be 
                        transferred, but such nomination shall only be valid to the extent of the amount for the 
                        time being allowed in the Act. On receiving a satisfactory proof of death of a Member 
                        who has made a nomination the Co-operative shall, in accordance with the Act, either 
                        transfer or pay the full value of the property comprised in the nomination to the 
                        individual or individuals entitled thereunder.         
                    </li>
                </ol>

                <h3>Share Capital</h3>

                <ol>
                    <li value="27">
                        The shares of the Co-operative shall be of the nominal value of £0.01 issued to 
                        Persons upon admission to membership of the Co-operative. The shares shall be fully 
                        paid prior to issue, neither Transferable nor Withdrawable, shall carry no right to 
                        interest, dividend or bonus, and shall be forfeited and cancelled on cessation of 
                        membership from whatever cause, and the amount paid up on such cancelled shares 
                        shall become the property of the Co-operative. Each Member shall hold one share 
                        only in the Co-operative. 
                    </li>
                </ol>

                <h3>GENERAL MEETINGS</h3>

                <ol>
                    <li value="28">
                        The Co-operative shall, within six months of the end of the financial year, hold a 
                        general meeting of the Members as its annual general meeting and shall specify the 
                        meeting as such in the notices calling it. 
                    </li>
                    <li value="29">
                        The business of an annual general meeting shall comprise, where appropriate: 
                        <ol type="a">
                            <li>The receipt of the accounts and balance sheet and of the reports of the Board and Auditor (if any).</li>
                            <li>The appointment of an Auditor, if required. </li>
                            <li>The election of the Board or the results of the election if held previously by ballot.</li>
                            <li>The application of profits. </li>
                            <li>The transaction of any other business included in the notice convening the meeting.</li>
                        </ol>                           
                    </li>
                    <li value="30">
                        In accordance with the Co-operative Principle of democratic member control, the Co-
                        operative shall ensure that, in addition to the annual general meeting, it will facilitate 
                        constant electronic means to ensure that Members are given the opportunity to 
                        participate in the decision making process of the Co-operative, review the business 
                        planning and management processes and to ensure the Co-operative manages itself 
                        in accordance with the co-operative values and principles. 
                    </li>
                </ol>

                <h3>Calling a General Meeting</h3>

                <ol>
                    <li value="31">
                        The Secretary, at the request of the Board of Directors may convene a general 
                        meeting of the Co-operative. The purpose of the general meeting shall be stated in 
                        the notice of the meeting. 
                    </li>
                    <li value="32">
                        The Board of Directors upon an application signed by one-tenth of the total number of 
                        Members, or 100 Members, whichever is the lesser, delivered to the registered office 
                        of the Co-operative, shall convene a general meeting. The purpose of the general 
                        meeting shall be stated in the application for and notice of the meeting. No business 
                        other than that stated in the notice of the meeting shall be conducted at the meeting. 
                    </li>
                    <li value="33">
                        If within one month from the date of the receipt of the application the Board have not 
                        convened a general meeting to be held within six weeks of the application, any three 
                        Members of the Co-operative acting on behalf of the signatories to the application may 
                        convene a general meeting, and shall be reimbursed by the Co-operative for any costs 
                        incurred in convening such a meeting. 
                    </li>
                </ol>

                <h3>Notices</h3>

                <ol>
                    <li value="34">
                        The Directors shall call the annual general meeting giving 14 Clear Days’ notice to all 
                        Members. All other general meetings shall be convened with at least 14 Clear Days’ 
                        notice but may be held at shorter notice if so agreed in Writing by 90% of the Members.
                    </li>
                    <li value="35">
                        Notices of meetings shall either be given to Members personally or sent to them at 
                        their Address or alternatively, if so agreed by the Co-operative in general meeting, 
                        notices of general meetings may be displayed conspicuously at the registered office 
                        and in all other places of business of the Co-operative to which Members have 
                        access. Notices shall specify the date, time and place at which the meeting is to be 
                        held, and the business which is to be transacted at that meeting. A general meeting 
                        shall not transact any business other than that specified in the notices calling the meeting.
                    </li>
                    <li value="36">
                        A notice sent to a Member's Address shall be deemed to have been duly served 48 
                        hours after its posting. The accidental omission to send any notice to or the 
                        non-receipt of any notice by any Person entitled to receive notice shall not invalidate 
                        the proceedings at the meeting. 
                    </li>
                    <li value="37">
                        All notices shall specify the date, time and place of the meeting along with the general 
                        nature of business to be conducted and any proposed resolutions.     
                    </li>
                    <li value="38">
                        If the Co-operative has appointed an Auditor in accordance with these Rules they shall 
                        be entitled to attend general meetings of the Co-operative and to receive all notices of 
                        and communications relating to any general meeting which any Member of the 
                        Co-operative is entitled to receive. The Auditor shall be entitled to be heard at any 
                        meeting on any part of the business of the meeting which is of proper concern to an Auditor.
                    </li>
                </ol>

                <h3>Quorum</h3>

                <ol>
                    <li value="39">
                        No business shall be transacted at a general meeting unless a quorum of Members is 
                        present, including those not present in Person. Unless amended by Extraordinary 
                        Resolution, a quorum shall be 3 Members or 25% of the membership, whichever is the greater.    
                    </li>
                </ol>

                <h3>Chairing General Meetings</h3>

                <ol>
                    <li value="40">
                        The chairperson of the Co-operative shall facilitate general meetings. If s/he is absent 
                        or unwilling to act at the time any meeting proceeds to business then the Members 
                        present shall choose one of their number to be the chairperson for that meeting. 
                        Attendance and Speaking at General Meetings 
                    </li>
                    <li value="41">
                        A Member is able to exercise the right to speak at a general meeting and is deemed to 
                        be in attendance when that Person is in a position to communicate to all those 
                        attending the meeting. The Directors may make whatever arrangements they consider 
                        appropriate to enable those attending a general meeting to exercise their rights to 
                        speak or vote at it including by Electronic Means. In determining attendance at a 
                        general meeting, it is immaterial whether any two or more Members attending are in 
                        the same place as each other, provided that they are able to communicate with each other.
                    </li>
                    <li value="42">
                        The chairperson of the meeting may permit other persons who are not Members of the 
                        Co-operative to attend and speak at general meetings, without granting any voting rights.
                    </li>
                    <li value="43">
                        If a quorum is not present within half an hour of the time the general meeting was due 
                        to commence, or if during a meeting a quorum ceases to be present, the chairperson 
                        must adjourn the meeting. If within half an hour of the time the adjourned meeting was 
                        due to commence a quorum is not present, the Members present shall constitute a quorum.
                    </li>
                    <li value="44">
                        The chairperson of a general meeting may adjourn the meeting whilst a quorum is present if:
                        <ol type="a">
                            <li>
                                The meeting consents to that adjournment; or 
                            </li>
                            <li>It appears to the chairperson that an adjournment is necessary to protect the 
                                safety of any persons attending the meeting or to ensure that the business of the 
                                meeting is conducted in an orderly manner. </li>
                        </ol>
                    </li>
                    <li value="45">
                        The chairperson must adjourn the meeting if directed to do so by the meeting. 
                    </li>
                    <li value="46">
                        When adjourning a meeting the chairperson must specify the date, time and place to 
                        which it will stand adjourned or that the meeting is to continue at a date, time and 
                        place to be fixed by the Directors. 
                    </li>
                    <li value="47">
                        If the meeting is adjourned for 14 days or more, at least 7 Clear Days’ notice of the 
                        adjourned meeting shall be given in the same manner as the notice of the original meeting.
                    </li>
                    <li value="48">
                        No business shall be transacted at an adjourned meeting other than business which 
                        could properly have been transacted at the meeting if the adjournment had not taken place.
                    </li>
                </ol>

                <h3>Voting</h3>

                <ol>
                    <li value="49">
                        In accordance with the Co-operative Principle of democratic member control, each 
                        Member shall have one vote on any question to be decided in general meeting. 
                    </li>
                    <li value="50">
                        A resolution put to the vote at a general meeting shall be decided on a show of hands 
                        unless a paper ballot is demanded in accordance with these Rules. A declaration by 
                        the chair that a resolution has on a show of hands been carried or lost with an entry to 
                        that effect recorded in the minutes of the general meeting shall be conclusive evidence 
                        of the result. Proportions or numbers of votes in favour for or against need not be recorded.
                    </li>
                    <li value="51">
                        In the case of an equality of votes, whether on a show of hands or a poll, the 
                        chairperson shall not have a second or casting vote and the resolution shall be 
                        deemed to have been lost. 
                    </li>
                </ol>

                <h3>Paper Ballot</h3>

                <ol>
                    <li value="52">
                        A paper ballot on a resolution may be demanded before or on the declaration of the 
                        result of the show of hands by three Members at a general meeting. 
                    </li>
                    <li value="53">
                        If a paper ballot is duly demanded it shall be taken in such a manner as the 
                        chairperson directs, provided that no Member shall have more than one vote, and the 
                        result of the ballot shall be deemed to be the resolution of the meeting at which the 
                        ballot was demanded. 
                    </li>
                    <li value="54">
                        The demand for a paper ballot shall not prevent the continuance of a meeting for the 
                        transaction of any other business than the question upon which a ballot has been 
                        demanded. The demand for a paper ballot may be withdrawn. 
                    </li>
                </ol>

                <h3>Resolutions</h3>

                <ol>
                    <li value="55">
                        Decisions at general meetings shall be made by passing resolutions:
                        <ol type="a">
                            <li>
                                The following decisions must be made by Extraordinary Resolution: 
                                <ol type="i">
                                    <li>
                                        Decisions to expel Members; 
                                    </li>
                                    <li>
                                        Decisions to dispose of assets of the Co-operative equivalent in value to 
                                        one-third of the Co-operative’s last published balance sheet, as detailed in 
                                        these Rules; 
                                    </li>
                                    <li>
                                        Any amendment to the Co-operative's Rules; 
                                    </li>
                                    <li>
                                        The decision to wind up the Co-operative. 
                                    </li>
                                </ol>
                            </li>
                            <li>
                                All other decisions shall be made by ordinary resolution.
                            </li>
                        </ol>
                    </li>
                    <li value="56">
                        An Extraordinary Resolution is one passed by a majority of not less than 75% of votes 
                        cast at a general meeting and an ordinary resolution is one passed by a simple 
                        majority (51%) of votes cast. 
                    </li>
                    <li value="57">
                        Resolutions may be passed at general meetings or by written resolution. A written 
                        resolution may consist of several identical Documents signed by one or more Members.
                    </li>
                    <li value="58">
                        The Co-operative shall have a Board of Directors comprising not less than three Directors.
                    </li>
                    <li value="59">
                        The initial Directors of the Co-operative from registration until the first annual general 
                        meeting shall be appointed by the Founder Members. 
                    </li>
                    <li value="60">
                        Only Members of the Co-operative who are aged 18 years or more may serve on the 
                        Board of Directors. 
                    </li>
                    <li value="61">
                        The Board of Directors shall be elected by and from the Co-operative’s Members. The 
                        maximum number of Directors serving on the Board shall be determined by a general 
                        meeting of the Co-operative from time to time. 
                    </li>
                </ol>

                <h3>Retirement Cycle</h3>

                <ol>
                    <li value="62">
                        At the first annual general meeting all Directors shall stand down. At every subsequent 
                        annual general meeting one-third of the Board of Directors, or if their number is not a 
                        multiple of three then the number nearest to one-third, shall retire from office. The 
                        Directors to retire shall be the Directors who have been longest in office since their last 
                        election. Where Directors have held office for the same amount of time the Director to 
                        retire shall be decided by lot. A retiring Director shall be eligible for re-election. 
                    </li>
                </ol>

                <h3>Co-option of Directors </h3>

                <ol>
                    <li value="63">
                        In addition the Board of Directors may co-opt up to two external independent Directors 
                        who need not be Members and are selected for their particular skills and/or 
                        experience. Such external independent Directors shall serve a fixed period determined 
                        by the Board of Directors at the time of the co-option, subject to a review at least every 
                        12 months. External independent Directors may be removed from office at any time by 
                        a resolution of the Board of Directors. 
                    </li>
                    <li value="64">
                        The Board of Directors may at any time fill a casual vacancy on the Board by 
                        co-option. Co-opted individuals must be Members of the Co-operative and will hold 
                        office as Director only until the next annual general meeting.
                    </li>
                </ol>

                <h3>Board Education and Training</h3>

                <ol>
                    <li value="65">
                        In accordance with the Co-operative Principle of education, training and information, 
                        before accepting a position as Director an individual must agree to undertake training 
                        during their first year of office as deemed appropriate by the Co-operative. This 
                        training will include information on the roles and responsibilities of being a Director of a 
                        society which is also a co-operative. 
                    </li>
                </ol>

                <h3>Powers and Duties of the Board of Directors</h3> 

                <ol>
                    <li value="66">
                        The business of the Co-operative shall be managed by the Board who may exercise 
                        all such powers of the Co-operative as may be exercised and done by the Co-
                        operative and as are not by statute or by these Rules required to be exercised or done 
                        by the Co-operative in general meeting. 
                    </li>
                    <li value="67">
                        All decisions made by a meeting of the Board of Directors or by any person acting as 
                        a Director shall remain valid even if it is later discovered that there was some defect in 
                        the Director’s appointment or that the individual had previously been disqualified from 
                        acting as a Director. 
                    </li>
                    <li value="68">
                        All cheques, promissory notes, drafts, bills of exchange and other negotiable 
                        instruments, and all receipts for monies paid to the Co-operative shall be signed, 
                        drawn, accepted, endorsed, or otherwise executed in such manner as the Board shall 
                        from time to time direct. 
                    </li>
                    <li value="69">
                        Without prejudice to its general powers, the Board may exercise all the powers of the 
                        Co-operative to borrow money and to mortgage or charge its undertaking and property 
                        or any part of it and to issue debentures and other securities whether outright or as 
                        security for any debt, liability or obligation of the Co-operative or of any third party. 
                    </li>
                    <li value="70">
                        No Regulation made by the Co-operative in general meeting shall invalidate any prior 
                        act of the Board which would have been valid had that Regulation not been made. 
                    </li>
                    <li value="71">
                        In accordance with the Co-operative Principles of democratic member control and 
                        member economic participation, the Board of Directors shall not be entitled to sell or 
                        otherwise dispose of assets (in a single transaction or series of transactions) 
                        equivalent in value to one-third or more of the total value of the last published balance 
                        sheet of the Co-operative without the approval of the Members by Extraordinary Resolution.
                    </li>
                </ol>

                <h3>Delegation</h3>

                <ol>
                    <li value="72">
                        Subject to these Rules, the Directors may delegate any of the powers which are 
                        conferred on them under these Rules to any Person or committee consisting of 
                        Members of the Co-operative, by such means, to such an extent, in relation to such 
                        matters and on such terms and conditions as they think fit. 
                    </li>
                    <li value="73">
                        The Directors may specify that any such delegation may authorise further delegation 
                        of the powers by any Person to whom they are delegated. 
                    </li>
                    <li value="74">
                        The Directors may revoke any delegation in whole or in part or alter any terms and conditions.
                    </li>
                </ol>

                <h3>Sub-Committees</h3> 

                <ol>
                    <li value="75">
                        A sub-committee to which the Directors delegate any of their powers must follow 
                        procedures which are based as far as they are applicable on those provisions of these 
                        Rules which govern the taking of decisions by Directors. 
                    </li>
                    <li value="76">
                        The Directors may make Regulations for all or any sub-committees, provided that 
                        such Regulations are not inconsistent with these Rules. 
                    </li>
                    <li value="77">
                        All acts and proceedings of any sub-committee must be fully and promptly reported to the Directors.
                    </li>
                </ol>


                <h3>PROCEEDINGS OF THE BOARD OF DIRECTORS</h3> 

                <h3>Calling a Meeting of the Board of Directors</h3> 


                <ol>
                    <li value="78">
                        Any Director may, and the Secretary on the requisition of a Director shall, call a 
                        meeting of the Board of Directors by giving reasonable notice of the meeting to all 
                        Directors. Notice of any meeting of the Board of Directors must indicate the date, time 
                        and place of the meeting and, if the Directors participating in the meeting will not be in 
                        the same place, how they will communicate with each other.
                    </li>
                </ol>

                <h3>Proceedings of a Meeting of the Board of Directors </h3>

                <ol>
                    <li value="79">
                        The Board of Directors may meet together for the despatch of business, adjourn and 
                        otherwise regulate their meetings as they think fit. 
                    </li>
                    <li value="80">
                        A Director is able to exercise the right to speak at a meeting of the Board of Directors 
                        and is deemed to be in attendance when that person is in a position to communicate 
                        to all those attending the meeting. The Directors may make whatever arrangements 
                        they consider appropriate to enable those attending a meeting of the Board of 
                        Directors to exercise their rights to speak or vote at it including by Electronic Means. In 
                        determining attendance at a meeting of the Board of Directors, it is immaterial whether 
                        any two or more Directors attending are in the same place as each other. 
                    </li>
                    <li value="81">
                        Questions arising at any meetings of the Board shall be decided by a majority of votes. 
                        In the case of an equality of votes the status quo shall be maintained and the Board of 
                        Directors may choose to refer the matter to a general meeting of the Co-operative. 
                    </li>
                    <li value="82">
                        A written resolution, circulated to all Directors and signed by a simple majority (51%) 
                        of Directors, shall be valid and effective as if it had been passed at a Board meeting
                        duly convened and held. A written resolution may consist of several identical 
                        Documents signed by one or more Directors. 
                    </li>
                    <li value="83">
                        The Board of Directors may, at its discretion, invite other persons to attend its 
                        meetings with or without speaking rights and without voting rights. Such attendees will 
                        not count toward the quorum. 
                    </li>
                </ol>

                <h3>Quorum</h3>

                <ol>
                    <li value="84">
                        The quorum necessary for the transaction of business at a meeting of the Board of 
                        Directors shall be 50% of the Directors or 3 Directors, including those not present in 
                        person, whichever is the greater. 
                    </li>
                    <li value="85">
                        If at any time the total number of Directors in office is less than the quorum required, 
                        the Directors are unable to take any decisions other than to appoint further Directors 
                        or to call a general meeting so as to enable the Members to appoint further Directors. 
                    </li>
                </ol>

                <h3>Chairing Board Meetings</h3> 

                <ol>
                    <li value="86">
                        The chairperson shall facilitate meetings of the Board of Directors. If s/he is absent or 
                        unwilling to act at the time any meeting proceeds to business then the Directors 
                        present shall choose one of their number to be the chairperson for that meeting. 
                    </li>
                </ol>


                <h3>Declaration of Interest</h3> 

                <ol>
                    <li value="87">
                        A Director shall declare an interest in any contract or matter in which s/he has a 
                        personal, material or financial interest, whether directly or indirectly, and shall not vote 
                        in respect of such contract or matter, provided that nothing shall prevent a Director 
                        voting in respect of her/his terms and conditions of employment or any associated  matter.
                    </li>
                </ol> 

                <h3>Expenses</h3> 

                <ol>
                    <li value="88">
                        The Co-operative may pay any reasonable expenses which the Directors properly 
                        incur in connection with their attendance at meetings or otherwise in connection with 
                        the exercise of their powers and the discharge of their responsibilities in relation to the 
                        Co-operative.
                    </li>
                </ol> 


                <h3>Termination of a Director’s Appointment</h3> 

                <ol>
                    <li value="89">
                        A person ceases to be a Director of the Co-operative as soon as: 
                        <ol type='a'>
                            <li>
                                That person ceases to be a Member of the Co-operative (unless they are a co-opted
                                external independent Director);
                            </li>
                            <li>
                                Where the individual is the representative of a Member organisation, that Memeber
                                organisation removes their endorsement of that representative;
                            </li>
                            <li>
                                Where the person is the representative of a Member organisation that Member 
                                organisation ceases to exist;
                            </li>
                            <li>
                                That person resigns from office in Writing to the Secretary of the Co-operative, 
                                and such resignation has taken effect in accordance with its terms;
                            </li>
                            <li>
                                That person is removed from office by an ordinary resolution of the Co-operative 
                                in general meeting, the notices for which specified that the question of the 
                                Director's removal was to be considered;
                            </li>
                            <li>
                                That person is prohibited from being a Director by law; 
                            </li>
                            <li>
                                A bankruptcy order is made against that person; 
                            </li>
                            <li>
                                A registered medical practitioner who is treating that person gives a written 
                                opinion to the Co-operative stating that the person has become mentally 
                                incapable of acting as a Director and may remain so for more than three months;
                            </li>
                            <li>
                                By reason of that person’s mental health, a court makes an order which wholly 
                                or partly prevents that person from personally exercising any powers or rights 
                                which that person would otherwise have. 
                            </li>
                        </ol>
                    </li>
                </ol>

                <h3>OFFICERS</h3>

                <ol>
                    <li value="90">
                        The Board shall elect from among their own number a chairperson and Secretary and 
                        such other Officers as they may from time to time decide. These Officers shall have 
                        such duties and rights as may be bestowed on them by the Board or by law and any 
                        Officer appointed may be removed by the Board. A serving Officer who is not re-
                        elected to the Board at the annual general meeting shall nevertheless continue in 
                        office until the first Board meeting following the annual general meeting. 
                    </li>
                </ol>

                <h3>DISPUTES</h3>

                <ol>
                    <li value="91">
                        In the event of a dispute between the Co-operative or its Board and a Member of the 
                        Co-operative or a former Member, such dispute shall be referred to an independent 
                        arbitrator whose appointment is acceptable to both parties to the dispute or in the 
                        absence of agreement to be nominated by the Secretary General of Co-operatives UK 
                        (or any role or body that succeeds to its function). The decision of such an arbitrator 
                        shall be binding. In the event that a dispute cannot, for whatever reason, be concluded 
                        by reference to an arbitrator, the matter may be referred to the county court (or in 
                        Scotland, to the sheriff). Any Person bringing a dispute must, if so required, deposit 
                        with the Co-operative a reasonable sum (not exceeding £100) to be determined by the 
                        Board. The arbitrator will decide how the costs of the arbitration will be paid and what
                        should be done with the deposit. 
                    </li>
                </ol>

                <h3>REGULATIONS</h3>

                <ol>
                    <li value="92">
                        The Co-operative in a general meeting, or the Board of Directors, may from time to 
                        time make, adopt and amend such Regulations in the form of bye-laws, standing 
                        orders, secondary rules or otherwise as they think fit for the management, conduct 
                        and regulation of the affairs of the Co-operative and the proceedings and powers of 
                        the Board of Directors and sub-committees. Such Regulations (if any) shall be made 
                        available to all Members. No Regulation shall be made which is inconsistent with 
                        these Rules or the Act. All Members of the Co-operative and the Board of Directors 
                        shall be bound by such Regulations whether or not they have received a copy of them. 
                    </li>
                </ol>

                <h3>LIABILITY OF MEMBERS</h3>

                <ol>
                    <li value="93">
                        The liability of a Member is limited to the amount of their shareholding.
                    </li>
                </ol>

                <h3>APPLICATION OF PROFITS</h3>

                <ol>
                    <li value="94">
                        Any profits of the Co-operative shall be applied as follows in such proportions and in 
                        such manner as may be decided by the Co-operative at the annual general meeting: 
                        <ol type='a'>
                            <li>
                                To a general reserve for the continuation and development of the Co-operative; 
                            </li>
                            <li>
                                To paying dividends to Members, either equally or in accordance with some 
                                other equitable formula which recognises the relative contribution made by each 
                                Member to the business of the Co-operative; 
                            </li>
                            <li>
                                In accordance with the Co-operative Principle of concern for community, to 
                                make payment for social, co-operative and community purposes.
                            </li>
                        </ol>
                    </li>
                </ol>

                <h3>AMALGAMATION, TRANSFER OF ENGAGEMENTS AND CONVERSION</h3> 

                <ol>
                    <li value="95">
                        The Co-operative may, by special resolution passed in the way required by the Act, 
                        amalgamate with or transfer its engagements to any other society. The Co-operative 
                        may also accept a transfer of engagements and assets by resolution of the Board or of 
                        a general meeting. 
                    </li>
                    <li value="96">
                        The Co-operative may, by special resolution passed in the way required by s52(3) of 
                        the Act, amalgamate with or transfer its engagements to a company or convert itself 
                        into a company under the provisions of the Act. In relation to calling a general meeting 
                        for the purpose of such resolution, the following provisions shall apply: 
                        <ol type="a">
                            <li>
                                The Co-operative shall give to Members not less than two months’ notice of the 
                            </li>
                            <li>
                                Notice of the meeting shall be posted in a prominent place at the registered 
                                office and at all trading premises of the Co-operative to which Members have access.
                            </li>
                            <li>
                                The notice shall be accompanied by a separate statement setting out for 
                                Members: 
                                <ol type="i">
                                    <li>
                                        the reasons for the proposal; 
                                    </li>
                                    <li>
                                        whether the proposal has the support of the Board of the Co-operative; 
                                    </li>
                                    <li>
                                        what alternative proposals have been considered, and whether they are 
                                        viable; 
                                    </li>
                                    <li>
                                        details of the number of shares in the Co-operative held by Members of 
                                        the Board, and persons connected with them; 
                                    </li>
                                    <li>
                                        a recommendation by reputable independent financial advisors that the 
                                        Members should support the proposal rather than any alternative 
                                        proposal. 
                                    </li>
                                </ol>
                            </li>
                            <li>
                                Where the separate statement is contained in another Document, information 
                                shall be provided in the notice specifying where Members can obtain a copy of 
                                the Document. 
                            </li>
                            <li>
                                The quorum for a meeting at which a special resolution to amalgamate with, 
                                transfer engagements to or convert into a company is to be voted upon shall be 
                                150 Members or 50% of the Members present in Person, whichever is the 
                                greater, subject to an absolute minimum of three Members.
                            </li>
                        </ol>
                    </li>
                </ol>


                <h3>DISSOLUTION</h3>

                <ol>
                    <li value="97">
                        The Co-operative may be dissolved by the consent of three quarters of the Members 
                        by their signatures to an instrument of dissolution, or by winding up in a manner 
                        provided for by the Act. 
                    </li>
                </ol>

                <h3>Co-ownership</h3>

                <ol>
                    <li value="98">
                        The Co-operative is a co-ownership enterprise. If on the winding up or dissolution of 
                        the Co-operative any of its assets remain to be disposed of after its liabilities are 
                        satisfied, these assets may be distributed among the Members and those persons 
                        who were Members at any time during the six years prior to the date on which the 
                        Co-operative decides to wind up. Such assets shall be distributed either equally or in 
                        accordance with some other equitable formula which recognises the relative 
                        contribution made by each Member and past Members to the business of the Co-
                        operative during the six years prior to the winding up or dissolution of the 
                        Co-operative. If such residual assets cannot be distributed in this manner they shall 
                        be transferred to a common ownership co-operative or to Co-operatives UK (or any 
                        body that succeeds to its function). 
                    </li>
                </ol> 


                <h3>ADMINISTRATIVE ARRANGEMENTS</h3> 

                <h3>Means of Communication</h3> 

                <ol>
                    <li value="99">
                        A Member may provide their consent to receive communications from the 
                        Co-operative by Electronic Means. 
                    </li>
                    <li value="100">
                        A notice sent to a Director’s Address shall be deemed to have been duly served 48 
                        hours after its posting. A Director may agree with the Co-operative that notices or 
                        Documents sent to her/him in a particular way are to be deemed to have been 
                        received within a specified time of their being sent, and for the specified time to be 
                        less than 48 hours. 
                    </li>
                </ol>

                <h3>Seal</h3>

                <ol>
                    <li value="101">
                        If the Co-operative has a seal, it shall only be used by the authority of the Board of 
                        Directors acting on behalf of the Co-operative. Every instrument to which the seal 
                        shall be attached shall be signed by a Director and countersigned by a second 
                        Director or the Secretary. 
                    </li>
                </ol>

                <h3>Register</h3>

                <ol>
                    <li value="102">
                        The Board of Directors shall ensure accurate registers are maintained which shall 
                        include a register of Members, a register of Directors and a register of Officers. 
                    </li>
                </ol>

                <h3>Register of Members</h3> 

                <ol>
                    <li value="103">
                        The Board shall ensure that the register is maintained in accordance with the Act and 
                        that the particulars required by the Act are available for inspection and accessible 
                        without the need to disclose other particulars contained in the register. 
                    </li>
                </ol>

                <h3>Register of Directors and Officers</h3> 

                <ol>
                    <li value="104">
                        The Co-operative shall maintain a register of Directors and Officers which shall include 
                        the following particulars: 
                        <ol type="a">
                            <li>
                                Name of the Director; 
                            </li>
                            <li>
                                Address of the Director; 
                            </li>
                            <li>
                                The date on which they assumed office; 
                            </li>
                            <li>
                                The date on which they vacated office; and 
                            </li>
                            <li>
                                The position held by a Director if s/he is also an Officer and the date on which 
                                the Director assumed and vacated his/her Officer position. 
                            </li>
                        </ol>
                    </li>
                </ol>


                <h3>Amendments to Rules</h3>

                <ol>
                    <li value="105">
                        Any of these Rules may be rescinded or amended or a new rule made by an 
                        Extraordinary Resolution at a general meeting of which 14 Clear Days' notice has 
                        been given, such notice to include details of the change(s) to be proposed at that 
                        meeting. No amendment of Rules is valid until registered by the Registrar. When 
                        submitting the rule amendments for registration the Secretary may at their sole 
                        discretion accept any alterations required or suggested by the Registrar without 
                        reference back to a further general meeting of the Co-operative. 
                    </li>
                </ol>

                <h3>Copies of the Co-operative's Rules</h3> 

                <ol>
                    <li value="106">
                        A copy of these Rules and any amendments made to them shall be given free of 
                        charge to every Member upon admission to membership and shall be provided to any 
                        other person on demand and on payment of the statutory fee chargeable for the time
                        being in force.
                    </li>
                </ol>

                <h3>Minutes</h3>

                <ol>
                    <li value="107">
                        The Co-operative shall ensure that minutes are kept of all:
                        <ol type="a">
                            <li>
                                Proceedings at general meetings of the Co-operative; and 
                            </li>
                            <li>
                                Proceedings at meetings of the Board of Directors and its sub-committees which 
                                include names of the Directors present, decisions made and the reasons for 
                                those decisions. 
                            </li>
                        </ol>
                    </li>                            
                </ol>

                <h3>Annual Return</h3>

                <ol>
                    <li value="108">
                        Every year and within the period prescribed by the Act, the Secretary shall send the 
                        annual return in the prescribed form to the Registrar. The annual return shall be 
                        accompanied by: 
                        <ol type="a">
                            <li>
                                A copy of the Auditor’s report on the Co-operative's accounts for the period 
                                covered by the annual return or a copy of such other report (if any) as is required 
                                by statute for such a period; and 
                            </li>
                            <li>
                                A copy of each balance sheet made during that period and report of the Auditor 
                                or other appropriate person as required by statute on that balance sheet. 
                            </li>
                        </ol>
                    </li>
                    <li value="109">
                        The Co-operative shall on demand supply free of charge to any Member or any 
                        person with an interest in the funds of the Co-operative a copy of the latest annual 
                        return together with a copy of the Auditor's report on the accounts and balance sheet 
                        contained in the annual return and the Auditor’s report (if any).
                    </li>
                    <li value="110">
                        The Co-operative shall at all times keep a copy of the latest balance sheet of the 
                        Co-operative together with a copy of the corresponding Auditor's report (if any) hung 
                        up in a conspicuous place at the registered office and displayed on the Co-operative's 
                        website (if any).
                    </li>
                </ol>

                <h3>Audit</h3>

                <ol>
                    <li value="111">
                        Unless the Co-operative meets the criteria set out in section 4(2) of the Friendly and 
                        Industrial and Provident Societies Act 1968 or fulfils the exemptions set out in sub-
                        sections 4(A) (1) and (2) of the Friendly and Industrial and Provident Societies Act 
                        1968, the Board shall in each financial year appoint an Auditor as required by section 
                        7 of the Friendly and Industrial and Provident Societies Act 1965 as amended, to audit 
                        the Co-operative’s accounts and balance sheet for the year. This provision also 
                        applies if the Co-operative is in its first financial year. 
                    </li>
                    <li value="112">
                        The following persons shall not be appointed as Auditor of the Co-operative: 
                        <ol type="a">
                            <li>
                                An Officer or Employee of the Co-operative; 
                            </li>
                            <li>
                                A person who is a partner or employee of, or who employs, an Officer of the Co-operative.
                            </li>
                        </ol>
                    </li>
                    <li value="113">
                        The Board may appoint an Auditor to fill a casual vacancy occurring between general meetings.
                    </li>
                    <li value="114">
                        An Auditor for the preceding financial year shall be re-appointed as Auditor of the 
                        Co-operative for the current financial year unless: 
                        <ol type="a">
                            <li>
                                A decision has been made by the Board to appoint a different Auditor or 
                                expressly decided that s/he shall not be re-appointed; or
                            </li>
                            <li>
                                S/he has given notice in writing to the Secretary of her/his unwillingness to be re-appointed; or
                            </li>
                            <li>
                                S/he is ineligible for appointment as Auditor of the Co-operative for the current financial year; or
                            </li>
                            <li>
                                S/he has ceased to act as Auditor of the Co-operative by reason of incapacity. 
                            </li>
                        </ol>
                    </li>
                    <li value="115">
                        Any ordinary resolution of a general meeting of the Co-operative either to remove an 
                        Auditor from office or to appoint another person as Auditor shall not be effective unless 
                        notice of the proposed resolution has been given to the Co-operative at least 28 days 
                        prior to the meeting at which the resolution is to be considered. At least 14 days' notice 
                        of such resolution must then be given to Members of the Co-operative in the manner 
                        prescribed in these Rules and in Writing to the Auditor(s).
                    </li>
                </ol>

                <h3>Social Accounting and Reporting</h3> 

                <ol>
                    <li value="116">
                        In addition to any financial accounts required by the Act, the Members may resolve to 
                        undertake an account of the activities of the Co-operative which will endeavour to 
                        measure its co-operative, social and environmental performance using whatever 
                        methodology the Members deem appropriate. Following the completion of such an 
                        account the Co-operative shall report any findings to its Members and other 
                        stakeholders.
                    </li>
                </ol> 

                <h3>Indemnity and Insurance</h3> 

                <ol>
                    <li value="117">
                        Subject to the following rule, any Director or former Director of the Co-operative may 
                        be indemnified out of the Co-operative’s assets against: 
                        <ol type="a">
                            <il>
                                Any liability incurred by that Director in connection with any negligence, default, 
                                breach of duty or breach of trust in relation to the Co-operative; 

                            </il>
                            <li>
                                Any liability incurred by that Director in connection with the activities of the 
                                Co-operative in its capacity as a trustee of an occupational pension scheme; 

                            </li>
                            <li>
                                Any other liability incurred by that Director as an Officer of the Co-operative. 
                            </li>
                        </ol>
                    </li>
                    <li value="118">
                        The above rule does not authorise any indemnity which would be prohibited or
                        rendered void by any provision of law. 
                    </li>
                    <li value="119">
                        The Directors may decide to purchase and maintain insurance, at the expense of the 
                        Co-operative, for the benefit of any Director or former Director of the Co-operative in 
                        respect of any loss or liability which has been or may be incurred by such a Director in 
                        connection with their duties or powers in relation to the Co-operative or any pension 
                        fund or employees’ share scheme of the Co-operative.
                    </li>
                </ol>
            </div>
        </div>
    </div>
</section>