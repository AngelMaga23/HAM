<template>
<div class="col-md-12">
            <div class="content-panel">
              <h4> Reserva de habitacion </h4>
              <hr>
              <table-basic>

              </table-basic>
            </div>
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
