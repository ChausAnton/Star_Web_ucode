<?php
send_message('192.168.5.164','1113','Message to send...');

function send_message($ipServer,$portServer,$message)
{
  $fp = stream_socket_client("udp://$ipServer:$portServer", $errno, $errstr);
  if (!$fp)
  {
     echo "ERREUR : $errno - $errstr<br />\n";
  }
  else
  {
     fwrite($fp,"$message\n");
     $response =  fread($fp, 4);
     if ($response != "OK")
        {echo 'The command couldn\'t be executed...\ncause :'.$response;}
     else
        {echo 'Execution successfull...';}
     fclose($fp);
  }
}
?>