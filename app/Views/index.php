<!-- Start right Content here -->
<!-- ============================================================== -->
<?php if (session()->has('success')) { ?>
    <div class="alert alert-success" role="alert">
        <?php echo session('success'); ?>
    </div>
<?php } else if (session()->has('wrong')) { ?>
        <div class="alert alert-danger" role="alert">
        <?php echo session('wrong'); ?>
        </div>
<?php } ?>