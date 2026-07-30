<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title ?? 'Admin Panel'; ?> - Diagnostic Management System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.3.8/css/dataTables.dataTables.css">
    <style>
        /* Reset and Base */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        html, body {
            height: 100%;
            overflow: hidden;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        .app-wrapper {
            display: flex;
            height: 100vh;
            overflow: hidden;
        }
        
        /* ========== SIDEBAR - FIXED ========== */
        .sidebar {
            width: 250px;
            min-width: 250px;
            height: 100vh;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            box-shadow: 2px 0 10px rgba(0,0,0,0.1);
            position: fixed;
            top: 0;
            left: 0;
            z-index: 1050;
            overflow-y: auto;
            overflow-x: hidden;
            transition: all 0.3s ease;
        }
        
        .sidebar::-webkit-scrollbar {
            width: 4px;
        }
        
        .sidebar::-webkit-scrollbar-track {
            background: transparent;
        }
        
        .sidebar::-webkit-scrollbar-thumb {
            background: rgba(255,255,255,0.3);
            border-radius: 10px;
        }
        
        .sidebar .brand-logo {
            padding: 20px 0;
            border-bottom: 1px solid rgba(255,255,255,0.1);
            position: sticky;
            top: 0;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            z-index: 1;
        }
        
        .sidebar .brand-logo i {
            font-size: 2.5rem;
            color: white;
            display: block;
            margin-bottom: 8px;
        }
        
        .sidebar .brand-logo h5 {
            color: white;
            font-weight: 600;
            margin: 0;
            letter-spacing: 1px;
        }
        
        .sidebar .brand-logo small {
            color: rgba(255,255,255,0.7);
            font-size: 11px;
            letter-spacing: 2px;
            text-transform: uppercase;
        }
        
        /* Navigation Styles */
        .sidebar .nav {
            padding: 10px 15px 20px;
        }
        
        .sidebar .nav-item {
            margin: 2px 0;
        }
        
        .sidebar .nav-link {
            color: rgba(255,255,255,0.85);
            padding: 10px 15px;
            border-radius: 10px;
            transition: all 0.3s ease;
            font-size: 14px;
            font-weight: 500;
            position: relative;
            cursor: pointer;
        }
        
        .sidebar .nav-link:hover {
            background: rgba(255,255,255,0.15);
            color: white;
            transform: translateX(5px);
        }
        
        .sidebar .nav-link.active {
            background: rgba(255,255,255,0.2);
            color: white;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        }
        
        .sidebar .nav-link i {
            margin-right: 12px;
            width: 20px;
            text-align: center;
            font-size: 16px;
        }
        
        .sidebar .nav-link .badge {
            position: absolute;
            right: 12px;
            top: 50%;
            transform: translateY(-50%);
            font-size: 10px;
            padding: 3px 8px;
            background: rgba(255,255,255,0.2);
            color: white;
        }
        
        .sidebar .nav-link .arrow {
            position: absolute;
            right: 12px;
            top: 50%;
            transform: translateY(-50%);
            transition: transform 0.3s ease;
            font-size: 12px;
        }
        
        .sidebar .nav-link[aria-expanded="true"] .arrow {
            transform: translateY(-50%) rotate(180deg);
        }
        
        /* Dropdown Sub-menu */
        .sidebar .nav .collapse .nav {
            padding: 5px 0 5px 15px;
        }
        
        .sidebar .nav .collapse .nav-link {
            padding: 8px 15px 8px 40px;
            font-size: 13px;
            font-weight: 400;
            color: rgba(255,255,255,0.7);
            border-left: 2px solid transparent;
        }
        
        .sidebar .nav .collapse .nav-link:hover {
            background: rgba(255,255,255,0.08);
            color: white;
            border-left-color: rgba(255,255,255,0.5);
            transform: translateX(3px);
        }
        
        .sidebar .nav .collapse .nav-link.active {
            background: rgba(255,255,255,0.1);
            color: white;
            border-left-color: white;
        }
        
        .sidebar .nav .collapse .nav-link i {
            font-size: 12px;
            margin-right: 10px;
            width: 16px;
        }
        
        /* Divider */
        .sidebar .nav-divider {
            border-top: 1px solid rgba(255,255,255,0.1);
            margin: 10px 15px;
        }
        
        /* ========== MAIN CONTENT WRAPPER ========== */
        .main-wrapper {
            margin-left: 250px;
            flex: 1;
            display: flex;
            flex-direction: column;
            height: 100vh;
            overflow: hidden;
        }
        
        /* ========== TOPBAR - FIXED ========== */
        .topbar {
            background: white;
            box-shadow: 0 2px 10px rgba(0,0,0,0.08);
            padding: 12px 25px;
            position: sticky;
            top: 0;
            z-index: 1040;
            flex-shrink: 0;
            min-height: 70px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            border-bottom: 1px solid rgba(0,0,0,0.05);
        }
        
        .topbar .page-title {
            font-weight: 600;
            color: #2d3748;
            margin: 0;
            font-size: 20px;
        }
        
        .topbar .page-title i {
            color: #667eea;
            margin-right: 10px;
        }
        
        .topbar .user-info {
            display: flex;
            align-items: center;
            gap: 15px;
        }
        
        .topbar .user-info .avatar {
            width: 38px;
            height: 38px;
            border-radius: 50%;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 600;
            font-size: 14px;
        }
        
        .topbar .user-info .username {
            font-weight: 500;
            color: #2d3748;
        }
        
        .topbar .user-info .role-badge {
            font-size: 11px;
            padding: 4px 12px;
            border-radius: 20px;
            background: #e8edfd;
            color: #667eea;
            font-weight: 600;
            letter-spacing: 0.5px;
        }
        
        .topbar .hamburger {
            display: none;
            background: none;
            border: none;
            font-size: 24px;
            color: #2d3748;
            cursor: pointer;
            padding: 5px;
        }
        
        /* ========== CONTENT AREA - SCROLLABLE ========== */
        .content-area {
            flex: 1;
            overflow-y: auto;
            padding: 25px;
            background: #f8f9fc;
            height: calc(100vh - 70px);
        }
        
        .content-area::-webkit-scrollbar {
            width: 6px;
        }
        
        .content-area::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 10px;
        }
        
        .content-area::-webkit-scrollbar-thumb {
            background: #c1c7cd;
            border-radius: 10px;
        }
        
        .content-area::-webkit-scrollbar-thumb:hover {
            background: #a0a7ae;
        }
        
        /* ========== STAT CARDS ========== */
        .stat-card {
            background: white;
            border-radius: 12px;
            padding: 20px 25px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
            transition: all 0.3s ease;
            border: 1px solid rgba(0,0,0,0.03);
        }
        
        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(0,0,0,0.1);
        }
        
        /* ========== RESPONSIVE ========== */
        @media (max-width: 992px) {
            .sidebar {
                width: 220px;
                min-width: 220px;
            }
            .main-wrapper {
                margin-left: 220px;
            }
        }
        
        @media (max-width: 768px) {
            .sidebar {
                width: 280px;
                min-width: 280px;
                transform: translateX(-100%);
                transition: transform 0.3s ease;
            }
            
            .sidebar.open {
                transform: translateX(0);
            }
            
            .main-wrapper {
                margin-left: 0;
            }
            
            .topbar .hamburger {
                display: block;
            }
            
            .topbar .page-title {
                font-size: 17px;
            }
            
            .topbar .username {
                display: none;
            }
            
            .content-area {
                padding: 15px;
                height: calc(100vh - 65px);
            }
            
            .topbar {
                min-height: 65px;
                padding: 10px 15px;
            }
            
            /* Overlay */
            .sidebar-overlay {
                display: none;
                position: fixed;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
                background: rgba(0,0,0,0.5);
                z-index: 1045;
            }
            
            .sidebar-overlay.active {
                display: block;
            }
        }
        
        @media (max-width: 576px) {
            .sidebar {
                width: 100%;
                min-width: 100%;
            }
            
            .topbar .user-info .role-badge {
                display: none;
            }
            
            .topbar .page-title {
                font-size: 15px;
            }
            
            .content-area {
                padding: 10px;
            }
        }
    </style>
</head>
<body>
    <!-- Sidebar Overlay for Mobile -->
    <div class="sidebar-overlay" id="sidebarOverlay" onclick="closeSidebar()"></div>
    
    <div class="app-wrapper">
        <!-- ========== SIDEBAR ========== -->
        <div class="sidebar" id="sidebar">
            <!-- Brand / Logo -->
            <div class="brand-logo text-center">
                <i class="fas fa-microscope"></i>
                <h5>Upsam Diagnostic</h5>
                <small>Pathology Lab Management</small>
            </div>
            
            <!-- Navigation -->
            <nav class="nav flex-column">
                <!-- Dashboard -->
                <div class="nav-item">
                    <a class="nav-link <?php echo ($this->uri->segment(2) == 'dashboard') ? 'active' : ''; ?>" 
                       href="<?php echo base_url('dashboard'); ?>">
                        <i class="fas fa-tachometer-alt"></i> Dashboard
                    </a>
                </div>
                 <?php if($this->session->userdata('role')=='admin') {  ?>
                <!-- Master Menu with Dropdown -->
                <div class="nav-item">
                    
                    <a class="nav-link <?php echo ($this->uri->segment(2) == 'master' || $this->uri->segment(2) == 'lab_master' || $this->uri->segment(2) == 'center_master' || $this->uri->segment(2) == 'doctor_master' || $this->uri->segment(2) == 'product_master') ? 'active' : ''; ?>" 
                       data-bs-toggle="collapse" href="#masterMenu" role="button" 
                       aria-expanded="<?php echo ($this->uri->segment(2) == 'master' || $this->uri->segment(2) == 'lab_master' || $this->uri->segment(2) == 'center_master' || $this->uri->segment(2) == 'doctor_master' || $this->uri->segment(2) == 'product_master') ? 'true' : 'false'; ?>" 
                       aria-controls="masterMenu">
                        <i class="fas fa-layer-group"></i> Master
                        <span class="arrow"><i class="fas fa-chevron-down"></i></span>
                    </a>
                    <div class="collapse <?php echo ($this->uri->segment(2) == 'master' || $this->uri->segment(2) == 'lab_master' || $this->uri->segment(2) == 'center_master' || $this->uri->segment(2) == 'doctor_master' || $this->uri->segment(2) == 'product_master') ? 'show' : ''; ?>" 
                         id="masterMenu">
                        <nav class="nav flex-column">
                            <a class="nav-link <?php echo ($this->uri->segment(2) == 'lab_master') ? 'active' : ''; ?>" 
                               href="<?php echo base_url('masters/lab'); ?>">
                                <i class="fas fa-flask"></i> Lab Master
                            </a>
                            <a class="nav-link <?php echo ($this->uri->segment(2) == 'center_master') ? 'active' : ''; ?>" 
                               href="<?php echo base_url('masters/center'); ?>">
                                <i class="fas fa-building"></i> Center Master
                            </a>
                            <a class="nav-link <?php echo ($this->uri->segment(2) == 'doctor_master') ? 'active' : ''; ?>" 
                               href="<?php echo base_url('masters/doctor'); ?>">
                                <i class="fas fa-user-md"></i> Doctor Master
                            </a>
                             <a class="nav-link <?php echo ($this->uri->segment(2) == 'product_master') ? 'active' : ''; ?>" 
                               href="<?php echo base_url('masters/main_test'); ?>">
                                <i class="fas fa-box"></i>Test Master
                            </a>

                            <a class="nav-link <?php echo ($this->uri->segment(2) == 'product_master') ? 'active' : ''; ?>" 
                               href="<?php echo base_url('masters/test'); ?>">
                                <i class="fas fa-box"></i> Sub Test Master
                            </a>
                        </nav>
                    </div>
                </div>
              
                <!-- Transactions Menu with Dropdown -->
                <div class="nav-item">
                    <a class="nav-link" data-bs-toggle="collapse" href="#transactionMenu" role="button" 
                       aria-expanded="false" aria-controls="transactionMenu">
                        <i class="fas fa-exchange-alt"></i> Transactions
                        <span class="arrow"><i class="fas fa-chevron-down"></i></span>
                    </a>
                    <div class="collapse" id="transactionMenu">
                        <nav class="nav flex-column">
                            <a class="nav-link" href="<?php echo base_url('admin/patient'); ?>">
                                <i class="fas fa-user-plus"></i> Patient Registration
                            </a>
                           
                        </nav>
                    </div>
                </div>
                
                <!-- Reports Menu with Dropdown -->
                <div class="nav-item">
                    <a class="nav-link" data-bs-toggle="collapse" href="#reportMenu" role="button" 
                       aria-expanded="false" aria-controls="reportMenu">
                        <i class="fas fa-chart-bar"></i> Reports
                        <span class="arrow"><i class="fas fa-chevron-down"></i></span>
                    </a>
                    <div class="collapse" id="reportMenu">
                        <nav class="nav flex-column">
                           
                            <a class="nav-link" href="<?php echo base_url('admin/reports/monthly'); ?>">
                                <i class="fas fa-calendar-alt"></i> Date Range Report
                            </a>
                            <a class="nav-link" href="<?php echo base_url('admin/reports/doctor_wise'); ?>">
                                <i class="fas fa-user-md"></i> Doctor-wise Report
                            </a>
                            <a class="nav-link" href="<?php echo base_url('admin/reports/test_wise'); ?>">
                                <i class="fas fa-flask"></i> Test-wise Report
                            </a>
                        </nav>
                    </div>
                </div>
                
                <!-- Settings Menu with Dropdown -->
                <div class="nav-item">
                    <a class="nav-link" data-bs-toggle="collapse" href="#settingsMenu" role="button" 
                       aria-expanded="false" aria-controls="settingsMenu">
                        <i class="fas fa-cog"></i> User Management
                        <span class="arrow"><i class="fas fa-chevron-down"></i></span>
                    </a>
                    <div class="collapse" id="settingsMenu">
                        <nav class="nav flex-column">
                            <a class="nav-link" href="<?php echo base_url('masters/new_registration'); ?>">
                                <i class="fas fa-user-cog"></i> New Registration
                            </a>
                        </nav>
                    </div>
                </div>
                
                <!-- Divider -->
                <div class="nav-divider"></div>
                
                <!-- Logout -->
                <div class="nav-item">
                    <a class="nav-link" href="<?php echo base_url('welcome/logout'); ?>">
                        <i class="fas fa-sign-out-alt"></i> Logout
                    </a>
                </div>
                  <?php  }elseif ($this->session->userdata('role')=='user') {  ?>
                   <div class="nav-item">
                    <a class="nav-link" data-bs-toggle="collapse" href="#transactionMenu" role="button" 
                       aria-expanded="false" aria-controls="transactionMenu">
                        <i class="fas fa-exchange-alt"></i> Transactions
                        <span class="arrow"><i class="fas fa-chevron-down"></i></span>
                    </a>
                    <div class="collapse" id="transactionMenu">
                        <nav class="nav flex-column">
                            <a class="nav-link" href="<?php echo base_url('admin/patient'); ?>">
                                <i class="fas fa-user-plus"></i> Patient Registration
                            </a>
                           
                        </nav>
                    </div>
                </div>
                 <div class="nav-item">
                    <a class="nav-link" data-bs-toggle="collapse" href="#reportMenu" role="button" 
                       aria-expanded="false" aria-controls="reportMenu">
                        <i class="fas fa-chart-bar"></i> Reports
                        <span class="arrow"><i class="fas fa-chevron-down"></i></span>
                    </a>
                    <div class="collapse" id="reportMenu">
                        <nav class="nav flex-column">
                           
                            <a class="nav-link" href="<?php echo base_url('admin/reports/monthly'); ?>">
                                <i class="fas fa-calendar-alt"></i> Date Range Report
                            </a>
                            <a class="nav-link" href="<?php echo base_url('admin/reports/doctor_wise'); ?>">
                                <i class="fas fa-user-md"></i> Doctor-wise Report
                            </a>
                            <a class="nav-link" href="<?php echo base_url('admin/reports/test_wise'); ?>">
                                <i class="fas fa-flask"></i> Test-wise Report
                            </a>
                        </nav>
                    </div>
                </div>
                 <div class="nav-divider"></div>
                
                <!-- Logout -->
                <div class="nav-item">
                    <a class="nav-link" href="<?php echo base_url('welcome/logout'); ?>">
                        <i class="fas fa-sign-out-alt"></i> Logout
                    </a>
                </div>
                 <?php  } ?>
            </nav>
        </div>
        
        <!-- ========== MAIN WRAPPER ========== -->
        <div class="main-wrapper">
            <!-- ========== TOPBAR ========== -->
            <div class="topbar">
                <div class="d-flex align-items-center">
                    <button class="hamburger" onclick="toggleSidebar()">
                        <i class="fas fa-bars"></i>
                    </button>
                    <h4 class="page-title">
                        <i class="fas fa-<?php 
                            $segment = $this->uri->segment(2);
                            if($segment == 'dashboard') echo 'tachometer-alt';
                            elseif($segment == 'lab_master' || $segment == 'master') echo 'flask';
                            elseif($segment == 'center_master') echo 'building';
                            elseif($segment == 'doctor_master') echo 'user-md';
                            elseif($segment == 'product_master') echo 'box';
                            else echo 'folder';
                        ?>"></i> 
                        <?php echo $title ?? 'Dashboard'; ?>
                    </h4>
                </div>
                <div class="user-info">
                    <span class="role-badge">
                        <i class="fas fa-shield-alt"></i> <?php echo $this->session->userdata('role'); ?>
                    </span>
                    <div class="avatar">
                        <?php 
                            $username = $this->session->userdata('username');
                            echo strtoupper(substr($username, 0, 1));
                        ?>
                    </div>
                    <span class="username">
                        <?php echo $username; ?>
                    </span>
                    <a href="<?php echo base_url('welcome/logout'); ?>" class="text-danger d-md-none ms-2">
                        <i class="fas fa-sign-out-alt"></i>
                    </a>
                </div>
            </div>
            
            <!-- ========== CONTENT AREA - SCROLLABLE ========== -->
            <div class="content-area">