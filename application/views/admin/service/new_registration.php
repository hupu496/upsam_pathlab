<style>
    /* Registration Page Styles */
    .registration-card {
        background: white;
        border-radius: 15px;
        box-shadow: 0 2px 15px rgba(0,0,0,0.08);
        border: none;
        transition: all 0.3s ease;
        margin-bottom: 25px;
    }
    
    .registration-card .card-header {
        background: transparent;
        border-bottom: 2px solid #f8f9fc;
        padding: 18px 25px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
    }
    
    .registration-card .card-header h5 {
        font-weight: 600;
        color: #2d3748;
        margin: 0;
    }
    
    .registration-card .card-header h5 i {
        color: #667eea;
        margin-right: 10px;
    }
    
    .registration-card .card-body {
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
    
    .status-badge {
        padding: 4px 12px;
        border-radius: 20px;
        font-size: 11px;
        font-weight: 600;
        text-transform: uppercase;
    }
    
    .status-badge.active {
        background: #d4edda;
        color: #155724;
    }
    
    .status-badge.inactive {
        background: #f8d7da;
        color: #721c24;
    }
    
    /* Action Buttons */
    .btn-action-group {
        display: flex;
        gap: 5px;
        flex-wrap: wrap;
        justify-content: center;
    }
    
    .btn-action {
        width: 32px;
        height: 32px;
        padding: 0;
        border-radius: 8px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        transition: all 0.3s ease;
        border: none;
        font-size: 13px;
        cursor: pointer;
    }
    
    .btn-action.edit {
        background: #e8f5e9;
        color: #28a745;
    }
    
    .btn-action.edit:hover {
        background: #28a745;
        color: white;
        transform: scale(1.1);
    }
    
    .btn-action.delete {
        background: #fde8e8;
        color: #dc3545;
    }
    
    .btn-action.delete:hover {
        background: #dc3545;
        color: white;
        transform: scale(1.1);
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
        .registration-card .card-header {
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
<?php
if (!function_exists('getColor')) {
    function getColor($text)
    {
        $colors = [
            '#0d6efd', // Blue
            '#198754', // Green
            '#dc3545', // Red
            '#ffc107', // Yellow
            '#6f42c1', // Purple
            '#20c997', // Teal
            '#fd7e14', // Orange
            '#6610f2', // Indigo
            '#e83e8c', // Pink
            '#6c757d'  // Gray
        ];

        $index = abs(crc32($text)) % count($colors);
        return $colors[$index];
    }
}
?>
<div class="row">
    <div class="col-12">
        <!-- ==================== USER LIST ==================== -->
        <div class="registration-card">
            <div class="card-header">
                <h5>
                    <i class="fas fa-users"></i> Registered Users
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
                                <th>Role</th>
                                <th>Status</th>
                                <th>Registered</th>
                                <th class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(isset($users) && !empty($users)): ?>
                                <?php $i = 1; foreach($users as $user): ?>
                                    <tr>
                                        <td><?php echo $i++; ?></td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="user-avatar me-2" style="background: <?php echo getColor($user['username']); ?>;">
                                                    <?php echo strtoupper(substr($user['username'], 0, 1)); ?>
                                                </div>
                                                <div>
                                                    <div class="fw-semibold"><?php echo $user['username']; ?></div>
                                                    
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
                                            <?php if($user['status']==1): ?>
                                            <span class="status-badge <?php echo $user['status'] ?? 'active'; ?>">
                                                Active
                                            </span>
                                            <?php else: ?>
                                                 <span class="status-badge <?php echo $user['status'] ?? 'active'; ?>">
                                                Inactive
                                            </span>
                                             <?php endif; ?>
                                        </td>
                                        <td><?php echo date('d M Y', strtotime($user['created_at'] ?? date('Y-m-d'))); ?></td>
                                        <td class="text-center">
                                            <div class="btn-action-group">
                                                <?php if($user['status']==1): ?>
                                                <button class="btn-action edit"
                                                        onclick="activates(<?php echo $user['id']; ?>)"
                                                        title="Activate">
                                                 <i class="fas fa-check-circle"></i>
                                                </button>
                                                 <?php else: ?>
                                                     <button class="btn-action delete"
                                                        onclick="activates(<?php echo $user['id']; ?>)"
                                                        title="Deactivate">
                                                  <i class="fas fa-unlock"></i>
                                                </button>
                                                <?php endif; ?>
                                               <button class="btn-action edit"
                                                    onclick="editUser(<?php echo $user['id']; ?>)">
                                                    <i class="fas fa-edit"></i>
                                                </button>
                                                <button class="btn-action delete"
                                                        onclick="deleteUser(<?php echo $user['id']; ?>)"
                                                        title="Delete">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </div>
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
        
        <!-- ==================== REGISTRATION FORM ==================== -->
        <div class="registration-card">
            <div class="card-header">
                <h5>
                    <i class="fas fa-user-plus"></i> 
                    <span id="formTitle">New User Registration</span>
                </h5>
            </div>
            <div class="card-body">
                <form id="registrationForm" action="<?php echo base_url('masters/save_registration'); ?>" method="POST" novalidate>
                    <input type="hidden" id="user_id" name="user_id" value="">
                    
                    <!-- Personal Information -->
                    <div class="form-section">
                        <div class="form-section-title">
                            <i class="fas fa-user"></i> Personal Information
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Full Name <span class="required">*</span></label>
                                <input type="text" class="form-control" id="name" name="username" 
                                       placeholder="Enter full name" required 
                                       oninput="validateField(this)">
                                <div class="form-text">Enter the user's full name</div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Phone Number <span class="required">*</span></label>
                                <input type="tel" class="form-control" id="phone" name="phone" 
                                       placeholder="10-digit mobile number" required
                                       pattern="[0-9]{10}" maxlength="10"
                                       oninput="validateField(this)">
                                <div class="form-text">Enter 10-digit mobile number</div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Account Information -->
                    <div class="form-section">
                        <div class="form-section-title">
                            <i class="fas fa-envelope"></i> Account Information
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Email Address <span class="required">*</span></label>
                                <input type="email" class="form-control" id="email" name="email" 
                                       placeholder="example@email.com" required
                                       oninput="validateField(this)">
                                <div class="form-text">Enter a valid email address</div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Password <span class="required">*</span></label>
                                <div class="input-group">
                                    <input type="password" class="form-control" id="password" name="password" 
                                           placeholder="Enter password" required minlength="6"
                                           oninput="validateField(this)">
                                    <button class="btn btn-outline-secondary" type="button" onclick="togglePassword()">
                                        <i class="fas fa-eye" id="passwordToggleIcon"></i>
                                    </button>
                                </div>
                                <div class="form-text">Password must be at least 6 characters</div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Role Information -->
                    <div class="form-section">
                        <div class="form-section-title">
                            <i class="fas fa-user-tag"></i> Role Information
                        </div>
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label class="form-label">User Role <span class="required">*</span></label>
                                <select class="form-select" id="role" name="role" required>
                                    <option value="">Select Role</option>
                                    <option value="admin">Administrator</option>
                                    <option value="user">Users</option>

                                </select>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label">Select Lab <span class="required">*</span></label>
                                <select class="form-select" id="labid" name="labid" required>
                                    <option value="">Select Lab</option>
                                    <?php foreach ($lab as $key => $value) {  ?>
                                       <option value="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></option>
                                  <?php  }  ?>
                                   
                                </select>
                            </div>
                           <div class="col-md-4 mb-3">
                                <label class="form-label">Select Center <span class="required">*</span></label>
                                <select class="form-select" id="centerid" name="centerid" required>
                                    <option value="">Select Center</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Form Actions -->
                    <div class="form-actions">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save"></i> <span id="submitBtnText">Register User</span>
                        </button>
                        <button type="reset" class="btn btn-secondary" onclick="resetForm()">
                            <i class="fas fa-undo"></i> Reset
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
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
                '<i class="fas fa-user-plus fa-4x text-muted mb-3 d-block"></i>' +
                '<h5>No Users Found</h5>' +
                '<p class="text-muted mb-0">Register a new user using the form below</p>' +
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
            { targets: [7], orderable: false }
        ]
    });
    
    // Form validation on submit
    $('#registrationForm').on('submit', function(e) {
        var isValid = true;
        $(this).find('[required]').each(function() {
            var $this = $(this);
            if (!$this.val() || $this.val().trim() === '') {
                $this.addClass('error');
                isValid = false;
            } else {
                $this.removeClass('error').addClass('success');
            }
        });
        
        // Additional validation for email
        var email = $('#email').val();
        if (email && !isValidEmail(email)) {
            $('#email').addClass('error');
            isValid = false;
            showToast('Please enter a valid email address', 'error');
        }
        
        // Additional validation for phone
        var phone = $('#phone').val();
        if (phone && !/^[0-9]{10}$/.test(phone)) {
            $('#phone').addClass('error');
            isValid = false;
            showToast('Please enter a valid 10-digit phone number', 'error');
        }
        
        // Password validation
        var password = $('#password').val();
        if (password && password.length < 6) {
            $('#password').addClass('error');
            isValid = false;
            showToast('Password must be at least 6 characters', 'error');
        }
        
        if (!isValid) {
            e.preventDefault();
            showToast('Please fill in all required fields correctly.', 'error');
            return false;
        }
    });
});

$(document).ready(function () {
 
    $('#labid').on('change', function () {
     
        var lab_id = $(this).val();

        console.log("Selected Lab ID:", lab_id);

        if (lab_id == "") {
            $('#centerid').html('<option value="">Select Center</option>');
            return;
        }

        $.ajax({
            url: "<?= base_url('masters/get_centers_by_lab'); ?>",
            type: "POST",
            data: {
                lab_id: lab_id
            },
            dataType: "json",
            success: function (response) {
                var html = '<option value="">Select Center</option>';

               $.each(response, function (index, value) {
                    html += '<option value="' + value.id + '">' +
                                value.center_name + ' (' + value.center_code + ')' +
                            '</option>';
                });

                $('#centerid').html(html);
            },
            error: function (xhr) {
                console.log(xhr.responseText);
            }
        });

    });

});

// Toggle Password Visibility
function togglePassword() {
    var passwordInput = document.getElementById('password');
    var icon = document.getElementById('passwordToggleIcon');
    if (passwordInput.type === 'password') {
        passwordInput.type = 'text';
        icon.classList.remove('fa-eye');
        icon.classList.add('fa-eye-slash');
    } else {
        passwordInput.type = 'password';
        icon.classList.remove('fa-eye-slash');
        icon.classList.add('fa-eye');
    }
}

// Email validation helper
function isValidEmail(email) {
    var re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return re.test(email);
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

// Edit User
function editUser(id)
{
    $.ajax({
        url: "<?= base_url('welcome/get/'); ?>" + id,
        type: "GET",
        dataType: "json",
        success: function(res)
        {
            if(res.status == "success")
            {
                var user = res.data;

                $("#user_id").val(user.id);
                $("#name").val(user.username);
                $("#phone").val(user.phone);
                $("#email").val(user.email);
                $("#password").val(user.password);
                $("#role").val(user.role);

                // Select Lab
                $("#labid").val(String(user.labid)).trigger("change");

                $.ajax({
                    url: "<?= base_url('masters/get_centers_by_lab'); ?>",
                    type: "POST",
                    data: {
                        lab_id: user.labid
                    },
                    dataType: "json",
                    success: function(response)
                    {
                        $("#centerid").empty();
                        $("#centerid").append('<option value="">Select Center</option>');

                        $.each(response, function(index,row){

                            $("#centerid").append(
                                '<option value="'+row.id+'">'+
                                row.center_code+' - '+row.center_name+
                                '</option>'
                            );

                        });

                        // Select Center
                        $("#centerid").val(String(user.centerid));
                    }
                });

                $("#submitBtnText").text("Update User");
            }
        }
    });
}
// Delete User
function deleteUser(id) {

    if (confirm('Are you sure you want to delete this user?\nThis action cannot be undone.')) {
        $.ajax({
            url: '<?php echo base_url("welcome/delete"); ?>/' + id,
            type: 'DELETE',
            dataType: 'json',
            success: function(data) {
                if (data.status === 'success') {
                    showToast('User deleted successfully', 'success');
                    setTimeout(function() {
                        location.reload();
                    }, 1000);
                } else {
                    showToast('Error deleting user', 'error');
                }
            },
            error: function() {
                showToast('Error deleting user', 'error');
            }
        });
    }
}
// activate
function activates(id)
{
    if (!confirm("Are you sure you want to change the user status?")) {
        return;
    }

    $.ajax({
        url: "<?php echo base_url('welcome/activate/'); ?>" + id,
        type: "POST",
        dataType: "json",
        success: function(res)
        {
            if(res.status == "success" || res.status == "unsuccess")
            {
                showToast(res.message, "success");

                setTimeout(function(){
                    location.reload();
                },1000);
            }
            else
            {
                showToast("Something went wrong", "error");
            }
        },
        error:function(xhr)
        {
            console.log(xhr.responseText);
            showToast("Server Error", "error");
        }
    });
}

// Reset Form
function resetForm() {
    $('#formTitle').text('New User Registration');
    $('#submitBtnText').text('Register User');
    $('#user_id').val('');
    $('#registrationForm')[0].reset();
    $('#registrationForm').find('.error').removeClass('error');
    $('#registrationForm').find('.success').removeClass('success');
    $('#password').prop('required', true);
}

// Validate Field
function validateField(element) {
    if (element.value && element.value.trim() !== '') {
        $(element).removeClass('error').addClass('success');
    } else {
        $(element).removeClass('success').addClass('error');
    }
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

