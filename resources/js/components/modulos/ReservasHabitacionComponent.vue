<template>
  <form-basic>
    <template slot="titulo">
       Reserva de habitacion      
    </template>
    <template slot="formulario">
      	 
    </template>

  </form-basic>
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
