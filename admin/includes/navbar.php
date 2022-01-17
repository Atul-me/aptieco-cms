  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand  elevation-2" style="height: 57px; background-color:#121212;">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
		<a href="#" class="btn btn-danger" data-widget="pushmenu" role="button"><i class="fa fa-bars"></i></a>
      </li>

       <li class="nav-item">
        <div class="ml-3"><p class="my-auto h3 text-white font-weight-bold">Admin Panel</p></div>
      </li>
    </ul>

    <ul class="ml-auto navbar-nav">
		<a href="logout.php" class="btn btn-outline-danger" role="button"><i class="fa fa-sign-out"></i> Logout</a>
   </ul>

  </nav>
  <!-- /.navbar -->
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-danger elevation-4" style="background-color:#121212;">
    <a href="dashboard.php" class="brand-link">
    <!-- <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"> -->
    <span class="brand-text font-weight-light"><strong> &nbsp;&nbsp;&nbsp;   &nbsp;Admin</strong></span>
  </a>
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

			<li class="nav-item ">
			<a href="dashboard.php" class="nav-link">
			  <i></i>
			  <p>
			    Dashboard
			  </p>
			</a>
			</li>

			<li class="nav-item">
			<a href="#" class="nav-link">
			  <i></i>
			  <p>
			    Students
			    <i class="fas fa-angle-right right"></i>
			  </p>
			</a>
			<ul class="nav nav-treeview">
			  <li class="nav-item pl-4">
			    <a href="add-student.php" class="nav-link">
			      <i></i>
			      <p>Add students</p>
			    </a>
			  </li>
			  <li class="nav-item  pl-4">
			    <a href="manage-students.php" class="nav-link">
			      <i></i>
			      <p>Manage students</p>
			    </a>
			  </li>
			  
			</ul>
			</li>

			<li class="nav-item">
			<a href="#" class="nav-link">
			  <i></i>
			  <p>
			   Teachers
			    <i class="fas fa-angle-right right"></i>
			  </p>
			</a>
			<ul class="nav nav-treeview">
			  <li class="nav-item pl-4">
			    <a href="add-teachers.php" class="nav-link">
			      <i></i>
			      <p>Add teachers</p>
			    </a>
			  </li>
			  <li class="nav-item  pl-4">
			    <a href="manage-teachers.php" class="nav-link">
			      <i></i>
			      <p>Manage teachers</p>
			    </a>
			  </li>
			  
			</ul>
			</li>

			<li class="nav-item">
			<a href="#" class="nav-link">
			  <i></i>
			  <p>
			    Subjects
			    <i class="fas fa-angle-right right"></i>
			  </p>
			</a>
			<ul class="nav nav-treeview">
			  <li class="nav-item  pl-4">
			    <a href="create-subject.php" class="nav-link">
			      <i></i>
			      <p>Add subjects</p>
			    </a>
			  </li>
			  <li class="nav-item  pl-4">
			    <a href="manage-subjects.php" class="nav-link">
			      <i></i>
			      <p>Manage subjects</p>
			    </a>
			  </li>
			</ul>
			</li>

			<li class="nav-item">
			<a href="#" class="nav-link">
			  <i></i>
			  <p>
			    Classes
			    <i class="fas fa-angle-right right"></i>
			  </p>
			</a>
			<ul class="nav nav-treeview">
			  <li class="nav-item  pl-4">
			    <a href="create-class.php" class="nav-link">
			      <i></i>
			      <p>Add Class</p>
			    </a>
			  </li>
			  <li class="nav-item  pl-4">
			    <a href="manage-classes.php" class="nav-link">
			      <i></i>
			      <p>Manage Classes</p>
			    </a>
			  </li>
			</ul>
			</li>

			<li class="nav-item">
			<a href="#" class="nav-link">
			  <i ></i>
			  <p>
			    Results
			    <i class="fas fa-angle-right right"></i>
			  </p>
			</a>
			<ul class="nav nav-treeview">
			  <li class="nav-item  pl-4">
			    <a href="add-result.php" class="nav-link">
			      <i ></i>
			      <p>Add Result</p>
			    </a>
			  </li>
			  <li class="nav-item  pl-4">
			    <a href="manage-results.php" class="nav-link">
			      <i></i>
			      <p>Manage Results</p>
			    </a>
			  </li>
			</ul>
			</li>

			<li class="nav-item">
			<a href="#" class="nav-link">
			  <i></i>
			  <p>
			    Attendance
			    <i class="fas fa-angle-right right"></i>
			  </p>
			</a>
			<ul class="nav nav-treeview">
			  <li class="nav-item  pl-4">
			    <a href="add-attendance.php" class="nav-link">
			      <i></i>
			      <p>Add attendance</p>
			    </a>
			  </li>
			  <li class="nav-item  pl-4">
			    <a href="manage-attendance.php" class="nav-link">
			      <i></i>
			      <p>Manage attedance</p>
			    </a>
			  </li>
			</ul>
			</li>

			<li class="nav-item">
			<a href="#" class="nav-link">
			  <i></i>
			  <p>
			    Time Table
			    <i class="fas fa-angle-right right"></i>
			  </p>
			</a>
			<ul class="nav nav-treeview">
			  <li class="nav-item  pl-4">
			    <a href="add-timetable.php" class="nav-link">
			      <i></i>
			      <p>Add Time Table</p>
			    </a>
			  </li>
			  <li class="nav-item  pl-4">
			    <a href="manage-timetables.php" class="nav-link">
			      <i></i>
			      <p>Manage Time Tables</p>
			    </a>
			  </li>
			</ul>
			</li>

			<li class="nav-item">
			<a href="view-query.php" class="nav-link">
			  <i></i>
			  <p>Query</p>
			</a>
			</li>


			<li class="nav-item">
			<a href="change-password.php" class="nav-link">
			  <i></i>
			  <p>Change Password</p>
			</a>
			</li>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>