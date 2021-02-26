<!DOCTYPE html>
<html>
    <head>
        <?= $this->load->view('backend/chunks/head', array(), TRUE) ?>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.6/css/responsive.dataTables.min.css">

    </head>
    <body class="hold-transition skin-blue sidebar-mini">
        <div class="wrapper">
            <?= $this->load->view('backend/chunks/header', array(), TRUE) ?>
            <?= $this->load->view('backend/chunks/sidebar', array(), TRUE) ?>

            <div class="content-wrapper">
              <?php 
                $uri = $this->uri->segment_array();
                $modulo = $this->sistema->getModulo($uri[2]);

                if(in_array( $modulo['idmodulo'] , $modulosjm)){
              ?>
                <section class="content-header">
                    <h1>
                        Reporte de Cupones
                       
                    </h1>
                </section>
                <?php }?>
                <!-- Main content -->
                <section class="content container-fluid">
                <?php if( in_array($modulo['idmodulo'],$modulosjm)){
                ?>
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3>MANTENEDOR DE CUPONES </h3>
                            <div class="col-xs-12 col-md-6 " style="padding: 0;margin:1rem 0 ;">
                            <a href="javascript: Exeperu.addCupon()" style="padding:7px 14px;border-radius: 1rem;" class="btn btn-sm btn-info btn-flat"><i class="glyphicon glyphicon-plus" style="margin-right:10px"></i>AGREGAR NUEVO CUPON DE DESCUENTO</a>
                            </div>
                        </div>

                        <div class="box-body">

                            <div class="nav-tabs-custom">
                                <table id="table_cupones" class="table table-bordered table-striped table-hover nowrap dataTable dtr-inline collapsed">
                                    <thead>
                                        <tr>
                                        <!-- <i style="color:#C51152;margin: 0 10px;font-size:22px" class="fa fa-envelope-square "></i> -->
                                        <!-- <i style="color:#C51152;margin: 0 10px;font-size:18px" class="fa fa-check"> -->
                                            <th>Fecha de creación</th>
                                            <th>Código cupon</th>
                                            <th>Tipo cupon</th>
                                            <th style="display: flex;align-items:center">descuento</th>
                                            <th>Detalle</th>
                                            <th style="display: flex;align-items:center">estado</th>
                                            <th style="display: flex;align-items:center">cantidad de usos</th>
                                            <th style="display: flex;align-items:center">Límite de usos</th>
                                            <th style="display: flex;align-items:center">Caducidad</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                <?php }else {?>
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title"><strong>NO TIENES ACCESO A ESTE MÓDULO</strong></h3>

                            <div class="box-tools pull-right">
                              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                              <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
                            </div>
                        </div>
                    </div>
                <?php }?>
                </section>

            </div>
      
            <!-- Main Footer -->
            <?= $this->load->view('backend/chunks/footer', array(), TRUE) ?>
        </div>

        <?= $this->load->view('backend/chunks/modalLoading', array(), TRUE) ?>

        <!-- REQUIRED JS SCRIPTS -->
        <?= $this->load->view('backend/chunks/scripts', array(), TRUE) ?>

       <script src="<?= getFilex('mgr/exeperu/js/cupones.js')?>"></script>
    
       <style>
           #table_novedades tr {
               font-weight: bold;
           }
       </style>
        <script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.flash.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js"></script>
        <script src="https://cdn.datatables.net/responsive/2.2.6/js/dataTables.responsive.min.js"></script>

        <script>
            let table = $('#table_cupones').DataTable({
            responsive: true,
            'paging'      : true,
            'lengthChange': false,
            'searching'   : true,
            'ordering'    : true,
            'info'        : true,
            'autoWidth'   : false,
            "scrollCollapse": true,
            "language"    :{"search":"Buscar", "zeroRecords":"Sin Resultados Coincidentes"},
            "ajax": "manager/cupones/getCuponAll",
                "columns": [
                    { "data": "fecha_creacion" , 'render' : function (data ,type , row) {
                        return data
                    } },
                    { "data": "cupon_codigo" , 'render' : function (data ,type , row) {
                        return data
                    } },
                    { "data": "tipo_cupon" ,'render' : function (data , type , row ) {
                    
                        return row.detail;
                    }},
                    { "data": "cupon_precio" , 'render' : function (data , type , row ) {
                        let salida = '';
                        const tipo_cupon = parseInt(row.tipo_cupon);
                        
                        
                            switch (tipo_cupon) {
                            case 1:
                                salida = `${data} %`;
                                break;
                            case 2:
                                salida = `${data}`;
                                break;
                            case 3:
                                salida = `${data}`;
                                break;
                        
                            default:
                                salida= `${data} %`;
                                break;
                        
                        
                        }
                        return salida;
                    } },
                    {"data": "descripcion" , 'render' : function(data,type,row) {
                        let salida = '';
                        const tipo_cupon = parseInt(row.tipo_cupon);
                        
                        
                            switch (tipo_cupon) {
                            case 1:
                                salida = `Porcentaje`;
                                break;
                            case 2:
                                salida = `Descuento`;
                                break;
                            case 3:
                                salida = `Descuento`;
                                break;
                        
                            default:
                                salida= `Porcentaje`;
                                break;
                        
                        
                        }
                        return salida;
                    }},
                    {"data": "cupon_estado" , 'render' : function(data,type,row) {
                        let salida = '';
                        const estado = parseInt(data);
                            switch (estado) {
                            case 0:
                                salida = `inactivo`;
                                break;
                        
                            default:
                                salida= `activo`;
                                break;
                        
                        
                        }
                        return salida;
                    }},
                    { "data": "usado" , 'render' : function (data ,type , row) {
                        return data
                    } },
                    { "data": "limite" , 'render' : function (data ,type , row) {
                        return data
                    } },
                    { "data": "fecha_caducidad" , 'render' : function (data ,type , row) {
                        return data
                    } },
                    { "data": "id_cupon", 'render': function(data, type, row){
                       let salida;
                        salida = "<a href=\"javascript:Exeperu.editCupon("+data+");\" class=\"btn btn-primary btn-sm btn-flat\"><i class=\"fa fa-pencil\"></i></a>";
                        
                        return  salida;
                    } },
                   
                ],dom: 'Bfrtip',
                buttons: [
                    'copy', 'excel', 'pdf', 'print'
                ], 
            });

        </script>
    </body>
</html>