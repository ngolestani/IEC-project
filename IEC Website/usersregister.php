<?php

require('DataBase.php');
session_start();
//if(isset($_SESSION['login_user'])){
//    header("location:");
//    $x='sdfsd';
//    ///inja bayad check konim che role chiye ta bar asae on redirect konim
//}

$firsname='';
$lastname='';
$email='';
$password='';
$role='';
$error=[];
$message ='';
$info='';
if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["register"])) {
    if (isset($_POST['fname']) && !empty($_POST['fname'])){$firsname = $_POST['fname'];}else{$error[] = 'First name is empty';}
    if (isset($_POST['lname']) && !empty($_POST['lname'])){$lastname = $_POST['lname'];}else{$error[] = 'Last name is empty';}
    if (isset($_POST['email']) && !empty($_POST['email'])){$email = $_POST['email'];}else{$error[] = 'Email is empty';}
    if (isset($_POST['password']) && !empty($_POST['password'])){$password = $_POST['password'];}else{$error[] = 'Password is empty';}
    if (isset($_POST['role']) && !empty($_POST['role']) ){
        if ($_POST['role']==2 or $_POST['role']==3){
            $role = $_POST['role'];
        }else{
            $error[] = 'Role is not valid';
        }
    }else{$error[] = 'Role is not selected';}

    if (isset($error) && empty($error)) {
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $pdo->prepare("INSERT INTO users (email,password,role) VALUES (:email,:password,:role)");
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $password);
        $stmt->bindParam(':role', $role);
        $stmt->execute();
        $userId = $pdo->lastInsertId();

        if ($role == 3) {
            $agenId = 0;
            $stmt = $pdo->prepare("INSERT INTO students (user_id,first_name,last_name,email,agent_id) VALUES (:userId,:fname,:lname,:email,:agent_id)");
            $stmt->bindParam(':userId', $userId);
            $stmt->bindParam(':fname', $firsname);
            $stmt->bindParam(':lname', $lastname);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':agent_id', $agenId);
            $stmt->execute();
            $sId = $pdo->lastInsertId();
            $sql = "UPDATE users SET profile_id=:sId WHERE id=:uId";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':sId', $sId);
            $stmt->bindParam(':uId', $userId);
            $stmt->execute();
            $message = "You're Registerd As Student";
        } elseif ($role == 2) {
            $stmt = $pdo->prepare("INSERT INTO agents (user_id,first_name,last_name,email) VALUES (:userId,:fname,:lname,:email)");
            $stmt->bindParam(':userId', $userId);
            $stmt->bindParam(':fname', $firsname);
            $stmt->bindParam(':lname', $lastname);
            $stmt->bindParam(':email', $email);
            $stmt->execute();
            $sId = $pdo->lastInsertId();
            $sql = "UPDATE users SET profile_id=:sId WHERE id=:uId";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':sId', $sId);
            $stmt->bindParam(':uId', $userId);
            $stmt->execute();
            $message = "You're Registerd As Agent";
        } else {
            $error[]='Role Is Not Valid';
        }
        Database::disconnect();
        $firsname='';
        $lastname='';
        $email='';
        $password='';
        $role='';
    }
    }
    elseif ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["login"])){
        $email='';
        $password='';
        if (isset($_POST['email']) && !empty($_POST['email'])){$email = $_POST['email'];}else{$error[] = 'Email is empty';}
        if (isset($_POST['password']) && !empty($_POST['password'])){$password = $_POST['password'];}else{$error[] = 'Password is empty';}
        if (isset($error) && empty($error)) {
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sql = "SELECT * FROM users WHERE email=:email AND password=:password LIMIT 1;";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':password', $password);
            $stmt->execute();
            if ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
                if ($result['verify'] == 1) {
                    $_SESSION['login_user'] = $result['email'];
                    $_SESSION['user_id'] = $result['id'];
                    $_SESSION['profile_id'] = $result['profile_id'];
                    $_SESSION['role'] = $result['role'];
                    if ($result['role'] == 1) {
                        header("Location: admin.php");
                    } elseif ($result['role'] == 2) {
                        header("Location: agents.php");
                        /////redirectto agent panel
                    } elseif ($result['role'] == 3) {
                        header("Location: students.php");
                        ////redirect to student panel
                    } else {
                        session_unset();
                        $error[] = "You're Not a User";
                    }
                } else {
                    $info = "You're Not Verify Yet Try Latter.";
                }
            }
            else{
                $error[] = "You're Not a User";
            }
            Database::disconnect();
        }
    }elseif (isset( $_SESSION['login_user']) && isset($_SESSION['role'])){
    if ($_SESSION['role'] == 1) {
        header("Location: admin.php");
    } elseif ($_SESSION['role'] == 2) {
        header("Location: agents.php");
        /////redirectto agent panel
    } elseif ($_SESSION['role'] == 3) {
        header("Location: students.php");
        ////redirect to student panel
    } else {
        session_unset();
        $error[] = "You're Not a User";
    }
}
include('siteHeader.php');
?>
<!--      <div id="heading-breadcrumbs">-->
<!--        <div class="container">-->
<!--          <div class="row d-flex align-items-center flex-wrap">-->
<!--            <div class="col-md-7">-->
<!--              <h1 class="h2">New Account / Sign In</h1>-->
<!--            </div>-->
<!--            <div class="col-md-5">-->
<!--              <ul class="breadcrumb d-flex justify-content-end">-->
<!--                <li class="breadcrumb-item"><a href="index.html">Home</a></li>-->
<!--                <li class="breadcrumb-item active">New Account / Sign In</li>-->
<!--              </ul>-->
<!--            </div>-->
<!--          </div>-->
<!--        </div>-->
<!--      </div>-->
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
<?php if (isset($message) && !empty($message)){ ?>
    <div class="list-group-item btn-success"> <?php echo $message ?></div>
    <?php } ?>
<?php if (isset($info) && !empty($info)){ ?>
    <div class="list-group-item btn-info"> <?php echo $info ?></div>
<?php } ?>
      <div id="content">
        <div class="container">
          <div class="row">
            <div class="col-lg-6">
              <div class="box">
                <h2 class="text-uppercase">New account</h2>
                <p class="lead">Not our registered customer yet?</p>
                <hr>
                <form action="" method="POST">

                  <div class="form-group">
                    <label for="name-login">First Name</label>
                    <input id="name-login" value='<?php isset($firsname) ?  print $firsname : print "" ?>'
                     name="fname" type="text" class="form-control">
                  </div>
                    <div class="form-group">
                        <label for="name-login">Last Name</label>
                        <input id="name-login" value="<?php isset($lastname) ? print $lastname : print ''?>"
                               name="lname" type="text" class="form-control">
                    </div>
                  <div class="form-group">
                    <label for="email-login">Email</label>
                    <input id="email-login" value="<?php isset($email) ? print $email : print ''?>"
                           name="email" type="text" class="form-control">
                  </div>
                    <div class="form-group">
                        <label for="name-login" class="form-row">Role</label>
                        <input id="Gender" <?php isset($role) && $role==2 ? print 'checked' : print ''?>
                               name="role" value="2" type="radio" class="radio">Agent
                        <input id="Gender" <?php isset($role) && $role==3 ? print 'checked' : print '' ?>
                               name="role" value="3" type="radio" class="radio">Student
                    </div>
                  <div class="form-group">
                    <label for="password-login">Password</label>
                    <input id="password-login"
                           name="password" type="password" class="form-control">
                  </div>
                  <div class="text-center">
                    <button type="submit" name="register" class="btn btn-template-outlined"><i class="fa fa-user-md"></i> Register</button>
                  </div>
                </form>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="box">
                <h2 class="text-uppercase">Login</h2>
                <p class="lead">Already our customer?</p>
                <hr>
                <form action="" method="POST">
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email" name="email" type="text" class="form-control">
                  </div>
                  <div class="form-group">
                    <label for="password">Password</label>
                    <input id="password" name="password" type="password" class="form-control">
                  </div>
                  <div class="text-center">
                    <button type="submit" name="login" class="btn btn-template-outlined"><i class="fa fa-sign-in"></i> Log in</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
<div class="main-footer">
    <div class="container bg-dark color-white">
        <div class="row">
            <div class="col-12 text-center mt-3">
                <p >&copy; 2018. International Education Consultants</p>
            </div>
        </div>
    </div>
</div>
<!-- Javascript files-->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/popper.js/umd/popper.min.js"> </script>
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="vendor/jquery.cookie/jquery.cookie.js"> </script>
<script src="vendor/waypoints/lib/jquery.waypoints.min.js"> </script>
<script src="vendor/jquery.counterup/jquery.counterup.min.js"> </script>
<script src="vendor/owl.carousel/owl.carousel.min.js"></script>
<script src="vendor/owl.carousel2.thumbs/owl.carousel2.thumbs.min.js"></script>
<script src="js/jquery.parallax-1.1.3.js"></script>
<script src="vendor/bootstrap-select/js/bootstrap-select.min.js"></script>
<script src="vendor/jquery.scrollto/jquery.scrollTo.min.js"></script>
<script src="js/front.js"></script>
</body>
</html>