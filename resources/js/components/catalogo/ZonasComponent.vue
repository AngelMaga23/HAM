<template>
  <div class="row">
      <table-basic v-if="Form == 1">
        <template slot="title">
                  Zonas
                </template>
                <template slot="button">
                  <button @click="modal()" class="btn btn-primary btn-round" > <i class="nc-icon nc-simple-add"></i>Nuevo</button>
                </template>		
                <template slot="thead">
                  <th>Nombre</th>
                  <th>Descripción</th>
                  <th>Numero de Personas </th>
		  <th>Acciones</th>
		</template>
		<template slot="tbody">
		<tr :key="index" v-for="(zona,index) of Zonas">
                  <td>{{zona.nbZona}}</td>
                  <td>{{zona.DesZonas}}</td>
                  <td>{{zona.numPersonasPermitidasMax}}</td>
		  <td>
		    <button @click="Search(estatu.id)" class="btn btn-success btn-round"> <i class="nc-icon nc-simple-delete"></i>Editar</button>
		    <button @click="Search(estatu.id)" class="btn btn-danger btn-round"> <i class="nc-icon nc-simple-remove"></i>Elimnar</button>
		  </td>
		</tr>
		</template>
      </table-basic>
      <form-basic v-if="Form == 2">
        <template slot="title">
                Areas
        </template>
        <template slot="button">
            <button class="btn btn-primary btn-round" @click="LimpiarCampos()"><i class="nc-icon nc-minimal-left"></i> Lista </button>
        </template>
        <template slot="body">
          <form>
              <div class="row">
                    <div class="col-md-5 pr-1">
                      <div class="form-group">
                        <label>Nombre</label>
                        <input v-model="nbEstatus" type="text" class="form-control">
                      </div>
                    </div>
                    <div class="col-md-3 pl-1">
                      <div class="form-group">
                        <label>Numero de personas permitidas</label>
                        <input v-model="NumPersonasMax"  type="number" class="form-control"> 
                      </div>
                    </div>
                    <div class="col-md-2 pl-1">
                      <div class="form-group">
                        <label>Admite niños?</label>
                          <select v-model="FgAdmiteNinios" name="" id="" class="form-control">
		            <option value="si">SI</option>
		            <option value="no">NO</option>
		          </select>
                      </div>
                      </div>
                    <div class="col-md-2 pl-1">
                      <div class="form-group">
                        <label>Zonas</label>
                          <select v-model="IdZona" name="" id="" class="form-control">
		            <option value="si">SI</option>
		            <option value="no">NO</option>
		          </select>
                      </div>
                    </div>
              </div>
              <div class="row">
                    <div class="col-md-6 pr-1">
                      <div class="form-group">
                        <label>Descripción</label>
                        <textarea name="" id="" cols="30" rows="10" class="form-control"></textarea>
                      </div>
                    </div>

              </div>
              <div class="row">
                <div class="update ml-auto mr-auto">
                      <button  v-if="EsNuevo" class="btn btn-info btn-round" @click="Save()">Guardar</button>
	              <button v-else @click="Update()" class="btn btn-info btn-round">Modificar</button>
                </div>
              </div>
          </form>
        </template>
       </form-basic>
  </div>
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
          Form:"",
        };
    },
    methods: {
	
        LimpiarCampos() {
            this.nbZona= "";
            this.idEstatus = "";
            this.numPersonasPermitidasMax= "";
        },
	Listar(){
	  axios.get("web/zonas").then(Respuesta=>{this.Zonas=Respuesta.data;});
	},
	Save(){
	  let json={
	     nbZona:this.nbZona,
	     numPersonasPermitidasMax:this.numPersonasPermitidasMax,
	     DesZonas:this.DesZonas,
	     pathArchivo:this.file
	  };
	  axios.post("web/zonas/save",{Json :JSON.stringify(json)})
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
      this.Form=1;
    },

}
</script>
