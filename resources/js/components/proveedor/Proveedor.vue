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
                            <form @submit.prevent="createProveedor">
                                <div class="row">
                                    <div class="form-group col">
                                        <label>Nombre de la organización:</label>
                                        <input v-model="form.name" type="text" name="name"
                                               class="form-control"
                                               :class="{ 'is-invalid': form.errors.has('name') }">
                                        <has-error :form="form" field="name"></has-error>
                                    </div>
                                    <div class="form-group col">
                                        <label>Esquema:</label>
                                        <input v-model="form.esquema" type="text" name="esquema"
                                               class="form-control"
                                               :class="{ 'is-invalid': form.errors.has('description') }">
                                        <has-error :form="form" field="description"></has-error>
                                    </div>
                                    <div class="form-group col">
                                        <label>Sitio web:</label>
                                        <input v-model="form.sitio_web" type="text" name="sitio_web"
                                               class="form-control"
                                               :class="{ 'is-invalid': form.errors.has('description') }">
                                        <has-error :form="form" field="description"></has-error>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <h5 class="ml-3">Domicilio</h5>
                                </div>
                                <div class="row">
                                    <div class="form-group col">
                                        <label>Calle:</label>
                                        <input v-model="form.calle" type="text" name="calle"
                                               class="form-control"
                                               :class="{ 'is-invalid': form.errors.has('name') }">
                                        <has-error :form="form" field="name"></has-error>
                                    </div>
                                    <div class="form-group col">
                                        <label>Código postal:</label>
                                        <input v-model="form.codigo_postal" type="text" name="codigo_postal"
                                               class="form-control"
                                               :class="{ 'is-invalid': form.errors.has('description') }">
                                        <has-error :form="form" field="description"></has-error>
                                    </div>
                                    <div class="form-group col">
                                        <label>Estado:</label>
                                        <input v-model="form.estado" type="text" name="estado"
                                               class="form-control"
                                               :class="{ 'is-invalid': form.errors.has('description') }">
                                        <has-error :form="form" field="description"></has-error>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col">
                                        <label>Municipio:</label>
                                        <input v-model="form.municipio" type="text" name="municipio"
                                               class="form-control"
                                               :class="{ 'is-invalid': form.errors.has('name') }">
                                        <has-error :form="form" field="name"></has-error>
                                    </div>
                                    <div class="form-group col">
                                        <label>Localidad:</label>
                                        <input v-model="form.localidad" type="text" name="localidad"
                                               class="form-control"
                                               :class="{ 'is-invalid': form.errors.has('description') }">
                                        <has-error :form="form" field="description"></has-error>
                                    </div>
                                </div>
                                <div class="row">
                                    <h5 class="ml-3">Contacto</h5>
                                </div>
                                <div class="row">
                                    <div class="form-group col">
                                        <label>Nombre:</label>
                                        <input v-model="form.nombre_contacto" type="text" name="nombre_contacto"
                                               class="form-control"
                                               :class="{ 'is-invalid': form.errors.has('nombre_contacto') }">
                                        <has-error :form="form" field="name"></has-error>
                                    </div>
                                    <div class="form-group col">
                                        <label>Correo electrónico:</label>
                                        <input v-model="form.email" type="text" name="email"
                                               class="form-control"
                                               :class="{ 'is-invalid': form.errors.has('email') }">
                                        <has-error :form="form" field="description"></has-error>
                                    </div>
                                    <div class="form-group col">
                                        <label>Telefono:</label>
                                        <input v-model="form.telefono" type="text" name="telefono"
                                               class="form-control"
                                               :class="{ 'is-invalid': form.errors.has('description') }">
                                        <has-error :form="form" field="description"></has-error>
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
export default {
    data() {
        return {
            // Create a new form instance
            form: new Form({
                id: '',
                name: '',
                esquema: '',
                nombre_legal: '',
                sitio_web: '',
                calle: '',
                codigo_postal: '',
                estado: '',
                municipio: '',
                localidad: '',
                nombre_contacto: '',
                email: '',
                telefono: '',
            })
        }
    },
    methods: {
        createProveedor() {
            this.$Progress.start();
            console.log(this.form);
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
        }

    },
    mounted() {

    },
    created() {
        this.$Progress.start();
        this.$Progress.finish();
    }
}
</script>
