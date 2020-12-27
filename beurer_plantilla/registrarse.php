<?php
include 'src\includes\header.php'
?>  

<main class="main-detail-products" style="overflow: hidden;">
	<!--Inicio de cuerpo-->
	
        <section class="sct-detail-products">
            <div class="container cont-detail-products">
                 <div class="row">

				</div>

            </div>
        </section>
        
        <div id="checkout_crumb">
          
          <div class="crumb" style="max-width: 1100px;
          margin: auto;
          display: flex;
          flex-wrap: nowrap;
          justify-content: space-between;">
              <span class="step_on1">
              <img src="assets/images/steps/paso1.png" ></span>
              
              
              <span class="step_off1"><img src="assets/images/steps/paso2.png" ></span>
      
              
          <span class="step_off1"><img src="assets/images/steps/paso3.png" ></span>
          
          
              <span class="step_off1"><img src="assets/images/steps/paso4.png"></span>
          </div>
      </div>	
      <br>
      
      
              
              <div id="checkout_crumb">
                <hr style="margin-bottom:-26px;">
          <div class="crumb" style="max-width: 1100px;
          margin: auto;
          display: flex;
          flex-wrap: nowrap;
          justify-content: space-between;">
              <span class="step_on noactive">
               Carrito de compras</span>
              
              <span class="step_arrow"></span>
              <span class="step_off active">Datos y Facturación</span>
      
              <span class="step_arrow"></span>
          <span class="step_off noactive">Envío y Pago</span>
          
          <span class="step_arrow"></span>
              <span class="step_off noactive">Resumen de Pedido</span>
          </div>
      </div>	
			
	<br>	
		

<div class="font-nexaheavy" style="height:100%;font-size:2.5rem;background-image:url('assets/images/fondo1.png');background-color:white;color:#c51152;border-radius:25px; width:85%;text-align:left;margin:auto;padding:2.5%;" >Registrarse para completar la compra </div>   

    <br>

	<div class="formulario" style="text-align:center;padding-top:10px;max-width: 920px; border-radius: 8%; margin: auto;" >
	
	<br>
    
<br>
    
<div class="row cont_datos" id="d_formularios1" align="center" style="display:inline-block;width:46em;">
    <div class="tabs col-xs-12" style="display:block !important;" id="tab-registro">
        <div class="tab-button-outer">
            <ul id="tab-button2">
                <li id="icon-description2" class="is-active"><a >DATOS DEL COMPRADOR</a></li>     
            </ul>
        </div>
        <div class="content">
            <div id="description"  style="display:block;">
                <div id="emisor">
                    <br>
                    <div class="divTable" style=" width:100%;display:inline-block;" >
                        <div class="divTableBody" style="display:block;">
                            <div class="divTableRow" >
                                <div class="divTableCell"><div class="etiquetaFormulario">Tipo Documento Identidad: : <div class="d_ob">*</div></div>
                    
                                    <select id="s_tipodoc" onchange="selectTipoDoc();">
                                    <option id="di_pn1" value="1" selected >DNI</option>
                                    <option id="di_pn2" value="2">Pasaporte</option>
                                    <option id="di_pn3" value="3"> CE</option>
                                    </select>		
                    
                                </div>
                                
                                <div class="divTableCell">
                                    <div class="etiquetaFormulario">Número Documento Identidad: <div class="d_ob">*</div></div>
                                    <input type="text" size="20" maxlength="20" name="campo1" id="campo1" value="" required >
                    
                                </div>
                            </div>	

                            <div class="divTableRow" id="pn_datos1">
                                <div class="divTableCell">
                                    <div class="etiquetaFormulario">Nombres: <div class="d_ob">*</div></div>
                                    <input type="text" size="20" maxlength="30" name="campo1" id="c_nombres1" onkeypress="return soloLetras(event)" value="" >		
                    
                                </div>

                                <div class="divTableCell">
                                    <div class="etiquetaFormulario">Apellidos: <div class="d_ob">*</div></div>
                                    <input type="text" size="20" maxlength="20" name="campo1" id="c_apep1" onkeypress="return soloLetras(event)" value="" >		
                    
                                </div>
                            </div>

                            
                            <div class="divTableRow">
                                <div class="divTableCell"> <div class="etiquetaFormulario">Correo electrónico: <div class="d_ob">*</div></div> 
                                    <input type="email" id="c_correo1" size="20" maxlength="30" name="campo1"  id="correo"  value="" required >
                                </div>
                    
                                <div class="divTableCell"><div class="etiquetaFormulario">Departamento: <div class="d_ob">*</div></div>
                                    <select  id="s_depa" onchange="selectDep();">
                                        <option value="1"> Amazonas</option>
                                        <option value="2">Ancash</option>
                                        <option value="3">Apurímac</option>
                                        <option value="4">Arequipa</option>
                                        <option value="5">Ayacucho</option>
                                        <option value="6">Cajamarca</option>
                                        <option value="7">Cusco</option>
                                        <option value="8">Huancavelica</option>
                                        <option value="9">Huánuco</option>
                                        <option value="10">Ica</option>
                                        <option value="11">Junín</option>
                                        <option value="12">La Libertad</option>
                                        <option value="13">Lambayeque</option>
                                        <option value="14" selected >Lima</option>
                                        <option value="15">Loreto</option>
                                        <option value="16">Madre de Dios</option>
                                        <option value="17">Moquegua</option>
                                        <option value="18">Pasco</option>
                                        <option value="19">Piura</option>
                                        <option value="20">Puno</option>
                                        <option value="21">San Martín</option>
                                        <option value="22">Tacna</option>
                                        <option value="23">Tumbes</option>
                                        <option value="24">Ucayali</option>
                                    </select>    
                                </div>
                             </div>
            
                            <div class="divTableRow">
                                <div class="divTableCell"><div class="etiquetaFormulario">Provincia: <div class="d_ob">*</div></div>
                                    <select id="s_prov" onchange="selectProv();">
                                        <option>-</option>  
                
                                        <option class="d_amaz" >Chachapoyas</option>
                                        <option class="d_amaz">Bagua</option>
                                        <option class="d_amaz">Bongara</option>
                                        <option class="d_amaz">Condorcanqui</option>
                                        <option class="d_amaz">Luya</option>
                                        <option class="d_amaz">Rodríguez de Mendoza</option>
                                        <option class="d_amaz">Utcubamba</option>
                                        
                                        <option class="d_anca">Huaraz</option>
                                        <option class="d_anca">Aija</option>
                                        <option class="d_anca">Antonio Raimondi</option>
                                        <option class="d_anca">Asunción</option>
                                        <option class="d_anca">Bolognesi</option>
                                        <option class="d_anca">Carhuaz</option>
                                        <option class="d_anca">Carlos Fermín Fitzcarrald</option>
                                        <option class="d_anca">Casma</option>
                                        <option class="d_anca">Corongo</option>
                                        <option class="d_anca">Huari</option>
                                        <option class="d_anca">Huarmey</option>
                                        <option class="d_anca">Huaylas</option>
                                        <option class="d_anca">Mariscal Luzuriaga</option>
                                        <option class="d_anca">Ocros</option>
                                        <option class="d_anca">Pallasca</option>
                                        <option class="d_anca">Pomabamba</option>
                                        <option class="d_anca">Recuay</option>
                                        <option class="d_anca">Santa</option>
                                        <option class="d_anca">Sihuas</option>
                                        <option class="d_anca">Yungay</option>

                                        <option class="d_apur">Abancay</option>
                                        <option class="d_apur">Andahuaylas</option>
                                        <option class="d_apur">Antabamba</option>
                                        <option class="d_apur">Aymaraes</option>
                                        <option class="d_apur">Cotabambas</option>
                                        <option class="d_apur">Chincheros</option>
                                        <option class="d_apur">Grau</option>

                                        <option class="d_areq">Arequipa</option>
                                        <option class="d_areq">Camaná</option>
                                        <option class="d_areq">Caravelí</option>
                                        <option class="d_areq">Castilla</option>
                                        <option class="d_areq">Caylloma</option>
                                        <option class="d_areq">Condesuyos</option>
                                        <option class="d_areq">Islay</option>
                                        <option class="d_areq">La Unión</option>

                                        <option class="d_ayac">Huamanga</option>
                                        <option class="d_ayac">Cangallo</option>
                                        <option class="d_ayac">Huanca Sancos</option>
                                        <option class="d_ayac">Huanta</option>
                                        <option class="d_ayac">La Mar</option>
                                        <option class="d_ayac">Lucanas</option>
                                        <option class="d_ayac">Parinacochas</option>
                                        <option class="d_ayac">Páucar del Sara Sara</option>
                                        <option class="d_ayac">Sucre</option>
                                        <option class="d_ayac">Víctor Fajardo</option>
                                        <option class="d_ayac">Vilcahuamán</option>
                                        
                                        <option class="d_caja">Cajamarca</option>
                                        <option class="d_caja">Cajabamba</option>
                                        <option class="d_caja">Celendín</option>
                                        <option class="d_caja">Chota</option>
                                        <option class="d_caja">Contumaza</option>
                                        <option class="d_caja">Cutervo</option>
                                        <option class="d_caja">Hualgayoc</option>
                                        <option class="d_caja">Jaén</option>
                                        <option class="d_caja">San Ignacio</option>
                                        <option class="d_caja">San Marcos</option>
                                        <option class="d_caja">San Miguel</option>
                                        <option class="d_caja">San Pablo</option>
                                        <option class="d_caja">Santa Cruz</option>

                                        <option class="d_cusc">Cuzco</option>
                                        <option class="d_cusc">Acomayo</option>
                                        <option class="d_cusc">Anta</option>
                                        <option class="d_cusc">Calca</option>
                                        <option class="d_cusc">Canas</option>
                                        <option class="d_cusc">Canchis</option>
                                        <option class="d_cusc">Chumbivilcas</option>
                                        <option class="d_cusc">Espinar</option>
                                        <option class="d_cusc">La Convención</option>
                                        <option class="d_cusc">Paruro</option>
                                        <option class="d_cusc">Paucartambo</option>
                                        <option class="d_cusc">Quispicanchi</option>
                                        <option class="d_cusc">Urubamba</option>
                                        
                                        <option class="d_huanc">Huancavelica</option>
                                        <option class="d_huanc">Acobamba</option>
                                        <option class="d_huanc">Angaraes</option>
                                        <option class="d_huanc">Castrovirreyna</option>
                                        <option class="d_huanc">Churcampa</option>
                                        <option class="d_huanc">Huaytará</option>
                                        <option class="d_huanc">Tayacaja</option>

                                        <option class="d_huanu">Huánuco</option>
                                        <option class="d_huanu">Ambo</option>
                                        <option class="d_huanu">Dos de Mayo</option>
                                        <option class="d_huanu">Huacaybamba</option>
                                        <option class="d_huanu">Huamalíes</option>
                                        <option class="d_huanu">Leoncio Prado</option>
                                        <option class="d_huanu">Marañón</option>
                                        <option class="d_huanu">Pachitea</option>
                                        <option class="d_huanu">Puerto Inca</option>
                                        <option class="d_huanu">Lauricocha</option>
                                        <option class="d_huanu">Yarowilca</option>

                                        <option class="d_ica">Ica</option>
                                        <option class="d_ica">Chincha</option>
                                        <option class="d_ica">Nazca</option>
                                        <option class="d_ica">Palpa</option>
                                        <option class="d_ica">Pisco</option>                

                                        <option class="d_juni">Huancayo</option>
                                        <option class="d_juni">Chanchamayo</option>
                                        <option class="d_juni">Chupaca</option>
                                        <option class="d_juni">Concepción</option>
                                        <option class="d_juni">Jauja</option>
                                        <option class="d_juni">Junín</option>
                                        <option class="d_juni">Satipo</option>
                                        <option class="d_juni">Tarma</option>
                                        <option class="d_juni">Yauli</option>

                                        <option class="d_lali">Trujillo</option>
                                        <option class="d_lali">Ascope</option>
                                        <option class="d_lali">Bolívar</option>
                                        <option class="d_lali">Chepén</option>
                                        <option class="d_lali">Gran Chimú</option>
                                        <option class="d_lali">Julcán</option>
                                        <option class="d_lali">Otuzco</option>
                                        <option class="d_lali">Pacasmayo</option>
                                        <option class="d_lali">Pataz</option>
                                        <option class="d_lali">Sánchez Carrión</option>
                                        <option class="d_lali">Santiago de Chuco</option>
                                        <option class="d_lali">Virú</option>
                                        
                                        <option class="d_lamb">Chiclayo</option>
                                        <option class="d_lamb">Ferreñafe</option>
                                        <option class="d_lamb">Lambayeque</option>

                                        <option class="d_lima" selected>Lima</option>
                                        <option class="d_lima">Barranca</option>
                                        <option class="d_lima">Cajatambo</option>
                                        <option class="d_lima">Canta</option>
                                        <option class="d_lima">Cañete</option>
                                        <option class="d_lima">Huaral</option>
                                        <option class="d_lima">Huarochirí</option>
                                        <option class="d_lima">Huaura</option>
                                        <option class="d_lima">Oyón</option>
                                        <option class="d_lima">Yauyos</option>

                                        <option class="d_lore">Maynas</option>
                                        <option class="d_lore">Alto Amazonas</option>
                                        <option class="d_lore">Datem del Marañón</option>
                                        <option class="d_lore">Loreto</option>
                                        <option class="d_lore">Mariscal Ramón Castilla</option>
                                        <option class="d_lore">Putumayo</option>
                                        <option class="d_lore">Requena</option>
                                        <option class="d_lore">Ucayali</option>
                                        
                                        <option class="d_madr">Tambopata</option>
                                        <option class="d_madr">Manu</option>
                                        <option class="d_madr">Tahuamanu</option>

                                        <option class="d_moqu">Mariscal Nieto</option>
                                        <option class="d_moqu">General Sánchez Cerro</option>
                                        <option class="d_moqu">Ilo</option>

                                        <option class="d_pasc">Pasco</option>
                                        <option class="d_pasc">Daniel Alcides Carrión</option>
                                        <option class="d_pasc">Oxapampa</option>

                                        <option class="d_piur">Piura</option>
                                        <option class="d_piur">Ayabaca</option>
                                        <option class="d_piur">Huancabamba</option>
                                        <option class="d_piur">Morropón</option>
                                        <option class="d_piur">Paita</option>
                                        <option class="d_piur">Sechura</option>
                                        <option class="d_piur">Sullana</option>
                                        <option class="d_piur">Talara</option>
                                        

                                        <option class="d_puno">Puno</option>
                                        <option class="d_puno">Azángaro</option>
                                        <option class="d_puno">Carabaya</option>
                                        <option class="d_puno">Chucuito</option>
                                        <option class="d_puno">El Collao</option>
                                        <option class="d_puno">Huancané</option>
                                        <option class="d_puno">Lampa</option>
                                        <option class="d_puno">Melgar</option>
                                        <option class="d_puno">Moho</option>
                                        <option class="d_puno">San Antonio de Putina</option>
                                        <option class="d_puno">San Román</option>
                                        <option class="d_puno">Sandia</option>
                                        <option class="d_puno">Yunguyo</option>

                                        <option class="d_sanm">Moyobamba</option>
                                        <option class="d_sanm">Bellavista</option>
                                        <option class="d_sanm">El Dorado</option>
                                        <option class="d_sanm">Huallaga</option>
                                        <option class="d_sanm">Lamas</option>
                                        <option class="d_sanm">Mariscal Cáceres</option>
                                        <option class="d_sanm">Picota</option>
                                        <option class="d_sanm">Rioja</option>
                                        <option class="d_sanm">San Martín</option>
                                        <option class="d_sanm">Tocache</option>
                                        
                                        <option class="d_tacn">Tacna</option>
                                        <option class="d_tacn">Tarata</option>
                                        <option class="d_tacn">Candarave</option>
                                        <option class="d_tacn">Jorge Basadre</option>

                                        <option class="d_tumb">Tumbes</option>
                                        <option class="d_tumb">Contralmirante Villar</option>
                                        <option class="d_tumb">Zarumilla</option>
                                        
                                        <option class="d_ucay">Coronel Portillo</option>
                                        <option class="d_ucay">Atalaya</option>
                                        <option class="d_ucay">Padre Abad</option>
                                        <option class="d_ucay">Purús</option>
                                        
                                    </select>   
                                </div>
                                <div class="divTableCell"><div class="etiquetaFormulario">Distrito: <div class="d_ob">*</div></div>
                                    <select id="s_dist" >
                                        <option  selected >-</option> 
                                    </select>
                                </div>
                            </div>	
                
                            <div class="divTableRow">
                                <div class="divTableCell"><div class="etiquetaFormulario">Dirección de entrega: <div class="d_ob">*</div></div>
                                    <input type="text" size="20" maxlength="45" name="campo1" id="campo1" value="" >		
                                </div>
                                <div class="divTableCell"><div class="etiquetaFormulario">Referencia</div>
                                    <input type="text" size="20" maxlength="45" name="campo1" id="campo1" value="" >		
                                </div>
                            </div>

                            <div class="divTableRow">
                                <div class="divTableCell">
                                    <div class="etiquetaFormulario">Teléfono fijo</div>
                                    <input type="text" size="9" maxlength="9" name="campo1" id="c_telfij" onkeypress="return soloNumeros(event)" value="" >		
                                </div>
                                <div class="divTableCell">
                                    <div class="etiquetaFormulario">Teléfono celular: <div class="d_ob">*</div></div>
                                    <input type="text" size="9" maxlength="9" name="campo1" id="c_telcel" onkeypress="return soloNumeros(event)" value="" >
                                </div>
                            </div>

                            <br>
                                <div class="divTableRow" style="width:100%;">
                                    <div class="divTableCell" style="text-align:left; color:black;font-size:1.3em;font-weight:bold;">
                                            <div class="d_ob">*</div> <span>Datos obligatorios.</span>
                                    </div>
                                </div>

                        </div>
                    </div>
                </div>
            </div>
        </div> 
    </div>
</div>

<br>
<br>

<div>
        <div class="checkbox" style="display:inline-block;">
            <label class="font-light label-pol" style="display:inline;">
                <input type="checkbox" id="otra-persona"   /><i class="helper"></i>
            </label>
            <div style="display:inline-block; font-size:1.3em; font-weight:bold;font-family:'nexa-lightuploaded_file';">  Marque esta casilla, si el destinatario del pedido será una tercera persona</div>
        </div>

    </div>




<div class="row cont_datos" id="d_formularios2" align="center" style="display:none;width:46em;">
    <div class="tabs col-xs-12" style="display:block !important;" id="tab-registro">
        <div class="tab-button-outer">
            <ul id="tab-button2">
                <li id="icon-description2" class="is-active"><a >DATOS DEL DESTINATARIO</a></li>     
            </ul>
        </div>
        <div class="content">
            <div id="description2"  style="display:block;">
                <div id="receptor">
                    <br>
                    <div class="divTable" style=" width:100%;display:inline-block;" >
                        <div class="divTableBody" style="display:block;">
                            <div class="divTableRow" >
                            <div class="divTableCell"><div class="etiquetaFormulario">Tipo Documento Identidad: <div class="d_ob">*</div></div>
                    
                                <select id="s_tipodoc" onchange="selectTipoDoc();">
                                <option id="di_pn1" value="1" selected >DNI</option>
                                <option id="di_pn2" value="2">Pasaporte</option>
                                <option id="di_pn3" value="3"> CE</option>
                                </select>		
                
                            </div>                                
                                <div class="divTableCell">
                                    <div class="etiquetaFormulario">Número Documento Identidad: <div class="d_ob">*</div></div>
                                    <input type="text" size="20" maxlength="20" name="campo1" id="campo1" value="" required >
                    
                                </div>
                            </div>	

                            <div class="divTableRow" id="pn_datos1">
                                <div class="divTableCell">
                                    <div class="etiquetaFormulario">Nombres : <div class="d_ob">*</div></div>
                                    <input type="text" size="20" maxlength="30" name="campo1" id="c_nombres1" onkeypress="return soloLetras(event)" value="" >		
                    
                                </div>
                                <div class="divTableCell">
                                    <div class="etiquetaFormulario">Apellidos: <div class="d_ob">*</div></div>
                                    <input type="text" size="20" maxlength="20" name="campo1" id="c_apep1" onkeypress="return soloLetras(event)" value="" >		
                    
                                </div>
                            </div>

                            <div class="divTableRow">
                                <div class="divTableCell">
                                    <div class="etiquetaFormulario">Teléfono: <div class="d_ob">*</div></div>
                                    <input type="text" size="9" maxlength="9" name="campo1" id="c_telcel" onkeypress="return soloNumeros(event)" value="" >
                                </div>
                            </div>

                            <br>
                                <div class="divTableRow" style="width:100%;">
                                    <div class="divTableCell" style="text-align:left; color:black;font-size:1.3em;font-weight:bold;">
                                    <div class="d_ob">*</div> <span>Datos obligatorios.</span>
                                    </div>
                                </div>

                            <br>

                            
                        </div>
                    </div>
                </div>
            </div>
        </div> 
    </div>
</div>

    

   

    <div style="text-align:center !important;"  >
        <div class="checkbox" style="display:inline-block;  border:3px solid #c51152; background-color:whitesmoke; display:none;" id="dp_error">
            <div style="display:inline-block; font-size:1.3em; font-weight:bold; margin: 12px 32px;" id="d_error"> - </div>
        </div>
    </div>

    <div style="text-align:center !important;" >
        <div class="checkbox" style="display:inline-block; " id="d_fact">
            <label class="font-light label-pol" style="display:inline;">
                <input type="checkbox" id="dfactura"   /><i class="helper"></i>
            </label>
            <div style="display:inline-block; font-size:1.3em; font-weight:bold; font-family:'nexa-lightuploaded_file';"> Deseo una factura</div>
        </div>
    </div>




    <div class="row cont_datos" id="factura" align="center" style="display:none;width:46em;">
    <div class="tabs col-xs-12" style="display:block !important;" id="tab-registro">
        <div class="tab-button-outer">
            <ul id="tab-button2">
                <li id="icon-description2" class="is-active"><a >DATOS DE LA FACTURA</a></li>     
            </ul>
        </div>
        <div class="content">
            <div id="description2"  style="display:block;">
                <div id="receptor">
                    <br>
                    <div class="divTable" style=" width:100%;display:inline-block;" >
                        <div class="divTableBody" style="display:block;">
                            <div class="divTableRow" style="width:100%;">
                                <div class="divTableCell" style="width:100%;">
                                    <div class="etiquetaFormulario">RUC: <div class="d_ob">*</div></div>
                                    <input type="text" size="20" maxlength="20" name="campo1" id="campo1"  onkeypress="return soloNumeros(event)" value="" required >
                    
                                </div>
                            </div>	


                            <div class="divTableRow" >
                                <div class="divTableCell" style="width:100%;">
                                    <div class="etiquetaFormulario">Razón Social: <div class="d_ob">*</div></div>
                                    <input type="text" size="9" maxlength="9" name="campo1" id="c_telcel"  value="" required>
                                </div>
                            </div>

                            <div class="divTableRow">
                                <div class="divTableCell" style="width:100%;">
                                    <div class="etiquetaFormulario">Dirección Fiscal: <div class="d_ob">*</div></div>
                                    <input type="text" size="9" maxlength="9" name="campo1" id="c_telcel"  value="" required>
                                </div>
                            </div>

                            <br>
                                <div class="divTableRow" >
                                    <div class="divTableCell" style="text-align:left; color:black;font-size:1.3em;font-weight:bold;">
                                    <div class="d_ob">*</div> <span>Datos obligatorios.</span>
                                    </div>
                                </div>

                            
                        </div>
                    </div>
                </div>
            </div>
        </div> 
    </div>
</div>
    </div>
    
    </div>
        
        	
    
        
        <br>
    <br>
        <div style="text-align:center">
        <div style="text-align:center !important;" >
        <div class="checkbox" style="display:inline-block; " id="d_politicas">
            <label class="font-light label-pol" style="display:inline;">
                <input type="checkbox" id="politicas"   /><i class="helper"></i>
            </label>
            <div style="display:inline-block; font-size:1.3em; color:black; "> <span>He leído y acepto las <a href="politicas-de-privacidad" class="span-pol color-primary btn-modals">Políticas de Privacidad</a>.</span></div>
        </div>
        </div>

        <div style="text-align:center !important;" >
        <div class="checkbox" style="display:inline-block; " id="d_publicidad">
            <label class="font-light label-pol" style="display:inline;">
                <input type="checkbox" id="publicidad"   /><i class="helper"></i>
            </label>
            <div style="display:inline-block; font-size:1.3em; color:black;"> <span>Deseo recibir ofertas y novedades de Beurer en mi e-mail.</span></div>
        </div>
        </div>
        
        <br>
                        
	
<span ><a class="btn btn-cmn disabled" id="btn_sgt" href="envio-pago.php" >SIGUIENTE</a></span>	<br>
<span  style="text-align:left;"><a class="btn " style="text-decoration:underline; color:black;" href="" >VOLVER</a></span>
</div>

    <div class="linea"></div>	

    <br>
       
    
    <div class="row" style="width:80%;margin:auto;display:block;  ">
  <div class="col-md-12" style="display:inline-block;">
          <div class="col-md-4 section-contacto" style="background-color:white;border-radius:8%;width:29.33333333%;margin:2%;padding:2em;text-align:center;">
          <div class="font-bold" style="font-size:1.92em;text-align:center;">Chatea con nosotros</div>
          <img src="assets/images/icons/mensajero.svg" style="width:20%;margin:5% 0%;"><br>
          <span class="font-light" style="font-size:1.2rem;padding:0% 16%;display:block;"> Facebook Messenger de Beurer Perú </span>
      </div>
          <div class="col-md-4 section-contacto" style="background-color:white;border-radius:8%;width:29.33333333%;margin:2%;padding:2em;text-align:center;">
          <div class="font-bold" style="font-size:1.92em;text-align:center;">Llámanos</div>
          <img src="assets/images/icons/telefono.svg" style="width:28%;margin:1.5% 0%;">
          <span class="font-light" style="font-size:1.2rem;padding:0% 16%;display:block;"> (+51) 920 198 522 </span>
          
          <span class="font-light" style="font-size:1.2rem;padding:0% 16%;display:block;"> (+51) 978 440 034 </span>

      </div>
          <div class="col-md-4 section-contacto" style="background-color:white;border-radius:8%;width:29.33333333%;margin:2%;padding:2em;text-align:center;">
          <div class="font-bold" style="font-size:1.92em;text-align:center;">Escríbenos</div>
          <img src="assets/images/icons/email.png" style="width:23%;margin:1.5% 0%;">
          <span class="font-light" style="font-size:1.2rem;padding:0% 16%;display:block;"> ventas@beurer.pe </span>
          <span class="font-light" style="font-size:1.2rem;padding:0% 16%;display:block;"> ventas1@beurer.pe </span>
      </div>
      </div>
  </div>
	</div>		
  	<!--Fin de cuerpo-->      
    </main>

    <script>


</script>

    <script src="assets/js/registro.js"></script>    


<?php

include 'src\includes\footer.php'

?>    
