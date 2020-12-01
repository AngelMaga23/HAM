<template>
  <div class="row">
      <table-basic v-if="Form == 1">
		<template slot="title">
		   Notificaciones
                </template>
                <template slot="button">
                  <button @click="modal()" class="btn btn-primary btn-round" > <i class="nc-icon nc-simple-add"></i>Recordatorio</button>
                  <button @click="modall()" class="btn btn-primary btn-round" > <i class="nc-icon nc-simple-add"></i>Servicios</button>
                </template>		
                <template slot="thead">
                  <th>Nombre</th>
                  <th>Subtitulo</th>
		  <th>Acciones</th>
		</template>
		<template slot="tbody">
		<tr :key="index" v-for="(not,index) of Notificacion">
                  <td>{{not.titulo}}</td>
                  <td>{{not.subtitulo}}</td>
		  <td>
		    <button @click="Delet(not.id)" class="btn btn-danger btn-round"> <i class="nc-icon nc-simple-remove"></i>Elimnar</button>
		    <button @click="Search(not.id)" class="btn btn-success btn-round"> <i class="nc-icon nc-simple-delete"></i>Editar</button>
		    <button @click="Search(estatu.id)" class="btn btn-primary btn-round"> <i class="nc-icon nc-refresh-69"></i>Reenviar</button>
		  </td>
		</tr>
		</template>
      </table-basic>
      <form-basic v-if="Form == 3">
        <template slot="title">
           Servicios
        </template>
        <template slot="button">
            <button class="btn btn-primary btn-round" @click="LimpiarCampos()"><i class="nc-icon nc-minimal-left"></i> Lista </button>
        </template>
        <template slot="body">
          <form>
              <div class="row">
                    <div class="col-md-6 pr-1">
                      <div class="form-group">
                          <label>titulo</label>
                        <input v-model="titulo" type="text" class="form-control">
                      </div>
                    </div>
                    <div class="col-md-6 pl-1">
                      <div class="form-group">
                         <label>Subtitulo</label>
                          <input v-model="subtitulo" type="text" class="form-control">
                   </div>
                    </div>
              </div>
             
              <div class="row">
                    <div class="col-md-6 pr-1">
                      <div class="form-group">
                        <label>Descripción</label>
                        <textarea v-model="descripcion"  rows="6" class="form-control"></textarea>
                      </div>
                    </div>
                    <div class="col-md-6 pl-1">
                      <div class="form-group">
                         <label>Fecha de Evento</label>
                          <input v-model="fechaEvento" type="date" class="form-control">
                   </div>
                    </div>
              </div>
                          <div class="row">
                <div class="update ml-auto mr-auto">
                      <button  v-if="EsNuevo" class="btn btn-info btn-round" @click="SaveNotifServ()">Guardar</button>
	              <button v-else @click="Update()" class="btn btn-info btn-round">Modificar</button>
                </div>
              </div>
          </form>
        </template>
      </form-basic>
    <form-basic v-if="Form == 2">
        <template slot="title">
          Recordatorio    
        </template>
        <template slot="button">
            <button class="btn btn-primary btn-round" @click="LimpiarCampos()"><i class="nc-icon nc-minimal-left"></i> Lista </button>
        </template>
        <template slot="body">
 <div class="row">
	  <div class="col-md-6">
	     <div class="form-group row">
		<label for="inputEmail3" class="col-sm-2 col-form-label">Titulo</label>
		  <div class="col-sm-8">
		    <input v-model="titulo" type="text" class="form-control">
		  </div>
             </div>
             <div class="form-group row">
		<label for="inputEmail3" class="col-sm-2 col-form-label">Subtitulo</label>
                <div class="col-sm-8">
                  <input v-model="subtitulo" type="text" class="form-control">
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
                <div class="update ml-auto mr-auto  col-sm-8">
                      <button  v-if="EsNuevo" class="btn btn-info btn-round" @click="SaveNotifRec()">Guardar</button>
	              <button v-else @click="Update()" class="btn btn-info btn-round">Modificar</button>
                </div>
	      </div>
	  </div>
	  <div>
            <div class="col-md-12">
              <div class="table-responsive">
                <table class="table">
                <thead class="text-primary">
                  <th>Nombre</th>
                  <th>Email</th>
                  <th>Seleccionar</th>
                </thead>
                <tbody>
                  <tr :key="index" v-for="(user,index) of Usuario" >
                    <td>{{user.name}}</td>
                    <td>{{user.email}}</td>
                  <td class="text-right">
		    <input  :value=user.id type="checkbox" class="form-control" v-model="ids">
                  </td>
                  </tr>
                </tbody>
              </table>
              </div>
              
            </div>
	  </div>
        </div>
        </template>
       </form-basic>
  </div>
  </template>
<script>
export default {
  data(){
    return{
      Usuario:[],
      ids:[],
	name:"",
	email:"",
      TipoNotificacion:[],
	nbTipoNotificacion:"",
      Notificacion:[],
	idtipoNotificacion:"",
        titulo:"",
        subtitulo:"",
	descripcion:"",
	fechaRegistro:"",
	fechaEvento:"",
	feVisto:"",
	idUsuario:"", 
	fgReservacion:"",
	idReservacion:"",
	EsNuevo:true,
      Errores:[],
      Form:""
    };
  },
  methods:{
            modal(){
              this.Form=2;
            },
            modall(){
              this.Form=3;
            },
    Listar(){
      axios.get("web/notifservi").then(Respuesta=>{this.Notificacion=Respuesta.data})                
            },
            ListarUser(){
	      axios.get("web/useractive").then(Respuesta=>{this.Usuario=Respuesta.data})
	    },
	    LimpiarCampos(){
	        this.titulo="",
	        this.descripcion="",
	        this.fechaEvento="",
                this.ids="",
                this.Form=1
	    },
	    Listartipn(){
	      axios.get("api/notip").then(Respuesta=>{this.TipoNotificacion=Respuesta.data})
            },
    Search(id){
      axios.get("web/notifservi/"+id).then(Respuesta=>{
                this.EsNuevo=false;
                this.titulo=Respuesta.data.titulo;
		this.descripcion=Respuesta.data.descripcion;
                this.fechaEvento=Respuesta.data.fechaEvento;
                this.subtitulo=Respuesta.data.subtitulo;
        if(Respuesta.data.idtipoNotificacion==2){
                        this.Form=2;
        }
        if(Respuesta.data.idtipoNotificacion==3){
          this.Form=3;
        }
      })
    },
    retur(id){
        axios.get("web/notifcac/"+id).then(Respuesta=>{
        })
    },
          SaveNotifServ(){
	      axios.post("web/notifrecord/save",{
		titulo:this.titulo,
		descripcion:this.descripcion,
                fechaEvento:this.fechaEvento,
                subtitulo:this.subtitulo,
		id:this.ids
	      })
		 .then(Respuesta=>{
		    alert("guardato");
		    this.LimpiarCampos();
		  }).catch();
	    },
	    SaveNotifRec(){
	      let json={
		titulo:this.titulo,
		descripcion:this.descripcion,
                fechaEvento:this.fechaEvento,
                subtitulo:this.subtitulo
	      };
	      axios.post("api/notifservi/save",{Json:JSON.stringify(json)})
		.then(Respuesta=>{
                  alert("guardato");
                  this.LimpiarCampos();
		    }).catch();
	    }
  },
  created(){
    this.Listar();
    this.ListarUser();
    this.Form=1;
	  }
}
</script>
