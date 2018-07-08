<?php
include ('DataBase.php');
include ('isStudents.php');

$result=[];
$pdo = Database::connect();
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$exam_type='';
$Listening='';
$Reading='';
$writing='';
$speaking='';
$overal_band='';
$certificate_date='';
$rowCount;
$error=[];

$sql = "SELECT * FROM studentlanguage WHERE user_id=:user_id AND student_id=:student_id LIMIT 1";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':user_id', $_SESSION['user_id']);
$stmt->bindParam(':student_id', $_SESSION['profile_id']);
$stmt->execute();
if ($rowCount=$stmt->rowCount()>0){
    $res = $stmt->fetch(PDO::FETCH_ASSOC);
    $exam_type=$res['exam_type'];
    $Listening=$res['Listening'];
    $Reading=$res['Reading'];
    $writing=$res['writing'];
    $speaking=$res['speaking'];
    $overal_band=$res['overal_band'];
    $certificate_date=$res['certificate_date'];

}
Database::disconnect();

if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["languageProfile"])) {
    if (isset($_POST['exam_type']) && !empty($_POST['exam_type'])){$exam_type = $_POST['exam_type'];}else{$error[] = 'Exam Type is empty';}
    if (isset($_POST['Listening']) && !empty($_POST['Listening'])){$Listening = $_POST['Listening'];}else{$error[] = 'Listening is empty';}
    if (isset($_POST['Reading']) && !empty($_POST['Reading'])){$Reading = $_POST['Reading'];}else{$error[] = 'Reading is empty';}
    if (isset($_POST['writing']) && !empty($_POST['writing'])){$writing = $_POST['writing'];}else{$error[] = 'Writing name is empty';}
    if (isset($_POST['speaking']) && !empty($_POST['speaking'])){$speaking = $_POST['speaking'];}else{$error[] = 'Speaking is empty';}
    if (isset($_POST['overal_band']) && !empty($_POST['overal_band'])){$overal_band = $_POST['overal_band'];}else{$error[] = 'Overal Band is empty';}
    if (isset($_POST['certificate_date']) && !empty($_POST['certificate_date'])){$certificate_date = $_POST['certificate_date'];}else{$error[] = 'Certificate Date is empty';}

    if (isset($error) && empty($error)){
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        if ($rowCount>0) {
            $stmt = $pdo->prepare("UPDATE studentlanguage SET
            exam_type=:exam_type,Listening=:Listening,Reading=:Reading,writing=:writing
            ,speaking=:speaking,overal_band=:overal_band,certificate_date=:certificate_date 
            WHERE user_id=:user_id AND student_id=:student_id");
            $stmt->bindParam(':user_id', $_SESSION['user_id']);
            $stmt->bindParam(':student_id', $_SESSION['profile_id']);
            $stmt->bindParam(':exam_type', $exam_type);
            $stmt->bindParam(':Listening', $Listening);
            $stmt->bindParam(':Reading', $Reading);
            $stmt->bindParam(':writing', $writing);
            $stmt->bindParam(':speaking', $speaking);
            $stmt->bindParam(':overal_band', $overal_band);
            $stmt->bindParam(':certificate_date', $certificate_date);
            $stmt->execute();
//        $lastId = $pdo->lastInsertId();
        }else{
            $stmt = $pdo->prepare("INSERT INTO studentlanguage (user_id,student_id,exam_type,Listening,Reading,writing,
               speaking,overal_band,certificate_date) VALUES (:user_id,:student_id,:exam_type,:Listening,
               :Reading,:writing,:speaking,:overal_band,:certificate_date)");
            $stmt->bindParam(':user_id', $_SESSION['user_id']);
            $stmt->bindParam(':student_id', $_SESSION['profile_id']);
            $stmt->bindParam(':exam_type', $exam_type);
            $stmt->bindParam(':Listening', $Listening);
            $stmt->bindParam(':Reading', $Reading);
            $stmt->bindParam(':writing', $writing);
            $stmt->bindParam(':speaking', $speaking);
            $stmt->bindParam(':overal_band', $overal_band);
            $stmt->bindParam(':certificate_date', $certificate_date);
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
    include ('languageprofileform.php');
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