<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    <title>Dashboard | Skote - Admin & Dashboard Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />

    <?php echo view('component/back/head'); ?>

</head>

<body data-sidebar="dark" data-layout-mode="light">

    <!-- <body data-layout="horizontal" data-topbar="dark"> -->
    <!-- Begin page -->
    <div id="layout-wrapper">


        <?php echo view('component/back/header'); ?>

        <?php echo view('component/back/sidebar'); ?>

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">

            <div class="page-content">
                <div class="container-fluid">
                    <?php echo view('component/back/breadcrumb'); ?>
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Employee List</h4>

                                    <div class="table-responsive">
                                        <table class="table table-bordered dt-responsive  nowrap w-100" id="datatable">

                                            <thead class="table-light">
                                                <tr>
                                                    <th>Sl/No</th>
                                                    <th>Name</th>
                                                    <th>Role</th>
                                                    <th>Department</th>
                                                    <th>Joining Date</th>
                                                    <th>Profile Picture</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                if ($list) {
                                                    $i = 0;
                                                    foreach ($list as $val) {
                                                        $i++
                                                ?>
                                                        <tr>
                                                            <th scope="row"><?= $i; ?></th>
                                                            <td><?= $val->name; ?></td>
                                                            <td><?= $val->role_name; ?></td>
                                                            <td><?= $val->department; ?></td>
                                                            <td><?= $val->joining_date; ?></td>
                                                            <td><img src="<?= base_url('get-file/' . $val->photo); ?>" height="50" width="50" alt=""></td>
                                                            <td style="width: 100px">
                                                                <a class="btn btn-outline-secondary btn-sm edit" href="<?= base_url('back-panel/employee/edit/' . $val->id) ?>" title="Edit">
                                                                    <i class="fas fa-pencil-alt"></i>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                <?php
                                                    }
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- container-fluid -->
            </div>
            <!-- End Page-content -->

            <?php echo view('component/back/footer'); ?>
        </div>
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->
    <?php echo view('component/back/script'); ?>

    <script>
        $(document).ready(function() {
            $("#datatable").DataTable()
            /* $("#datatable-buttons").DataTable({
                lengthChange: !1,
                buttons: ["copy", "excel", "pdf", "colvis"]
            }).buttons().container().appendTo("#datatable-buttons_wrapper .col-md-6:eq(0)"), $(".dataTables_length select").addClass("form-select form-select-sm") */
        });
    </script>
</body>

</html>