$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
  
let opcionesToastr = {
    "closeButton" : true,
    "debug" : false,
    "newestOnTop" : false,
    "progressBar" : true,
    "positionClass" : "toast-top-center",
    "preventDuplicates" : true,
    "onclick" : null,
    "showDuration" : "300",
    "hideDuration" : "1000",
    "timeOut" : "5000",
    "extendedTimeOut" : "1000",
    "showEasing" : "swing",
    "hideEasing" : "linear",
    "showMethod" : "fadeIn",
    "hideMethod" : "fadeOut"
}
  
let direccion = location.origin;

if(direccion === 'http://localhost')
    direccion +='/tramitesDRT/public'; //Esto se debe cambiar al nombre de la app
  
const eliminar = (ruta,nombre,tabla) =>{
    swal({
        title: `Eliminar ${nombre}`,
        text: `Seguro que desea eliminar el/la ${nombre}`,
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Eliminar'
    }).then((result) => {
        console.log('Eliminado');
        if(result.value){
            $.ajax({
                url: ruta,
                method: 'DELETE',
                success:function(data){
                    toastr.options = opcionesToastr;
                    let mensaje = `${nombre.toUpperCase()} se elimino correctamente`;
                    toastr.error(mensaje,'Eliminado!');
                    tabla.ajax.reload(null,false);
                }
            });
        }
    });
};
  