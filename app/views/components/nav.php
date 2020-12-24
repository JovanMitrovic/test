<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <?php if ($this->getSession('userID')){ ?>
  	<a class="navbar-brand" href="<?php echo BASEURL; ?>/productController">Administration</a>
  <?php } ?>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarColor01">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="<?php echo BASEURL; ?>/productController">Home
          <span class="sr-only">(current)</span>
        </a>
      </li>
	  <?php if (!$this->getSession('userID')) { ?>
      <!-- <li class="nav-item">
        <a class="nav-link" href="<?php echo BASEURL; ?>/accountController">Register</a>
      </li> -->
	  <?php } else { ?>
		<li class="nav-item">
        	<a class="nav-link" href="<?php echo BASEURL; ?>/productController/addProductForm">Add Product</a>
		  </li>
		  <li class="nav-item">
        	<a class="nav-link" href="<?php echo BASEURL; ?>/productController/commentsApprovalList">Comments Approval</a>
      	</li>
	  <?php } ?>
	</ul>
		<ul class="my-2 my-lg-0">
			<?php if ($this->getSession('userID')){ ?>
				<a href="<?php echo BASEURL; ?>/productController/logout" class="btn btn-success">Logout</a>
			<?php } else {?>
				<a href="<?php echo BASEURL; ?>/accountController/loginForm" class="btn btn-success">Admin Login</a>
			<?php } ?>
	  	</ul>
  </div>
</nav>
<!-- Close navbar -->