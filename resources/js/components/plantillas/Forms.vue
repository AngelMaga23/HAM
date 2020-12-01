<template>
    <div class="col-md-12">
        <div class="card card-user">
          <div class="card-header">
               <div class="row">
                    <div class="col-sm-8">
                        <h5 class="card-title"><slot name="title"></slot> </h5>
                    </div>
                    <div class="col-sm-4" style="text-align: right;width:220px">
                        <slot name="button"></slot>
                    </div>
                </div>

          </div>
          <div class="card-body">
            <slot name="body"></slot>
          </div>
        </div>
    </div>
</template>
