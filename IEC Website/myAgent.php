<?php
include('DataBase.php');
include('isStudents.php');

$result='';

$pdo = Database::connect();
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$sql = "SELECT agent_id FROM students WHERE id=:id";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':id', $_SESSION['profile_id']);
$stmt->execute();
$result = $stmt->fetch(PDO::FETCH_ASSOC);

$sql = "SELECT * FROM agents WHERE id=:id";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':id', $result['agent_id']);
$stmt->execute();
$result = $stmt->fetch(PDO::FETCH_ASSOC);

?>

<?php include('studentsheader.php'); ?>
<div id="main">
   <div class="container my-4"><h2>MY AGENT</h2></div>
    <div class="container">
        <table class="table table-striped table-sm mb-4 border-bottom mb-5">
            <thead>
            <tr class="text-center">
                <th scope="col">First Name</th>
                <th scope="col">Last Name</th>
                <th scope="col">Email</th>
                <th scope="col">Country</th>
                <th scope="col">City</th>
                <th scope="col">Region</th>
                <th scope="col">Telephone</th>
                <th scope="col">Mobile</th>
                <th scope="col">Post Code</th>
            </tr>
            </thead>
            <tbody id="result">
                <tr class="text-center">
                    <td><?php print $result['first_name'] ?></td>
                    <td><?php print $result['last_name'] ?></td>
                    <td><?php print $result['email'] ?></td>
                    <td><?php print $result['country'] ?></td>
                    <td><?php print $result['city'] ?></td>
                    <td><?php print $result['region'] ?></td>
                    <td><?php print $result['telephone'] ?></td>
                    <td><?php print $result['mobile'] ?></td>
                    <td><?php print $result['post_code'] ?></td>
                </tr>
            </tbody>
        </table>

    </div>
</div>

<div class="main-footer pb-0 mb-0">
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