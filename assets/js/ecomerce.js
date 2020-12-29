const MERCHANT_ID = '508029';
const ACCOUNT_ID = '512321';
const API_KEY = '4Vj8eK4rloUd272L48hsrarnUA'
let DOMAIN = (window.location.hostname == 'localhost') ? 'http://localhost/beurer_cl/' : 'https://cl.blogingenieria.site/';

const session = parseInt(document.querySelector('.dataUser').dataset.id);
const productos = localStorage.getItem('productos') ? JSON.parse(localStorage.getItem('productos')) : []
const subtotal = localStorage.getItem('subtotal') ? localStorage.getItem('subtotal') : 0
const envio = localStorage.getItem('costo_envio') ? localStorage.getItem('costo_envio') : 0
const cantidad = localStorage.getItem('cantidad') ? localStorage.getItem('cantidad') : 0
let tipo_cupon = localStorage.getItem('tipo') ? parseInt(localStorage.getItem('tipo')) : null
let descuento = localStorage.getItem('descuento') ? parseFloat(localStorage.getItem('descuento')) : 0
let cupon = localStorage.getItem('descuento') ? true : false
const user = JSON.parse(localStorage.getItem('Comprador'));
const dest = localStorage.getItem('Destinatario') ? JSON.parse(localStorage.getItem('Destinatario')) : false
const facturacion = localStorage.getItem('facturacion') ? JSON.parse(localStorage.getItem('facturacion')) : false
const cupon_codigo = localStorage.getItem('cupon_codigo') ? localStorage.getItem('cupon_codigo') : 0;

let total = 0
let cupon_descuento = 0;


const generateCode = () => {
    let code = 0;
    code = Number(Math.ceil(Math.random() * 100000) + total);
    return code;
};

const subtotal_payu = async() => {
    if (localStorage.getItem('productos')) {
        let productos = JSON.parse(localStorage.getItem('productos'))
        let subtotal = 0;
        for (prod of productos) {
            let formData = new FormData()
            formData.append('id', prod.id)
            let resp = await ObjMain.ajax_post('POST', `${DOMAIN}ajax/getProducto`, formData)
            const { titulo: title, precio: precio_online } = JSON.parse(resp).data
            subtotal += precio_online * prod.cantidad
        }
    }
    return subtotal;
}
const total_calc = (subtotal, cupon, tipo_cupon, descuento, envio) => {
    let total = subtotal
    let cupon_descuento = 0;
    if (cupon) {
        if (tipo_cupon == 1) {
            cupon_descuento = parseFloat(subtotal) * (descuento / 100)
            total = `${(((parseFloat(subtotal)* descuento/100) + parseFloat(envio))).toFixed(2)}`
        }
        if (tipo_cupon == 2) {
            cupon_descuento = parseFloat(descuento).toFixed(2);
            total = `${(parseFloat(envio) + parseFloat(subtotal) - descuento ).toFixed(2)}`
        }
    } else {
        total = `${((parseFloat(envio) + parseFloat(subtotal))).toFixed(2) }`;
    }
    return total;
}
const total_payu = async() => {
    const sub = await subtotal_payu();
    const total_payu = total_calc(sub, cupon, tipo_cupon, descuento, envio);

    return total_payu;
}

const signature = (payu_total, code) => {
    let signature = `${API_KEY}~${MERCHANT_ID}~${code}~${payu_total}~COP`;
    return hex_md5(signature);
}

const ADD_QUERY_PARAMS = () => {
    let URI_RESP = '';
    if (dest) {
        URI_RESP += `&dest_nombres=${dest.nombres}&dest_telefono=${dest.telefono}&dest_tipo_doc=${dest.tipo_doc}&dest_number_doc=${dest.number_doc}`;
    }
    if (facturacion) {
        URI_RESP += `&ruc=${facturacion.ruc}&r_social=${facturacion.r_social}&r_fiscal=${facturacion.r_fiscal}`;
    }
    return URI_RESP
}
const ADD_PARAMS = () => {
        return `nombres=${user.nombres}&apellidos=${user.apellidos}&tipo_documento=${user.tipo_doc}&numero_documento=${user.number_doc}&provincia=Quito&distrito=${user.distrito}&telefono=${user.telefono}&d_envio=${user.d_envio}&referencia=${user.referencia}&entrega_precio=${parseFloat(envio)}&tipo_cupon=${tipo_cupon == null ? 0 : tipo_cupon }&cupon_codigo=${cupon_codigo}&cupon_descuento=${cupon_descuento}&cantidades=${converter().cant_products}&subtotales=${converter().subtotal_products}&skus=${converter().skus_prods}&xratioColors=${converter().colores_prods}`;
    }
    // id_productos=${converter().id_products}
export const initPayu = () => {
    document.querySelector('.formPayu').addEventListener('submit', async e => {
        e.preventDefault();
        const codePayment = generateCode();
        const amount = await total_payu();
        const sig = signature(amount, codePayment);

        e.target.setAttribute('method', 'POST');
        e.target.setAttribute('action', 'https://sandbox.checkout.payulatam.com/ppp-web-gateway-payu/');


        let $inputRecojo =
            parseInt(envio) ? `<input name="shippingAddress"    type="hidden"  value="${user.d_envio}">
                <input name="shippingCity"    type="hidden"  value="${user.distrito}">
                <input name="shippingCountry"    type="hidden"  value="Colombia">
                ` : '';
        e.target.innerHTML += `
                    <input name="merchantId"    type="hidden"  value="${MERCHANT_ID}">
                    <input name="accountId"     type="hidden"  value="${ACCOUNT_ID}">
                    <input name="description"   type="hidden"  value="${converter().title_products}">
                    <input name="referenceCode" type="hidden"  value="${codePayment}">
                    <input name="amount"        type="hidden"  value="${amount}">
                    <input name="tax"           type="hidden"  value="">
                    <input name="taxReturnBase" type="hidden"  value="">
                    <input name="currency"      type="hidden"  value="COP" >
                    <input name="signature"     type="hidden"  value="${sig}">
                    <input name="test"          type="hidden"  value="1" >
                    <input name="buyerFullName" type="hidden"  value="${user.nombres} ${user.apellidos}">
                    <input name="buyerEmail"    type="hidden"  value="${user.correo}">
                    <input name="payerDocument" type="hidden"  value="${user.number_doc}">
                    <input name="telephone"     type="hidden"  value="${user.telefono}">
                    <input name="movilePhone"   type="hidden"  value="${user.telefono}">
                    <input name="extra2"       type="hidden"  value="">
                    <input name="extra3"       type="hidden"  value="">
    
                    <input name="extra1"       type="hidden"  value="${converter().id_products}">
                    <input name="declineResponseUrl"    type="hidden"  value="${DOMAIN}">
                    <input name="displayShippingInformation"    type="hidden"  value="${parseInt(envio)? 'YES':'NO'}">
                     ${$inputRecojo}
                    <input name="responseUrl"    type="hidden" value="${DOMAIN}ajax/responsePagePayu?payu=true&session=${session}&${ADD_PARAMS()}${ADD_QUERY_PARAMS()}">
                    <input name="confirmationUrl" type="hidden"  value="${DOMAIN}confirmation?payu=true&session=${session}&${ADD_PARAMS()}${ADD_QUERY_PARAMS()}">`;

        e.target.submit()
    });

}




if (cupon) {
    if (tipo_cupon == 1) {
        document.querySelector('#cupon_descuento').textContent = `${parseFloat(descuento).toFixed(2)} %`
        cupon_descuento = parseFloat(subtotal) * (descuento / 100)
        total = `${(((parseFloat(subtotal)* descuento/100) + parseFloat(envio))).toFixed(2)*100}`
    }
    if (tipo_cupon == 2) {
        document.querySelector('#cupon_descuento').textContent = `- ${parseFloat(descuento).toFixed(2)}`
        cupon_descuento = parseFloat(descuento).toFixed(2);
        total = `${(parseFloat(envio) + parseFloat(subtotal) - descuento ).toFixed(2) *100 }`
    }
} else {
    total = `${((parseFloat(envio) + parseFloat(subtotal))).toFixed(2) *100}`;
}


function converter() {
    let id_products = [],
        cant_products = [],
        title_products = [],
        subtotal_products = [],
        colores_productos = [],
        skus_productos = [];
    productos.forEach(prod => {
        id_products.push(prod.id);
        title_products.push(prod.title);
        cant_products.push(prod.cantidad);
        subtotal_products.push(prod.cantidad * prod.precio_online);
        // FILTRO COLOR .
        let color = prod.color ? prod.color : 'none';
        colores_productos.push(color);
        // FILTRO SKU
        let sku = prod.producto_sku ? prod.producto_sku : 'none';
        skus_productos.push(sku);
    })
    return {
        id_products: id_products.join('-'),
        title_products: title_products.join('-'),
        cant_products: cant_products.join('-'),
        subtotal_products: subtotal_products.join('-'),
        colores_prods: colores_productos.join('-'),
        skus_prods: skus_productos.join('-'),

    }
}

function dataFormPurchase(charge) {
    const formData = new FormData();
    formData.append('nombres', charge.nombres);
    formData.append('apellidos', charge.apellidos);
    formData.append('correo', charge.correo);
    formData.append('tipo_documento', charge.tipo_documento);
    formData.append('numero_documento', charge.numero_documento);
    formData.append('provincia', 'Lima');
    formData.append('distrito', charge.distrito);
    formData.append('telefono', charge.telefono);
    formData.append('d_envio', charge.d_envio);
    formData.append('referencia', charge.referencia);
    formData.append('entrega_precio', charge.envio);
    formData.append('id_cliente', charge.id_session);
    formData.append('subtotal', charge.subtotal);
    formData.append('tipo_cupon', charge.tipo_cupon);
    formData.append('cupon_codigo', charge.cupon_codigo);
    formData.append('cupon_descuento', charge.cupon_descuento);

    formData.append('id_productos', charge.id_productos);
    formData.append('cantidades', charge.cantidades);
    formData.append('subtotales', charge.subtotales);
    if (charge['destinatario']) {
        charge.destinatario = JSON.parse(charge.destinatario)
        formData.append('dest_nombres', charge.destinatario.dest_nombres)
        formData.append('dest_telefono', charge.destinatario.dest_telefono)
        formData.append('dest_tipo_doc', charge.destinatario.dest_tipo_doc)
        formData.append('dest_number_doc', charge.destinatario.dest_number_doc)
    }
    if (charge['facturacion']) {
        charge.facturacion = JSON.parse(charge.facturacion)
        formData.append('ruc', charge.facturacion.ruc)
        formData.append('r_social', charge.facturacion.r_social)
        formData.append('r_fiscal', charge.facturacion.r_fiscal)
    }
    return formData;
}


function dataFormSend(token, email) {

    const formData = new FormData();
    formData.append('token', token);
    formData.append('correo', email);
    formData.append('id_session', session);
    formData.append('nombres', `${user.nombres}`);
    formData.append('apellidos', `${user.apellidos}`);
    formData.append('telefono', user.telefono);
    formData.append('distrito', `${user.distrito}`);
    formData.append('d_envio', user.d_envio);
    formData.append('referencia', user.referencia);
    formData.append('tipo_documento', user.tipo_doc);
    formData.append('numero_documento', user.number_doc);

    formData.append('id_productos', converter().id_products);
    formData.append('cantidades', converter().cant_products);
    formData.append('subtotales', converter().subtotal_products);

    formData.append('cantidad_total', cantidad);
    formData.append('subtotal_coste', subtotal);
    formData.append('envio_coste', envio);
    formData.append('tipo_cupon', `${tipo_cupon == null ? 0 : tipo_cupon }`);
    formData.append('cupon_descuento', cupon_descuento);
    formData.append('cupon_codigo', cupon_codigo);
    formData.append('total_coste', total);
    if (dest) {
        formData.append('flag_dest', true)
        formData.append('dest_nombres', dest.nombres)
        formData.append('dest_apellidos', dest.apellidos)
        formData.append('dest_telefono', dest.telefono)
        formData.append('dest_tipo_doc', dest.tipo_doc)
        formData.append('dest_number_doc', dest.number_doc)
    }
    if (facturacion) {
        formData.append('flag_facturacion', true)
        formData.append('ruc', facturacion.ruc)
        formData.append('r_social', facturacion.r_social)
        formData.append('r_fiscal', facturacion.r_fiscal)
    }
    return formData;
}

function dataFormSendOrder() {


    const formData = new FormData();
    formData.append('correo', user.correo);
    formData.append('id_session', session);
    formData.append('nombres', `${user.nombres}`);
    formData.append('apellidos', `${user.apellidos}`);
    formData.append('telefono', user.telefono);
    formData.append('distrito', `${user.distrito}`);
    formData.append('d_envio', user.d_envio);
    formData.append('referencia', user.referencia);
    formData.append('tipo_documento', user.tipo_doc);
    formData.append('numero_documento', user.number_doc);

    formData.append('id_productos', converter().id_products);
    formData.append('cantidades', converter().cant_products);
    formData.append('subtotales', converter().subtotal_products);
    formData.append('colores', converter().colores_prods);
    formData.append('skus', converter().skus_prods);

    formData.append('cantidad_total', cantidad);
    formData.append('subtotal_coste', subtotal);
    formData.append('envio_coste', envio);
    // formData.append('tipo_cupon', `${tipo_cupon == null ? 0 : tipo_cupon }`);
    formData.append('cupon_descuento', cupon_descuento);
    formData.append('cupon_codigo', cupon_codigo);
    formData.append('total_coste', total);
    if (dest) {
        formData.append('flag_dest', true)
        formData.append('dest_nombres', dest.nombres)
        formData.append('dest_telefono', dest.telefono)
        formData.append('dest_tipo_doc', dest.tipo_doc)
        formData.append('dest_number_doc', dest.number_doc)
    }
    if (facturacion) {
        formData.append('flag_facturacion', true)
        formData.append('ruc', facturacion.ruc)
        formData.append('r_social', facturacion.r_social)
        formData.append('r_fiscal', facturacion.r_fiscal)
    }
    return formData;
}

function dataFormOrder(order) {
    const formData = new FormData();
    const monto = order.amount / 100;
    const user_type = parseInt(order.metadata.id_session) == 0 ? 'invitado' : 'autenticado';
    formData.append('id_orden', order.id);
    formData.append('estado', order.state);
    formData.append('cip', order.payment_code);
    formData.append('monto', monto);
    formData.append('usuario', `${order.metadata.nombres} ${order.metadata.apellidos}`);
    formData.append('telefono', order.metadata.telefono);
    formData.append('correo', order.metadata.correo);
    formData.append('tipo_user', user_type);
    formData.append('detalles', JSON.stringify(order.metadata));
    return formData;
}

function modalCheckout(title, icon, message, color) {
    Swal.fire({
        icon: icon,
        title: title,
        text: message,
        showCancelButton: false,
        confirmButtonColor: '#C51152',
        confirmButtonText: "continuar",
        // closeOnConfirm: false    
    })
}


function culqi() {

    if (Culqi.token) {
        console.log('token')
        const token = Culqi.token.id;
        const email = Culqi.token.email;
        const formSend = dataFormSend(token, email)
        Culqi.close()
        ObjMain.ajax_post('POST', `${DOMAIN}ajax/createCharge`, formSend)
            .then(resp => {

                resp = JSON.parse(resp);
                resp = JSON.parse(resp)
                if (resp.object == 'charge') {
                    const {
                        ...charge
                    } = resp;
                    if (charge.outcome.type == "venta_exitosa") {
                        const {
                            metadata
                        } = charge;
                        const {
                            antifraud_details
                        } = charge;
                        const formCharge = dataFormPurchase(metadata);
                        formCharge.append('codigo_venta', charge.reference_code);
                        formCharge.append('telefono', antifraud_details.phone);
                        formCharge.append('xratioColors', converter().colores_prods); // enviamos colores
                        formCharge.append('skus', converter().skus_prods); // enviamos skus
                        ObjMain.ajax_post('POST', `${DOMAIN}ajax/purchase`, formCharge)
                            .then(resp => {
                                resp = JSON.parse(resp);
                                if (resp.status) {
                                    localStorage.setItem('id_pedido', resp.data.codigo_pedido);
                                    modalCheckout('Gracias por su compra', 'success',
                                        `${charge.outcome.user_message}`, '#C5115')
                                    setTimeout(() => window.location = `${DOMAIN}order-summary`, 1000);
                                }
                            })
                            .catch(err => {
                                console.log(err)
                            });
                    }
                } else {
                    modalCheckout('Error', 'error', `${resp.user_message}`, '#C5115')
                }
            })
            .catch(err => {
                console.log(err)

            });
    } else if (Culqi.order) {
        console.log(Culqi.order)
        const {
            ...order
        } = Culqi.order;
        localStorage.setItem('order', JSON.stringify(order));
        const formOrder = dataFormOrder(Culqi.order);
        const phone = JSON.parse(localStorage.getItem('Comprador')).telefono;
        const correo = JSON.parse(localStorage.getItem('Comprador')).correo;
        formOrder.append('telefono', phone);
        formOrder.append('correo', correo);

        ObjMain.ajax_post('POST', `${DOMAIN}ajax/purchaseOrder`, formOrder)
            .then(resp => {
                resp = JSON.parse(resp);
                if (resp.status) {
                    localStorage.setItem('id_order', resp.data.orden_id);
                    setTimeout(() => window.location = `${DOMAIN}order-summary`, 1000);
                }
            })
            .catch(err => {
                console.log(err)
            });
    } else {
        console.log(Culqi.error);
    }
}

export default initPayu;