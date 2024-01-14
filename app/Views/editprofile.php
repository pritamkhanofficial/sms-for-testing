<?php
$session = session();
?>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <h4 class="card-title mb-3">Edit Profile</h4>
                <form action="<?= base_url('update_profile') ?>" method='POST' , enctype="multipart/form-data">
                    <input type="hidden" value="<?= $result['id'] ?>" name='id'>
                    <div class="mb-3 row">
                        <label for="" class="col-md-2 col-form-label">Full Name</label>
                        <div class="col-md-10">
                            <input class="form-control" type="text" value="<?= $result['full_name'] ?>"
                                name='full_name'>
                        </div>
                        <div class="text-danger">
                            <?php echo $session->getFlashdata('name_error'); ?>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="" class="col-md-2 col-form-label">Username</label>
                        <div class="col-md-10">
                            <input class="form-control" type="text" value="<?= $result['username'] ?>" name='username'>
                        </div>
                        <div class="text-danger">
                            <?php echo $session->getFlashdata('user_error'); ?>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="" class="col-md-2 col-form-label">Email</label>
                        <div class="col-md-10">
                            <input class="form-control" type="email" value="<?= $result['email'] ?>"
                                placeholder="Enter Email" name='email'>
                        </div>
                        <div class="text-danger">
                            <?php echo $session->getFlashdata('email_error'); ?>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="" class="col-md-2 col-form-label">Mobile</label>
                        <div class="col-md-10">
                            <input class="form-control" type="number" value="<?= $result['mobile'] ?>" name='mobile'>
                        </div>
                        <div class="text-danger">
                            <?php echo $session->getFlashdata('mobile_error'); ?>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="" class="col-md-2 col-form-label">Profile Pic</label>
                        <div class="col-md-10">
                            <input class="form-control" type="file" name='image'>
                        </div>
                        <div class="text-danger">
                            <?php echo $session->getFlashdata('image_error'); ?>
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