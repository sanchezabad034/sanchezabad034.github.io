<?php
     //datos para el correo
     $destinatario = 'jarscotact@gmail.com'; 
     $asunto = 'Contacto JARS'; 

     //llamando los campos
     $nombre = $_POST['name']; 
     $email = $_POST['email']; 
     $text = $_POST['text']; 

     $carta = "De: $nombre \n"; 
     $carta.="Correo: $email \n"; 
     $carta.="Mensaje: $text"; 

     //Enviar correo
     mail($destinatario, $asunto, $carta);
     header('Location:send-text.html');
?>