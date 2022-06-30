function validations(){
     nombre = document.querySelector("#form_name");
     email = document.querySelector("#form_email");
     message=document.querySelector("#message_form");

     if(nombre == ""){
          alert("Ingresa un nombre ");
          return false; 
     }
     else if(emial==""){
          alert("Ingresa un correo electronico valido");
          return false;
     }
     else if(message==""){
          alert("Este campo no puede ser vacio");
          return false;
     }
     else{
          return true;
     }
}
