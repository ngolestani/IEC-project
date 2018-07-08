<section class="bar pt-0">
    <div class="row">
        <div class="col-md-12">
            <div class="heading text-center">
                <h2>form</h2>
            </div>
        </div>
    </div>
    <div class="row">

        <?php if (isset($error) && !empty($error)){?>
            <div class="container">
                <div class="row">
                    <ul>
                        sdfsdfsdfsdf
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
                <form action="agentProfile.php" method="post" class="col-lg-6">

            </div>

            <div class="col-lg-6">
                <div class="form-group">
                    <label for="first_name"><strong>First Name</strong></label>
                    <input id="name" value='<?php isset($first_name) ?  print $first_name : print "" ?>'
                           name="first_name" type="text" class="form-control">
                </div>
            </div>

            <div class="col-lg-6">
                <div class="form-group">
                    <label for="last_name"><strong>Last Name</strong></label>
                    <input id="instituterefuncpolicy" value='<?php isset($last_name) ?  print $last_name : print "" ?>'
                           name="last_name" type="text" class="form-control">
                </div>
            </div>

            <div class="col-lg-6">
                <div class="form-group">
                    <label for="email"><strong>Email</strong></label>
                    <input id="email" value='<?php isset($email) ?  print $email : print "" ?>'
                           name="email" type="text" class="form-control">
                </div>
            </div>

            <div class="col-lg-6">
                <div class="form-group">
                    <label for="address1"><strong>First Line Address</strong></label>
                    <input id="address1" value='<?php isset($address1) ?  print $address1 : print "" ?>'
                           name="address1" type="text" class="form-control">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="address2"><strong>Second Line Address</strong></label>
                    <input id="address2" value='<?php isset($address2) ?  print $address2 : print "" ?>'
                           name="address2" type="text" class="form-control">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="town"><strong>city</strong></label>
                    <input id="town" value='<?php isset($city) ?  print $city : print "" ?>'
                           name="city" type="text" class="form-control">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="region"><strong>Region</strong></label>
                    <input id="region" value='<?php isset($region) ?  print $region : print "" ?>'
                           name="region" type="text" class="form-control">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="postcode"><strong>Post Code</strong></label>
                    <input id="postcode" value='<?php isset($post_code) ?  print $post_code : print "" ?>'
                           name="post_code" type="text" class="form-control">
                </div>
            </div>

            <div class="col-lg-6">
                <div class="form-group">
                    <label for="country"><strong>Country</strong></label>
                    <input id="country" value='<?php isset($country) ?  print $country : print "" ?>'
                           name="country" type="text" class="form-control">
                </div>
            </div>

            <div class="col-lg-6">
                <div class="form-group">
                    <label for="telephone"><strong>Telephone Number</strong></label>
                    <input id="telno" value='<?php isset($telephone) ?  print $telephone : print "" ?>'
                           name="telephone" type="text" class="form-control">
                </div>
            </div>

            <div class="col-lg-6">
                <div class="form-group">
                    <label for="mobile"><strong>Mobile Number</strong></label>
                    <input id="mobile" value='<?php isset($mobile) ?  print $mobile : print "" ?>'
                           name="mobile" type="text" class="form-control">
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

                    <input  type="Submit" name="agentProfile" class="form-control">
                </div>
            </div>

            </form>
        </div>
</section>
