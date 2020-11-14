<template>
  <form-basic>
    <template slot="titulo">
      Estatus 
    </template>
    <template slot="formulario">        
    <h4 class="mb"> Registro</h4>
      <form class="form-horizontal style-form" method="get">
        <div class="row">
	  <div class="col-md-6">
	     <div class="form-group row">
		<label for="inputEmail3" class="col-sm-2 col-form-label">Nombre</label>
		  <div class="col-sm-8">
		    <input v-model="nbEstatus" type="text" class="form-control">
		  </div>
	      </div>
	      <div class="form-group row">
		<label for="inputEmail3" class="col-sm-2 col-form-label">tipo</label>
		  <div class="col-sm-8">
		    <select name="" id="" class="form-control">
		      <option value="default">Default</option>
		    </select>
		  </div>
	      </div>
	    <input type="submit" class="" value="Guardar">
	  </div>
	  <div class="col-md-6">
	      <table-basic>
		<template slot="title">
		    Guardados
		</template>
		<template slot="thead">
		  <th>Nombre</th>
		  <th>Acciones</th>
		</template>
		<template slot="tbody">
		  <td></td>
		  <td><input type="submit" value="editar"></td>
		</template>
	      </table-basic>
	    </div>
        </div>
      </form>
    </template>
  </form-basic>
</template>

<script>
  export default{
    data(){
      return{
	
      };
    },
    methods: {
	  VerEstatus(){

	  },
	  Listar(){

	  },
    }
  }	
</script>
