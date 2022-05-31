<template>
    <section class="content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Example Component</div>

                        <div class="card-body">
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nombre</th>
                                        <th>Rfc</th>
                                        <th>Regimen fiscal</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr v-for="proveedor in proveedores.data" :key="proveedor.id">

                                        <td>{{ proveedor.id }}</td>
                                        <td>{{ proveedor.nombre }}</td>
                                        <td>{{ proveedor.rfc }}</td>
                                        <td>{{ proveedor.regimen_fiscal }}</td>
                                        <!-- <td><img v-bind:src="'/' + product.photo" width="100" alt="product"></td> -->
                                        <td>

                                            <!--                                            <a href="#" @click="editModal(product)">-->
                                            <!--                                                <i class="fa fa-edit blue"></i>-->
                                            <!--                                            </a>-->
                                            <!--                                            /-->
                                            <!--                                            <a href="#" @click="deleteProduct(product.id)">-->
                                            <!--                                                <i class="fa fa-trash red"></i>-->
                                            <!--                                            </a>-->
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
export default {
    data() {
        return {
            // editmode: false,
            proveedores: {},
            // form: new Form({
            //     id : '',
            //     category : '',
            //     name: '',
            //     description: '',
            //     tags:  [],
            //     photo: '',
            //     category_id: '',
            //     price: '',
            //     photoUrl: '',
            // }),
            // categories: [],
            //
            // tag:  '',
            // autocompleteItems: [],
        }
    },
    methods: {
        getProveedores() {
            return axios.get('api/proveedores').then(({data}) => (this.proveedores = data));
        },
        testApi() {
            let url  = 'https://mexico-zip-codes.p.rapidapi.com/codigo_postal/' + 50230;
            let options = {
                method: 'GET',
                url: url,
                headers: {
                    'X-RapidAPI-Host': 'mexico-zip-codes.p.rapidapi.com',
                    'X-RapidAPI-Key': 'b0f17c1a38mshb7a12cfb9ade250p1885a1jsn7f4a29f4e6cb'
                }
            };
            axios2.request(options).then(function (response) {
                console.log(response.data);
            }).catch(function (error) {
                console.error(error);
            });
        }

    },
    created() {
        this.$Progress.start();
        this.getProveedores();
        this.testApi();
        this.$Progress.finish();
    },

    mounted() {
        // this.getProveedores()
        console.log(this.proveedores)

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
