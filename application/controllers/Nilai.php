<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Fill;

class Nilai extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->model(['nilai_model','tahun_model','semester_model','kelas_model','pelajaran_model','siswa_model']);
    }

    public function index()
    {
        $thn = $this->tahun_model->tampilData()->result();
        $kls = $this->kelas_model->tampilData()->result();
        $data = ['tahun' => $thn, 'kelas' => $kls];
        $this->template->load('template','nilai/nilai_data',$data);
    }

    public function tampil()
    {
        $post = $this->input->post(NULL, TRUE);
        if(isset($_POST['submit'])){
            $thn = $this->tahun_model->tampilData()->result();
            $kls = $this->kelas_model->tampilData()->result();
            $plj = $this->pelajaran_model->tampilData()->result();
            $nil = $this->nilai_model->getBy($post);
            $data = ['nilai' => $nil, 'tahun'=> $thn, 'kelas'=> $kls, 'pelajaran' => $plj];
            if($this->db->affected_rows() > 0){
                $this->template->load('template','nilai/nilai_data',$data);
            }else{
                echo "<script>
                    alert('Data tidak ditemukan!'); ";
                        echo "window.location = '" .site_url('nilai')."' </script>"; 
            }
        }else{
            $thn = $this->tahun_model->tampilData()->result();
            $kls = $this->kelas_model->tampilData()->result();
            $data = ['tahun' => $thn, 'kelas' => $kls];
            $this->template->load('template','nilai/nilai_data',$data);
        }
    }

    public function add()
    {
        $thn = $this->tahun_model->tampilData()->result();
        $smt = $this->semester_model->tampilData()->result();
        $kelas = $this->kelas_model->tampilData()->result();
        $pelajaran = $this->pelajaran_model->tampilData()->result();
        
        $this->load->model("Kelas_model");
        $this->load->model("Siswa_model");
        $this->load->model("Pelajaran_model");
        $data = ["tahun" => $thn,"semester" => $smt,"kls" => $kelas,"plj" => $pelajaran];
        
        $this->template->load('template','nilai/nilai_form',$data);
    }

    public function add_nilai()
    {
        $this->form_validation->set_rules('nilai_angka','Nilai','required|trim');
        if($this->form_validation->run() == FALSE){
            $this->template->load('template','nilai/nilai_form',$data);
        }else {
            $post = $this->input->post(NULL, true);
            $this->nilai_model->getData($post);
            if($this->db->affected_rows() > 0){
                echo "<script>
                    alert('Tidak bisa menyimpan , Data ini sudah ada!'); ";
                        echo "window.location = '" .site_url('nilai')."' </script>";            
            }else{
                $this->nilai_model->add($post);
                if($this->db->affected_rows() > 0){
                    $this->session->set_flashdata('success','Data Berhasil Disimpan');
                }
                redirect('nilai');
            }
        }    
    }

    public function get_siswa()
    {
        if($this->input->post('kelas_id')){
            echo $this->siswa_model->getBy($this->input->post('kelas_id'));
        }
    }

    public function edit()
    {
        $post = $this->input->post(NULL, TRUE);
        if(isset($_POST['update'])){
            $this->nilai_model->ubah($post);
            if($this->db->affected_rows() > 0){
                echo "<script>
                    alert('Data berhasil di update!'); ";
                        echo "window.location = '" .site_url('nilai')."' </script>";
            }else{
                echo "<script>
                    alert('Data gagal diupdate!'); ";
                        echo "window.location = '" .site_url('nilai')."' </script>";
            }
        }
    }

    public function del($id)
    {
        $this->nilai_model->hapus($id);
        if($this->db->affected_rows() > 0){
            $this->session->set_flashdata('success','Data Berhasil Dihapus');
        }else{
            $this->session->set_flashdata('error','Data Gagal Dihapus');
        }
        redirect('nilai');
    }

    public function excel()
    {
        $post = $this->input->post(NULL, true);
        if(isset($_POST['export'])){
            $data['nilai'] = $this->nilai_model->getBy($post)->result();
            $spreadsheet = new Spreadsheet();
            $sheet = $spreadsheet->getActiveSheet();
            $sheet->setCellValue('B3','Data Nilai');
            $sheet->setCellValue('B5','Kelas');
            $sheet->setCellValue('B6','Kategori');
            $sheet->setCellValue('B7','Tahun Ajaran');
            $sheet->setCellValue('C5', ': ' .$post['kelas']);
            $sheet->setCellValue('C6', ': ' .$post['kategori']);
            $sheet->setCellValue('C7', ': ' .$post['thn']);

            // Styling Spreadsheet
                $tableHead = [
                    'font' =>[
                        'color' =>[
                            'rgb' => 'FFFFFF'
                        ],
                    ],
                    'fill' =>[
                        'fillType' => Fill::FILL_SOLID,
                        'startColor' =>[
                            'rgb' => '538ED5'
                        ]
                    ],
                    'borders' =>[
                        'allBorders' =>[
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN
                        ]
                    ]
                ];

                $tableBody = [
                    'borders' =>[
                        'allBorders' =>[
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN
                        ]
                    ]
                ];

                $spreadsheet->getActiveSheet()->getStyle("B10:G10")->applyFromArray($tableHead);

                // Merge And align
                $spreadsheet->getActiveSheet()->mergeCells("B3:G3");
                $spreadsheet->getActiveSheet()->getStyle("B3")->getFont()->setSize(14);
                $spreadsheet->getActiveSheet()->getStyle("B3")->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
                $spreadsheet->getActiveSheet()->getStyle("B10:G10")->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
                
                // Font 
                $spreadsheet->getActiveSheet()->getStyle("B5:G10")->getFont()->setSize(10);
                $spreadsheet->getActiveSheet()->getStyle("B10:G10")->getFont()->setBold(true);

                // Set Width
                $spreadsheet->getActiveSheet()->getColumnDimension('B')->setWidth(11);
                $spreadsheet->getActiveSheet()->getColumnDimension('C')->setWidth(20);
                $spreadsheet->getActiveSheet()->getColumnDimension('D')->setWidth(29);
                $spreadsheet->getActiveSheet()->getColumnDimension('E')->setWidth(25);
                $spreadsheet->getActiveSheet()->getColumnDimension('F')->setWidth(10);
                $spreadsheet->getActiveSheet()->getColumnDimension('G')->setWidth(11);

            // end of styling

            $sheet->setCellValue('B10', 'No');
            $sheet->setCellValue('C10', 'NISN');
            $sheet->setCellValue('D10', 'Nama Siswa');
            $sheet->setCellValue('E10', 'Pelajaran');
            $sheet->setCellValue('F10', 'KKM');
            $sheet->setCellValue('G10', 'Nilai Angka');

            $baris = 11;
            $no = 1;

            foreach($data['nilai'] as $nil){
                $sheet->setCellValue('B'.$baris, $no++);
                $sheet->setCellValue('C'.$baris, $nil->nis);
                $sheet->setCellValue('D'.$baris, $nil->nama);
                $sheet->setCellValue('E'.$baris, $nil->nama_pelajaran);
                $sheet->setCellValue('F'.$baris, $nil->kkm);
                $sheet->setCellValue('G'.$baris, $nil->nilai_angka);
                
                $spreadsheet->getActiveSheet()->getStyle('B'.$baris.':G'.$baris)->applyFromArray($tableBody);
                $spreadsheet->getActiveSheet()->getStyle('B'.$baris.':G'.$baris)->getFont()->setSize(10);
                $spreadsheet->getActiveSheet()->getStyle('B'.$baris)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
                $spreadsheet->getActiveSheet()->getStyle('F'.$baris.':G'.$baris)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
                
                $baris++;
            }

            // Auto filter
            $firtsrow = 10;
            $lastrow = $baris-1;
            $spreadsheet->getActiveSheet()->setAutoFilter("B".$firtsrow.':G'.$lastrow);

            $writer = new Xlsx($spreadsheet);
            
            $filename = 'Nilai '.$post['kelas'];
            
            header('Content-Type: application/vnd.ms-excel');
            header('Content-Disposition: attachment;filename="'. $filename .'"'); 
            header('Cache-Control: max-age=0');

            $writer->save('php://output');
        }       
    }

}