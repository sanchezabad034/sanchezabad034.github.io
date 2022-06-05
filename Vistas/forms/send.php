<?php
 if(isset($_POST['send'])){
      if(!empty($_POST['name'] && !empty($_POST['email']) && !empty($_POST['text']))){
          $nombre = $_POST['name']; 
          $email = $_POST['email']; 
          $text = $_POST['text']; 
          $header = "FROM: jarscotact@gmail.com" . "\r\n";
          $header = "Reply-to: jarscotact@gmail.com". "\r\n";
          $header = "X-Mailer: PHP/" .phpversion();
          $header('Location:../sendtext.html');
          $mail= mail($nombre, $email, $text, $header); 
      }
 }   
     
?>