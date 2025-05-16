import Swal from "sweetalert2";
import axios from "axios";

export function show_alerta(mensaje,icono,foco=''){
    if(foco !==''){
        document.getElementById(foco).focus();
    }
    Swal.fire({
        title:mensaje,
        icon:icono,
        customClass: {confirmButton: 'btn btn-primary', popup:'animated zoomIn' },
        buttonsStyling:false
    });
}

export function confirmar(id,nombre){
    var url ='http://127.0.0.1:8000/api/empleados/'+id;
    const swalWithBootstrapButtons= Swal.mixin({
        customClass:{confirmButton: 'btn btn-success me-3', cancelButton:'btn btn-danger'}
        ,buttonsStyling:false
    });
    swalWithBootstrapButtons.fire({
        title: 'Seguro de eliminar el producto'+nombre,
        text: 'Se perdera la informacion del producto',
        icon: 'question',
        showCancelButton:true,
        confirmButtonText:'<i class="fa-regular fa-thumbs-up" style="color: #ffffff;"></i></i> Si, eliminar',
        cancelButtonText:'<i class="fa-regular fa-circle-xmark" style="color: #ffffff;"></i></i> Cancelar'
    }).then((ressult) => {
        if(ressult.isConfirmed){

        }
        else{
            show_alerta('Operacion cancelada','info');
        }
    })
}