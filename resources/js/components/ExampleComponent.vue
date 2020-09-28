<template>
  <div class="card catalogo-seccion">
    <div class="card-header">
      <div class="row">
        <div class="col-md-10">
          <h3>Catalogo Descartes</h3>
        </div>
        <div style="text-align:right" class="col-md-2">
          <button @click="MostrarModal()" class="btn btn-primary btn-block">Nuevo +</button>
        </div>
      </div>
    </div>

    <div class="card-body">
      <div class="row">
        <div class="col-md-12">
          <table class="table">
            <thead>
              <tr>
                <th>Nombre</th>
                <th>Acciones</th>
              </tr>
            </thead>
            <tbody>
              <tr :key="index" v-for="(descarte,index) of Descartes">
                <td>{{ descarte.Nombre }}</td>
                <td>
                  <button @click="Buscar(descarte.IdDescartes)" class="btn btn-success">Editar</button>
                  <button @click="Eliminar(descarte.IdDescartes)" class="btn btn-danger">Eliminar</button>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>

    <modal-component IdModal="modal_descarte" size="modal-lg" titulo="Nuevo" :esnuevo="EsNuevo">
      <template slot="formulario">
        <div class="form-group row">
          <label for="inputEmail3" class="col-sm-2 col-form-label">Nombre</label>
          <div class="col-sm-10">
            <input
              v-model="Nombre"
              type="text"
              class="form-control"
              id="inputEmail3"
              placeholder="Ingrese el nombre de la empresa"
            />
            <span v-if="Errores.Nombre" class="error-validacion">{{ Errores.Nombre[0] }}</span>
          </div>
        </div>

        <div style="display:none" class="form-group row">
          <label for="inputEmail3" class="col-sm-2 col-form-label">Empresa sucursales</label>
          <div class="col-sm-10">
            <select v-model="IdEmpresaSucursal" class="form-control">
              <option
                :value="sucursal.IdEmpresaSucursal"
                :key="index"
                v-for="(sucursal,index) of EmpresaSucursales"
              >{{ sucursal.NombreComercial }}</option>
            </select>
            <span
              v-if="Errores.IdEmpresaSucursal"
              class="error-validacion"
            >{{ Errores.IdEmpresaSucursal[0] }}</span>
          </div>
        </div>
      </template>

      <template slot="acciones">
        <button v-if="EsNuevo" @click="Agregar()" class="btn btn-primary">Guardar</button>
        <button v-else @click="Modificar()" class="btn btn-primary">Guardar cambios</button>
      </template>
    </modal-component>
  </div>
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