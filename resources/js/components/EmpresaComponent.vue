<template>
<form-basic>
    <template slot="titulo">
        Empresa
    </template>
    <template slot="formulario">
        <h4 class="mb"> Registro</h4>

        <form class="form-horizontal style-form" method="get">
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
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Tipo Hotel</label>
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
            </div>

            <h4 class="mb"> Ubicacion</h4>
            <div class="row">
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
            <h4 class="mb"> Direccion fiscal</h4>
            <div class="row">
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
        </form>
    </template>
</form-basic>
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
