<template>
 <div class="row">
      <table-basic v-if="Form == 1">
		<template slot="title">
		   Usuarios
                </template>
                <template slot="button">
                </template>		
                <template slot="thead">
                  <th>Nombre</th>
                  <th>Email</th>
		  <th>Acciones</th>
		</template>
		<template slot="tbody">
		<tr :key="index" v-for="(user,index) of Usuario">
                  <td>{{user.name}}</td>
                  <td>{{user.email}}</td>
		  <td>
		    <button @click="Search(user.id)" class="btn btn-success btn-round"> <i class="nc-icon nc-simple-delete"></i>Ver</button>
		    <button @click="Supender(user.id)" class="btn btn-danger btn-round"> <i class="nc-icon nc-simple-remove"></i>Suspender</button>
		  </td>
		</tr>
		</template>
      </table-basic>
      <form-basic v-if="Form == 2">
        <template slot="title">
          Usuario     
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
                        <input v-model="name" type="text" class="form-control">
                      </div>
                    </div>
                    <div class="col-md-6 pl-1">
                      <div class="form-group">
                        <label>Email</label>
                         <input v-model="email" type="text" class="form-control"> 
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
          Usuario:[],
          Form:""
        };
    },
    methods: {
        MostrarModal() {
            this.LimpiarCampos();

            $("#Modal").modal();
        },
        LimpiarCampos() {
            this.Nombre = "";
            this.IdEmpresaSucursal = "";
            this.IdDescartes = "";
        },
      Listar(){
       	      axios.get("web/useractive").then(Respuesta=>{this.Usuario=Respuesta.data})
      }

    },
  created(){
    this.Listar();
    this.Form=1;
  }
};
</script>
