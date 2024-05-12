<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    <title>Dashboard | Skote - Admin & Dashboard Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />

    <?php
    echo view('component/head');
    ?>

</head>

<body data-sidebar="dark" data-layout-mode="light">

    <!-- <body data-layout="horizontal" data-topbar="dark"> -->
    <!-- Begin page -->
    <div id="layout-wrapper">


        <?php
        echo view('component/header');
        ?>

        <?php
        echo view('component/sidebar');
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
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <h4 class="card-title">View Subject</h4>
                                        </div>

                                        <!-- <div class="col-md-6 d-flex justify-content-end mb-2">
                                            <a class="btn btn-success btn-md" href="< ?= base_url('subject/add') ?>"><i
                                                    class="fas fa-plus"></i>Add</a>
                                        </div> -->
                                    </div>
                                    <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                                        <thead>
                                            <tr>
                                                <th>Sl. No</th>
                                                <th>Class</th>
                                                <th>Section</th>
                                                <th>Subject</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>


                                        <tbody>
                                            <?php
                                            $i = 1;
                                            foreach ($subjects as $data) {
                                                ?>
                                            <tr>
                                                <td>
                                                    <?= $i ?>
                                                </td>
                                                <td>
                                                    <?= $data['subject_name'] ?>
                                                </td>

                                                <td>
                                                    <?= $data['subject_code'] ?>
                                                </td>

                                                <td>
                                                    <?php if ($data['subject_type'] == 'theory') {
                                                            echo 'Theory';
                                                        } else if ($data['subject_type'] == 'practical') {
                                                            echo 'Practical';
                                                        } else if ($data['subject_type'] == 'mandatory') {
                                                            echo 'Mandatory';
                                                        } else {
                                                            echo $data['subject_type'];
                                                        } ?>
                                                </td>

                                                <td>
                                                    <a href="<?= base_url('subject/edit/' . $data['id']) ?>"
                                                        class="btn btn-success">Edit</a>
                                                    <a href="<?= base_url('subject/delete/' . $data['id']) ?>"
                                                        class="btn btn-danger"
                                                        onclick="return confirm('Do You Want to Delete?');">Delete</a>
                                                </td>
                                            </tr>
                                            <?php
                                                $i++;
                                            }

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
            echo view('component/footer');
            ?>
        </div>
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->

    <!-- Right bar overlay-->
    <div class="rightbar-overlay"></div>

    <?php
    echo view('component/script');
    ?>
</body>


<!-- Mirrored from themesbrand.com/skote/layouts/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 03 May 2023 17:16:54 GMT -->

</html>