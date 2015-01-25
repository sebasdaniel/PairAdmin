// JavaScript Document
function formuhash(form, password) {
   //Crea una entrada de elemento nuevo, esta estará fuera del campo de contraseña con algoritmo hash.
   if(password!=""){
   var p = document.createElement("input");
   //Agrega el elemento nuevo a nuestro formulario.
   form.appendChild(p);
   p.name = "passencrip";
   p.type = "hidden"
   p.value = hex_sha512(password.value);
   //Asegúrate de que la contraseña en texto simple no sea enviada.
password.value = "";
   //Finalmente envía el formulario.
form.submit();
   }else{
	   alert("Digite datos por favor");
	   }
}