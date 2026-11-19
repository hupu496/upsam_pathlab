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
                    <i class="fas fa-users"></i> Patient Test List
                    <span class="badge bg-primary ms-2"><?php echo isset($reports) ? count($reports) : 0; ?></span>
                </h5>
                <div class="d-flex gap-2 flex-wrap">
                    <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#patientModal" onclick="resetModalForm()">
                        <i class="fas fa-plus"></i> Create New Patient Test
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
                                <th>Mobile</th>
                                <th>Test Name</th>
                                <th>Enter Date</th>
                                <th width="150">Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php if(!empty($reports)){ $i=1; foreach($reports as $row){ ?>
                                    <tr>
            <td><?= $i++; ?></td>
            <td>RPT<?= str_pad($row['id'],5,'0',STR_PAD_LEFT); ?></td>
            <td><?= $row['name']; ?></td>
            <td><?= $row['age']; ?></td>
            <td><?= $row['gender']; ?></td>
            <td><?= $row['mobile']; ?></td>
            <td><?= $row['test_name']; ?></td>
            <td><?= date('d-m-Y',strtotime($row['report_date'])); ?></td>

            <td class="text-center">

                <?php $isGenerated = isset($row['status']) && (int)$row['status'] === 1; ?>

                <?php if(!$isGenerated){ ?>

                <a href="<?= base_url('admin/patient/generate-report/'.$row['id']); ?>"
                   class="btn btn-sm btn-primary"
                   title="Enter values and generate report">
                    <i class="fas fa-file-medical-alt"></i> Save Report
                </a>

                <?php } else { ?>

                <a href="<?= base_url('admin/patient/print/'.$row['id']); ?>"
                   target="_blank"
                   class="btn btn-sm btn-success"
                   title="Print">
                    <i class="fas fa-print"></i>
                </a>

               <a href="javascript:void(0);"
                class="btn btn-sm btn-danger"
                onclick="deleteReport(<?= $row['id']; ?>)"
                title="Delete">
                    <i class="fas fa-trash"></i>
                </a>

                <?php } ?>

            </td>
        </tr>
                                <?php }}else{ ?>
                           
                                <tr>
                                    <td colspan="9">
                                        <div class="text-center py-5">
                                            <i class="fas fa-user-plus fa-4x text-muted mb-3 d-block"></i>
                                            <h5>No Patients Test Found</h5>
                                            <p class="text-muted">Click "Add New Patient Test" to register your first patient</p>
                                            <button class="btn btn-primary btn-sm mt-2" data-bs-toggle="modal" data-bs-target="#patientModal" onclick="resetModalForm()">
                                                <i class="fas fa-plus"></i> Patient Test
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
                    <span id="modalFormTitle">Create Test</span>
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="patientForm" action="<?php echo base_url('admin/patient/save'); ?>" method="POST" novalidate>
                <div class="modal-body">
                    <!-- Contact Information -->
                    <div class="form-section">
                        <div class="row">
                            <div class="col-md-6 mb-1">
                                <label class="form-label">Report Date</label>
                                <input type="date" class="form-control" id="registration_date" 
                                       name="registration_date" value="<?php echo date('Y-m-d'); ?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-2">
                                <label class="form-label">Search Patient by Mobile</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="mobile_search"
                                           name="mobile_search" placeholder="Type mobile number to filter..." maxlength="15" autocomplete="off">
                                    <button class="btn btn-outline-primary" type="button" id="mobileSearchBtn">
                                        <i class="fas fa-search"></i> Search
                                    </button>
                                </div>
                                <div id="mobile_search_result" class="mt-2"></div>
                            </div>
                        </div>
                        <div class="row">
                             <div class="col-md-6">
                                <label for="" class="form-label">Select Patient</label>
                                <select class="form-control" id="patient_id" name="patient_id">
                                    <option value="">Select Patient</option>
                                    <?php foreach($patient_list as $row){ ?>

                                    <option value="<?php echo $row['id']; ?>">
                                        <?php echo $row['name']; ?>
                                    </option>

                                    <?php } ?>

                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="" class="form-label">Select Test</label>
                                <select class="form-control" id="test_id" name="test_id">
                                    <option value="">Select Test</option>
                                    <?php foreach($product_master as $row){ ?>

                                    <option value="<?php echo $row['test_id']; ?>">
                                        <?php echo $row['name']; ?>
                                    </option>

                                    <?php } ?>

                                </select>
                            </div>
                        </div>
                        <hr>
                        <div id="sub_test_div"></div>
                    </div>
                    <span></span>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        <i class="fas fa-times"></i> Cancel
                    </button>
                    <button type="submit" class="btn btn-primary" id="submitBtn">
                        <i class="fas fa-save"></i> <span id="submitBtnText">Save Test</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script>
// Patient list embedded for instant "type-to-filter" search (no server round-trip)
var PATIENTS = <?php echo json_encode(array_map(function($p){
    return array(
        'id'      => $p['id'],
        'name'    => $p['name'],
        'mobile'  => isset($p['mobile']) ? (string)$p['mobile'] : '',
        'age'     => isset($p['age']) ? $p['age'] : '',
        'gender'  => isset($p['gender']) ? $p['gender'] : '',
        'address' => isset($p['address']) ? $p['address'] : ''
    );
}, isset($patient_list) ? $patient_list : array())); ?>;
$(document).ready(function(){
    $("#test_id").change(function(){
        var product_id = $(this).val();
        console.log(product_id);
        $.ajax({
            url:"<?php echo base_url('get-sub-test'); ?>",
            type:"POST",
            data:{
                product_id:product_id
            },
            dataType:"json",
            success:function(response){

                var html='';
                html+='<table class="table table-bordered">';
                html+='<tr>';
                html+='<th width="50"><input type="checkbox" id="checkAllSub" checked title="Select All"></th>';
                html+='<th>Sub Test</th>';
                html+='<th>Result</th>';
                html+='<th>Normal Value</th>';
                html+='<th>Unit</th>';
                html+='</tr>';

                $.each(response,function(i,row){

                    html+='<tr>';

                    html+='<td class="text-center">';
                    html+='<input type="checkbox" class="sub_check" name="sub_product_id[]" value="'+row.id+'" checked>';
                    html+='</td>';

                    html+='<td>';
                    html+=row.sub_product;
                    html+='</td>';

                    html+='<td>';
                    html+='<input type="text" class="form-control result_input" name="result_value['+row.id+']" value="00">';
                    html+='</td>';

                    html+='<td>'+row.normal_values+'</td>';

                    html+='<td>'+row.unit+'</td>';

                    html+='</tr>';

                });

                html+='</table>';
                html+='<div class="form-text">Tick the sub tests to include in the report. Unchecked rows are not saved.</div>';

                $("#sub_test_div").html(html);

            },

            error:function(xhr){
                console.log(xhr.responseText);
            }

        });

    });

    // Select all / unselect all sub test checkboxes (delegated - table is re-rendered)
    $(document).on('change', '#checkAllSub', function(){
        $('.sub_check').prop('checked', $(this).is(':checked'));
    });
    $(document).on('change', '.sub_check', function(){
        var total = $('.sub_check').length;
        var checked = $('.sub_check:checked').length;
        $('#checkAllSub').prop('checked', total > 0 && total === checked);
    });

    // ===== Live patient search: type mobile number -> auto filter -> list shows below =====
    var searchTimer = null;

    function renderPatientResults(patients, query){
        if(!query){
            $('#mobile_search_result').html('');
            return;
        }

        if(patients.length === 0){
            $('#mobile_search_result').html('<div class="text-danger small">No patient found with this mobile number.</div>');
            return;
        }

        var html = '<div class="list-group">';
        $.each(patients, function(i, p){
            html += '<button type="button" class="list-group-item list-group-item-action patient-pick" data-id="'+p.id+'" data-name="'+String(p.name).replace(/"/g,'&quot;')+'">';
            html += '<strong>'+p.name+'</strong> ('+(p.gender||'')+', '+(p.age||'')+')<br>';
            html += '<small class="text-muted">'+(p.mobile||'')+' &middot; '+(p.address||'')+'</small>';
            html += '</button>';
        });
        html += '</div>';
        $('#mobile_search_result').html(html);

        // Auto select when exactly one match
        if(patients.length === 1){
            selectPatient(patients[0].id);
        }
    }

    function filterPatientsByMobile(){
        var query = $('#mobile_search').val().trim();

        if(query === ''){
            $('#mobile_search_result').html('');
            return;
        }

        // Match mobile number starting with / containing the typed digits
        var matches = $.grep(PATIENTS, function(p){
            return String(p.mobile || '').indexOf(query) !== -1;
        });

        renderPatientResults(matches, query);
    }

    // Automatic filtering while typing (debounced)
    $('#mobile_search').on('input', function(){
        clearTimeout(searchTimer);
        searchTimer = setTimeout(filterPatientsByMobile, 250);
    });

    // Search button / Enter key still works as an explicit trigger
    function searchPatientByMobile(){
        clearTimeout(searchTimer);
        filterPatientsByMobile();
    }

    function selectPatient(id){
        if($('#patient_id option[value="'+id+'"]').length === 0){
            // patient may not be in the loaded list - add it
            var name = $('.patient-pick[data-id="'+id+'"]').data('name') || '';
            $('#patient_id').append($('<option>').val(id).text(name || ('Patient #'+id)));
        }
        $('#patient_id').val(id);
        $('#mobile_search_result').html('<div class="text-success small"><i class="fas fa-check-circle"></i> Patient selected.</div>');
    }

    $('#mobileSearchBtn').on('click', searchPatientByMobile);
    $('#mobile_search').on('keypress', function(e){
        if(e.which === 13){ e.preventDefault(); searchPatientByMobile(); }
    });
    $(document).on('click', '.patient-pick', function(){
        selectPatient($(this).data('id'));
    });

});
$(document).ready(function() {
    // Initialize DataTable
    var table = $('#patientTable').DataTable({
        pageLength: 10,
        responsive: true,
        ordering: true,
        // Keep the server-side report_date DESC order as-is on load
        order: [],
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
        table.column(7).search(status).draw();
    });
    
    // Age Filter
    $('#ageFilter').on('change', function() {
        var range = this.value;
        if (range) {
            var parts = range.split('-');
            if (parts.length === 2) {
                var min = parseInt(parts[0]);
                var max = parseInt(parts[1]);
                $.fn.dataTable.ext.search.push(
                    function(settings, data, dataIndex) {
                        var age = parseInt(data[3]) || 0;
                        if (range === '51+') {
                            return age >= 51;
                        }
                        return age >= min && age <= max;
                    }
                );
                table.draw();
                $.fn.dataTable.ext.search.pop();
            }
        } else {
            table.draw();
        }
    });
    
    // Form validation on submit
    $('#patientForm').on('submit', function(e) {
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
        
        // Additional validation for mobile
        var mobile = $('#mobile').val();
        if (mobile && !/^[0-9]{10}$/.test(mobile)) {
            $('#mobile').addClass('error');
            isValid = false;
            showToast('Please enter a valid 10-digit mobile number', 'error');
        }
        
        if (!isValid) {
            e.preventDefault();
            showToast('Please fill in all required fields correctly.', 'error');
            return false;
        }
    });
    
    // Reset modal when closed
    $('#patientModal').on('hidden.bs.modal', function() {
        resetModalForm();
    });
});

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

// Reset Modal Form
function resetModalForm() {
    $('#modalFormTitle').text('Create Test');
    $('#submitBtnText').text('Save Test');
    $('#patient_id').val('');
    $('#patientForm')[0].reset();
    $('#patientForm').find('.error').removeClass('error');
    $('#patientForm').find('.success').removeClass('success');
    $('#mobile_search').val('');
    $('#mobile_search_result').html('');
    $('#sub_test_div').html('');
}

// Edit Patient - Load data into modal
function editPatient(id) {
    $.ajax({
        url: '<?php echo base_url("admin/patient/get"); ?>/' + id,
        type: 'GET',
        dataType: 'json',
        success: function(data) {
            if (data.status === 'success') {
                var patient = data.data;
                $('#modalFormTitle').text('Edit Patient - ' + patient.name);
                $('#submitBtnText').text('Update Patient');
                $('#patient_id').val(patient.id);
                $('#name').val(patient.name);
                $('#age').val(patient.age);
                $('#gender').val(patient.gender);
                $('#mobile').val(patient.mobile);
                $('#phone').val(patient.phone);
                $('#email').val(patient.email);
                $('#address').val(patient.address);
                $('#status').val(patient.status || 'pending');
                $('#registration_date').val(patient.registration_date || '<?php echo date("Y-m-d"); ?>');
                
                // Open modal
                $('#patientModal').modal('show');
                showToast('Patient data loaded for editing', 'success');
            } else {
                showToast('Error loading patient data', 'error');
            }
        },
        error: function() {
            showToast('Error loading patient data', 'error');
        }
    });
}

// View Patient
function viewPatient(id) {
    window.location.href = '<?php echo base_url("admin/patient/view"); ?>/' + id;
}

// Delete Patient
function deleteReport(id)
{
    if(confirm("Delete this report?"))
    {
        $.ajax({
            url: "<?= base_url('admin/patient/delete/'); ?>" + id,
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

// Print Patient Details
function printPatient(id) {
    window.open('<?php echo base_url("admin/patient/print"); ?>/' + id, '_blank');
}

// Validate Field
function validateField(element) {
    if (element.value && element.value.trim() !== '') {
        $(element).removeClass('error').addClass('success');
    } else {
        $(element).removeClass('success').addClass('error');
    }
}

// Reset Filters
function resetFilters() {
    $('#searchInput').val('');
    $('#statusFilter').val('');
    $('#ageFilter').val('');
    $('#patientTable').DataTable().search('').columns().search('').draw();
}

// Export Patients
function exportPatients() {
    window.location.href = '<?php echo base_url("admin/patient/export"); ?>';
}

// Refresh Table
function refreshTable() {
    location.reload();
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
