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
                            <tr>
                                <td>1</td>
                                <td>Blood Test Panel</td>
                                <td>Complete Blood Count</td>
                                <td>&#x20B9;150.00</td>
                                <td>Per Test</td>
                                <td>
                                    <button class="btn btn-warning btn-sm" onclick="editProduct(1)">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button class="btn btn-danger btn-sm" onclick="deleteProduct(1)">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Imaging Services</td>
                                <td>MRI Scan</td>
                                <td>&#x20B9;450.00</td>
                                <td>Per Session</td>
                                <td>
                                    <button class="btn btn-warning btn-sm" onclick="editProduct(2)">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button class="btn btn-danger btn-sm" onclick="deleteProduct(2)">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>COVID Testing</td>
                                <td>PCR Test</td>
                                <td>&#x20B9;85.00</td>
                                <td>Per Test</td>
                                <td>
                                    <button class="btn btn-warning btn-sm" onclick="editProduct(3)">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button class="btn btn-danger btn-sm" onclick="deleteProduct(3)">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>Health Checkup</td>
                                <td>Annual Physical</td>
                                <td>&#x20B9;200.00</td>
                                <td>Per Package</td>
                                <td>
                                    <button class="btn btn-warning btn-sm" onclick="editProduct(4)">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button class="btn btn-danger btn-sm" onclick="deleteProduct(4)">
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

<!-- Add Product Modal -->
<div class="modal fade" id="addProductModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="fas fa-box"></i> Add New Product</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form action="<?php echo base_url('admin/product_master/add'); ?>" method="POST">
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
                                <input type="number" step="0.01" class="form-control" id="value_rate" name="value_rate" required>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="measurement" class="form-label">Measurement *</label>
                            <select class="form-control" id="measurement" name="measurement" required>
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

<script>
$(document).ready(function() {
    $('#productTable').DataTable({
        columnDefs: [
            { targets: [0], orderData: [0, 1] },
            { targets: [1], orderData: [1, 0] },
            { targets: [2], orderData: [2, 0] }
        ]
    });
});

function editProduct(id) {
    alert('Edit product with ID: ' + id);
}

function deleteProduct(id) {
    if(confirm('Are you sure you want to delete this product?')) {
        alert('Delete product with ID: ' + id);
    }
}
</script>
