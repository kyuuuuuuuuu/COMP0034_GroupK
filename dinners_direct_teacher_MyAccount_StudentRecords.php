<?php require_once ('dinners_direct_header.php');?>

<?php require ('functions.php')?>


<header class="card-header text-center">
    <h1>Welcome to your Teacher's Account!</h1>
</header>


<div class="container">
    <br><br>
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-4">

            <img class="img-profile rounded-circle" src="img/kien.jpg" style="width:200px;height:200px;"><br>
            <h2 class="text-left">Trung Kiên Nguyễn's giáo viên </h2>
            <!--            <div class="name"><small>Trung Kien Nguyen</small></div><br><br>-->
        </div>
        <div class="col-md-7">
            <br><br>
            <h3 >Xin Chao Kiên's giáo viên. From your account dashboard, you can view your student's details, approve students, edit your password and account details. </h3>
        </div>
    </div>


    <br><hr><br><br>

    <div class="row">
        <div class="col-lg-4">

            <div class="nav list-group text-center text-uppercase">
                <a class="nav-link list-group-item" href="#v-pills-home">Profile</a>
                <a class="nav-link list-group-item" href="dinners_direct_teacher_MyAccount_ApproveStudents.php">Approve Students</a>
                <a class="nav-link list-group-item" href="dinners_direct_teacher_MyAccount_StudentRecords.php">View Students' Records</a>
                <a class="nav-link list-group-item" href="dinners_direct_MyAccount_EditAccount.php">Edit Account</a>
                <a class="nav-link list-group-item" href="index.php">Logout</a>
            </div>

        </div>
<!--        <hr class="sidebar-divider d-none d-md-block">-->
        <div class="col-lg-8">
            <div class="col-md-2"></div>
            <div class="col-md-6" style="height:50px;">
                <div class="form-group">
                    <div class='input-group date' id='datetimepicker8'>
                        <input type='date' class="form-control" />
                        <span class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar">
                    </span>
                </span>
                    </div>
                </div>
            </div>
<!--            <script>-->
<!--               $(document).ready(function(){-->
<!--                   $('.datetimepicker8').datepicker({-->
<!--                       format: 'dd/mm/yyyy',-->
<!--                       startDate: '01/01/2000',-->
<!--                       endDate: '30/12/2020'-->
<!--                   });-->
<!--               });-->
<!--            </script>-->
            <div class="tab-content">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col">No.</th>
                        <th scope="col">First Name</th>
                        <th scope="col">Last Name</th>
                        <th scope="col">Email Address</th>
                        <th scope="col">Order ID</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>Trung Kien</td>
                        <td>Nguyen</td>
                        <td>zcectkn@ucl.ac.uk</td>
                        <td>a123c</td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>Yeo Jin</td>
                        <td>Lee</td>
                        <td>zcecyjl@ucl.ac.uk</td>
                        <td>b234d</td>
                    </tr>
                    <tr>
                        <th scope="row">3</th>
                        <td>Koon Yew</td>
                        <td>Ling</td>
                        <td>zceckyl@ucl.ac.uk</td>
                        <td>c345e</td>
                    </tr>
                    </tbody>
                </table>

            </div>
        </div>
    </div>


</div>

<?php require_once ('dinners_direct_footer.php');?>
