<template>
  <form-basic>
    <template slot="titulo">
      Habitaciones
    </template>
    <template slot="formulario">
      <div class="form-group row">
	  <label class="col-sm-2 col-form-label" >Num Piso</label>
	  <div class="col-sm-8">
	      <select class="form-control" id="exampleFormControlSelect1">
                  <option>1</option>
                  <option>2</option>
                  <option>3</option>
                  <option>4</option>
                  <option>5</option>
              </select> 
	  </div>
      </div>
      <div class="form-group row">
	  <label class="col-sm-2 col-form-label" >Personas maximas</label>
	  <div class="col-sm-8">
	     <select class="form-control" id="exampleFormControlSelect1">
                  <option>1</option>
                  <option>2</option>
                  <option>3</option>
                  <option>4</option>
              </select>
	  </div>
      </div>
      <div class="form-group row">
	  <label class="col-sm-2 col-form-label" >Ocupacion</label>
	  <div class="col-sm-8">
	  <input type="text" class="form-control" value="Disponible" disabled>
	  </div>
      </div>
      <input type="submit" class="btn btn-primary" value="Registrar">
    </template>
  </form-basic>
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
