<?php
$session = session();
?>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <h4 class="card-title mb-3">Change Password</h4>
                <form action="<?= base_url('update_profile') ?>" method='POST' , enctype="multipart/form-data">
                    <div class="mb-3 row">
                        <label for="" class="col-md-2 col-form-label">Password</label>
                        <div class="col-md-10">
                            <input class="form-control" type="text" value=""
                                name='password'>
                        </div>
                        <div class="text-danger">
                            <?php echo $session->getFlashdata('name_error'); ?>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="" class="col-md-2 col-form-label">New Password</label>
                        <div class="col-md-10">
                            <input class="form-control" type="text" value="" name='new_password'>
                        </div>
                        <div class="text-danger">
                            <?php echo $session->getFlashdata('user_error'); ?>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="" class="col-md-2 col-form-label">Confirm Password</label>
                        <div class="col-md-10">
                            <input class="form-control" type="text" value="" name='confirm_pass'>
                        </div>
                        <div class="text-danger">
                            <?php echo $session->getFlashdata('email_error'); ?>
                        </div>
                    </div>

                    
                    <div class="row mb-3 text-center mt-4">
                        <div>
                            <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div> <!-- end col -->
</div>