<template>
<div>
    <v-form
                  
                    ref="form"
                    v-model="valid"
                    lazy-validation
                >

                <v-stepper
    v-model="e6"
    vertical
  >
    <v-stepper-step
    editable
      :complete="e6 > 1"
      step="1"
    >
     Selecciona la fecha
      <small>Selecciona la fecha a convenir </small>
    </v-stepper-step>

    <v-stepper-content step="1">
      <v-card
       elevation="12">
      <v-card-text>
          <v-row justify="center">
          
    <v-date-picker date v-model="form.fecha"></v-date-picker>
  </v-row>
      </v-card-text>
     
  </v-card>
      <v-btn
        color="primary"
        @click="e6 = 2"
      >
        Siguiente
      </v-btn>
      <v-btn text>
        Cancel
      </v-btn>
    </v-stepper-content>

    <v-stepper-step
    editable
      :complete="e6 > 2"
      step="2"
    >
     Selecciona la hora
    </v-stepper-step>

    <v-stepper-content step="2">
      <v-card
         
      >
      
      <v-card-text>
 
      




        <v-time-picker
        elevation="12"
          Date
         v-model="form.hora"
        ampm-in-title
        format="ampm"
      ></v-time-picker>
      </v-card-text></v-card>
      <v-btn
        color="primary"
        @click="e6 = 3"
      >
        Siguiente
      </v-btn>
      <v-btn text>
        Cancel
      </v-btn>
    </v-stepper-content>

    <v-stepper-step
    editable
      :complete="e6 > 3"
      step="3"
    >
      Ingresa tus datos personales
    </v-stepper-step>

    <v-stepper-content step="3">
      <v-card
        
        class="mb-12"
        
      >
       <!-- <vue-tel-input-vuetify 
        :valid-characters-only="true"
          select-label="Code"
          @input="onInput"
          :require="true"
          :error-messages="nameRulesTelefono"
       :preferred-countries="['ec', 'gb', 'ua', 'us']"
       v-model="form.myphone"></vue-tel-input-vuetify> -->

        <v-text-field
                    v-model="form.cedula"
                    :counter="10"
                    :rules="nameRulesCedula"
                    label="Cedula"
                    required
                    ></v-text-field>
        <v-text-field
                    v-model="form.paciente"
                    :counter="25"
                    :rules="nameRules"
                    label="Nombre Paciente"
                    required
                    ></v-text-field>

 <v-text-field
                    v-model="form.representante"
                    :counter="25"
                    :rules="nameRules"
                    label="Nombre Representante"
                    required
                    ></v-text-field>
                      

                    <v-text-field
                    v-model="form.correo_electronico"
                    :rules="emailRules"
                    label="Correo"
                    required
                    ></v-text-field>
 
                 
                     
      
      </v-card>
    <!-- loader = 'loading4' -->
      <v-btn
        
                        :loading="loading4"
                        :disabled="loading4"
                        color="info"
                      
        
        @click="Agendar() "
      >
       Agendar
                        <template v-slot:loader>
                          <span class="custom-loader">
                            <v-icon light>mdi-cached</v-icon>
                          </span>
                        </template>
      </v-btn>
      <v-alert
      v-show="show"
      outlined
      type="success"
      text
    >
     {{  mensaje_ }}
    </v-alert>
      <v-btn text>
        Cancel
      </v-btn>
    </v-stepper-content>
 
  </v-stepper>



                  

                  
                </v-form>
                
</div>
</template>

<script>
 
  export default {
    name: 'HomeFooter',
    data: () => ({
        
      mensaje_:"",
      color_alerta:"",
     datemenu:"",
       e6: 1,
        loader: null,
        loading4: false,
       url_:"",
      show:false,
         valid: true,
         phone: {
            number: '',
        valid: false,
        country: undefined,
        },
      form:{
        celular:'',
         hora:"15:00",
        fecha: (new Date(Date.now() - (new Date()).getTimezoneOffset() * 60000)).toISOString().substr(0, 10),
        articulo_cabecera_id:0,
        cedula:'',
        paciente:'',
        representante:'',
          usuario: '',
          comentario: '',
           correo_electronico: '',
      },
      nameRulesTelefono: [],
    nameRulesCedula: [
        v => !!v || 'Campo es Requerido',
        v => (v && v.length <= 10) || 'Campo minimo 10 caracteres',
      ],
      nameRules: [
        v => !!v || 'Campo es Requerido',
        v => (v && v.length <= 25) || 'Campo minimo 25 caracteres',
      ],
        
      nameRules2: [
        v => !!v || 'Campo es Requerido',
        v => (v && v.length <= 25) || 'Name must be less than 25 characters',
      ],
     
      emailRules: [
        v => !!v || 'E-mail is required',
        v => /.+@.+\..+/.test(v) || 'E-mail must be valid',
      ],
      color:"light-blue white--text",
          icons: [
        
      ],
      informacion:[],
      horario:[
       
      ]
    }
    ),
     watch: {
      loader () {
        const l = this.loader
        this[l] = !this[l]
        setTimeout(() => (this[l] = false), 3000)
        this.loader = null
      },
    },
     
     methods: {
       
         onInput(formattedNumber, { number, valid, country }) {
      this.phone.number = number.international;
      this.phone.valid = valid;
      this.phone.country = country && country.name;
      
      if (!this.phone.valid) {
         this.nameRulesTelefono.push("Error al Validar numero");
      } else {
        this.nameRulesTelefono = [];
        this.form.celular =  this.phone.number;
      }
      
    },
          cargarhorarios() {
          //  console.log('holis');
            
             let that = this;
              var url =  this.url_ + "api/horario";
 
              axios
                .get(url)
                .then(function (response) {
                  // handle success
                   // that.horario = response.data.horarios
                    for (let index = 0; index < response.data.horarios.length; index++) {
                      let objeto = {};
                      objeto.dias = response.data.horarios[index].dia;
                      objeto.horaInicio = response.data.horarios[index].hora_inicio;
                      objeto.horaFin = response.data.horarios[index].hora_fin;
                      if (response.data.horarios[index].dia_id ==1 ) {
                         objeto.color = "purple";
                      }
                      if (response.data.horarios[index].dia_id ==2 ) {
                         objeto.color = "pink";
                      }
                      if (response.data.horarios[index].dia_id ==3 ) {
                         objeto.color = "light-blue";
                      }
                      if (response.data.horarios[index].dia_id ==4 ) {
                         objeto.color = "teal";
                      }
                      if (response.data.horarios[index].dia_id ==5 ) {
                         objeto.color = "cyan";
                      }
                      if (response.data.horarios[index].dia_id ==6 ) {
                         objeto.color = "orange";
                      }
                      if (response.data.horarios[index].dia_id ==7 ) {
                         objeto.color = "deep-orange";
                      }
                    that.horario.push(objeto);
                      
                    }
                   
               console.log(that.horario);
                
                })
                .catch(function (error) { 
                  // handle error
                  console.log(error);
                });
            },
        cargarInformacion() {
           
            
             let that = this;
              var url =  this.url_ + "api/empresa";
 
              axios
                .get(url)
                .then(function (response) {
                  // handle success
                    that.informacion = response.data.empresa;
                //console.log(that.informacion);
                
                })
                .catch(function (error) { 
                  // handle error
                  console.log(error);
                });
            },
              CargarRedes() {
           
            
             let that = this;
              var url =  this.url_ + "api/red_social";
 
              axios
                .get(url)
                .then(function (response) {
                  // handle success
                    that.icons = response.data.redes_sociales;
              //  console.log(that.icons);
                
                })
                .catch(function (error) { 
                  // handle error
                  console.log(error);
                });
            },
            Agendar(){
               
            if (this.$refs.form.validate()) {
                console.log('paso');
                
             
                  if (!this.phone.valid) {
                    this.nameRulesTelefono.push("Error al Validar numero");
                    return;
                  } else {
                    this.nameRulesTelefono = [];
                    this.form.celular =  this.phone.number;
                  }
               this.loader = 'loading4'
                  let that = this;
             var url =  this.url_ +"api/agenda_cita";
 
              axios
                .post(url, that.form)
                .then(function (response) {
                  that.show = true;
                  that.mensaje_ = "Paciente Agendado con éxito";
                  that.color_alerta = "success"
                   that.$refs.form.reset()
                   
                   
                
                })
                .catch(function (error) { 
                  // handle error
                  console.log(error);
                    that.show = true;
                  that.mensaje_ = "Error al Agendar" + error ;
                  that.color_alerta = "error"
                }); 
               
                 
             } 
             
            },
    },
    
    mounted() {
      this.url_ = this.$store.state.link;
         this.cargarhorarios();
        //  this.cargarInformacion();
        //  this.CargarRedes();
    },
  }
</script>
<style>
  .custom-loader {
    animation: loader 1s infinite;
    display: flex;
  }
  @-moz-keyframes loader {
    from {
      transform: rotate(0);
    }
    to {
      transform: rotate(360deg);
    }
  }
  @-webkit-keyframes loader {
    from {
      transform: rotate(0);
    }
    to {
      transform: rotate(360deg);
    }
  }
  @-o-keyframes loader {
    from {
      transform: rotate(0);
    }
    to {
      transform: rotate(360deg);
    }
  }
  @keyframes loader {
    from {
      transform: rotate(0);
    }
    to {
      transform: rotate(360deg);
    }
  }
</style>