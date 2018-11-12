<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Xlsdatapembeli extends CI_Controller {
    function __construct(){
        parent::__construct();
        $this->load->library('PHPExcel');
		$this->load->library('PHPExcel/IOFactory');
        $this->load->model('model_xls'); // memanggil model xls
    }
     public function export(){
        $ambildata = $this->model_xls->export_pembeli();
         
        if(count($ambildata)>0){
            $objPHPExcel = new PHPExcel();
            // Set properties
            $objPHPExcel->getProperties()
                  ->setCreator("Panji Motor") //creator
                    ->setTitle("Panji Motor");  //file title
 
            $objset = $objPHPExcel->setActiveSheetIndex(0); //inisiasi set object
            $objget = $objPHPExcel->getActiveSheet();  //inisiasi get object
 
            $objget->setTitle('Sample Sheet'); //sheet title
            $objget->getStyle("B1:D1")->applyFromArray(
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
            $objget->getStyle("A3:E3")->applyFromArray(
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
            $objPHPExcel->getActiveSheet()->mergeCells('B1:D2');
            $objPHPExcel->getActiveSheet()->setCellValue('B1', "IDENTITAS PEMBELI");
            $objPHPExcel->getActiveSheet()->getStyle('B1:D2')->getFont()->setName('Arial');
            $objPHPExcel->getActiveSheet()->getStyle('B1:D2')->getFont()->setSize(16);
            $objPHPExcel->getActiveSheet()->getStyle('B1:D2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
 
 
            //table header
            $cols = array("A","B","C","D","E");
             
            $val = array("No.","Kode Pembeli","Nama","Alamat","No Telpon");
            for ($a=0;$a<5; $a++) 
            {
                $objset->setCellValue($cols[$a].'3', $val[$a]);
                $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
                $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
                $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setAutoSize(true); 
				$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setAutoSize(true); 
				$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setAutoSize(true);
             
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
                $objset->setCellValue("B".$baris, $frow->kd_pembeli);
				$objset->setCellValue("C".$baris, $frow->nama_pembeli);
                $objset->setCellValue("D".$baris, $frow->alamat_pembeli); 
                $objset->setCellValue("E".$baris, $frow->notelp_pembeli);
                 
                //Set number value
                $objPHPExcel->getActiveSheet()->getStyle('A3:E'.$baris)->getNumberFormat()->setFormatCode('0');
               // $objPHPExcel->getSheet()->mergeCells('A1:B');
                $baris++;
            }
             
            $objPHPExcel->getActiveSheet()->setTitle('Data Kendaraan');
 
            $objPHPExcel->setActiveSheetIndex(0);  
            $filename = urlencode("Data_Pembeli_Tanggal_".date("Y-m-d_H_i_s").".xls");
               
              header('Content-Type: application/vnd.ms-excel'); //mime type
              header('Content-Disposition: attachment;filename="'.$filename.'"'); //tell browser what's the file name
              header('Cache-Control: max-age=0'); //no cache
 
            $objWriter = IOFactory::createWriter($objPHPExcel, 'Excel5');                
            $objWriter->save('php://output');
        }
    }
}