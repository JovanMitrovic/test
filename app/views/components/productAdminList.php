<table id="product" class="table table-striped table-bordered" style="width:100%">
    <thead>
        <tr>
            <th>Name</th>
            <th>Description</th>
            <th>Image</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($data)) { ?>
        
        <?php foreach ($data as $product) { ?>
            
            <tr>
                <td><?php echo $product->name; ?></td>
                <td><?php echo $product->description; ?></td>
                <td>
                    <div class="view-item">
                        <img src="<?php echo BASEURL; ?>/assets/uploads/<?php echo $product->image; ?>" alt="">
                    </div>
                </td>
                <td>
                    <a href="<?php echo BASEURL; ?>/productController/editProduct/<?php echo $product->id?>" class="btn btn-warning">Edit</a>
                </td>
                <td><a href="<?php echo BASEURL; ?>/productController/deleteProduct/<?php echo $product->id?>" class="btn btn-danger">Delete</a></td>
            </tr>

        <?php } } ?>

    </tbody>
</table> 
