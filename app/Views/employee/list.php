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
                        <div class="col-xl-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Employee List</h4>

                                    <div class="table-responsive">
                                        <table class="table mb-0">

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
                                                            <a class="btn btn-outline-secondary btn-sm edit" href="<?= base_url('back-panel/employee/edit/'. $val->id)?>" title="Edit">
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
    <script>
        $('.dropify').dropify();
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/additional-methods.min.js"></script>
    <script>
        $('#employeeForm').validate({
            rules: {
                role_id: {
                    required: true
                },
                joining_date: {
                    required: true
                },
                designation_id: {
                    required: true
                },
                department_id: {
                    required: true
                },
                qualification: {
                    required: true
                },
                name: {
                    required: true
                },
                gender: {
                    required: true
                },
                religion: {
                    required: true
                },
                blood_group: {
                    required: true
                },
                date_of_birth: {
                    required: true
                },
                mobile: {
                    required: true,
                    number: true,
                    minlength: 10,
                    maxlength: 10
                },
                present_address: {
                    required: true
                },
                permanent_address: {
                    required: true
                },
                email: {
                    required: true
                },
                password: {
                    required: true
                },
                confirm_password: {
                    required: true,
                    equalTo: "#password"
                },
            },
            messages: {
                role_id: "please select role",
                joining_date: {
                    required: "please select joining date"
                },
                designation_id: {
                    required: "please select role",
                },
                department_id: {
                    required: "please select department"
                },
                qualification: {
                    required: "please enter qualification"
                },
                name: {
                    required: "please enter name"
                },
                gender: {
                    required: "please select gender"
                },
                religion: {
                    required: "please enter religion"
                },
                blood_group: {
                    required: "please select blood_group"
                },
                date_of_birth: {
                    required: "please select blood_group"
                },
                mobile: {
                    required: "please enter phone number",
                    number: "Phone number must be numeric",
                    minlength: "Phone number must be 10 digit",
                    maxlength: "Phone number must be 10 digit"
                },
                present_address: {
                    required: "please enter present address"
                },
                permanent_address: {
                    required: "please enter permanent address"
                },
                email: {
                    required: "please enter email"
                },
                password: {
                    required: "please enter password"
                },
                confirm_password: {
                    required: "please re-enter password"
                },

            },
        });

        $("#employeeForm").ajaxForm({
            beforeSubmit: function() {
                var valid = $('#employeeForm').valid();
                if (valid) {
                    buttonLoader('start')
                    return valid;
                }
            },
            success: function() {
                alert('Successfully registerd....')
                // swAlert(response)
                $('#employeeForm')[0].reset();
                buttonLoader('stop')
            }
        });
    </script>
</body>

</html>