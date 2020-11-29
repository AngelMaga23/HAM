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
	  </div>
	  <div>
	  <div class="col-md-6">
	    <div class="form-group row">
		<label for="inputEmail3" class="col-sm-2 col-form-label">Descripción</label>
		  <div class="col-sm-8">
		    <textarea v-model="descripcion" id="" class="form-control"  rows="3"></textarea>
		  </div>
	      </div>
	      <div class="form-group row">
		  <button @click="SaveNotif()" >Guardar</button>	
	      </div>
	  </div>
	  </div>	  
	  <div class="col-md-12">
	      <table-basic>
		<template slot="title">
		    Guardados
		</template>
		<template slot="thead">
		  <th>Titulo</th>
		  <th>Acciones</th>
		</template>
		<template slot="tbody">
	  </template>
	      </table-basic>
	    </div>
        </div>
    </template>
  </form-basic>

</template>
<script>
export default {
  data(){
    return{
      TipoNotificacion:[],
	nbTipoNotificacion:"",
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
	    Listartipn(){
	      axios.get("web/notip").then(Respuesta=>{this.TipoNotificacion=Respuesta.data})
	    },
	    SaveNotif(){
	      let json={
		titulo:this.titulo,
		descripcion:this.descripcion,
		fechaEvento:this.fechaEvento
	      };
	      axios.post("web/notifservi/save",{Json:JSON.stringify(json)})
		.then(Respuesta=>{
		    alert("guardato");
		    }).catch();
	    }
  },
	  created(){
	    this.Listartipn();
	  }
}
</script>
