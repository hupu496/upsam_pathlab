<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0"><i class="fas fa-building"></i> Center Master</h5>
                <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#addCenterModal">
                    <i class="fas fa-plus"></i> Add New Center
                </button>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="centerTable" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Center Code</th>
                                <th>Center Name</th>
                                <th>Lab ID</th>
                                <th>Phone</th>
                                <th>Address</th>
                                <th>Email</th>
                                <th>Control Person</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Sample Data - Replace with database data -->
                            <tr>
                                <td>1</td>
                                <td>CTR001</td>
                                <td>Downtown Health Center</td>
                                <td>LAB001</td>
                                <td>+1 234 567 8910</td>
                                <td>789 Elm Street, Downtown</td>
                                <td>center@downtown.com</td>
                                <td>Ms. Emily Davis</td>
                                <td>
                                    <button class="btn btn-warning btn-sm" onclick="editCenter(1)">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button class="btn btn-danger btn-sm" onclick="deleteCenter(1)">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>CTR002</td>
                                <td>Northside Medical Center</td>
                                <td>LAB002</td>
                                <td>+1 234 567 8911</td>
                                <td>321 Pine Road, Northside</td>
                                <td>info@northside.com</td>
                                <td>Dr. Michael Brown</td>
                                <td>
                                    <button class="btn btn-warning btn-sm" onclick="editCenter(2)">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button class="btn btn-danger btn-sm" onclick="deleteCenter(2)">
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

<!-- Add Center Modal -->
<div class="modal fade" id="addCenterModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="fas fa-building"></i> Add New Center</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form action="<?php echo base_url('admin/center_master/add'); ?>" method="POST">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="center_code" class="form-label">Center Code *</label>
                            <input type="text" class="form-control" id="center_code" name="center_code" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="center_name" class="form-label">Center Name *</label>
                            <input type="text" class="form-control" id="center_name" name="center_name" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="lab_id" class="form-label">Lab ID *</label>
                            <select class="form-control" id="lab_id" name="lab_id" required>
                                <option value="">Select Lab</option>
                                <option value="LAB001">LAB001 - Central Diagnostic Lab</option>
                                <option value="LAB002">LAB002 - City Medical Lab</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="center_phone" class="form-label">Phone *</label>
                            <input type="tel" class="form-control" id="center_phone" name="center_phone" required>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="center_address" class="form-label">Address *</label>
                            <textarea class="form-control" id="center_address" name="center_address" rows="2" required></textarea>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="center_email" class="form-label">Email *</label>
                            <input type="email" class="form-control" id="center_email" name="center_email" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="center_control_person" class="form-label">Control Person *</label>
                            <input type="text" class="form-control" id="center_control_person" name="center_control_person" required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Save Center</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
$(document).ready(function() {
    $('#centerTable').DataTable({
        columnDefs: [
            { targets: [0], orderData: [0, 1] },
            { targets: [1], orderData: [1, 0] },
            { targets: [2], orderData: [2, 0] }
        ]
    });
});

function editCenter(id) {
    alert('Edit center with ID: ' + id);
}

function deleteCenter(id) {
    if(confirm('Are you sure you want to delete this center?')) {
        alert('Delete center with ID: ' + id);
    }
}
</script>
