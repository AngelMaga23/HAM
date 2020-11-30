<template>
  <form-basic>
    <template slot="titulo">
     Notificaciones de Recordatorios 
    </template>
    <template slot="formulario">        
    <h4 class="mb"> Registro</h4>
        <div class="row">
	  <div class="col-md-6">
	     <div class="form-group row">
		<label for="inputEmail3" class="col-sm-2 col-form-label">Titulo</label>
		  <div class="col-sm-8">
		    <input v-model="titulo" type="text" class="form-control">
		  </div>
	      </div>
	      <div class="form-group row">
		<label for="inputEmail3" class="col-sm-2 col-form-label">Fecha del Evento</label>
		  <div class="col-sm-8">
		 <input v-model="fechaEvento" type="date" class="form-control">  
		  </div>
	      </div>	   
	      <div class="form-group row">
		<label for="inputEmail3" class="col-sm-2 col-form-label">Descripción</label>
		  <div class="col-sm-8">
		    <textarea v-model="descripcion" id="" class="form-control"  rows="3"></textarea>
		  </div>
	      </div>    
	      <div class="form-group row">
		    <div class="col-sm-8">
		      <button @click="SaveNotif()" >Guardar</button>	
		    </div>
	      </div>
	  </div>
	  <div>
	  <div class="col-md-6">
	       <table-basic>
		<template slot="title">
		    Usuarios
		</template>
		<template slot="thead">
		  <th>Nombre</th>
		  <th>Email</th>
		  <th>Seleccionar</th>
		</template>
		<template slot="tbody">
		<tr :key="index" v-for="(user,index) of Usuario" >
		<td>{{user.name}}</td>
		<td>{{user.email}}</td>
		<td>
		    <input  :value=user.id type="checkbox" class="form-check-input" v-model="ids">
		</td>
		</tr>
		</template>
	      </table-basic>
	  </div>
	  </div>	  
	  <div class="col-md-12">
	  {{ids}}
	  </div>
        </div>
    </template>
  </form-basic>

</template>
<script>
export default {
  data(){
    return{
      Usuario:[],
      ids:[],
	name:"",
	email:"",
      Notificacion:[],
	idtipoNotificacion:"",
	titulo:"",
	descripcion:"",
	fechaRegistro:"",
	fechaEvento:"",
	feVisto:"", 
	idUsuario:"", 
	fgReservacion:"",
	idReservacion:"",
	Nuevo:true,
      Errores:[]
    };
  },
  methods:{
	    ListarUser(){
	      axios.get("web/useractive").then(Respuesta=>{this.Usuario=Respuesta.data})
	    },
	    LimpiarCampos(){
	      this.titulo="",
	      this.descripcion="",
	      this.fechaEvento="",
	      this.ids=""
	    },
	    SaveNotif(){
	      axios.post("web/notifrecord/save",{
		titulo:this.titulo,
		descripcion:this.descripcion,
		fechaEvento:this.fechaEvento,
		id:this.ids
	      })
		 .then(Respuesta=>{
		    alert("guardato");
		    this.LimpiarCampos();
		  }).catch();
		}
	    },
	  created(){
	    this.ListarUser();
	  }
}
</script>
