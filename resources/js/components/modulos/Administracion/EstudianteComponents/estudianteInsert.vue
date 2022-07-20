<template>
    <v-form v-model="valid">
        <v-container>
            <!-- aqui va la busqueda -->

            <v-row>
                <!-- aqui va la cedula  -->

                <v-col cols="12" md="4">
                    <v-text-field
                        v-model="FormEstudiante.CtxApellidoPaterno"
                        :rules="nameRules"
                        label="Apellidos Paternos"
                        required
                    ></v-text-field>
                </v-col>
                <v-col cols="12" md="4">
                    <v-text-field
                        v-model="FormEstudiante.CtxApellidoMaterno"
                        :rules="nameRules"
                        label="Apellidos Maternos"
                        required
                    ></v-text-field>
                </v-col>
                <v-col cols="12" md="4">
                    <v-text-field
                        v-model="FormEstudiante.CtxPrimerNombre"
                        label="Primer Nombre"
                        required
                    ></v-text-field>
                </v-col>
                <!-- fin -->
                <v-col cols="12" md="4">
                    <v-text-field
                        v-model="FormEstudiante.CtxSegundoNombre"
                        :rules="nameRules"
                        :counter="10"
                        label="Segundo Nombre"
                        required
                    ></v-text-field>
                </v-col>
                <v-col cols="12" md="4">
                    <v-text-field
                        v-model="FormEstudiante.cedula"
                        :rules="nameRules"
                        :counter="10"
                        label="cedula"
                        required
                    ></v-text-field>
                </v-col>

                <v-col cols="12" md="4">
                    <v-text-field
                        v-model="FormEstudiante.telefono"
                        :rules="nameRules"
                        :counter="10"
                        label="telefono"
                        required
                    ></v-text-field>
                </v-col>

                <v-col cols="12" md="4">
                    <v-text-field
                        v-model="FormEstudiante.direccion"
                        :rules="nameRules"
                        :counter="10"
                        label="direccion"
                        required
                    ></v-text-field>
                </v-col>

                <v-col cols="12" md="4">
                    <v-menu
                        ref="menu1"
                        v-model="menu1"
                        :close-on-content-click="false"
                        transition="scale-transition"
                        offset-y
                        max-width="290px"
                        min-width="auto"
                    >
                        <template v-slot:activator="{ on, attrs }">
                            <v-text-field
                                v-model="dateFormatted"
                                label="Fecha de nacimiento"
                                hint="MM/DD/YYYY format"
                                persistent-hint
                                prepend-icon="mdi-calendar"
                                v-bind="attrs"
                                @blur="date = parseDate(dateFormatted)"
                                v-on="on"
                            ></v-text-field>
                        </template>
                        <v-date-picker
                            v-model="date"
                            no-title
                            @input="menu1 = false"
                        ></v-date-picker>
                    </v-menu>
                </v-col>
                
                <!-- <v-col cols="12" md="4">
                    <v-select
                        v-model="FormEstudiante.SelectGenero"
                        :items="FormEstudiante.sexo"
                        item-text="descripcion"
                        item-value="codigo"
                        label="Select el Género"
                        persistent-hint
                        return-object
                        single-line
                    ></v-select>
                </v-col>

                <v-col cols="12" md="4">
                    <v-select
                        v-model="FormEstudiante.SelectProvincia"
                        :items="FormEstudiante.provincia"
                        item-text="descripcion"
                        item-value="codigo"
                        label="Select el Provincia"
                        persistent-hint
                        return-object
                        single-line
                        @change="consultarCiudad()"
                    ></v-select>
                </v-col>
                <v-col cols="12" md="4">
                    <v-select
                        v-model="FormEstudiante.selectCiudad"
                        :items="FormEstudiante.ciudad"
                        item-text="descripcion"
                        item-value="codigo"
                        label="Select el Ciudad"
                        persistent-hint
                        return-object
                        single-line
                    ></v-select>
                </v-col> -->
            </v-row>
            <v-divider></v-divider>
            <v-col cols="12" md="4">
                    <v-btn  color="primary" elevation="8" dark>Grabar</v-btn>
                </v-col>
        </v-container>
    </v-form>
</template>

<script>
export default {
    data: (vm) => ({
        date: new Date(Date.now() - new Date().getTimezoneOffset() * 60000)
            .toISOString()
            .substr(0, 10),
        dateFormatted: vm.formatDate(
            new Date(Date.now() - new Date().getTimezoneOffset() * 60000)
                .toISOString()
                .substr(0, 10)
        ),
        menu1: false,
        menu2: false,
        items2: [],

        valid: false,
        isLoading: false,
        items: [],
        model: null,
        search: null,

        tab: null,
        picker: new Date(Date.now() - new Date().getTimezoneOffset() * 60000)
            .toISOString()
            .substr(0, 10),
        FormEstudiante: {
            id: "",
            CtxApellidoPaterno: "",
            CtxApellidoMaterno: "",
            CtxPrimerNombre: "",
            CtxSegundoNombre: "",
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
            CtxNombre: "",
        },
        firstname: "",
        lastname: "",
        nameRules: [
            (v) => !!v || "Campos es requerido",
            (v) => v.length <= 50 || "El campo necesita más de 5 caracteres",
        ],
        email: "",
        emailRules: [
            (v) => !!v || "E-mail is required",
            (v) => /.+@.+/.test(v) || "E-mail must be valid",
        ],
    }),
    computed: {
        computedDateFormatted() {
            return this.formatDate(this.date);
        },
    },

    watch: {
        date(val) {
            this.dateFormatted = this.formatDate(this.date);
            this.FormEstudiante.fecha_nacimiento = this.dateFormatted;
        },
        /**aqui empieza el fecht */
        model(val) {
            if (val != null) this.tab = 0;
            else this.tab = null;
        },
        search(val) {
            // Items have already been loaded

            this.isLoading = true;

            // Lazily load input items
            fetch("/modulos/admision/paciente/cargar_paciente/" + val)
                .then((res) => res.clone().json())
                .then((res) => {
                    this.items = res.paciente;
                })
                .catch((err) => {
                    console.log(err);
                })
                .finally(() => (this.isLoading = false));
        },

        /**fin */
    },
    mounted() {},

    methods: {
        Consultar(value) {
            if (value == null || value == undefined) {
                this.paciente.hc = "";

                this.paciente.hc = "";
                this.paciente.cedula = "";
                this.paciente.primer_nombre = "";
                this.paciente.segundo_nombre = "";
                this.paciente.apellido_paterno = "";
                this.paciente.apellido_materno = "";
                this.paciente.fecha_nacimiento = "";
            } else {
                this.paciente.hc = value.hc;

                this.paciente.hc = value.id;
                this.paciente.cedula = value.cedula;
                this.paciente.primer_nombre = value.primer_nombre;
                this.paciente.segundo_nombre = value.segundo_nombre;
                this.paciente.apellido_paterno = value.apellido_paterno;
                this.paciente.apellido_materno = value.apellido_materno;
                this.paciente.fecha_nacimiento = value.fecha_nacimiento;
            }

            // genero: [],
            // this.paciente.SelectGenero:"",
            // provincia: [],
            //this.paciente.SelectProvincia:"",
            //ciudad: [],
            //this.paciente.SelectCiudad:"",
            //pais:"",

            console.log(value);
        },
        formatDate(date) {
            if (!date) return null;

            const [year, month, day] = date.split("-");
            return `${month}/${day}/${year}`;
        },
        parseDate(date) {
            if (!date) return null;

            const [month, day, year] = date.split("/");
            return `${year}-${month.padStart(2, "0")}-${day.padStart(2, "0")}`;
        },
        consultargenero() {
            let url = "/modulos/admision/paciente/cargar_genero";

            fetch(url)
                .then((res) => res.clone().json())
                .then((res) => {
                    this.paciente.genero = res.genero;
                    console.log(res.genero);
                })
                .catch((err) => {
                    console.log(err);
                })
                .finally(() => (this.isLoading = false));
        },
        consultarprovincia() {
            let url = "/modulos/admision/paciente/cargar_provincia";

            fetch(url)
                .then((res) => res.clone().json())
                .then((res) => {
                    this.paciente.provincia = res.provincia;
                })
                .catch((err) => {
                    console.log(err);
                })
                .finally(() => (this.isLoading = false));
        },
        consultarCiudad() {
            let url =
                "/modulos/admision/paciente/cargar_ciudad/" +
                this.paciente.SelectProvincia.codigo;

            fetch(url)
                .then((res) => res.clone().json())
                .then((res) => {
                    this.paciente.ciudad = res.cuidad;
                    console.log(res.cuidad);
                })
                .catch((err) => {
                    console.log(err);
                })
                .finally(() => (this.isLoading = false));
        },
    },
};
</script>
