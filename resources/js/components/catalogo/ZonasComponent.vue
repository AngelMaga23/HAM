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
	      <textarea name="" id="" cols="30" rows="3" class="form-control"></textarea>
              </div>
          </div>
          <div class="form-group row">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Imagen</label>
              <div class="col-sm-8">
                <input type="file" class="form-control" accept="image/*" @change="VerImg"/>
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
                <input v-model="idEstatus" type="text" class="form-control" value="Lleno" disabled>
              </div>
          </div>
       </div>
      <div class="col-md-3" >
      <br>
      <br>
	    <img v-if="url" :src="url" width="60%" style="border-style:solid"/>
      </div>
      <div class="col-md-3 center" >
      <br>
      <br>
      <br>
      <input type="submit" class="btn btn-primary btn-lg" value="Guardar">
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
	Agregar(){
 
	},
	VerImg(e){
	  const file=e.target.files[0];
	  this.url=URL.createObjectURL(file); 
	}
      },
    created(){
      this.Listar();
    }
};
</script>
