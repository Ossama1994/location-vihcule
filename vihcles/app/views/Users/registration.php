<?php include '../app/views/inc/header.php'; ?>
<div class="container register-form">
            <div class="form">
                <div class="note">
                    <p>Regiter Now</p>
                </div>
             <form action="<?php echo URL_ROOT; ?>/Admin/registration" method="post">
                <div class="form-content bg-light">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" class="form-control" name="full_name"  placeholder="Your Name *" value=""/>
                                <?php echo $data['name_err'] ?>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="email" placeholder="Phone Email *" value=""/>
                                 <?php echo $data['email_err'] ?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="password" class="form-control" name="password" placeholder="Your Password *" value=""/>
                                <?php echo $data['password_err'] ?>
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" name="Confirm_Password" placeholder="Confirm_Password *" value=""/>
                              <?php  $data['confirm_password_err'] ?>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btnSubmit" name="submit">Submit</button>
                </div>
            </div>
            </form>
        </div>
<?php include '../app/views/inc/footer.php'; ?>