<?php
  $curl = curl_init();
  $parms = array(
      'email' => "aparna@baabte.com",
      'password '=> "aparna123",
  );
  curl_setopt_array($curl, array(
      CURLOPT_URL => 'http://localhost/sprintt/index.php/login/logincon',
      CURLOPT_POSTFIELDS => json_encode($parms),
  ));
  $responce = curl_exec($curl);
  echo $responce;
?>