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
  /* ===== Letter head (With / Without) option ===== */
  .letterhead-option{
    display:flex;
    align-items:center;
    gap:14px;
    background:#fff;
    border:1px solid #dee2e6;
    border-radius:5px;
    padding:10px 16px;
    font-size:14px;
    color:#333;
    box-shadow:0 1px 4px rgba(0,0,0,.06);
  }
  .letterhead-option .lh-title{
    font-weight:700;
    text-transform:uppercase;
    font-size:12px;
    letter-spacing:.5px;
    color:#6c757d;
  }
  .letterhead-option label{
    display:flex;
    align-items:center;
    gap:6px;
    margin:0;
    cursor:pointer;
    font-weight:600;
    white-space:nowrap;
  }
  .letterhead-option input[type="radio"]{ cursor:pointer; }
  .action-bar{ flex-wrap:wrap; }

  /* Default = WITHOUT letter head: hide company name, address & design
     -> every printed/PDF page shows data only, no letter head. */
  body:not(.with-letterhead) .brand-header{ display:none; }

  /* ===== MULTI-PAGE PRINT WITH LETTER HEAD ==============================
     WITH Letter Head: "Print Report" prints prepared A4 page blocks -
     each block = one letter head band + its slice of the report content,
     separated with page breaks. Every printed page therefore carries the
     letter head and no row is ever covered or lost. */
  #lhPrintPages { display: none; }
  body.lh-print-mode .report-card,
  body.lh-print-mode .action-bar { display: none !important; }
  /* Each print block is EXACTLY one full-bleed A4 sheet (210x297mm).
     With @page { margin: 0 } the browser maps one block to one page, so
     every page carries its own letter head band and nothing is clipped. */
  .lh-print-page {
      width: 210mm;
      height: 297mm;
      margin: 0;
      padding: 0;
      overflow: hidden;
      page-break-after: always;
      break-after: page;
  }
  .lh-print-page:last-child {
      page-break-after: auto;
      break-after: auto;
  }
  .lh-print-page img {
      display: block;
      width: 210mm;
      height: 297mm;
      margin: 0;
  }
  @media print {
      body.lh-print-mode { margin: 0 !important; padding: 0 !important; }
      body.lh-print-mode #lhPrintPages { display: block !important; }
  }

  /* "Preparing..." overlay while the letter head pages are built
     (class no-print -> never printed) */
  #lhPreparing {
      position: fixed;
      top: 0; left: 0; right: 0; bottom: 0;
      z-index: 3000;
      display: flex;
      align-items: center;
      justify-content: center;
      background: rgba(255, 255, 255, 0.92);
      font-weight: 600;
      font-size: 15px;
      color: #344767;
  }

  </style>
</head>
<body<?php echo !empty($patient['letter_head']) ? ' class="with-letterhead"' : ''; ?>>
<div class="action-bar no-print">

    <div class="letterhead-option">
        <span class="lh-title">Letter Head</span>
        <label>
            <input type="radio" name="letterHead" id="lhWith" value="with"
                   <?php echo !empty($patient['letter_head']) ? 'checked' : ''; ?>>
            With Letter Head
        </label>
        <label>
            <input type="radio" name="letterHead" id="lhWithout" value="without"
                   <?php echo empty($patient['letter_head']) ? 'checked' : ''; ?>>
            Without Letter Head
        </label>
    </div>

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
    <div class="brand-header" id="brandHeader">
        
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
   /* ===== Letter head (With / Without) =====================================
      Default / saved choice comes from the generate-report page
      (pathology_report.letter_head); the radios here preview it and drive
      the on-screen preview, the printed pages and the downloaded PDF. */
   var LH = (function () {
       var withLH = document.getElementById('lhWith');
       var withoutLH = document.getElementById('lhWithout');
       var headerEl = document.getElementById('brandHeader');
       var composedCache = {}; // sliceH -> canvas: report body + a letter head band per page

       function apply() {
           document.body.classList.toggle('with-letterhead', !!(withLH && withLH.checked));
           composedCache = {};    // choice changed -> rebuild the pages
       }
       if (withLH && withoutLH) {
           withLH.addEventListener('change', apply);
           withoutLH.addEventListener('change', apply);
           apply();            // sync screen with the saved choice
       }

       function isEnabled() { return !!(withLH && withLH.checked && headerEl); }

       // A4 (297x210mm) with 5mm margins -> same slice height html2pdf uses
       function sliceHeight(w) { return Math.floor(w * (297 - 10) / (210 - 10)); }

       // Full-bleed A4 slice height (no margins) -> used by the PRINT flow,
       // where every page block is exactly 210x297mm.
       function a4SliceHeight(w) { return Math.round(w * 297 / 210); }

       // Render any element to a canvas through html2pdf / html2canvas
       function renderCanvas(el, cb) {
           html2pdf().set({
               margin: 0,
               html2canvas: {
                   scale: 2,
                   useCORS: true,
                   backgroundColor: '#ffffff',
                   onrendered: function (c) { cb(c); }
               },
               jsPDF: { unit: 'mm', format: 'a4', orientation: 'portrait' }
           }).from(el).toCanvas();
       }

       // Find a near-white row within [lo, hi] (scanning downward) so a page
       // is cut BETWEEN two rows instead of through one. Returns hi when no
       // blank line exists there (tainted canvas, watermark in the way, ...).
       function snapCut(sctx, W, lo, hi) {
           if (!sctx || lo > hi) { return hi; }
           var h = hi - lo + 2, y, x, i, img;
           try { img = sctx.getImageData(0, lo, W, h); }
           catch (e) { return hi; }
           var d = img.data;
           for (y = hi; y >= lo; y--) {
               var off = (y - lo) * W * 4, white = true;
               for (x = 0; x < W; x++) {
                   i = off + x * 4;
                   if (d[i] + d[i + 1] + d[i + 2] < 740) { white = false; break; }
               }
               if (white) { return y; }
           }
           return hi;
       }

       // Build a canvas where EVERY page slice starts with the letter head
       // band; the content is shifted down by the band so nothing is ever
       // covered or lost.  src = report canvas captured WITHOUT the header.
       function buildComposed(src, hdr, sliceH) {
           var W = src.width, H = src.height;
           sliceH = sliceH || sliceHeight(W);
           var band = Math.round(hdr.height * (W / hdr.width));
           if (band <= 0 || band >= sliceH) { return null; }
           var cap = sliceH - band;                       // content rows per page
           var pages = Math.max(1, Math.ceil(H / cap));

           // Cut points BETWEEN rows: start from evenly spaced ideals and snap
           // each to a blank line within +/-48px, clamped so every segment
           // still fits on one page. Segments stay contiguous and cover
           // [0, H) exactly -> nothing lost, nothing repeated, page count
           // stays at the minimum.
           var cuts = [0], sctx = null;
           try { sctx = src.getContext('2d'); } catch (e) {}
           var prev = 0, ok = !!sctx && pages > 1;
           for (var u = 1; ok && u < pages; u++) {
               var ideal = Math.round(u * H / pages);
               var lo = Math.max(prev + 1, ideal - 48, H - (pages - u) * cap);
               var hi = Math.min(prev + cap, ideal + 48, H - 1);
               var cut = snapCut(sctx, W, lo, hi);
               if (cut <= prev) { cut = prev + 1; }
               if (cut > prev + cap) { cut = prev + cap; }
               if (cut < H - (pages - u) * cap) { cut = H - (pages - u) * cap; }
               if (cut > prev + cap || cut <= prev || cut >= H) { ok = false; break; }
               cuts.push(cut);
               prev = cut;
           }
           if (!ok) {                                   // fall back to fixed slices
               cuts = [];
               for (var k = 0; k < pages; k++) { cuts.push(k * cap); }
           }

           var out = document.createElement('canvas');
           out.width = W;
           out.height = pages * sliceH;
           var ctx = out.getContext('2d');
           ctx.fillStyle = '#fff';
           ctx.fillRect(0, 0, out.width, out.height);
           for (var u2 = 0; u2 < pages; u2++) {
               var sy = cuts[u2];
               var ey = (u2 + 1 < pages) ? cuts[u2 + 1] : H;
               var sh = ey - sy;
               if (sh <= 0) { continue; }
               ctx.drawImage(src, 0, sy, W, sh, 0, u2 * sliceH + band, W, sh);
               ctx.drawImage(hdr, 0, 0, hdr.width, hdr.height, 0, u2 * sliceH, W, band);
           }
           return out;
       }

       // letter head canvas + report canvas (header hidden) -> composed canvas.
       // mode selects the page geometry: 'a4' = full-bleed 210x297mm blocks
       // (PRINT flow), 'm5' = html2pdf's 5mm-margin slices (PDF DOWNLOAD).
       function getComposed(mode, cb) {
           if (composedCache[mode]) { cb(composedCache[mode]); return; }
           renderCanvas(headerEl, function (hdr) {
               var prev = headerEl.style.display;
               headerEl.style.display = 'none';
               renderCanvas(document.getElementById('reportContent'), function (body) {
                   headerEl.style.display = prev;
                   var sh = (mode === 'm5') ? sliceHeight(body.width)
                                            : a4SliceHeight(body.width);
                   composedCache[mode] = buildComposed(body, hdr, sh) || body;
                   cb(composedCache[mode]);
               });
           });
       }

       return {
           isEnabled: isEnabled,
           sliceHeight: sliceHeight,
           a4SliceHeight: a4SliceHeight,
           buildComposed: buildComposed,
           getComposed: getComposed,
           header: function () { return headerEl; }
       };
   })();

   // Build the A4 letter-head page blocks (one letter head per page);
   // cb() fires once #lhPrintPages + print-mode are in place.
   function prepareLetterHeadPages(cb) {
       var host = document.getElementById('lhPrintPages');
       if (host) { host.parentNode.removeChild(host); }

       var busy = document.getElementById('lhPreparing');
       if (!busy) {
           busy = document.createElement('div');
           busy.id = 'lhPreparing';
           busy.className = 'no-print';
           busy.textContent = 'Preparing letter head report…';
           document.body.appendChild(busy);
       }

       // full-bleed A4: every page block below is exactly 210x297mm, so the
       // browser never has to guess where a page ends (no drift, no blanks)
       var pageRule = document.getElementById('lhPageRule');
       if (!pageRule) {
           pageRule = document.createElement('style');
           pageRule.id = 'lhPageRule';
           document.head.appendChild(pageRule);
       }
       pageRule.textContent = '@page { size: A4; margin: 0; }';

       LH.getComposed('a4', function (comp) {
           var W = comp.width;
           var sliceH = LH.a4SliceHeight(W);
           var pages = Math.max(1, Math.round(comp.height / sliceH));

           host = document.createElement('div');
           host.id = 'lhPrintPages';
           for (var u = 0; u < pages; u++) {
               // one A4 page = letter head band + its slice of content
               var sl = document.createElement('canvas');
               sl.width = W;
               sl.height = sliceH;
               var c = sl.getContext('2d');
               c.fillStyle = '#fff';
               c.fillRect(0, 0, W, sliceH);
               // slice: source rect (0, u*sliceH, W, sliceH) -> this page
               c.drawImage(comp, 0, u * sliceH, W, sliceH, 0, 0, W, sliceH);

               var page = document.createElement('div');
               page.className = 'lh-print-page';
               var img = document.createElement('img');
               img.src = sl.toDataURL('image/jpeg', 0.92);
               page.appendChild(img);
               host.appendChild(page);
           }
           document.body.appendChild(host);
           document.body.classList.add('lh-print-mode');
           if (cb) { cb(); }
       });
   }

   function cleanupLetterHeadPrint() {
       document.body.classList.remove('lh-print-mode');
       var host = document.getElementById('lhPrintPages');
       if (host && host.parentNode) { host.parentNode.removeChild(host); }
       var b = document.getElementById('lhPreparing');
       if (b && b.parentNode) { b.parentNode.removeChild(b); }
       var pageRule = document.getElementById('lhPageRule');
       if (pageRule) { pageRule.textContent = ''; }
   }

   function printReport() {
       // WITHOUT letter head -> print the page as-is; the header is
       // display:none (CSS), so no printed page shows it.
       // WITH letter head -> print prepared A4 page blocks; every block
       // carries its own letter head (multi-page reports included).
       if (!LH.isEnabled()) { window.print(); return; }
       prepareLetterHeadPages(function () {
           window.addEventListener('afterprint', cleanupLetterHeadPrint);
           window.print();
       });
   }

function downloadReport() {

    const element = document.getElementById("reportContent");

    const cfg = {
        margin: 5,
        filename: 'Pathology_Report.pdf',
        image: { type: 'jpeg', quality: 1 },
        html2canvas: { scale: 2, useCORS: true },
        jsPDF: { unit: 'mm', format: 'a4', orientation: 'portrait' }
    };

    // WITHOUT letter head: .brand-header is display:none (CSS) so it never
    // reaches the canvas -> every PDF page shows data only.
    if (!LH.isEnabled()) {
        html2pdf().set(cfg).from(element).save();
        return;
    }

    // WITH letter head: html2pdf renders the report as ONE tall canvas and
    // slices it, so the header would only land on page 1. Fix: capture the
    // letter head separately, render the report WITHOUT its in-flow header,
    // then stamp a letter head band on every page slice (content shifted
    // down by the band -> nothing covered, nothing lost).
    html2pdf().set({
        margin: 0,
        html2canvas: {
            scale: 2,
            useCORS: true,
            backgroundColor: '#ffffff',
            onrendered: function (hdrCanvas) {
                const headerEl = LH.header();
                let hidden = false;
                const showHeader = function () {
                    if (hidden) { headerEl.style.display = ''; hidden = false; }
                };

                hidden = true;
                headerEl.style.display = 'none';

                html2pdf().set({
                    margin: cfg.margin,
                    filename: cfg.filename,
                    image: cfg.image,
                    jsPDF: cfg.jsPDF,
                    html2canvas: {
                        scale: 2,
                        useCORS: true,
                        onrendered: function (canvas) {
                            try {
                                const out = LH.buildComposed(canvas, hdrCanvas);
                                if (out) {
                                    // write into the SAME canvas object html2pdf slices
                                    canvas.width = out.width;
                                    canvas.height = out.height;
                                    canvas.getContext('2d').drawImage(out, 0, 0);
                                }
                            } finally {
                                showHeader();
                            }
                        }
                    }
                }).from(element).save();

                setTimeout(showHeader, 15000);   // safety net if rendering fails
            }
        },
        jsPDF: cfg.jsPDF
    }).from(LH.header()).toCanvas();
}
</script>
</body>
</html>