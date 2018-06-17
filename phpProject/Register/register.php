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
        <h3>กรุณากรอกข้อมูลตามความจริง</h3>
      </div>
      <div class="row align-items-center">

        <div class="col">

            <form action="registerconfirm.php" method="post">
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="nameee">Name</label>
              <input type="text" class="form-control" id="nameee" placeholder="ชื่อ" name="fname">
            </div>
            <div class="form-group col-md-6">
              <label for="inputPassword4">Lastname</label>
              <input type="text" class="form-control" id="inputPassword4" placeholder="นามสกุล" name="lname">
            </div>
            <div class="form-check form-check-inline col-md-1">
              <input class="form-check-input" type="radio" name="RadioOptions" id="inlineRadio1" value="male" checked>
              <label class="form-check-label" for="inlineRadio1">Male</label>
            </div>
            <div class="form-check form-check-inline col-md-1">
              <input class="form-check-input" type="radio" name="RadioOptions" id="inlineRadio2" value="female">
              <label class="form-check-label" for="inlineRadio2">Female</label>
            </div>
            <div class="form-group col-md-5">
              <label for="inputEmail4">Email</label>
              <input type="email" class="form-control" id="inputEmail4" placeholder="รับรหัสในอีเมลล์" name="email">
            </div>
            <div class="form-group col-md-4">
              <label for="dsss">Username</label>
              <input type="text" class="form-control" id="dsss" name="username" >
            </div>

          </div>
          <div class="form-group">
            <label for="inputAddress">Address</label>
            <input type="text" class="form-control" id="inputAddress" placeholder="ที่อยู่" name="address">
          </div>


          <button type="submit" name="ok" class="btn btn-primary">Sign in</button>
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
