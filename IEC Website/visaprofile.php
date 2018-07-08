<?php
include ('DataBase.php');
include ('isStudents.php');

$result=[];
$pdo = Database::connect();
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$applied_visa='';
$granted_visa='';
$rejected_visa='';
$sponsor='';
$financial_support_source='';
$annual_study_budget='';
$additional_info='';
$student_passport_number='';
$passport_expiry_date='';
$student_passport_country='';
$rowCount;
$error=[];

$sql = "SELECT * FROM studentvisa WHERE user_id=:user_id AND student_id=:student_id LIMIT 1";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':user_id', $_SESSION['user_id']);
$stmt->bindParam(':student_id', $_SESSION['profile_id']);
$stmt->execute();
if ($rowCount=$stmt->rowCount()>0){
    $res = $stmt->fetch(PDO::FETCH_ASSOC);
    $applied_visa=$res['applied_visa'];
    $granted_visa=$res['granted_visa'];
    $rejected_visa=$res['rejected_visa'];
    $sponsor=$res['sponsor'];
    $financial_support_source=$res['financial_support_source'];
    $annual_study_budget=$res['annual_study_budget'];
    $additional_info=$res['additional_info'];
    $student_passport_number=$res['student_passport_number'];
    $passport_expiry_date=$res['passport_expiry_date'];
    $student_passport_country=$res['student_passport_country'];

}
Database::disconnect();

if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["visaProfile"])) {
    if (isset($_POST['applied_visa']) && !empty($_POST['applied_visa'])){$applied_visa = $_POST['applied_visa'];}else{$error[] = 'Applied Visa is empty';}
    if (isset($_POST['granted_visa']) && !empty($_POST['granted_visa'])){$granted_visa = $_POST['granted_visa'];}else{$error[] = 'Granted Visa is empty';}
    if (isset($_POST['rejected_visa']) && !empty($_POST['rejected_visa'])){$rejected_visa = $_POST['rejected_visa'];}else{$error[] = 'Rejected Visa is empty';}
    if (isset($_POST['sponsor']) && !empty($_POST['sponsor'])){$sponsor = $_POST['sponsor'];}else{$error[] = 'Sponsor name is empty';}
    if (isset($_POST['financial_support_source']) && !empty($_POST['financial_support_source'])){$financial_support_source = $_POST['financial_support_source'];}else{$error[] = 'Sinancial Support Source is empty';}
    if (isset($_POST['annual_study_budget']) && !empty($_POST['annual_study_budget'])){$annual_study_budget = $_POST['annual_study_budget'];}else{$error[] = 'Annual Study Budget is empty';}
    if (isset($_POST['additional_info']) && !empty($_POST['additional_info'])){$additional_info = $_POST['additional_info'];}else{$error[] = 'Additional Info is empty';}
    if (isset($_POST['student_passport_number']) && !empty($_POST['student_passport_number'])){$student_passport_number = $_POST['student_passport_number'];}else{$error[] = 'Student Passport Number is empty';}
    if (isset($_POST['passport_expiry_date']) && !empty($_POST['passport_expiry_date'])){$passport_expiry_date = $_POST['passport_expiry_date'];}else{$error[] = 'Passport Expiry Date Info is empty';}
    if (isset($_POST['student_passport_country']) && !empty($_POST['student_passport_country'])){$student_passport_country = $_POST['student_passport_country'];}else{$error[] = 'Student Passport Country Info is empty';}


    if (isset($error) && empty($error)){
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        if ($rowCount>0) {
            $stmt = $pdo->prepare("UPDATE studentvisa SET
            applied_visa=:applied_visa,granted_visa=:granted_visa,
            rejected_visa=:rejected_visa,sponsor=:sponsor,financial_support_source=:financial_support_source,
            annual_study_budget=:annual_study_budget,additional_info=:additional_info,student_passport_number=:student_passport_number,
            passport_expiry_date=:passport_expiry_date,student_passport_country=:student_passport_country
            WHERE user_id=:user_id AND student_id=:student_id");
            $stmt->bindParam(':user_id', $_SESSION['user_id']);
            $stmt->bindParam(':student_id', $_SESSION['profile_id']);
            $stmt->bindParam(':applied_visa', $applied_visa);
            $stmt->bindParam(':granted_visa', $granted_visa);
            $stmt->bindParam(':rejected_visa', $rejected_visa);
            $stmt->bindParam(':sponsor', $sponsor);
            $stmt->bindParam(':financial_support_source', $financial_support_source);
            $stmt->bindParam(':annual_study_budget', $annual_study_budget);
            $stmt->bindParam(':additional_info', $additional_info);
            $stmt->bindParam(':student_passport_number', $student_passport_number);
            $stmt->bindParam(':passport_expiry_date', $passport_expiry_date);
            $stmt->bindParam(':student_passport_country', $student_passport_country);
            $stmt->execute();
//        $lastId = $pdo->lastInsertId();
        }else{
            $stmt = $pdo->prepare("INSERT INTO studentvisa (user_id,student_id,applied_visa,granted_visa,rejected_visa,sponsor,
               financial_support_source,annual_study_budget,additional_info,student_passport_number,passport_expiry_date,
               student_passport_country) VALUES (:user_id,:student_id,:applied_visa,:granted_visa,
               :rejected_visa,:sponsor,:financial_support_source,:annual_study_budget,:additional_info,:student_passport_number,
               :passport_expiry_date,:student_passport_country)");
            $stmt->bindParam(':user_id', $_SESSION['user_id']);
            $stmt->bindParam(':student_id', $_SESSION['profile_id']);
            $stmt->bindParam(':applied_visa', $applied_visa);
            $stmt->bindParam(':granted_visa', $granted_visa);
            $stmt->bindParam(':rejected_visa', $rejected_visa);
            $stmt->bindParam(':sponsor', $sponsor);
            $stmt->bindParam(':financial_support_source', $financial_support_source);
            $stmt->bindParam(':annual_study_budget', $annual_study_budget);
            $stmt->bindParam(':additional_info', $additional_info);
            $stmt->bindParam(':student_passport_number', $student_passport_number);
            $stmt->bindParam(':passport_expiry_date', $passport_expiry_date);
            $stmt->bindParam(':student_passport_country', $student_passport_country);
            $stmt->execute();
        }
        Database::disconnect();
        header("Location: Students.php",false);
    }
}


include ('studentsheader.php');
?>
<div id="main">

    <?php
    include ('visaprofileform.php');
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