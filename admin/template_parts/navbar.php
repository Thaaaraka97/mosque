<nav class="sidebar sidebar-offcanvas" id="sidebar">
                <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
                    <a class="sidebar-brand brand-logo text-center" href="<?php $server_name ?>index.php"><img id="mainlogo" src="<?php $server_name ?>assets/images/logo.png" alt="logo"/></a>
                    <a class="sidebar-brand brand-logo-mini" href="<?php $server_name ?>index.php"><img id="minilogo" src="<?php $server_name ?>assets/images/logo-mini.png" alt="logo" /></a>
                </div>
                <ul class="nav">
                    <li class="nav-item profile">
                        <div class="profile-desc">
                            <div class="profile-pic">
                                <div class="count-indicator">
                                    <img class="img-xs rounded-circle " src="<?php $server_name ?>assets/images/faces/user.png" alt="">
                                </div>
                                <div class="profile-name">
                                    <h5 class="mb-0 font-weight-normal">User</h5>
                                    <span>Member</span>
                                </div>
                            </div>
                            <a href="#" id="profile-dropdown" data-toggle="dropdown"><i class="mdi mdi-dots-vertical"></i></a>
                            <div class="dropdown-menu dropdown-menu-right sidebar-dropdown preview-list" aria-labelledby="profile-dropdown">
                                <a href="#" class="dropdown-item preview-item"> <div class="preview-thumbnail">
                                        <div class="preview-icon bg-dark rounded-circle">
                                            <i class="mdi mdi-settings text-primary"></i>
                                        </div>
                                    </div> <div class="preview-item-content">
                                        <p class="preview-subject ellipsis mb-1 text-small">Account settings</p>
                                    </div> </a>
                                <div class="dropdown-divider"></div>
                                <a href="#" class="dropdown-item preview-item"> <div class="preview-thumbnail">
                                        <div class="preview-icon bg-dark rounded-circle">
                                            <i class="mdi mdi-onepassword  text-info"></i>
                                        </div>
                                    </div> <div class="preview-item-content">
                                        <p class="preview-subject ellipsis mb-1 text-small">Change Password</p>
                                    </div> </a>
                                <div class="dropdown-divider"></div>
                                <a href="#" class="dropdown-item preview-item"> <div class="preview-thumbnail">
                                        <div class="preview-icon bg-dark rounded-circle">
                                            <i class="mdi mdi-calendar-today text-success"></i>
                                        </div>
                                    </div> <div class="preview-item-content">
                                        <p class="preview-subject ellipsis mb-1 text-small">To-do list</p>
                                    </div> </a>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item nav-category">
                        <span class="nav-link">Navigation</span>
                    </li>
                    <li class="nav-item menu-items">
                        <a class="nav-link" href="index.php"> <span class="menu-icon"> <i class="mdi mdi-speedometer"></i> </span> <span class="menu-title">Dashboard</span> </a>
                    </li>
                    <li class="nav-item menu-items">
                        <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic"> <span class="menu-icon"> <i class="mdi mdi-laptop"></i> </span> <span class="menu-title">Basic UI Elements</span> <i class="menu-arrow"></i> </a>
                        <div class="collapse" id="ui-basic">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> 
                                    <a class="nav-link" href="buttons.html">Buttons</a>
                                </li>
                                <li class="nav-item"> 
                                    <a class="nav-link" href="dropdowns.html">Dropdowns</a>
                                </li>
                                <li class="nav-item"> 
                                    <a class="nav-link" href="typography.html">Typography</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item menu-items">
                        <a class="nav-link" href="<?php $server_name ?>forms.php"> <span class="menu-icon"> <i class="mdi mdi-file-document-box"></i> </span> <span class="menu-title">Forms</span> </a>
                    </li>
                    <li class="nav-item menu-items">
                        <a class="nav-link" href="<?php $server_name ?>donations.php"> <span class="menu-icon"> <i class="mdi mdi-chart-bar"></i> </span> <span class="menu-title">Donations</span> </a>
                    </li>
                    <li class="nav-item menu-items">
                        <a class="nav-link" href="<?php $server_name ?>trial_balance.php"> <span class="menu-icon"> <i class="mdi mdi-table-large"></i> </span> <span class="menu-title">Trail Balance</span> </a>
                    </li>
                    <li class="nav-item menu-items">
                        <a class="nav-link" href="<?php $server_name ?>trustee_board.php"> <span class="menu-icon"> <i class="mdi mdi-contacts"></i> </span> <span class="menu-title">Trsutee Board</span> </a>
                    </li>
                    <li class="nav-item menu-items">
                        <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth"> <span class="menu-icon"> <i class="mdi mdi-security"></i> </span> <span class="menu-title">Members</span> <i class="menu-arrow"></i> </a>
                        <div class="collapse" id="auth">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> 
                                    <a class="nav-link" href="blank-page.php"> Blank Page </a>
                                </li>
                                <li class="nav-item"> 
                                    <a class="nav-link" href="error-404.php"> 404 </a>
                                </li>
                                <li class="nav-item"> 
                                    <a class="nav-link" href="error-500.php"> 500 </a>
                                </li>
                                <li class="nav-item"> 
                                    <a class="nav-link" href="login.php"> Login </a>
                                </li>
                                <li class="nav-item"> 
                                    <a class="nav-link" href="register.php"> Register </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item menu-items">
                        <a class="nav-link" href="http://www.bootstrapdash.com/demo/corona-free/jquery/documentation/documentation.html"> <span class="menu-icon"> <i class="mdi mdi-playlist-play "></i> </span> <span class="menu-title">Documentation</span> </a>
                    </li>
                </ul>
            </nav>