<?php
include ('DataBase.php');
include ('isStudents.php');

$result=[];
$pdo = Database::connect();
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$first_name='';
$last_name='';
$email='';
$gender='';
$date_of_birth='';
$country_of_residence='';
$nationality='';
$marrital_status='';
$dependent_children='';
$country='';
$city='';
$region='';
$address1='';
$address2='';
$telephone='';
$mobile='';
$post_code='';
$password='';
$rowCount;
$error=[];

$sql = "SELECT * FROM students WHERE user_id=:user_id AND id=:student_id LIMIT 1";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':user_id', $_SESSION['user_id']);
$stmt->bindParam(':student_id', $_SESSION['profile_id']);
$stmt->execute();
if ($rowCount=$stmt->rowCount()>0){
    $res = $stmt->fetch(PDO::FETCH_ASSOC);
    $first_name=$res['first_name'];
    $last_name=$res['last_name'];
    $email=$res['email'];
    $gender=$res['gender'];
    $date_of_birth=$res['date_of_birth'];
    $country_of_residence=$res['country_of_residence'];
    $nationality=$res['nationality'];
    $marrital_status=$res['marrital_status'];
    $dependent_children=$res['dependent_children'];
    $city=$res['city'];
    $country=$res['country'];
    $region=$res['region'];
    $address1=$res['address1'];
    $address2=$res['address2'];
    $telephone=$res['telephone'];
    $mobile=$res['mobile'];
    $post_code=$res['post_code'];

}
Database::disconnect();

if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["personalProfile"])) {

    if (isset($_POST['first_name']) && !empty($_POST['first_name'])){$firs_name = $_POST['first_name'];}else{$error[] = 'First Name is empty';}
    if (isset($_POST['last_name']) && !empty($_POST['last_name'])){$last_name = $_POST['last_name'];}else{$error[] = 'LastName name is empty';}
    if (isset($_POST['email']) && !empty($_POST['email'])){$email = $_POST['email'];}else{$error[] = 'Email is empty';}
    if (isset($_POST['gender']) && !empty($_POST['gender'])){$gender = $_POST['gender'];}else{$error[] = 'Gender is empty';}
    if (isset($_POST['date_of_birth']) && !empty($_POST['date_of_birth'])){$date_of_birth = $_POST['date_of_birth'];}else{$error[] = 'Date of Birth is empty';}
    if (isset($_POST['country_of_residence']) && !empty($_POST['country_of_residence'])){$country_of_residence = $_POST['country_of_residence'];}else{$error[] = 'Country of Residence is empty';}
    if (isset($_POST['nationality']) && !empty($_POST['nationality'])){$nationality = $_POST['nationality'];}else{$error[] = 'Nationality is empty';}
    if (isset($_POST['marrital_status']) && !empty($_POST['marrital_status'])){$marrital_status = $_POST['marrital_status'];}else{$error[] = 'Marrital Status is empty';}
    if (isset($_POST['dependent_children']) && $_POST['dependent_children'] >= 0){$dependent_children = $_POST['dependent_children'];}else{$error[] = 'Dependent Children value is not valid.';}
    if (isset($_POST['address1']) && !empty($_POST['address1'])){$address1 = $_POST['address1'];}else{$error[] = 'First Line Address is empty';}
    if (isset($_POST['address2'])){$address2= $_POST['address2'];}
    if (isset($_POST['city']) && !empty($_POST['city'])){$city = $_POST['city'];}else{$error[] = 'City is empty';}
    if (isset($_POST['region']) && !empty($_POST['region'])){$region = $_POST['region'];}else{$error[] = 'Region is empty';}
    if (isset($_POST['post_code']) && !empty($_POST['post_code'])){$post_code = $_POST['post_code'];}else{$error[] = 'Post Code is empty';}
    if (isset($_POST['country']) && !empty($_POST['country'])){$country = $_POST['country'];}else{$error[] = 'Country is empty';}
    if (isset($_POST['telephone']) && !empty($_POST['telephone'])){$telephone = $_POST['telephone'];}else{$error[] = 'Telephone is empty';}
    if (isset($_POST['mobile']) && !empty($_POST['mobile'])){$mobile = $_POST['mobile'];}else{$error[] = 'Mobile is empty';}
    if (isset($_POST['password']) && !empty($_POST['password']) or
        isset($_POST['re_password']) && !empty($_POST['re_password'])){
        if ($_POST['password']==$_POST['re_password']){
            $password = $_POST['password'];
        }else{
            $error[] = 'Password Not Match';
        }
    }


    if (isset($error) && empty($error)){
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        if ($rowCount>0) {
            $stmt = $pdo->prepare("UPDATE students SET
first_name=:first_name,last_name=:last_name,email=:email,gender=:gender,date_of_birth=:date_of_birth,
country_of_residence=:country_of_residence,marrital_status=:marrital_status,nationality=:nationality,dependent_children=:dependent_children
,address1=:address1,address2=:address2,city=:city,region=:region,post_code=:post_code,country=:country,mobile=:mobile,telephone=:telephone WHERE id=:id");
            $stmt->bindParam(':id', $_SESSION['profile_id']);
            $stmt->bindParam(':first_name', $firs_name);
            $stmt->bindParam(':last_name', $last_name);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':gender', $gender);
            $stmt->bindParam(':date_of_birth', $date_of_birth);
            $stmt->bindParam(':country_of_residence', $country_of_residence);
            $stmt->bindParam(':nationality', $nationality);
            $stmt->bindParam(':marrital_status', $marrital_status);
            $stmt->bindParam(':dependent_children', $dependent_children);
            $stmt->bindParam(':address1', $address1);
            $stmt->bindParam(':address2', $address2);
            $stmt->bindParam(':city', $city);
            $stmt->bindParam(':region', $region);
            $stmt->bindParam(':post_code', $post_code);
            $stmt->bindParam(':country', $country);
            $stmt->bindParam(':mobile', $mobile);
            $stmt->bindParam(':telephone', $telephone);
            $stmt->execute();
            if (isset($password) && !empty($password)){
                $stmt = $pdo->prepare("UPDATE users SET email=:email,password=:password WHERE id=:id");
                $stmt->bindParam(':id', $_SESSION['user_id']);
                $stmt->bindParam(':email', $email);
                $stmt->bindParam(':password', $password);
                $stmt->execute();
            }else{
                $stmt = $pdo->prepare("UPDATE users SET email=:email WHERE id=:id");
                $stmt->bindParam(':id', $_SESSION['user_id']);
                $stmt->bindParam(':email', $email);
                $stmt->execute();
            }
        }
        Database::disconnect();
        header("Location: students.php",false);
    }
}


include ('studentsheader.php');
?>
    <div id="main">

        <?php
        include ('personalprofileform.php');
        ?>

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