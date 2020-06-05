<?php require APPROOT . '/views/inc/header.php'; ?>
  <div class="row">
    <div class="col-md-6 mx-auto">
      <div class="card card-body bg-light mt-5">
        <h2>Create An Account For $45 a year</h2>
        <p>Please fill out this form to register with us</p>
        <form action="<?php echo URLROOT ; ?>/users/register" method="post">
          <div class="form-group">
            <label for="member_name">Name: <sup>*</sup></label>
            <input type="text" name="member_name" class="form-control form-control-lg <?php echo (!empty($data['name_err'])) ? 'is-invalid' : '';?>" value="<?php echo $data['member_name']; ?>">
            <span class="invalid-feedback"><?php echo $data['name_err']; ?></span>
          </div>
          
          <div class="form-group">
            <label for="member_email">Email: <sup>*</sup></label>
            <input type="email" name="member_email" class="form-control form-control-lg <?php echo (!empty($data['email_err'])) ? 'is-invalid' : '';?>" value="<?php echo $data['member_email']; ?>">
            <span class="invalid-feedback"><?php echo $data['email_err']; ?></span>
          </div>
          
          <div class="form-group">
            <label for="member_phone">Mobile Phone Number:</label>
            <input type="tel" pattern="[0-9]{4}[0-9]{3}[0-9]{3}" name="member_phone" class="form-control form-control-lg" value="<?php echo $data['member_phone']; ?>"><small>
          </div>
          
          <div class="form-group">
            <label for="member_dob">Date Of Birth: <sup>*</sup></label>
            <input type="date" name="member_dob" class="form-control form-control-lg <?php echo (!empty($data['dob_err'])) ? 'is-invalid' : '';?>" value="<?php echo $data['member_dob']; ?>">
            <span class="invalid-feedback"><?php echo $data['dob_err']; ?></span>
          </div>
          
          <div class="form-group">
            <label for="confirm_password">Password: <sup>*</sup></label>
            <input type="password" name="member_password" class="form-control form-control-lg <?php echo (!empty($data['password_err'])) ? 'is-invalid' : '';?>" value="<?php echo $data['member_password']; ?>">
            <span class="invalid-feedback"><?php echo $data['password_err']; ?></span>
          </div>
          
          <div class="form-group">
            <label for="confirm_password">Confirm Password <sup>*</sup></label>
            <input type="password" name="confirm_password" class="form-control form-control-lg <?php echo (!empty($data['confirm_password_err'])) ? 'is-invalid' : '';?>" value="<?php echo $data['confirm_password']; ?>">
            <span class="invalid-feedback"><?php echo $data['confirm_password_err']; ?></span>
          </div>
          
          <div class="row">
            <div class="col">
              <input type="submit" value="Register" class="btn btn-success btn-block" onClick="myFunction()">
            </div>
            <div class="col">
              <a href="<?php echo URLROOT; ?>/users/login" class="btn btn-light btn-block">Have an account? login</a>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
<?php require APPROOT . '/views/inc/footer.php'; ?>
    
    <script>
function myFunction() {
  var myWindow = window.open("https://www.paypal.com/au/home", "", "width=800,height=600");
}
</script>
