<?php
    session_start();
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
            <div class="title-section">Prodcuto destacados</div>
            <div class="products-list" id="space-list">

            </div>
        </div>
    </div>
    <?php include("layouts/_footer.php") ?>
</body>
<script type="text/javascript" src="assets/bootstrap-5.3.0/js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/main-scripts.js"></script>
<script type="text/javascript">
$(document).ready(function() {
    $.ajax({
        url: 'servicios/producto/get_all_products.php',
        type: 'POST',
        data: {},
        success: function(data) {
            console.log(data);
            let html = '';
            for (var i = 0; i < data.datos.length; i++) {
                html +=
                    '<div class="product-box">' +
                    '<a href="producto.php?p=' + data.datos[i].codpro + '">' +
                    '<div class="product">' +
                    '<img src="assets/products/' + data.datos[i].rutimapro + '">' +
                    '<div class="detail-title">' + data.datos[i].nompro + '</div>' +
                    '<div class="detail-description">' + data.datos[i].despro + '</div>' +
                    '<div class="detail-price">' + formato_precio(data.datos[i].prepro) + '</div>' +
                    '</div>' +
                    '</a>' +
                    '</div>';
            }
            document.getElementById("space-list").innerHTML = html;
        },
        error: function(err) {
            console.error(err);
        }
    });
});

function formato_precio(valor) {
    //10.99
    let svalor = valor.toString();
    let array = svalor.split(".");
    return "$/. " + array[0] + ".<span>" + array[1] + "</span>";
}
</script>

</html>