<form method="GET" action="<?php echo base_url('admin/service'); ?>" class="mb-3">

    <div class="row align-items-end">

        <!-- From Date -->
        <div class="col-md-3">
            <label class="form-label">
                From Date
            </label>

            <input
                type="date"
                name="from_date"
                class="form-control"
                value="<?php echo isset($from_date) ? $from_date : ''; ?>"
            >
        </div>


        <!-- To Date -->
        <div class="col-md-3">
            <label class="form-label">
                To Date
            </label>

            <input
                type="date"
                name="to_date"
                class="form-control"
                value="<?php echo isset($to_date) ? $to_date : ''; ?>"
            >
        </div>


        <!-- Filter Button -->
        <div class="col-md-2">
            <button type="submit" class="btn btn-primary">
                <i class="fa fa-filter"></i> Filter
            </button>
        </div>


        <!-- Reset Button -->
        <div class="col-md-2">
            <a href="<?php echo base_url('admin/service'); ?>"
               class="btn btn-secondary">
                <i class="fa fa-refresh"></i> Reset
            </a>
        </div>

    </div>

</form>
<div class="card">

    <div class="card-header">
        <h5 class="mb-0">
            Patient Report
        </h5>
    </div>

    <div class="card-body">

        <div class="table-responsive">

            <table id="patientReportTable"
                   class="table table-bordered table-striped table-hover"
                   width="100%">

                <thead>
                    <tr>
                        <th>S.No</th>
                        <th>Patient Name</th>
                        <th>Age</th>
                        <th>Gender</th>
                        <th>Mobile</th>
                        <th>Doctor</th>
                        <th>Lab</th>
                        <th>Center</th>
                        <th>Test</th>
                        <th>Registration Date</th>
                        <th>Report Date</th>
                        <?php if($this->session->userdata('role')=='admin'){ ?>
                            <th>User Entry</th>
                        <?php  }  ?>
                    </tr>
                </thead>

                <tbody>

                <?php if (!empty($patient_list)) { ?>

                    <?php $i = 1; ?>

                    <?php foreach ($patient_list as $row) { ?>

                        <tr>

                            <td>
                                <?php echo $i++; ?>
                            </td>

                            <td>
                                <?php echo htmlspecialchars($row['name']); ?>
                            </td>

                            <td>
                                <?php echo htmlspecialchars($row['age']); ?>
                            </td>

                            <td>
                                <?php echo htmlspecialchars($row['gender']); ?>
                            </td>

                            <td>
                                <?php echo htmlspecialchars($row['mobile']); ?>
                            </td>

                            <td>
                                <?php echo !empty($row['doctor_name'])
                                    ? htmlspecialchars($row['doctor_name'])
                                    : '-'; ?>
                            </td>

                            <td>
                                <?php echo !empty($row['labname'])
                                    ? htmlspecialchars($row['labname'])
                                    : '-'; ?>
                            </td>

                            <td>
                                <?php echo !empty($row['center_name'])
                                    ? htmlspecialchars($row['center_name'])
                                    : '-'; ?>
                            </td>

                            <td>
                            <?php if (!empty($row['testname'])): ?>

                                <?php echo htmlspecialchars($row['testname']); ?>

                            <?php else: ?>

                                <span class="badge bg-warning text-dark">
                                    Not Generated
                                </span>

                            <?php endif; ?>
                        </td>

                            <td>
                                <?php
                                echo !empty($row['registration_date'])
                                    ? date(
                                        'd-m-Y',
                                        strtotime($row['registration_date'])
                                    )
                                    : '-';
                                ?>
                            </td>

                           <td>
                        <?php if (!empty($row['report_date'])): ?>

                            <?php
                            echo date(
                                'd-m-Y',
                                strtotime($row['report_date'])
                            );
                            ?>

                        <?php else: ?>

                            <span class="badge bg-warning text-dark">
                                Not Generated
                            </span>

                        <?php endif; ?>
                    </td>
                    <?php if($this->session->userdata('role')=='admin'){  ?>
                        <td><?php echo $row['username']; ?></td>

                   <?php }  ?>

                        </tr>

                    <?php } ?>

                <?php } else { ?>

                    <?php
                    // Must match the number of <th> in thead, otherwise
                    // DataTables throws "Incorrect column count".
                    $col_count = 11 + ($this->session->userdata('role') == 'admin' ? 1 : 0);
                    ?>
                    <tr>
                        <td colspan="<?php echo $col_count; ?>" class="text-center">
                            No patient records found
                        </td>
                    </tr>

                <?php } ?>

                </tbody>

            </table>

        </div>

    </div>

</div>