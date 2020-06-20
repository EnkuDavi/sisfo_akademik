<?php

class Fungsi
{
    protected $ci;

    public function __construct()
    {
        $this->ci =& get_instance();
    }

    public function user_login()
    {
        $this->ci->load->model('user_m');
        $user_id = $this->ci->session->userdata('user_id');
        $userdata = $this->ci->user_m->get($user_id)->row();

        return $userdata;
    }

    function PdfGenerator($html, $filename, $paper, $orientation, $data = array())
    {
        // instantiate and use the dompdf class

        $dompdf = new Dompdf\Dompdf();
        $dompdf->loadHtml($html);

        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper($paper, $orientation);

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to Browser
        $dompdf->stream($filename,array("Attachment" => FALSE));
    }

  
}

