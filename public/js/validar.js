function valUsua(usuarios){
	$(".adv").remove();
  

  if(document.usuarios.nombre.value==""){
  $("#nombre").focus().after("<span class='adv'>Ingrese los nombres</span>");
  document.usuarios.nombre.focus();
  return false;
  }else{
	  if(document.usuarios.apellidos.value==""){
	  $("#apellidos").focus().after("<span class='adv'>Ingrese los apellidos</span>");
	  document.usuarios.apellidos.focus();
	  return false;
	  }else{
		if(document.usuarios.tel.value==""){
		$("#tel").focus().after("<span class='adv'>Ingrese un numero de telefono</span>");
		document.usuarios.tel.focus();
		return false;
		}else{
			var ok="yes";
        var temp;
        var valid="0123456789";
        var valor2=document.usuarios.tel.value;

        for(var i=0;i<valor2.length;i++)
           {
             temp=valor2.substring(i,i+1);
              if(valid.indexOf(temp)=="-1")
                            {
                                ok="no";
                            }
                        }

           if(ok=="no"){
				$("#tel").focus().after("<span class='adv'>Debe ingresar solo numeros</span>");                         
                 document.usuarios.tel.focus();
                 return false;
          }else{
			  if(document.usuarios.fecha.value=="")
        		{
         		 $("#naci").focus().after("<span class='adv'>Seleccione una fecha</span>");
         		 document.usuarios.fecha.focus();
          			return false;
            		}else{
						
					if(document.usuarios.email.value==""){
						$("#email").focus().after("<span class='adv'>Ingrese una direccion de email</span>");
						document.usuarios.email.focus();
						return false;
							}else{
								  if(document.usuarios.cont.value==""){
								  $("#cont").focus().after("<span class='adv'>Ingrese una palabra clave</span>");
								  document.usuarios.cont.focus();
								  return false;
								  }else{
										return true;	
										}
									}
								}
							}
			}
	}
}
										
}// JavaScript Document