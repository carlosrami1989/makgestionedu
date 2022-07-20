<template>
    <div>
        <v-form ref="form" v-model="valid" lazy-validation>
            <v-stepper v-model="e6" vertical>
                <v-stepper-step editable :complete="e6 > 1" step="1">
                    Seleccione el estudiante
                    <small>Selecciona al estudiante que desea editar </small>
                </v-stepper-step>

                <v-stepper-content step="1">
                    <v-card elevation="12">
                        <v-card-text> </v-card-text>
                        <estudiante-tabla
                            ref="RefEstudiante"
                        ></estudiante-tabla>
                    </v-card>

                    <v-divider></v-divider>
                    <v-btn color="primary" @click="SetEstudiante()">
                        Siguiente
                    </v-btn>
                    <v-btn text> Cancel </v-btn>
                </v-stepper-content>

                <v-stepper-step editable :complete="e6 > 2" step="2">
                   Creación/Modificación de estudiante
                      <small>Realiza la Modificación en caso de que el estudiante hay sido selecionado </small>
                </v-stepper-step>

                <v-stepper-content step="2">
                    <v-card>
                        <v-card-text> </v-card-text>
                        <estudiante-insert  ref="RefEstudianteInsert"></estudiante-insert>
                      
                    </v-card>
                    <v-btn color="primary" @click="e6 = 3"> Siguiente </v-btn>
                    <v-btn text> Cancel </v-btn>
                </v-stepper-content>

                <v-stepper-step editable :complete="e6 > 3" step="3">
                    Ingresa tus datos personales
                </v-stepper-step>

                <v-stepper-content step="3">
                    <v-card class="mb-12">
                        <!-- <estudiante-representante></estudiante-representante> -->
                        <!-- <vue-tel-input-vuetify 
        :valid-characters-only="true"
          select-label="Code"
          @input="onInput"
          :require="true"
          :error-messages="nameRulesTelefono"
       :preferred-countries="['ec', 'gb', 'ua', 'us']"
       v-model="form.myphone"></vue-tel-input-vuetify> -->
 
                    </v-card>
                    <!-- loader = 'loading4' -->
                    <v-btn
                        :loading="loading4"
                        :disabled="loading4"
                        color="info"
                        @click="Agendar()"
                    >
                        Agendar
                        <template v-slot:loader>
                            <span class="custom-loader">
                                <v-icon light>mdi-cached</v-icon>
                            </span>
                        </template>
                    </v-btn>
                    <v-alert v-show="show" outlined type="success" text>
                        {{ mensaje_ }}
                    </v-alert>
                    <v-btn text> Cancel </v-btn>
                </v-stepper-content>
            </v-stepper>
        </v-form>
    </div>
</template>

<script>
export default {
    name: "HomeFooter",
    data: () => ({
        search: "",
        mensaje_: "",
        color_alerta: "",
        datemenu: "",
        e6: 1,
        loader: null,
        loading4: false,
        url_: "",
        show: false,
        valid: true,
        phone: {
            number: "",
            valid: false,
            country: undefined,
        },
        form: {
            ApellidoPaterno: "",
            ApellidoMaterno: "",
            PrimerNombre: "",
            SegundoNombre: "",
            cedula: "",
            telefono: "",
            direccion: "",
            sexo: "",
            direccion_secundaria: "",
            ciudad: "",
            provincia: "",
            parroquia: "",
            es_extranjero: "",
            email: "",
        },

        //reglas de validacion
        nameRulesTelefono: [],
        nameRulesCedula: [
            (v) => !!v || "Campo es Requerido",
            (v) => (v && v.length <= 10) || "Campo minimo 10 caracteres",
        ],
        nameRules: [
            (v) => !!v || "Campo es Requerido",
            (v) => (v && v.length <= 25) || "Campo minimo 25 caracteres",
        ],

        nameRules2: [
            (v) => !!v || "Campo es Requerido",
            (v) =>
                (v && v.length <= 25) || "Name must be less than 25 characters",
        ],

        emailRules: [
            (v) => !!v || "E-mail is required",
            (v) => /.+@.+\..+/.test(v) || "E-mail must be valid",
        ],
        color: "light-blue white--text",
        icons: [],
    }),
    watch: {
        loader() {},
    },

    methods: {
        SetEstudiante() {
            this.e6 = 2;
            console.log("aqui");
            console.log("listaprincipal", this.$refs.RefEstudiante.ListaForm);
 
  this.$refs.RefEstudianteInsert.FormEstudiante.CtxApellidoPaterno == this.$refs.RefEstudiante.ListaForm.CtxApellidoPaterno;
  
 
            
        },
    },

    mounted() {
        this.url_ = this.$store.state.link;

        //  this.cargarInformacion();
        //  this.CargarRedes();
    },
};
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
