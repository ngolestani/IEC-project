<?php
include('DataBase.php');
include('isAgent.php');

$result=[];

$pdo = Database::connect();
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$sql = "SELECT id,first_name,last_name,email,country FROM students WHERE agent_id=:agent_id";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':agent_id', $_SESSION['profile_id']);
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<?php include('agentsheader.php'); ?>
    <div id="main">
        <div class="container">
            <div class="input-group input-group-sm my-3 col-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-sm">Search</span>
                </div>
                <input type="text" id="searching" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm">
            </div>
        </div>
        <div class="container">
            <table class="table table-striped table-sm mb-4 border-bottom">
                <thead>
                <tr class="text-center">
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Country</th>
<!--                    <th scope="col">Edit</th>-->
                </tr>
                </thead>
                <tbody id="result">
                <?php foreach ($result as $res){ ?>
                    <tr class="text-center">
                        <td><?php print $res['first_name'] ?></td>
                        <td><?php print $res['last_name'] ?></td>
                        <td><?php print $res['email'] ?></td>
                        <td><?php print $res['country'] ?></td>
<!--                        <td>-->
<!--                            <a href="showStudentAgent.php?id=--><?php //print $res['id'] ?><!-- " class="btn btn-warning btn-sm">Show Student Info</a>-->
<!--                        </td>-->
                    </tr>
                <?php } ?>
                </tbody>
            </table>

        </div>
    </div>
    <script
        src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
        crossorigin="anonymous"></script>
    <script>
        var courses = <?php print json_encode($result) ?>;
        var courseArray = [];
        courses.forEach(function(element,i) {
            var arr = $.map(element, function(value) {
                return [value];
            });
            courseArray[i] = arr;
        });
        console.log(courseArray);
        $("#searching").keyup(function(event) {
            var query = $(this).val();
            var html='';
            var result = [];
            if(query.length !=0) {
                if (query.length >= 2 || event.keyCode == 8) {
                    courseArray.forEach(function (element, i) {
                        var counter = 0;
                        element.forEach(function (value) {
                            if (value.search(query) != -1) {
                                counter++;
                            }
                        });
                        if (counter > 0) {
                            result[i] = element;
                        }
                    });
                    result.forEach(function (value) {
                        html += '<tr class="text-center"><td>' + value[1] + '</td>';
                        html += '<td>' + value[2] + '</td>';
                        html += '<td>' + value[3] + '</td>';
                        html += '<td>' + value[4] + '</td>';
                        html += '</tr>';
                    });
                    var div = document.getElementById('result');
                    div.innerHTML = html;
                }
            }else {
                courseArray.forEach(function (value) {
                    html += '<tr class="text-center"><td>' + value[1] + '</td>';
                    html += '<td>' + value[2] + '</td>';
                    html += '<td>' + value[3] + '</td>';
                    html += '<td>' + value[4] + '</td>';
                    html += '</tr>';
                });
                var div = document.getElementById('result');
                div.innerHTML = html;
            }
        });
        console.log(courseArray);


        // if ($.inArray('secondary',element) == 0) {
        //     result[i]=element;
        // }
        // var target = "math";
        // var result = $.makeArray(courses[0]);
        // result = $.inArray(result);
        // var result = $.grep(courses[0], function(e){ return e.target == target; });
        // console.log(result);
        // console.log(courses[0].indexOf('math'));
    </script>
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