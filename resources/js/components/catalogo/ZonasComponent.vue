<template>
  <form-basic>
    <template slot="titulo">
      Zonas
    </template>
    <template slot="formulario">
       <div class="col-md-6">
          <div class="form-group row">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Nombre</label>
              <div class="col-sm-8">
                <input v-model="nbZona" type="text" class="form-control">
              </div>
          </div>
	  <div class="form-group row">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Descripción</label>
              <div class="col-sm-8">
	      <textarea v-model="DesZonas" name="" id="" cols="30" rows="3" class="form-control"></textarea>
              </div>
          </div>
         
	  <div class="form-group row">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Personas permitidas</label>
              <div class="col-sm-8">
                <input v-model="numPersonasPermitidasMax" type="number" class="form-control">
              </div>
          </div>
	  <div class="form-group row">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Estatus</label>
              <div class="col-sm-8">
                            <select v-model="idEstatus" class="form-control" id="exampleFormControlSelect1">
                                <option>Libre</option> 
                            </select>
              </div>
          </div>
       </div>
      <div class="col-md-6" >
	<input type="file" @ accept="image/png, image/jpeg, image/gif"/>

	  <br>
	  <button class="btn btn-success">Guardar</button>
      </div>
      <div class="col-md-3 center" >
	
                 </div>
	  <table-basic>
	      <template slot="thead">
		<th>Nombre</th>
		<th>Descripción</th>
		<th>Personas permitidas</th> 
		<th>Acciones</th>
	      </template>
	      <template slot="tbody">
		<tr :key="index" v-for="(zona,index) of Zonas">
		  <td>{{zona.nbZona}}</td>
		  <td>{{zona.DesZonas}}</td>
		  <td>{{zona.numPersonasPermitidasMax}}</td>
		  <td><input type="submit" value="editar" class="btn btn-info"></td>
		</tr>
	      </template>
	  </table-basic> 
    </template>

  </form-basic>

</template> 

<script>
export default {
    data() {
        return {
	  Zonas:[],
	  nbZona:"",
	  pathArchivo:"",
	  DesZonas:"",
	  idEstatus:"",
	  numPersonasPermitidasMax:"",
	  EsNuevo: true,
	  Errores: [],
	  url:null,
        };
    },
    methods: {
	
        LimpiarCampos() {
            this.nbZona= "";
            this.idEstatus = "";
            this.numPersonasPermitidasMax= "";
        },
	Listar(){
	  axios.get("api/zonas").then(Respuesta=>{this.Zonas=Respuesta.data;});
	},
	Save(){
	  let json={
	     nbZona:this.nbZona,
	     numPersonasPermitidasMax:this.numPersonasPermitidasMax,
	     DesZonas:this.DesZonas,
	     pathArchivo:this.file
	  };
	  axios.post("api/zonas/save",{Json :JSON.stringify(json)})
	    .then(Respuesta=>{
	      this.EsNuevo=true;
	      this.LimpiarCampos();
	      this.Listar();
	      }).catch(error=>{
		  if(error.response.status==500){
		    this.Errores=error.response.data.errors;
		  }
		});
	},
	VerImg(e){
	  const file=e.target.files[0];
	  this.url=URL.createObjectURL(file);
	},
    },
    created(){
      this.Listar();
    },

}
</script>
