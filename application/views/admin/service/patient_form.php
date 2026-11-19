<style>
    /* Patient Registration Styles */
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
    
    /* Modal Styles */
    .modal-content {
        border-radius: 15px;
        border: none;
        box-shadow: 0 10px 40px rgba(0,0,0,0.15);
    }
    
    .modal-header {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        border-radius: 15px 15px 0 0;
        padding: 20px 25px;
        border-bottom: none;
    }
    
    .modal-header .btn-close {
        filter: brightness(0) invert(1);
    }
    
    .modal-header h5 {
        font-weight: 600;
    }
    
    .modal-header h5 i {
        margin-right: 10px;
    }
    
    .modal-body {
        padding: 25px;
    }
    
    .modal-footer {
        border-top: 2px solid #f8f9fc;
        padding: 15px 25px;
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
    
    /* Patient List Table Styles */
    .patient-table {
        font-size: 14px;
    }
    
    .patient-table thead th {
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
    
    .patient-table tbody td {
        padding: 12px 15px;
        vertical-align: middle;
        border-bottom: 1px solid #f1f3f5;
    }
    
    .patient-table tbody tr {
        transition: all 0.2s ease;
    }
    
    .patient-table tbody tr:hover {
        background: #f8f9fc;
    }
    
    .patient-avatar {
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
    
    .status-badge.pending {
        background: #fff3cd;
        color: #856404;
    }
    
    .status-badge.completed {
        background: #cce5ff;
        color: #004085;
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
    
    .btn-action.view {
        background: #e8edfd;
        color: #667eea;
    }
    
    .btn-action.view:hover {
        background: #667eea;
        color: white;
        transform: scale(1.1);
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
    
    .btn-action.print {
        background: #fff3cd;
        color: #856404;
    }
    
    .btn-action.print:hover {
        background: #856404;
        color: white;
        transform: scale(1.1);
    }
    
    /* Search Filter */
    .filter-section {
        display: flex;
        gap: 15px;
        flex-wrap: wrap;
        align-items: center;
        padding: 15px;
        background: #f8f9fc;
        border-radius: 10px;
        margin-bottom: 20px;
    }
    
    .filter-section .form-group {
        margin-bottom: 0;
    }
    
    .filter-section .form-control,
    .filter-section .form-select {
        min-width: 180px;
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
        .filter-section {
            flex-direction: column;
            align-items: stretch;
        }
        .filter-section .form-control,
        .filter-section .form-select {
            min-width: 100%;
        }
        .modal-body {
            padding: 15px;
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
        <!-- ==================== PATIENT LIST ==================== -->
        <div class="registration-card">
            <div class="card-header">
                <h5>
                    <i class="fas fa-users"></i> Patient List
                    <span class="badge bg-primary ms-2"><?php echo $total_patients ?? 0; ?></span>
                </h5>
                <div class="d-flex gap-2 flex-wrap">
                    <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#patientModal" onclick="resetModalForm()">
                        <i class="fas fa-plus"></i> Add New Patient
                    </button>
                    
                    <button class="btn btn-info btn-sm" onclick="refreshTable()">
                        <i class="fas fa-sync"></i> Refresh
                    </button>
                </div>
            </div>
            <div class="card-body">
                <!-- Filter Section -->
                <div class="filter-section">
                    <div class="form-group">
                        <input type="text" class="form-control" id="searchInput" placeholder="🔍 Search patients...">
                    </div>
                    <div class="form-group">
                        <select class="form-select" id="statusFilter">
                            <option value="">All Status</option>
                       
                            <option value="Test Pending">Pending</option>
                            <option value="All Report Generate">Completed</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <select class="form-select" id="ageFilter">
                            <option value="">All Ages</option>
                            <option value="0-18">0-18 Years</option>
                            <option value="19-30">19-30 Years</option>
                            <option value="31-50">31-50 Years</option>
                            <option value="51+">51+ Years</option>
                        </select>
                    </div>
                    <button class="btn btn-outline-secondary btn-sm" onclick="resetFilters()">
                        <i class="fas fa-undo"></i> Reset
                    </button>
                </div>
                <!-- Table -->
                <div class="table-responsive">
                   <table class="table table-bordered table-striped" id="patientTable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Report No</th>
                                <th>Patient Name</th>
                                <th>Age</th>
                                <th>Gender</th>
                                <th>Doctor</th>
                                <th>Mobile</th>
                                <th>Address</th>
                                <th>Registration Date</th>
                                <th width="150">Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php if(!empty($patient)){ $i=1; foreach($patient as $row){ ?>
                                    <tr>
            <td><?= $i++; ?></td>
            <td>RPT<?= str_pad($row['id'],5,'0',STR_PAD_LEFT); ?></td>
            <td><?= $row['name']; ?></td>
            <td><?= $row['age']; ?></td>
            <td><?= $row['gender']; ?></td>
             <td><?= $row['doctor_name']; ?></td>
            <td><?= $row['mobile']; ?></td>
            <td><?= $row['address']; ?></td>
            <td><?= date('d-m-Y',strtotime($row['registration_date'])); ?></td>
            <td class="text-center">
          


        <a href="javascript:void(0);"
           class="btn btn-sm btn-success"
           onclick="editPatient(<?= $row['id']; ?>)"
           title="Edit">
            <i class="fas fa-edit"></i>
        </a>

        <a href="javascript:void(0);"
           class="btn btn-sm btn-danger"
           onclick="deleteReport(<?= $row['id']; ?>)"
           title="Delete">
            <i class="fas fa-trash"></i>
        </a>

            
            
           

            </td>
        </tr>
                                <?php }}else{ ?>
                           
                                <tr>
                                    <td colspan="9">
                                        <div class="text-center py-5">
                                            <i class="fas fa-user-plus fa-4x text-muted mb-3 d-block"></i>
                                            <h5>No Patients Found</h5>
                                            <p class="text-muted">Click "Add New Patient" to register your first patient</p>
                                            <button class="btn btn-primary btn-sm mt-2" data-bs-toggle="modal" data-bs-target="#patientModal" onclick="resetModalForm()">
                                                <i class="fas fa-plus"></i> Register Now
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- ==================== PATIENT MODAL ==================== -->
<div class="modal fade" id="patientModal" tabindex="-1" aria-labelledby="patientModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="patientModalLabel">
                    <i class="fas fa-user-plus"></i> 
                    <span id="modalFormTitle">Patient Registration</span>
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="patientForm" action="<?php echo base_url('admin/patient/patient_save'); ?>" method="POST" novalidate>
                <div class="modal-body">
                    <input type="hidden" id="patient_id" name="patient_id" value="">
                    
                    <!-- Personal Information -->
                    <div class="form-section">
                        <div class="form-section-title">
                            <i class="fas fa-user"></i> Personal Information
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-1">
                                <label class="form-label">Patient Name <span class="required">*</span></label>
                                <input type="text" class="form-control" id="name" name="name" 
                                       placeholder="Enter full name" required 
                                       oninput="validateField(this)">
                                <div class="form-text">Enter the patient's full name</div>
                            </div>
                            <div class="col-md-3 mb-1">
                                <label class="form-label">Age <span class="required">*</span></label>
                                <input type="number" class="form-control" id="age" name="age" 
                                       placeholder="Age" min="0" max="150" required
                                       oninput="validateField(this)">
                            </div>
                            <div class="col-md-3 mb-1">
                                <label class="form-label">Gender <span class="required">*</span></label>
                                <select class="form-select" id="gender" name="gender" required>
                                    <option value="">Select</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                    <option value="Other">Other</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-1">
                                <label class="form-label">Mobile Number <span class="required">*</span></label>
                                <input type="tel" class="form-control" id="mobile" name="mobile" 
                                       placeholder="10-digit mobile number" required
                                       pattern="[0-9]{10}" maxlength="10"
                                       oninput="validateField(this)">
                                <div class="form-text">Enter 10-digit mobile number</div>
                            </div>
                            <div class="col-md-6 mb-1">
                                <label class="form-label">Registration Date</label>
                                <input type="date" class="form-control" id="registration_date" 
                                       name="registration_date" value="<?php echo date('Y-m-d'); ?>">
                            </div>
                        </div>
                        <div class="row">
                             <div class="col-md-6">
                                <label for="" class="form-label">Select Doctor</label>
                                <select class="form-control" id="doctor" name="doctor">
                                    <option value="">Select Doctor</option>
                                    <?php foreach($doctor as $row){ ?>

                                    <option value="<?php echo $row['id']; ?>">
                                        <?php echo $row['doctor_name']; ?>
                                    </option>

                                    <?php } ?>

                                </select>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Contact Information -->
                    <div class="form-section">
                       <div class="col-md-12 mb-1">
                                <label class="form-label">Address</label>
                                <textarea type="date" class="form-control" id="address" 
                                       name="address" ></textarea>
                            </div>
                        
                        <hr>
                        <div id="sub_test_div"></div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        <i class="fas fa-times"></i> Cancel
                    </button>
                    <button type="submit" class="btn btn-primary" id="submitBtn">
                        <i class="fas fa-save"></i> <span id="submitBtnText">Save Patient</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="patientModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="patientForm">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalFormTitle">Add Patient</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">

                    <input type="hidden" name="patient_id" id="patient_id">

                    <div class="mb-3">
                        <label>Name</label>
                        <input type="text" class="form-control" id="name" name="name">
                    </div>

                    <div class="mb-3">
                        <label>Age</label>
                        <input type="text" class="form-control" id="age" name="age">
                    </div>

                    <div class="mb-3">
                        <label>Gender</label>
                        <select class="form-control" id="gender" name="gender">
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label>Mobile</label>
                        <input type="text" class="form-control" id="mobile" name="mobile">
                    </div>

                    <div class="mb-3">
                        <label>Phone</label>
                        <input type="text" class="form-control" id="phone" name="phone">
                    </div>

                    <div class="mb-3">
                        <label>Email</label>
                        <input type="email" class="form-control" id="email" name="email">
                    </div>

                    <div class="mb-3">
                        <label>Address</label>
                        <textarea class="form-control" id="address" name="address"></textarea>
                    </div>

                    <div class="mb-3">
                        <label>Status</label>
                        <select class="form-control" id="status" name="status">
                            <option value="pending">Pending</option>
                            <option value="active">Active</option>
                            <option value="inactive">Inactive</option>
                        </select>
                    </div>

                    <input type="date" id="registration_date" name="registration_date">

                </div>

                <div class="modal-footer">
                    <button class="btn btn-primary" type="submit">
                        <span id="submitBtnText">Save Patient</span>
                    </button>
                </div>

            </form>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script>

$(document).ready(function() {
    // Initialize DataTable
    var table = $('#patientTable').DataTable({
        pageLength: 10,
        responsive: true,
        ordering: true,
        language: {
            search: "Search:",
            lengthMenu: "Show _MENU_ patients per page",
            info: "Showing _START_ to _END_ of _TOTAL_ patients",
            infoEmpty: "No patients found",
            infoFiltered: "(filtered from _MAX_ total patients)"
        },
        columnDefs: [
            { targets: [0], orderData: [0, 1] },
            { targets: [8], orderable: false }
        ]
    });
                            
    // Custom Search
    $('#searchInput').on('keyup', function() {
        table.search(this.value).draw();
    });
    
    // Status Filter
    $('#statusFilter').on('change', function() {
        var status = this.value;
        table.column(9).search(status).draw();
    });
    
   
});
// Reset Modal Form
function resetModalForm() {
    $('#modalFormTitle').text('Patient Registration');
    $('#submitBtnText').text('Save Patient');
    $('#patient_id').val('');
    $('#patientForm')[0].reset();
    $('#patientForm').find('.error').removeClass('error');
    $('#patientForm').find('.success').removeClass('success');
}

// Edit Patient - Load data into modal
function editPatient(id) {

    $.ajax({
        url: "<?= base_url('admin/patient/get_patient/'); ?>" + id,
        type: "GET",
        dataType: "json",

        success: function(response) {

            console.log(response);

            if(response.status == "success"){

                let patient = response.data;

                $("#patient_id").val(patient.id);
                $("#name").val(patient.name);
                $("#age").val(patient.age);
                $("#gender").val(patient.gender);
                $("#mobile").val(patient.mobile);
                $("#phone").val(patient.phone);
                $("#email").val(patient.email);
                $("#address").val(patient.address);
                $("#doctor").val(patient.doctor);
                $("#status").val(patient.status);
                $("#registration_date").val(patient.registration_date.split(' ')[0]);

                $("#modalFormTitle").text("Edit Patient");
                $("#submitBtnText").text("Update Patient");

                // Bootstrap 5
                var modal = new bootstrap.Modal(document.getElementById("patientModal"));
                modal.show();

            }else{
                alert(response.message);
            }

        },

        error:function(xhr){
            console.log(xhr.responseText);
            alert("Unable to load patient data.");
        }

    });

}
// Delete Patient
function deleteReport(id)
{
    if(confirm("Delete this patient?"))
    {
        $.ajax({
            url: "<?= base_url('admin/patient/patient_delete/'); ?>" + id,
            type: "POST",
            dataType: "json",
            success: function(res)
            {
                if(res.status == "success")
                {
                    alert(res.message);

                    // Remove the row or reload
                    location.reload();
                }
                else
                {
                    alert(res.message);
                }
            },
            error: function(xhr)
            {
                console.log(xhr.responseText);
                alert("Something went wrong.");
            }
        });
    }
}
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
