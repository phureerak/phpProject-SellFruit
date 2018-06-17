<?php session_start(); ?>
<nav class="navbar navbar-expand-lg navbar-light bg-light ">
  <a class="navbar-brand" href="index.php">Warehouse</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav">
      <a class="nav-item nav-link active" href="index.php">หน้าแรก <span class="sr-only">(current)</span></a>
      <?php if (isset($_SESSION['status'])&&$_SESSION['status']=='admin'): ?>
      <a class="nav-item nav-link " href="manage/fruit.php">จัดการสินค้า</a>
      <a class="nav-item nav-link " href="warehouse/manageWH.php">ดูคลังสินค้า</a>
      <a class="nav-item nav-link  " href="user/manageuser.php">จัดการผู้ใช้</a>
      <!-- <a class="nav-item nav-link" href="#">Setting</a> -->
      <?php endif; ?>
      <?php if (isset($_SESSION['status'])): ?>
        <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle nav-link " data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Profile</a>
      <div class="dropdown-menu">
        <a class="dropdown-item " href="user/infoProfile.php">infoProfile</a>
        <a class="dropdown-item " href="user/edituser.php?id=<?php echo $_SESSION['user_id'] ?>">Edit Profile</a>
        <a class="dropdown-item " href="changePass.php">ChangePassword</a>
      </div>
      </li>
      <a class="nav-item nav-link alert-danger align-items-left " href="" data-toggle="modal" data-target="#exampleModal"> Logout</a>
      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">ยืนยันการ logout </h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
              <button type="button" class="btn btn-primary alert-warning" onclick="window.location.href='index.php?logout=true'">Logout</button>
            </div>
          </div>
        </div>
      </div>
      <?php endif; ?>
      <?php if (isset($_GET['logout'])):
      session_destroy();
      echo "<script type='text/javascript'>";
      echo "window.location = 'login.php'";
      echo "</script>";
        ?>

      <?php endif; ?>
    </div>
  </div>
</nav>
