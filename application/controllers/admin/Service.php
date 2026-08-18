<?php defined('BASEPATH') or exit('No direct script access allowed');

class Service extends CI_Controller{
	function __construct() {
        parent::__construct();
        $this->load->model('Account_model');
        $this->load->helper('form');
        $this->load->library('form_validation');
        
        // Check if user is logged in
       
    }
    public function index()
{
    // Get filter values
    $from_date = $this->input->get('from_date');
    $to_date   = $this->input->get('to_date');


    /*
    |--------------------------------------------------------------------------
    | ADMIN
    |--------------------------------------------------------------------------
    */

    if ($this->session->userdata('role') == 'admin') {

        $this->db
            ->select('
                patient_master.*,

                test_master.id as test_id,
                test_master.name as testname,

                pathology_report.id as reportid,
                pathology_report.patient_id,
                pathology_report.test_id,
                pathology_report.report_date,

                doctor_master.id as doctorid,
                doctor_master.doctor_name,

                lab_master.id as labid,
                lab_master.name as labname,
                lab_master.lab_code,

                center_master.id as centid,
                center_master.center_name,
                center_master.center_code,

                users.id as userid,
                users.username,
                users.phone
            ')
            ->from('patient_master')

            // Keep patients even if report is not generated
            ->join(
                'pathology_report',
                'patient_master.id = pathology_report.patient_id',
                'left'
            )

            ->join(
                'doctor_master',
                'patient_master.doctor = doctor_master.id',
                'left'
            )

            ->join(
                'test_master',
                'pathology_report.test_id = test_master.id',
                'left'
            )

            ->join(
                'lab_master',
                'patient_master.labid = lab_master.id',
                'left'
            )

            ->join(
                'center_master',
                'patient_master.centerid = center_master.id',
                'left'
            )

            ->join(
                'users',
                'patient_master.userid = users.id',
                'left'
            )

            ->where(
                'patient_master.status',
                '1'
            );


        /*
        |--------------------------------------------------------------------------
        | OPTIONAL DATE FILTER
        |--------------------------------------------------------------------------
        */

        if (!empty($from_date)) {

            $this->db->where(
                'patient_master.registration_date >=',
                $from_date . ' 00:00:00'
            );
        }


        if (!empty($to_date)) {

            $this->db->where(
                'patient_master.registration_date <=',
                $to_date . ' 23:59:59'
            );
        }


        $data['patient_list'] = $this->db
            ->order_by(
                'patient_master.registration_date',
                'DESC'
            )
            ->get()
            ->result_array();


    /*
    |--------------------------------------------------------------------------
    | NORMAL USER
    |--------------------------------------------------------------------------
    */

    } else {

        $userid = $this->session->userdata('userid');


        $this->db
            ->select('
                patient_master.*,

                test_master.id as test_id,
                test_master.name as testname,

                pathology_report.id as reportid,
                pathology_report.patient_id,
                pathology_report.test_id,
                pathology_report.report_date,

                doctor_master.id as doctorid,
                doctor_master.doctor_name,

                lab_master.id as labid,
                lab_master.name as labname,
                lab_master.lab_code,

                center_master.id as centid,
                center_master.center_name,
                center_master.center_code
            ')
            ->from('patient_master')

            // Keep patients even if report is not generated
            ->join(
                'pathology_report',
                'patient_master.id = pathology_report.patient_id',
                'left'
            )

            ->join(
                'doctor_master',
                'patient_master.doctor = doctor_master.id',
                'left'
            )

            ->join(
                'test_master',
                'pathology_report.test_id = test_master.id',
                'left'
            )

            ->join(
                'lab_master',
                'patient_master.labid = lab_master.id',
                'left'
            )

            ->join(
                'center_master',
                'patient_master.centerid = center_master.id',
                'left'
            )

            ->where(
                'patient_master.userid',
                $userid
            );


        /*
        |--------------------------------------------------------------------------
        | OPTIONAL DATE FILTER
        |--------------------------------------------------------------------------
        */

        if (!empty($from_date)) {

            $this->db->where(
                'patient_master.registration_date >=',
                $from_date . ' 00:00:00'
            );
        }


        if (!empty($to_date)) {

            $this->db->where(
                'patient_master.registration_date <=',
                $to_date . ' 23:59:59'
            );
        }


        $data['patient_list'] = $this->db
            ->order_by(
                'patient_master.registration_date',
                'DESC'
            )
            ->get()
            ->result_array();
    }


    /*
    |--------------------------------------------------------------------------
    | Send Filter Values To View
    |--------------------------------------------------------------------------
    */

    $data['from_date'] = $from_date;
    $data['to_date']   = $to_date;


    /*
    |--------------------------------------------------------------------------
    | Load Views
    |--------------------------------------------------------------------------
    */

    $this->load->view(
        'admin/service/top-section',
        $data
    );

    $this->load->view(
        'admin/service/date_wise_report',
        $data
    );

    $this->load->view(
        'admin/service/footer',
        $data
    );
}
   public function doctor_wise()
{
    $from_date = $this->input->get('from_date');
    $to_date   = $this->input->get('to_date');
    $doctor_id = $this->input->get('doctor_id');

    /*
    |--------------------------------------------------------------------------
    | Doctor Dropdown
    |--------------------------------------------------------------------------
    */

    $data['doctors'] = $this->db
        ->select('id, doctor_name, doctor_code')
        ->from('doctor_master')
        ->where('status', 1)
        ->order_by('doctor_name', 'ASC')
        ->get()
        ->result_array();


    /*
    |--------------------------------------------------------------------------
    | Doctor Wise Report
    |--------------------------------------------------------------------------
    */

    $this->db
        ->select('
            pathology_report.*,
            patient_master.id as patientid,
            patient_master.name as patient_name,
            patient_master.age,
            patient_master.gender,
            patient_master.mobile,
            patient_master.doctor,

            doctor_master.id as doctorid,
            doctor_master.doctor_name,
            doctor_master.doctor_code,
            doctor_master.phone,
            doctor_master.qualification,

            test_master.id as testid,
            test_master.name as test_name
        ')
        ->from('pathology_report')

        ->join(
            'patient_master',
            'pathology_report.patient_id = patient_master.id',
            'left'
        )

        ->join(
            'doctor_master',
            'patient_master.doctor = doctor_master.id',
            'left'
        )

        ->join(
            'test_master',
            'pathology_report.test_id = test_master.id',
            'left'
        );


    /*
    |--------------------------------------------------------------------------
    | USER FILTER
    |--------------------------------------------------------------------------
    */

    if ($this->session->userdata('role') != 'admin') {

        $userid = $this->session->userdata('userid');

        $this->db->where(
            'pathology_report.userid',
            $userid
        );
    }


    /*
    |--------------------------------------------------------------------------
    | OPTIONAL FROM DATE
    |--------------------------------------------------------------------------
    */

    if (!empty($from_date)) {

        $this->db->where(
            'pathology_report.report_date >=',
            $from_date . ' 00:00:00'
        );
    }


    /*
    |--------------------------------------------------------------------------
    | OPTIONAL TO DATE
    |--------------------------------------------------------------------------
    */

    if (!empty($to_date)) {

        $this->db->where(
            'pathology_report.report_date <=',
            $to_date . ' 23:59:59'
        );
    }


    /*
    |--------------------------------------------------------------------------
    | OPTIONAL DOCTOR
    |--------------------------------------------------------------------------
    */

    if (!empty($doctor_id)) {

        $this->db->where(
            'patient_master.doctor',
            $doctor_id
        );
    }


    /*
    |--------------------------------------------------------------------------
    | ORDER
    |--------------------------------------------------------------------------
    */

    $this->db->order_by(
        'pathology_report.report_date',
        'DESC'
    );


    $data['doctor_report'] = $this->db
        ->get()
        ->result_array();


    /*
    |--------------------------------------------------------------------------
    | Keep selected filter values in view
    |--------------------------------------------------------------------------
    */

    $data['from_date'] = $from_date;
    $data['to_date']   = $to_date;
    $data['doctor_id'] = $doctor_id;


    /*
    |--------------------------------------------------------------------------
    | Views
    |--------------------------------------------------------------------------
    */

    $this->load->view(
        'admin/service/top-section',
        $data
    );

    $this->load->view(
        'admin/service/doctor_wise_report',
        $data
    );

    $this->load->view(
        'admin/service/footer',
        $data
    );
}
	
}  ?>
