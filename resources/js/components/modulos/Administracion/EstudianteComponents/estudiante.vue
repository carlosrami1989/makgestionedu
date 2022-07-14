<template>
   <div>    

  
              <v-divider></v-divider>
              <v-text-field
                v-model="search"
                append-icon="mdi-magnify"
                label="Search"
                single-line
                hide-details
              ></v-text-field>
              <v-data-table
                :headers="headers"
                :items="ListaEstudiante"
                :search="search"
              >
                <template v-slot:item.id="{ item }">
                  <v-icon
                    color="primary"
                     @click="GetEstudiante(item)"
                    >mdi-select-all</v-icon
                  >
                </template>   
              
              </v-data-table>
              <!-- <v-btn color="primary" @click="e6 = 2"> Continue </v-btn>
            -->
            
   </div>
</template>
<script>
 
export default {
    name: "BasicFiltering",

    data: function() {
        return {
          e6: 1,
              search: '',
              search2:'',
            
             headers: [
                {
                    text: 'Seleccionar',
                    align: 'start',
                    filterable: false,
                    value: 'id',
                },
                { text: 'Estudiante', value: 'FULLNAME' },
                { text: 'Cedula', value: 'cedula' },
                { text: 'Direccion', value: 'direccion' },
                { text: 'Estado', value: 'email' },
                
                ],

           ListaForm:[],
         
            ListaEstudiante: [],
             
            filters: {
                name: { value: "", keys: ["CirProNomPac"] }
            }
        };
    },
    mounted: function() {
    this.ConsultarEstudiantes();
        // this.buscarPaciente();
        /* Metodo que inicia cuando el usuario entrar al formulario */
    },
    methods: {  
          GetEstudiante(value){
        
        this.ListaForm = value;
         console.log('estudiantefrom',this.ListaForm);
          
      },
          
        ConsultarEstudiantes() {
            /* Metodo que realiza peticiones al servidor */
            let that = this;
            let url =  "/modulos/admision/estudiante/getEstudiante" ;
            // let url = "/consultas/modulo/consultacirugiafecha/2021-01-01/2021-01-30";
          
            axios
                .get(url)
                .then(function(response) {
                    that.ListaEstudiante = response.data["estudiantes"];

                })
                .catch(error => {


                });

        },
       
    },
    computed: {}
};
</script>
