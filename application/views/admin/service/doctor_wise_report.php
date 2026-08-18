<form method="GET"
      action="<?php echo base_url('admin/service/doctor_wise'); ?>"
      class="mb-4">

    <div class="row align-items-end">

        <!-- From Date -->
        <div class="col-md-3">
            <label class="form-label fw-bold">
                From Date
            </label>

            <input
                type="date"
                name="from_date"
                class="form-control"
                value="<?php echo !empty($from_date)
                    ? htmlspecialchars($from_date)
                    : ''; ?>"
            >
        </div>


        <!-- To Date -->
        <div class="col-md-3">
            <label class="form-label fw-bold">
                To Date
            </label>

            <input
                type="date"
                name="to_date"
                class="form-control"
                value="<?php echo !empty($to_date)
                    ? htmlspecialchars($to_date)
                    : ''; ?>"
            >
        </div>


        <!-- Doctor -->
        <div class="col-md-3">

            <label class="form-label fw-bold">
                Doctor
            </label>

            <select
                name="doctor_id"
                id="doctor_id"
                class="form-select">

                <option value="">
                    All Doctors
                </option>

                <?php if (!empty($doctors)): ?>

                    <?php foreach ($doctors as $doctor): ?>

                        <option
                            value="<?php echo $doctor['id']; ?>"
                            <?php echo (
                                !empty($doctor_id) &&
                                $doctor_id == $doctor['id']
                            )
                            ? 'selected'
                            : ''; ?>
                        >

                            <?php
                            echo htmlspecialchars(
                                $doctor['doctor_name']
                            );
                            ?>

                            <?php if (!empty($doctor['doctor_code'])): ?>

                                -
                                <?php
                                echo htmlspecialchars(
                                    $doctor['doctor_code']
                                );
                                ?>

                            <?php endif; ?>

                        </option>

                    <?php endforeach; ?>

                <?php endif; ?>

            </select>

        </div>


        <!-- Filter -->
        <div class="col-md-1">

            <button
                type="submit"
                class="btn btn-primary">

                <i class="fa fa-filter"></i>

            </button>

        </div>


        <!-- Reset -->
        <div class="col-md-2">

            <a
                href="<?php echo base_url('admin/service/doctor_wise'); ?>"
                class="btn btn-secondary">

                <i class="fa fa-refresh"></i>
                Reset

            </a>

        </div>

    </div>

</form>
<div class="card">

    <div class="card-header">
        <h5 class="mb-0">
            Doctor Wise Report
        </h5>
    </div>

    <div class="card-body">

        <div class="table-responsive">

            <table
                id="doctorReportTable"
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
                        <th>Doctor Code</th>
                        <th>Test</th>
                        <th>Report Date</th>
                    </tr>
                </thead>

                <tbody>

                <?php if (!empty($doctor_report)): ?>

                    <?php $i = 1; ?>

                    <?php foreach ($doctor_report as $row): ?>

                        <tr>

                            <td>
                                <?php echo $i++; ?>
                            </td>

                            <td>
                                <?php echo htmlspecialchars(
                                    $row['patient_name']
                                ); ?>
                            </td>

                            <td>
                                <?php echo htmlspecialchars(
                                    $row['age']
                                ); ?>
                            </td>

                            <td>
                                <?php echo htmlspecialchars(
                                    $row['gender']
                                ); ?>
                            </td>

                            <td>
                                <?php echo htmlspecialchars(
                                    $row['mobile']
                                ); ?>
                            </td>

                            <td>
                                <?php echo !empty($row['doctor_name'])
                                    ? htmlspecialchars(
                                        $row['doctor_name']
                                    )
                                    : '-'; ?>
                            </td>

                            <td>
                                <?php echo !empty($row['doctor_code'])
                                    ? htmlspecialchars(
                                        $row['doctor_code']
                                    )
                                    : '-'; ?>
                            </td>

                            <td>
                                <?php echo !empty($row['test_name'])
                                    ? htmlspecialchars(
                                        $row['test_name']
                                    )
                                    : '-'; ?>
                            </td>

                            <td>
                                <?php
                                echo !empty($row['report_date'])
                                    ? date(
                                        'd-m-Y',
                                        strtotime(
                                            $row['report_date']
                                        )
                                    )
                                    : '-';
                                ?>
                            </td>

                        </tr>

                    <?php endforeach; ?>

                <?php else: ?>

                    <tr>
                        <td
                            colspan="9"
                            class="text-center">

                            No report records found

                        </td>
                    </tr>

                <?php endif; ?>

                </tbody>

            </table>

        </div>

    </div>

</div>