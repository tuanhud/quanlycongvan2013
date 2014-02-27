<?php
@session_start();
		$a = $_GET["q"];
	function date_i($string_i)
	{
		$thang_i = substr($string_i,3,2);
		$ngay_i = substr($string_i,0,2);
		$nam_i = substr($string_i,6,4);
		$ngay_format = $nam_i."/".$thang_i."/".$ngay_i;
		return $ngay_format;
	}
	include("../dbcon.php");
		$tenpb = "";
		$mapb = $_SESSION['phongbann'];
	//	$ngay_bd = date_i($_SESSION['batdau']);
		//$ngay_kt = date_i($_SESSION['ketthuc']);
		$sqlcvdi = "";
		$sqlcvden = "";
		if($a == 3) // chi tiết xử lý
		{
			$sqlcvdi = $_SESSION['chitietxuly'] ;
			$manv = $_SESSION['nhanvienxuly'];
			
				$nhanvien = mysql_query("select hoten from nhanvien where manv = '".$manv."'");
				while($row = mysql_fetch_array($nhanvien))
				{
					$tennv = $row[hoten];
				}
		
		}
		else
			if($a == 4)// chi tiết thống kê cv đến
			{
			 $sqlcvdi = $_SESSION['chitietthongke'] ;
				if($mapb != 0)
				{
					$phongban = mysql_query("select tenpb from phongban where mapb = '".$mapb."'");
					while($row = mysql_fetch_array($phongban))
					{
					$tenpb = $row[tenpb];
					}
			
			//	$sqlcvdi = $_SESSION['exportden']; 
				
				}
				else
				{
					$tenpb = " Trường Đại Học Công Nghệ Thông Tin ";
			}
			}
		


require_once 'Classes/PHPExcel.php';
$objPHPExcel = new PHPExcel();

/*for ($i=1;$i<=10;$i++)
{
$objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A'.$i, $i)
			->setCellValue('B'.$i, 'sản phẩm '.$i);
}*/
 $objPHPExcel->setActiveSheetIndex( 0 )->mergeCells( 'A1:I1' );
 $objPHPExcel->setActiveSheetIndex( 0 )->mergeCells( 'A2:I2' );
   $objPHPExcel->getActiveSheet()->getRowDimension( '1' )->setRowHeight( 42 );
    $objPHPExcel->getActiveSheet()->getRowDimension( '2' )->setRowHeight( 42 );
   $objPHPExcel->getActiveSheet()->getRowDimension( '3' )->setRowHeight( 35 );
   
   $objPHPExcel->getActiveSheet()->getStyle( 'A1' )->applyFromArray( array( 'font' => array( 'name' => 'Times new Roman', 'bold' => true, 'italic' => false, 'size' => 20 ), 'alignment' => array( 'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, 'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER, 'wrap' => true ) ) );
 $objPHPExcel->getActiveSheet()->getStyle( 'A2' )->applyFromArray( array( 'font' => array( 'name' => 'Times new Roman', 'bold' => true, 'italic' => false, 'size' => 20 ), 'alignment' => array( 'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, 'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER, 'wrap' => true ) ) );

 $objPHPExcel->getActiveSheet()->getColumnDimension( 'A' )->setWidth( 7 );
   $objPHPExcel->getActiveSheet()->getColumnDimension( 'B' )->setWidth( 15 );
   $objPHPExcel->getActiveSheet()->getColumnDimension( 'C' )->setWidth( 15 );
   $objPHPExcel->getActiveSheet()->getColumnDimension( 'D' )->setWidth( 40 );
   $objPHPExcel->getActiveSheet()->getColumnDimension( 'E' )->setWidth( 17 );
   $objPHPExcel->getActiveSheet()->getColumnDimension( 'F' )->setWidth( 17 );
   $objPHPExcel->getActiveSheet()->getColumnDimension( 'G' )->setWidth( 17 );
   $objPHPExcel->getActiveSheet()->getColumnDimension( 'H' )->setWidth( 16 );
    $objPHPExcel->getActiveSheet()->getColumnDimension( 'I' )->setWidth( 16 );
if($a == 3)
 { 
	$objPHPExcel->setActiveSheetIndex( 0 )->setCellValue( 'A1', 'TÌNH HÌNH XỬ LÝ CÔNG VĂN CỦA : '.$tennv.'');
 }
 else
 
 {
	$objPHPExcel->setActiveSheetIndex( 0 )->setCellValue( 'A1', 'BẢNG BÁO CÁO CÔNG VĂN ĐẾN CỦA : '.$tenpb.'');
	$objPHPExcel->setActiveSheetIndex( 0 )->setCellValue( 'A2', ' TỪ NGÀY '.$_SESSION['batdau'].' ĐẾN NGÀY '.$_SESSION['ketthuc'].'' );


 }
   $objPHPExcel->setActiveSheetIndex( 0 )->setCellValue( 'A3', 'STT' )->setCellValue( 'B3', 'Mã Công Văn' )->setCellValue( 'C3', 'Số/Kí hiệu' )->setCellValue( 'D3', 'Về việc / Trích yếu' )->setCellValue( 'E3', 'Ban hành' )->setCellValue( 'F3', 'Độ bảo mật' )->setCellValue( 'G3', 'Phân cấp' )->setCellValue( 'H3', 'Trạng Thái' )->setCellValue( 'I3', 'Ghi chú' );

   $objPHPExcel->getActiveSheet()->getStyle( 'A3' )->applyFromArray( array( 'font' => array( 'name' => 'Times new Roman', 'bold' => true, 'italic' => false, 'size' => 12 ), 'alignment' => array( 'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, 'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER, 'wrap' => true ) ) );
   $objPHPExcel->getActiveSheet()->getStyle( 'B3' )->applyFromArray( array( 'font' => array( 'name' => 'Times new Roman', 'bold' => true, 'italic' => false, 'size' => 12 ), 'alignment' => array( 'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, 'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER, 'wrap' => true ) ) );
   $objPHPExcel->getActiveSheet()->getStyle( 'C3' )->applyFromArray( array( 'font' => array( 'name' => 'Times new Roman', 'bold' => true, 'italic' => false, 'size' => 12 ), 'alignment' => array( 'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, 'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER, 'wrap' => true ) ) );
   $objPHPExcel->getActiveSheet()->getStyle( 'D3' )->applyFromArray( array( 'font' => array( 'name' => 'Times new Roman', 'bold' => true, 'italic' => false, 'size' => 12 ), 'alignment' => array( 'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, 'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER, 'wrap' => true ) ) );
   $objPHPExcel->getActiveSheet()->getStyle( 'E3' )->applyFromArray( array( 'font' => array( 'name' => 'Times new Roman', 'bold' => true, 'italic' => false, 'size' => 12 ), 'alignment' => array( 'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, 'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER, 'wrap' => true ) ) );
   $objPHPExcel->getActiveSheet()->getStyle( 'F3' )->applyFromArray( array( 'font' => array( 'name' => 'Times new Roman', 'bold' => true, 'italic' => false, 'size' => 12 ), 'alignment' => array( 'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, 'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER, 'wrap' => true ) ) );
   $objPHPExcel->getActiveSheet()->getStyle( 'G3' )->applyFromArray( array( 'font' => array( 'name' => 'Times new Roman', 'bold' => true, 'italic' => false, 'size' => 12 ), 'alignment' => array( 'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, 'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER, 'wrap' => true ) ) );
   $objPHPExcel->getActiveSheet()->getStyle( 'H3' )->applyFromArray( array( 'font' => array( 'name' => 'Times new Roman', 'bold' => true, 'italic' => false, 'size' => 12 ), 'alignment' => array( 'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, 'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER, 'wrap' => true ) ) );
   $objPHPExcel->getActiveSheet()->getStyle( 'I3' )->applyFromArray( array( 'font' => array( 'name' => 'Times new Roman', 'bold' => true, 'italic' => false, 'size' => 12 ), 'alignment' => array( 'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, 'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER, 'wrap' => true ) ) );
   
   //$objPHPExcel->getActiveSheet()->getStyle( 'H3' )->applyFromArray( array( 'font' => array( 'name' => 'Times new Roman', 'bold' => true, 'italic' => false, 'size' => 12 ), 'alignment' => array( 'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, 'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER, 'wrap' => true ) ) );
   
								$STT = 1;
								$i = 4;
								$domat = "";	
								$phancap = "";	
								$trangthai = "";
								$ghichu = "";
								$now = date('Y/m/d',time());
								
								//echo $sqlcvdi;
									$congvan = mysql_query($sqlcvdi);
									while ($row = mysql_fetch_array($congvan))
									{
									 $objPHPExcel->getActiveSheet()->getRowDimension( ''.$i )->setRowHeight( 30 );
   
									if($row[domat] == 1)
									{
										$domat = "Thông Thường";
									}
									if($row[domat] == 2)
									{
										$domat = "Mật";
										
									}
									if($row[domat] == 3)
									{
										$domat = "Tối Mật";
									}
									if($row[loaicv] == 0)
										$phancap = "Cấp Trường";
									else
										$phancap = "Phòng Ban";
									if($row[trangthai] == 0)
									{
										$trangthai = "Chưa xử lý";
										$datehh = $row[ngayhh];
										$datenow = $now;
										if(strtotime($datehh) < strtotime($datenow))
										{
											$ghichu =   "Quá Hạn";
										}
										else
											$ghichu =  "Trong Hạn";										
									}
									else 
										if($row[trangthai] == 1)
										{
											$trangthai = "Đang xử lý";
											$datehh = $row[ngayhh];
											$datenow = $now;
										if(strtotime($datehh) < strtotime($datenow))
										{
											$ghichu = "Quá Hạn";
										}
										else
											$ghichu =  "Trong Hạn";
										}
										else 
											if($row[trangthai] == 2)
												{
													$trangthai =  "Đã xử lý";
													$datehh = $row[ngayhh];
													$datexuly = $row[ngay];
													if(strtotime($datexuly) > strtotime($datehh))
													{
														$ghichu = "Trễ hạn";
													}
													
												}
												
									$objPHPExcel->setActiveSheetIndex(0)
												->setCellValue('A'.$i, $STT)
												->setCellValue('B'.$i, $row[madk])
												->setCellValue('C'.$i, $row[soKH])
												->setCellValue('D'.$i, 'V/v : '.$row[trichyeu].'...')
												->setCellValue('E'.$i, $row[ngayVB])
												->setCellValue('F'.$i, $domat)
												->setCellValue('G'.$i, $phancap)
												->setCellValue('H'.$i, $trangthai)
												->setCellValue('I'.$i, $ghichu);
							
									
									
   $objPHPExcel->getActiveSheet()->getStyle( 'A'.$i )->applyFromArray( array( 'font' => array( 'name' => 'Times new Roman', 'bold' => false, 'italic' => false, 'size' => 12 ), 'alignment' => array( 'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, 'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER, 'wrap' => true ) ) );
   $objPHPExcel->getActiveSheet()->getStyle( 'B'.$i )->applyFromArray( array( 'font' => array( 'name' => 'Times new Roman', 'bold' => false, 'italic' => false, 'size' => 12 ), 'alignment' => array( 'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, 'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER, 'wrap' => true ) ) );
   $objPHPExcel->getActiveSheet()->getStyle( 'C'.$i )->applyFromArray( array( 'font' => array( 'name' => 'Times new Roman', 'bold' => false, 'italic' => false, 'size' => 12 ), 'alignment' => array( 'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, 'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER, 'wrap' => true ) ) );
   $objPHPExcel->getActiveSheet()->getStyle( 'D'.$i )->applyFromArray( array( 'font' => array( 'name' => 'Times new Roman', 'bold' => false, 'italic' => false, 'size' => 12 ), 'alignment' => array(  'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER, 'wrap' => true ) ) );
   $objPHPExcel->getActiveSheet()->getStyle( 'E'.$i )->applyFromArray( array( 'font' => array( 'name' => 'Times new Roman', 'bold' => false, 'italic' => false, 'size' => 12 ), 'alignment' => array( 'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, 'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER, 'wrap' => true ) ) );
   $objPHPExcel->getActiveSheet()->getStyle( 'F'.$i )->applyFromArray( array( 'font' => array( 'name' => 'Times new Roman', 'bold' => false, 'italic' => false, 'size' => 12 ), 'alignment' => array( 'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, 'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER, 'wrap' => true ) ) );
   $objPHPExcel->getActiveSheet()->getStyle( 'G'.$i )->applyFromArray( array( 'font' => array( 'name' => 'Times new Roman', 'bold' => false, 'italic' => false, 'size' => 12 ), 'alignment' => array( 'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, 'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER, 'wrap' => true ) ) );
   $objPHPExcel->getActiveSheet()->getStyle( 'H'.$i )->applyFromArray( array( 'font' => array( 'name' => 'Times new Roman', 'bold' => false, 'italic' => false, 'size' => 12 ), 'alignment' => array( 'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, 'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER, 'wrap' => true ) ) );
   $objPHPExcel->getActiveSheet()->getStyle( 'I'.$i )->applyFromArray( array( 'font' => array( 'name' => 'Times new Roman', 'bold' => false, 'italic' => false, 'size' => 12 ), 'alignment' => array( 'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, 'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER, 'wrap' => true ) ) );
		
	$i++;
									$STT++;	
									$ghichu = "";
									$trangthai = "";
   
									}


								
   

   
   // Rename sheet
//$objPHPExcel->getActiveSheet()->setTitle('danh sach san pham');
// Set active sheet index to the first sheet, so Excel opens this as the first sheet
//$objPHPExcel->setActiveSheetIndex(0);

// Redirect output to a client’s web browser (Excel5)
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="ketqua.xls"');
header('Cache-Control: max-age=0');

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
$objWriter->save('php://output');
exit;
?>