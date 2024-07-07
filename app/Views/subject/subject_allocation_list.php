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

    <style>
        .select2-container {
            z-index: 9999999999999;
            /* Ensure it is higher than the Bootstrap modal z-index */
        }
    </style>

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
                                            <a class="btn btn-success btn-sm" href="<?= base_url('back-panel/master/subject-allocation-add') ?>"><i class="fas fa-plus"></i> Add</a>
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
                                            foreach ($subjectList as $key => $row) {
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
                                                        <button class="btn btn-success btn-sm" onclick="getModel('<?= $row->class_id ?>','<?=$row->section_id?>')" data-class_id="<?= $row->class_id ?>" data-section_id="<?= $row->section_id ?>"><i class="fas fa-edit"></i></button>
                                                        <button class="btn btn-primary btn-sm" data-class_id="<?= $row->class_id ?>" data-section_id="<?= $row->section_id ?>"><i class="fas fa-user-tie"></i></button>
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

    <!-- subject Modal -->
    <!-- Button trigger modal -->

    <!-- Modal -->
    <!-- Button trigger modal -->
    <!-- Modal -->

    <div class="modal hide fade" id="editSubjectModal" data-bs-backdrop="static" role="dialog" aria-labelledby="editSubjectModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editSubjectModalLabel">Edit Subject</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" style="max-height: 800px">
                    <div class="container-fluid">
                        <form action="" method="POST">
                        <input type="hidden" id="classId">
                        <input type="hidden" id="sectionId">
                            <div class="mb-3 row">
                                <div class="col-md-12">
                                    <select class="form-select subject" name="subject" id="subject" multiple style="width: 100%;">
                                        <?php foreach ($allocatedSubject as $key => $sub) { ?>
                                            <option value="<?= $sub->id ?>"><?= $sub->label ?></option>
                                        <?php } ?>
                                    </select>

                                </div>
                            </div>
                            <div class="row mb-3 text-center mt-4">
                                <div>
                                    <button type="button" name="submit" id="update" onclick="updateSubjectAllocation()" value="submit" class="btn btn-success">Update</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>


    <!-- //////////// -->

    <?php echo view('component/back/script'); ?>

    <script>
        function getModel(classId, sectionId) {
            // alert(classId);
            $.ajax({
                url: '<?= base_url('back-panel/ajax/get-subject-by-class') ?>',
                method: 'GET',
                dataType: 'json',
                data: {
                    class_id: classId
                },
                success: function (response) {
                    // console.log(response);
                    $('#editSubjectModal').modal('show');
                    $('.subject').select2();
                    $("#classId").val(classId);
                    $("#sectionId").val(sectionId);
                    $('.subject').val(response).trigger('change');
                }
            });
        }
        function updateSubjectAllocation(){
            var  classId  = $("#classId").val();
            var  sectionId = $("#sectionId").val();
            var  subjectIds = $('#subject').val();
            console.log(subject);
            $.ajax({
                url: '<?= base_url('back-panel/ajax/update-subject-allocation') ?>',
                method: 'POST',
                dataType: 'json',
                data: {
                    class_id: classId,
                    section_id: sectionId,
                    subject_id: subjectIds
                },
                success: function (response) {
                    alert(response.message);
                    $('#editSubjectModal').modal('hide');
                    location.reload();
                }
            });
        }

        /*  $('#update').on('click', function () {
                var subject = $('#subject').val();
                var classId = $('#classId').val();
                var sectionId = $('#sectionId').val();
                alert(classId,sectionId);
            }); */

    </script>
</body>

</html>