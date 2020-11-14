<template>
  <form-basic>
    <template slot="titulo">
     Reserva de habitacion      
    </template>
    <template slot="formulario">
      	<div class="form-group row">
	  <label for="" class="col-sm-2 col-form-label">fecha inicio</label>
	    	<div class="col-sm-8">
		  <input type="date" class="form-control" name="trip-start" value="2020-07-22" min="2020-01-01" max="2020-12-31">
	    	</div>
	</div> 
	<div class="form-group row">
	  <label for="" class="col-sm-2 col-form-label">fecha fin</label>
	      <div class="col-sm-8">
		<input type="date" class="form-control" name="trip-start" value="2020-07-22" min="2020-01-01" max="2020-12-31">
              </div>
	</div>
	<div class="form-group row">
	  <label for="" class="col-sm-2 col-form-label">Numero de ocupantes</label>
	     <div class="col-sm-8">
		<input type="number" class="form-control">
              </div>
	</div>
	<div class="form-group row">
	  <label for="" class="col-sm-2 col-form-label">Habitacion</label>
	      <div class="col-sm-4">
		<input type="text" class="form-control"> 
	      </div>
	      <div class="col-sm-4">
		 <input type="submit" value="buscar" class="btn btn-info">
	      </div>
        </div>	 
	  <table-basic>
	      <template slot="thead">
		<th>Num Habitacion</th>
		<th>Piso</th>
		<th>Tipo</th>
	      </template>
	      <template slot="tbody">
		<td>123</td>
		<td>1</td>
		<td>Individual</td>
		<td><input type="submit" value="Seleccionar" class="btn btn-info"></td>
	      </template>
	  </table-basic>
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
