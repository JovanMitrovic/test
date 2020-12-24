<div class="wrapper">

    <div class="view-main">

        <h2 style="text-align:center;">Product catalog</h2>

        <div class="grid-view">
            <?php if (!empty($data)) { ?>
            
            <?php foreach ($data['products'] as $product) { ?>
                
            <div class="view-item">
                <div class="vi-left">
                    <img src="<?php echo BASEURL; ?>/assets/uploads/<?php echo $product->image; ?>" alt="">
                </div>
                <div class="vi-right">
                    <p class="title">
                        <?php echo $product->name; ?>
                    </p>
                    <p>
                        <?php echo $product->description; ?>
                    </p>
                </div>
            </div>

            <?php } } ?>
        </div>

        <hr>
        <h2> <?php echo $data['commentsCount'] ; ?> Comments </h2>
        <br />
        <div class="view-comments">
            <?php if (!empty($data)) { ?>
            
            <?php foreach ($data['comments'] as $comment) { ?>

                <div class="comment-sender">
                    <?php echo $comment->comment_sender_email ; ?> 
                    <span class="time"><?php echo date('Y/m/d',$comment->time); ?></span>
                </div>
                <div class="view-comment">
                    <div class="vi-right" style="padding: 10px; font-size: 14px;">
                        <p>
                            <?php echo $comment->message; ?>
                        </p>
                    </div>
                </div>

            <?php } } ?>

        </div>
        
        <hr>
        <h2>Add Comment</h2>
        <br />
        <div id="successMessage"></div>

        <form id="commentForm" action="" method="POST">
            <div class="form-group">
                <input type="text" name="senderName" id="senderName" class="form-control" placeholder="Enter Your Name..." />
                <span id="errorName"></span>
            </div>
            <div class="form-group">
                <input type="email" name="senderEmail" id="senderEmail" class="form-control" placeholder="Enter Your Email..." />
                <span id="errorEmail"></span>
            </div>
            <div class="form-group">
                <textarea type="text" name="commentContent" id="commentContent" class="form-control" placeholder="Enter Comment...">
                </textarea>
                <span id="errorMessage"></span>
            </div>
            <div class="form-group">
                <input type="submit" name="submit" id="submit" class="btn btn-info" 
                value="Submit" />
            </div>
        </form>
        
    </div>
</div>

<script>

    $(document).ready(function(){

        $('#commentForm').on('submit', function(event){
            event.preventDefault();
            var formData = $(this).serialize();
            
            $.ajax({
                url: '<?php echo BASEURL; ?>/productController/addComment',
                method: 'POST',
                data: formData,
                dataType: 'JSON',
                success: function(data)
                {
                    if (data.errorName != '' || data.errorEmail != ''
                        || data.errorMessage != '')
                    {
                        $('#errorName').html(data.errorName);
                        $('#errorEmail').html(data.errorEmail);
                        $('#errorMessage').html(data.errorMessage);

                        $('#successMessage').empty(data.successMessage);
                    }
                    else
                    {
                        $('#commentForm')[0].reset(); 

                        $('#errorName').empty(data.errorName);
                        $('#errorEmail').empty(data.errorEmail);
                        $('#errorMessage').empty(data.errorMessage);

                        $('#successMessage').html(data.successMessage);
                    }

                }
            });

        });
    });

</script>