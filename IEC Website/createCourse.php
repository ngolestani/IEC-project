<?php
include('DataBase.php');
include('isAdmin.php');
?>
<?php
$name='';
$gender='';
$age='';
$desc='';
$error=[];
if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["addCourse"])) {
    if (isset($_POST['name']) && !empty($_POST['name'])){$name = $_POST['name'];}else{$error[] = 'Course name is empty';}
    if (isset($_POST['gender']) && !empty($_POST['gender'])){$gender = $_POST['gender'];}else{$error[] = 'gender name is empty';}
    if (isset($_POST['age']) && !empty($_POST['age'])){$age = $_POST['age'];}else{$error[] = 'age name is empty';}
    if (isset($_POST['description']) && !empty($_POST['description'])){$desc = $_POST['description'];}else{$error[] = 'description is empty';}
    if (isset($error) && empty($error)){
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $pdo->prepare("INSERT INTO courses (name,type,age,description) VALUES (:name,:type,:age,:description)");
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':type', $gender);
        $stmt->bindParam(':age', $age);
        $stmt->bindParam(':description', $desc);
        $stmt->execute();
        Database::disconnect();
        header("Location: AllCourses.php",false);
    }

}

?>
<?php
include('adminheader.php'); ?>
    <div id="main">
        <?php include('AddCourseForm.php') ?>
    </div>
<div class="main-footer">
    <div class="container bg-dark color-white">
        <div class="row">
            <div class="col-12 text-center mt-3">
                <p >&copy; 2018. International Education Consultants || Design by Nader Golestani</p>
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