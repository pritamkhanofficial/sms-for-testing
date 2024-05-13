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

                                    <h4 class="card-title mb-3"> Add Employee</h4>
                                    <form action="" method="POST" id="">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="mb-3">
                                                    <label for="formrow-role-input" class="form-label">Role</label>
                                                    <select id="formrow-inputState" class="form-select">
                                                        <option selected>Choose...</option>
                                                        <?php if (!empty($Role)) foreach ($Role as $Role) : ?>
                                                        <option value="<?= $Role->display_name;?>"><?= $Role->display_name;?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="mb-3">
                                                    <label for="formrow-joiningDate-input" class="from-label">Joining Date</label>
                                                    <input type="date" class="form-control" id="formrow-joiningDate-input" placeholder="Enter Your Joining Date">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="mb-3">
                                                    <label for="formrow-role-input" class="form-label">Designation</label>
                                                    <select id="formrow-inputState" class="form-select">
                                                        <option selected>Choose...</option>
                                                        <?php if (!empty($Designation)) foreach ($Designation as $desig) : ?>
                                                            <option value="<?= $desig->label; ?>"><?= $desig->label; ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="formrow-role-input" class="form-label">Department</label>
                                                    <select id="formrow-inputState" class="form-select">
                                                        <option selected>Choose...</option>
                                                        <?php if (!empty($Department)) foreach ($Department as $depart) : ?>
                                                            <option value="<?= $depart->label; ?>"><?= $depart->label; ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="formrow-joiningDate-input" class="from-label">Qualification</label>
                                                    <input type="text" class="form-control" id="formrow-joiningDate-input" placeholder="Enter Your Qualification">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">

                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="formrow-email-input" class="form-label">Name</label>
                                                    <input type="text" class="form-control" id="formrow-name-input" placeholder="Name Your Email ID">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="formrow-role-input" class="form-label">Gender</label>
                                                    <select id="formrow-gender" class="form-select">
                                                        <option selected>Choose...</option>
                                                        <option value="male">Male</option>
                                                        <option value="female">female</option>
                                                        <option value="others">others</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-4">
                                                <div class="mb-3">
                                                    <label for="formrow-religion" class="form-label">Religion</label>
                                                    <input type="text" class="form-control" id="formrow-religion" placeholder="Enter Your Religion">
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="mb-3">
                                                    <label for="formrow-blood-group" class="form-label">Blood group</label>
                                                    <select id="formrow-blood-group" class="form-select">
                                                        <option selected>Choose...</option>
                                                        <option value="O+">O+</option>
                                                        <option value="O-">O-</option>
                                                        <option value="A+">A+</option>
                                                        <option value="A-">A-</option>
                                                        <option value="B+">B+</option>
                                                        <option value="B-">B-</option>
                                                        <option value="AB+">AB+</option>
                                                        <option value="AB-">AB-</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-lg-4">
                                                <div class="mb-3">
                                                    <label for="formrow-date-of-birth" class="form-label">Date Of Birth </label>
                                                    <input type="date" class="form-control" id="formrow-date-of-birth">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="mb-3">
                                                    <label for="formrow-mobile" class="form-label">Mobile No</label>
                                                    <input type="number" class="form-control" id="formrow-mobile" placeholder="Enter Your Mobile Number">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="present-address">Present Address </label>
                                                    <textarea id="present-address" class="form-control" rows="3" placeholder="Enter Your Present Address "></textarea>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="permanent-address">Permanent Address</label>
                                                    <textarea id="permanent-address" class="form-control" rows="3" placeholder="Enter Your Permanent Address"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="mb-3">
                                                    <label for="profile_picture" class="form-label">Profile Picture</label>
                                                    <input type="file" class="form-control dropify" id="profile_picture" name="profile_picture" placeholder="Enter Your Email">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="formrow-email" class="form-label">Email</label>
                                                    <input type="email" class="form-control" id="formrow-email" placeholder="Enter Your Email">
                                                </div>
                                            </div>
                                            <div class="col-lg-3">
                                                <div class="mb-3">
                                                    <label for="formrow-password" class="form-label">Password</label>
                                                    <input type="password" class="form-control" id="formrow-password" placeholder="Enter Your Password">
                                                </div>
                                            </div>
                                            <div class="col-lg-3">
                                                <div class="mb-3">
                                                    <label for="formrow-retype-password" class="form-label">Retype Password</label>
                                                    <input type="password" class="form-control" id="formrow-retype-password" placeholder="Re-enter Your Password">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="mb-3">

                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="gridCheck">
                                                <label class="form-check-label" for="gridCheck">
                                                    Check me out
                                                </label>
                                            </div>
                                        </div>
                                        <div>
                                            <button type="submit" class="btn btn-primary w-md">Submit</button>
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
    <script>
        $(document).ready(function() {
            $('form').submit(function(event) {
                event.preventDefault();
                var formData = $(this).serialize();
                $.ajax({
                    type: 'POST',
                    // url:
                });
            });
        });
    </script>
</body>

</html>