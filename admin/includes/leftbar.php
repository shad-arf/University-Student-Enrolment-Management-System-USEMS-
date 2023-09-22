 <div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow" data-scroll-to-active="true">
      </li>
<li class=" nav-item"><a href="addmission-form.php"><i class="la la-home"></i><span class="menu-title" data-i18n="nav.dash.main">فۆرمی وەگرتن</span></a>
      </li>

   
<li class=" nav-item"><a href="upload-doc.php"><i class="la la-file"></i><span class="menu-title" data-i18n="nav.dash.main">دانانی ئەرشیف</span></a>
      </li>

  
 
    </ul>
  </div>
</div>
    <div class="main-menu-content">
      <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
        <li class=" nav-item"><a href="dashboard.php"><i class="la la-home"></i><span class="menu-title" data-i18n="nav.dash.main">Dashboard</span></a>
        </li>

        <li class=" nav-item"><a href="user-detail.php"><i class="la la-users"></i><span class="menu-title" data-i18n="nav.dash.main">Reg. Users</span></a>
        </li>
       
<li class=" nav-item"><a href="#"><i class="la la-file"></i><span class="menu-title" data-i18n="nav.footers.main">Admission application</span></a>
          <ul class="menu-content">
            <li><a class="menu-item" href="pending-application.php" data-i18n="nav.footers.footer_light">Pending</a>
            </li>
            <li><a class="menu-item" href="selected-application.php" data-i18n="nav.footers.footer_light">Selected</a>
            </li>
            <li><a class="menu-item" href="rejected-application.php" data-i18n="nav.footers.footer_dark">Rejected</a>
            </li>
  
          </ul>
        </li>
     
<li class=" nav-item"><a href="search-application.php"><i class="la la-search"></i><span class="menu-title" data-i18n="nav.dash.main">Search Application</span></a>
        </li>
  

<?php 
  $adminid=$_SESSION['aid'];
  $ret=mysqli_query($con,"select * from tbladmin where ID='$adminid'");
  $cnt=1;
  while ($row=mysqli_fetch_array($ret)) {
       if($row['type']=='super_admin'){
?>
        
        <li class=" nav-item"><a href="#"><i class="la la-user"></i><span class="menu-title" data-i18n="nav.footers.main">Admin</span></a>
          <ul class="menu-content">
            <li><a class="menu-item" href="add-admin.php" data-i18n="nav.footers.footer_light">Add Admiin</a>
            </li>
            <li><a class="menu-item" href="manage-admin.php" data-i18n="nav.footers.footer_dark">Manage Admin</a>
            </li>
         
          </ul>
        </li>
<li class=" nav-item"><a href="#"><i class="la la-download"></i><span class="menu-title" data-i18n="nav.footers.main">Public Notice</span></a>
          <ul class="menu-content">
            <li><a class="menu-item" href="add-notice.php" data-i18n="nav.footers.footer_light">Add Notice</a>
            </li>
            <li><a class="menu-item" href="manage-notice.php" data-i18n="nav.footers.footer_dark">Manage Notice</a>
            </li>
         
          </ul>
        </li>

<?php

       }
  
  }
?>
        
        



   
      </ul>
    </div>
  </div>