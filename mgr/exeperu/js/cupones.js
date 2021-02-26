Helpers.prototype.init = function(datos) {
    var self = this;
    this.dataApp = datos;


};




Helpers.prototype.editCupon = function(id_cupon) {
    this.sendAjax('manager/cupones/edit', { "id_cupon": id_cupon }, 'loadResponse');
};

Helpers.prototype.addCupon = function() {
    this.sendAjax('manager/cupones/edit', { "id_cupon": 0 }, 'loadResponse');
};

Helpers.prototype.reloadTableEstados = function(response) {
    $('#modalEdit').modal('toggle');
    return this.tables['table_pedido_estado'].ajax.reload();
};

Helpers.prototype.refrescarc = function(response) {
    return this.tables['table_pedido_estado'].ajax.reload();
};

Helpers.prototype.delEstado = function(idcategoria) {
    if (confirm('Desea eliminar')) {
        this.sendAjax('manager/categorias/delete', { "id": idcategoria }, 'refrescarc');
    }
};