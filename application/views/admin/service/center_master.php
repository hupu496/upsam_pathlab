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
                           <?php
                           $i=0;
                            foreach ($center_master as $key => $value) { 
                                $i++;?>
                          <tr>
                                <td><?php echo $i; ?></td>
                                <td><?php echo $value['center_code']; ?></td>
                                <td><?php echo $value['center_name']; ?></td>
                                <td><?php echo $value['lab_code']; ?></td>
                                <td><?php echo $value['phone']; ?></td>
                                <td><?php echo $value['address']; ?></td>
                                <td><?php echo $value['email']; ?></td>
                                <td><?php echo $value['contact_person']; ?></td>
                                <td>
                                    <a class="btn btn-warning btn-sm" onclick="editcenter(<?php echo $value['id']; ?>)">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a href="<?php echo base_url('masters/center_delete/'.$value['id'].''); ?>" class="btn btn-danger btn-sm" >
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                         <?php  } ?>
                            
                           
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
            <form action="<?php echo base_url('masters/add_center'); ?>" method="POST">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label for="center_name" class="form-label">Center Name *</label>
                            <input type="text" class="form-control" id="center_name" name="center_name" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="lab_id" class="form-label">Lab ID *</label>
                            <select class="form-control" id="lab_id" name="lab_id" required>
                                <option value="">Select Lab</option>
                                <?php foreach ($lab as $key => $value) {  ?>        
                                   <option value="<?php echo $value['id']; ?>"><?php echo $value['lab_code'].' - '.$value['name']; ?></option>                          # code...
                              <?php  }  ?>
                           
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="center_phone" class="form-label">Phone *</label>
                            <input type="tel" class="form-control" id="center_phone" name="phone" pattern="[6-9]{1}[0-9]{9}"
                                maxlength="10"
                                oninput="this.value=this.value.replace(/[^0-9]/g,'').slice(0,10)" required>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="center_address" class="form-label">Address *</label>
                            <textarea class="form-control" id="center_address" name="address" rows="2" required></textarea>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="center_email" class="form-label">Email *</label>
                            <input type="email" class="form-control" id="center_email" name="email" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="center_control_person" class="form-label">Control Person *</label>
                            <input type="text" class="form-control" id="center_control_person" name="contact_person" required>
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
<!-- Edit Lab Modal -->
<div class="modal fade" id="editLabModal" tabindex="-1" role="dialog" aria-labelledby="editLabModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editLabModalLabel">Edit Center Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="editLabForm">
                    <input type="hidden" id="edit_center_id" name="id">
                    
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Center Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="edit_center_name" name="center_name" required>
                            </div>
                        </div>
                        
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">Lab Id<span class="text-danger">*</span></label>
                                <select class="form-control" id="edit_lab_id" name="lab_id" required>
                                <option value="">Select Lab</option>
                                <?php foreach ($lab as $key => $value) {  ?>        
                                   <option value="<?php echo $value['id']; ?>"><?php echo $value['lab_code'].' - '.$value['name']; ?></option>                          # code...
                              <?php  }  ?>
                           
                            </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Address <span class="text-danger">*</span></label>
                                <textarea class="form-control" id="edit_address" name="address" rows="2" required></textarea>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Phone <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="edit_phone" name="phone"pattern="[6-9]{1}[0-9]{9}"
                                maxlength="10"
                                oninput="this.value=this.value.replace(/[^0-9]/g,'').slice(0,10)" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Email <span class="text-danger">*</span></label>
                                <input type="email" class="form-control" id="edit_email" name="email" required>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Contact Person <span class="text-danger">*</span></label>
                                 <input type="text" class="form-control" id="edit_contact_person" name="contact_person" required>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" id="updateLabBtn">Update Lab</button>
            </div>
                </form>
            </div>
            
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
<script>
$(document).ready(function () {

    $("#editLabForm").on("submit", function (e) {

        e.preventDefault();

        $.ajax({
            url: "<?php echo base_url('masters/center_update'); ?>",
            type: "POST",
            data: $(this).serialize(),
            dataType: "json",

            success: function (response) {

                if (response.status === "success") {
                    alert("Updated Successfully");
                    location.reload();
                } else {
                    alert(response.message);
                }
            },

            error: function (xhr) {
                console.log(xhr.responseText);
            }
        });

    });

});
</script>
<script>
$(document).ready(function () {

    $('#labTable').DataTable({
        columnDefs: [
            { targets: [0], orderData: [0, 1] },
            { targets: [1], orderData: [1, 0] }
        ]
    });

   

});

// Edit Lab Function
function editcenter(id) {
    // Make AJAX request to get lab data
    $.ajax({
        url: '<?php echo base_url("masters/get_center_data"); ?>',
        type: 'POST',
        data: { id: id },
        dataType: 'json',
        success: function(response) {
            if (response.status === 'success') {
                // Populate the modal fields
                $('#edit_center_id').val(response.data.id);
                $('#edit_center_name').val(response.data.center_name);
                $('#edit_lab_id option').prop('selected', false);
                $('#edit_lab_id option[value="' + response.data.lab_id + '"]').prop('selected', true);
                $('#edit_address').val(response.data.address);
                $('#edit_phone').val(response.data.phone);
                $('#edit_email').val(response.data.email);
                $('#edit_contact_person').val(response.data.contact_person);
                
                // Show the modal
                $('#editLabModal').modal('show');
            } else {
                alert('Error fetching lab data');
            }
        },
        error: function() {
            alert('Error fetching lab data');
        }
    });
}

// Update Lab Function
</script>
