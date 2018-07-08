<?php
 include ('DataBase.php');
 include ('isStudents.php');

$result=[];
$pdo = Database::connect();
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$qualification_name='';
$qualification_language='';
$qualification_country='';
$GPA='';
$qualification_institute='';
$qualification_comment='';
$qualification_date='';
$rowCount;
$error=[];

    $sql = "SELECT * FROM studentacademic WHERE user_id=:user_id AND student_id=:student_id LIMIT 1";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':user_id', $_SESSION['user_id']);
    $stmt->bindParam(':student_id', $_SESSION['profile_id']);
    $stmt->execute();
    if ($rowCount=$stmt->rowCount()>0){
    $res = $stmt->fetch(PDO::FETCH_ASSOC);
    $qualification_name=$res['qualification_name'];
    $qualification_language=$res['qualification_language'];
    $qualification_country=$res['qualification_country'];
    $GPA=$res['GPA'];
    $qualification_institute=$res['qualification_institute'];
    $qualification_comment=$res['qualification_comment'];
    $qualification_date=$res['qualification_date'];

}
Database::disconnect();

if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["academicProfile"])) {
    if (isset($_POST['qualification_name']) && !empty($_POST['qualification_name'])){$qualification_name = $_POST['qualification_name'];}else{$error[] = 'Qualification Name is empty';}
    if (isset($_POST['qualification_language']) && !empty($_POST['qualification_language'])){$qualification_language = $_POST['qualification_language'];}else{$error[] = 'Qualification Language is empty';}
    if (isset($_POST['qualification_country']) && !empty($_POST['qualification_country'])){$qualification_country = $_POST['qualification_country'];}else{$error[] = 'Qualification Country is empty';}
    if (isset($_POST['GPA']) && !empty($_POST['GPA'])){$GPA = $_POST['GPA'];}else{$error[] = 'GPA name is empty';}
    if (isset($_POST['qualification_institute']) && !empty($_POST['qualification_institute'])){$qualification_institute = $_POST['qualification_institute'];}else{$error[] = 'Qualification Institute is empty';}
    if (isset($_POST['qualification_comment']) && !empty($_POST['qualification_comment'])){$qualification_comment = $_POST['qualification_comment'];}else{$error[] = 'Qualification Comment is empty';}
    if (isset($_POST['qualification_date']) && !empty($_POST['qualification_date'])){$qualification_date = $_POST['qualification_date'];}else{$error[] = 'Qualification Date is empty';}


    if (isset($error) && empty($error)){
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
       if ($rowCount>0) {
           $stmt = $pdo->prepare("UPDATE studentacademic SET
            qualification_name=:qualification_name,qualification_language=:qualification_language,
            qualification_country=:qualification_country,GPA=:GPA,qualification_institute=:qualification_institute,
            qualification_comment=:qualification_comment,qualification_date=:qualification_date 
            WHERE user_id=:user_id AND student_id=:student_id");
           $stmt->bindParam(':user_id', $_SESSION['user_id']);
           $stmt->bindParam(':student_id', $_SESSION['profile_id']);
           $stmt->bindParam(':qualification_name', $qualification_name);
           $stmt->bindParam(':qualification_language', $qualification_language);
           $stmt->bindParam(':qualification_country', $qualification_country);
           $stmt->bindParam(':GPA', $GPA);
           $stmt->bindParam(':qualification_institute', $qualification_institute);
           $stmt->bindParam(':qualification_comment', $qualification_comment);
           $stmt->bindParam(':qualification_date', $qualification_date);
           $stmt->execute();
//        $lastId = $pdo->lastInsertId();
       }else{
           $stmt = $pdo->prepare("INSERT INTO studentacademic (user_id,student_id,qualification_name,qualification_language,qualification_country,GPA,
               qualification_institute,qualification_comment,qualification_date) VALUES (:user_id,:student_id,:qualification_name,:qualification_language,
               :qualification_country,:GPA,:qualification_institute,:qualification_comment,:qualification_date)");
           $stmt->bindParam(':user_id', $_SESSION['user_id']);
           $stmt->bindParam(':student_id', $_SESSION['profile_id']);
           $stmt->bindParam(':qualification_name', $qualification_name);
           $stmt->bindParam(':qualification_language', $qualification_language);
           $stmt->bindParam(':qualification_country', $qualification_country);
           $stmt->bindParam(':GPA', $GPA);
           $stmt->bindParam(':qualification_institute', $qualification_institute);
           $stmt->bindParam(':qualification_comment', $qualification_comment);
           $stmt->bindParam(':qualification_date', $qualification_date);
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
    include ('academicprofileform.php');
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