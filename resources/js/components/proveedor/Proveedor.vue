<template>
    <section class="content">
        <div class="container-fluid">
            <div class="row">

                <div class="col-12">

                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Información general</h3>
                        </div>
                        <div class="card-body">
                            <form @submit.prevent="editmode ? updateProveedor() : createProveedor()">
                                <div class="row">
                                    <div class="form-group col-4">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" value="0"
                                                   type="radio" name="regimen_fiscal" v-model="form.regimen_fiscal"
                                                   id="regimen_fiscal_fisica">
                                            <label class="form-check-label" for="regimen_fiscal_fisica">
                                                Persona fisica
                                            </label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" value="1"
                                                   type="radio" name="regimen_fiscal" v-model="form.regimen_fiscal"
                                                   id="regimen_fiscal_moral">
                                            <label class="form-check-label" for="regimen_fiscal_moral">
                                                Persona Moral
                                            </label>
                                        </div>
                                        <has-error :form="form" field="regimen_fiscal"></has-error>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col">
                                        <label>Nombre de la organización:</label>
                                        <input v-model="form.nombre_organizacion" type="text"
                                               name="nombre_organizacion"
                                               class="form-control"
                                               :class="{ 'is-invalid': form.errors.has('nombre_organizacion') }">
                                        <has-error :form="form" field="nombre_organizacion"></has-error>
                                    </div>
                                    <div class="form-group col">
                                        <label>RFC:</label>
                                        <input v-model="form.rfc" type="text" name="rfc"
                                               class="form-control"
                                               :class="{ 'is-invalid': form.errors.has('rfc') }">
                                        <has-error :form="form" field="rfc"></has-error>
                                    </div>
                                    <div class="form-group col">
                                        <label>Sitio web:</label>
                                        <input v-model="form.sitio_web" type="text" name="sitio_web"
                                               class="form-control"
                                               :class="{ 'is-invalid': form.errors.has('sitio_web') }">
                                        <has-error :form="form" field="sitio_web"></has-error>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-4">
                                        <label>Razón social:</label>
                                        <input v-model="form.razon_social" type="text" name="razon_social"
                                               class="form-control"
                                               :class="{ 'is-invalid': form.errors.has('razon_social') }">
                                        <has-error :form="form" field="razon_social"></has-error>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <h5 class="ml-3">Domicilio</h5>
                                </div>
                                <div class="row">
                                    <div class="form-group col">
                                        <label>Calle:</label>
                                        <input v-model="form.domicilio.calle" type="text" name="domicilio.calle"
                                               class="form-control"
                                               :class="{ 'is-invalid': form.errors.has('domicilio.calle') }">
                                        <has-error :form="form" field="domicilio.calle"></has-error>
                                    </div>
                                    <div class="form-group col">
                                        <label>Número exterior:</label>
                                        <input v-model="form.domicilio.numero_exterior" type="text"
                                               name="domicilio.numero_exterior"
                                               class="form-control"
                                               :class="{ 'is-invalid': form.errors.has('domicilio.numero_exterior') }">
                                        <has-error :form="form" field="numero_exterior"></has-error>
                                    </div>
                                    <div class="form-group col">
                                        <label>Número Interior:</label>
                                        <input v-model="form.domicilio.numero_interior" type="text"
                                               name="domicilio.numero_interior"
                                               class="form-control"
                                               :class="{ 'is-invalid': form.errors.has('domicilio.numero_interior') }">
                                        <has-error :form="form" field="domicilio.numero_interior"></has-error>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col">
                                        <label>Código postal:</label>
                                        <input v-model="form.domicilio.codigo_postal" v-on:blur="getAsentamientos()"
                                               type="text"
                                               name="domicilio.codigo_postal"
                                               class="form-control"
                                               :class="{ 'is-invalid': form.errors.has('domicilio.codigo_postal') }">
                                        <has-error :form="form" field="domicilio.codigo_postal"></has-error>
                                    </div>
                                    <div class="form-group col">
                                        <label>Estado:</label>
                                        <input v-model="form.domicilio.estado" type="text" name="domicilio.estado"
                                               class="form-control"
                                               :class="{ 'is-invalid': form.errors.has('domicilio.estado') }">
                                        <has-error :form="form" field="domicilio.estado"></has-error>
                                    </div>
                                    <div class="form-group col-4">
                                        <label>Municipio:</label>
                                        <input v-model="form.domicilio.municipio" type="text" name="domicilio.municipio"
                                               class="form-control"
                                               :class="{ 'is-invalid': form.errors.has('domicilio.municipio') }">
                                        <has-error :form="form" field="domicilio.municipio"></has-error>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-4">
                                        <label>Localidad:</label>
                                        <input v-model="form.domicilio.localidad" type="text" name="domicilio.localidad"
                                               class="form-control"
                                               :class="{ 'is-invalid': form.errors.has('domicilio.localidad') }">
                                        <has-error :form="form" field="domicilio.localidad"></has-error>
                                    </div>
                                </div>
                                <div class="row">
                                    <h5 class="ml-3">Contacto</h5>
                                </div>
                                <div class="row">
                                    <div class="form-group col">
                                        <label>Nombre:</label>
                                        <input v-model="form.contacto.nombre_contacto" type="text"
                                               name="contacto.nombre_contacto"
                                               class="form-control"
                                               :class="{ 'is-invalid': form.errors.has('contacto.nombre_contacto') }">
                                        <has-error :form="form" field="contacto.nombre_contacto"></has-error>
                                    </div>
                                    <div class="form-group col">
                                        <label>Correo electrónico:</label>
                                        <input v-model="form.contacto.email" type="text" name="contacto.email"
                                               class="form-control"
                                               :class="{ 'is-invalid': form.errors.has('contacto.email') }">
                                        <has-error :form="form" field="contacto.email"></has-error>
                                    </div>
                                    <div class="form-group col">
                                        <label>Telefono:</label>
                                        <input v-model="form.contacto.telefono" type="text" name="contacto.telefono"
                                               class="form-control"
                                               :class="{ 'is-invalid': form.errors.has('contacto.telefono') }">
                                        <has-error :form="form" field="telefono"></has-error>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-4">
                                        <label>Fax:</label>
                                        <input v-model="form.contacto.fax" type="text" name="contacto.fax"
                                               class="form-control"
                                               :class="{ 'is-invalid': form.errors.has('contacto.fax') }">
                                        <has-error :form="form" field="contacto.fax"></has-error>
                                    </div>
                                    <div class="form-group col-4">
                                        <label>Url:</label>
                                        <input v-model="form.contacto.url" type="text" name="contacto.url"
                                               class="form-control"
                                               :class="{ 'is-invalid': form.errors.has('contacto.url') }">
                                        <has-error :form="form" field="contacto.url"></has-error>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Create</button>
                            </form>
                        </div>
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </section>
</template>

<script>
import VueTagsInput from "@johmun/vue-tags-input";

export default {
    components: {
        VueTagsInput,
    },
    data() {
        return {
            // Create a new form instance
            editmode: true,
            form: new Form({
                id: window.user.id,
                regimen_fiscal: '',
                nombre_organizacion: '',
                rfc: '',
                sitio_web: '',
                razon_social: '',
                domicilio: {
                    calle: '',
                    numero_exterior: '',
                    numero_interior: '',
                    codigo_postal: '',
                    estado: '',
                    municipio: '',
                    localidad: '',
                },
                contacto: {
                    nombre_contacto: '',
                    email: '',
                    fax: '',
                    telefono: '',
                    url: '',
                },

            }),
        }
    },
    methods: {
        createProveedor() {
            this.$Progress.start();
            this.form.post('api/proveedor')
                .then((data) => {
                    Toast.fire({
                        icon: 'success',
                        title: data.data.message
                    });
                    this.$Progress.finish();
                })
                .catch(() => {
                    Toast.fire({
                        icon: 'error',
                        title: 'Some error occured! Please try again'
                    });
                })
            this.$Progress.finish();
        },
        updateProveedor() {
            this.$Progress.start();
            this.form.put('api/proveedor/' + this.form.id)
                .then((response) => {
                    Toast.fire({
                        icon: 'success',
                        title: response.data.message
                    });
                    this.$Progress.finish();
                    //  Fire.$emit('AfterCreate');

                })
                .catch(() => {
                    this.$Progress.fail();
                });
        },
        getAsentamientos() {
            let url = "api/asentamientos/" + this.form.domicilio.codigo_postal;
            axios.get(url)
                .then(response => {
                    console.log(response)
                });
        }
    },
    mounted() {
        this.$Progress.start();
        let url = "api/proveedor/" + window.user.id + "/edit";
        axios.get(url)
            .then(({data}) => (this.form.fill(data.data))).catch(() => {
            this.editmode = false;
        });
        this.$Progress.finish();
    },
    created() {
        this.$Progress.start();
        this.$Progress.finish();
    },
    filters: {
        truncate: function (text, length, suffix) {
            return text.substring(0, length) + suffix;
        },
    },
    computed: {
        filteredItems() {
            return this.autocompleteItems.filter(i => {
                return i.text.toLowerCase().indexOf(this.tag.toLowerCase()) !== -1;
            });
        },
    },
}
</script>
