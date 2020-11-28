<template>
  <form-basic>
    <template slot="titulo">
      Estatus 
    </template>
    <template slot="formulario">        
    <h4 class="mb"> Registro</h4>
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
		    <select v-model="tpEstatus" name="" id="" class="form-control">
		      <option value="default">Default</option>
		      <option value="Rule">Rule</option>
		    </select>
		  </div>
	      </div>
	  
	  </div>
	  <div>
	    <button  v-if="EsNuevo" class="btn btn-primary btn-lg" @click="Save()">Guardar</button>
	    <button v-else @click="Update()" class="btn btn-primary btn-lg">Modificar</button>  
	  </div>
	  <div class="col-md-12">
	      <table-basic>
		<template slot="title">
		    Guardados
		</template>
		<template slot="thead">
		  <th>Nombre</th>
		  <th>Acciones</th>
		</template>
		<template slot="tbody">
		<tr :key="index" v-for="(estatu,index) of Estatus">
		  <td>{{estatu.nbEstatus}}</td>
		  <td>
		    <button @click="Search(estatu.id)" class="btn btn-success">Editar</button>
		  </td>
		</tr>
		</template>
	      </table-basic>
	    </div>
        </div>
    </template>
  </form-basic>
</template>

<script>
  export default{
    data(){
      return{
	Estatus:[],
	nbEstatus:"",
	tpEstatus:"",

	EsNuevo:true,
	Errores:[]
      };
    },
    methods: {
	  LimpiarCampos(){
	      this.nbEstatus="";
	      this.tpEstatus="";
	  },
	  Listar(){
	    axios.get("api/estatus").then(Respuesta=>{this.Estatus=Respuesta.data});
	  },
	  Save(){
	    let json={
		nbEstatus:this.nbEstatus,
		tpEstatus:this.tpEstatus 
	    };
	    axios.post("api/estatus/save",{Json:JSON.stringify(json)})
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
	    axios.get("api/estatus/"+id).then(Respuesta=>{
		  this.EsNuevo=false;
		  this.nbEstatus=Respuesta.data.nbEstatus;
		  this.tpEstatus=Respuesta.data.tpEstatus;

		})
	  },
	  Update(){
	    let json={
		nbEstatus:this.nbEstatus,
		tpEstatus:this.tpEstatus
	    };
	    axios.post("api/estatus/update",{Json:JSON.stringify(json)})
	      .then(Respuesta=>{
		    this.EsNuevo=true;
		    this.LimpiarCampos();
		    this.Errores =[];

		    swal("Hecho!","Registro Modificado","success")
		  })
	  },
	  Delet(Id){
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
		      axios.post("api/estatus/delete",{Json:JSON.stringify(json)})
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
    }

  }	
</script>
