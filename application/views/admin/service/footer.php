                </div>
            </div>
        </div>
    </div>
    
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
   <script src="https://cdn.datatables.net/1.13.8/js/jquery.dataTables.min.js"></script>

<script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>

<!-- Excel -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>

<!-- PDF -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>

<!-- Export buttons -->
<script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.print.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <?php if($this->session->flashdata('success')): ?>
<script>
Swal.fire({
    icon: 'success',
    title: 'Success',
    text: '<?= $this->session->flashdata('success'); ?>',
    confirmButtonText: 'OK'
});
</script>
<?php endif; ?>

<?php if($this->session->flashdata('error')): ?>
<script>
Swal.fire({
    icon: 'error',
    title: 'Error',
    text: '<?= $this->session->flashdata('error'); ?>',
    confirmButtonText: 'OK'
});
</script>
<?php endif; ?>
   
  <script>
$(document).ready(function () {

    $('#patientReportTable').DataTable({

        pageLength: 10,

        lengthMenu: [
            [10, 25, 50, 100, -1],
            [10, 25, 50, 100, "All"]
        ],

        responsive: true,

        // Rendered by DataTables itself (correct colspan) - do NOT put a
        // custom empty <tr> in the tbody, it causes "Incorrect column count".
        language: {
            emptyTable: "No patient records found",
            zeroRecords: "No patient records found"
        },

        dom:
            '<"row mb-3"' +
                '<"col-md-8"B>' +
                '<"col-md-4"f>' +
            '>' +
            'rt' +
            '<"row mt-3"' +
                '<"col-md-6"l>' +
                '<"col-md-6"p>' +
            '>',

        buttons: [

            // CSV
            {
                extend: 'csvHtml5',
                text: '<i class="fa fa-file-text-o"></i> CSV',
                title: 'Patient_Report',
                filename: 'Patient_Report',
                exportOptions: {
                    columns: ':visible'
                }
            },

            // Excel
            {
                extend: 'excelHtml5',
                text: '<i class="fa fa-file-excel-o"></i> Excel',
                title: 'Patient Report',
                filename: 'Patient_Report',
                exportOptions: {
                    columns: ':visible'
                }
            },

            // PDF
            {
                extend: 'pdfHtml5',
                text: '<i class="fa fa-file-pdf-o"></i> PDF',
                title: 'Patient Report',
                filename: 'Patient_Report',

                orientation: 'landscape',

                pageSize: 'A4',

                exportOptions: {
                    columns: ':visible'
                },

                customize: function (doc) {

                    doc.defaultStyle.fontSize = 8;

                    doc.styles.tableHeader.fontSize = 8;

                    doc.styles.title.fontSize = 14;

                    doc.styles.title.bold = true;

                    doc.styles.title.alignment = 'center';

                    doc.pageMargins = [
                        20,
                        20,
                        20,
                        20
                    ];
                }
            },

            // Print
            {
                extend: 'print',
                text: '<i class="fa fa-print"></i> Print',
                title: 'Patient Report',

                exportOptions: {
                    columns: ':visible'
                }
            }

        ],

        order: [
            [9, 'desc']
        ]

    });

});
</script>
<script>
$(document).ready(function () {

    $('#doctorReportTable').DataTable({

        pageLength: 10,

        lengthMenu: [
            [10, 25, 50, 100, -1],
            [10, 25, 50, 100, "All"]
        ],

        responsive: true,

        // Rendered by DataTables itself (correct colspan) - do NOT put a
        // custom empty <tr> in the tbody, it causes "Incorrect column count".
        language: {
            emptyTable: "No report records found",
            zeroRecords: "No report records found"
        },

        // Layout
        dom:
            '<"row mb-3"' +
                '<"col-md-8"B>' +
                '<"col-md-4"f>' +
            '>' +
            'rt' +
            '<"row mt-3"' +
                '<"col-md-6"l>' +
                '<"col-md-6"p>' +
            '>',

        buttons: [

            // =========================
            // CSV
            // =========================
            {
                extend: 'csvHtml5',

                text:
                    '<i class="fa fa-file-text-o"></i> CSV',

                title: 'Doctor Wise Report',

                filename: 'Doctor_Wise_Report',

                exportOptions: {
                    columns: ':visible'
                }
            },


            // =========================
            // EXCEL
            // =========================
            {
                extend: 'excelHtml5',

                text:
                    '<i class="fa fa-file-excel-o"></i> Excel',

                title: 'Doctor Wise Report',

                filename: 'Doctor_Wise_Report',

                exportOptions: {
                    columns: ':visible'
                }
            },


            // =========================
            // PDF
            // =========================
            {
                extend: 'pdfHtml5',

                text:
                    '<i class="fa fa-file-pdf-o"></i> PDF',

                title: 'Doctor Wise Report',

                filename: 'Doctor_Wise_Report',

                orientation: 'landscape',

                pageSize: 'A4',

                exportOptions: {
                    columns: ':visible'
                },

                customize: function (doc) {

                    // Overall font
                    doc.defaultStyle.fontSize = 8;

                    // Header font
                    doc.styles.tableHeader.fontSize = 8;

                    doc.styles.tableHeader.bold = true;

                    // Title
                    doc.styles.title.fontSize = 15;

                    doc.styles.title.bold = true;

                    doc.styles.title.alignment = 'center';

                    // Margins
                    doc.pageMargins = [
                        20,
                        20,
                        20,
                        20
                    ];


                    // Table width
                    var table = doc.content.find(function (item) {

                        return item.table !== undefined;

                    });

                    if (table) {

                        table.layout = 'lightHorizontalLines';

                        table.table.widths = [
                            '5%',
                            '15%',
                            '7%',
                            '8%',
                            '13%',
                            '15%',
                            '10%',
                            '12%',
                            '15%'
                        ];

                    }

                }

            },


            // =========================
            // PRINT
            // =========================
            {
                extend: 'print',

                text:
                    '<i class="fa fa-print"></i> Print',

                title: 'Doctor Wise Report',

                exportOptions: {
                    columns: ':visible'
                },

                customize: function (win) {

                    $(win.document.body)
                        .css('font-size', '10pt');

                    $(win.document.body)
                        .find('table')
                        .addClass('table-bordered');

                    $(win.document.body)
                        .find('h1')
                        .css('text-align', 'center');

                }

            }

        ],


        // Default sorting
        order: [
            [8, 'desc']
        ]

    });

});
</script>
</body>
</html>