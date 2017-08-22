<div class="user-panel">
    <div class="pull-left image">
        <img src="<?php echo base_url() ?>/assets/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
    </div>
    <div class="pull-left info">
        <p><?php echo $this->session->userdata('fullname') ?></p>
        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
    </div>
</div>
<form action="#" method="get" class="sidebar-form">
    <div class="input-group">
        <input type="text" name="q" class="form-control" placeholder="Search...">
        <span class="input-group-btn">
            <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
            </button>
        </span>
    </div>
</form>
    <ul class="sidebar-menu " >
    <li class="header">MAIN NAVIGATION</li>
    <li class="treeview"><a href="<?php echo base_url() ?>dashboard"><i class="fa fa-home"></i><span>Home</span></a></li>
    <li class="treeview">

        <a href="#">
            <i class="fa fa-folder"></i>
            <span>Master Data</span>
            <span class="label label-primary pull-right"></span>
        </a>

        <ul class="treeview-menu collapsed">
            <li><a href="<?php echo base_url() ?>mod-posisi"><i class="fa fa-user"></i>Input Posisi </a></li>
            <li><a href="<?php echo base_url() ?>mod-psikotes"><i class="fa fa-user"></i>Input Psikotes </a></li>
            <li><a href="<?php echo base_url() ?>mod-sorching"><i class="fa fa-user"></i>Input Sorching CV </a></li>
            <li>
                <a href="#"><i class="fa fa-user"></i>Client</a>
                <ul class="treeview-menu">
                    <li><a href="<?php echo base_url() ?>mod-area"><i class="fa fa-user"></i>Input Area </a></li>
                    <li><a href="<?php echo base_url() ?>mod-cabang"><i class="fa fa-user"></i>Input cabang </a></li>
                    <li><a href="<?php echo base_url() ?>mod-bidang-usaha"><i class="fa fa-user"></i>Input Bidang Usaha </a></li>
                    <li><a href="<?php echo base_url() ?>mod-client"><i class="fa fa-user"></i>Input Client </a></li>
                </ul>
            </li>
            <li>
                <a href="#"><i class="fa fa-user"></i>Data</a>
                <ul class="treeview-menu">
                    <li><a href="<?php echo base_url() ?>new-entry"><i class="fa fa-user"></i>New Entry </a></li>
                    <li><a href="<?php echo base_url() ?>mod-pipeline"><i class="fa fa-user"></i>Existing Data</a></li>
                </ul>
            </li>
        </ul>
    </li>
    <!-- 
    <li class="treeview">
        <a href="#">
            <i class="fa fa-folder"></i>
            <span>Modul Karyawan</span>
            <span class="label label-primary pull-right"></span>
        </a>
        <ul class="treeview-menu">
        <li><a href="#"><i class="fa fa-user"></i>Input Alasan Resign <span class="label label-info">6</span></a></li>
        <li><a href="#"><i class="fa fa-user"></i>Input Valdo Group <span class="label label-success">4</span></a></li>
        </ul></li>-->
    <li class="treeview">
        <a href="#">
            <i class="fa fa-user-plus"></i>
            <span>Recruitment</span>
            <span class="label label-primary pull-right"></span>
        </a>
        <ul class="treeview-menu">
            <li><a href="<?php echo base_url() ?>caller"><i class="fa fa-phone"></i>Caller </a></li>
<!--            <li><a href="<?php echo base_url() ?>kandidat"><i class="fa fa-user"></i>Data Kandidat </a></li>-->
            <li><a href="<?php echo base_url() ?>interviewer"><i class="fa fa-user"></i>Interviewer</a></li>
            <li><a href="<?php echo base_url() ?>psikotes"><i class="fa fa-user"></i>Psikotes</a></li>
        </ul>

    </li>
<!--    <li class="treeview">
        <a href="#">
            <i class="fa fa-user-times"></i>
            <span>HRD</span>
            <span class="label label-primary pull-right"></span>
        </a>
        <ul class="treeview-menu">
            <li><a href="<?php echo base_url() ?>mod-database"><i class="fa fa-user"></i>Database</a></li>
            <li><a href="#"><i class="fa fa-user"></i>PKWT</a></li>
            <li><a href="#"><i class="fa fa-user"></i>Benefit</a></li>
            <li><a href="#"><i class="fa fa-user"></i>Payrol</a></li>
        </ul>
    </li>-->
    <!--    <li class="treeview">
            <a href="#">
                <i class="fa fa-user-plus"></i>
                <span>Karyawan</span>
                <span class="label label-primary pull-right"></span>
            </a>
            <ul class="treeview-menu">
                <li><a href="#"><i class="fa fa-user"></i>Karyawan</a></li>
            </ul>
        </li>-->

    <!--    <li class="treeview">
            <a href="#">
                <i class="fa fa-folder-open"></i>
                <span>Report</span>
                <span class="label label-primary pull-right"></span>
            </a>
            <ul class="treeview-menu">
                <li><a href="#"><i class="fa fa-folder-open-o"></i>User History</a></li>
                <li><a href="#"><i class="fa fa-folder-open-o"></i>Recruitment Performance</a></li>
                         </ul>
                 </li>-->

    <li class="treeview">
        <a href="#">
            <i class="fa fa-group"></i>
            <span>User</span>
            <span class="label label-primary pull-right"></span>
        </a>
        <ul class="treeview-menu">
            <li><a href="<?php echo base_url() ?>admin"><i class="fa fa-user"></i>Admin</a></li>
            <li><a href="<?php echo base_url() ?>change-password"><i class="fa fa-user"></i>Change Password</a></li>
            <li><a href="<?php echo base_url() ?>group-menu"><i class="fa fa-user"></i>Menu Akses Management</a></li>
            <li><a href="<?php echo base_url() ?>logout"><i class="fa fa-user-times"></i>Logout</a></li>
        </ul>
    </li>
    <!--<li class="treeview">
      <a href="#">
        <i class="fa fa-pie-chart"></i>
        <span>Charts</span>
        <i class="fa fa-angle-left pull-right"></i>
      </a>
      <ul class="treeview-menu">
        <li><a href="pages/charts/chartjs.html"><i class="fa fa-circle-o"></i> ChartJS</a></li>
        <li><a href="pages/charts/morris.html"><i class="fa fa-circle-o"></i> Morris</a></li>
        <li><a href="pages/charts/flot.html"><i class="fa fa-circle-o"></i> Flot</a></li>
        <li><a href="pages/charts/inline.html"><i class="fa fa-circle-o"></i> Inline charts</a></li>
      </ul>
    </li>
    <li class="treeview">
      <a href="#">
        <i class="fa fa-laptop"></i>
        <span>UI Elements</span>
        <i class="fa fa-angle-left pull-right"></i>
      </a>
      <ul class="treeview-menu">
        <li><a href="pages/UI/general.html"><i class="fa fa-circle-o"></i> General</a></li>
        <li><a href="pages/UI/icons.html"><i class="fa fa-circle-o"></i> Icons</a></li>
        <li><a href="pages/UI/buttons.html"><i class="fa fa-circle-o"></i> Buttons</a></li>
        <li><a href="pages/UI/sliders.html"><i class="fa fa-circle-o"></i> Sliders</a></li>
        <li><a href="pages/UI/timeline.html"><i class="fa fa-circle-o"></i> Timeline</a></li>
        <li><a href="pages/UI/modals.html"><i class="fa fa-circle-o"></i> Modals</a></li>
      </ul>
    </li>
    <li class="treeview">
      <a href="#">
        <i class="fa fa-edit"></i> <span>Forms</span>
        <i class="fa fa-angle-left pull-right"></i>
      </a>
      <ul class="treeview-menu">
        <li><a href="pages/forms/general.html"><i class="fa fa-circle-o"></i> General Elements</a></li>
        <li><a href="pages/forms/advanced.html"><i class="fa fa-circle-o"></i> Advanced Elements</a></li>
        <li><a href="pages/forms/editors.html"><i class="fa fa-circle-o"></i> Editors</a></li>
      </ul>
    </li>
    <li class="treeview">
      <a href="#">
        <i class="fa fa-table"></i> <span>Tables</span>
        <i class="fa fa-angle-left pull-right"></i>
      </a>
      <ul class="treeview-menu">
        <li><a href="pages/tables/simple.html"><i class="fa fa-circle-o"></i> Simple tables</a></li>
        <li><a href="pages/tables/data.html"><i class="fa fa-circle-o"></i> Data tables</a></li>
      </ul>
    </li>
    <li>
      <a href="pages/calendar.html">
        <i class="fa fa-calendar"></i> <span>Calendar</span>
        <small class="label pull-right bg-red">3</small>
      </a>
    </li>
    <li>
      <a href="pages/mailbox/mailbox.html">
        <i class="fa fa-envelope"></i> <span>Mailbox</span>
        <small class="label pull-right bg-yellow">12</small>
      </a>
    </li>
    <li class="treeview">
      <a href="#">
        <i class="fa fa-folder"></i> <span>Examples</span>
        <i class="fa fa-angle-left pull-right"></i>
      </a>
      <ul class="treeview-menu">
        <li><a href="pages/examples/invoice.html"><i class="fa fa-circle-o"></i> Invoice</a></li>
        <li><a href="pages/examples/profile.html"><i class="fa fa-circle-o"></i> Profile</a></li>
        <li><a href="pages/examples/login.html"><i class="fa fa-circle-o"></i> Login</a></li>
        <li><a href="pages/examples/register.html"><i class="fa fa-circle-o"></i> Register</a></li>
        <li><a href="pages/examples/lockscreen.html"><i class="fa fa-circle-o"></i> Lockscreen</a></li>
        <li><a href="pages/examples/404.html"><i class="fa fa-circle-o"></i> 404 Error</a></li>
        <li><a href="pages/examples/500.html"><i class="fa fa-circle-o"></i> 500 Error</a></li>
        <li><a href="pages/examples/blank.html"><i class="fa fa-circle-o"></i> Blank Page</a></li>
        <li><a href="pages/examples/pace.html"><i class="fa fa-circle-o"></i> Pace Page</a></li>
      </ul>
    </li>
    <li class="treeview">
      <a href="#">
        <i class="fa fa-share"></i> <span>Multilevel</span>
        <i class="fa fa-angle-left pull-right"></i>
      </a>
      <ul class="treeview-menu">
        <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>
        <li>
          <a href="#"><i class="fa fa-circle-o"></i> Level One <i class="fa fa-angle-left pull-right"></i></a>
          <ul class="treeview-menu">
            <li><a href="#"><i class="fa fa-circle-o"></i> Level Two</a></li>
            <li>
              <a href="#"><i class="fa fa-circle-o"></i> Level Two <i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
                <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
                <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
              </ul>
            </li>
          </ul>
        </li>
        <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>
      </ul>
    </li>
    <li><a href="documentation/index.html"><i class="fa fa-book"></i> <span>Documentation</span></a></li>
    <li class="header">LABELS</li>
    <li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Important</span></a></li>
    <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span>Warning</span></a></li>
    <li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>Information</span></a></li>-->
</ul>