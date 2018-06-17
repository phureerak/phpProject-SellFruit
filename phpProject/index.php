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

          <?php
          //session_start();
          if (isset($_SESSION['status'])) {
            ?>
            <div class="row align-items-center">
              <table class="table table-borderless">
                <tbody>
                  <?php
                    if (isset($_SESSION['status'])) {
                    $hostname = "localhost";
                    $username = "root";
                    $password = "";
                    $dbname = "warehouse";
                    $conn = mysql_connect( $hostname, $username, $password );
                    mysql_query("SET NAMES UTF8");

                    if ( ! $conn ) die ( "ไม่สามารถติดต่อกับ MySQL ได้" );
                    mysql_select_db ( $dbname, $conn )or die ( "ไม่สามารถเลือกฐานข้อมูล bookstore ได้" );
                    $query = "SELECT * FROM fruits ";

                    $result = mysql_query($query,$conn);
                    if ($result) {
                      $i=0;

                      while($row = mysql_fetch_array($result)){
                        if ($i%4==0) {
                          echo "<tr>";
                        }
                        ?>
                          <td>
                            <div class="card text-center " style="width: 15rem;">
                              <img class="card-img-top" src="<?php echo $row['image']; ?>?text=Image cap" alt="Card image cap" width="200" height="200">
                              <div class="card-body">
                                <h5 class="card-title"><?php echo $row['name'];  ?></h5>
                                <!-- <p class="card-text">เลือกจัดการได้จากเมนูด้านล่าง</p> -->
                              </div>
                              <ul class="list-group list-group-flush">
                                <a href="manage/addWarehouse.php?id=<?php echo $row['fruit_id'];  ?>" ><li class="list-group-item">นำเข้า</li></a>
                                <a href="manage/export.php?id=<?php echo $row['fruit_id'];  ?>"  ><li class="list-group-item">ส่งออก</li></a>
                                <a href="manage/fruitdetail.php?id=<?php echo $row['fruit_id'];  ?>"  ><li class="list-group-item">รายละเอียดสินค้า</li></a>
                              </ul>
                            </div>
                          </td>

                        <?php
                        $i++;
                        if ($i%4==0) {
                          echo "</tr>";
                        }
                      }
                    }
                    mysql_close ( $conn );
                    }
                   ?>
                </tbody>
              </table>

            </div>

            <?php
          }else {
            echo "<script type='text/javascript'>";
            echo "window.location = 'login.php'";
            echo "</script>";
          }
            ?>


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
