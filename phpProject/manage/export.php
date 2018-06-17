<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">


      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Anyar-HTML Bootstrap theme</title>

      <!-- Bootstrap -->
    <title>Hello, world!</title>
  </head>
  <body>
    <?php include("../navbar2.php"); ?>

    <div class="container">
      <div class="row align-items-center">
        <h3>ส่งออก</h3>
      </div>
      <div class="row align-items-center">
        <div class="col text-center">

        <?php
          if (isset($_GET['id'])) {
          $id=$_GET['id'];

          $hostname = "localhost";
          $username = "root";
          $password = "";
          $dbname = "warehouse";
          $conn = mysql_connect( $hostname, $username, $password );
          mysql_query("SET NAMES UTF8");

          if ( ! $conn ) die ( "ไม่สามารถติดต่อกับ MySQL ได้" );
          mysql_select_db ( $dbname, $conn )or die ( "ไม่สามารถเลือกฐานข้อมูล bookstore ได้" );

          $q2 = "SELECT * FROM warehouse  WHERE id_transection = (SELECT MAX(id_transection) FROM warehouse) ";
          $selectfruit = "SELECT * FROM fruits  WHERE fruit_id = $id ";

          $resFruit = mysql_query($selectfruit,$conn);
          $dataFruit = mysql_fetch_array($resFruit);

          $res = mysql_query($q2,$conn);
          $data = mysql_fetch_array($res);


          if (isset($_POST['submit'])) {
            $export=$_POST['export'];
            $amount_product=$data['amount_product']-$export;
            $user_id=$_SESSION['user_id'];
            $amount=$dataFruit['amount']-$export;

            $updatefruit = "UPDATE fruits SET amount='$amount' WHERE fruit_id='$id' ";
            mysql_query($updatefruit,$conn);
            $query = "INSERT INTO warehouse (amount_product, export, fruit_id, user_id)
             VALUES ('$amount_product','$export','$id','$_SESSION[user_id]')";
             $result = mysql_query($query,$conn);
               if ($result) {
                 mysql_close ( $conn );
                 ?>
                 <div class="alert alert-success" col-md-6 role="alert">
                   Successful!!
                 </div>
                 <?php
                 echo "<script type='text/javascript'>";
                 echo "window.location = '../index.php'";
                 echo "</script>";
               }
             }



          }
         ?>
         </div>
      </div>
      <div class="row align-items-center">

        <div class="col">

            <form action="" method="post">
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="nameee">จำนวนสินค้าในคลัง</label>
              <input type="text" class="form-control" id="nameee"  name="amount_product" value="<?php echo $data['amount_product']; ?>" disabled>
            </div>
            <div class="form-group col-md-6">
              <label for="inputPassword4">ผลไม้</label>
              <input type="text" class="form-control" id="inputPassword4" name="season" value="<?php echo $dataFruit['name']; ?>" disabled>
            </div>
            <div class="form-group col-md-8">
              <label for="inputEmail4">ส่งออก</label>
              <input type="text" class="form-control" id="inputEmail4" name="export">
            </div>


          </div>

          <button type="submit" name="submit" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">เพิ่ม</button>
          <button type="reset" class="btn btn-secondary">Clear</button>
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
