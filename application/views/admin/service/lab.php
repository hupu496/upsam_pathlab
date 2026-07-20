

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
                             <?php $i=0;
                             foreach ($lab_master as $key => $value) {
                                $i++;
                                ?>
                             <tr>
                                <td><?php echo $i; ?></td>
                                <td><?php echo $value['name'] ?></td>
                                <td><?php echo $value['lab_code']; ?></td>
                                <td><?php echo $value['address'];?></td>
                                <td><?php echo $value['phone']; ?></td>
                                <td><?php echo $value['email']; ?></td>
                                <td><?php echo $value['contact']; ?></td>
                               <td>
                                    <a class="btn btn-warning btn-sm" onclick="editLab(<?php echo $value['id']; ?>)">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a href="<?php echo base_url('masters/lab_delete/'.$value['id'].''); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this lab?')">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                              
                           <?php   }  ?>
                            
                           
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
            <form action="<?php echo base_url('masters/lab_add'); ?>" method="POST">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label for="lab_name" class="form-label">Lab Name *</label>
                            <input type="text" class="form-control" id="lab_name" name="name" required>
                        </div>
                       
                        <div class="col-md-12 mb-3">
                            <label for="lab_address" class="form-label">Address *</label>
                            <textarea class="form-control" id="lab_address" name="address" rows="2" required></textarea>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="lab_phone" class="form-label">Phone *</label>
                           <input type="tel"
                                class="form-control"
                                id="lab_phone"
                                name="phone"
                                pattern="[6-9]{1}[0-9]{9}"
                                maxlength="10"
                                oninput="this.value=this.value.replace(/[^0-9]/g,'').slice(0,10)"
                                required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="lab_email" class="form-label">Email *</label>
                            <input type="email" class="form-control" id="lab_email" name="email" required>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="control_person" class="form-label">Control Person *</label>
                            <input type="text" class="form-control" id="control_person" name="contact" required>
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
<!-- Edit Lab Modal -->
<div class="modal fade" id="editLabModal" tabindex="-1" role="dialog" aria-labelledby="editLabModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editLabModalLabel">Edit Lab Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="editLabForm">
                    <input type="hidden" id="edit_lab_id" name="id">
                    
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Lab Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="edit_lab_name" name="name" required>
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
                                <input type="text" class="form-control" id="edit_contact" name="contact" required>
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
            url: "<?php echo base_url('masters/lab_update'); ?>",
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
function editLab(id) {
    // Make AJAX request to get lab data
    $.ajax({
        url: '<?php echo base_url("masters/get_lab_data"); ?>',
        type: 'POST',
        data: { id: id },
        dataType: 'json',
        success: function(response) {
            if (response.status === 'success') {
                // Populate the modal fields
                $('#edit_lab_id').val(response.data.id);
                $('#edit_lab_name').val(response.data.name);
                $('#edit_address').val(response.data.address);
                $('#edit_phone').val(response.data.phone);
                $('#edit_email').val(response.data.email);
                $('#edit_contact').val(response.data.contact);
                
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

