<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title" key="t-menu">Menu</li>

                <li>
                    <a href="<?= base_url('dashboard') ?>">
                        <i class="bx bx-home-circle"></i>
                        <span key="t-dashboards">Dashboards</span>
                    </a>
                    <!-- <ul class="sub-menu" aria-expanded="true">
                        <li><a href="" key="t-default">Dashboard</a></li>
                    </ul> -->
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-layout"></i>
                        <span key="t-layouts">Section</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="true">
                        <li><a href="<?= base_url('section/add') ?>" key="t-sidebar">Add Section</a></li>
                        <li><a href="<?= base_url('section/view') ?>" key="t-sidebar">View Section</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-layout"></i>
                        <span key="t-layouts">Class</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="true">
                        <li><a href="<?= base_url('class/add'); ?>" key="t-sidebar">Add Class</a></li>
                        <li><a href="<?= base_url('class/view'); ?>" key="t-sidebar">View Class</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-layout"></i>
                        <span key="t-layouts">Subject</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="true">
                        <li><a href="<?= base_url('subject/add'); ?>" key="t-sidebar">Add Subject</a></li>
                        <li><a href="<?= base_url('subject/view'); ?>" key="t-sidebar">View Subject</a></li>
                    </ul>
                </li>

                <!-- <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-layout"></i>
                        <span key="t-layouts">Section Allocation</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="true">
                        <li><a href="< ?= base_url('sectionallocation/add') ?>" key="t-sidebar">Add Section Allocation</a></li>
                        <li><a href="< ?= base_url('sectionallocation/view') ?>" key="t-sidebar">View Section Allocation</a></li>
                    </ul>
                </li> -->

            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->