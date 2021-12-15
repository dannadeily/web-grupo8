function mensaje(alerta){
  if( alerta=="incorrecto"){
    swal({
  text: "Datos incorrectos",
  icon: "error",
  dangerMode: true,
    });
  }
  if( alerta=="incompletos"){
    swal({
  text: "Datos incompletos",
  icon: "error",
  dangerMode: true,
    });
  }
  if( alerta=="existe"){
    swal({
  text: "el usuario ya existe",
  icon: "warning",
  dangerMode: true,
    });
  }
  if( alerta=="registrado"){
    swal({
  text: "registro realizado con exito",
  icon: "success",
  dangerMode: true,
    });
  }
  if( alerta=="actualizado"){
    swal({
  text: "actualización exitosa",
  icon: "success",
  dangerMode: true,
    });
  }
  if( alerta=="fechamenor"){
    swal({
      title: "Fechas incorrectas",
  text: "la fecha de inicio de inicio debe ser mayor a la fecha actual y la fecha de inicio de inicio debe ser menor a la fecha de cierre",
  icon: "error",
  dangerMode: true,
    });
  }
  if( alerta=="errorimagen"){
    swal({
  text: "ha ocurrido un error con la imagen",
  icon: "error",
  dangerMode: true,
    });
  }
  if( alerta=="tamañomayor"){
    swal({
  text: "formato invalido o tamaño del archivo superior a 5mb",
  icon: "error",
  dangerMode: true,
    });
  }
  if( alerta=="borrado"){
    swal({
  text: "eliminado con exito",
  icon: "success",
  dangerMode: true,
    });
  }
  if( alerta=="noborrado"){
    swal({
  text: "no se ha podido eliminar",
  icon: "error",
  dangerMode: true,
    });
  }
  if( alerta=="tamañosmayores"){
    swal({
  text: "formato invalido o tamaño del archivo superior a 5mb",
  icon: "error",
  dangerMode: true,
    });
}
}
