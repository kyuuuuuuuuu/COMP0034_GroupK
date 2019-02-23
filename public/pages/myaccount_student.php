<?php require_once('../../private/shared/pages_header.php');?>

<header class="card-header text-center">
    <h1>Welcome to your student account!</h1>
</header>


<div class="container">
    <br><br>
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-4">

            <img class="img-profile rounded-circle" src="../img/kien.jpg" style="width:200px;height:200px;"><br>
           <h2 class="text-left">Trung Kien Nguyen </h2>
<!--            <div class="name"><small>Trung Kien Nguyen</small></div><br><br>-->
        </div>
    <div class="col-md-7">
        <br><br>
        <h3 >Xin Chao Kien. From your account dashboard, you can view your recent orders, edit your password and account details. </h3>
    </div>
    </div>


    <br><hr><br><br>

    <div class="row">
        <div class="col-lg-4">

            <div class="nav list-group text-center text-uppercase">
                <a class="nav-link list-group-item" onclick="selectStudentTab(0)">Profile</a>
                <a class="nav-link list-group-item" onclick="selectStudentTab(1)">View Orders</a>
                <a class="nav-link list-group-item" onclick="selectStudentTab(2)">Edit Account</a>
                <a class="nav-link list-group-item" href="#">Logout</a>
            </div>

        </div>
        <hr class="sidebar-divider d-none d-md-block">
        <div class="col-lg-8">
            <div class="tab-content">
                <div name="abcd" style="display: none" class="tab-content">
                    <h1>Student Profile</h1>

                </div>
                <div name="abcd" style="display: none" class="tab-content">
                    <h1>View Order</h1>

                </div>
                <div name="abcd" style="display: none" class="tab-content">
                    <label>Email Address:</label>
                    <input type="email" class="form-control" placeholder="Enter your email"><br>
                    <label>Current Password:</label>
                    <input type="password" class="form-control" placeholder="Enter your current password"><br>
                    <label>New Password:</label>
                    <input type="password" class="form-control" placeholder="Enter your new password">

                    <br>

                    <button type="submit" class="btn btn-primary btn-block">Submit</button>


                </div>
            </div>
        </div>
    </div>


</div>




<!---->
<!--<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">-->
<!--<div class="container-fluid">-->
<!--    <div class="row navbar">-->
<!--        <div class="col-md-9 card-header text-center">-->
<!--            <h1>Welcome to My Account</h1>-->
<!--        </div>-->
<!--        <div class="col-md-3">-->
<!--           <ul class="navbar-nav ml-auto align-content-center">-->
<!--                <li class="nav-item dropdown no-arrow">-->
<!--                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">-->
<!--                        <span class="mr-2 d-none d-lg-inline text-gray-600 small">Trung Kien Nguyen</span>-->
<!--                        <img class="img-profile rounded-circle" src="img/kien.jpg" style="width:100px;height:100px;">-->
<!--                    </a>-->
<!--                    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">-->
<!--                        <a class="dropdown-item" href="#">-->
<!--                            <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>-->
<!--                            Profile-->
<!--                        </a>-->
<!--                        <a class="dropdown-item" href="#">-->
<!--                            <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>-->
<!--                            Settings-->
<!--                        </a>-->
<!--                        <a class="dropdown-item" href="#">-->
<!--                            <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>-->
<!--                            Activity Log-->
<!--                        </a>-->
<!--                        <div class="dropdown-divider"></div>-->
<!--                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">-->
<!--                            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>-->
<!--                            Logout-->
<!--                        </a>-->
<!--                    </div>-->
<!--                </li>-->
<!---->
<!--            </ul>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->
<!--</nav>-->
<?php require_once('../../private/shared/pages_footer.php');?>

