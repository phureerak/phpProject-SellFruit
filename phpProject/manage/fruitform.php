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
        <h3>กรุณากรอกข้อมูลผลไม้</h3>
      </div>
      <div class="row align-items-center">
        <div class="col text-center">

        <?php

          if (isset($_POST['ok'])||isset($_GET['fruit_id'])) {
            $hostname = "localhost";
            $username = "root";
            $password = "";
            $dbname = "warehouse";
            $conn = mysql_connect( $hostname, $username, $password );
            mysql_query("SET NAMES UTF8");
            if ( ! $conn ) die ( "ไม่สามารถติดต่อกับ MySQL ได้" );
            mysql_select_db ( $dbname, $conn )or die ( "ไม่สามารถเลือกฐานข้อมูล bookstore ได้" );
            $target_name='';
            if (isset($_POST['ok'])) {

              if (isset($_FILES["fileToUpload"]["name"])) {
                $target_dir = "imagefruit/";
                $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
                $target_name=$target_file;
                $uploadOk = 1;
                $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                // Check if image file is a actual image or fake image

                    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
                    //print_r($check);
                    if($check !== false) {
                        echo "File is an image - " . $check["mime"] . ".";
                        $uploadOk = 1;
                    } else {
                        echo "File is not an image.";
                        $uploadOk = 0;
                    }
                    if ($uploadOk == 0) {
                    echo "Sorry, your file was not uploaded.";
                    // if everything is ok, try to upload file
                    } else {
                        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], "../".$target_file)) {
                            echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
                        } else {
                            echo "Sorry, there was an error uploading your file.";
                        }
                    }
                }

              $name=$_POST['name'];
              $season=$_POST['season'];
              $price_buy=$_POST["price_buy"];
              $price_sale=$_POST["price_sale"];
              if ($_POST['ok']=="Edit") {
                $updatefruit = "UPDATE fruits SET name='$name',havast_season='$season',price_buy='$price_buy',price_sale='$price_sale' WHERE fruit_id='$_GET[fruit_id]' ";
                $res = mysql_query($updatefruit,$conn);
                if ($res) {
                  ?>
                  <div class="alert alert-success" col-md-6 role="alert">
                    แก้ไขสำเร็จ!!
                  </div>

                  <?php
                  echo "<script type='text/javascript'>";
                  echo "window.location = 'fruit.php'";
                  echo "</script>";
                }
              }else {
                $query = "INSERT INTO fruits (name, havast_season, price_sale, price_buy,image) VALUES ('$name','$season','$price_sale','$price_buy','$target_name')";
                $result = mysql_query($query,$conn);
                if ($result) {
                  ?>
                  <div class="alert alert-success" col-md-6 role="alert">
                    เพิ่มสำเร็จ!!
                  </div>
                  <?php
                }
              }

            }else {
              $fruit_id=$_GET['fruit_id'];
              $que = " SELECT * FROM fruits WHERE fruit_id='$fruit_id'";
              $res = mysql_query($que,$conn);
              $row = mysql_fetch_array($res);
              mysql_close ( $conn );
            }
          }


           ?>
         </div>
      </div>
      <div class="row align-items-center">

        <div class="col">

            <form action="" method="post" enctype = "multipart/form-data">
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="nameee">ชื่อ ผลไม้</label>
              <input type="text" class="form-control" id="nameee" name="name"
                <?php if (isset($row['name'])){
                  echo "value='$row[name]'";
                  }  ?>>
            </div>
            <div class="form-group col-md-6">
              <label for="inputPassword4">ฤดูเก็บเกี่ยว</label>
              <input type="text" class="form-control" id="inputPassword4" name="season"<?php if (isset($row['havast_season'])){
                echo "value='$row[havast_season]'";
              }  ?> required>
            </div>
            <div class="form-group col-md-5">
              <label for="inputEmail4">ราคารับซื้อ</label>
              <input type="text" class="form-control" id="inputEmail4" name="price_buy"<?php if (isset($row['price_buy'])){
                echo "value='$row[price_buy]'";
                }  ?> required>
            </div>
            <div class="form-group col-md-4">
              <label for="dsss">ราคาขาย</label>
              <input type="text" class="form-control" id="dsss" name="price_sale"<?php if (isset($row['price_sale'])){
                echo "value='$row[price_sale]'";
                }  ?> required>
            </div>

              <div class="form-group col-md-4">
                เลือกไฟล์ที่ต้องการ : <input type = "file" name = "fileToUpload" size = "50" id="fileToUpload" required>
              </div>

          </div>
          <button type="submit" name="ok" class="btn btn-primary" <?php if (isset($_GET['fruit_id'])) echo "value='Edit'" ?>  required><?php if (isset($_GET['fruit_id'])) {
            echo "แก้ไข";
          }else {
            echo "เพิ่ม";
          } ?></button>
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
