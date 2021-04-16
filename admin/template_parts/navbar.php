<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
        <a class="sidebar-brand brand-logo text-center" href="<?php $server_name ?>index.php"><img id="mainlogo" src="<?php $server_name ?>assets/images/logo.png" alt="logo" /></a>
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
                    <a href="#" class="dropdown-item preview-item">
                        <div class="preview-thumbnail">
                            <div class="preview-icon bg-dark rounded-circle">
                                <i class="mdi mdi-settings text-primary"></i>
                            </div>
                        </div>
                        <div class="preview-item-content">
                            <p class="preview-subject ellipsis mb-1 text-small">Account settings</p>
                        </div>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item preview-item">
                        <div class="preview-thumbnail">
                            <div class="preview-icon bg-dark rounded-circle">
                                <i class="mdi mdi-onepassword  text-info"></i>
                            </div>
                        </div>
                        <div class="preview-item-content">
                            <p class="preview-subject ellipsis mb-1 text-small">Change Password</p>
                        </div>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item preview-item">
                        <div class="preview-thumbnail">
                            <div class="preview-icon bg-dark rounded-circle">
                                <i class="mdi mdi-calendar-today text-success"></i>
                            </div>
                        </div>
                        <div class="preview-item-content">
                            <p class="preview-subject ellipsis mb-1 text-small">To-do list</p>
                        </div>
                    </a>
                </div>
            </div>
        </li>
        <li class="nav-item nav-category">
            <span class="nav-link">Navigation</span>
        </li>
        
        <li class="nav-item menu-items">
            <a class="nav-link" href="<?php $server_name ?>dashboard.php"> <span class="menu-icon"> <i class="mdi mdi-speedometer"></i> </span> <span class="menu-title"> Dashboard </span> </a>
        </li>
        <li class="nav-item menu-items">
            <a class="nav-link" href="<?php $server_name ?>forms.php"> <span class="menu-icon"> <i class="mdi mdi-file-document-box"></i> </span> <span class="menu-title">Forms</span> </a>
        </li>
        <li class="nav-item menu-items">
            <a class="nav-link" data-toggle="collapse" href="#preview-dropdown" aria-expanded="false" aria-controls="preview-dropdown"> <span class="menu-icon"> <i class="mdi mdi-file-document"></i> </span> <span class="menu-title">Preview Pages</span> <i class="menu-arrow"></i> </a>
            <div class="collapse" id="preview-dropdown">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="preview_villager-details.php?action=allvillagers&sort1=0&sort2=0&sort7=0&sort8=0&sort9=0&sort10=0&sort11=<?php echo date('Y-m-t') ?>&sort12=0&sort13=0"> All Villagers Details </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="preview_nikkah-details.php?sort1=0&sort5=0&sort6=<?php echo date('Y-m-t') ?>"> Nikkah Details </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="preview_janaza-details.php?sort1=0&sort2=0&sort5=0&sort6=<?php echo date('Y-m-t') ?>"> Janaza Details </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="preview_q_madrasa-details.php"> Quran Madrasa Details </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="preview_saandha-amount-fixing-history.php"> Saandha Amount Fixings </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="preview_expenses.php?sort3=0"> Expenses </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="preview_non-mahalla-saandha-registration.php"> Non-Mahalla Saandha Details </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="preview_friday-attendance.php"> Friday Attendance </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="preview_private-loans.php">Private Loans </a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="nav-item menu-items">
            <a class="nav-link" href="<?php $server_name ?>preview_donation-details.php?action=alldonations"> <span class="menu-icon"> <i class="mdi mdi-chart-bar"></i> </span> <span class="menu-title">Donations</span> </a>
        </li>
        <li class="nav-item menu-items">
            <a class="nav-link" data-toggle="collapse" href="#trustee-board-dropdown" aria-expanded="false" aria-controls="trustee-board-dropdown"> <span class="menu-icon"> <i class="mdi mdi-contacts"></i></span><span class="menu-title">Trustee Board</span><i class="menu-arrow"></i> </a>
            <div class="collapse" id="trustee-board-dropdown">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="preview_trustee_board-details.php?action=present"> Trustee Board Details </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="preview_trustee_board-history.php"> Trustee Board History </a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="nav-item menu-items">
            <a class="nav-link" data-toggle="collapse" href="#priest-dropdown" aria-expanded="false" aria-controls="priest-dropdown"> <span class="menu-icon"> <i class="mdi mdi-contact-mail"></i></span><span class="menu-title">Head Priest</span><i class="menu-arrow"></i> </a>
            <div class="collapse" id="priest-dropdown">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="preview_pesh_imaam-details.php"> Pesh Imaam Details </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="preview_muazzin-details.php"> Muazzin Details </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="preview_salary.php?sort3=0&sort4=0"> Salary Page </a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="nav-item menu-items">
            <a class="nav-link" data-toggle="collapse" href="#rental-dropdown" aria-expanded="false" aria-controls="rental-dropdown"> <span class="menu-icon"> <i class="mdi mdi-home"></i></span><span class="menu-title">Rental Details</span><i class="menu-arrow"></i> </a>
            <div class="collapse" id="rental-dropdown">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="preview_rental-places.php"> Rental Places </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="preview_new-rental-registration.php"> Rental Status </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="preview_rental-incomes.php"> Rental Income </a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="nav-item menu-items">
            <a class="nav-link" data-toggle="collapse" href="#collection-dropdown" aria-expanded="false" aria-controls="collection-dropdown"> <span class="menu-icon"> <i class="mdi mdi-chart-line"></i></span><span class="menu-title">Collections</span><i class="menu-arrow"></i> </a>
            <div class="collapse" id="collection-dropdown">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="preview_collector-collection.php"> Saandha Collector Collections </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="preview_friday-collection.php?action=fridayregular"> Friday Collection </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="preview_kanduri-collection.php"> Kanduri Collection </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="preview_lailathul-kadhir-collection.php?sort5=<?php echo date('Y-m-01') ?>&sort6=<?php echo date('Y-m-t') ?>"> Laylat al-Qadr Collection </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="preview_undiyal-collection.php"> Undiyal Collection </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="preview_saandha-page.php?sort1=0&sort5=<?php echo date('Y-m-01') ?>&sort6=<?php echo date('Y-m-t') ?>&sort14=0000-00"> Saandha Collection </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="preview_nonmahalla_saandha_collection.php?sort5=<?php echo date('Y-m-01') ?>&sort6=<?php echo date('Y-m-t') ?>"> Non-Mahalla Saandha Collection </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="preview_funds.php"> Funds </a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="nav-item menu-items">
            <a class="nav-link" href="<?php $server_name ?>trial_balance.php?sort5=<?php echo date('Y-m-01') ?>&sort6=<?php echo date('Y-m-t') ?>"> <span class="menu-icon"> <i class="mdi mdi-table-large"></i> </span> <span class="menu-title"> Monthly Report </span> </a>
        </li>
        <li class="nav-item menu-items">
            <a class="nav-link" href="masjid-history.php"> <span class="menu-icon"> <i class="mdi mdi-history"></i> </span> <span class="menu-title"> History </span> </a>
        </li>
        <li class="nav-item menu-items">
            <a class="nav-link" data-toggle="collapse" href="#letters-dropdown" aria-expanded="false" aria-controls="letters-dropdown"> <span class="menu-icon"> <i class="mdi mdi-email"></i></span><span class="menu-title">Letters</span><i class="menu-arrow"></i> </a>
            <div class="collapse" id="letters-dropdown">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="letter1.php"> Character Certificate Letter </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="letter2.php"> Mahalla Member Confirmation Letter </a>
                    </li>
                </ul>
            </div>
        </li>
    </ul>
</nav>