<?php

$function_url = "../assets/php/functions.php";
include('./php/admin_functions.php');
if (!isset($_SESSION['admin_auth'])) header('Location:./pages/login.php');
$admin = getAdmin($_SESSION['admin_auth']);
$postss = AllPosts();
// $clubs = getAllClubsCount();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>UCMS | Dashboard</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">

    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
      <img class="animation__shake" src="../assets/images/temp.png" alt="AdminLTELogo" height="60" width="60">
    </div>

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>

      </ul>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">

        <li class="nav-item">
          <a class=" btn btn-sm btn-danger" href="php/admin_actions.php?logout" role="button">
            Logout
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-widget="fullscreen" href="#" role="button">
            <i class="fas fa-expand-arrows-alt"></i>
          </a>
        </li>

      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="http://localhost/ucms/admin/" class="brand-link">
        <img src="../assets/images/temp.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">UCMS</span>
      </a>

      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">

          <div class="info">
            <a href="#" class="d-block"><?= $admin['full_name'] ?></a>
          </div>
        </div>




        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-item">
              <a href="?dashboard" class="nav-link">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  Dashboard

                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="?edit_profile" class="nav-link">
                <i class="nav-icon fas fa-user"></i>
                <p>
                  Edit Profile
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="?groups" class="nav-link">
                <i class="nav-icon fas fa-users"></i>
                <p>
                  Groups
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="?posts" class="nav-link">
                <i class="nav-icon fas fa fa-clipboard"></i>
                <p>
                  Posts
                </p>
              </a>
            </li>

          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">
                <?php if (isset($_GET['edit_profile'])) {
                  echo "Edit Profile";
                } elseif (isset($_GET['groups'])) {
                  echo "Groups";
                } elseif (isset($_GET['posts'])) {
                  echo "Posts";
                } else {

                  echo "Dashboard";
                } ?>
              </h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">

              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <!-- Small boxes (Stat box) -->
          <?php if (isset($_GET['edit_profile'])) {
          } elseif (isset($_GET['groups'])) {
          } elseif (isset($_GET['posts'])) {
          } else {
          ?>
            <!-- Dashboard users,posts,commnts, likes -->
            <div class="row">
              <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-info">
                  <div class="inner">
                    <h3><?= totalUsersCount() ?></h3>

                    <p>Total Users</p>
                  </div>
                  <div class="icon">
                    <i class="ion ion-person-stalker"></i>
                  </div>
                </div>
              </div>
              <!-- ./col -->
              <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-success">
                  <div class="inner">
                    <h3><?= totalPostsCount() ?></h3>
                    <p>Total Posts</p>
                  </div>

                  <div class="icon">
                    <i class="ion ion-images"></i>
                  </div>

                </div>
              </div>
              <!-- ./col -->
              <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-warning">
                  <div class="inner">
                    <h3><?= totalCommentsCount() ?></h3>
                    <p>Total Comments</p>
                  </div>
                  <div class="icon">
                    <i class="ion ion-chatboxes"></i>
                  </div>

                </div>
              </div>
              <!-- ./col -->
              <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-danger">
                  <div class="inner">
                    <h3><?= totalLikesCount() ?></h3>
                    <p>Total Likes</p>
                  </div>
                  <div class="icon">
                    <i class="ion ion-ios-heart"></i>
                  </div>
                </div>
              </div>
              <!-- ./col -->
            </div>
          <?php
          }

          ?>

          <!-- /.row -->
          <!-- Main row -->
          <div class="row">
            <?php
            if (isset($_GET['edit_profile'])) {
            ?>
              <div class="card card-primary col-12">
                <div class="card-header">
                  <h3 class="card-title">Edit Your Profile</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <?= showError('adminprofile') ?>
                <form method="post" action="php/admin_actions.php?updateprofile">
                  <input type="hidden" name="user_id" value="<?= $admin['id'] ?>">
                  <div class="card-body">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Full Name</label>
                      <input type="text" name="full_name" value="<?= $admin['full_name'] ?>" class="form-control" id="exampleInputEmail1" placeholder="Enter Full Name" required>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Email address</label>
                      <input type="email" name="email" value="<?= $admin['email'] ?>" class="form-control" id="exampleInputEmail1" placeholder="Enter email" required>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Password</label>
                      <input type="text" name="password" value="<?= $admin['password_text'] ?>" class="form-control" id="exampleInputPassword1" placeholder="Password">
                    </div>


                  </div>
                  <!-- /.card-body -->

                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Update Profile</button>
                  </div>
                </form>
              </div>
            <?php
            } elseif (isset($_GET['groups'])) { ?>
              <div class="mt-3 d-flex justify-content-between align-items-center">
                <button type="button" class="btn btn-lg btn-warning rounded-pill" data-toggle="modal" data-target="#createGroupModal">Create Clubs</button>
              </div>
              <?php
              // if($clubs<1){
              // <div class='container mt-5  border shadow-sm rounded bg-white p-5 d-flex justify-content-center'>
              // <h1>No Groups to operate</h1>
              // </div>
              // }
              // 
              ?>







              <?php
            } elseif (isset($_GET['posts'])) {
              foreach ($postss as $post) { ?>
                <div class="container col-9 rounded-0 d-flex justify-content-between">
                  <div class="col-8">
                    <div class="card mt-4">
                      <div class="card-title d-flex justify-content-between  align-items-center">

                        <div class="d-flex align-items-center p-2">
                          <img src="../assets/images/profile/<?= $post['profile_pic'] ?>" alt="" height="30" width="30" class="rounded-circle border">&nbsp;&nbsp;<a href='?u=<?= $post['username'] ?>' class="text-decoration-none text-dark"><?= $post['first_name'] ?> <?= $post['last_name'] ?></a>

                        </div>
                        <div class="p-2">
                          <div class="dropdown">

                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-three-dots-vertical" id="option<?= $post['id'] ?>" data-bs-toggle="dropdown" aria-expanded="false" viewBox="0 0 16 16">
                              <path d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z" />
                            </svg>

                            <!-- <i class="bi bi-three-dots-vertical" id="option<?= $post['id'] ?>" data-bs-toggle="dropdown" aria-expanded="false"></i> -->

                            <ul class="dropdown-menu" aria-labelledby="option<?= $post['id'] ?>">
                              <li><a class="dropdown-item" href="../assets/php/actions.php?deletepost=<?= $post['id'] ?>"><i class="bi bi-trash-fill"></i> Delete Post</a></li>
                            </ul>
                          </div>
                        </div>
                      </div>
                      <img src="../assets/images/posts/<?= $post['post_img'] ?>" loading=lazy class="" alt="...">
                      <h4 style="font-size: x-larger" class="p-2 border-bottom"><i class="bi bi-heart"></i>&nbsp;&nbsp;<i class="bi bi-chat-left"></i>
                      </h4>
                      <div class="card-body">
                        <?= $post['post_text'] ?>

                      </div>



                    </div>
                  </div>
                </div>







              <?php
              }
            } else {
              ?>

              <div class="card w-100">
                <div class="card-header">
                  <h3 class="card-title">User Lists</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <?php
                  $userslist = getUsersList();
                  $count = 1;
                  ?>
                  <table class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th>#No</th>
                        <th>User</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody>

                      <?php
                      foreach ($userslist as $user) {
                      ?>
                        <tr>
                          <td>#<?= $count ?></td>
                          <td>
                            <div class="d-flex">
                              <div>
                                <img src="../assets/images/profile/<?= $user['profile_pic'] ?>" class="rounded-circle border border-2 shadow-sm mx-2" width="55px" height="55px" />
                              </div>
                              <div>
                                <h5><?= $user['first_name'] . ' ' . $user['last_name'] ?> - <span class="text-muted">@<?= $user['username'] ?></span></h5>
                                <h6 class="text-muted"><?= $user['email'] ?></h6>


                              </div>
                            </div>
                          </td>

                          <td>


                            <a href="./php/admin_actions.php?userlogin=<?= $user['email'] ?>" target="_blank" class="btn btn-success btn-sm m-1">Login User</a>

                            <?php if ($user['ac_status'] == 0) : ?><button class="m-1 btn btn-warning btn-sm verify_user_btn" data-user-id="<?= $user['id'] ?>">Verify</button><?php endif; ?>


                            <button style="display:<?= $user['ac_status'] == 1 ? '' : 'none' ?>" class="m-1 btn btn-danger btn-sm block_user_btn ub" data-user-id="<?= $user['id'] ?>">Block</button>
                            <button style="display:<?= $user['ac_status'] == 2 ? '' : 'none' ?>" class="m-1 btn btn-primary btn-sm unblock_user_btn" data-user-id="<?= $user['id'] ?>">Unblock</button>



                          </td>

                        </tr>
                      <?php
                        $count++;
                      }
                      ?>


                    </tbody>
                  </table>
                <?php
              }
                ?>
                </div>
                <!-- /.row (main row) -->
              </div><!-- /.container-fluid -->
      </section>
      <!-- /.content -->
    </div>


    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
  </div>
  <!-- Edit Clubs Modal-->
  <div class="modal fade" id="createGroupModal" tabindex="-1" role="dialog" aria-labelledby="createGroupModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="createGroupModalLabel">Create Group</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form method="post" action="admin/php/admin_actions.php?createCLubs" enctype="multipart/form-data">
            <div class="form-group">
              <label for="club_name">Club Name</label>
              <input type="text" class="form-control" id="club_name" name="club_name" placeholder="Enter club name">
            </div>
            <div class="form-group">
              <label for="email">Email</label>
              <input type="email" class="form-control" id="email" name="email" placeholder="Enter email">
            </div>
            <div class="form-group">
              <label for="club_description">Club Description</label>
              <textarea class="form-control" id="club_description" name="club_description" rows="3" placeholder="Enter club description"></textarea>
            </div>
            <div class="form-group">
              <label for="profile_pic">Profile Pic</label>
              <input type="file" class="form-control-file" id="profile_pic" name="profile_pic">
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary" id="save_changes_btn">Save Changes</button>
        </div>
      </div>
    </div>
  </div>

  <!-- ./wrapper -->

  <!-- jQuery -->
  <script src="plugins/jquery/jquery.min.js"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="plugins/jquery-ui/jquery-ui.min.js"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script>
    $.widget.bridge('uibutton', $.ui.button)
  </script>
  <!-- Bootstrap 4 -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  <!-- ChartJS -->
  <script src="plugins/chart.js/Chart.min.js"></script>
  <!-- Sparkline -->
  <script src="plugins/sparklines/sparkline.js"></script>
  <!-- JQVMap -->
  <script src="plugins/jqvmap/jquery.vmap.min.js"></script>
  <script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
  <!-- jQuery Knob Chart -->
  <script src="plugins/jquery-knob/jquery.knob.min.js"></script>
  <!-- daterangepicker -->
  <script src="plugins/moment/moment.min.js"></script>
  <script src="plugins/daterangepicker/daterangepicker.js"></script>
  <!-- Tempusdominus Bootstrap 4 -->
  <script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
  <!-- Summernote -->
  <script src="plugins/summernote/summernote-bs4.min.js"></script>
  <!-- overlayScrollbars -->
  <script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
  <!-- AdminLTE App -->

  <!--posts -->
  <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script> -->
  <script src="../assets/js/jquery-3.6.0.min.js"></script>






  <script src="dist/js/adminlte.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="dist/js/demo.js"></script>
  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  <script src="dist/js/pages/dashboard.js"></script>
  <script src="js/actions.js?v=<?= time() ?>"></script>


  <!-- test -->
  <!-- jQuery and Bootstrap JS -->
  <script src="../admin/js/poper.js"></script>
  <script src="../admin/js/bootstrap_min.js"></script>


</body>

</html>
<?php

if (isset($_SESSION['error'])) {
  unset($_SESSION['error']);
}
?>