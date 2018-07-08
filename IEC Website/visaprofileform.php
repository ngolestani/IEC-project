<section class="bar pt-0">
            <div class="row">
              <div class="col-md-12">
                <div class="heading text-center">
                  <h2>Student Visa Profile form</h2>
                </div>
              </div>
			  </div>
			  <div class="row">

                  <?php if (isset($error) && !empty($error)){?>
                      <div class="container">
                          <div class="row">
                              <ul>
                                  <?php foreach ($error as $e){ ?>
                                      <li class="list-group-item btn-danger">
                                          <?php echo $e ?>
                                      </li>
                                  <?php } ?>
                              </ul>
                          </div>
                      </div>
                  <?php } ?>

<div class="container">
<div class="row">
<form action="visaprofile.php" method="post" class="col-lg-12 mx-auto">
				<div class="col-lg-6">
                      <div class="form-group">
                        <label for="applied_visa">Have you applied visa before?</label><br>
                        <input type="radio" name="applied_visa"
                               <?php isset($applied_visa) && $applied_visa =='0' ? print 'checked' : print '' ?> value="0"> No<br>
						<input type="radio" name="applied_visa"
                               <?php isset($applied_visa) && $applied_visa =='1' ? print 'checked' : print '' ?> value="1"> Yes<br>
                      </div>
                 </div>
				 <div class="col-lg-6">
                      <div class="form-group">
                        <label for="granted_visa">Are you granted any visa before?</label><br>
                        <input type="radio" name="granted_visa"
                               <?php isset($granted_visa) && $granted_visa =='0' ? print 'checked' : print '' ?> value="0"> No<br>
						<input type="radio" name="granted_visa"
                               <?php isset($granted_visa) && $granted_visa =='1' ? print 'checked' : print '' ?> value="1"> Yes<br>
                      </div>
                 </div>
				 <div class="col-lg-6">
                      <div class="form-group">
                        <label for="rejected_visa">Rejected Visa Before?</label><br>
                        <input type="radio" name="rejected_visa"
                               <?php isset($rejected_visa) && $rejected_visa =='0' ? print 'checked' : print '' ?> value="0"> No<br>
						<input type="radio" name="rejected_visa"
                               <?php isset($rejected_visa) && $rejected_visa =='1' ? print 'checked' : print '' ?> value="1"> Yes<br>
                      </div>
                 </div>

				 <div class="col-lg-6">
                      <div class="form-group">
                        <label for="sponsor">Sponsor</label><br>
                        <input type="radio" name="sponsor" value="Myself"
                            <?php isset($sponsor) && $sponsor =='Myself' ? print 'checked' : print '' ?>>Myself<br>
						<input type="radio" name="sponsor" value="Spouse"
                            <?php isset($sponsor) && $sponsor =='Spouse' ? print 'checked' : print '' ?>>Spouse<br>
						<input type="radio" name="sponsor" value="Parents"
                            <?php isset($sponsor) && $sponsor =='Parents' ? print 'checked' : print '' ?>>Parents<br>
						<input type="radio" name="sponsor" value="Family Member"
                            <?php isset($sponsor) && $sponsor =='Family Member' ? print 'checked' : print '' ?>>Family Member<br>
						<input type="radio" name="sponsor" value="Friends and Relatives"
                            <?php isset($sponsor) && $sponsor =='Friends and Relatives' ? print 'checked' : print '' ?>>Friends and Relatives<br>
						<input type="radio" name="sponsor" value="Others"
                            <?php isset($sponsor) && $sponsor =='Others' ? print 'checked' : print '' ?>>Others<br>
                      </div>
                 </div>
				 <div class="col-lg-6">
                      <div class="form-group">
                        <label for="financial_support_source">Financial Support Source</label><br>
                        <input type="radio" name="financial_support_source" value="Home"
                            <?php isset($financial_support_source) && $financial_support_source =='Home' ? print 'checked' : print '' ?>>Home<br>
						<input type="radio" name="financial_support_source" value="Destination"
                            <?php isset($financial_support_source) && $financial_support_source =='Destination' ? print 'checked' : print '' ?>>Destination<br>
						<input type="radio" name="financial_support_source" value="both"
                            <?php isset($financial_support_source) && $financial_support_source =='both' ? print 'checked' : print '' ?>>both<br>
                      </div>
                 </div>
				 <div class="col-lg-6">
                      <div class="form-group">
                        <label for="annual_study_budget">Annual Study Budget</label><br>
                        <input type="radio" name="annual_study_budget" value="15K-25K"
                            <?php isset($annual_study_budget) && $annual_study_budget =='15K-25K' ? print 'checked' : print '' ?>>15K-25K £<br>
						<input type="radio" name="annual_study_budget" value="25K-35K"
                            <?php isset($annual_study_budget) && $annual_study_budget =='25K-35K' ? print 'checked' : print '' ?>>25K-35K £<br>
						<input type="radio" name="annual_study_budget" value="35K Plus"
                            <?php isset($annual_study_budget) && $annual_study_budget =='35K Plus' ? print 'checked' : print '' ?>>35K Plus £<br>
						
                      </div>
                 </div>
				 <div class="col-lg-6">
                      <div class="form-group">
                        <label for="additional_info">Additional Info</label>
                        <input id="additional_info" name="additional_info"
                               value="<?php isset($additional_info) ?  print $additional_info : print "" ?>" type="text" class="form-control">
                      </div>
                 </div>
				 <div class="col-lg-6">
                      <div class="form-group">
                        <label for="student_passport_number">Student Passport Number</label>
                        <input id="student_passport_number" name="student_passport_number"
                               value="<?php isset($student_passport_number) ?  print $student_passport_number : print "" ?>" type="text" class="form-control">
                      </div>
                 </div>
				 <div class="col-lg-6">
                      <div class="form-group">
                        <label for="passport_expiry_date">Passport Expiry Date</label>
                        <input id="passport_expiry_date" name="passport_expiry_date"
                               value="<?php isset($passport_expiry_date) ?  print $passport_expiry_date : print "" ?>" type="date" class="form-control">
                      </div>
                 </div>
				 <div class="col-lg-6">
                      <div class="form-group">
                        <label for="student_passport_country">Student Passport Country</label>
                        <input id="student_passport_country" name="student_passport_country"
                               value="<?php isset($student_passport_country) ?  print $student_passport_country : print "" ?>" type="text" class="form-control">
                      </div>
                 </div>
<!--				 <div class="col-lg-6">-->
<!--                      <div class="form-group">-->
<!--                        <label for="spassportdoc">Student Passport Doc</label>-->
<!--                        <input id="spassportdoc" name="spassportdoc" type="file" class="form-control">-->
<!--                      </div>-->
<!--                 </div>-->
				 
				 
				 <div class="col-md-6">
                      <div class="form-group">
                        
                        <input  type="Submit" name="visaProfile" class="form-control">
                      </div>
                 </div>
				 

</form>
</div>
</div>
</div>
</section>
