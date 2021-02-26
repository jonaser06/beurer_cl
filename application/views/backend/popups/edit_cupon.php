<div class="modal-dialog modal-lg" id="modalCreateEdit" role="document">
	<form id="formEditarCupon" action="manager/cupones/save" method="POST">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4>
					<strong>CUPÓN DETALLE </strong>
				</h4>

			</div>
			<style>
				.form-group.required .control-label:after {
					color: #d00;
					content: "*";
					position: absolute;
					margin-left: 8px;
					top:2px;
				}
			</style>
			<div class="modal-body">
				<!-- Nav tabs -->
				<div class="container-fluid">
					<div class="row">
						<div class="container-fluid">
							<div class="row">
                                <div class="col-xs-6">
									<div class="form-group">
										<label class="control-label">Código de Cupón</label>
										<input <?php echo isset($cupon['id_cupon'])? 'readonly':'' ?> autocomplete="off" placeholder="CÓDIGO DE CUPON" type="text" class="form-control" id="codigo" name="cupon[cupon_codigo]"  value="<?= isset($cupon['cupon_codigo']) ? $cupon['cupon_codigo'] : ''; ?>" >
									</div>
								</div>
                                <div class="col-xs-3">
                                    <div class="form-group required">
                                        <label for="cupon[cupon_estado]" class="control-label">Estado</label>
                                        <select name="cupon[cupon_estado]" id="estado" class="form-control">
                                            <option value="1" <?= ($cupon['cupon_estado'] == 1 ? 'selected' : '') ?>>Activo</option>
                                            <option value="0" <?= ($cupon['cupon_estado'] == 0 ? 'selected' : '') ?>>Inactivo</option>
                                        </select>
                                    </div>
                                </div>
								<div class="col-xs-12 col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Límite de uso</label>
                                        <input  type="number" class="form-control" min="0"id="limite" name="cupon[limite]"  value="<?= isset($cupon['limite']) ? $cupon['limite'] : '0'; ?>" >
                                    </div>
								</div>
								<div class="col-xs-12 col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Veces que fue usado</label>
                                        <input disabled type="number" class="form-control" min="0"id="usado" name="cupon[usado]"  value="<?= isset($cupon['usado']) ? $cupon['usado'] : '0'; ?>" >
                                    </div>
								</div>
                                <div class="col-xs-12 col-md-6">
                                    <div class="form-group required">
                                        <label for="cupon[tipo]" class="control-label">Tipo de descuento</label>
                                        <select 
										<?php echo isset($prod_cupon)? 'readonly':'' ?>
										 name="cupon[tipo_cupon]" id="tipo_cupon" class="form-control">
                                            <option value="1" <?= ($cupon['tipo_cupon'] == 1 ? 'selected' : '') ?>>% de descuento sobre el subtotal del Carrito</option>
                                            <option value="2" <?= ($cupon['tipo_cupon'] == 2 ? 'selected' : '') ?>>Descuento fijo en el carrito</option>
                                            <option value="3" <?= ($cupon['tipo_cupon'] == 3 ? 'selected' : '') ?>>Descuento fijo en el producto</option>
                                            <!-- <option value="4" <?= ($cupon['tipo_cupon'] == 4 ? 'selected' : '') ?>> % de descuento sobre el Producto </option> -->
                                        </select>
                                    </div>
                                </div>
								<!-- message por el tipo select -->
							
									
                                <div class="col-xs-12 ">
                                    <div class="form-group">
                                       <span style ="color:#c51152" class="type_cupon">
									   		<?php 
												switch ($cupon['tipo_cupon']) {
												case '1':
													echo 'SE APLICARA UN % DE DESCUENTO SOBRE EL SUBTOTAL ';
													break;
												case '2':
													echo 'SE APLICARA UN IMPORTE DE DESCUENTO SOBRE EL SUBTOTAL ';
													break;
												case '3':
													echo'SE APLICARA UN IMPORTE DE DESCUENTO SOBRE EL PRODUCTO';
													break;
												case '4':
													echo 'E APLICARA UN % DE DESCUENTO SOBRE EL PRODUCTO';
													break;
											
												default:
												echo '';
													break;
												}
										    ?>
									   </span>
                                    </div>
                                </div>
							
								<!-- fin de message type select -->
								
                                <div class="col-xs-12 col-md-6 product_select " 
									style="display:<?php echo ($cupon['tipo_cupon'] == 3 ||  $cupon['tipo_cupon'] == 4) ?'block':'none' ?>"
								>
								
                                    <div class="form-group">
    									<div class="text-right txt-mob derecho" style="margin-right:-3%;">
											<input  
											<?php echo isset($prod_cupon)? 'readonly':'' ?>
											type="text" class="form-control search_prod" id="codigo" name="cupon[cupon_product]"  
											value="<?php echo isset($prod_cupon)?$prod_cupon['producto']['titulo']:''?>" 
											autocomplete="off"
											placeholder="Ingrese el producto">
											<i id="button-menu" class="icon-hamb-open"></i>
											<div class="result_buscador">
												<ul id="show_result">
													
													
												</ul>
											</div>
										</div>
                                    </div>
									
                                </div>
								
								<div class="col-xs-12">
								<div class="form-group">
									<label>Fecha de caducidad </label>

									<div class="input-group date" id="cupon_caducidad">
										<input type="text" class="form-control" name="cupon[fecha_caducidad]" value="<?= isset($cupon['fecha_caducidad']) ? $cupon['fecha_caducidad'] : ''; ?>">
										<span class="input-group-addon">
											<span class="glyphicon glyphicon-calendar"></span>
										</span>
									</div>
								</div>
								<script>
									$(document).ready(function () {
										$("#cupon_caducidad").datetimepicker({
											allowInputToggle: true,
											format: "YYYY-MM-DD"
										});
									});
								</script>
								</div>
                                <div class="col-xs-12">
                                    <div class="form-group">
                                        <label class="control-label">Importe de descuento</label>
                                        <input  type="number" class="form-control" min="0"id="cupon_valor" name="cupon[cupon_precio]"  value="<?= isset($cupon['cupon_precio']) ? $cupon['cupon_precio'] : '0'; ?>" >
                                    </div>
								</div>
                               
							</div>

							<div class="row">
								<div class="col-xs-10">
									<div class="form-group">
								
									<span class="help-block" id="mensajeerror"></span>
									</div>
								</div>
								
							</div>
							<div class="row">
							
							</div>
							
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="reset" class="btn btn-default btn-flat" data-dismiss="modal">Cancelar</button>
				<button  type="submit" class="btn btn-primary btn-flat">Guardar</button>				
			</div>

			<input type="hidden" name="cupon[id_cupon]" value="<?php echo isset($cupon['id_cupon']) ? $cupon['id_cupon'] : '';?>">
		</div>

		<script>
		function CUPON() {
				let BASE_URL = (window.location.hostname == 'localhost') ? 'http://localhost/beurer_cl/' : 'https://cl.blogingenieria.site/';
				let $container_products = document.querySelector('.product_select');
				let $cupon = document.querySelector('#cupon_valor');
				$('#tipo_cupon').change( function ( e ) {
					let message = '';
					let value = $(this).val();
					switch (value) {
						case '1':
							$container_products.style.display = 'none'
							// $cupon.disabled = false
							message = 'Se aplicara un % de descuento sobre el subtotal del carrito';
							break;
						case '2':
							// $cupon.disabled = false
							$container_products.style.display = 'none'
							message = 'Se aplicara un importe de descuento fijo sobre el subtotal del carrito';
							break;
						case '3':
							$container_products.style.display = 'block'
							// $cupon.disabled = true
							message = 'Se aplicara un importe de descuento sobre el producto.';
							break;
						case '4':
							$container_products.style.display = 'block'
							// $cupon.disabled = true
							message = 'Se aplicara un % de descuento sobre el producto.';
							break;
					
						default:
						message = '';
							break;
					}
					document.querySelector('.type_cupon').textContent = message
				})				  
				$('.search_prod').keyup(function(event) {
		
					$('show_result').html('<img src="https://media2.giphy.com/media/3oEjI6SIIHBdRxXI40/giphy.gif" width="30">')
					let search = $(this).val();
					search = search.trim();
					search = encodeURI(search)
					if (search !== '') {
						$.ajax({
								url: `${BASE_URL}cupones/search/${search}`,
							})
							.done(function(data) {
								$('#show_result').html(data)
							})
							.always(function() {
								console.log("complete");
							});
					}
				});
				document.addEventListener('click', event => {

					if(event.target.matches('.item_prod__container')){
						const id = event.target.children[0].dataset.id
						const title = event.target.textContent;
						$('.search_prod').val(title);
						$('.search_prod').attr('data-id', id )
						$('#show_result').html('')
					}
				})
		}
		CUPON();
		
		
 
		$(document).ready(function () {
			$("#formEditarCupon").submit(function(e){
				e.preventDefault();
				if($('#codigo').val().trim() == '') {
					$('#mensajeerror').text('Debe introducir un código para el cupón.')
					return ;
				}

				$.ajax({
					url:  $(this).attr('action'),
					type: $(this).attr('method'),
					data: $(this).serialize(),
					success:function(response){
					const res = JSON.parse(response);   
						if( res.tipo == 1 ) {
							toastr.success(res.mensaje, { timeOut:2000 } );
                            table.ajax.reload(null , false );
                            
							$('#modalCreateEdit').modal('toggle');
						}else{
							toastr.error(res.mensaje,{timeOut:2000});
							const errores =JSON.parse(res.errores); 

							$.each( errores, function( key, value ) {
								$("#"+value+"").parent().addClass("has-error");
							});
							const respons = JSON.parse( res.jm ); 
							$.each( respons, function( key, value ) {
								$("#"+value+"").parent().removeClass();
							});
						}                    
					}
				});
            });
         
			
		});
	</script>
	</form>

	
	<style>

.product_select {
	margin-bottom :1rem;
}
#show_result {
	padding: 0;
	margin:5px 0;
	list-style: none;
}
.item_prod {
	
    width: 100%;
	padding: 0;
    float: left;
    border-bottom: solid 1px #edf0f3;
}

.item_prod__container{
	cursor: pointer;
    display: flex;
	align-items: center;
    -o-transition: all linear 0.15s;
    transition: all linear 0.15s;
    -webkit-transition: all linear 0.15s;
    -moz-transition: all linear 0.15s;
    position: relative;
    padding: 1px;
}

.item_prod__container img {
	width: 50px;
	pointer-events: none;
    width: auto;
    float: left;
    max-height: 40px;
}

.item_prod__container p {
	pointer-events: none;
	font-size: 12px;
	color: #f2f3f3;
    width: 80%;
    text-align: left;
    padding-left: 13px;
    color: #333333;
    margin: 0;
}

.item_prod__container:hover {
    background-color: #f6f8f9;
}

.item_prod__container:hover p {
    color: #c51152;
}

	</style>
</div>