
<body>
    <div id="app">
        <div id="sidebar" class="active">
            <div class="sidebar-wrapper active">
                <div class="sidebar-header">
                    <div class="d-flex justify-content-center">
                        <img src="assets/images/earth.png" style="width: 110px; height:100px;">
                        <div class="toggler">
                            <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                        </div>
                    </div>
                </div>
                <div class="sidebar-menu">
                    <?php
                    error_reporting(0);

                    $uri_path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
                    $uri_segments = explode('/', $uri_path);

                    $page =  $uri_segments[3];

                    if ($page == 'home.php' || $page == 'index.php'  ) {
                        $home = 'active';
                    }else if ($page == 'tickets.php'  || $page == 'ticket-view.php' || $page == 'ticket.php' ) {
                        $tickets = 'active';
                    }else if ($page == 'accounts.php' || $page == 'user.php' ) {
                        $accounts = 'active';
                    }else if ($page == 'announcement.php' || $page == 'faq.php' || $page == 'donation.php' ) {
                        $announcement = 'active';
                    }else if ($page == 'audit.php' || $page == 'reports.php' ) {
                        $reports = 'active';
                    }
                    ?>
                    <ul class="menu">
							<?php if($_SESSION['role']==1){?>
							<li class="sidebar-item <?php echo $home; ?>">
                                <a href="index.php" class='sidebar-link'>
                                    <i class="bi bi-display"></i>
                                    <span>Home</span>
                                </a>
                            </li>
							
                            <li class="sidebar-item  has-sub <?php echo $tickets; ?>">
                                <a href="#" class='sidebar-link'>
                                  <i class="bi bi-file-text"></i>
                                    <span>Tickets</span>
                                </a>
                                <ul class="submenu ">
                                    <li class="submenu-item ">
                                        <a href="ticket.php?status=New"> New Tickets</a>
                                    </li>
                                    <li class="submenu-item ">
                                        <a href="ticket.php?status=Pending"> Pending Tickets</a>
                                    </li>
									<li class="submenu-item ">
                                        <a href="ticket.php?status=Solved"> Solved Tickets</a>
                                    </li>
                                </ul>
                            </li>
							<li class="sidebar-item  has-sub <?php echo $accounts; ?>">
                                <a href="#" class='sidebar-link'>
                                  <i class="bi bi-file-person"></i>
                                    <span>Accounts</span>
                                </a>
                                <ul class="submenu ">
                                    <li class="submenu-item ">
                                        <a href="accounts.php"> Admin & Help Desk</a>
                                    </li>
                                    <li class="submenu-item ">
                                        <a href="user.php"> User</a>
                                    </li>
                                   
                                </ul>
                            </li>
							
							<li class="sidebar-item  has-sub <?php echo $announcement; ?>">
                                <a href="#" class='sidebar-link'>
                                <i class="bi bi-gear"></i>
                                    <span>Settings</span>
                                </a>
                                <ul class="submenu ">
                                    <li class="submenu-item ">
                                        <a href="announcement.php">Announcement</a>
                                    </li>
                                    <li class="submenu-item ">
                                        <a href="faq.php"> FAQ</a>
                                    </li>
									<li class="submenu-item ">
                                        <a href="donation.php"> Donation</a>
                                    </li>
									
                                </ul>
                            </li>
							
							<li class="sidebar-item  has-sub <?php echo $reports; ?>">
                                <a href="#" class='sidebar-link'>
                               <i class="bi bi-flag"></i>
                                    <span>Reports</span>
                                </a>
                                <ul class="submenu ">
                                    <li class="submenu-item ">
                                        <a href="reports.php">Report Page</a>
                                    </li>
                                    <li class="submenu-item ">
                                        <a href="audit.php"> Audit Trail</a>
                                    </li>
									
                                </ul>
                            </li>
						
							
							<?php } else { ?>
							<li class="sidebar-item <?php echo $home; ?>">
                                <a href="home.php" class='sidebar-link'>
                                    <i class="bi bi-display"></i>
                                    <span>Home</span>
                                </a>
                            </li>
							
							<li class="sidebar-item <?php echo $tickets; ?>">
                                <a href="tickets.php" class='sidebar-link'>
                                    <i class="bi bi-file-text"></i>
                                    <span>Tickets</span>
                                </a>
                            </li>
							
                           
                          
							<?php } ?>
                        <li class="sidebar-item  ">
                            <a href="logout.php" class='sidebar-link'>
                                <i class="bi bi-arrow-bar-right"></i>
                                <span>Logout</span>
                            </a>
                        </li>

                    </ul>
                </div>
                <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
            </div>
        </div>
    </div>
</body>