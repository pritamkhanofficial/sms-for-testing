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

                    <div class="row">
                        <div class="col-xl-4">
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
                                <div class="card-body pt-0">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="avatar-md profile-user-wid mb-4">
                                                <img src="assets/images/users/avatar-1.jpg" alt="" class="img-thumbnail rounded-circle">
                                            </div>
                                            <h5 class="font-size-15 text-truncate">Cynthia Price</h5>
                                            <p class="text-muted mb-0 text-truncate">UI/UX Designer</p>
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
                            </div>
                            <!-- end card -->

                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title mb-4">Personal Information</h4>

                                    <p class="text-muted mb-4">Hi I'm Cynthia Price,has been the industry's standard dummy text To an English person, it will seem like simplified English, as a skeptical Cambridge.</p>
                                    <div class="table-responsive">
                                        <table class="table table-nowrap mb-0">
                                            <tbody>
                                                <tr>
                                                    <th scope="row">Full Name :</th>
                                                    <td>Cynthia Price</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Mobile :</th>
                                                    <td>(123) 123 1234</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">E-mail :</th>
                                                    <td>cynthiaskote@gmail.com</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Location :</th>
                                                    <td>California, United States</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!-- end card -->

                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title mb-5">Experience</h4>
                                    <div class="">
                                        <ul class="verti-timeline list-unstyled">
                                            <li class="event-list active">
                                                <div class="event-timeline-dot">
                                                    <i class="bx bx-right-arrow-circle bx-fade-right"></i>
                                                </div>
                                                <div class="d-flex">
                                                    <div class="flex-shrink-0 me-3">
                                                        <i class="bx bx-server h4 text-primary"></i>
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <div>
                                                            <h5 class="font-size-15"><a href="javascript: void(0);" class="text-dark">Back end Developer</a></h5>
                                                            <span class="text-primary">2016 - 19</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="event-list">
                                                <div class="event-timeline-dot">
                                                    <i class="bx bx-right-arrow-circle"></i>
                                                </div>
                                                <div class="d-flex">
                                                    <div class="flex-shrink-0 me-3">
                                                        <i class="bx bx-code h4 text-primary"></i>
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <div>
                                                            <h5 class="font-size-15"><a href="javascript: void(0);" class="text-dark">Front end Developer</a></h5>
                                                            <span class="text-primary">2013 - 16</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="event-list">
                                                <div class="event-timeline-dot">
                                                    <i class="bx bx-right-arrow-circle"></i>
                                                </div>
                                                <div class="d-flex">
                                                    <div class="flex-shrink-0 me-3">
                                                        <i class="bx bx-edit h4 text-primary"></i>
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <div>
                                                            <h5 class="font-size-15"><a href="javascript: void(0);" class="text-dark">UI /UX Designer</a></h5>
                                                            <span class="text-primary">2011 - 13</span>

                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>

                                </div>
                            </div>
                            <!-- end card -->
                        </div>

                        <div class="col-xl-8">

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="card mini-stats-wid">
                                        <div class="card-body">
                                            <div class="d-flex">
                                                <div class="flex-grow-1">
                                                    <p class="text-muted fw-medium mb-2">Completed Projects</p>
                                                    <h4 class="mb-0">125</h4>
                                                </div>

                                                <div class="flex-shrink-0 align-self-center">
                                                    <div class="mini-stat-icon avatar-sm rounded-circle bg-primary">
                                                        <span class="avatar-title">
                                                            <i class="bx bx-check-circle font-size-24"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card mini-stats-wid">
                                        <div class="card-body">
                                            <div class="d-flex">
                                                <div class="flex-grow-1">
                                                    <p class="text-muted fw-medium mb-2">Pending Projects</p>
                                                    <h4 class="mb-0">12</h4>
                                                </div>

                                                <div class="flex-shrink-0 align-self-center">
                                                    <div class="avatar-sm mini-stat-icon rounded-circle bg-primary">
                                                        <span class="avatar-title">
                                                            <i class="bx bx-hourglass font-size-24"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card mini-stats-wid">
                                        <div class="card-body">
                                            <div class="d-flex">
                                                <div class="flex-grow-1">
                                                    <p class="text-muted fw-medium mb-2">Total Revenue</p>
                                                    <h4 class="mb-0">$36,524</h4>
                                                </div>

                                                <div class="flex-shrink-0 align-self-center">
                                                    <div class="avatar-sm mini-stat-icon rounded-circle bg-primary">
                                                        <span class="avatar-title">
                                                            <i class="bx bx-package font-size-24"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title mb-0">Accordion</h4>

                                        <div class="row">
                                            <div class="col-xl-12">
                                                <div class="mt-4">
                                                    <h5 class="font-size-14">Example</h5>
                                                    <p class="card-title-desc">Click the accordions below to expand/collapse the accordion content.</p>

                                                    <div class="accordion" id="accordionExample">
                                                        <div class="accordion-item">
                                                            <h2 class="accordion-header" id="headingOne">
                                                                <button class="accordion-button fw-medium" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                                Accordion Item #1
                                                                </button>
                                                            </h2>
                                                            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                                                <div class="accordion-body">
                                                                    <div class="text-muted">
                                                                        <strong class="text-dark">This is the first item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
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
                                                    <!-- end accordion -->
                                                </div>
                                            </div>
                                            <!-- end col -->
                                            <!-- end col -->
                                        </div>
                                        <!-- end row -->
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