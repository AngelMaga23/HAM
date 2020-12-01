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
                    <qrcode-vue :value="link" :size="300" RenderAs="svg" id="ids"></qrcode-vue>
                    <br>
                    <button @click="Descargar()">Descargar</button>
                  </div>
                              
	      </div>
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
		</template>
	      </table-basic>
	    </div>
        </div>
    </template>
  </form-basic>

</template>

  <script>
import QrcodeVue from 'qrcode.vue'
export default {
  data(){
    return{
      link:"https://www.youtube.com/watch?v=lReC6hK2v0U",
      ids:""
    }
  },
  methods:{
    Descargar(){

      alert(this.ids);    
    }
  },
  components: {
      QrcodeVue,
    }, 
}
</script>
