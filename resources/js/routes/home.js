import { prefix } from "../variables";
//import paciente from "../components/modulos/Administracion/paciente";
import dashboard from ".././components/modulos/dashboard";
// import IndexCompra from ".././components/modulos/compra/indexCompra";

// import paciente from ".././components/modulos/Administracion/paciente";
// import control_clinico from ".././components/modulos/Medico/index.vue";

// import tipodesechos from ".././components/modulos/Parametrizacion/TiposDesechos/index.vue";
// import Clasificacion from ".././components/modulos/Parametrizacion/ClasificacionDesechos/index.vue";
// import DesechosDescripcion from ".././components/modulos/Parametrizacion/DesechosDescripcion/index.vue";
// import ingresodesechos from ".././components/modulos/Administracion/Mantenimiento/index.vue";
// import departamento from ".././components/modulos/Parametrizacion/TiposDesechos/index.vue";
import estudiante from ".././components/modulos/Administracion/estudiante.vue";


// import Reportes from ".././components/modulos/Reporte/index.vue";



///modulos/administracion/ingreso
//seguridad


let prefijo = prefix;
console.log(prefijo);

const home = [{
        path: prefix +
            "",
        name: "Ingreso de Pacientes",
        component: dashboard
    },
    {
        path: prefix +
            "/modulos/administracion/estudiante",
        name: "Estudiante",
        component: estudiante,


    },
 

];

export default home;