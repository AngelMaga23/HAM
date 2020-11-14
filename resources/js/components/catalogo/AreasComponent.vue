<template>
<form-basic>
    <template slot="titulo">
        Areas
    </template>
    <template slot="formulario">
        <h4 class="mb"> Registro</h4>

        <form class="form-horizontal style-form" method="get">
            <div class="row">
          <div class="col-md-6">
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Nombre</label>
                        <div class="col-sm-8">
                            <input v-model="CorreoContacto" type="text" class="form-control">
                        </div>
                    </div>
		    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Imagen</label>
                        <div class="col-sm-8">
			<input type="file" class="form-control">
                        </div> 
                    </div>
	  </div>    
	  <div class="col-md-6">
		<div class="form-group row">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Descripcion</label>
                        <div class="col-sm-8">
                            <textarea class="form-control" rows="1" ></textarea>
                        </div> 
                </div>
		<div class="form-group row">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Zonas</label>
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
	  </div>
           <div class="col-md-6">          
		    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Num personas</label>
                        <div class="col-sm-8">
			  <input type="number" class="form-control" >
                        </div> 
                    </div>
		    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Admite niños</label>
                        <div class="col-sm-8">
			  <label class="checkbox-inline">
			      <input type="checkbox" id="inlineCheckbox2" value="option2"> Si
			  </label>
			  <label class="checkbox-inline">
			      <input type="checkbox" id="inlineCheckbox3" value="option3"> No
			  </label>
                        </div> 
                    </div>
                </div>
	    </div>
	    <div class="col-md-6">
	    </div>
	</form>
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
