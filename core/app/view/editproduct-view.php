<?php
$product = ProductData::getById($_GET["id"]);
$categories = CategoryData::getAll();

if($product!=null):
?>
<div class="row">
    <div class="col-md-8">
        <h1><small>Editar Producto</small></h1>
        <?php if(isset($_COOKIE["prdupd"])):?>
        <p class="alert alert-info">La informacion del producto se ha actualizado exitosamente.</p>
        <?php setcookie("prdupd","",time()-18600); endif; ?>
        <br><br>
        <form class="form-horizontal" method="post" id="addproduct" enctype="multipart/form-data"
            action="index.php?view=updateproduct" role="form">
            <input type="hidden" name="barcode" class="form-control" value="<?php echo $product->barcode; ?>"
                placeholder="Codigo de barras del Producto">
            <div class="form-group">
                <label for="inputEmail1" class="col-lg-3 control-label">Nombre*</label>
                <div class="col-md-8">
                    <input type="text" name="name" class="form-control" id="name" value="<?php echo $product->name; ?>"
                        placeholder="Nombre del Producto">
                </div>
            </div>
            <div class="form-group">
                <label for="inputEmail1" class="col-lg-3 control-label">Categoria</label>
                <div class="col-md-8">
                    <select name="category_id" class="form-control">
                        <option value="">-- NINGUNA --</option>
                        <?php foreach($categories as $category):?>
                        <option value="<?php echo $category->id;?>"
                            <?php if($product->category_id!=null&& $product->category_id==$category->id){ echo "selected";}?>>
                            <?php echo $category->name;?></option>
                        <?php endforeach;?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="inputEmail1" class="col-lg-3 control-label">Cantidad por caja</label>
                <div class="col-md-8">
                    <input name="description" class="form-control" id="description"
                        placeholder="Cantidad por caja" value="<?php echo $product->description;?>">
                </div>
            </div>

            <div class="form-group">
                <label for="inputEmail1" class="col-lg-3 control-label">Precio de Entrada*</label>
                <div class="col-md-8">
                    <input type="text" name="price_in" class="form-control" value="<?php echo $product->price_in; ?>"
                        id="price_in" placeholder="Precio de entrada">
                </div>
            </div>
            <div class="form-group">
                <label for="inputEmail1" class="col-lg-3 control-label">Precio de Salida*</label>
                <div class="col-md-8">
                    <input type="text" name="price_out" class="form-control" id="price_out"
                        value="<?php echo $product->price_out; ?>" placeholder="Precio de salida">
                </div>
            </div>
            <div class="form-group">
                <label for="inputEmail1" class="col-lg-3 control-label">Unidad*</label>
                <div class="col-md-8">
                    <input type="text" name="unit" class="form-control" id="unit" value="<?php echo $product->unit; ?>"
                        placeholder="Unidad del Producto">
                </div>
            </div>
            <div class="form-group">
                <label for="inputEmail1" class="col-lg-3 control-label">Presentacion</label>
                <div class="col-md-8">
                    <input type="text" name="presentation" class="form-control" id="inputEmail1"
                        value="<?php echo $product->presentation; ?>" placeholder="Presentacion del Producto">
                </div>
            </div>
            <div class="form-group">
                <label for="inputEmail1" class="col-lg-3 control-label">Cantidad minima en inventario</label>
                <div class="col-md-8">
                    <input type="text" name="cant_caja" class="form-control" value="<?php echo ($product->cant_caja*$product->unit)/$product->description;?>"
                        id="inputEmail1" placeholder="Minima en Inventario (Default 10)">
                </div>
            </div>

            <div class="form-group">
                <label for="inputEmail1" class="col-lg-3 control-label">Esta activo</label>
                <div class="col-md-8">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="is_active" <?php if($product->is_active){ echo "checked";}?>>
                        </label>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="col-lg-offset-3 col-lg-8">
                    <input type="hidden" name="product_id" value="<?php echo $product->id; ?>">
                    <button type="submit" class="btn btn-success">Actualizar Producto</button>
                </div>
            </div>
        </form>

        <br><br><br><br><br><br><br><br><br>
    </div>
</div>
<?php endif; ?>