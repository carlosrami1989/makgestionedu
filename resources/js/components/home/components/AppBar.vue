<template>
   <div>
       
   <v-navigation-drawer app
    v-model="drawer"
    
    >
    <!-- -->   
      <v-list-item 
        v-model="selectedItem"
          color="teal lighten-3">
        <v-list-item-content   >
          <v-list-item-title class="text-h6"  >
            Mak-Gestión de notas
          </v-list-item-title>
          <v-list-item-subtitle>
            Sisge-Ho
          </v-list-item-subtitle>
        </v-list-item-content>
      </v-list-item>

      <v-divider></v-divider>
<v-list>
      <v-list-group
        v-for="item in items"
        :key="item.name"
         v-model="item.active"
        :prepend-icon="item.icon"
         :color="item.color"
        no-action
      >
        <template v-slot:activator>
          <v-list-item-content>
            <v-list-item-title   v-text="item.name"></v-list-item-title>
          </v-list-item-content>
        </template>

        <v-list-item
          v-for="child in item.items"
          :key="child.name"
        >
          <v-list-item-content>
            <!-- <v-list-item-title v-text="child.name"></v-list-item-title> -->
           
             <v-list-item-title>
             <router-link
                            :to=" prefijo +

                                    child.ruta
                            "
                             
                            >
                            {{ child.name }}
                             </router-link
                        >
                        
                        </v-list-item-title>
                        
          </v-list-item-content>
           <v-list-item-icon>
              <v-icon color="green">mdi-file-document</v-icon>
            </v-list-item-icon>
        </v-list-item>
      </v-list-group>
    </v-list>


      <v-list
        dense
        nav
      >
     <!-- <v-list-item-group>
        <v-list-item
             v-for="name in items"
                        :key="name.name"
                         
                        
                       
                        
        >
          <v-list-item-icon>
         
            <v-icon  :color="name.color"
            >{{ name.icon }}</v-icon>
           
          </v-list-item-icon>
 
          <v-list-item-content>
            <v-list-item-title>
             <router-link
                            :to=" prefijo +

                                    name.ruta
                            "
                             
                            >
                            {{ name.name }}
                             </router-link
                        ></v-list-item-title>
          </v-list-item-content>
        </v-list-item>
      </v-list-item-group> -->
      </v-list>
    
  </v-navigation-drawer>

  <v-app-bar app  >
    <!-- -->
      <v-app-bar-nav-icon
       @click.stop="drawer = !drawer"
       ></v-app-bar-nav-icon>

      <v-toolbar-title>  Mak-Gestión de notas</v-toolbar-title>

      <v-spacer></v-spacer>
<div v-for="item in usuario" :key="item.id">
 <span>{{ item.name }}</span>
</div>
 
       <v-btn icon>
        <v-icon>mdi-account</v-icon>
      </v-btn>

      <v-btn icon
      @click="logout()">
        <v-icon>mdi-close-circle</v-icon>
      </v-btn>
  </v-app-bar>

  <!-- Sizes your content based upon application components -->
  <v-main>

    <!-- Provides the application the proper gutter -->
    <v-container fluid>
     
      <!-- If using vue-router -->
      <router-view></router-view>
     
    </v-container>
  </v-main>

   
   </div>
</template>

<script>
 import { prefix, url } from "../../../variables";
export default {
 
 // props: ['user'],
  props: {
    user: {
      type: Object,
    },
  },
    name: "HomeAppBar",
    
     data: () => ({
       usuario:[],
        selectedItem: 1,
       icons: [
        'mdi-facebook',
        'mdi-twitter',
        'mdi-linkedin',
        'mdi-instagram',
      ],
      drawer: true,
      group: null,
      value: 1 ,
       prefijo: "",
      //drawer: null,
      text:"white--text lighten-1--text",
      bg:"secondary",
      base:"video",
      items: [
      
         
      ],
    }),
    mounted() {
      this.consultaPerfil();
     this.consultasUsuario();
    //  console.log('aqui');
     
      //console.log( this.$props.user.id);
    },
   
    methods: {
      logout(){
        window.location.replace("/logout");
      // let url =
      //     this.$store.getters.getRuta +
      //     "/logout";
        
      //   axios
      //     .get(url)
      //     .then(function (response) {
      //       this.$router.go('/login');

          
      //     })
      //     .catch((error) => {
      //       //Errores de validación
           
           
      //     });
      
      },
        consultasUsuario() {
        
          
        let that = this;
        let url =
          this.$store.getters.getRuta +
          "/modulos/admision/paciente/cargarUsuario/"+ this.$props.user.id;
        
        axios
          .get(url)
          .then(function (response) {
            that.usuario = response.data.data;
             
              
          
          })
          .catch((error) => {
            //Errores de validación
            
           
          });
      
    },
      consultaPerfil() {
        
          
        let that = this;
        let url =
          this.$store.getters.getRuta +
          "/modulos/admision/paciente/IncipSession/"+ this.$props.user.id;
        
        axios
          .get(url)
          .then(function (response) {
 
            if (response.data.data[0].id_perfil==1) {
              that.items.push( 
                {name:'Dashboard',icon: 'mdi-view-dashboard', 
             
                // items:[{
                //   name:"prueb",
                //      ruta:"/",color:'primary',

                // }],
                },
                {name:'Rectorado',
                icon: 'mdi-delete-variant',
                color:'orange',
                items:[{
                  name:"Apro. de Notas",
                  ruta:prefix+'',color:'pink'

                }], 
               
                },
                {name:'Secretaria',
                icon: 'mdi-recycle-variant', 
                items:[{
                  name:"Estudiante",
                      ruta:prefix+'/modulos/administracion/estudiante',color:'pink'

                },{
                  name:"Docentes",
                      ruta:prefix+'/modulos/administracion/docente',
                      color:'pink'

                },{
                  name:"Pensiones",
                      ruta:prefix+'',color:'pink'

                },{
                  name:"Nomina",
                      ruta:prefix+'',color:'pink'

                },{
                  name:"Egresos",
                      ruta:prefix+'',color:'pink'

                },{
                  name:"Cronograma",
                      ruta:prefix+'',color:'pink'

                }], 
                color:'cyan darken-4'},
                {
                  name:'Docente',
                  icon: 'mdi-certificate',

                    items:[
                {
                  name:"Ingreso de Notas",
                  ruta:prefix+'',color:'pink'
                },{
                  name:"Modificación de Notas",
                  ruta:prefix+'',color:'pink'
                }], 
               
                  ruta:prefix+'/modulos/parametrizacion/desechosdescripcion',
                  color:'purple'
                  },
                {
                  name:'Tutores',icon: 'mdi-clipboard-check', 
                  ruta:prefix+'/modulos/administracion/ingreso',color:'green darken-4'},
         //{name:'Asignación de Perfil',icon: 'mdi-account-multiple-plus', ruta:prefix+'',color:'orange darken-4'},
                
                {name:'Reportes General',icon: 'mdi-clipboard-text-multiple', ruta:prefix+'/modulos/reporte/mostrar',color:'red'},

        //{name:'Departamentos',icon: 'mdi-file-document', ruta:prefix+'-',color:'green darken-4'},
               );
                } 
                else {
               that.items.push( 
                {name:'Dashboard',icon: 'mdi-view-dashboard', ruta:prefix,color:'primary'},
                {name:'Ingreso de Desechos',icon: 'mdi-certificate', ruta:prefix+'/modulos/administracion/ingreso',color:'green darken-4'},
                {name:'Rotary Astillero',icon: 'mdi-earth', ruta:'',color:'orange darken-4'});
               }
           // that.usuario = response.data.data.id_perfil;
              console.log( response.data.data[0].id_perfil);
              
          
          })
          .catch((error) => {
            //Errores de validación
            
           
          });
      
    },
     
    },
    watch: {
      group () {
       this.drawer = false
              },
    },
   
  }
</script>

 