<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title" key="t-menu">Menu</li>

                <li>
                    <a href="<?= base_url('back-panel/dashboard') ?>">
                        <i class="fas fa-tachometer-alt"></i>
                        <span key="t-dashboards">Dashboards</span>
                    </a>
                    <!-- <ul class="sub-menu" aria-expanded="true">
                        <li><a href="" key="t-default">Dashboard</a></li>
                    </ul> -->
                </li>

                <!-- <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-layout"></i>
                        <span key="t-layouts">Section</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="true">
                        <li><a href="< ?= base_url('back-panel/section-add') ?>" key="t-sidebar">Add Section</a></li>
                        <li><a href="< ?= base_url('back-panel/section-view') ?>" key="t-sidebar">View Section</a></li>
                    </ul>
                </li> -->

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="fas fa-cogs"></i>
                        <span key="t-layouts">Master</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="true">
                        <li><a href="<?= base_url('back-panel/master/class'); ?>" key="t-sidebar">Class</a></li>
                        <li><a href="<?= base_url('back-panel/master/section'); ?>" key="t-sidebar">Section</a></li>
                        <li><a href="<?= base_url('back-panel/master/subject'); ?>" key="t-sidebar">Subject</a></li>
                        <li><a href="<?= base_url('back-panel/master/subject-allocation-list'); ?>" key="t-sidebar">Subject Allocation</a></li>
                        <li><a href="<?= base_url('back-panel/master/department'); ?>" key="t-sidebar">Depertment</a></li>
                        <li><a href="<?= base_url('back-panel/master/designation'); ?>" key="t-sidebar">Designation</a></li>
                    </ul>
                </li>

                <!-- <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-layout"></i>
                        <span key="t-layouts">Subject</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="true">
                        <li><a href="< ?= base_url('subject/add'); ?>" key="t-sidebar">Add Subject</a></li>
                        <li><a href="< ?= base_url('subject/view'); ?>" key="t-sidebar">View Subject</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-layout"></i>
                        <span key="t-layouts">Subject Allocation</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="true">
                        <li><a href="< ?= base_url('subjectallocation/add') ?>" key="t-sidebar">Add Subject
                                Allocation</a></li>
                        <li><a href="< ?= base_url('subjectallocation/view') ?>" key="t-sidebar">View Subject
                                Allocation</a></li>
                    </ul>
                </li> -->

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
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="fas fa-users"></i>
                        <span key="t-layouts">Employee</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="true">
                        <li><a href="<?= base_url('back-panel/employee/add') ?>" key="t-sidebar">Add</a></li>
                        <li><a href="<?= base_url('back-panel/employee/list') ?>" key="t-sidebar">List</a></li>
                        </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="fas fa-tools"></i>
                        <span key="t-layouts">Settings</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="true">
                        <li><a href="<?= base_url('back-panel/premission/header') ?>" key="t-sidebar">Premission Header</a></li>
                        <li><a href="<?= base_url('back-panel/premission/detail') ?>" key="t-sidebar">Premission Detail</a></li>
                        <li><a href="<?= base_url('back-panel/premission/role') ?>" key="t-sidebar">Premission Role</a></li>
                    </ul>
                </li>

            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->