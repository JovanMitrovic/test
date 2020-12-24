<h2>Update Product Form</h2>

<form action="<?php echo BASEURL; ?>/productController/updateProduct" method="POST">

    <div class="form-group">
        <input type="text" name="name" class="form-control" placeholder="Product Name..."
        value="<?php echo $data['data']->name; ?>">
        <div class="error">
            <?php 
                if (!empty($data['nameError']))
                {
                    echo $data['nameError']; 
                } 
            ?>
        </div>
    </div>

    <div class="form-group">
        <textarea type="text" name="description" class="form-control" placeholder="Product Description..."><?php echo $data['data']->description; ?>
        </textarea>
        <div class="error">
            <?php if (!empty($data['descriptionError'])) echo $data['descriptionError']; ?>
        </div>
        <input type="hidden" name="productID" value="<?php echo $data['data']->id; ?>">
    </div>

    <div class="form-group">
    <label>Select Image</label>
        <input name="image" type="file" class="form-control" 
        value="<?php 
            if (!empty($data['data']->image))
            {
                echo BASEURL; ?>/assets/uploads/<?php echo $data['data']->image;
            }
        ?>">
        <div class="error">
            <?php if (!empty($data['imageError'])){ echo $data['imageError']; } ?>
        </div>
    </div>

    <div class="form-group">
        <input type="submit" value="Update Product" class="btn btn-primary">
    </div>
</form>