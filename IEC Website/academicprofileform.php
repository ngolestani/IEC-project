<section class="bar pt-0">
            <div class="row">
              <div class="col-md-12">
                <div class="heading text-center">
                  <h2>Student Academic Profile form</h2>
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
<form action="academicprofile.php" method="post" class="col-lg-12 mx-auto">

				<div class="col-lg-6">
                      <div class="form-group">
                        <label for="qualification_name"><strong>Qualification Name</strong></label><br>
                        <input type="radio" name="qualification_name"
                               value="Primary" <?php isset($qualification_name) && $qualification_name =='Primary' ? print 'checked' : print '' ?>>Primary<br>
						<input type="radio" name="qualification_name"
                               value="Secondary" <?php isset($qualification_name) && $qualification_name =='Secondary' ? print 'checked' : print '' ?>>Secondary<br>
						<input type="radio" name="qualification_name"
                               value="Diploma" <?php isset($qualification_name) && $qualification_name =='Diploma' ? print 'checked' : print '' ?>>Diploma<br>
						<input type="radio" name="qualification_name"
                               value="Bachelor" <?php isset($qualification_name) && $qualification_name =='Bachelor' ? print 'checked' : print '' ?>>Bachelor<br>
						<input type="radio" name="qualification_name"
                               value="Masters" <?php isset($qualification_name) && $qualification_name =='Masters' ? print 'checked' : print '' ?>>Masters<br>
                      </div>
					  
                      </div>
                 </div>
				 <div class="col-lg-6">
                      <div class="form-group">
                        <label for="qualification_language">Qualification Language</label><br>
                        <input type="radio" name="qualification_language"
                        value="Farsi" <?php isset($qualification_language) && $qualification_language =='Farsi' ? print 'checked' : print '' ?>>Farsi<br>
						<input type="radio" name="qualification_language"
                               value="Arabic" <?php isset($qualification_language) && $qualification_language =='Arabic' ? print 'checked' : print '' ?>>Arabic<br>
						<input type="radio" name="qualification_language"
                               value="French" <?php isset($qualification_language) && $qualification_language =='French' ? print 'checked' : print '' ?>>French<br>
						<input type="radio" name="qualification_language"
                               value="Russian" <?php isset($qualification_language) && $qualification_language =='Russian' ? print 'checked' : print '' ?>>Russian<br>
						<input type="radio" name="qualification_language"
                               value="<?php isset($qualification_language) && $qualification_language =='Spanish' ? print 'checked' : print '' ?>">Spanish<br>
						<input type="radio" name="qualification_language"
                               value="Portoguese" <?php isset($qualification_language) && $qualification_language =='Portoguese' ? print 'checked' : print '' ?>>Portoguese<br>
						<input type="radio" name="qualification_language"
                               value="Italian" <?php isset($qualification_language) && $qualification_language =='Italian' ? print 'checked' : print '' ?>>Italian<br>
						<input type="radio" name="qualification_language"
                               value="German"<?php isset($qualification_language) && $qualification_language =='German' ? print 'checked' : print '' ?>>German<br>
                          <input type="radio" name="qlanguage"
                                 value="German" <?php isset($qualification_language) && $qualification_language =='English' ? print 'checked' : print '' ?>>English<br>
						<input type="radio" name="qualification_language"
                               value="Other" <?php isset($qualification_language) && $qualification_language =='Other' ? print 'checked' : print '' ?>>Other<br>
						
                      </div>
                 </div>
				 <div class="col-lg-6">
                      <div class="form-group">
                        <label for="qualification_country">Qualification Country</label>
                        <input id="qcountry" value="<?php isset($qualification_country) ?  print $qualification_country : print "" ?>" name="qualification_country" type="country" class="form-control">
                      </div>
                 </div>
				 <div class="col-lg-6">
                      <div class="form-group">
                        <label for="GPA">GPA(%)</label>
                        <input id="gpa" value="<?php isset($GPA) ?  print $GPA : print "" ?>" name="GPA" type="number" min="0" max="100" class="form-control">
                      </div>
                 </div>
				 <div class="col-lg-6">
                      <div class="form-group">
                        <label for="qualification_institute">Qualification Institute</label>
                        <input id="qinstitute" name="qualification_institute" value="<?php isset($qualification_institute) ?  print $qualification_institute : print "" ?>" type="text" class="form-control">
                      </div>
                 </div>
				 <div class="col-lg-6">
                      <div class="form-group">
                        <label for="qualification_comment">Qualification Comment</label>
                        <input id="qcomment" value="<?php isset($qualification_comment) ?  print $qualification_comment : print "" ?>" name="qualification_comment" type="text" class="form-control">
                      </div>
                 </div>
				 <div class="col-lg-6">
                      <div class="form-group">
                        <label for="qualification_date">Qualification Date</label>
                        <input id="qdate" value="<?php isset($qualification_date) ?  print $qualification_date : print "" ?>" name="qualification_date" type="date" class="form-control">
                      </div>
                 </div>
<!--				 <div class="col-lg-6">-->
<!--                      <div class="form-group">-->
<!--                        <label for="qdoc">Qualification Doc</label>-->
<!--                        <input id="qdoc" name="qdoc" type="file" class="form-control">-->
<!--                      </div>-->
<!--                 </div>-->
				 
				 <div class="col-md-6">
                      <div class="form-group">
                        
                        <input  type="Submit" name="academicProfile" class="form-control">
                      </div>
                 </div>
</form>
</div>
</div>
</div>
</section>
