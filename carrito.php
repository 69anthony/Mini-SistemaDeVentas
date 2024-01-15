<?php
    session_start();
    if (!isset($_SESSION['codusu'])){
        header('location: index.php');
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Sen&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="fontawesome-free-6.4.0-web/css/all.min.css">
    <link rel="stylesheet" href="css/index.css">
    <title>Ecommerce</title>
</head>

<body>
    <?php include ('layouts/_main-header.php'); ?>
    <div class="main-content">
        <div class="content-page">
            <h3>Mis pedidos</h3>
            <div class="body-pedidos" id="space-list">
            </div>
            <input class="ipt-procom" type="text" id="dirusu" placeholder="Direccion"><br>
            <input class="ipt-procom" type="text" id="telusu" placeholder="Telefono"><br>
            <br>
            <h4>Tipos de pago</h4>
            <div class="metodo-pago">
                <input type="radio" name="tipopago" value="1" id="tipo1">
                <label for="tipo1">Pago por transferencia</label>
            </div>
            <div class="metodo-pago">
                <input type="radio" name="tipopago" value="2" id="tipo2">
                <label for="tipo2">Pago con tarjeta de crédito/débito</label>
            </div>

            <button onclick="procesar_compra()" style="margin-top: 5px;">Procesar compra</button>
        </div>
    </div>
    <?php include("layouts/_footer.php") ?>
</body>
<script type="text/javascript" src="assets/bootstrap-5.3.0/js/bootstrap.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
    $.ajax({
        url: 'servicios/pedido/get_porprocesar.php',
        type: 'POST',
        data: {},
        success: function(data) {
            console.log(data);
            let html = '';
            let monto = 0;
            for (var i = 0; i < data.datos.length; i++) {
                html +=
                    '<div class="item-pedido">' +
                    '<div class="pedido-img">' +
                    '<img src="assets/products/' + data.datos[i].rutimapro + '">' +
                    '</div>' +
                    '<div class="pedido-detalle">' +
                    '<h3>' + data.datos[i].nompro + '</h3>' +
                    '<p><b>Precio:</b> S/.' + data.datos[i].prepro + '</p>' +
                    '<p><b>Fecha:</b> ' + data.datos[i].fecped + '</p>' +
                    '<p><b>Estado:</b> ' + data.datos[i].estadotext + '</p>' +
                    '<p><b>Dirección:</b> ' + data.datos[i].dirusuped + '</p>' +
                    '<p><b>Celular:</b> ' + data.datos[i].telusuped + '</p>' +
                    '<button class="btn-delete-cart" onclick="delete_product(' +
                    data.datos[i].codped + ')">Eliminar</button>' +
                    '</div>' +
                    '</div>';
                /*if (data.datos[i].estado == "1") {
                    monto += parseFloat(data.datos[i].prepro);
                }*/

            }

            if (data.datos.length == 0) {
                alert("No hay productos en carrito");
                window.history.back();
            }

            document.getElementById("space-list").innerHTML = html;
        },
        error: function(err) {
            console.error(err);
        }
    });
});

function delete_product(codped) {
    $.ajax({
        url: 'servicios/pedido/delete_pedido.php',
        type: 'POST',
        data: {
            codped: codped,
        },
        success: function(data) {
            console.log(data);
            if (data.state) {
                window.location.reload();
            } else {
                alert(data.detail);
            }
        },
        error: function(err) {
            console.error(err);
        }
    });
}

function procesar_compra() {
    let dirusu = document.getElementById("dirusu").value;
    let telusu = $("#telusu").val();
    let tipopago = 1;
    if (document.getElementById("tipo2").checked) {
        tipopago = 2;
    }
    if (dirusu == "" || telusu == "") {
        alert("Complete los campos");
    } else {
        if (!document.getElementById("tipo1").checked &&
            !document.getElementById("tipo2").checked) {
            alert("Seleccione un método de pago!");
        } else {
            if (tipopago == 2) {
                Culqi.open();
            } else {
                $.ajax({
                    url: 'servicios/pedido/confirm.php',
                    type: 'POST',
                    data: {
                        dirusu: dirusu,
                        telusu: telusu,
                        tipopago: tipopago,
                        token: ''
                    },
                    success: function(data) {
                        console.log(data);
                        if (data.state) {
                            window.location.href = "pedido.php";
                        } else {
                            alert(data.detail);
                        }
                    },
                    error: function(err) {
                        console.error(err);
                    }
                });
            }
        }
    }
}
</script>

</html>