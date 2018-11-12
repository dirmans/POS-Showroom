<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Xlsdataprofit extends CI_Controller {
    function __construct(){
        parent::__construct();
        $this->load->library('PHPExcel');
		$this->load->library('PHPExcel/IOFactory');
        $this->load->model('model_xls'); // memanggil model xls
    }
     public function export(){
        $ambildata = $this->model_xls->export_profit();
         
        if(count($ambildata)>0){
            $objPHPExcel = new PHPExcel();
            // Set properties
            $objPHPExcel->getProperties()
                  ->setCreator("Panji Motor") //creator
                    ->setTitle("Panji Motor");  //file title
 
            $objset = $objPHPExcel->setActiveSheetIndex(0); //inisiasi set object
            $objget = $objPHPExcel->getActiveSheet();  //inisiasi get object
 
            $objget->setTitle('Data Profit Tahunan'); //sheet title
            $objget->getStyle("B1:H1")->applyFromArray(
                array(
                    'fill' => array(
                        'type' => PHPExcel_Style_Fill::FILL_SOLID,
                        'color' => array('rgb' => '5052d0')
                    ),
                    'font' => array(
                        'color' => array('rgb' => 'ffffff')
                    )
                )
            );
            $objget->getStyle("A3:I3")->applyFromArray(
                array(
                    'fill' => array(
                        'type' => PHPExcel_Style_Fill::FILL_SOLID,
                        'color' => array('rgb' => '92d050')
                    ),
                    'font' => array(
                         'bold' => true,
                        'color' => array('rgb' => '000000')
                    )
                )
            );
            
            $objPHPExcel->getActiveSheet()->getStyle('A3:E1000')->getFont()->setName('Arial');
            $objPHPExcel->getActiveSheet()->getStyle('A3:E1000')->getFont()->setSize(13);
            $objPHPExcel->getActiveSheet()->mergeCells('B1:H2');
            $objPHPExcel->getActiveSheet()->setCellValue('B1', "DATA PROFIT TAHUNAN");
            $objPHPExcel->getActiveSheet()->getStyle('B1:H2')->getFont()->setName('Arial');
            $objPHPExcel->getActiveSheet()->getStyle('B1:H2')->getFont()->setSize(16);
            $objPHPExcel->getActiveSheet()->getStyle('B1:H2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
 
 
            //table header
            $cols = array("A","B","C","D","E","F","G","H","I");
             
            $val = array("No.","Kode Profit","Sewa Gedung","Listrik","Gaji Karyawan", "Kas Kecil", "Profit Kotor", "Profit Bersih", "Tahun");
            for ($a=0;$a<9; $a++) 
            {
                $objset->setCellValue($cols[$a].'3', $val[$a]);
                $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
                $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
                $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setAutoSize(true); 
				$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setAutoSize(true); 
				$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setAutoSize(true);
				$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setAutoSize(true);
				$objPHPExcel->getActiveSheet()->getColumnDimension('G')->setAutoSize(true);
				$objPHPExcel->getActiveSheet()->getColumnDimension('H')->setAutoSize(true);
				$objPHPExcel->getActiveSheet()->getColumnDimension('I')->setAutoSize(true);
             
                $style = array(
                    'alignment' => array(
                        'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                        'vertical'   => PHPExcel_Style_Alignment::VERTICAL_CENTER,
                    )
                );
                $objPHPExcel->getActiveSheet()->getStyle($cols[$a].'3')->applyFromArray($style);
            }
            $no = 1;
            $baris  = 4;
            foreach ($ambildata as $frow){
                 
                //pemanggilan sesuaikan dengan nama kolom tabel
                $objset->setCellValue("A".$baris, $no++);
                $objset->setCellValue("B".$baris, $frow->kd_profit);
				$objset->setCellValue("C".$baris, $frow->sewa_gedung);
                $objset->setCellValue("D".$baris, $frow->listrik); 
                $objset->setCellValue("E".$baris, $frow->gaji_karyawan);
                $objset->setCellValue("F".$baris, $frow->kas_kecil);
                $objset->setCellValue("G".$baris, $frow->profit_kotor);
                $objset->setCellValue("H".$baris, $frow->profit_bersih);
                $objset->setCellValue("I".$baris, $frow->tahun);
                 
                //Set number value
                $objPHPExcel->getActiveSheet()->getStyle('A3:I'.$baris)->getNumberFormat()->setFormatCode('0');
               // $objPHPExcel->getSheet()->mergeCells('A1:B');
                $baris++;
            }
             
            $objPHPExcel->getActiveSheet()->setTitle('Data Profit Tahunan');
 
            $objPHPExcel->setActiveSheetIndex(0);  
            $filename = urlencode("Data_Profit_Tahunan_Tanggal_".date("Y-m-d_H_i_s").".xls");
               
              header('Content-Type: application/vnd.ms-excel'); //mime type
              header('Content-Disposition: attachment;filename="'.$filename.'"'); //tell browser what's the file name
              header('Cache-Control: max-age=0'); //no cache
 
            $objWriter = IOFactory::createWriter($objPHPExcel, 'Excel5');                
            $objWriter->save('php://output');
        }
    }
}