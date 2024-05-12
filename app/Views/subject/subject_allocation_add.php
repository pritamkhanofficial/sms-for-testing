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

                    <!-- start page title -->
                    <!-- <div class="row">
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
                    </div> -->
                    <!-- end page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">

                                    <h4 class="card-title mb-3">Subject Allocation</h4>
                                    <form action="" method="POST">

                                        <div class="mb-3 row">
                                            <label for="class_id" class="col-md-2 col-form-label">Class</label>
                                            <div class="col-md-10">
                                                <select name="class_id" id="class_id" onchange="getSection(this.value)" class="form-select select2">
                                                    <option value="">--Select--</option>
                                                    <?php foreach($class as $row){ ?>
                                                    <option value="<?=$row->id?>"><?=$row->class_name?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="mb-3 row">
                                            <label for="section_id" class="col-md-2 col-form-label">Section</label>
                                            <div class="col-md-10">
                                                <select name="section_id" id="section_id" class="form-select">
                                                    <option value="">-- Select Class First --</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="mb-3 row">
                                            <label for="subject_id" class="col-md-2 col-form-label">Subject</label>
                                            <div class="col-md-10">
                                                <select name="subject_id[]"
                                                    data-placeholder="-- Select Multiple Subjects --" multiple
                                                    id="subject_id" class="form-select select2">
                                                    <option value="">--Select--</option>
                                                    <?php foreach($subject as $row){ ?>
                                                    <option value="<?=$row->id?>"><?=$row->label?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>


                                        <div class="row mb-3 text-center mt-4">
                                            <div>
                                                <button type="submit" class="btn btn-success">Submit</button>
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
    function getSection(id){
        $.ajax({
            type: 'POST',
            url: "<?=base_url('back-panel/ajax/get-section-by-class')?>",
            data: {"id":id},
            dataType: "json",
            success: function(resultData) { 
                // alert(resultData) 

                $("#section_id").html(resultData);
            }
        });

    }
</script>
</body>

</html>