<template>
<div class="card catalogo-seccion">
    <div class="card-header">
        <div class="row">
            <div class="col-md-10">
                <h3>Registro Empresas</h3>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Nombre</label>
                    <div class="col-sm-8">
                        <input v-model="CorreoContacto" type="text" class="form-control">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">RFC</label>
                    <div class="col-sm-8">
                        <input v-model="CorreoContacto" type="text" class="form-control">
                    </div>
                </div>

            </div>

            <div class="col-md-6">
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Hotel</label>
                    <div class="col-sm-8">
                        <select class="form-control" id="exampleFormControlSelect1">
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Persona</label>
                    <div class="col-sm-8">
                        <select class="form-control" id="exampleFormControlSelect1">
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                        </select>
                    </div>
                </div>

            </div>
               <div class="col-md-12">
                   Ubicación
               </div>
            <div class="col-md-4">
                    
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-4 col-form-label">Pais</label>
                    <div class="col-sm-8">
                        <select class="form-control" id="exampleFormControlSelect1">
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-4 col-form-label">Estado</label>
                    <div class="col-sm-8">
                        <select class="form-control" id="exampleFormControlSelect1">
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-4 col-form-label">Ciudad</label>
                    <div class="col-sm-8">
                        <select class="form-control" id="exampleFormControlSelect1">
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Dirección</label>
                    <div class="col-sm-8">
                           <input v-model="CorreoContacto" type="text" class="form-control">
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-4 col-form-label">Codigo Postal</label>
                    <div class="col-sm-8">
                        <select class="form-control" id="exampleFormControlSelect1">
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>

        <br>

        <br>

        <div class="row">
            <div class="col-md-10">
                <h4>Empresas</h4>
            </div>
            <div class="col-md-2">
            </div>
        </div>

        <br>

        <div class="row">
            <div class="col-md-12">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Codigo</th>
                            <th>Producto</th>
                            <th>Cantidad</th>
                            <th>Precio</th>
                            <th>Descuento %</th>
                            <th>Total</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr :key="index" v-for="(producto,index) of ProductosAgregados">
                            <td> {{ producto.Codigo }} </td>
                            <td> {{ producto.Nombre }} </td>
                            <td>
                                <div class="input-group mb-3">
                                    <input min="1" :max="producto.Existencia" v-model="producto.Cantidad" type="number" style="text-align:center" class="form-control col-10" />
                                </div>
                            </td>
                            <td> {{ producto.CostoPublic }} $ </td>
                            <td>{{ producto.Descuento*100 }} %</td>
                            <td>
                                {{ (producto.Cantidad * producto.CostoPublic) }} $
                            </td>
                            <td>
                                <button @click="QuitarProducto(producto,index)" class="btn btn-danger">Eliminar</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>
</template>

<script>
export default {
    data() {
        return {};
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
    },
};
</script>
