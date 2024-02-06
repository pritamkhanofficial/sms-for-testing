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
                                    <div class="row">
                                        <div class="col-md-6">
                                            <h4 class="card-title">View Class</h4>
                                        </div>

                                        <div class="col-md-6 d-flex justify-content-end mb-2">
                                            <a class="btn btn-success btn-md" href="<?= base_url('class/add') ?>"><i
                                                    class="fas fa-plus"></i>
                                                Add</a>
                                        </div>
                                    </div>


                                    <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                                        <thead>
                                            <tr>
                                                <th>Sl. No</th>
                                                <th>Class Name</th>
                                                <th>Numeric Name</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>


                                        <tbody>
                                            <?php
                                            $i = 1;
                                            foreach ($classes as $class) {
                                                ?>
                                                <tr>
                                                    <td>
                                                        <?= $i ?>
                                                    </td>
                                                    <td>
                                                        <?= $class['class_name'] ?>
                                                    </td>
                                                    <td>
                                                        <?= $class['numeric_name'] ?>
                                                    </td>
                                                    <td>
                                                        <a href="<?= base_url('class/edit/' . $class['id']) ?>"
                                                            class="btn btn-success">Edit</a>
                                                        <a href="<?= base_url('class/delete/' . $class['id']) ?>"
                                                            class="btn btn-danger">Delete</a>
                                                    </td>
                                                </tr>
                                                <?php
                                            }
                                            $i++;
                                            ?>
                                        </tbody>
                                    </table>

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