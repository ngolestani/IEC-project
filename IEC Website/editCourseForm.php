<section class="bar pt-0">
    <div class="row">
        <div class="col-md-12">
            <div class="heading text-center">
                <h2>form</h2>
            </div>
        </div>
    </div>

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
    <div class="row">
        <div class="container">
            <div class="row">
                <form action="editCourse.php?id=<?php print $_GET['id'] ?>" method="post" class="col-lg-12 mx-auto">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="name"><strong>Course Name</strong></label>
                            <input id="name" name="name"
                                   value='<?php isset($name) ?  print $name : print "" ?>'
                                   type="text" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="gender"><strong>Course Type</strong></label><br>
                        <input type="radio" <?php isset($gender) && $gender=='primary' ? print 'checked' : print '' ?>
                               name="gender" value="primary">Primary<br>
                        <input type="radio" <?php isset($gender) && $gender=='secondary' ? print 'checked' : print '' ?>
                               name="gender" value="secondary">Secondary<br>
                        <input type="radio" <?php isset($gender) && $gender=='further' ? print 'checked' : print '' ?>
                               name="gender" value="further">Further<br>
                        <input type="radio" <?php isset($gender) && $gender=='higher' ? print 'checked' : print '' ?>
                               name="gender" value="higher">Higher<br>
                        <input type="radio"<?php isset($gender) && $gender=='pre_university' ? print 'checked' : print '' ?>
                               name="gender" value="pre_university">Pre University<br>
                    </div>
            </div>
            <div class="form-group">
                <label for="gender"><strong>Age</strong></label><br>
                <input type="radio" <?php isset($age) && $age=='6-11' ? print 'checked' : print '' ?>
                       name="age" value="6-11">6-11<br>
                <input type="radio" <?php isset($age) && $age=='12-15' ? print 'checked' : print '' ?>
                       name="age" value="12-15">12-15<br>
                <input type="radio" <?php isset($age) && $age=='16-19' ? print 'checked' : print '' ?>
                       name="age" value="16-19">16-19<br>
                <input type="radio" <?php isset($age) && $age=='19 Plus' ? print 'checked' : print '' ?>
                       name="age" value="19 Plus">19 Plus<br>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="description"><strong>Course Description</strong></label>
                    <textarea id="description" name="description" type="text" class="form-control"><?php isset($desc) ?  print $desc : print "" ?></textarea>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">

                    <input  type="Submit" name="editCourse" class="form-control">
                </div>
            </div>
        </div>
        </form>
    </div>
    </div>
    </div>
</section>
