<template>


</template>

<script>
export default {
  data() {
    return {
      Descartes: [],
      EmpresaSucursales: [],

      Nombre: "",
      IdEmpresaSucursal: "",

      IdDescartes: "",

      EsNuevo: true,

      Errores: []
    };
  },

  methods: {
    Listar() {
      axios.get("api/descartes").then(Respuesta => {
        this.Descartes = Respuesta.data;
      });
    },

    ListarEmpresaSucursal() {
      axios.get("api/empresasucursal").then(Respuesta => {
        this.EmpresaSucursales = Respuesta.data;
      });
    },

    Buscar(IdDescartes) {
      axios.get("api/descartes/" + IdDescartes).then(Respuesta => {
        this.EsNuevo = false;

        this.Nombre = Respuesta.data.Nombre;
        this.IdEmpresaSucursal = Respuesta.data.IdEmpresaSucursal;

        $("#modal_descarte").modal();
      });
    },

    Modificar() {
      let json = {
        Nombre: this.Nombre,
        IdEmpresaSucursal: this.IdEmpresaSucursal,
        IdDescartes: this.IdEmpresaSucursal
      };

      axios
        .post("api/descartes/update", { Json: JSON.stringify(json) })
        .then(Respuesta => {
          this.EsNuevo = true;
          this.Listar();

          $("#modal_descarte").modal("hide");

          swal("Hecho!", "Registro modificado", "success");
        })
        .catch(error => {
          if (error.response.status == 500) {
            this.Errores = error.response.data.errors;
          }
        });
    },

    Agregar() {
      let json = {
        Nombre: this.Nombre,
        IdEmpresaSucursal: this.IdEmpresaSucursal
      };

      axios
        .post("api/descartes", { Json: JSON.stringify(json) })
        .then(Respuesta => {
          this.LimpiarModelo();

          this.Listar();
          this.ListarEmpresaSucursal();

          this.EsNuevo = true;

          $("#modal_descarte").modal("hide");

          swal("Hecho!", "Registro Guardado", "success");
        })
        .catch(error => {
          if (error.response.status == 500) {
            this.Errores = error.response.data.errors;
          }
        });
    },

    Eliminar(IdDescartes) {
      swal({
        title: "Estas seguro?",
        text: "El elemento sera eliminado!",
        icon: "warning",
        buttons: true,
        dangerMode: true
      }).then(willDelete => {
        if (willDelete) {
          let json = {
            IdDescartes: IdDescartes
          };

          axios
            .post("api/descartes/delete", { Json: JSON.stringify(json) })
            .then(Respuesta => {
              this.Listar();
              this.ListarEmpresaSucursal();

              swal("Hecho!", "Registro eliminado", "success");
            });
        } else {
        }
      });
    },

    MostrarModal() {
      this.LimpiarModelo();

      $("#modal_descarte").modal();
    },

    LimpiarModelo() {
      this.Nombre = "";
      this.IdEmpresaSucursal = "";
      this.IdDescartes = "";
    }
  },

  created() {
    this.Listar();
    this.ListarEmpresaSucursal();
  }
};
</script>
