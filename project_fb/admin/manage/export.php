<?php 
$mysqli = mysqli_connect("localhost", "timhieul_root2", "CANA123@123", "timhieul_thi_tn");
$mysqli->set_charset('utf8');
require '../../PHP_EXCEL/Classes/PHPExcel.php';
if (isset($_POST['export'])) {
  $objExcel = new PHPExcel;
  $objExcel -> setActiveSheetIndex(0);
  $sheet = $objExcel->getActiveSheet()->setTitle('User');
  $rowCount=1;
  $sheet->setCellValue('A'.$rowCount,'Họ và tên');
  $sheet->setCellValue('B'.$rowCount,'Email');
  $sheet->setCellValue('C'.$rowCount,'Đơn vị công tác');
  $sheet->setCellValue('D'.$rowCount,'Điểm');
  $sheet->getColumnDimension("A")->setAutoSize(true);
  $sheet->getColumnDimension("B")->setAutoSize(true);
   $sheet->getColumnDimension("C")->setAutoSize(true);
  $sheet->getStyle('A1:D1')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor('A1:D1')->setARGB('00ffff00');
  $sheet->getStyle('A1:D1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
  $result = $mysqli->query('SELECT fullname,email,class,points FROM user');
  while ($row = mysqli_fetch_array($result)) {
   $rowCount++;
   $sheet->setCellValue('A'.$rowCount,$row['fullname']);
    $sheet->setCellValue('B'.$rowCount,$row['email']);
     $sheet->setCellValue('C'.$rowCount,$row['class']);
      $sheet->setCellValue('D'.$rowCount,$row['points']);
  }
  $styleArray = array(
      'borders' => array(
        'allborders' => array(
          'style' => PHPExcel_Style_Border::BORDER_THIN
        )
      )
  );
  $sheet->getStyle('A1:' . 'D'.($rowCount+1))->applyFromArray($styleArray);
  $objwrite = new PHPExcel_Writer_Excel2007($objExcel);
  $filename = 'export.xlsx';
  $objwrite->save($filename);
  header('Content-Disposition: attachment; filename="' . $filename . '"');
  header('Content-Type: application/vnd.openxmlformatsofficedocument.spreadsheetml.sheet');
  header('Content-Length: '.filesize($filename));
  header('Content-Transfer-Encoding: binary');
  header('Cache-Control: must-revalidate');
  header('Pragma: no-cache');
  readfile($filename);
  return;
}
?>