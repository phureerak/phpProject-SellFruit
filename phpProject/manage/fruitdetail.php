<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">

  </head>
  <body>
    <?php include("../navbar2.php"); ?>

    <div class="container">
      <br><br>
      <div class="row align-items-center">
        <div class="col">

          <?php
          //session_start();
          if (isset($_SESSION['status'])) {
            ?>
            <div class="row align-items-center">

              <table class="table table-hover">
                <thead>
                   <tr>
                     <th scope="col">ปริมาณในคลัง</th>
                     <th scope="col">ชื่อ</th>
                     <th scope="col">จำนวนนำเข้า</th>
                     <th scope="col">จำนวนส่งออก</th>
                      <th scope="col">สาขา</th>
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
                    $query = "SELECT * FROM fruits  LEFT JOIN warehouse ON fruits.fruit_id = warehouse.fruit_id
                              LEFT JOIN branch ON branch.warehouse_id = warehouse.warehouse_id
                              WHERE fruits.fruit_id=$_GET[id]";
                    $result = mysql_query($query,$conn);
                    if ($result) {
                            while($row = mysql_fetch_array($result)){
                          echo "<tr><td>".$row['amount_product']."</td><td>".$row['name']."</td><td> ".$row['import']."</td><td>". $row['export'];
                          echo "</td><td>". $row['branch_name']."</td></tr>";
                      }
                    }
                    mysql_close ( $conn );
                   ?>
                </tbody>
              </table>

            </div>

            <?php
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
