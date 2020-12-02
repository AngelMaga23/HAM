<template>
  <div class="row">
    <div class="col-md-6">
        <div class="card card-user">
          <div class="card-header">
               <div class="row">
                    <div class="col-sm-8">
                        <h5 class="card-title">Entrada </h5>
                    </div>
                    <div class="col-sm-4" style="text-align: right;width:220px">
                        <button  class="btn btn-primary btn-lg btn-round" > <i class="nc-icon nc-cloud-download-93"></i></button>
                    </div>
                </div>
          </div>
          <div class="card-body" align="center">
            <qrcode-vue :value="e" :size="300" RenderAs="svg" id="ids"></qrcode-vue>
          </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card card-user">
          <div class="card-header">
               <div class="row">
                    <div class="col-sm-8" >
                        <h5 class="card-title">Salida</h5>
                    </div>
                    <div class="col-sm-4" style="text-align: right;width:220px">
                         <button  class="btn btn-primary btn-lg btn-round" > <i class="nc-icon nc-cloud-download-93"></i></button>
                    </div>
                </div>
          </div>
          <div class="card-body" align="center">
            <qrcode-vue :value="s" :size="300" RenderAs="svg" id="ids"></qrcode-vue>
          </div>
        </div>
    </div>
  </div>
</template>

  <script>
  import QrcodeVue from 'qrcode.vue'
  import pdf from 'vue-pdf'
export default {
  data(){
    return{
      e:"ENTRADA",
      s:"SALIDA"
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
