<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round|Open+Sans">


  </head>
  <body>
    <?php include("../navbar2.php"); ?>

    <div class="container">
      <br><br>
      <div class="row align-items-center">
        <div class="col">

          <?php

          if (isset($_SESSION['status'])) {

            ?>
            <div class="row align-items-center">

              <table class="table table-hover">
                <thead>
                   <tr>
                     <th scope="col">ปริมาณสินค้าในคลัง</th>
                     <th scope="col">นำเข้าคลัง</th>
                     <th scope="col">ส่งออก</th>
                     <th scope="col">ชื่อผลไม้</th>
                      <th scope="col">ชื่อสาขา</th>
                   </tr>
                 </thead>
                <tbody>
                  <?php

                    $hostname = "localhost";
                    $username = "root";
                    $password = "";
                    $dbname = "warehouse";
                    $conn = mysql_connect( $hostname, $username, $password );
                    mysql_query("SET NAMES UTF8");

                    if ( ! $conn ) die ( "ไม่สามารถติดต่อกับ MySQL ได้" );
                    mysql_select_db ( $dbname, $conn )or die ( "ไม่สามารถเลือกฐานข้อมูล bookstore ได้" );

                    $query = "SELECT * FROM warehouse  LEFT JOIN branch ON branch.warehouse_id = warehouse.warehouse_id
                    LEFT JOIN fruits ON fruits.fruit_id = warehouse.fruit_id ORDER BY id_transection";
                    $result = mysql_query($query,$conn);
                    if ($result) {
                            while($row = mysql_fetch_array($result)){
                          echo "<tr><td>".$row['amount_product']."</td><td>".$row['import']."</td><td> ".$row['export']."</td><td>". $row['name']."</td><td>".$row['branch_name']."</td></tr>";

                      }
                    }
                    mysql_close ( $conn );

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
            <div class="modal fade" id="example" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">ยืนยันการลบ</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="button" class="btn btn-primary" onclick="window.location.href='fruit.php?delete=<?php echo $iddelete ?>'">ลบ</button>
                </div>
              </div>
            </div>
          </div>
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
