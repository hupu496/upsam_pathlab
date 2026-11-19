<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pathology Report · UPASAMI</title>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      background: #eef2f8;
      font-family: 'Segoe UI', Roboto, system-ui, -apple-system, sans-serif;
      padding: 28px 16px;
     
    }

    /* main card – exactly like the image layout */
    .report-card {
      max-width: 1000px;
      width: 100%;
      background: #ffffff;
      border-radius: 28px;
      box-shadow: 0 16px 48px rgba(0, 20, 40, 0.14);
      overflow: hidden;
      border: 1px solid #dde5ef;
      position: relative;
    }

    /* ----- watermark (image) exactly like screenshot style ----- */
    .report-body {
      position: relative;
    }

    .report-body::before {
      content: '';
      position: absolute;
      left: 50%;
      top: 50%;
      width: 420px;
      height: 300px;
      transform: translate(-50%, -50%);
      background: url('<?php echo base_url('assets/images/doctor_icon.png'); ?>') no-repeat center;
      background-size: contain;
      opacity: .12;
      pointer-events: none;
    }

    /* ----- top header with border.png background ----- */
    .brand-header {
      background: url('<?php echo base_url('assets/images/border.png'); ?>') no-repeat center / 100% 100%;
      padding: 22px 28px 18px 28px;
      border-bottom: 2px solid #e6edf7;
      display: flex;
      flex-wrap: wrap;
      justify-content: space-between;
      align-items: center;
      position: relative;
      min-height: 110px;
    }
/* left group: doctor icon + brand-left */
    .header-left {
      display: flex;
      align-items: center;
      gap: 12px;
      flex-wrap: wrap;
      background: rgba(255, 255, 255, 0.6);
      padding: 6px 18px 6px 12px;
      border-radius: 40px;
      backdrop-filter: blur(2px);
    }
      .doctor-icon {
      height: 52px;
      width: auto;
      filter: drop-shadow(0 2px 4px rgba(0,0,0,0.08));
    }
    .brand-left {
      display: flex;
      flex-direction: column;
      
    }

    .brand-name {
      font-size: 2.0rem;
      font-weight: 700;
      letter-spacing: 1px;
      color: #0d1f3a;
      line-height: 1.1;
    }

    .brand-name small {
      font-size: 0.8rem;
      font-weight: 400;
      color: #2c4b74;
      margin-left: 12px;
      background: #e3ebf6;
      padding: 0 14px;
      border-radius: 40px;
      letter-spacing: 0.3px;
       white-space: nowrap;
    }

    .brand-sub {
      font-size: 0.9rem;
      font-weight: 500;
      color: #1e3a5f;
      margin-top: 2px;
    }

    .brand-sub span {
      background: #eef4fd;
      padding: 0 12px;
      border-radius: 30px;
      font-weight: 400;
      color: #1c375a;
      white-space: nowrap;
    }

    .brand-right {
      text-align: right;
      font-size: 0.9rem;
      color: #1c3453;
      line-height: 1.6;
      font-weight: 500;
      background: rgba(255, 255, 255, 0.7);
      
      border-radius: 40px;
      backdrop-filter: blur(2px);
    }

     .brand-right .phone {
      font-weight: 600;
      color: #0b1f3d;
      background: #e6eefa;
      padding: 0 12px;
      border-radius: 30px;
      display: inline-block;
    }

     .brand-right .email {
      font-weight: 400;
      font-size: 0.8rem;
      color: #2d4b74;
      display: block;
    }

    /* ----- doctor icon (left) & logo (right) inside header ----- */
    .header-icons {
      display: flex;
      align-items: center;
      gap: 8px;
    }

    .doctor-icon {
      height: 50px;
      width: auto;
      filter: drop-shadow(0 2px 4px rgba(0,0,0,0.1));
    }
 /* right group: icon.png + brand-right */
    .header-right {
      display: flex;
      align-items: center;
      gap: 10px;
      background: rgba(255, 255, 255, 0.6);
      padding: 4px 18px 4px 52px;
      border-radius: 40px;
      backdrop-filter: blur(2px);
      flex-wrap: wrap;
      justify-content: flex-end;
    }

     .logo-icon {
      height: 48px;
      width: auto;
    }

    /* ----- patient info grid (exactly like screenshot) ----- */
    .patient-header {
      padding: 20px 28px 14px 28px;
      background: #fafcff;
      border-bottom: 2px solid #eef3fa;
    }

    .patient-grid {
      display: grid;
      grid-template-columns: 1fr 1.8fr 0.8fr 1.2fr;
      gap: 6px 10px;
      align-items: baseline;
      font-size: 1.0rem;
    }

    .patient-grid .label {
      font-weight: 600;
      color: #1a2b47;
      letter-spacing: 0.02em;
    }

    .patient-grid .value {
      font-weight: 500;
      color: #0a1c38;
    }

    .ref-row {
      grid-column: 1 / 2;
      font-weight: 600;
      color: #1a2b47;
    }

    .ref-doctor {
      grid-column: 2 / 5;
      font-weight: 500;
      color: #0a1c38;
    }

    .collection-label {
      grid-column: 1 / 2;
      font-weight: 600;
      color: #1a2b47;
    }

    .collection-date {
      grid-column: 2 / 3;
      font-weight: 500;
      color: #0a1c38;
    }

    .report-label {
      grid-column: 3 / 4;
      font-weight: 600;
      color: #1a2b47;
    }

    .report-date {
      grid-column: 4 / 5;
      font-weight: 500;
      color: #0a1c38;
    }

    /* ----- division bar + borderline.png ----- */
    .division-bar {
      padding: 14px 28px 6px 28px;
      display: flex;
      flex-wrap: wrap;
      justify-content: space-between;
      align-items: center;
      background: #f8fafe;
      background-image: url('<?php echo base_url('assets/images/borderline.png'); ?>');
      background-repeat: repeat-x;
      background-position: bottom left;
      background-size: auto 4px;
    }

    .division-title {
      font-weight: 700;
      font-size: 1.3rem;
      color: #16253f;
      letter-spacing: 0.2px;
    }

    .division-title small {
      font-weight: 400;
      font-size: 0.8rem;
      color: #3c5277;
      margin-left: 12px;
      background: #e7eefa;
      padding: 2px 18px;
      border-radius: 40px;
    }

    .result-badge {
      font-weight: 600;
      color: #0f402b;
      background: #e1efe8;
      padding: 4px 24px;
      border-radius: 40px;
      font-size: 1rem;
    }

    /* ----- test results (exactly the columns) ----- */
    .report-body {
      padding: 10px 28px 22px 28px;
    }

    .cbc-section h4 {
      font-size: 1.1rem;
      font-weight: 700;
      color: #14243f;
      border-bottom: 2px dashed #c6d2e6;
      padding-bottom: 8px;
      margin: 10px 0 16px 0;
    }

    .test-grid {
      display: grid;
      grid-template-columns: 1fr 0.9fr 1fr;
      gap: 2px 14px;
      font-size: 0.96rem;
      align-items: baseline;
    }

    .test-item {
      display: contents;
    }

    .test-name {
      font-weight: 500;
      color: #1a2c47;
      padding: 6px 0;
      border-bottom: 1px solid #eff3fc;
    }

    .test-value {
      font-weight: 600;
      color: #0b1f3d;
      padding: 6px 0;
      border-bottom: 1px solid #eff3fc;
    }

    .test-range {
      color: #445577;
      font-size: 0.88rem;
      padding: 6px 0;
      border-bottom: 1px solid #eff3fc;
    }

    .inline-chip {
      background: #e7eefa;
      border-radius: 30px;
      padding: 0 12px;
      font-size: 0.75rem;
      font-weight: 500;
      color: #2d3e60;
      margin-left: 6px;
    }

    /* ----- footnote / signature (like image) ----- */
    .footnote-area {
      margin-top: 24px;
      border-top: 1px solid #dce4f0;
      padding-top: 16px;
      display: flex;
      justify-content: space-between;
      align-items: center;
      flex-wrap: wrap;
      gap: 12px;
      background: #fafcff;
      padding: 14px 18px;
      border-radius: 20px;
      font-size: 0.85rem;
      color: #1e2f50;
    }

    .footnote-area .disclaimer {
      color: #3d5277;
    }

    .signature-box {
      display: inline-flex;
      align-items: center;
      background: #eef3fc;
      padding: 4px 20px 4px 16px;
      border-radius: 40px;
      font-weight: 500;
      color: #1f2b47;
      font-size: 0.85rem;
      gap: 6px;
    }

    .signature-box .sig-icon {
      background: #cdd9ec;
      border-radius: 30px;
      padding: 0 10px;
      font-weight: 600;
    }

    .signature {
      text-align: right;
      margin-top: 10px;
    }

    .signature img {
      height: 60px;
      display: block;
      margin-left: auto;
    }

    .signature b {
      display: block;
      margin-top: 4px;
      font-size: 0.9rem;
      color: #1a2b47;
    }

    /* ----- page footer (exactly like original) ----- */
    .page-footer {
      background: #f4f8ff;
      padding: 10px 28px;
      border-top: 1px solid #d3ddea;
      display: flex;
      justify-content: space-between;
      align-items: center;
      flex-wrap: wrap;
      gap: 10px;
      font-size: 0.8rem;
      color: #34507a;
    }

    .page-footer .footer-left {
      display: flex;
      align-items: center;
      gap: 14px;
    }

    .page-footer .footer-left .sep {
      color: #9aafcc;
    }

    .page-footer .footer-right {
      background: #e8eff9;
      padding: 3px 20px;
      border-radius: 40px;
      font-weight: 500;
    }

    .footer-extra{
        display:block !important;
        text-align:left !important;
        padding:10px 20px;
    }

    .footer-extra > div{
        width:100%;
    }

    /* ----- responsive (same as original) ----- */
    @media (max-width: 700px) {
              .brand-header {
        flex-direction: column;
        align-items: stretch;
        gap: 8px;
      }
      .header-left, .header-right {
        width: 100%;
        justify-content: center;
        border-radius: 30px;
        padding: 8px 12px;
      }
      .header-right {
        justify-content: center;
        flex-wrap: wrap;
      }
      .brand-right {
        text-align: center;
      }
      .brand-right .email {
        display: inline-block;
      }
      .patient-grid {
        grid-template-columns: 1fr 1.2fr;
        gap: 4px 6px;
      }
      .ref-doctor {
        grid-column: 2 / 3;
      }
      .collection-date {
        grid-column: 2 / 3;
      }
      .report-label {
        grid-column: 1 / 2;
      }
      .report-date {
        grid-column: 2 / 3;
      }
      .test-grid {
        grid-template-columns: 1fr 0.8fr;
        gap: 2px 8px;
      }
      .test-range {
        grid-column: 1 / 3;
        border-bottom: 1px solid #eaeef6;
        padding-left: 4px;
        font-size: 0.8rem;
      }
      .division-bar {
        flex-direction: column;
        align-items: flex-start;
        gap: 6px;
      }
      
      .page-footer {
        flex-direction: column;
        align-items: flex-start;
      }
    }

    @media (max-width: 480px) {
      .brand-name {
        font-size: 1.5rem;
      }
      .brand-name small {
        display: block;
        margin-left: 0;
        margin-top: 4px;
        white-space: normal;
      }
      .brand-sub span {
        white-space: normal;
        display: inline-block;
        margin-top: 4px;
      }
      .patient-header {
        padding: 14px;
      }
      .report-body {
        padding: 8px 14px 20px 14px;
      }
      .division-bar {
        padding: 10px 14px 2px 14px;
      }
      .brand-header {
        padding: 14px;
      }
    }
    @media print {
      body {
        background: white;
        padding: 0.2in;
      }
      .report-card {
        border: 1px solid #ccc;
        box-shadow: none;
        border-radius: 0;
      }
      .report-body::before {
        opacity: 0.06;
      }
    }
    .action-bar{

    width:100%;

    display:flex;

    justify-content:center;

    align-items:center;

    gap:15px;

    margin:20px auto;

    position:sticky;

    top:10px;

    z-index:999;

}

/* Buttons */

.btn{

    border:none;

    padding:12px 30px;

    color:#fff;

    border-radius:5px;

    cursor:pointer;

    font-size:16px;

    font-weight:bold;

}

.btn-print{

    background:#198754;

}

.btn-download{

    background:#0d6efd;

}

.btn:hover{

    opacity:.9;

}

/* Report */

#reportContent{

    max-width:900px;

    margin:0 auto;

}

.report-card{

    background:#fff;

    padding:20px;

    box-shadow:0 0 10px rgba(0,0,0,.15);

}

/* Hide buttons while printing */

@media print{

.no-print{

display:none !important;

}

body{

background:#fff;

padding:0;

margin:0;

}

#reportContent{

width:100%;

max-width:100%;

margin:0;

}

.report-card{

box-shadow:none;

padding:0;

}

}
  </style>
</head>
<body>
<div class="action-bar no-print">

    <button class="btn btn-print" onclick="printReport()">
        <i class="fa fa-print"></i> Print Report
    </button>

    <button class="btn btn-download" onclick="downloadReport()">
        <i class="fa fa-download"></i> Download PDF
    </button>

</div>
<div class="report-card" id="reportContent">
  <!-- report content -->
  <div class="report-content">
    <!-- ===== header: border.png background + doctor icon + logo ===== -->
    <div class="brand-header">
        
      <div class="header-left">
        <!-- doctor_icon.png (left) -->
        <img src="<?php echo base_url('assets/images/doctor_icon.png'); ?>" alt="doctor icon" class="doctor-icon">
        <div class="brand-left">
          <div class="brand-name">
            UPASAM <small>Diagnostic X-Ray &amp; Physiotherapy</small>
          </div>
          <div class="brand-sub">
            Main Road Ghatsila · Near Ghatsila Post Office, (E-Singhbulm)
          </div>
        </div>
      </div>
      <div class="header-right">
        <!-- icon.png (top-right) -->
        <img src="<?php echo base_url('assets/images/icon.png'); ?>" alt="UPASAM logo" class="logo-icon">
        <div class="brand-right">
          <div class="phone">📞 9576110600, 6299536145 &amp; 8340493304</div>
          <div class="email">✉ upasam.gts@gmail.com</div>
        </div>
      </div>
    </div>

    <!-- ===== patient info grid ===== -->
    <div class="patient-header">
      <div class="patient-grid">
        <div class="label">Patient’s Name</div>
        <div class="value"><?php echo htmlspecialchars($patient['name'] ?? 'N/A'); ?></div>
        <div class="label"><?php echo $patient['age']; ?>/<?php echo $patient['gender']; ?></div>
        <div class="value">Patient’s ID:<?php echo $patient['patient_id']; ?></div>

        <div class="ref-row">Ref By. Dr.</div>
        <div class="ref-doctor"><?php echo $patient['doctor_name']; ?></div>

        <div class="collection-label">Collection Date</div>
        <div class="collection-date"><?php 
                        $reportDate = $patient['registration_date'] ?? '';
                        if (!empty($reportDate)) {
                            echo date('M d, Y', strtotime($reportDate));
                        } else {
                            echo '—';
                        }
                    ?></div>

        <div class="report-label">Reporting Date</div>
        <div class="report-date"> <?php 
                        $reportDate = $patient['report_date'] ?? '';
                        if (!empty($reportDate)) {
                            echo date('M d, Y', strtotime($reportDate));
                        } else {
                            echo '—';
                        }
                    ?></div>
      </div>
    </div>

    <!-- ===== division bar with borderline.png ===== -->
    <div class="division-bar">
      <div class="division-title">
        🧪 Pathology Division
        <small>INVESTIGATION · RESULT · NORMAL</small>
      </div>
      <div class="result-badge">✔ NORMAL</div>
    </div>

    <!-- ===== test results with watermark ===== -->
    <div class="report-body">
      <div class="cbc-section">
        <h4>🩸 <?php echo $patient['test_name']; ?></h4>
        <div class="test-grid">
          <!-- header row -->
          <div class="test-item"><span class="test-name" style="font-weight:700;">INVESTIGATION</span></div>
          <div class="test-item"><span class="test-value" style="font-weight:700;">RESULT</span></div>
          <div class="test-item"><span class="test-range" style="font-weight:700;">NORMAL</span></div>
          <?php foreach($details as $row){ ?>
          <!-- Haemoglobin -->
          <div class="test-item"><span class="test-name"><?php echo $row['sub_product']; ?></span></div>
          <div class="test-item"><span class="test-value"><?php echo $row['result_value']; ?>
                    <?php echo $row['unit']; ?></span></div>
          <div class="test-item"><span class="test-range"> <?php echo $row['normal_values']; ?></span></div>
          <?php } ?>
        </div>
      </div>

      <!-- ===== footnote / signature with lab_sign.png ===== -->
      <div class="footnote-area">
        <div class="disclaimer">
          <span style="background:#eef3fc; padding:2px 14px; border-radius:30px;">🔬</span> 
          Used and variation in procedure. Any discrepancy may kindly brought to notice <br>
           ⚕️ Not meant for Medico Legal Purpose
        </div>
        <div class="signature">
          <img src="<?php echo base_url('assets/images/lab_sign.png'); ?>" alt="lab signature">
          <!-- <b>Pathologist/Lab. Technician.</b> -->
        </div>
      </div>
    </div> <!-- /report-body -->

<!-- ===== page footer with facility info & border2.png background ===== -->


<!-- ===== extra footer with facility details (same as screenshot) ===== -->
<div class="footer-extra" style="
    border-bottom-left-radius: 28px; border-bottom-right-radius: 28px;font-size: 0.8rem; ">
  <div style="display: flex; flex-wrap: wrap; justify-content: space-between; align-items: center; gap: 8px;">
    <span style="font-weight: 600; background: #e7eefa; padding: 2px 16px; border-radius: 30px;">🏥 FACILITY AVAILABLE</span>
    <span>E.C.G., DIGITAL X-RAY, PATHOLOGY, PHYSIOTHERAPY.</span>
  </div>
  <div style="
    background:url('<?php echo base_url('assets/images/border2.png'); ?>') no-repeat center;
    background-size:100% 100%;
    padding:25px 30px;
    min-height:110px;
    border-top:1px dashed #d3ddea;
    border-bottom:2px solid #e6edf7;

    display:flex;
    flex-direction:column;
    align-items:flex-start;
    justify-content:center;

    color:#1d2f55;
    font-size:14px;
    line-height:1.8;
    text-align:left;
      ">
   
    <div style="width:100%; text-align:left;">
        📌 <strong>Note:</strong> Home Collection Done (By Appointment).
        Hormonal Assay Blood Sample is collected every day.
    </div>
    <div style="
        margin-top:8px;
        text-align:left;
        background:#eef3fc;
        padding:4px 14px;
        border-radius:30px;
        display:inline-block;
        ">
            📅 Jul 27, 2026
    </div>

  </div>
</div>

  </div> <!-- /report-content -->
</div> <!-- /report-card -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>
<script>
   function printReport() {
    window.print();
}

function downloadReport() {

    const element = document.getElementById("reportContent");

    html2pdf().set({

        margin:5,
        filename:'Pathology_Report.pdf',

        image:{
            type:'jpeg',
            quality:1
        },

        html2canvas:{
            scale:2,
            useCORS:true
        },

        jsPDF:{
            unit:'mm',
            format:'a4',
            orientation:'portrait'
        }

    }).from(element).save();

}
</script>
</body>
</html>