<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php
      $mainpass = "1234";
      //$md5pass = md5($mainpass);
      $sha1pass = sha1($mainpass);
      //echo "$md5pass"."<br>";
      echo "$sha1pass"."<br>";

      $input = "SmackFactory";

$encrypted = encryptIt( $input );
$decrypted = decryptIt( $encrypted );

echo $encrypted . '<br />' . $decrypted;

function encryptIt( $q ) {
    $cryptKey  = 'qJB0rGtIn5UB1xG03efyCpaa';
    $qEncoded      = base64_encode( mcrypt_encrypt( MCRYPT_RIJNDAEL_256, md5( $cryptKey ), $q, MCRYPT_MODE_CBC, md5( md5( $cryptKey ) ) ) );
    return( $qEncoded );
}

function decryptIt( $q ) {
    $cryptKey  = 'qJB0rGtIn5UB1xG03efyCpaa';
    $qDecoded      = rtrim( mcrypt_decrypt( MCRYPT_RIJNDAEL_256, md5( $cryptKey ), base64_decode( $q ), MCRYPT_MODE_CBC, md5( md5( $cryptKey ) ) ), "\0");
    return( $qDecoded );
}

     ?>
DELETE FROM `fruits` WHERE `fruits`.`fruit_id` = 34;

<?php

$names = ["Marius", "Perseus", "Zeus", "Poseidon"];
$mixed = [1, "PHP", "C#", 1.54, true];
$empty = [];

$days = ["Sunday"];
array_push($days, "Monday");
array_push($days, "Tuesday");
array_push($empty, "Tuesday");
$days[] = "Wednesday";
$days[] = "Thursday";

$planets[0] = "Mercury";
$planets[3] = "Mars";
$planets[4] = "Jupiter";
$planets[-1] = "Sun";

//print_r($names);
//print_r($mixed);
print_r($empty);
//print_r($days);
//print_r($planets);

?>
  </body>
</html>
