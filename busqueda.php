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
            <div class="title-section">Resultados para <strong>"<?php echo $_GET['text']; ?>"</strong></div>
            <div class="products-list" id="space-list">
                <!--
                <div class="product-box">
                    <a href="">
                        <div class="product">
                            <img src="assets/products/crepe.jpg" alt="">
                            <div class="detail-title">Papel Crepe</div>
                            <div class="detail-description">Ideal para decoracion de trabajos</div>
                            <div class="detail-price">$/. 14 <span>99</span></div>
                        </div>
                    </a>
                </div>-->
            </div>
        </div>
    </div>

</body>
<script type="text/javascript" src="assets/bootstrap-5.3.0/js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/main-scripts.js"></script>
<script type="text/javascript">
		var text="<?php echo $_GET['text']; ?>";
		$(document).ready(function(){
			$.ajax({
				url:'servicios/producto/get_all_results.php',
				type:'POST',
				data:{
					text:text
				},
				success:function(data){
					console.log(data);
					let html='';
					for (var i = 0; i < data.datos.length; i++) {
						html+=
						'<div class="product-box">'+
							'<a href="producto.php?p='+data.datos[i].codpro+'">'+
								'<div class="product">'+
									'<img src="assets/products/'+data.datos[i].rutimapro+'">'+
									'<div class="detail-title">'+data.datos[i].nompro+'</div>'+
									'<div class="detail-description">'+data.datos[i].despro+'</div>'+
									'<div class="detail-price">'+formato_precio(data.datos[i].prepro)+'</div>'+
								'</div>'+
							'</a>'+
						'</div>';
					}
					if (html=='') {
						document.getElementById("space-list").innerHTML="No hay resultados";
					}else{
						document.getElementById("space-list").innerHTML=html;
					}
				},
				error:function(err){
					console.error(err);
				}
			});
		});
		function formato_precio(valor){
			//10.99
			let svalor=valor.toString();
			let array=svalor.split(".");
			return "S/. "+array[0]+".<span>"+array[1]+"</span>";
		}
	</script>

</html>