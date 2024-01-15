<?php
$session = session();
?>

<div class="row">
    <div class="col-12">
        <div class="card">
            <?php if ($session->has('success')) { ?>
                <div class="alert alert-success" role="alert">
                    <?php echo session('success'); ?>
                </div>
            <?php } else if ($session->has('error')) { ?>
                    <div class="alert alert-danger" role="alert">
                    <?php echo session('error'); ?>
                    </div>
            <?php } ?>
            <div class="card-body">

                <h4 class="card-title mb-3">Change Password</h4>
                <form action="<?= base_url('setnewpass') ?>" method='POST' , enctype="multipart/form-data">
                    <div class="mb-3 row">
                        <label for="" class="col-md-2 col-form-label">Password</label>
                        <div class="col-md-10">
                            <input class="form-control" type="text" value="" name='password'
                                placeholder="Enter Old Password.">
                        </div>
                        <div class="text-danger">
                            <?php echo $session->getFlashdata('pass_error'); ?>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="" class="col-md-2 col-form-label">New Password</label>
                        <div class="col-md-10">
                            <input class="form-control" type="password" value="" name='new_password'
                                placeholder="Enter New Password.">
                        </div>
                        <div class="text-danger">
                            <?php echo $session->getFlashdata('new_error'); ?>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="" class="col-md-2 col-form-label">Confirm Password</label>
                        <div class="col-md-10">
                            <input class="form-control" type="password" value="" name='confirm_pass'
                                placeholder="Cofirm Your Password.">
                        </div>
                        <div class="text-danger">
                            <?php echo $session->getFlashdata('confirm_error'); ?>
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