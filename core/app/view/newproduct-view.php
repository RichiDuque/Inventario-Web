    <?php 
$categories = CategoryData::getAll();
$barcode = ProductData::maxBarcode();
$newBarcode = sprintf("%05d", $barcode->max_barcode + 1);
    ?>
    <div class="row">
        <div class="col-md-12">
            <h1>Nuevo Producto</h1>
            <br>
            <form class="form-horizontal" method="post" enctype="multipart/form-data" id="addproduct"
                action="index.php?view=addproduct" role="form">

                <!-- <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Imagen</label>
    <div class="col-md-6">
      <input type="file" name="image" id="image" placeholder="">
    </div>
  </div> -->
                <div class="form-group">
                    <label for="inputEmail1" class="col-lg-2 control-label">Codigo de Barras*</label>
                    <div class="col-md-6">
                        <input type="text" name="barcode" id="product_code" class="form-control" id="barcode"
                            placeholder="Codigo de Barras del Producto" value="<?php echo $newBarcode; ?>" disabled>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail1" class="col-lg-2 control-label">Nombre*</label>
                    <div class="col-md-6">
                        <input type="text" name="name" required class="form-control" id="name"
                            placeholder="Nombre del Producto">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail1" class="col-lg-2 control-label">Categoria</label>
                    <div class="col-md-6">
                        <select name="category_id" class="form-control">
                            <option value="">-- NINGUNA --</option>
                            <?php foreach($categories as $category):?>
                            <option value="<?php echo $category->id;?>"><?php echo $category->name;?></option>
                            <?php endforeach;?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail1" class="col-lg-2 control-label">Cantidad por caja</label>
                    <div class="col-md-8">
                    <input name="description" class="form-control" id="description" type="number"
                        placeholder="Cantidad por caja" value="<?php echo $product->description;?>">
                </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail1" class="col-lg-2 control-label">Precio de Entrada*</label>
                    <div class="col-md-6">
                        <input type="number" name="price_in" required class="form-control" id="price_in"
                            placeholder="Precio de entrada">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail1" class="col-lg-2 control-label">Precio de Salida*</label>
                    <div class="col-md-6">
                        <input type="number" name="price_out" required class="form-control" id="price_out"
                            placeholder="Precio de salida">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail1" class="col-lg-2 control-label">Unidad*</label>
                    <div class="col-md-6">
                        <input type="number" name="unit" required class="form-control" id="unit"
                            placeholder="Unidad del Producto">
                    </div>
                </div>

                <div class="form-group">
                    <label for="inputEmail1" class="col-lg-2 control-label">Presentacion</label>
                    <div class="col-md-6">
                        <input type="text" name="presentation" class="form-control" id="inputEmail1"
                            placeholder="Presentacion del Producto">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail1" class="col-lg-2 control-label">Cantidad minima en inventario (Cajas)</label>
                    <div class="col-md-6">
                        <input type="number" name="cant_caja" class="form-control" id="inputEmail1"
                            placeholder="Minima en Inventario (Default 10)">
                    </div>
                </div>

                <div class="form-group">
                    <label for="inputEmail1" class="col-lg-2 control-label">Inventario inicial:</label>
                    <div class="col-md-6">
                        <input type="number" name="q" class="form-control" id="inputEmail1"
                            placeholder="Inventario inicial">
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-lg-offset-2 col-lg-10">
                        <button type="submit" class="btn btn-primary">Agregar Producto</button>
                    </div>
                </div>
            </form>

        </div>
    </div>

    <script>
$(document).ready(function() {
    $("#product_code").keydown(function(e) {
        if (e.which == 17 || e.which == 74) {
            e.preventDefault();
        } else {
            console.log(e.which);
        }
    })
});
    </script>