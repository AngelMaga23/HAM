<template>
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <div class="row">
                    <div class="col-sm-8">
                      <h4 class="card-title">
                        <slot name="title"></slot>
                      </h4>
                    </div>
                    <div class="col-sm-4" style="text-align: right;width:220px">
                        <slot name="button"></slot>
                    </div>
                </div>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table">
                    <thead class=" text-primary">
                        <slot name="thead"></slot>
                    </thead>
                    <tbody>
                        <slot name="tbody"></slot>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
</template>
