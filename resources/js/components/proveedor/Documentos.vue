<template>
    <section class="content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Sube tu documentación</div>

                        <div class="card-body">
                            <div class="flex justify-center">
                                <button
                                    @click="moral = !moral"
                                    class="btn btn-primary btn-sm"
                                >
                                    ¿Persona Moral?
                                </button>
                                <hr />
                                <div v-if="moral">
                                    <h5 align="center">Documentación para personas físicas</h5>
                                    <div class="row">
                                        <div class="col">
                                        <label for="formFile" class="form-label">Primer Documento</label>
                                            <input class="form-control" type="file" id="formFile">
                                        </div>
                                    </div>
                                </div>
                                <div v-else>
                                    <h5 align="center">Documentación para personas morales</h5>
                                    <div class="row">
                                        <div class="col">
                                        <label for="formFile" class="form-label">Primer Documento</label>
                                            <input class="form-control" type="file" id="formFile">
                                        </div>
                                    </div>
                                </div>
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
    mounted() {
        console.log("Component mounted.");
    },

    data() {
        return {
            moral: true,
        };
    },
};
</script>
