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
                                                    <button class="btn btn-success btn-sm" data-class_id = "<?=$row->class_id?>" data-section_id = "<?=$row->section_id?>"><i class="fas fa-edit"></i></button>
                                                     <button class="btn btn-primary btn-sm" data-class_id = "<?=$row->class_id?>" data-section_id = "<?=$row->section_id?>"><i class="fas fa-user-tie"></i></a>
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

</html>