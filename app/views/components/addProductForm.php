<h2>Add Product Form</h2>

<form action="<?php echo BASEURL; ?>/productController/addProduct" method="POST" enctype="multipart/form-data">

    <div class="form-group">
        <input type="text" name="name" class="form-control" placeholder="Product Name..."
        value="<?php 
            if (!empty($data['name']))
            {
                echo $data['name'];
            }
        ?>">
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
        <textarea type="text" name="description" class="form-control" placeholder="Product Description..."
        value=""><?php 
            if (!empty($data['description']))
            {
                echo $data['description'];
            }
        ?></textarea>
        <div class="error">
            <?php if (!empty($data['descriptionError'])) echo $data['descriptionError']; ?>
        </div>
    </div>

    <div class="form-group">
        <label>Select Image</label>
        <input name="image" type="file" class="form-control" 
        value="<?php 
            if (!empty($data['image']))
            {
                echo $data['image'];
            }
        ?>">
        <div class="error">
            <?php if (!empty($data['imageError'])){ echo $data['imageError']; } ?>
        </div>
    </div>

    <div class="form-group">
        <input type="submit" value="Add Product" class="btn btn-primary">
    </div>
</form>