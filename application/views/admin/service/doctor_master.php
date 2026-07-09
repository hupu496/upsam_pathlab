<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0"><i class="fas fa-user-md"></i> Doctor Master</h5>
                <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#addDoctorModal">
                    <i class="fas fa-plus"></i> Add New Doctor
                </button>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="doctorTable" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Doctor ID</th>
                                <th>Doctor Name</th>
                                <th>Qualification</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Sample Data - Replace with database data -->
                            <tr>
                                <td>1</td>
                                <td>DOC001</td>
                                <td>Dr. John Smith</td>
                                <td>MD, PhD</td>
                                <td>dr.smith@hospital.com</td>
                                <td>+1 234 567 8920</td>
                                <td>
                                    <button class="btn btn-warning btn-sm" onclick="editDoctor(1)">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button class="btn btn-danger btn-sm" onclick="deleteDoctor(1)">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>DOC002</td>
                                <td>Dr. Sarah Johnson</td>
                                <td>MBBS, MS</td>
                                <td>dr.johnson@medical.com</td>
                                <td>+1 234 567 8921</td>
                                <td>
                                    <button class="btn btn-warning btn-sm" onclick="editDoctor(2)">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button class="btn btn-danger btn-sm" onclick="deleteDoctor(2)">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>DOC003</td>
                                <td>Dr. Michael Brown</td>
                                <td>MD, FACS</td>
                                <td>dr.brown@healthcare.com</td>
                                <td>+1 234 567 8922</td>
                                <td>
                                    <button class="btn btn-warning btn-sm" onclick="editDoctor(3)">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button class="btn btn-danger btn-sm" onclick="deleteDoctor(3)">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Add Doctor Modal -->
<div class="modal fade" id="addDoctorModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="fas fa-user-md"></i> Add New Doctor</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form action="<?php echo base_url('admin/doctor_master/add'); ?>" method="POST">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="doctor_id" class="form-label">Doctor ID *</label>
                            <input type="text" class="form-control" id="doctor_id" name="doctor_id" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="doctor_name" class="form-label">Doctor Name *</label>
                            <input type="text" class="form-control" id="doctor_name" name="doctor_name" required>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="doctor_qualification" class="form-label">Qualification *</label>
                            <input type="text" class="form-control" id="doctor_qualification" name="doctor_qualification" 
                                   placeholder="e.g., MD, PhD, MBBS, MS" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="doctor_email" class="form-label">Email *</label>
                            <input type="email" class="form-control" id="doctor_email" name="doctor_email" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="doctor_phone" class="form-label">Phone *</label>
                            <input type="tel" class="form-control" id="doctor_phone" name="doctor_phone" required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Save Doctor</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
$(document).ready(function() {
    $('#doctorTable').DataTable({
        columnDefs: [
            { targets: [0], orderData: [0, 1] },
            { targets: [1], orderData: [1, 0] },
            { targets: [2], orderData: [2, 0] }
        ]
    });
});

function editDoctor(id) {
    alert('Edit doctor with ID: ' + id);
}

function deleteDoctor(id) {
    if(confirm('Are you sure you want to delete this doctor?')) {
        alert('Delete doctor with ID: ' + id);
    }
}
</script>

