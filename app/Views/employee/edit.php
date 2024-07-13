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
                <div id="layout-wrapper">
                    <?php if (1 == 2) { ?>
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="card overflow-hidden">
                                    <div class="bg-primary bg-soft">
                                        <div class="row">
                                            <div class="col-7">
                                                <div class="text-primary p-3">
                                                    <h5 class="text-primary">Welcome Back !</h5>
                                                    <p>It will seem like simplified</p>
                                                </div>
                                            </div>
                                            <div class="col-5 align-self-end">
                                                <img src="assets/images/profile-img.png" alt="" class="img-fluid">
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                    if (!empty($list)) {
                                        foreach ($list as $data) {
                                    ?>
                                            <div class="card-body pt-0">
                                                <div class="row">
                                                    <div class="col-sm-4">
                                                        <div class="avatar-md profile-user-wid mb-4">
                                                            <img src="<?= base_url('get-file/' . $data->photo); ?>" alt="" class="img-thumbnail rounded-circle">
                                                        </div>
                                                        <h5 class="font-size-15 text-truncate"><?= $data->name; ?></h5>
                                                        <p class="text-muted mb-0 text-truncate"><?= $data->qualification; ?></p>
                                                    </div>

                                                    <div class="col-sm-8">
                                                        <div class="pt-4">

                                                            <div class="row">
                                                                <div class="col-6">
                                                                    <h5 class="font-size-15">125</h5>
                                                                    <p class="text-muted mb-0">Projects</p>
                                                                </div>
                                                                <div class="col-6">
                                                                    <h5 class="font-size-15">$1245</h5>
                                                                    <p class="text-muted mb-0">Revenue</p>
                                                                </div>
                                                            </div>
                                                            <div class="mt-4">
                                                                <a href="javascript: void(0);" class="btn btn-primary waves-effect waves-light btn-sm">View Profile <i class="mdi mdi-arrow-right ms-1"></i></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                    <?php
                                        }
                                    }
                                    ?>
                                </div>
                                <!-- end card -->
                            </div>
                        </div>
                    <?php } ?>

                    <div class="row">
                        <div class="col-xl-12">

                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title mb-4">Employee Details</h4>
                                    <div class="accordion" id="accordionExample">
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="headingOne">
                                                <button class="accordion-button fw-medium" type="button" data-bs-toggle="collapse" data-bs-target="#basic-details" aria-expanded="true" aria-controls="basic-details">
                                                    Basic Details
                                                </button>
                                            </h2>
                                            <div id="basic-details" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                                <div class="accordion-body">
                                                    <div class=" container ">
                                                        <div class="row">
                                                        <form action="" method="post">
                                                        <div class="row">
                                                <div class="col-md-4">
                                                    <div class="mb-3">
                                                        <label for="role_id" class="form-label required">Role</label>
                                                        <select id="role_id" name="role_id" class="form-select">
                                                            <option value="" selected>Choose...</option>
                                                            <?php if (!empty($Role)) foreach ($Role as $Role) : ?>
                                                            <option value="<?= $Role->id; ?>"><?= $Role->display_name; ?>
                                                            </option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="mb-3">
                                                        <label for="formrow-joiningDate-input" class="from-label required">Joining Date</label>
                                                        <input type="date" class="form-control" name="joining_date"
                                                            id="joining_date" placeholder="Enter Your Joining Date">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="mb-3">
                                                        <!-- <label for="designation_id" class="form-label required">Designation</label> -->
                                                        <label for="gesignation">ok</label>
                                                        <select id="designation_id" name="designation_id"
                                                            class="form-select">
                                                            <option value="" selected>Choose...</option>
                                                            <?php if (!empty($Designation)) foreach ($Designation as $desig) : ?>
                                                            <option value="<?= $desig->id; ?>"><?= $desig->label; ?>
                                                            </option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="department_id" class="form-label required">Department</label>
                                                        <select id="department_id" name="department_id" class="form-select">
                                                            <option value="" selected>Choose...</option>
                                                            <?php if (!empty($Department)) foreach ($Department as $depart) : ?>
                                                            <option value="<?= $depart->id; ?>"><?= $depart->label; ?>
                                                            </option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="qualification" class="from-label required">Qualification</label>
                                                        <input type="text" class="form-control" id="qualification"
                                                            name="qualification" placeholder="Enter Your Qualification">
                                                    </div>
                                                </div>
                                            </div>                                                                 
                                                        </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="headingTwo">
                                                <button class="accordion-button fw-medium collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                    Accordion Item #2
                                                </button>
                                            </h2>
                                            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                                <div class="accordion-body">
                                                    <div class="text-muted">
                                                        <strong class="text-dark">This is the second item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="headingThree">
                                                <button class="accordion-button fw-medium collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                    Accordion Item #3
                                                </button>
                                            </h2>
                                            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                                <div class="accordion-body">
                                                    <div class="text-muted">
                                                        <strong class="text-dark">This is the third item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
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