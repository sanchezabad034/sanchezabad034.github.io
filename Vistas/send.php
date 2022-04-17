<?php
     //llamando los campos
     $nombre = $_POST['nombre']; 
     $email = $_POST['email']; 
     $text = $_POST['text']; 

     //datos para el correo
     $destinatario = "jarscotact@gmail.com"; 
     $asunto = "Contacto JARS"; 

     $carta = "De: $nombre \n"; 
     $carta.="Correo: $email \n"; 
     $carta.="Mensaje: $text"; 

     //Enviar correo
     mail($destinatario, $asunto, $carta);
     header('Location:send-text.html');
?>