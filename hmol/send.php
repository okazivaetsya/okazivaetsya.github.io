<?
//print_r($_POST);
  $arr=$_POST;
  $date = date("Y-m-d H:i:s");       
  $p_string = $date . ";" . implode($arr,";") ."\n" ;
  array_walk($arr, create_function('&$i,$k','$i=" $k: $i";'));
  $p_string_mail = " Date: " . $date . "\n" . implode($arr,"\n") . "\n\n-----------------------------------\n\n";

  echo $p_string;
  $headers = 'From: Zel marathon <noreply@zel-marathon.ru>' . "\r\n" .
      'Reply-To: '.$_POST[email]. "\r\n" .
          'X-Mailer: PHP/' . phpversion();
  mail('info@zel-marathon.ru', 'Новая регистрация - zel-marathon.ru', $p_string_mail, $headers); 

  $fp = fopen("reg.csv", "a+");
  fwrite($fp, $p_string);
  fclose($fp);
?>
