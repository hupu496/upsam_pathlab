<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0"><i class="fas fa-box"></i> Test Master</h5>
                <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#addProductModal">
                    <i class="fas fa-plus"></i> Add New Test
                </button>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="productTable" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Test Name</th>
                                <th>Sub Test</th>
                                <th>Normal Values</th>
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
                                <td><?php echo $value['name']; ?></td>
                                <td><?php echo $value['sub_product']; ?></td>
                                <td><?php echo $value['normal_values']; ?></td>
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
                <h5 class="modal-title">
                    <i class="fas fa-box"></i> Add New Test
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <form action="<?php echo base_url('masters/add_product'); ?>" method="POST">
                <div class="modal-body">

                    <div class="row">
                        <!-- Test Name -->
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Test Name *</label>
                            <select name="product_id" id="product_id" class="form-control">
                                <option value="">--Select Test--</option>
                            <?php foreach ($maintest as $key => $value) { ?>
                                  <option value="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></option>
                             <?php   }  ?>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <div class="alert alert-info">
    Remaining Sub Tests :
    <strong id="remainingCount">0</strong>
</div>
                        </div>
                    </div>

                    <hr>

                    <h6>Sub Tests</h6>

                    <div id="subTestContainer">

                        <div class="row sub-test-row mb-2">

                            <div class="col-md-3">
                                <input type="text"
                                       class="form-control"
                                       name="sub_product[]"
                                       placeholder="Sub Test"
                                       required>
                            </div>

                            <div class="col-md-3">
                                <input type="text"
                                       class="form-control"
                                       name="normal_values[]"
                                       placeholder="Values"
                                       required>
                            </div>
                            <div class="col-md-3">
                                <input type="text"
                                       class="form-control"
                                       name="unit[]"
                                       placeholder="Measurement"
                                       required>
                            </div>

                            <div class="col-md-2">
                                <button type="button"
                                        class="btn btn-success addRow" id="addRowBtn">
                                    <i class="fas fa-plus"></i>
                                </button>
                            </div>

                        </div>

                    </div>

                </div>

                <div class="modal-footer">
                    <button class="btn btn-secondary" data-bs-dismiss="modal">
                        Cancel
                    </button>

                    <button type="submit" class="btn btn-primary" id="saveBtn">
                        Save Test
                    </button>
                </div>

            </form>
        </div>
    </div>
</div>


<div class="modal fade" id="editLabModal" tabindex="-1" role="dialog" aria-labelledby="editLabModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editLabModalLabel">Edit Test Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="editLabForm">
                    <input type="hidden" id="edit_id" name="id">
                    
                         <div class="modal-body">

                    <div class="row">
                        <!-- Test Name -->
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Test Name *</label>
                            <input type="text" class="form-control" id="edit_product_id" name="product_id" required>
                        </div>
                        
                    </div>

                    <hr>

                    <h6>Sub Tests</h6>

                    <div id="subTestContainers">

                        <div class="row sub-test-row mb-2">

                            <div class="col-md-3">
                                <input type="text"
                                       class="form-control"
                                       id="edit_sub_product"
                                       name="sub_product"
                                       placeholder="Sub Test"
                                       required>
                            </div>

                            <div class="col-md-3">
                                <input type="text"
                                       class="form-control"
                                       id="edit_normal_values"
                                       name="normal_values"
                                       placeholder="Values"
                                       required>
                            </div>
                            <div class="col-md-3">
                                <input type="text"
                                       class="form-control"
                                       id="edit_unit"
                                       name="unit"
                                       placeholder="Measurement"
                                       required>
                            </div>

                            
                        </div>

                    </div>

                </div>

                <div class="modal-footer">
                    <button class="btn btn-secondary" data-bs-dismiss="modal">
                        Cancel
                    </button>

                    <button type="submit" class="btn btn-primary">
                        Save Test
                    </button>
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
    var maxRows = 1;

$("#product_id").change(function(){

    var product_id = $(this).val();

    if(product_id==""){
        $("#remainingCount").text(0);
        maxRows = 1;
        return;
    }

    $.ajax({
        url:"<?= base_url('masters/get_remaining_subtest'); ?>",
        type:"POST",
        data:{product_id:product_id},
        dataType:"json",
        success:function(res){

    $("#remainingCount").text(res.remaining);

    maxRows = parseInt(res.remaining);

    if(res.remaining <= 0){

        alert("Maximum sub tests already added.");

        // Disable all inputs
        $("#subTestContainer")
            .find("input, select, textarea")
            .prop("disabled", true);

        // Disable + button
        $("#addRowBtn").prop("disabled", true);

        // Disable Save button
        $("#saveBtn").prop("disabled", true);

    }else{

        // Enable all inputs
        $("#subTestContainer")
            .find("input, select, textarea")
            .prop("disabled", false);

        // Enable + button
        $("#addRowBtn").prop("disabled", false);

        // Enable Save button
        $("#saveBtn").prop("disabled", false);
    }

}
    });

});
$(document).ready(function(){

$(document).on('click','.addRow',function(){

    var currentRows = $(".sub-test-row").length;

    if((currentRows - 1) >= maxRows){

        alert("Only " + maxRows + " sub tests are allowed.");

        return false;
    }

    var row = `
    <div class="row sub-test-row mb-2">

        <div class="col-md-3">
            <input type="text"
                   class="form-control"
                   name="sub_product[]"
                   placeholder="Sub Test"
                   required>
        </div>

        <div class="col-md-3">
            <input type="text"
                   class="form-control"
                   name="normal_values[]"
                   placeholder="Values"
                   required>
        </div>

        <div class="col-md-3">
            <input type="text"
                   class="form-control"
                   name="unit[]"
                   placeholder="Measurement"
                   required>
        </div>

        <div class="col-md-2">
            <button type="button" class="btn btn-danger removeRow">
                <i class="fas fa-minus"></i>
            </button>
        </div>

    </div>`;

    $("#subTestContainer").append(row);

});

    // Remove row
    $(document).on('click','.removeRow',function(){
        $(this).closest('.sub-test-row').remove();
    });

});
</script>
<script>
$(document).ready(function () {

    $("#editLabForm").on("submit", function (e) {
    
        e.preventDefault();
        console.log($(this).serialize)
        $.ajax({
            url: "<?php echo base_url('masters/product_update'); ?>",
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
                $('#edit_product_name').val(response.data.product_name);
                $('#edit_sub_product').val(response.data.sub_product);
                $('#edit_normal_values').val(response.data.normal_values);
                $('#edit_rate').val(response.data.rate);
                $('#edit_unit').val(response.data.unit);
                
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