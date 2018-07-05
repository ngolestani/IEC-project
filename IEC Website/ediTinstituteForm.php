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
                <form action="ediTinstitute.php?id=<?php print $_GET['id']?>" method="post" class="col-lg-6">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="name"><strong>Institute Name</strong></label>
                            <input id="name" value='<?php isset($name) ?  print $name : print "" ?>'
                                   name="name" type="text" class="form-control">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="tyoe"><strong>Institute Type</strong></label><br>
                        <input type="radio" <?php isset($type) && $type=='private_academic' ? print 'checked' : print '' ?>
                               name="type" value="private_academic">Private Academic<br>
                        <input type="radio" <?php isset($type) && $type=='public_academic' ? print 'checked' : print '' ?>
                               name="type" value="public_academic">Public Academic<br>
                        <input type="radio" <?php isset($type) && $type=='private_non-academic' ? print 'checked' : print '' ?>
                               name="type" value="private_non-academic">Private None Academic<br>
                        <input type="radio" <?php isset($type) && $type=='public_school' ? print 'checked' : print '' ?>
                               name="type" value="public_school">Public School<br>
                        <input type="radio" <?php isset($type) && $type=='public_college' ? print 'checked' : print '' ?>
                               name="type" value="public_college">Public College<br>
                        <input type="radio" <?php isset($type) && $type=='public_university' ? print 'checked' : print '' ?>
                               name="type" value="public_university">Public University<br>
                        <input type="radio" <?php isset($type) && $type=='private_school' ? print 'checked' : print '' ?>
                               name="type" value="private_school">Pivate School<br>
                        <input type="radio" <?php isset($type) && $type=='private_language_school' ? print 'checked' : print '' ?>
                               name="type" value="private_language_school">Private Language School<br>
                        <input type="radio" <?php isset($type) && $type=='public_language_school' ? print 'checked' : print '' ?>
                               name="type" value="public_language_school">Public Language School<br>

                    </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="instituterefuncpolicy"><strong>Institute Refund Policy</strong></label>
                    <input id="instituterefuncpolicy" value='<?php isset($refund_policy) ?  print $refund_policy : print "" ?>'
                           name="refund_policy" type="text" class="form-control">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="iage"><strong>Age Range</strong></label>
                    <input id="iage" value='<?php isset($age) ?  print $age : print "" ?>'
                           name="age" type="text" class="form-control">
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
                    <label for="residence"><strong>Institute Website</strong></label>
                    <input id="iwebsite" value='<?php isset($website) ?  print $website : print "" ?>'
                           name="website" type="text" class="form-control">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="telno"><strong>Telephone Number</strong></label>
                    <input id="telno" value='<?php isset($telephone) ?  print $telephone : print "" ?>'
                           name="telephone" type="text" class="form-control">
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
                    <label for="commission"><strong>Commission %</strong></label>
                    <input id="commission" value='<?php isset($commission) ?  print $commission : print "" ?>'
                           name="commission" type="text" class="form-control">
                </div>
            </div>


            <div class="col-lg-6">
                <div class="form-group">
                    <label for="dob"><strong>Comment</strong></label>
                    <input id="comment" value='<?php isset($comment) ?  print $comment : print "" ?>'
                           name="comment" type="text" class="form-control">
                </div>
            </div>

            <!--				 <div class="col-lg-6">-->
            <!--                      <div class="form-group">-->
            <!--                        <label for="image"><strong>Institute Image</strong></label>-->
            <!--                        <input id="image" name="image" type="file" class="form-control">-->
            <!--                      </div>-->
            <!--                 </div>-->
            <!--				 	-->
            <!--				 -->
            <!--				 <div class="col-lg-6">-->
            <!--                      <div class="form-group">-->
            <!--                        <label for="ivideo"><Strong>Institute Video</strong></label>-->
            <!--                        <input id="ivideo" name="ivideo" type="file"  class="form-control">-->
            <!--                      </div>-->
            <!--                 </div>-->

            <div class="col-lg-6">
                <div class="form-group">
                    <label for="ihowtoapply"><Strong>Institute How to Apply</strong></label>
                    <input id="ihowtoapply" value='<?php isset($how_to_apply) ?  print $how_to_apply : print "" ?>'
                           name="how_to_apply" type="text"  class="form-control">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="ihowtoapply"><Strong>Institute Payment Method</strong></label>
                    <input id="paymentmethod" value='<?php isset($payment_method) ?  print $payment_method : print "" ?>'
                           name="payment_method" type="text"  class="form-control">
                </div>
            </div>

            <div class="col-lg-6">
                <div class="form-group">
                    <label for="enrolment_requirement"><Strong>Enrolment Requirement</strong></label>
                    <input id="paymentmethod" value='<?php isset($enrolment_requirement) ?  print $enrolment_requirement : print "" ?>'
                           name="enrolment_requirement" type="text"  class="form-control">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="ihowtoapply"><Strong>Institute Courses</strong></label>
                    <input id="courseId" value='<?php isset($selected) ?  print implode(',',$selected) : print "" ?>'
                           name="courseId" type="text"  class="form-control">
                </div>
            </div>



            <div class="col-md-6">
                <div class="form-group">

                    <input  type="Submit" name="addInstitute" class="form-control">
                </div>
            </div>

            </form>
        </div>
        <div class="container">
            <div class="input-group input-group-sm my-3 col-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-sm">Search</span>
                </div>
                <input type="text" id="searching" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm">
            </div>
        </div>
        <div class="container ">
            <table style="width: 55%" class="table table-striped table-sm mb-4 border-bottom float-left mr-2">
                <thead>
                <tr class="text-center">
                    <th scope="col">name</th>
                    <th scope="col">type</th>
                    <th scope="col">age</th>
                    <th scope="col">Edit</th>
                </tr>
                </thead>
                <tbody id="result" style="overflow-y: scroll; height: 25px;">
                <?php foreach ($result as $res){ ?>
                <?php if (!in_array($res['id'],$selected)){ ?>
                    <tr class="text-center">
                        <td><?php print $res['name'] ?></td>
                        <td><?php print $res['type'] ?></td>
                        <td><?php print $res['age'] ?></td>
                        <td>
                            <button type="button" value="<?php print $res['id']?>" onclick="attachCourse(this)" id="<?php print $res['id']?>" class="btn btn-sm btn-primary">Attach Course</button>
                        </td>
                    </tr>
                    <?php }?>
                <?php } ?>
                </tbody>
            </table>
            <table style="width: 35%" class="table table-striped table-sm mb-4 border-bottom float-right ">
                <thead>
                <tr class="text-center">
                    <th scope="col">name</th>
                    <th scope="col">type</th>
                    <th scope="col">age</th>
                    <th scope="col">Edit</th>
                </tr>
                </thead>
                <tbody id="chosen">
                      <?php foreach ($result as $res){ ?>
                          <?php if (in_array($res['id'],$selected)){ ?>
                              <tr class="text-center">
                              <td><?php print $res['name'] ?></td>
                              <td><?php print $res['type'] ?></td>
                              <td><?php print $res['age'] ?></td>
                              <td>
                                  <button type="button" value="<?php print $res['id']?>" onclick="detachCourse(this)" id="detach" class="btn btn-sm btn-danger">Detach Course</button>
                              </td>
                          </tr>
                              <?php } ?>
                      <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
    <script
        src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
        crossorigin="anonymous"></script>
    <script>
        var courses = <?php print json_encode($result) ?>;
        var selected = <?php print json_encode($selected) ?>;
        var courseArray = [];
        courses.forEach(function(element,i) {
            var arr = $.map(element, function(value) {
                return [value];
            });
            courseArray[i] = arr;
        });
        // courseArray.forEach(function(element,i) {
        //     console.log(element[0]);
        //     console.log(selected.indexOf(element[0]));
        //     if (selected.indexOf(element[0]) != 0) {
        //      console.log('done');
        //     }
        //     });
        $("#searching").keyup(function(event) {
            var query = $(this).val();
            var html='';
            var result = [];
            if(query.length != 0) {
                if (query.length >= 2 || event.keyCode == 8) {
                    courseArray.forEach(function (element, i) {
                        var counter = 0;
                        element.forEach(function (value) {
                            if (value.search(query) != -1) {
                                counter++;
                            }
                        });
                        if (counter > 0) {
                            result[i] = element;
                        }
                    });
                    result.forEach(function (value) {
                        console.log(selected.includes(value[0]));
                        if (!selected.includes(value[0])) {
                            html += '<tr class="text-center"><td>' + value[1] + '</td>';
                            html += '<td>' + value[2] + '</td>';
                            html += '<td>' + value[3] + '</td>';
                            html += '<td>' +
                                '<button type="button" value="' + value[0] + '" onclick="attachCourse(this)" id="' + value[0] + '" class="btn btn-sm btn-primary">Attach Course</button>'
                                + '</td>';
                        }
                    });
                    var div = document.getElementById('result');
                    div.innerHTML = html;
                }
            }else {
                courseArray.forEach(function (value) {
                    if (!selected.includes(value[0])) {
                        html += '<tr class="text-center"><td>' + value[1] + '</td>';
                        html += '<td>' + value[2] + '</td>';
                        html += '<td>' + value[3] + '</td>';
                        html += '<td>' +
                            '<button type="button" value="' + value[0] + '" onclick="attachCourse(this)" id="' + value[0] + '" class="btn btn-sm btn-primary">Attach Course</button>'
                            + '</td>';
                    }
                });
                var div = document.getElementById('result');
                div.innerHTML = html;
            }
        });
        function attachCourse(e) {
            var html='';
            var htmlc='';
            selected.push(document.getElementById(e.id).getAttribute('value'));
            $('#courseId').val(selected.toString());
            courseArray.forEach(function (value,i) {
                console.log(!selected.includes(value[0]));
                if (!selected.includes(value[0])) {
                    html += '<tr class="text-center"><td>' + value[1] + '</td>';
                    html += '<td>' + value[2] + '</td>';
                    html += '<td>' + value[3] + '</td>';
                    html += '<td>' +
                        '<button type="button" value="' + value[0] + '" onclick="attachCourse(this)" id="' + value[0] + '" class="btn btn-sm btn-primary">Attach Course</button>'
                        + '</td>';
                }else{
                    htmlc += '<tr class="text-center"><td>' + value[1] + '</td>';
                    htmlc += '<td>' + value[2] + '</td>';
                    htmlc += '<td>' + value[3] + '</td>';
                    htmlc += '<td>' +
                        '<button type="button" value="' + value[0] + '" onclick="detachCourse(this)" id="' + value[0] + '" class="btn btn-sm btn-danger">Detach Course</button>'
                        + '</td>';
                }
                var div = document.getElementById('result');
                div.innerHTML = html;
                var div = document.getElementById('chosen');
                div.innerHTML = htmlc;
            });

        }

        function detachCourse(e) {
            var html='';
            var htmlc='';
            $valu = document.getElementById(e.id).getAttribute('value');
            if (selected.includes($valu)) {
                selected.pop($valu);
            }
            $('#courseId').val(selected.toString());
            courseArray.forEach(function (value,i) {
                if (!selected.includes(value[0])) {
                    html += '<tr class="text-center"><td>' + value[1] + '</td>';
                    html += '<td>' + value[2] + '</td>';
                    html += '<td>' + value[3] + '</td>';
                    html += '<td>' +
                        '<button type="button" value="' + value[0] + '" onclick="attachCourse(this)" id="' + value[0] + '" class="btn btn-sm btn-primary">Attach Course</button>'
                        + '</td>';
                }else{
                    htmlc += '<tr class="text-center"><td>' + value[1] + '</td>';
                    htmlc += '<td>' + value[2] + '</td>';
                    htmlc += '<td>' + value[3] + '</td>';
                    htmlc += '<td>' +
                        '<button type="button" value="' + value[0] + '" onclick="detachCourse(this)" id="' + value[0] + '" class="btn btn-sm btn-danger">Detach Course</button>'
                        + '</td>';
                }
                var div = document.getElementById('result');
                div.innerHTML = html;
                var div = document.getElementById('chosen');
                div.innerHTML = htmlc;
            });

        }
    </script>
</section>
