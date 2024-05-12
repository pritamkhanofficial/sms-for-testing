<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    <title>Dashboard | Skote - Admin & Dashboard Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />

    <?php
    echo view('component/back/head');
    ?>

</head>

<body data-sidebar="dark" data-layout-mode="light">

    <!-- <body data-layout="horizontal" data-topbar="dark"> -->
    <!-- Begin page -->
    <div id="layout-wrapper">


        <?php
        echo view('component/back/header');
        ?>

        <?php
        echo view('component/back/sidebar');
        ?>

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">

            <div class="page-content">
                <div class="container-fluid">

                   
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12 mb-2">
                                            <a class="btn btn-success btn-sm" href="<?= base_url('back-panel/master/subject-allocation-add') ?>"><i
                                                    class="fas fa-plus"></i> Add</a>
                                        </div>
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
                                            foreach ($subjectList as $key=>$row) {
                                                ?>
                                            <tr>
                                                <td>
                                                    <?= ++$key ?>
                                                </td>
                                                <td>
                                                    <?= $row->class_name ?>
                                                </td>

                                                <td>
                                                    <?= $row->section_name ?>
                                                </td>

                                                <td>
                                                <?= $row->subjects ?>
                                                </td>

                                                <td>
                                                    <!-- <a href="< ?= base_url('subject/edit/' . $data['id']) ?>"
                                                        class="btn btn-success">Edit</a> -->
                                                    <!-- <a href="< ?= base_url('subject/delete/' . $data['id']) ?>"
                                                        class="btn btn-danger"
                                                        onclick="return confirm('Do You Want to Delete?');">Delete</a> -->
                                                </td>
                                            </tr>
                                            <?php
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
            echo view('component/back/footer');
            ?>
        </div>
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->

    <!-- Right bar overlay-->
    <div class="rightbar-overlay"></div>

    <?php
    echo view('component/back/script');
    ?>
</body>


<!-- Mirrored from themesbrand.com/skote/layouts/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 03 May 2023 17:16:54 GMT -->

</html>