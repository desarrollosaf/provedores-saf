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
                                        <input v-model="form.description" type="text" name="description"
                                               class="form-control"
                                               :class="{ 'is-invalid': form.errors.has('description') }">
                                        <has-error :form="form" field="description"></has-error>
                                    </div>
                                    <div class="form-group col">
                                        <label>Sitio web:</label>
                                        <input v-model="form.description" type="text" name="description"
                                               class="form-control"
                                               :class="{ 'is-invalid': form.errors.has('description') }">
                                        <has-error :form="form" field="description"></has-error>
                                    </div>
                                </div>
                                <div class="row">

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
                description: '',
            })
        }
    },
    methods: {
        createProveedor() {
            this.$Progress.start();
            this.form.post('api/category')
                .then((data) => {
                    $('#addNew').modal('hide');

                    Toast.fire({
                        icon: 'success',
                        title: data.data.message
                    });
                    this.$Progress.finish();
                    this.loadCategories();

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
