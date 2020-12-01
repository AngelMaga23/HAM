<template>
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <div class="row">
                    <div class="col-sm-8">
                      <h4 class="card-title"> Simple Table</h4>
                    </div>
                    <div class="col-sm-4" style="text-align: right;width:220px">
                      <button class="btn  btn-primary btn-round ">Nueva Zona</button>
                    </div>
                </div>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table">
                    <thead class=" text-primary">
                      <th>
                        Nombre
                      </th>
                      <th>
                        Descripcción
                      </th>
                      <th>Opcciones</th>
                      </thead>
                    <tbody>
                      <tr :key="index" v-for="(zona,index) of zonas">
                        <td>{{zona.nbZona}}</td>
                        <td>{{zona.DesZonas}}</td>
                        <td><button class="btn btn-primary btn-round"></button></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
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
    },

}
</script>
