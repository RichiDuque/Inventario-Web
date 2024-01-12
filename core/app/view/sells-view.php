<section class="content">
    <div class="row">
        <div class="col-md-12">
            <h1>Lista de Cargues / Pedidos</h1>
            <form>
                <input type="hidden" name="view" value="sells">
                <div class="row">
                    <input type="hidden" name="id" value="<?php echo $_GET["id"];?>">
                    <div class="col-md-3">
                        <input type="date" name="sd" value="<?php if(isset($_GET["sd"])){ echo $_GET["sd"]; }?>"
                            class="form-control">
                    </div>
                    <div class="col-md-3">
                        <input type="date" name="ed" value="<?php if(isset($_GET["ed"])){ echo $_GET["ed"]; }?>"
                            class="form-control">
                    </div>

                    <div class="col-md-3">
                        <input type="submit" class="btn btn-success btn-block" value="Procesar">
                    </div>

                </div>

            </form>

        </div>
    </div>
    <br>

    <div class="row">

        <div class="col-md-12">
            <?php if(isset($_GET["sd"]) && isset($_GET["ed"]) ):?>
            <?php if($_GET["sd"]!=""&&$_GET["ed"]!=""):?>
            <?php 
			$operations = array();

			if($_GET["id"]==""){
			$operations = SellData::getAllByDateOp($_GET["sd"],$_GET["ed"],2);
			}
			else{
			$operations = SellData::getAllByDateBCOp($_GET["id"],$_GET["sd"],$_GET["ed"],2);
			} 

            $products = SellData::getSells();
			 ?>

            <?php if(count($operations)>0):?>
            <?php foreach($products as $sell):
		$client = $sell->getPerson();?>
            <?php $supertotal = 0; ?>
            <table class="table table-bordered">
                <thead>
                    <th>Id</th>
                    <th>Vendedor</th>
                    <th>Total</th>
                    <th>Fecha</th>
                    <th></th>
                    <th></th>
                </thead>
                <?php foreach($operations as $operation):?>
                <tr>
                    <td><?php echo $operation->id; ?></td>
                    <td><?php echo $client->name." ".$client->lastname; ?></td>
                    <td>$ <?php echo number_format($operation->total-$operation->discount,2,'.',','); ?></td>
                    <td><?php echo $operation->created_at; ?></td>
                    <td style="width:30px;"><a href="index.php?view=onesell&id=<?php echo $operation->id; ?>"
                            class="btn btn-xs btn-default"><i class="glyphicon glyphicon-eye-open"></i></a></td>
                    <td style="width:30px;"><a href="index.php?view=delsell&id=<?php echo $operation->id; ?>"
                            class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a></td>
                </tr>
                <?php endforeach; ?>
                <?php
$supertotal+= ($operation->total-$operation->discount);
 endforeach; ?>

            </table>
            <h1>Total de ventas: $ <?php echo number_format($supertotal,2,'.',','); ?></h1>

            <?php else:
			 // si no hay operaciones
			 ?>
            <script>
            $("#wellcome").hide();
            </script>
            <div class="jumbotron">
                <h2>No hay operaciones</h2>
                <p>El rango de fechas seleccionado no proporciono ningun resultado de operaciones.</p>
            </div>

            <?php endif; ?>
            <?php else:?>
            <script>
            $("#wellcome").hide();
            </script>
            <div class="jumbotron">
                <h2>Fecha Incorrectas</h2>
                <p>Puede ser que no selecciono un rango de fechas, o el rango seleccionado es incorrecto.</p>
            </div>
            <?php endif;?>

            <?php endif; ?>
        </div>
    </div>