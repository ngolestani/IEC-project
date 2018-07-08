<section class="bar pt-0">
            <div class="row">
              <div class="col-md-12">
                <div class="heading text-center">
                  <h2>Student Personal Profile form</h2>
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
<form action="personalprofile.php" method="post" class="col-lg-12 mx-auto">
				<div class="col-lg-6">
                      <div class="form-group">
                        <label for="name"><strong>First Name</strong></label>
                        <input id="name" value="<?php isset($first_name) ?  print $first_name : print "" ?>"
                               name="first_name" type="text" class="form-control">
                      </div>
                 </div>
				<div class="col-lg-6">
                      <div class="form-group">
                        <label for="surname"><strong>Last Name</strong></label>
                        <input id="last_name" value="<?php isset($last_name) ?  print $last_name : print "" ?>"
                               name="last_name" type="text" class="form-control">
                      </div>
                 </div>
				 <div class="col-lg-6">
                      <div class="form-group">
                        <label for="nationality"><strong>Nationality</strong></label>
                        <input id="nationality" value="<?php isset($nationality) ?  print $nationality : print "" ?>"
                               name="nationality" type="text" class="form-control">
                      </div>
                 </div>
				 <div class="col-lg-6">
                      <div class="form-group">
                        <label for="residence"><strong>Country of Residence</strong></label>
                        <input id="residence" value="<?php isset($country_of_residence) ?  print $country_of_residence : print "" ?>"
                               name="country_of_residence" type="text" class="form-control">
                      </div>
                 </div>
				 <div class="col-lg-6">
                      <div class="form-group">
                        <label for="dob"><strong>Date of Birth</strong></label>
                        <input id="dob" value="<?php isset($date_of_birth) ?  print $date_of_birth : print "" ?>"
                               name="date_of_birth" type="date" class="form-control">
                      </div>
                 </div>
				 
				 				 <div class="col-lg-6">
                      <div class="form-group">
                        <label for="gender"><strong>Gender</strong></label><br>
                        <input type="radio" name="gender"
                               value="Male" <?php isset($gender) && $gender =='Male' ? print 'checked' : print '' ?>> Male<br>
						<input type="radio" name="gender"
                               value="Female" <?php isset($gender) && $gender =='Female' ? print 'checked' : print '' ?>> Female<br>
                      </div>
                 </div>
				 <div class="col-lg-6">
                      <div class="form-group">
                        <label for="maritalstatus"><strong>Marital Status</strong></label><br>
                        <input type="radio" name="marrital_status" value="Single"
                            <?php isset($marrital_status) && $marrital_status =='Single' ? print 'checked' : print '' ?>> Single<br>
						<input type="radio" name="marrital_status" value="Married"
                            <?php isset($marrital_status) && $marrital_status =='Married' ? print 'checked' : print '' ?>> Married<br>
						<input type="radio" name="marrital_status" value="Divorced"
                            <?php isset($marrital_status) && $marrital_status =='Divorced' ? print 'checked' : print '' ?>>Divorced<br>
						<input type="radio" name="marrital_status" value="Widowed"
                            <?php isset($marrital_status) && $marrital_status =='Widowed' ? print 'checked' : print '' ?>>Widowed<br>
                      </div>
                 </div>
				 <div class="col-lg-6">
                      <div class="form-group">
                        <label for="dependent_children"><Strong>Dependent Children</strong></label>
                        <input id="dependentchildren" value="<?php isset($dependent_children) ?  print $dependent_children : print "" ?>"
                               name="dependent_children" type="number" min="0" max="50" class="form-control">
                      </div>
                 </div>
				 <div class="col-lg-6">
                      <div class="form-group">
                        <label for="telephone"><strong>Telephone Number</strong></label>
                        <input id="telno" value="<?php isset($telephone) ?  print $telephone : print "" ?>"
                               name="telephone" type="text" class="form-control">
                      </div>
                 </div>
				 <div class="col-lg-6">
                      <div class="form-group">
                        <label for="mobile"><strong>Mobile Number</strong></label>
                        <input id="mobno" value="<?php isset($mobile) ?  print $mobile : print "" ?>"
                               name="mobile" type="text" class="form-control">
                      </div>
                 </div>
				 <div class="col-lg-6">
                      <div class="form-group">
                        <label for="email"><strong>Email</strong></label>
                        <input id="email" value="<?php isset($email) ?  print $email : print "" ?>"
                               name="email" type="text" class="form-control">
                      </div>
                 </div>
				 <div class="col-lg-6">
                      <div class="form-group">
                        <label for="address1"><strong>First Line Address</strong></label>
                        <input id="address1" value="<?php isset($address1) ?  print $address1 : print "" ?>"
                               name="address1" type="text" class="form-control">
                      </div>
                 </div>
				 <div class="col-lg-6">
                      <div class="form-group">
                        <label for="address2"><strong>Second Line Address</strong></label>
                        <input id="address2" value="<?php isset($address2) ?  print $address2 : print "" ?>"
                               name="address2" type="text" class="form-control">
                      </div>
                 </div>
				 <div class="col-lg-6">
                      <div class="form-group">
                        <label for="city"><strong>City</strong></label>
                        <input id="town" value="<?php isset($city) ?  print $city : print "" ?>"
                               name="city" type="text" class="form-control">
                      </div>
                 </div>
				 <div class="col-lg-6">
                      <div class="form-group">
                        <label for="post_code"><strong>Post Code</strong></label>
                        <input id="postcode" value="<?php isset($post_code) ?  print $post_code : print "" ?>"
                               name="post_code" type="text" class="form-control">
                      </div>
                 </div>
				 <div class="col-lg-6">
                      <div class="form-group">
                        <label for="region"><strong>Region</strong></label>
                        <input id="region" value="<?php isset($region) ?  print $region : print "" ?>"
                               name="region" type="text" class="form-control">
                      </div>
                 </div>
				 <div class="col-lg-6">
                      <div class="form-group">
                        <label for="country"><strong>Country</strong></label>
                        <input id="country" value="<?php isset($country) ?  print $country : print "" ?>"
                               name="country" type="text" class="form-control">
                      </div>
                 </div>


    <div class=" container mt-1 mb-3 btn btn-primary btn-sm">If You Want Change Your Password Fill Two Fields Below!</div>
    <div class="col-lg-6">
        <div class="form-group">
            <label for="password"><strong>NEW Password</strong></label>
            <input id="password" value=''
                   name="password" type="text" class="form-control">
        </div>
    </div>

    <div class="col-lg-6">
        <div class="form-group">
            <label for="re_password"><strong>Repeat NEW Password</strong></label>
            <input id="re_password" value='<?php isset($password) ?  print $password : print "" ?>'
                   name="re_password" type="text" class="form-control">
        </div>
    </div>

				 <div class="col-md-6">
                      <div class="form-group">
                        
                        <input  type="Submit" name="personalProfile" class="form-control">
                      </div>
                 </div>
				 

</form>
</div>
</div>
</div>
</section>
