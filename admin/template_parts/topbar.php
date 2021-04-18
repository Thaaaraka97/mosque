<script>
    function showResult(str) {
        if (str.length == 0) {
            document.getElementById("livesearch").innerHTML = "";
            document.getElementById("livesearch").style.border = "0px";
            return;
        }
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("livesearch").innerHTML = this.responseText;
                document.getElementById("livesearch").style.border = "1px solid #A5ACB2";
            }
        }
        xmlhttp.open("GET", "template_parts/control.php?q=" + str, true);
        xmlhttp.send();
    }
</script>
<nav class="navbar p-0 fixed-top d-flex flex-row">
    <div class="row w-100">
        <div class="navbar-brand-wrapper d-flex d-lg-none align-items-center justify-content-center">
            <a class="navbar-brand brand-logo-mini" href="<?php $server_name ?>index.html"><img src="<?php $server_name ?>assets/images/logo-mini.svg" alt="logo" /></a>
        </div>
        <div class="navbar-menu-wrapper flex-grow d-flex align-items-stretch">
            <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                <span class="mdi mdi-menu"></span>
            </button>
            <ul class="navbar-nav w-100">
                <li class="nav-item w-100">
                    <form class="nav-link mt-2 mt-md-0 d-none d-lg-flex search">
                        <input type="text" class="form-control search-box" id="main_search" placeholder="Search">
                        <a class="ml-2 btn btn-primary" id="main_search_btn"><i class="fa fa-search" aria-hidden="true"></i>Search</a>
                        <!-- <input type="text" class="form-control search-box" placeholder="Search" id="main_search" onkeyup="showResult(this.value)"> -->
                        <div id="livesearch"></div>
                        <div class='alert alert-danger alert-dismissible' id="wrong_search" role='alert'> Wrong Search Index
                            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                <span aria-hidden='true'>&times;</span>
                            </button>
                        </div>
                    </form>
                </li>
                <li class="nav-item w-50">
                    <a class="btn btn-success" href="link/to/your/download/file" download><i class="fa fa-download"></i>Download App</a>
                </li>
            </ul>
            <ul class="navbar-nav navbar-nav-right">
                <li class="nav-item dropdown">
                    <a class="nav-link" id="profileDropdown" href="<?php $server_name ?>admin/" data-toggle="dropdown" aria-expanded="false">
                        <div class="navbar-profile">
                            <img class="img-xs rounded-circle" src="<?php $server_name ?>assets/images/faces/user.png" alt="">
                            <p class="mb-0 d-none d-sm-block navbar-profile-name">User</p>
                            <i class="mdi mdi-menu-down d-none d-sm-block"></i>
                        </div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="profileDropdown">
                        <h6 class="p-3 mb-0">Profile</h6>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item preview-item">
                            <div class="preview-thumbnail">
                                <div class="preview-icon bg-dark rounded-circle">
                                    <i class="mdi mdi-settings text-success"></i>
                                </div>
                            </div>
                            <div class="preview-item-content">
                                <p class="preview-subject mb-1">Settings</p>
                            </div>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item preview-item">
                            <div class="preview-thumbnail">
                                <div class="preview-icon bg-dark rounded-circle">
                                    <i class="mdi mdi-logout text-danger"></i>
                                </div>
                            </div>
                            <div class="preview-item-content">
                                <p class="preview-subject mb-1" id="logout">Log out</p>
                            </div>
                        </a>
                        <div class="dropdown-divider"></div>
                        <p class="p-3 mb-0 text-center">Advanced settings</p>
                    </div>
                </li>
            </ul>
        </div>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
            <span class="mdi mdi-format-line-spacing"></span>
        </button>
    </div>
</nav>