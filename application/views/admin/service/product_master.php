<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0"><i class="fas fa-box"></i> Product Master</h5>
                <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#addProductModal">
                    <i class="fas fa-plus"></i> Add New Product
                </button>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="productTable" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Product Name</th>
                                <th>Sub Product</th>
                                <th>Value Rate</th>
                                <th>Measurement</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Sample Data - Replace with database data -->
                             <?php $i=0; 
                             foreach ($product_master as $key => $value) {  $i++; ?>
                               <tr>
                                <td><?php echo $i; ?></td>
                                <td><?php echo $value['product_name']; ?></td>
                                <td><?php echo $value['sub_product']; ?></td>
                                <td>&#x20B9;<?php echo $value['rate']; ?></td>
                                <td><?php echo $value['unit']; ?></td>
                                <td>
                                    <a class="btn btn-warning btn-sm" onclick="edit_product(<?php echo $value['id']; ?>)">
                                        <i class="fas fa-edit"></i></a>
                                    <a href="<?php echo base_url('masters/product_delete/'.$value['id'].''); ?>" class="btn btn-danger btn-sm" >
                                        <i class="fas fa-trash"></i></a>
                                </td>
                            </tr>
                            <?php }  ?>
                           
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Add Product Modal -->
<div class="modal fade" id="addProductModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="fas fa-box"></i> Add New Product</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form action="<?php echo base_url('masters/add_product'); ?>" method="POST">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="product_name" class="form-label">Product Name *</label>
                            <input type="text" class="form-control" id="product_name" name="product_name" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="sub_product" class="form-label">Sub Product *</label>
                            <input type="text" class="form-control" id="sub_product" name="sub_product" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="value_rate" class="form-label">Value Rate *</label>
                            <div class="input-group">
                                <span class="input-group-text">&#x20B9;</span>
                                <input type="number" step="0.01" class="form-control" id="value_rate" name="rate" required>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="measurement" class="form-label">Measurement *</label>
                            <select class="form-control" id="measurement" name="unit" required>
                                <option value="">Select Measurement</option>
                                <option value="Per Test">Per Test</option>
                                <option value="Per Session">Per Session</option>
                                <option value="Per Package">Per Package</option>
                                <option value="Per Unit">Per Unit</option>
                                <option value="Per Hour">Per Hour</option>
                                <option value="Per Day">Per Day</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Save Product</button>
                </div>
            </form>
        </div>
    </div>
</div>


<div class="modal fade" id="editLabModal" tabindex="-1" role="dialog" aria-labelledby="editLabModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editLabModalLabel">Edit Product Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="editLabForm">
                    <input type="hidden" id="edit_id" name="id">
                    
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Product Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="edit_product_name" name="product_name" required>
                            </div>
                        </div>
                        
                    </div>
                   
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Sub Product<span class="text-danger">*</span></label>
                                <textarea class="form-control" id="sub_product" name="edit_sub_product" rows="2" required></textarea>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6">
                           
                                 <label for="value_rate" class="form-label">Value Rate *</label>
                            <div class="input-group">
                                <span class="input-group-text">&#x20B9;</span>
                                <input type="number" step="0.01" class="form-control" id="value_rate" name="edit_rate" required>
                            </div>
                            
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                 <label for="measurement" class="form-label">Measurement *</label>
                            <select class="form-control" id="measurement" name="unit" required>
                                <option value="">Select Measurement</option>
                                <option value="Per Test">Per Test</option>
                                <option value="Per Session">Per Session</option>
                                <option value="Per Package">Per Package</option>
                                <option value="Per Unit">Per Unit</option>
                                <option value="Per Hour">Per Hour</option>
                                <option value="Per Day">Per Day</option>
                            </select>
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
            url: "<?php echo base_url('masters/doctor_update'); ?>",
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
function edit_product(id) {
    // Make AJAX request to get lab data
    $.ajax({
        url: '<?php echo base_url("masters/get_product_master"); ?>',
        type: 'POST',
        data: { id: id },
        dataType: 'json',
        success: function(response) {
            if (response.status === 'success') {
                // Populate the modal fields
                $('#edit_id').val(response.data.id);
                $('#edit_doctor_name').val(response.data.doctor_name);
                $('#edit_qualification').val(response.data.qualification);
                $('#edit_phone').val(response.data.phone);
                $('#edit_email').val(response.data.email);
                
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