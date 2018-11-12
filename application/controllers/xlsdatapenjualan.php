<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Xlsdatakendaraan extends CI_Controller {
    function __construct(){
        parent::__construct();
        $this->load->library('PHPExcel');
		$this->load->library('PHPExcel/IOFactory');
        $this->load->model('model_xls'); // memanggil model xls
    }
     public function export(){
        $ambildata = $this->model_xls->export_mobil();
         
        if(count($ambildata)>0){
            $objPHPExcel = new PHPExcel();
            // Set properties
            $objPHPExcel->getProperties()
                  ->setCreator("Panji Motor") //creator
                    ->setTitle("Panji Motor");  //file title
 
            $objset = $objPHPExcel->setActiveSheetIndex(0); //inisiasi set object
            $objget = $objPHPExcel->getActiveSheet();  //inisiasi get object
 
            $objget->setTitle('Sample Sheet'); //sheet title
            $objget->getStyle("H1:K1")->applyFromArray(
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
            $objget->getStyle("A4:M4")->applyFromArray(
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
            
            $objPHPExcel->getActiveSheet()->getStyle('A4:M1000')->getFont()->setName('Arial');
            $objPHPExcel->getActiveSheet()->getStyle('A4:M1000')->getFont()->setSize(13);
            $objPHPExcel->getActiveSheet()->mergeCells('H1:K3');
            $objPHPExcel->getActiveSheet()->setCellValue('H1', "IDENTITAS KENDARAAN");
            $objPHPExcel->getActiveSheet()->getStyle('H1:K3')->getFont()->setName('Arial');
            $objPHPExcel->getActiveSheet()->getStyle('H1:K3')->getFont()->setSize(18);
            $objPHPExcel->getActiveSheet()->getStyle('H1:K3')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
 
 
            //table header
            $cols = array("A","B","C","D","E","F","G","H","I","J","K","L","M");
             
            $val = array("No. ", "Kode Mobil","Merk Mobil","Harga Beli","Harga Jual","No Polisi","No Rangka","No Mesin","Tahun","Warna","Atas Nama","Alamat","Status");
            for ($a=0;$a<12; $a++) 
            {
                $objset->setCellValue($cols[$a].'4', $val[$a]);
                $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
                $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
                $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setAutoSize(true); 
				$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setAutoSize(true); 
				$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setAutoSize(true);
                $objPHPExcel->getActiveSheet()->getColumnDimension('F')->setAutoSize(true);
                $objPHPExcel->getActiveSheet()->getColumnDimension('G')->setAutoSize(true);
				$objPHPExcel->getActiveSheet()->getColumnDimension('H')->setAutoSize(true);
				$objPHPExcel->getActiveSheet()->getColumnDimension('I')->setAutoSize(true);
                $objPHPExcel->getActiveSheet()->getColumnDimension('J')->setAutoSize(true);
                $objPHPExcel->getActiveSheet()->getColumnDimension('K')->setAutoSize(true);
				$objPHPExcel->getActiveSheet()->getColumnDimension('L')->setAutoSize(true);
				$objPHPExcel->getActiveSheet()->getColumnDimension('M')->setAutoSize(true);
             
                $style = array(
                    'alignment' => array(
                        'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                        'vertical'   => PHPExcel_Style_Alignment::VERTICAL_CENTER,
                    )
                );
                $objPHPExcel->getActiveSheet()->getStyle($cols[$a].'4')->applyFromArray($style);
            }
            $no = 1;
            $baris  = 5;
            foreach ($ambildata as $frow){
                 
                //pemanggilan sesuaikan dengan nama kolom tabel
                $objset->setCellValue("A".$baris, $no++);
                $objset->setCellValue("B".$baris, $frow->kd_mobil);
				$objset->setCellValue("C".$baris, $frow->merk_mobil);
                $objset->setCellValue("D".$baris, $frow->harga_beli); 
                $objset->setCellValue("E".$baris, $frow->harga_jual);
				$objset->setCellValue("F".$baris, $frow->no_pol);
				$objset->setCellValue("G".$baris, $frow->no_rka);
                $objset->setCellValue("H".$baris, $frow->no_msn);
                $objset->setCellValue("I".$baris, $frow->tahun);
				$objset->setCellValue("J".$baris, $frow->warna);
				$objset->setCellValue("K".$baris, $frow->atas_nama);
                $objset->setCellValue("L".$baris, $frow->alamat);
                $objset->setCellValue("M".$baris, $frow->status);
                 
                //Set number value
                $objPHPExcel->getActiveSheet()->getStyle('A3:M'.$baris)->getNumberFormat()->setFormatCode('0');
               // $objPHPExcel->getSheet()->mergeCells('A1:B');
                $baris++;
            }
             
            $objPHPExcel->getActiveSheet()->setTitle('Data Kendaraan');
 
            $objPHPExcel->setActiveSheetIndex(0);  
            $filename = urlencode("Data_Kendaraan_Tanggal_".date("Y-m-d_H_i_s").".xls");
               
              header('Content-Type: application/vnd.ms-excel'); //mime type
              header('Content-Disposition: attachment;filename="'.$filename.'"'); //tell browser what's the file name
              header('Cache-Control: max-age=0'); //no cache
 
            $objWriter = IOFactory::createWriter($objPHPExcel, 'Excel5');                
            $objWriter->save('php://output');
        }
    }
}