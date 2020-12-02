<template>
  <div class="row">
      <table-basic v-if="Form == 1">
        <template slot="title">
                  Areas
                </template>
                <template slot="button">
                  <button @click="modal()" class="btn btn-primary btn-round" > <i class="nc-icon nc-simple-add"></i>Nuevo</button>
                </template>		
                <template slot="thead">
                  <th>Nombre</th>
                  <th>Descripción</th>
                  <th>Id Zonas</th>
                  <th>Numero de Personas </th>
		  <th>Acciones</th>
		</template>
		<template slot="tbody">
		<tr :key="index" v-for="(area,index) of Areas">
                  <td>{{area.nbArea}}</td>
                  <td>{{area.DesAreas}}</td>
                  <td>{{area.idZona}}</td>
                  <td>{{area.numPersonasPermitidas}}</td>
		  <td>
		    <button @click="Search(area.id)" class="btn btn-success btn-round"> <i class="nc-icon nc-simple-delete"></i>Editar</button>
		    <button @click="Delet(area.id)" class="btn btn-danger btn-round"> <i class="nc-icon nc-simple-remove"></i>Elimnar</button>
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
                        <input v-model="nbAreas" type="text" class="form-control">
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
		            <option value="SI">SI</option>
		            <option value="NO">NO</option>
		          </select>
                      </div>
                      </div>
                    <div class="col-md-2 pl-1">
                      <div class="form-group">
                        <label>Zonas</label>
                          <select v-model="IdZona" name="" id="" class="form-control">
		            <option :value="zona.id" :key="index" v-for="(zona,index) of Zonas">{{zona.nbZona}}</option>
		          </select>
                      </div>
                    </div>
              </div>
              <div class="row">
                    <div class="col-md-6 pr-1">
                      <div class="form-group">
                        <label>Descripción</label>
                        <textarea v-model="DesAreas"  cols="30" rows="10" class="form-control"></textarea>
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
          Areas:[],
          nbAreas:"",
          DesAreas:"",
          IdZona:"",
          NumPersonasMax:"",
          PatcArchivo:"",
          FgAdmiteNinios:"",
          EsNuevo:true,
          Errores:[],
          Form:""
        };
    },
    methods: {
        LimpiarCampos() {
            this.nbAreas = "";
            this.DesAreas = "";
            this.NumPersonasMax = "";
            this.IdZona="";
            this.PatcArchivo="";
            this.Form=1;
            this.Listar();
        },
        modal(){
              this.Form=2;
        },
      Listar(){
        axios.get('web/areas').then(Respuesta=>{this.Areas=Respuesta.data})
      },
      Listarzona(){
        axios.get('web/zonas').then(Respuesta=>{this.Zonas=Respuesta.data})
      },
      Save(){
        let json={
          nbArea:this.nbAreas,
          DesAreas:this.DesAreas,
          idZona:this.IdZona,
          fgAdmiteNinios:this.FgAdmiteNinios,
          numPersonasPermitidas:this.NumPersonasMax,
        };
       axios.post("web/areas/save",{Json:JSON.stringify(json)})
	      .then(Respuesta=>{
		   this.Listar();
                    this.LimpiarCampos();
                
		  }).catch(error=>{
		    if(error.response.status==500){
		      this.Errores=error.response.data.errores;
		    }
                  });     
      },
      Search(id){
          axios.get("web/areas/"+id).then(Respuesta=>{
		  this.EsNuevo=false;
		  this.nbAreas=Respuesta.data.nbArea;
                  this.DesAreas=Respuesta.data.DesAreas;
                  this.IdZona=Respuesta.data.idZona;
                  this.NumPersonasMax=Respuesta.data.numPersonasPermitidas;
                  this.FgAdmiteNinios=Respuesta.data.fgAdmiteNinios;
                  this.modal();        
		})
      },
        Update(){
	    let json={
		nbEstatus:this.nbEstatus,
		tpEstatus:this.tpEstatus
	    };
	    axios.post("web/estatus/update",{Json:JSON.stringify(json)})
	      .then(Respuesta=>{
		    this.EsNuevo=true;
		    this.LimpiarCampos();
		    this.Errores =[];
		    swal("Hecho!","Registro Modificado","success")
		  })
	  },
      Delet(id){
        
      }
    },
    created(){
      this.Form=1;
      this.Listar();
      this.Listarzona();
    }
};
</script>
