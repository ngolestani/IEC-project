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
<?php
include ('footer.html');
?>