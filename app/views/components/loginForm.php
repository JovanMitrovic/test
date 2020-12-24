<?php echo $this->flash('accountCreated', 'alert alert-success'); ?>
<h2>Admin Login</h2>
<form action="<?php echo BASEURL; ?>/accountController/userLogin" method="POST">
    <div class="form-group">
        <input type="email" name="email" class="form-control" placeholder="Email..."
        value="<?php 
                if (!empty($data['email']))
                {
                    echo $data['email'];
                } 
            ?>">
        <div class="error">
            <?php if (!empty($data['emailError'])) 
                {
                    echo $data['emailError'];
                }
            ?>
        </div>
    </div>
    <div class="form-group">
        <input type="password" name="password" class="form-control" placeholder="Password..."
        value="<?php 
                if (!empty($data['password']))
                {
                    echo $data['password'];
                } 
            ?>">
        <div class="error">
            <?php if (!empty($data['passwordError'])) 
                {
                    echo $data['passwordError'];
                }
            ?>
        </div>
    </div>
    <div class="form-group">
        <input type="submit" name="loginBtn" class="btn btn-primary"
        value="Login">
    </div>
    <!-- Close form-group -->
</form>