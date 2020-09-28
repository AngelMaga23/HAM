<template>
<div class="card catalogo-seccion">
    <div class="card-header">
        <div class="row">
            <div class="col-md-10">
                <h3>Empleados</h3>
            </div>
            <div style="text-align: right" class="col-md-2">
                <button @click="MostrarModal()" class="btn btn-primary btn-block">
                    Nuevo +
                </button>
            </div>
        </div>
    </div>

    <Modal-component IdModal="Modal" size="modal-lg" titulo="Nuevo" :esnuevo="EsNuevo">
        <template slot="formulario">
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Nombre</label>
                <div class="col-sm-10">
                    <input />
                </div>
            </div>
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Nombre</label>
                <div class="col-sm-10">
                    <input />
                </div>
            </div>
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Nombre</label>
                <div class="col-sm-10">
                    <input />
                </div>
            </div>
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Nombre</label>
                <div class="col-sm-10">
                    <input />
                </div>
            </div>
        </template>
        <template slot="acciones">

        </template>
    </Modal-component>
</div>
</template>

<script>
export default {
    data() {
        return {

        };
    },
    methods: {
        MostrarModal() {
            this.LimpiarCampos();

            $("#Modal").modal();
        },
        LimpiarCampos() {
            this.Nombre = "";
            this.IdEmpresaSucursal = "";
            this.IdDescartes = "";
        }

    }
};
</script>
