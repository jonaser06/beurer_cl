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
                            <h3>CARGA DE PRODUCTOS</h3>
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <form action="#" enctype="multipart/form-data">
                                            <div class="row container-load">
                                                <div class="col-xs-12 col-lg-10">
                                                    <input type="file" name="file" id="load-file" style="width:100%" accept=".xls,.xlsx,.xls" class="form-control">
                                                </div>
                                                <div class="col-xs-12 col-lg-2">
                                                    <button class="load-archive btn btn-danger"
                                                        
                                                    style="width:100%">
                                                        CARGAR ARCHIVO
                                                    </button>
                                                </div>
                                            </div>
                                    
                                        </form>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="box-body">
                            
                            <div class="nav-tabs-custom">
                                <table id="table_cupones" class="table table-bordered table-striped table-hover nowrap dataTable dtr-inline collapsed">
                                    <thead>
                                        <tr>
                                        <!-- <i style="color:#C51152;margin: 0 10px;font-size:22px" class="fa fa-envelope-square "></i> -->
                                        <!-- <i style="color:#C51152;margin: 0 10px;font-size:18px" class="fa fa-check"> -->
                                            <th>id</th>
                                            <th>nombre</th>
                                            <th>sku</th>
                                            <th style="display: flex;align-items:center">precio online</th>
                                            <th style="display: flex;align-items:center">precio normal</th>
                                            <th style="display: flex;align-items:center">stock</i></th>
                                            
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
       <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    
       <style>
           h3,.box-body {
               margin: 1rem 2rem
           }
           .container-load {
               display: flex;
               align-items: center;
           }
           .container-load > * {
               margin: 1rem 0;
           }
           @media only screen and (max-width: 600px) {
                .container-load {
                   flex-direction: column;
                }
            }
           #load-file {
               cursor: pointer;
               outline: none;
               font-size: 1.6rem;
           }

           #table_novedades tr {
               font-weight: bold;
           }
           .excelButton {  
               border:none;
            font-size: 1.5rem; 
            float: left;
            padding: .5rem 2rem;
            color:#222;
            border-radius: .8rem;       
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
            "ajax": "prod/load",
                "columns": [
                    { "data": "id" , 'render' : function (data ,type , row) {
                        return data
                    } },
                    { "data": "titulo" ,'render' : function (data , type , row ) {
                    
                        return data;
                    }},
                    { "data": "producto_sku" ,'render' : function (data , type , row ) {
                    
                        return data;
                    }},
                    { "data": "precio" , 'render' : function (data , type , row ) {
                        
                        return data;
                    } },
                    { "data": "precio_anterior" , 'render' : function (data , type , row ) {
                        
                        return data;
                    } },
                    {"data": "stock" , 'render' : function(data,type,row) {
                       
                        return data;
                    }},
                    
                   
                ],dom: 'Bfrtip',
                            buttons:{
                    buttons: [
                        { 
                            extend: 'excel', 
                            className: 'excelButton',
                            text: 'Exportar',
                            filename: 'productos-carga',
                            title: null
                        }
                    ]
                }
            });
            $('input[type="file"]').on('change', function(){
                let ext = $( this ).val().split('.').pop();
                if ($( this ).val() !== '') {
                if(ext == "xls" || ext == "xlsx" || ext == "csv"){
                }
                else
                {
                    $( this ).val('');
                    Swal.fire({
                        icon: 'error',
                        title: 'SELECCIONE UNA EXTENSIÓN PERMITIDA',
                        text: `EXTENCIÓN ${ext} INVÁLIDA`,
                        showCancelButton: false,
                        confirmButtonColor: '#C51152',
                        confirmButtonText: "CONTINUAR",
                        closeOnConfirm: false    
                    })
                }
                }
            });

            
            document.querySelector('.load-archive').addEventListener('click' , event => {
                event.preventDefault();
                const file = $('#load-file').val()

                if(file == '') {
                     Swal.fire({
                        icon: 'warning',
                        title: 'ERROR:',
                        text: `DEBE SELECCIONAR UN ARCHIVO DE EXCEL`,
                        showCancelButton: false,
                        confirmButtonColor: '#C51152',
                        confirmButtonText: "CONTINUAR",
                        closeOnConfirm: false    
                    })
                    return
                }
                const formData = new FormData();

                let files = $('#load-file')[0].files[0]
                formData.append('files',files )
                $.ajax({
                    url: `prod/import`,
                    type: 'POST',
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function (resp ) {
                        if(!resp.status){
                            Swal.fire({
                                icon: 'error',
                                title: 'ERROR:',
                                text: `${resp.message}`,
                                showCancelButton: false,
                                confirmButtonColor: '#C51152',
                                confirmButtonText: "CONTINUAR",
                                closeOnConfirm: false    
                            })
                            table.ajax.reload(null , false );
                            return
                        }
                        Swal.fire({
                                icon: 'success',
                                title: 'SE ACTUALIZARON LOS DATOS:',
                                text: `${resp.message}`,
                                showCancelButton: false,
                                confirmButtonColor: '#C51152',
                                confirmButtonText: "CONTINUAR",
                                closeOnConfirm: false    
                            })
                            table.ajax.reload(null , false );

                            return
                    }
                })
                return false ;
                
                })
            
            

        </script>
    </body>
</html>