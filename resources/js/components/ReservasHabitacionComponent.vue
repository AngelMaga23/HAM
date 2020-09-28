<template>
<div class="card catalogo-seccion">
    <div class="card-header">
        <div class="row">
            <div class="col-md-10">
                <h3>Reserva Habitación</h3>
            </div>
            <div style="text-align: right" class="col-md-2">
                <button @click="MostrarModal()" class="btn btn-primary btn-block">
                    Nuevo
                </button>
            </div>
        </div>
    </div>
    <div>
        <table class="table table-striped">

            <thead>
                <tr>
                    <th>Cliente</th>
                    <th>N° Reservación</th>

                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>John</td>
                    <td>Doe</td>
                </tr>
                <tr>
                    <td>Mary</td>
                    <td>Moe</td>
                   
                </tr>
                <tr>
                    <td>July</td>
                    <td>Dooley</td>
                    
                </tr>
            </tbody>
        </table>
    </div>

    <Modal-component IdModal="Modal" size="modal-lg" titulo="Nuevo" :esnuevo="EsNuevo">
        <template slot="formulario">
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Reservación</label>
                <div class="col-sm-10">
                    <select class="form-control form-control-lg">
                        <option>Large select</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Clientes</label>
                <div class="col-sm-10">
                    <select class="form-control form-control-lg">
                        <option>Large select</option>
                    </select>
                </div>
            </div>
        </template>
        <template slot="acciones"> </template>
    </Modal-component>
</div>
</template>

<script>
export default {
    data() {
        return {};
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
        },
    },
};
</script>
