<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">

  </head>
  <body>
    <?php include("navbar.php"); ?>

    <div class="container">
      <br><br>
      <div class="row align-items-center">
        <div class="col">
            <form action="" method="post">
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="nameee">Password Old</label>
              <input type="text" class="form-control" id="nameee" placeholder="รหัสเดิม" name="passold" <?php if (isset($_POST['passold'])) {$va=$_POST['passold'];echo "value='$va'";} ?> >
            </div>
          </div>
          <?php
  
          if (isset($_POST['passold'])) :
            if (isset($_SESSION['status'])&&$_SESSION['status']=="notactive") {
              $passold=$_POST['passold'];
            }else {
              $passold=sha1($_POST['passold']);
            }

          $hostname = "localhost";
          $username = "root";
          $password = "";
          $dbname = "warehouse";
          $conn = mysql_connect( $hostname, $username, $password );
          if ( ! $conn ) die ( "ไม่สามารถติดต่อกับ MySQL ได้" );
          mysql_select_db ( $dbname, $conn )or die ( "ไม่สามารถเลือกฐานข้อมูล bookstore ได้" );
          $query = "SELECT * FROM user Where  id=$_SESSION[user_id]";
          $result = mysql_query($query,$conn);

          if($result){
            while($row = mysql_fetch_array($result)){
              //print_r($row);
               if ($passold==$row["password"]) {
                  ?>
                  <div class="form-row">
                    <div class="form-group col-md-6">
                      <label for="nameee">New Password</label>
                      <input type="password" class="form-control" id="nameee" name="passnew">
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="form-group col-md-6">
                      <label for="nameee">Confirm Password</label>
                      <input type="password" class="form-control" id="nameee" name="passcon">
                    </div>
                  </div>
                  <?php
               }
            }
          }
          if (isset($_POST['passnew'])) {
            if ($_POST['passnew']==$_POST['passcon']) {
              $passnew=sha1($_POST['passnew']);
              $qry = "UPDATE user SET password='$passnew',status='user' WHERE password='$passold'";
              mysql_query($qry,$conn);
              mysql_close ( $conn );
              echo"<head><meta http-equiv='Refresh'content = '1; URL = index.php'></head>";
            }else {
              echo  '<div class="alert alert-warning" role="alert">Please Enter agian</div>';
            }
          }
          ?>

          <?php endif; ?>
          <button type="submit" name="ok" class="btn btn-primary">ยืนยัน</button>
          <button type="reset" class="btn btn-secondary">ลบ</button>
        </form>
        </div>
      </div>
      </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
  </body>
</html>
