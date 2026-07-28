<style>
    .stat-card {
        background: white;
        border-radius: 15px;
        padding: 25px;
        box-shadow: 0 2px 15px rgba(0,0,0,0.08);
        transition: all 0.3s ease;
        border-left: 4px solid transparent;
        position: relative;
        overflow: hidden;
    }
    
    .stat-card::before {
        content: '';
        position: relative;
        top: 0;
        right: 0;
        width: 100px;
        height: 100px;
        background: radial-gradient(circle, rgba(255,255,255,0.1) 0%, transparent 70%);
        border-radius: 50%;
        transform: translate(30px, -30px);
    }
    
    .stat-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 25px rgba(0,0,0,0.15);
    }
    
    .stat-card .stat-icon {
        width: 60px;
        height: 60px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 12px;
        font-size: 28px;
        transition: all 0.3s ease;
    }
    
    .stat-card:hover .stat-icon {
        transform: scale(1.1) rotate(5deg);
    }
    
    .stat-card .stat-number {
        font-size: 32px;
        font-weight: 700;
        margin: 5px 0;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }
    
    .stat-card .stat-label {
        font-size: 14px;
        color: #6c757d;
        font-weight: 500;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }
    
    .stat-card .stat-trend {
        font-size: 12px;
        font-weight: 600;
        padding: 3px 10px;
        border-radius: 20px;
        display: inline-block;
    }
    
    .stat-trend.up {
        background: #d4edda;
        color: #155724;
    }
    
    .stat-trend.down {
        background: #f8d7da;
        color: #721c24;
    }
    
    /* Card Styles */
    .dashboard-card {
        background: white;
        border-radius: 15px;
        box-shadow: 0 2px 15px rgba(0,0,0,0.08);
        border: none;
        transition: all 0.3s ease;
        height: 100%;
    }
    
    .dashboard-card:hover {
        box-shadow: 0 8px 25px rgba(0,0,0,0.12);
    }
    
    .dashboard-card .card-header {
        background: transparent;
        border-bottom: 2px solid #f8f9fc;
        padding: 20px 25px;
        font-weight: 600;
        color: #2d3748;
    }
    
    .dashboard-card .card-header i {
        margin-right: 10px;
        color: #667eea;
    }
    
    .dashboard-card .card-body {
        padding: 20px 25px;
    }
    
    /* Activity Feed */
    .activity-item {
        padding: 12px 0;
        border-bottom: 1px solid #f8f9fc;
        display: flex;
        align-items: center;
        transition: all 0.2s ease;
    }
    
    .activity-item:last-child {
        border-bottom: none;
    }
    
    .activity-item:hover {
        background: #f8f9fc;
        padding-left: 10px;
        border-radius: 8px;
    }
    
    .activity-icon {
        width: 40px;
        height: 40px;
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-right: 15px;
        flex-shrink: 0;
    }
    
    .activity-icon.bg-primary-light {
        background: #e8edfd;
        color: #667eea;
    }
    
    .activity-icon.bg-success-light {
        background: #d4edda;
        color: #28a745;
    }
    
    .activity-icon.bg-warning-light {
        background: #fff3cd;
        color: #ffc107;
    }
    
    .activity-icon.bg-danger-light {
        background: #f8d7da;
        color: #dc3545;
    }
    
    .activity-content {
        flex: 1;
    }
    
    .activity-content .activity-text {
        font-size: 14px;
        color: #2d3748;
        margin-bottom: 2px;
    }
    
    .activity-content .activity-text strong {
        color: #1a202c;
    }
    
    .activity-content .activity-time {
        font-size: 12px;
        color: #a0aec0;
    }
    
    /* Quick Stats Grid */
    .quick-stat-item {
        text-align: center;
        padding: 15px;
        border-radius: 10px;
        background: #f8f9fc;
        transition: all 0.3s ease;
    }
    
    .quick-stat-item:hover {
        background: #667eea;
        color: white;
        transform: translateY(-3px);
    }
    
    .quick-stat-item:hover .quick-stat-label {
        color: rgba(255,255,255,0.9);
    }
    
    .quick-stat-item .quick-stat-number {
        font-size: 24px;
        font-weight: 700;
        color: #2d3748;
    }
    
    .quick-stat-item:hover .quick-stat-number {
        color: white;
    }
    
    .quick-stat-item .quick-stat-label {
        font-size: 13px;
        color: #6c757d;
        margin-top: 5px;
    }
    
    /* Recent Table */
    .recent-table {
        font-size: 14px;
    }
    
    .recent-table thead th {
        color: #6c757d;
        font-weight: 600;
        text-transform: uppercase;
        font-size: 12px;
        letter-spacing: 0.5px;
        border-bottom: 2px solid #e9ecef;
    }
    
    .recent-table tbody tr {
        transition: all 0.2s ease;
        cursor: pointer;
    }
    
    .recent-table tbody tr:hover {
        background: #f8f9fc;
    }
    
    .status-badge {
        padding: 4px 12px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 600;
    }
    
    .status-badge.active {
        background: #d4edda;
        color: #155724;
    }
    
    .status-badge.inactive {
        background: #f8d7da;
        color: #721c24;
    }
    
    .status-badge.pending {
        background: #fff3cd;
        color: #856404;
    }
    
    /* Chart Container */
    .chart-container {
        position: relative;
        height: 280px;
    }
    
    /* Responsive */
    @media (max-width: 768px) {
        .stat-card .stat-number {
            font-size: 24px;
        }
        .quick-stat-item {
            margin-bottom: 10px;
        }
    }
    
    /* Animation */
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    
    .animate-fade-in {
        animation: fadeInUp 0.6s ease forwards;
    }
    
    .delay-1 { animation-delay: 0.1s; }
    .delay-2 { animation-delay: 0.2s; }
    .delay-3 { animation-delay: 0.3s; }
    .delay-4 { animation-delay: 0.4s; }
</style>

<!-- Dashboard Content -->
<div class="row">
    <!-- Welcome Section -->
    <div class="col-12 mb-4">
        <div class="d-flex justify-content-between align-items-center flex-wrap">
            <div>
                <h4 class="mb-1 fw-bold" style="color: #2d3748;">
                    <i class="fas fa-chart-line text-primary me-2"></i>Welcome back, <?php echo $this->session->userdata('username'); ?>!
                </h4>
                <p class="text-muted mb-0">Here's what's happening with your alumni network today</p>
            </div>
            <div>
                <span class="badge bg-primary bg-opacity-10 text-primary p-2 px-3 rounded-pill">
                    <i class="fas fa-calendar-alt me-1"></i> <?php echo date('l, F j, Y'); ?>
                </span>
            </div>
        </div>
    </div>
</div>

<!-- Statistics Cards -->
<div class="row">
    <div class="col-xl-3 col-md-6 mb-4 animate-fade-in delay-1">
        <div class="stat-card" style="border-left-color: #667eea;">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <div class="stat-label">Total Doctors</div>
                    <div class="stat-number"><?php echo $total_doctors ?? 0; ?></div>
                    <div class="mt-2">
                        <span class="stat-trend up">
                            <i class="fas fa-arrow-up"></i> 12% this month
                        </span>
                    </div>
                </div>
                <div class="stat-icon" style="background: linear-gradient(135deg, #667eea20, #764ba220); color: #667eea;">
                    <i class="fas fa-user-md"></i>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-xl-3 col-md-6 mb-4 animate-fade-in delay-2">
        <div class="stat-card" style="border-left-color: #28a745;">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <div class="stat-label">Total Centers</div>
                    <div class="stat-number"><?php echo $total_centers ?? 0; ?></div>
                    <div class="mt-2">
                        <span class="stat-trend up">
                            <i class="fas fa-arrow-up"></i> 8% this month
                        </span>
                    </div>
                </div>
                <div class="stat-icon" style="background: linear-gradient(135deg, #28a74520, #20c99720); color: #28a745;">
                    <i class="fas fa-building"></i>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-xl-3 col-md-6 mb-4 animate-fade-in delay-3">
        <div class="stat-card" style="border-left-color: #ffc107;">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <div class="stat-label">Total Labs</div>
                    <div class="stat-number"><?php echo $total_labs ?? 0; ?></div>
                    <div class="mt-2">
                        <span class="stat-trend up">
                            <i class="fas fa-arrow-up"></i> 5% this month
                        </span>
                    </div>
                </div>
                <div class="stat-icon" style="background: linear-gradient(135deg, #ffc10720, #fd7e1420); color: #ffc107;">
                    <i class="fas fa-flask"></i>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-xl-3 col-md-6 mb-4 animate-fade-in delay-4">
        <div class="stat-card" style="border-left-color: #dc3545;">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <div class="stat-label">Total Products</div>
                    <div class="stat-number"><?php echo $total_products ?? 0; ?></div>
                    <div class="mt-2">
                        <span class="stat-trend down">
                            <i class="fas fa-arrow-down"></i> 2% this month
                        </span>
                    </div>
                </div>
                <div class="stat-icon" style="background: linear-gradient(135deg, #dc354520, #e83e8c20); color: #dc3545;">
                    <i class="fas fa-box"></i>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Quick Stats Summary -->
<div class="row mb-4">
    <div class="col-12">
        <div class="dashboard-card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3 col-6">
                        <div class="quick-stat-item">
                            <div class="quick-stat-number"><?php echo $active_doctors ?? 0; ?></div>
                            <div class="quick-stat-label"><i class="fas fa-circle text-success me-1" style="font-size: 8px;"></i> Active Doctors</div>
                        </div>
                    </div>
                    <div class="col-md-3 col-6">
                        <div class="quick-stat-item">
                            <div class="quick-stat-number"><?php echo $inactive_doctors ?? 0; ?></div>
                            <div class="quick-stat-label"><i class="fas fa-circle text-danger me-1" style="font-size: 8px;"></i> Inactive Doctors</div>
                        </div>
                    </div>
                    <div class="col-md-3 col-6">
                        <div class="quick-stat-item">
                            <div class="quick-stat-number"><?php echo $new_this_month ?? 0; ?></div>
                            <div class="quick-stat-label"><i class="fas fa-plus-circle text-primary me-1"></i>Pending Test Report</div>
                        </div>
                    </div>
                    <div class="col-md-3 col-6">
                        <div class="quick-stat-item">
                            <div class="quick-stat-number"><?php echo $total_appointments ?? 0; ?></div>
                            <div class="quick-stat-label"><i class="fas fa-calendar-check text-info me-1"></i> Pending Test Collection</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Charts and Recent Activity -->
<div class="row">
    <!-- Distribution Chart -->
    <div class="col-xl-8 col-lg-7 mb-4">
        <div class="dashboard-card animate-fade-in delay-2">
            <div class="card-header">
                <i class="fas fa-chart-bar"></i> Center & Lab Distribution
            </div>
            <div class="card-body">
                <div class="chart-container">
                    <canvas id="distributionChart"></canvas>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Recent Activity -->
    <div class="col-xl-4 col-lg-5 mb-4">
        <div class="dashboard-card animate-fade-in delay-3">
            <div class="card-header d-flex justify-content-between align-items-center">
                <div>
                    <i class="fas fa-bell"></i> Recent Activities
                </div>
                <span class="badge bg-primary rounded-pill"><?php echo count($recent_activities ?? []); ?> new</span>
            </div>
            <div class="card-body" style="max-height: 310px; overflow-y: auto;">
                <?php if(isset($recent_activities) && !empty($recent_activities)): ?>
                    <?php foreach($recent_activities as $activity): ?>
                        <div class="activity-item">
                            <div class="activity-icon bg-<?php echo $activity['type']; ?>-light">
                                <i class="fas fa-<?php echo $activity['icon']; ?>"></i>
                            </div>
                            <div class="activity-content">
                                <div class="activity-text">
                                    <strong><?php echo $activity['user']; ?></strong> 
                                    <?php echo $activity['action']; ?>
                                </div>
                                <div class="activity-time">
                                    <i class="far fa-clock me-1"></i> <?php echo $activity['time']; ?>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <div class="text-center text-muted py-4">
                        <i class="fas fa-inbox fa-3x mb-3"></i>
                        <p>No recent activities</p>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<!-- Recent Records Tables -->
<div class="row">
    <div class="col-xl-6 mb-4">
        <div class="dashboard-card animate-fade-in delay-2">
            <div class="card-header d-flex justify-content-between align-items-center">
                <div>
                    <i class="fas fa-user-md"></i> Recent Doctors
                </div>
                <a href="<?php echo base_url('admin/doctor_master'); ?>" class="btn btn-sm btn-outline-primary">
                    View All <i class="fas fa-arrow-right ms-1"></i>
                </a>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table recent-table mb-0">
                        <thead>
                            <tr>
                                <th>Doctor Name</th>
                                <th>Qualification</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(isset($doctor) && !empty($doctor)): ?>
                                <?php foreach($doctor as $doctors): ?>
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="avatar-sm me-2">
                                                    <i class="fas fa-user-circle fa-2x text-secondary"></i>
                                                </div>
                                                <div>
                                                    <div class="fw-semibold"><?php echo $doctors['doctor_name']; ?></div>
                                                    <small class="text-muted">ID: <?php echo $doctors['doctor_code']; ?></small>
                                                </div>
                                            </div>
                                        </td>
                                        <td><?php echo $doctors['qualification']; ?></td>
                                        <td>
                                            <span class="status-badge <?php echo $doctors['status'] ?? 1; ?>">
                                                <?php echo ucfirst($doctors['status'] ?? 1); ?>
                                            </span>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="3" class="text-center text-muted py-3">No recent doctors</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-xl-6 mb-4">
        <div class="dashboard-card animate-fade-in delay-3">
            <div class="card-header d-flex justify-content-between align-items-center">
                <div>
                    <i class="fas fa-flask"></i> Recent Labs
                </div>
                <a href="<?php echo base_url('masters/lab'); ?>" class="btn btn-sm btn-outline-primary">
                    View All <i class="fas fa-arrow-right ms-1"></i>
                </a>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table recent-table mb-0">
                        <thead>
                            <tr>
                                <th>Lab Name</th>
                                <th>Code</th>
                                <th>Control Person</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(isset($lab) && !empty($lab)): ?>
                                <?php foreach($lab as $labs): ?>
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="avatar-sm me-2">
                                                    <i class="fas fa-flask fa-2x text-info"></i>
                                                </div>
                                                <div>
                                                    <div class="fw-semibold"><?php echo $labs['name']; ?></div>
                                                    <small class="text-muted"><?php echo $labs['address']; ?></small>
                                                </div>
                                            </div>
                                        </td>
                                        <td><?php echo $labs['lab_code']; ?></td>
                                        <td><?php echo $labs['contact']; ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="3" class="text-center text-muted py-3">No recent labs</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Chart.js Scripts -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
$(document).ready(function() {
    // Distribution Chart
    var ctx = document.getElementById('distributionChart').getContext('2d');
    
    // Sample data - replace with your actual data
    var distributionData = {
        labels: ['Doctors', 'Centers', 'Labs', 'Products'],
        datasets: [{
            label: 'Current Distribution',
            data: [
                <?php echo $total_doctors ?? 0; ?>,
                <?php echo $total_centers ?? 0; ?>,
                <?php echo $total_labs ?? 0; ?>,
                <?php echo $total_products ?? 0; ?>
            ],
            backgroundColor: [
                'rgba(102, 126, 234, 0.7)',
                'rgba(40, 167, 69, 0.7)',
                'rgba(255, 193, 7, 0.7)',
                'rgba(220, 53, 69, 0.7)'
            ],
            borderColor: [
                '#667eea',
                '#28a745',
                '#ffc107',
                '#dc3545'
            ],
            borderWidth: 2,
            borderRadius: 8,
            barPercentage: 0.6
        }]
    };
    
    new Chart(ctx, {
        type: 'bar',
        data: distributionData,
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false
                },
                tooltip: {
                    backgroundColor: 'rgba(255,255,255,0.95)',
                    titleColor: '#2d3748',
                    bodyColor: '#4a5568',
                    borderColor: '#e2e8f0',
                    borderWidth: 1,
                    cornerRadius: 10,
                    padding: 12,
                    callbacks: {
                        label: function(context) {
                            return context.parsed.y + ' total';
                        }
                    }
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        stepSize: 1,
                        font: {
                            size: 12
                        }
                    },
                    grid: {
                        color: 'rgba(0,0,0,0.05)'
                    }
                },
                x: {
                    grid: {
                        display: false
                    },
                    ticks: {
                        font: {
                            size: 12,
                            weight: '500'
                        }
                    }
                }
            },
            animation: {
                duration: 2000,
                easing: 'easeInOutQuart'
            }
        }
    });
});
</script>