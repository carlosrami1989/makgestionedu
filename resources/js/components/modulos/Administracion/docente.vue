<template>
    <div>
          <v-data-table
    :headers="headers"
    :items="desserts"
    :items-per-page="5"
    class="elevation-1"
  ></v-data-table>
    </div>
</template>






<script>
  export default {
    data () {
      return {
        headers: [
          {
            text: 'Dessert (100g serving)',
            align: 'start',
            sortable: false,
            value: 'CtxNombre',
          },
          { text: 'pela', value: 'CtxApellidoMaterno' },
          { text: 'verga', value: 'CtxApellidoPaterno' },
        
        ],
        desserts: [
          
 
        ],
      }
    },

     
    methods: {
       consultardocentes() {
 
        let that = this;
        let url =
          this.$store.getters.getRuta +
          "/modulos/admision/paciente/docente";
        
        axios
          .get(url)
          .then(function (response) {
            console.log(response);
            that.desserts = response.data.docente;

          
          })
          .catch((error) => {
            //Errores de validación
            loader.hide();
           
          });
      
    },

    },
     mounted(){
      this.consultardocentes();
      },
  }
</script>