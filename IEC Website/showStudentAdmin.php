<?php
include('isAdmin.php');
include('DataBase.php');

$result=[];
$pdo = Database::connect();
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$sql = "SELECT id,first_name,last_name,email,country FROM agents";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);


$agentId='';
$studentId='';

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
$selected = [];

if (isset($_GET['id']) && !empty($_GET['id'])){
    $id=$_GET['id'];
    $res=[];

    $sql = "SELECT * FROM students WHERE id=:id LIMIT 1";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $res = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($res['agent_id']>0){
        $selected[]=$res['agent_id'];
    }

//    $name=$res['name'];
//    $type=$res['type'];
//    $refund_policy=$res['refund_policy'];
//    $age=$res['age'];
//    $address1=$res['address1'];
//    $address2=$res['address2'];
//    $city=$res['city'];
//    $region=$res['region'];
//    $post_code=$res['post_code'];
//    $country=$res['country'];
//    $website=$res['website'];
//    $telephone=$res['telephone'];
//    $email=$res['email'];
//    $commission=$res['commission'];
//    $comment=$res['comment'];
//    $how_to_apply=$res['how_to_apply'];
//    $payment_method=$res['payment_method'];
//    $enrolment_requirement=$res['enrolment_requirement'];

//    $sql = "SELECT * FROM course_institute WHERE institute_id=:id";
//    $stmt = $pdo->prepare($sql);
//    $stmt->bindParam(':id', $id);
//    $stmt->execute();
//    $res = $stmt->fetchALL(PDO::FETCH_ASSOC);
//    foreach ($res as $iID){
//        $selected[]=$iID['course_id'];
//    }
}
Database::disconnect();

if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["attachAgent"])) {

    if (isset($_POST['agentId']) && !empty($_POST['agentId'])){ $agentId= $_POST['agentId'];}else{$error[] = 'Agent ID name is empty';}
    if (isset($_POST['studentId']) && !empty($_POST['studentId'])){$studentId = $_POST['studentId'];}else{$error[] = 'Student ID name is empty';}

    if (isset($error) && empty($error) && !empty($agentId)){
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $pdo->prepare("UPDATE students SET
                    agent_id=:agent_id WHERE id=:student_id");
        $stmt->bindParam(':student_id', $studentId);
        $stmt->bindParam(':agent_id', $agentId);
        $stmt->execute();

        Database::disconnect();
        header("Location: showallstudents.php",false);
    }elseif (empty($agentId)){
        $agentId = 0;
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $pdo->prepare("UPDATE students SET
                    agent_id=:agent_id WHERE id=:student_id");
        $stmt->bindParam(':student_id', $studentId);
        $stmt->bindParam(':agent_id', $agentId);
        $stmt->execute();

        Database::disconnect();
        header("Location: showallstudents.php",false);
    }
}

?>

<?php
include('adminheader.php');
?>
    <div id="main">
        <section class="bar pt-0">
            <div class="row">
                <div class="col-md-12">
                    <div class="heading text-center">
                        <h2>form</h2>
                    </div>
                </div>
            </div>
            <div class="row">

                <?php if (isset($error) && !empty($error)){?>
                    <div class="container">
                        <div class="row">
                            <ul>
                                <?php foreach ($error as $e){ ?>
                                    <li class="list-group-item btn-danger">
                                        <?php echo $e ?>
                                    </li>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>
                <?php } ?>

                <div class="container">
                    <div class="row">
                        <form action="showStudentAdmin.php?id=<?php print $_GET['id']?>" method="post" class="col-lg-6">

                    </div>

                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="agentId"><Strong>Agent ID</strong></label>
                            <input id="agentId" readonly value='<?php isset($selected) ?  print implode(',',$selected) : print "" ?>'
                                   name="agentId" type="text"  class="form-control">
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="studentId"><Strong>Student ID</strong></label>
                            <input id="studentId" readonly value='<?php isset($_GET['id']) ?  print $_GET['id'] : print "" ?>'
                                   name="studentId" type="text"  class="form-control">
                        </div>
                    </div>


                    <div class="col-md-6">
                        <div class="form-group">

                            <input  type="Submit" name="attachAgent" class="form-control">
                        </div>
                    </div>

                    </form>
                </div>


                <div class="container">
                    <div class="input-group input-group-sm my-3 col-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-sm">Search</span>
                        </div>
                        <input type="text" id="searching" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm">
                    </div>
                </div>
                <div class="container ">
                    <table style="width: 55%" class="table table-striped table-sm mb-4 border-bottom float-left mr-2">
                        <thead>
                        <tr class="text-center">
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Country</th>
                            <th scope="col">Attach</th>
                        </tr>
                        </thead>
                        <tbody id="result" style="overflow-y: scroll; height: 25px;">
                        <?php foreach ($result as $res){ ?>
                            <?php if (!in_array($res['id'],$selected)){ ?>
                                <tr class="text-center">
                                    <td><?php print $res['first_name'] .' ' . $res['last_name'] ?></td>
                                    <td><?php print $res['email'] ?></td>
                                    <td><?php print $res['country'] ?></td>
                                    <td>
                                        <button type="button" value="<?php print $res['id']?>" onclick="attachCourse(this)" id="<?php print $res['id']?>" class="btn btn-sm btn-primary">Attach Course</button>
                                    </td>
                                </tr>
                            <?php }?>
                        <?php } ?>
                        </tbody>
                    </table>
                    <table style="width: 35%" class="table table-striped table-sm mb-4 border-bottom float-right ">
                        <thead>
                        <tr class="text-center">
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Country</th>
                            <th scope="col">Attach</th>
                        </tr>
                        </thead>
                        <tbody id="chosen">
                        <?php foreach ($result as $res){ ?>
                            <?php if (in_array($res['id'],$selected)){ ?>
                                <tr class="text-center">
                                    <td><?php print $res['first_name'] . ' '. $res['last_name'] ?></td>
                                    <td><?php print $res['email'] ?></td>
                                    <td><?php print $res['country'] ?></td>
                                    <td>
                                        <button type="button" value="<?php print $res['id']?>" onclick="detachCourse(this)" id="detach" class="btn btn-sm btn-danger">Detach Course</button>
                                    </td>
                                </tr>
                            <?php } ?>
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
                var selected = <?php print json_encode($selected) ?>;
                var courseArray = [];
                courses.forEach(function(element,i) {
                    var arr = $.map(element, function(value) {
                        return [value];
                    });
                    courseArray[i] = arr;
                });
                // courseArray.forEach(function(element,i) {
                //     console.log(element[0]);
                //     console.log(selected.indexOf(element[0]));
                //     if (selected.indexOf(element[0]) != 0) {
                //      console.log('done');
                //     }
                //     });
                $("#searching").keyup(function(event) {
                    var query = $(this).val();
                    var html='';
                    var result = [];
                    if(query.length != 0) {
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
                                console.log(selected.includes(value[0]));
                                if (!selected.includes(value[0])) {
                                    html += '<tr class="text-center"><td>' + value[1] +' '+ value[2] + '</td>';
                                    html += '<td>' + value[3] + '</td>';
                                    html += '<td>' + value[4] + '</td>';
                                    html += '<td>' +
                                        '<button type="button" value="' + value[0] + '" onclick="attachCourse(this)" id="' + value[0] + '" class="btn btn-sm btn-primary">Attach Course</button>'
                                        + '</td>';
                                }
                            });
                            var div = document.getElementById('result');
                            div.innerHTML = html;
                        }
                    }else {
                        courseArray.forEach(function (value) {
                            if (!selected.includes(value[0])) {
                                html += '<tr class="text-center"><td>' + value[1] +' '+ value[2] + '</td>';
                                html += '<td>' + value[3] + '</td>';
                                html += '<td>' + value[4] + '</td>';
                                html += '<td>' +
                                    '<button type="button" value="' + value[0] + '" onclick="attachCourse(this)" id="' + value[0] + '" class="btn btn-sm btn-primary">Attach Course</button>'
                                    + '</td>';
                            }
                        });
                        var div = document.getElementById('result');
                        div.innerHTML = html;
                    }
                });
                function attachCourse(e) {
                    var html='';
                    var htmlc='';
                    selected.pop();
                    selected.push(document.getElementById(e.id).getAttribute('value'));
                    $('#agentId').val(selected.toString());
                    courseArray.forEach(function (value,i) {
                        if (!selected.includes(value[0])) {
                            html += '<tr class="text-center"><td>' + value[1] +' '+ value[2] + '</td>';
                            html += '<td>' + value[3] + '</td>';
                            html += '<td>' + value[4] + '</td>';
                            html += '<td>' +
                                '<button type="button" value="' + value[0] + '" onclick="attachCourse(this)" id="' + value[0] + '" class="btn btn-sm btn-primary">Attach Course</button>'
                                + '</td>';
                        }else{
                            htmlc += '<tr class="text-center"><td>' + value[1] +' '+ value[2] + '</td>';
                            htmlc += '<td>' + value[3] + '</td>';
                            htmlc += '<td>' + value[4] + '</td>';
                            htmlc += '<td>' +
                                '<button type="button" value="' + value[0] + '" onclick="detachCourse(this)" id="' + value[0] + '" class="btn btn-sm btn-danger">Detach Course</button>'
                                + '</td>';
                        }
                        var div = document.getElementById('result');
                        div.innerHTML = html;
                        var div = document.getElementById('chosen');
                        div.innerHTML = htmlc;
                    });

                }

                function detachCourse(e) {
                    var html='';
                    var htmlc='';
                    $valu = document.getElementById(e.id).getAttribute('value');
                    if (selected.includes($valu)) {
                        selected.pop($valu);
                    }
                    $('#agentId').val(selected.toString());
                    courseArray.forEach(function (value,i) {
                        if (!selected.includes(value[0])) {
                            html += '<tr class="text-center"><td>' + value[1] +' '+ value[2] + '</td>';
                            html += '<td>' + value[3] + '</td>';
                            html += '<td>' + value[4] + '</td>';
                            html += '<td>' +
                                '<button type="button" value="' + value[0] + '" onclick="attachCourse(this)" id="' + value[0] + '" class="btn btn-sm btn-primary">Attach Course</button>'
                                + '</td>';
                        }else{
                            htmlc += '<tr class="text-center"><td>' + value[1] +' '+ value[2] + '</td>';
                            htmlc += '<td>' + value[3] + '</td>';
                            htmlc += '<td>' + value[4] + '</td>';
                            htmlc += '<td>' +
                                '<button type="button" value="' + value[0] + '" onclick="detachCourse(this)" id="' + value[0] + '" class="btn btn-sm btn-danger">Detach Course</button>'
                                + '</td>';
                        }
                        var div = document.getElementById('result');
                        div.innerHTML = html;
                        var div = document.getElementById('chosen');
                        div.innerHTML = htmlc;
                    });

                }
            </script>
        </section>
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