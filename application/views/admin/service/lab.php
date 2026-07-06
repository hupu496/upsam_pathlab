

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0"><i class="fas fa-flask"></i> Lab Master</h5>
                <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#addLabModal">
                    <i class="fas fa-plus"></i> Add New Lab
                </button>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="labTable" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Lab Name</th>
                                <th>Code</th>
                                <th>Address</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>Control Person</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Sample Data - Replace with database data -->
                            <tr>
                                <td>1</td>
                                <td>Central Diagnostic Lab</td>
                                <td>LAB001</td>
                                <td>123 Main Street, City</td>
                                <td>+1 234 567 8900</td>
                                <td>info@centrallab.com</td>
                                <td>Dr. John Smith</td>
                                <td>
                                    <button class="btn btn-warning btn-sm" onclick="editLab(1)">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button class="btn btn-danger btn-sm" onclick="deleteLab(1)">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>City Medical Lab</td>
                                <td>LAB002</td>
                                <td>456 Oak Avenue, Town</td>
                                <td>+1 234 567 8901</td>
                                <td>contact@citylab.com</td>
                                <td>Dr. Sarah Johnson</td>
                                <td>
                                    <button class="btn btn-warning btn-sm" onclick="editLab(2)">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button class="btn btn-danger btn-sm" onclick="deleteLab(2)">
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

<!-- Add Lab Modal -->
<div class="modal fade" id="addLabModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="fas fa-flask"></i> Add New Lab</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form action="<?php echo base_url('admin/lab_master/add'); ?>" method="POST">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="lab_name" class="form-label">Lab Name *</label>
                            <input type="text" class="form-control" id="lab_name" name="lab_name" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="lab_code" class="form-label">Lab Code *</label>
                            <input type="text" class="form-control" id="lab_code" name="lab_code" required>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="lab_address" class="form-label">Address *</label>
                            <textarea class="form-control" id="lab_address" name="lab_address" rows="2" required></textarea>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="lab_phone" class="form-label">Phone *</label>
                            <input type="tel" class="form-control" id="lab_phone" name="lab_phone" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="lab_email" class="form-label">Email *</label>
                            <input type="email" class="form-control" id="lab_email" name="lab_email" required>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="control_person" class="form-label">Control Person *</label>
                            <input type="text" class="form-control" id="control_person" name="control_person" required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Save Lab</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
$(document).ready(function() {
    $('#labTable').DataTable({
        columnDefs: [
            { targets: [0], orderData: [0, 1] },
            { targets: [1], orderData: [1, 0] }
        ]
    });
});

function editLab(id) {
    // Implement edit functionality
    alert('Edit lab with ID: ' + id);
}

function deleteLab(id) {
    if(confirm('Are you sure you want to delete this lab?')) {
        // Implement delete functionality
        alert('Delete lab with ID: ' + id);
    }
}
</script>

