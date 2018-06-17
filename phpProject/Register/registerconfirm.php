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


    <?php
    if (isset($_POST['ok'])) {
    $pass=sha1($_POST['username']);
    $user=$_POST['username'];
    $fname=$_POST["fname"];
    $lname=$_POST["lname"];
    $email=$_POST["email"];
    $address=$_POST["address"];
    $RadioOptions=$_POST["RadioOptions"];
    $hostname = "localhost";
    $username = "root";
    $password = "";
    $dbname = "warehouse";
    $conn = mysql_connect( $hostname, $username, $password );
    if ( ! $conn ) die ( "ไม่สามารถติดต่อกับ MySQL ได้" );
    mysql_select_db ( $dbname, $conn )or die ( "ไม่สามารถเลือกฐานข้อมูล bookstore ได้" );
    mysql_query("SET NAMES UTF8");
    $query = "INSERT INTO user (name,lastname, sex,email, username, password, address, status)
     VALUES ('$fname','$lname','$RadioOptions','$email','$user','$pass','$address','notactive')";

    $result = mysql_query($query,$conn);

    mysql_close ( $conn );
    }
    ?>
    <?php
    require '../PHPMailerAutoload.php';
    $mail = new PHPMailer;
    //$mail->SMTPDebug = 2;                               // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'pureerat2539@gmail.com';                 // SMTP username
    $mail->Password = '0818197184';                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to
    $mail->setFrom('pureerat2539@warehouse.com', 'Warehouse');
    $mail->addAddress($email, $fname." ".$lname);     // Add a recipient
    //$mail->addAddress('ellen@example.com');               // Name is optional
    $mail->addReplyTo('warehouse@gmail.com', 'Information');
    //$mail->addCC('cc@example.com');
    //$mail->addBCC('bcc@example.com');
    //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
    $mail->isHTML(true);                                  // Set email format to HTML
    $te = "fdsafdsaf";
    $mail->Subject = 'Passwordtemporary รับรหัสผ่าน';
    $mail->Body    = "<h1>โปรดเข้าสู้เว็ปไซต์แล้วเปลี่ยนรหัสทันที</h1><br/><h6>username : $user </h6><br/><h6>รหัสผ่าน : $pass </h6><br/>";
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    if(!$mail->send()) {
        echo 'Message could not be sent.';
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    } else {
        //echo 'Message has been sent';
        ?>
        <div class="container">
            <div class="row justify-content-md-center">
                <div class="col-md-auto">
                  <p class="text-justify">
                    <a href="../index.php"><h3>รับ username password ใน email ของท่าน</h3></a>
                  </p>
                </div>
            </div>
        </div>
        <?php
    }
    ?>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
  </body>
</html>
