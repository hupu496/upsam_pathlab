<?php
$title = 'Change Password';
include('top-section.php');
?>

<style>
    /* Change Password Styles */
    .password-card {
        background: white;
        border-radius: 15px;
        box-shadow: 0 2px 15px rgba(0,0,0,0.08);
        border: none;
        transition: all 0.3s ease;
        max-width: 600px;
        margin: 0 auto;
    }
    
    .password-card .card-header {
        background: transparent;
        border-bottom: 2px solid #f8f9fc;
        padding: 18px 25px;
    }
    
    .password-card .card-header h5 {
        font-weight: 600;
        color: #2d3748;
        margin: 0;
    }
    
    .password-card .card-header h5 i {
        color: #667eea;
        margin-right: 10px;
    }
    
    .password-card .card-body {
        padding: 25px;
    }
    
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
    
    .form-control {
        border-radius: 10px;
        border: 1.5px solid #e2e8f0;
        padding: 10px 15px;
        transition: all 0.3s ease;
        font-size: 14px;
    }
    
    .form-control:focus {
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
    
    .password-strength {
        height: 4px;
        margin-top: 8px;
        border-radius: 2px;
        background: #e2e8f0;
        transition: all 0.3s ease;
        overflow: hidden;
    }
    
    .password-strength .strength-bar {
        height: 100%;
        border-radius: 2px;
        transition: all 0.3s ease;
        width: 0%;
    }
    
    .password-strength .strength-bar.weak {
        width: 25%;
        background: #dc3545;
    }
    
    .password-strength .strength-bar.medium {
        width: 50%;
        background: #ffc107;
    }
    
    .password-strength .strength-bar.strong {
        width: 75%;
        background: #28a745;
    }
    
    .password-strength .strength-bar.very-strong {
        width: 100%;
        background: #28a745;
    }
    
    .form-actions {
        display: flex;
        gap: 10px;
        margin-top: 20px;
        padding-top: 20px;
        border-top: 2px solid #f8f9fc;
        flex-wrap: wrap;
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
        .form-actions {
            flex-direction: column;
        }
        .form-actions .btn {
            width: 100%;
        }
        .password-card {
            margin: 0 10px;
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
        <div class="password-card">
            <div class="card-header">
                <h5>
                    <i class="fas fa-key"></i> Change Password
                </h5>
            </div>
            <div class="card-body">
                <form id="passwordForm" action="<?php echo base_url('admin/registration/change_password'); ?>" method="POST" novalidate>
                    
                    <!-- Password Information -->
                    <div class="form-section">
                        <div class="form-section-title">
                            <i class="fas fa-lock"></i> Password Information
                        </div>
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label class="form-label">Current Password <span class="required">*</span></label>
                                <div class="input-group">
                                    <input type="password" class="form-control" id="current_password" 
                                           name="current_password" placeholder="Enter current password" required
                                           oninput="validateField(this)">
                                    <button class="btn btn-outline-secondary" type="button" onclick="togglePassword('current_password', 'currentIcon')">
                                        <i class="fas fa-eye" id="currentIcon"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label class="form-label">New Password <span class="required">*</span></label>
                                <div class="input-group">
                                    <input type="password" class="form-control" id="new_password" 
                                           name="new_password" placeholder="Enter new password" required minlength="6"
                                           oninput="validateField(this); checkPasswordStrength(this.value);">
                                    <button class="btn btn-outline-secondary" type="button" onclick="togglePassword('new_password', 'newIcon')">
                                        <i class="fas fa-eye" id="newIcon"></i>
                                    </button>
                                </div>
                                <div class="password-strength" id="passwordStrength">
                                    <div class="strength-bar" id="strengthBar"></div>
                                </div>
                                <div class="form-text" id="strengthText">Password must be at least 6 characters</div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label class="form-label">Confirm New Password <span class="required">*</span></label>
                                <div class="input-group">
                                    <input type="password" class="form-control" id="confirm_password" 
                                           name="confirm_password" placeholder="Confirm new password" required
                                           oninput="validateField(this); checkPasswordMatch();">
                                    <button class="btn btn-outline-secondary" type="button" onclick="togglePassword('confirm_password', 'confirmIcon')">
                                        <i class="fas fa-eye" id="confirmIcon"></i>
                                    </button>
                                </div>
                                <div class="form-text" id="matchText"></div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Form Actions -->
                    <div class="form-actions">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save"></i> Update Password
                        </button>
                        <button type="reset" class="btn btn-secondary" onclick="resetPasswordForm()">
                            <i class="fas fa-undo"></i> Reset
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
$(document).ready(function() {
    // Form validation on submit
    $('#passwordForm').on('submit', function(e) {
        var isValid = true;
        
        // Check all required fields
        $(this).find('[required]').each(function() {
            var $this = $(this);
            if (!$this.val() || $this.val().trim() === '') {
                $this.addClass('error');
                isValid = false;
            } else {
                $this.removeClass('error').addClass('success');
            }
        });
        
        // Check password match
        var newPassword = $('#new_password').val();
        var confirmPassword = $('#confirm_password').val();
        
        if (newPassword !== confirmPassword) {
            $('#confirm_password').addClass('error');
            isValid = false;
            showToast('Passwords do not match!', 'error');
        }
        
        // Check password length
        if (newPassword.length < 6) {
            $('#new_password').addClass('error');
            isValid = false;
            showToast('Password must be at least 6 characters', 'error');
        }
        
        if (!isValid) {
            e.preventDefault();
            return false;
        }
    });
});

// Toggle Password Visibility
function togglePassword(fieldId, iconId) {
    var input = document.getElementById(fieldId);
    var icon = document.getElementById(iconId);
    if (input.type === 'password') {
        input.type = 'text';
        icon.classList.remove('fa-eye');
        icon.classList.add('fa-eye-slash');
    } else {
        input.type = 'password';
        icon.classList.remove('fa-eye-slash');
        icon.classList.add('fa-eye');
    }
}

// Check Password Strength
function checkPasswordStrength(password) {
    var strengthBar = document.getElementById('strengthBar');
    var strengthText = document.getElementById('strengthText');
    var strength = 0;
    
    if (password.length >= 6) strength++;
    if (password.length >= 8) strength++;
    if (/[a-z]/.test(password) && /[A-Z]/.test(password)) strength++;
    if (/\d/.test(password)) strength++;
    if (/[^a-zA-Z0-9]/.test(password)) strength++;
    
    strengthBar.className = 'strength-bar';
    
    if (strength <= 1) {
        strengthBar.classList.add('weak');
        strengthText.textContent = 'Weak password';
        strengthText.style.color = '#dc3545';
    } else if (strength <= 2) {
        strengthBar.classList.add('medium');
        strengthText.textContent = 'Medium password';
        strengthText.style.color = '#ffc107';
    } else if (strength <= 3) {
        strengthBar.classList.add('strong');
        strengthText.textContent = 'Strong password';
        strengthText.style.color = '#28a745';
    } else if (strength >= 4) {
        strengthBar.classList.add('very-strong');
        strengthText.textContent = 'Very strong password';
        strengthText.style.color = '#28a745';
    }
}

// Check Password Match
function checkPasswordMatch() {
    var newPassword = document.getElementById('new_password').value;
    var confirmPassword = document.getElementById('confirm_password').value;
    var matchText = document.getElementById('matchText');
    
    if (confirmPassword.length === 0) {
        matchText.textContent = '';
        return;
    }
    
    if (newPassword === confirmPassword) {
        matchText.textContent = '✓ Passwords match';
        matchText.style.color = '#28a745';
        document.getElementById('confirm_password').classList.remove('error');
        document.getElementById('confirm_password').classList.add('success');
    } else {
        matchText.textContent = '✗ Passwords do not match';
        matchText.style.color = '#dc3545';
        document.getElementById('confirm_password').classList.remove('success');
        document.getElementById('confirm_password').classList.add('error');
    }
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

// Reset Form
function resetPasswordForm() {
    $('#passwordForm')[0].reset();
    $('#passwordForm').find('.error').removeClass('error');
    $('#passwordForm').find('.success').removeClass('success');
    $('#strengthBar').removeClass('weak medium strong very-strong');
    $('#strengthText').text('Password must be at least 6 characters');
    $('#strengthText').style.color = '#a0aec0';
    $('#matchText').text('');
}

// Validate Field
function validateField(element) {
    if (element.value && element.value.trim() !== '') {
        $(element).removeClass('error').addClass('success');
    } else {
        $(element).removeClass('success').addClass('error');
    }
}
</script>

<?php include('footer.php'); ?>