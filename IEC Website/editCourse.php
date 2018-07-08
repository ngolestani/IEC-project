<?php
include('DataBase.php');
include('isAdmin.php');

$name='';
$gender='';
$age='';
$desc='';
$id='';
$error=[];
if (isset($_GET['id']) && !empty($_GET['id'])){
    $id=$_GET['id'];
    $result=[];
    $pdo = Database::connect();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "SELECT * FROM courses WHERE id=:id LIMIT 1";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $name= $result['name'];
    $gender= $result['type'];
    $age= $result['age'];
    $desc= $result['description'];
}
if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["editCourse"])) {
    if (isset($_POST['name']) && !empty($_POST['name'])){$name = $_POST['name'];}else{$error[] = 'Course name is empty';}
    if (isset($_POST['gender']) && !empty($_POST['gender'])){$gender = $_POST['gender'];}else{$error[] = 'gender name is empty';}
    if (isset($_POST['age']) && !empty($_POST['age'])){$age = $_POST['age'];}else{$error[] = 'age name is empty';}
    if (isset($_POST['description']) && !empty($_POST['description'])){$desc = $_POST['description'];}else{$error[] = 'description is empty';}
    if (isset($error) && empty($error)){
//        var_dump('hi');
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "UPDATE courses SET name=:name,type=:type,age=:age,description=:description WHERE id=:id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':type', $gender);
        $stmt->bindParam(':age', $age);
        $stmt->bindParam(':description', $desc);
        $stmt->execute();
        Database::disconnect();
        header("Location: AllCourses.php");
    }

}

?>
<?php
include('adminheader.php'); ?>
    <div id="main">
        <?php include('editCourseForm.php') ?>
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