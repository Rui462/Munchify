<?php
   $url = 'https://szelearning.sze.hu';
   $curl = curl_init($url);
   curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
   $response = curl_exec($curl);
   echo $response;
   curl_close($curl);
?>