
<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-3">
    <div class="container">
    <a class="navbar-brand" href="<?php echo URLROOT; ?>/pages">TixGurus</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item">
          <a class="nav-link" href="<?php echo URLROOT; ?>/pages">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo URLROOT; ?>/pages/categories">All Categories</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo URLROOT; ?>/pages/cart/<?php echo $_SESSION['member_id']; ?>">Cart</a>
      </ul>
      <ul class="navbar-nav ml-auto">
      <?php if(isset($_SESSION['member_id'])) : ?>
       <li class="nav-item">
         <a class="nav-link" href="#">Welcome <?php echo $_SESSION['member_name']; ?></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo URLROOT; ?>/users/logout">Logout</a>
      </li>
      <?php else : ?>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo URLROOT; ?>/users/register">Register</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo URLROOT; ?>/users/login">Login</a>
      </li>
      <?php endif; ?>
    </ul>
      <form class="form-inline mt-2 mt-md-0">
        <input class="form-control mr-sm-2" type="text" name="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
      </form>
    </div>
    </div>
  </nav>
