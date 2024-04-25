<!doctype html>
<html lang="en">


<!-- Mirrored from themesbrand.com/skote/layouts/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 03 May 2023 17:16:12 GMT -->

<head>

    <meta charset="utf-8" />
    <title>Dashboard | Skote - Admin & Dashboard Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />

    <?php
    echo view('includes/head');
    ?>

</head>

<body data-sidebar="dark" data-layout-mode="light">

    <!-- <body data-layout="horizontal" data-topbar="dark"> -->
    <?php $session = session(); ?>
    <!-- Begin page -->
    <div id="layout-wrapper">


        <?php
        echo view('includes/header');
        ?>

        <?php
        echo view('includes/sidebar');
        ?>

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">

            <div class="page-content">
                <div class="container-fluid">

                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                <h4 class="mb-sm-0 font-size-18">Dashboard</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboards</a></li>
                                        <li class="breadcrumb-item active">Dashboard</li>
                                    </ol>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- end page title -->
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

                                    <h4 class="card-title mb-3">Edit Subject</h4>
                                    <form action="<?= base_url('subject/update/' . $subject['id']) ?>" method='POST' ,
                                        enctype="multipart/form-data">

                                        <div class="mb-3 row">
                                            <label for="" class="col-md-2 col-form-label">Subject Name</label>
                                            <div class="col-md-10">
                                                <input class="form-control" type="text"
                                                    value="<?= $subject['subject_name'] ?>" name='sub_name'
                                                    placeholder="Enter Subject Name">
                                            </div>
                                            <div class="text-danger">
                                                <?php echo $session->getFlashdata('name_error'); ?>
                                            </div>
                                        </div>

                                        <div class="mb-3 row">
                                            <label for="" class="col-md-2 col-form-label">Subject Code</label>
                                            <div class="col-md-10">
                                                <input class="form-control" type="text"
                                                    value="<?= $subject['subject_code'] ?>" name='sub_code'
                                                    placeholder="Enter Subject Code">
                                            </div>
                                            <div class="text-danger">
                                                <?php echo $session->getFlashdata('code_error'); ?>
                                            </div>
                                        </div>

                                        <div class="mb-3 row">
                                            <label for="" class="col-md-2 col-form-label">Subject Type</label>
                                            <div class="col-md-10">
                                                <select name="sub_type" id="" class="form-control">
                                                    <option value="">--Select--</option>
                                                    <option value="theory" <?= $subject['subject_type'] == 'theory' ? 'selected' : '' ?>>Theory</option>
                                                    <option value="practical" <?= $subject['subject_type'] == 'practical' ? 'selected' : '' ?>>Practical</option>
                                                    <option value="mandatory" <?= $subject['subject_type'] == 'mandatory' ? 'selected' : '' ?>>Mandatory</option>
                                                </select>
                                            </div>
                                            <div class="text-danger">
                                                <?php echo $session->getFlashdata('type_error'); ?>
                                            </div>
                                        </div>


                                        <div class="row mb-3 text-center mt-4">
                                            <div>
                                                <button type="submit" class="btn btn-success">Update</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div> <!-- end col -->
                    </div>
                </div>
                <!-- container-fluid -->
            </div>
            <!-- End Page-content -->

            <?php
            echo view('includes/footer');
            ?>
        </div>
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->

    <!-- Right bar overlay-->
    <div class="rightbar-overlay"></div>

    <?php
    echo view('includes/script');
    ?>
</body>


<!-- Mirrored from themesbrand.com/skote/layouts/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 03 May 2023 17:16:54 GMT -->

</html>