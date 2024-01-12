<div class="row">
	<div class="col-md-12">
		<h1><i class='glyphicon glyphicon-shopping-cart'></i> Lista de Vendedores</h1>
		<div class="clearfix"></div>


<?php

$products = SellData::getSells();
$clients = PersonData::getClients();

	?>
<br>
<table class="table table-bordered table-hover	">
	<thead>
		<th style="width:200px; text-align: center">Vendedor</th>
		<th style="width:200px; text-align: center">Total</th>
        <th style="text-align: center">Detalle</th>
	</thead>
	<?php foreach($clients as $client):
		$totalVend = SellData::getTotalSells($client->id);?>

	<tr>
		<td onclick="mostrarInformacion()" style="text-align: center">
            <?php
            echo $client->name." ".$client->lastname;
            ?>
		</td>
        <td style="text-align: center">
            <?php foreach($totalVend as $vend):
            echo $vend->total;
            endforeach;
            ?>
        </td>
        <td style="width:30px; text-align: center">
		    <a href="index.php?view=sells&id=<?php echo $client->id; ?>" class="btn btn-xs btn-default"><i class="glyphicon glyphicon-eye-open"></i></a>
        </td>
	</tr>

<?php endforeach; ?>

</table>

<div class="clearfix"></div>

	<?php

?>
<br><br><br><br><br><br><br><br><br><br>
	</div>
</div>
<script>
        function mostrarInformacion() {
            const mesSelect = document.querySelector(`select`);
            const mesSeleccionado = mesSelect.options[mesSelect.selectedIndex].text;
            
            // Aquí puedes realizar acciones con la información del vendedor y el mes seleccionado
            alert(`Mostrar información de para el mes de ${mesSeleccionado}`);
        }
    </script>