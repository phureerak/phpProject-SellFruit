

  <!DOCTYPE html>
  <html lang="en" dir="ltr">
  <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta name="description" content="">
      <meta name="author" content="">
      <link rel="icon" href="../../../../favicon.ico">

      <title>Signin</title>

      <!-- Bootstrap core CSS -->
      <link href="css/bootstrap.min.css" rel="stylesheet">

      <!-- Custom styles for this template -->
      <link href="css/signin.css" rel="stylesheet">
    </head>

    <body class="text-center">
        <form class="form-signin" method="post" action="">
          <img class="mb-4" src="img/services/services4.png" width="30%" height="30%">
          <h1 class="h3 mb-3 font-weight-hard">ManageWereHouse</h1>
          <?php if (isset($_GET['wrong'])) {
          echo  '<div class="alert alert-warning" role="alert">Username or Password is Wrong!!</div>';
          } else{
            echo "<h3 class='h3 mb-3 font-weight-normal'>Please sign in</h3>";
          }
          ?>

          <label for="inputEmail" class="sr-only">Username</label>
          <input type="text" id="inputEmail" class="form-control" name="username" required="" autofocus="" value="root@email.com">
          <br>
          <label for="inputPassword" class="sr-only">Password</label>
          <input type="password" id="inputPassword" class="form-control" placeholder="Password" name="Password" required="">
          <div class="checkbox mb-3">
            <label>
              <input type="checkbox" value="remember-me"> Remember me
            </label>
          </div>
          <button class="btn btn-lg btn-primary btn-block" type="submit" name="submit">Sign in</button>
          <br>
          <a href="Register/register.php" class="btn btn-lg btn-secondary btn-block">
          Register
          </a>
          <br>
          <p class="mt-5 mb-3 text-muted">© 2017-2018</p>
        </form>

    </body>
    <?php
      session_start();

     ?>

     <?php if (isset($_POST['submit'])): ?>
       <?php
         // $_SESSION['username']=$_POST['username'];
         // $_SESSION['password']=$_POST['Password'];
         $user=$_POST['username'];
         $sha1pass = sha1($_POST['Password']);
         $hostname = "localhost";
         $username = "root";
         $password = "";
         $dbname = "warehouse";
         $conn = mysql_connect( $hostname, $username, $password );
         if ( ! $conn ) die ( "ไม่สามารถติดต่อกับ MySQL ได้" );
         mysql_select_db ( $dbname, $conn )or die ( "ไม่สามารถเลือกฐานข้อมูล bookstore ได้" );
         mysql_query("SET NAMES UTF8");
         $query = "SELECT * FROM user Where  username='$user'";

         $result = mysql_query($query,$conn);

        if($result){
          while($row = mysql_fetch_array($result)){
            //print_r($row);
             if ($user==$row["username"]&&($sha1pass==$row["password"]||$_POST['Password']==$row["password"])) {
                $_SESSION["status"]=$row["status"];
                $_SESSION["user_id"]=$row["id"];
                $_SESSION["branch_id"]=$row["branch_id"];
                if ($_SESSION["status"]=="notactive") {
                  echo"<head><meta http-equiv='Refresh'content = '1; URL = changePass.php'></head>";
                }else {
                  echo "<script type='text/javascript'>";
                  echo "window.location = 'index.php?id=$row[status]'";
                  echo "</script>";

                }

             }
          }
           if (!isset($_SESSION["status"])) {
             echo "รหัสผ่านผิด";
             echo "<script type='text/javascript'>";
             echo "window.location = 'login.php?wrong=true'";
             echo "</script>";
           }

        }
         mysql_close ( $conn );
       ?>

     <?php endif; ?>
  </html>
