<template>
  <div class="row">
      <table-basic v-if="Form == 1">
		<template slot="title">
		    Estatus
                </template>
                <template slot="button">
                  <button @click="modal()" class="btn btn-primary btn-round" > <i class="nc-icon nc-simple-add"></i>Nuevo</button>
                </template>		
                <template slot="thead">
		  <th>Nombre</th>
		  <th>Acciones</th>
		</template>
		<template slot="tbody">
		<tr :key="index" v-for="(estatu,index) of Estatus">
		  <td>{{estatu.nbEstatus}}</td>
		  <td>
		    <button @click="Search(estatu.id)" class="btn btn-success btn-round"> <i class="nc-icon nc-simple-delete"></i>Editar</button>
		    <button @click="Search(estatu.id)" class="btn btn-danger btn-round"> <i class="nc-icon nc-simple-remove"></i>Elimnar</button>
		  </td>
		</tr>
		</template>
      </table-basic>
      <form-basic v-if="Form == 2">
        <template slot="title">
           Estatus     
        </template>
        <template slot="button">
            <button class="btn btn-primary btn-round" @click="LimpiarCampos()"><i class="nc-icon nc-minimal-left"></i> Lista </button>
        </template>
        <template slot="body">
          <form>
              <div class="row">
                    <div class="col-md-6 pr-1">
                      <div class="form-group">
                        <label>Nombre</label>
                        <input v-model="nbEstatus" type="text" class="form-control">
                      </div>
                    </div>
                    <div class="col-md-6 pl-1">
                      <div class="form-group">
                        <label>Tipo Estatus</label>
                          <select v-model="tpEstatus" name="" id="" class="form-control">
		            <option value="default">Default</option>
		            <option value="Rule">Rule</option>
		          </select>
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
  export default{
    data(){
      return{
	Estatus:[],
	nbEstatus:"",
	tpEstatus:"",
        Form:"", 
	EsNuevo:true,
	Errores:[]
      };
    },
    methods: {
          modal(){
              this.Form=2;
          },
	  LimpiarCampos(){
	    this.nbEstatus="";
            this.tpEstatus="";
            this.Form=1;
	  },
	  Listar(){
	    axios.get("web/estatus").then(Respuesta=>{this.Estatus=Respuesta.data});
	  },
	  Save(){
	    let json={
		nbEstatus:this.nbEstatus,
		tpEstatus:this.tpEstatus 
	    };
	    axios.post("web/estatus/save",{Json:JSON.stringify(json)})
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
	    axios.get("web/estatus/"+id).then(Respuesta=>{
		  this.EsNuevo=false;
		  this.nbEstatus=Respuesta.data.nbEstatus;
		  this.tpEstatus=Respuesta.data.tpEstatus;
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
	    swal({
		title:"¿Estas seguro?", 
		text:"El elemento sera eliminado!",
		icon:"warning",
		buttons:true,
		dangerMode:true
		}).then(willDelete =>{
		    if(willDelete){
		      let json ={
			id:id
		      };
		      axios.post("web/estatus/delete",{Json:JSON.stringify(json)})
			.then(Respuesta=>{
			    swal("Hecho!","Eliminado","success");
			    this.Listar();
			  });
			}	else{
				  
			}
		  });
	  }
    },
    created(){
      this.Listar();
      this.Form=1;
    }

  }	
</script>
