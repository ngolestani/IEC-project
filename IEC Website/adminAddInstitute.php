<?php
include('DataBase.php');
include('isAdmin.php');

$result=[];
$pdo = Database::connect();
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$sql = "SELECT id,name,type,age FROM courses";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':email', $email);
$stmt->bindParam(':password', $password);
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
Database::disconnect();

$name='';
$type='';
$refund_policy='';
$age='';
$address1='';
$address2='';
$city='';
$region='';
$post_code='';
$country='';
$website='';
$telephone='';
$email='';
$commission='';
$comment='';
$how_to_apply='';
$payment_method='';
$enrolment_requirement='';
$courseIds='';
$error=[];
if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["addInstitute"])) {
    if (isset($_POST['name']) && !empty($_POST['name'])){$name = $_POST['name'];}else{$error[] = 'Name is empty';}
    if (isset($_POST['type']) && !empty($_POST['type'])){$type = $_POST['type'];}else{$error[] = 'Gender name is empty';}
    if (isset($_POST['refund_policy']) && !empty($_POST['refund_policy'])){$refund_policy = $_POST['refund_policy'];}else{$error[] = 'Refund Policy name is empty';}
    if (isset($_POST['age']) && !empty($_POST['age'])){$age = $_POST['age'];}else{$error[] = 'Age name is empty';}
    if (isset($_POST['address1']) && !empty($_POST['address1'])){$address1 = $_POST['address1'];}else{$error[] = 'First Line Address is empty';}
    if (isset($_POST['address2'])){$address2= $_POST['address2'];}
    if (isset($_POST['city']) && !empty($_POST['city'])){$city = $_POST['city'];}else{$error[] = 'City is empty';}
    if (isset($_POST['region']) && !empty($_POST['region'])){$region = $_POST['region'];}else{$error[] = 'Region is empty';}
    if (isset($_POST['post_code']) && !empty($_POST['post_code'])){$post_code = $_POST['post_code'];}else{$error[] = 'Post Code is empty';}
    if (isset($_POST['country']) && !empty($_POST['country'])){$country = $_POST['country'];}else{$error[] = 'Country is empty';}
    if (isset($_POST['website']) && !empty($_POST['website'])){$website = $_POST['website'];}else{$error[] = 'Website is empty';}
    if (isset($_POST['telephone']) && !empty($_POST['telephone'])){$telephone = $_POST['telephone'];}else{$error[] = 'Telephone is empty';}
    if (isset($_POST['email']) && !empty($_POST['email'])){$email = $_POST['email'];}else{$error[] = 'Email is empty';}
    if (isset($_POST['commission']) && $_POST['commission']>=0){$commission = $_POST['commission'];}else{$error[] = 'Commission is empty';}
    if (isset($_POST['comment']) && !empty($_POST['comment'])){$comment = $_POST['comment'];}else{$error[] = 'Comment is empty';}
    if (isset($_POST['how_to_apply']) && !empty($_POST['how_to_apply'])){$how_to_apply= $_POST['how_to_apply'];}else{$error[] = 'How to Apply is empty';}
    if (isset($_POST['payment_method']) && !empty($_POST['payment_method'])){$payment_method = $_POST['payment_method'];}else{$error[] = 'Payment Method is empty';}
    if (isset($_POST['enrolment_requirement']) && !empty($_POST['enrolment_requirement'])){$enrolment_requirement = $_POST['enrolment_requirement'];}else{$error[] = 'Enrolment Requirement is empty';}

if (isset($error) && empty($error)){
        $lastId=0;
    $pdo = Database::connect();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $pdo->prepare("INSERT INTO institute 
(name,type,refund_policy,age,address1,address2,city,region,post_code,country,website,telephone,email,commission,comment,how_to_apply,payment_method,enrolment_requirement) 
    VALUES
     (:name,:type,:refund_policy,:age,:address1,:address2,:city,:region,:post_code,:country,
     :website,:telephone,:email,:commission,:comment,:how_to_apply,:payment_method,:enrolment_requirement)");
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':type', $type);
    $stmt->bindParam(':refund_policy', $refund_policy);
    $stmt->bindParam(':age', $age);
    $stmt->bindParam(':address1', $address1);
    $stmt->bindParam(':address2', $address2);
    $stmt->bindParam(':city', $city);
    $stmt->bindParam(':region', $region);
    $stmt->bindParam(':post_code', $post_code);
    $stmt->bindParam(':country', $country);
    $stmt->bindParam(':website', $website);
    $stmt->bindParam(':telephone', $telephone);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':commission', $commission);
    $stmt->bindParam(':comment', $comment);
    $stmt->bindParam(':how_to_apply', $how_to_apply);
    $stmt->bindParam(':payment_method', $payment_method);
    $stmt->bindParam(':enrolment_requirement', $enrolment_requirement);
    $stmt->execute();
    $lastId = $pdo->lastInsertId();
    if (isset($_POST['courseId']) && !empty($_POST['courseId'])){
        $courseIds = explode(',',$_POST['courseId']);
        foreach ($courseIds as $id){
            $stmt = $pdo->prepare("INSERT INTO course_institute (course_id,institute_id) VALUES (:cID,:iID)");
            $stmt->bindParam(':cID', $id);
            $stmt->bindParam(':iID', $lastId);
            $stmt->execute();
        }
    }
    Database::disconnect();
    header("Location: AllInstitute.php",false);
}
}

?>

<?php
 include('adminheader.php');
 ?>
<div id="main">
</div>
<?php
include('adminAddAnstituteForm.php');
?>

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