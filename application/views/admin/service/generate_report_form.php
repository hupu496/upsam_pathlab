<style>
    .gen-report-card {
        background: white;
        border-radius: 15px;
        box-shadow: 0 2px 15px rgba(0,0,0,0.08);
        border: none;
        margin-bottom: 25px;
        overflow: hidden;
    }
    .gen-report-card .card-header {
        background: transparent;
        border-bottom: 2px solid #f8f9fc;
        padding: 18px 25px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        gap: 10px;
    }
    .gen-report-card .card-header h5 {
        margin: 0;
        font-weight: 700;
        color: #344767;
        font-size: 1.05rem;
    }
    .gen-report-card .card-header h5 i { color: #5e72e4; margin-right: 6px; }
    .gen-report-card .card-body { padding: 25px; }

    .report-meta {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 14px;
        background: #f8f9fc;
        border: 1px solid #e3e8f0;
        border-radius: 12px;
        padding: 18px;
        margin-bottom: 22px;
    }
    .report-meta .meta-item small {
        display: block;
        color: #8898aa;
        font-size: .75rem;
        text-transform: uppercase;
        letter-spacing: .4px;
        margin-bottom: 3px;
        font-weight: 600;
    }
    .report-meta .meta-item strong { color: #344767; font-size: .95rem; }

    .entry-table { width: 100%; border-collapse: collapse; }
    .entry-table thead th {
        background: #5e72e4;
        color: #fff;
        font-size: .78rem;
        text-transform: uppercase;
        letter-spacing: .5px;
        padding: 12px 14px;
        border: none;
        white-space: nowrap;
    }
    .entry-table tbody td {
        padding: 11px 14px;
        border-bottom: 1px solid #eef1f6;
        vertical-align: middle;
        color: #344767;
        font-size: .9rem;
    }
    .entry-table tbody tr:hover { background: #f8f9fc; }
    .entry-table .result-input {
        min-width: 130px;
        font-weight: 600;
        color: #2dce89;
    }
    .entry-table .sno {
        width: 50px;
        text-align: center;
        color: #8898aa;
    }
    .normal-badge {
        display: inline-block;
        background: #f0f4ff;
        color: #5e72e4;
        border-radius: 6px;
        padding: 3px 9px;
        font-size: .8rem;
        font-weight: 600;
    }
    .unit-txt { color: #8898aa; font-size: .85rem; }

    .form-actions {
        display: flex;
        gap: 12px;
        flex-wrap: wrap;
        margin-top: 24px;
        padding-top: 20px;
        border-top: 2px solid #f8f9fc;
    }

    @media (max-width: 768px) {
        .gen-report-card .card-header { flex-direction: column; align-items: stretch; }
        .entry-table { display: block; overflow-x: auto; white-space: nowrap; }
    }
</style>

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
        <div class="gen-report-card">
            <div class="card-header">
                <h5>
                    <i class="fas fa-file-medical-alt"></i> Generate Report
                    <span class="badge bg-primary ms-2">RPT<?php echo str_pad($report['report_id'],5,'0',STR_PAD_LEFT); ?></span>
                </h5>
                <a href="<?php echo base_url('admin/patient'); ?>" class="btn btn-sm btn-outline-secondary">
                    <i class="fas fa-arrow-left"></i> Back to List
                </a>
            </div>

            <div class="card-body">

                <!-- Report Summary -->
                <div class="report-meta">
                    <div class="meta-item">
                        <small>Patient Name</small>
                        <strong><?php echo $report['name']; ?></strong>
                    </div>
                    <div class="meta-item">
                        <small>Age / Gender</small>
                        <strong><?php echo $report['age']; ?> / <?php echo $report['gender']; ?></strong>
                    </div>
                    <div class="meta-item">
                        <small>Mobile</small>
                        <strong><?php echo $report['mobile']; ?></strong>
                    </div>
                    <div class="meta-item">
                        <small>Test Name</small>
                        <strong><?php echo $report['test_name']; ?></strong>
                    </div>
                    <div class="meta-item">
                        <small>Ref. By</small>
                        <strong><?php echo !empty($report['doctor_name']) ? $report['doctor_name'] : '-'; ?></strong>
                    </div>
                    <div class="meta-item">
                        <small>Report Date</small>
                        <strong><?php echo date('d-m-Y', strtotime($report['report_date'])); ?></strong>
                    </div>
                </div>

                <?php if(empty($details)){ ?>

                    <div class="text-center text-muted py-4">
                        <i class="fas fa-inbox fa-2x mb-2"></i>
                        <p class="mb-0">No sub tests found for this report.</p>
                    </div>

                <?php } else { ?>

                <form id="generateReportForm"
                      action="<?php echo base_url('admin/patient/save-report-values/'.$report['report_id']); ?>"
                      method="POST" novalidate>

                    <div class="table-responsive">
                        <table class="entry-table">
                            <thead>
                                <tr>
                                    <th class="sno">#</th>
                                    <th>Sub Test</th>
                                    <th>Enter Result Value</th>
                                    <th>Normal Value</th>
                                    <th>Unit</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i=1; foreach($details as $d){ ?>
                                <tr>
                                    <td class="sno"><?php echo $i++; ?></td>
                                    <td><strong><?php echo $d['sub_product']; ?></strong></td>
                                    <td>
                                        <input type="text"
                                               class="form-control result-input"
                                               name="result_value[<?php echo $d['id']; ?>]"
                                               value="<?php echo htmlspecialchars($d['result_value']); ?>"
                                               placeholder="Enter value">
                                    </td>
                                    <td><span class="normal-badge"><?php echo $d['normal_values']; ?></span></td>
                                    <td><span class="unit-txt"><?php echo $d['unit']; ?></span></td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>

                    <div class="form-text mt-2">
                        <i class="fas fa-info-circle"></i>
                        Enter the result value for each selected sub test, then click "Generate Report".
                    </div>

                    <div class="form-actions">
                        <button type="submit" class="btn btn-primary" id="generateBtn">
                            <i class="fas fa-file-medical-alt"></i> Generate Report
                        </button>
                        <a href="<?php echo base_url('admin/patient'); ?>" class="btn btn-outline-secondary">
                            <i class="fas fa-times"></i> Cancel
                        </a>
                    </div>

                </form>

                <?php } ?>

            </div>
        </div>
    </div>
</div>

<script>
$(document).ready(function(){

    $('#generateReportForm').on('submit', function(e){
        var valid = true;

        $('.result-input').removeClass('is-invalid');

        $('.result-input').each(function(){
            if($(this).val().trim() === ''){
                $(this).addClass('is-invalid');
                valid = false;
            }
        });

        if(!valid){
            e.preventDefault();
            alert('Please enter a value for every selected sub test.');
            return false;
        }
    });

    // Enter moves to the next result field
    $('.result-input').on('keypress', function(e){
        if(e.which === 13){
            e.preventDefault();
            var inputs = $('.result-input');
            var idx = inputs.index(this);
            if(inputs[idx + 1]){ inputs[idx + 1].focus(); }
        }
    });
});
</script>
