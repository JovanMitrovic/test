<table id="product" class="table table-striped table-bordered" style="width:100%">
    <thead>
        <tr>
            <th>Message Sender Name</th>
            <th>Message Sender Email</th>
            <th>Comments</th>
            <th>Approved</th>
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($data)) { ?>
        
        <?php foreach ($data as $comment) { ?>
            
            <tr>
                <td><?php echo $comment->comment_sender_name; ?></td>
                <td><?php echo $comment->comment_sender_email; ?></td>
                <td><?php echo $comment->message; ?></td>
                <td>
                    <select class="approve" id="approve--<?php echo $comment->id ?>" style="width: 130px;">
                        <option <?php if ($comment->approve == 'y') { echo 'selected'; } ?> value="y">y</option>
                        <option <?php if ($comment->approve == 'n') { echo 'selected'; } ?> value="n">n</option>
                    </select>
                </td>
            </tr>

        <?php } } ?>

    </tbody>
</table> 

<script>

    $(document).ready(function(){

        $('.approve').on('change', function(event){

            var approval = $(this).val();
            var commentID = $(this).attr('id').split('--')[1];

            $.ajax({
                url: '<?php echo BASEURL; ?>/productController/commentApprove',
                method: 'POST',
                data: { 
                        commentID: commentID,
                        approvalValue: approval
                    },
                dataType: 'JSON',
                success: function(data)
                {
                    return true;
                }
            });

        });
        
    });

</script>