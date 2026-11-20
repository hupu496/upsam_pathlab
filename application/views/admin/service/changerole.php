<?php
$title = 'Change Role';
include('top-section.php');
?>

<style>
    /* Change Role Styles */
    .role-card {
        background: white;
        border-radius: 15px;
        box-shadow: 0 2px 15px rgba(0,0,0,0.08);
        border: none;
        transition: all 0.3s ease;
        margin-bottom: 25px;
    }
    
    .role-card .card-header {
        background: transparent;
        border-bottom: 2px solid #f8f9fc;
        padding: 18px 25px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
    }
    
    .role-card .card-header h5 {
        font-weight: 600;
        color: #2d3748;
        margin: 0;
    }
    
    .role-card .card-header h5 i {
        color: #667eea;
        margin-right: 10px;
    }
    
    .role-card .card-body {
        padding: 25px;
    }
    
    /* Form Styles */
    .form-section {
        background: #f8f9fc;
        border-radius: 10px;
        padding: 20px;
        margin-bottom: 20px;
        border-left: 4px solid #667eea;
        transition: all 0.3s ease;
    }
    
    .form-section:hover {
        border-left-color: #764ba2;
        box-shadow: 0 2px 10px rgba(0,0,0,0.05);
    }
    
    .form-section-title {
        font-size: 14px;
        font-weight: 600;
        color: #2d3748;
        margin-bottom: 15px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }
    
    .form-section-title i {
        color: #667eea;
        margin-right: 8px;
    }
    
    .form-label {
        font-weight: 500;
        color: #4a5568;
        font-size: 13px;
        margin-bottom: 5px;
    }
    
    .form-label .required {
        color: #dc3545;
        margin-left: 3px;
    }
    
    .form-control, .form-select {
        border-radius: 10px;
        border: 1.5px solid #e2e8f0;
        padding: 10px 15px;
        transition: all 0.3s ease;
        font-size: 14px;
    }
    
    .form-control:focus, .form-select:focus {
        border-color: #667eea;
        box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.15);
    }
    
    .form-control.error {
        border-color: #dc3545;
        background-color: #fff5f5;
    }
    
    .form-control.success {
        border-color: #28a745;
        background-color: #f0fff4;
    }
    
    .form-text {
        font-size: 12px;
        color: #a0aec0;
        margin-top: 4px;
    }
    
    .form-actions {
        display: flex;
        gap: 10px;
        margin-top: 20px;
        padding-top: 20px;
        border-top: 2px solid #f8f9fc;
        flex-wrap: wrap;
    }
    
    /* User Table Styles */
    .user-table {
        font-size: 14px;
    }
    
    .user-table thead th {
        background: #f8f9fc;
        color: #4a5568;
        font-weight: 600;
        text-transform: uppercase;
        font-size: 11px;
        letter-spacing: 0.5px;
        border-bottom: 2px solid #e9ecef;
        padding: 12px 15px;
        white-space: nowrap;
    }
    
    .user-table tbody td {
        padding: 12px 15px;
        vertical-align: middle;
        border-bottom: 1px solid #f1f3f5;
    }
    
    .user-table tbody tr {
        transition: all 0.2s ease;
    }
    
    .user-table tbody tr:hover {
        background: #f8f9fc;
    }
    
    .user-avatar {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 600;
        font-size: 16px;
        color: white;
        flex-shrink: 0;
    }
    
    .role-badge {
        padding: 4px 12px;
        border-radius: 20px;
        font-size: 11px;
        font-weight: 600;
        text-transform: uppercase;
    }
    
    .role-badge.admin {
        background: #e8edfd;
        color: #667eea;
    }
    
    .role-badge.doctor {
        background: #d4edda;
        color: #155724;
    }
    
    .role-badge.receptionist {
        background: #fff3cd;
        color: #856404;
    }
    
    .role-badge.lab {
        background: #cce5ff;
        color: #004085;
    }
    
    /* Action Buttons */
    .btn-action {
        padding: 5px 15px;
        border-radius: 8px;
        transition: all 0.3s ease;
        border: none;
        font-size: 13px;
        cursor: pointer;
    }
    
    .btn-action.change-role {
        background: #e8edfd;
        color: #667eea;
    }
    
    .btn-action.change-role:hover {
        background: #667eea;
        color: white;
        transform: scale(1.05);
    }
    
    /* Toast Notification */
    .toast-container {
        position: fixed;
        top: 20px;
        right: 20px;
        z-index: 9999;
    }
    
    /* Responsive */
    @media (max-width: 768px) {
        .role-card .card-header {
            flex-direction: column;
            align-items: stretch;
            gap: 10px;
        }
        .form-actions {
            flex-direction: column;
        }
        .form-actions .btn {
            width: 100%;
        }
    }
</style>

<!-- Toast Container -->
<div class="toast-container">
    <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header">
            <i class="fas fa-info-circle me-2"></i>
            <strong class="me-auto">Notification</strong>
            <button type="button" class="btn-close" data-bs-dismiss="toast"></button>
        </div>
        <div class="toast-body" id="toastMessage"></div>
    </div>
</div>

<!-- Alert Messages -->
<?php if($this->session->flashdata('success')): ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="fas fa-check-circle me-2"></i> <?php echo $this->session->flashdata('success'); ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
<?php endif; ?>

<?php if($this->session->flashdata('error')): ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <i class="fas fa-exclamation-circle me-2"></i> <?php echo $this->session->flashdata('error'); ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
<?php endif; ?>

<div class="row">
    <div class="col-12">
        <!-- ==================== USER LIST ==================== -->
        <div class="role-card">
            <div class="card-header">
                <h5>
                    <i class="fas fa-users-cog"></i> User Role Management
                    <span class="badge bg-primary ms-2"><?php echo $total_users ?? 0; ?></span>
                </h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="userTable" class="table user-table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Current Role</th>
                                <th>Status</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(isset($users) && !empty($users)): ?>
                                <?php $i = 1; foreach($users as $user): ?>
                                    <tr>
                                        <td><?php echo $i++; ?></td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="user-avatar me-2" style="background: <?php echo getColor($user['name']); ?>;">
                                                    <?php echo strtoupper(substr($user['name'], 0, 1)); ?>
                                                </div>
                                                <div>
                                                    <div class="fw-semibold"><?php echo $user['name']; ?></div>
                                                    <small class="text-muted">ID: <?php echo $user['user_id'] ?? 'USR' . str_pad($user['id'], 4, '0', STR_PAD_LEFT); ?></small>
                                                </div>
                                            </div>
                                        </td>
                                        <td><?php echo $user['email']; ?></td>
                                        <td><?php echo $user['phone']; ?></td>
                                        <td>
                                            <span class="role-badge <?php echo $user['role']; ?>">
                                                <?php echo ucfirst($user['role']); ?>
                                            </span>
                                        </td>
                                        <td>
                                            <span class="status-badge <?php echo $user['status'] ?? 'active'; ?>">
                                                <?php echo ucfirst($user['status'] ?? 'Active'); ?>
                                            </span>
                                        </td>
                                        <td class="text-center">
                                            <button class="btn-action change-role" data-bs-toggle="modal" 
                                                    data-bs-target="#changeRoleModal" 
                                                    onclick="setUserId(<?php echo $user['id']; ?>, '<?php echo $user['name']; ?>', '<?php echo $user['role']; ?>')">
                                                <i class="fas fa-exchange-alt"></i> Change Role
                                            </button>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <!-- Empty state is rendered by DataTables
                                     (language.emptyTable) - a custom <tr>
                                     here causes "Incorrect column count". -->
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- ==================== CHANGE ROLE MODAL ==================== -->
<div class="modal fade" id="changeRoleModal" tabindex="-1" aria-labelledby="changeRoleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="changeRoleModalLabel">
                    <i class="fas fa-user-tag"></i> Change User Role
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="changeRoleForm" action="<?php echo base_url('admin/registration/change_role'); ?>" method="POST">
                <div class="modal-body">
                    <input type="hidden" id="user_id" name="user_id" value="">
                    
                    <div class="form-section">
                        <div class="form-section-title">
                            <i class="fas fa-info-circle"></i> User Information
                        </div>
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label class="form-label">User</label>
                                <input type="text" class="form-control" id="user_name" disabled>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label class="form-label">Current Role</label>
                                <input type="text" class="form-control" id="current_role" disabled>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label class="form-label">New Role <span class="required">*</span></label>
                                <select class="form-select" id="new_role" name="new_role" required>
                                    <option value="">Select New Role</option>
                                    <option value="admin">Administrator</option>
                                    <option value="doctor">Doctor</option>
                                    <option value="receptionist">Receptionist</option>
                                    <option value="lab">Lab Technician</option>
                                </select>
                                <div class="form-text">Select the new role for this user</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        <i class="fas fa-times"></i> Cancel
                    </button>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Update Role
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
$(document).ready(function() {
    // Initialize DataTable
    var table = $('#userTable').DataTable({
        pageLength: 10,
        responsive: true,
        ordering: true,
        // Rendered by DataTables itself (correct colspan) - do NOT put a
        // custom empty <tr> in the tbody, it causes "Incorrect column count".
        language: {
            emptyTable: '<div class="text-center py-5">' +
                '<i class="fas fa-users fa-4x text-muted mb-3 d-block"></i>' +
                '<h5>No Users Found</h5>' +
                '<p class="text-muted mb-0">Register users to manage their roles</p>' +
                '</div>',
            zeroRecords: "No matching users found",
            search: "Search:",
            lengthMenu: "Show _MENU_ users per page",
            info: "Showing _START_ to _END_ of _TOTAL_ users",
            infoEmpty: "No users found",
            infoFiltered: "(filtered from _MAX_ total users)"
        },
        columnDefs: [
            { targets: [0], orderData: [0, 1] },
            { targets: [6], orderable: false }
        ]
    });
    
    // Form validation on submit
    $('#changeRoleForm').on('submit', function(e) {
        var newRole = $('#new_role').val();
        if (!newRole) {
            e.preventDefault();
            showToast('Please select a new role', 'error');
            return false;
        }
    });
});

// Set User ID and populate modal fields
function setUserId(id, name, role) {
    $('#user_id').val(id);
    $('#user_name').val(name);
    $('#current_role').val(role.charAt(0).toUpperCase() + role.slice(1));
    $('#new_role').val('');
}

// Show Toast Notification
function showToast(message, type) {
    var toast = $('#liveToast');
    var toastBody = $('#toastMessage');
    toastBody.text(message);
    
    if (type === 'error') {
        toast.find('.toast-header').addClass('bg-danger text-white');
    } else if (type === 'success') {
        toast.find('.toast-header').addClass('bg-success text-white');
    } else {
        toast.find('.toast-header').removeClass('bg-danger text-white bg-success text-white');
    }
    
    toast.toast('show');
}

// Get Color for Avatar
function getColor(name) {
    var colors = [
        '#667eea', '#764ba2', '#28a745', '#ffc107', 
        '#dc3545', '#17a2b8', '#6f42c1', '#fd7e14',
        '#20c997', '#e83e8c', '#4a5568', '#38a169'
    ];
    var hash = 0;
    for (var i = 0; i < name.length; i++) {
        hash = name.charCodeAt(i) + ((hash << 5) - hash);
    }
    return colors[Math.abs(hash) % colors.length];
}
</script>

<?php include('footer.php'); ?>