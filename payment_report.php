<?php
session_start();
    include('admin/db_connect.php');
    ob_start();
        $query = $conn->query("SELECT * FROM system_settings limit 0")->fetch_array();
         foreach ($query as $key => $value) {
          if(!is_numeric($key))
            $_SESSION['system'][$key] = $value;
        }
    ob_end_flush();
  function fetch_data_new()  
 {    $output='';
      $conn = mysqli_connect("localhost", "root", "", "proyalbidding");  
      $session_user_id = $_SESSION['login_id'];
      $i = 1;
                $cat = array();
                $cat[] = '';
                $qry = $conn->query("SELECT * FROM categories ");
                while($row = $qry->fetch_assoc()){
                  $cat[$row['id']] = $row['name'];
                }
 $books = $conn->query("SELECT py.*, b.*, u.name as uname,p.name,p.bid_end_datetime bdt FROM payments py inner join bids b on b.id = py.bid_id inner join users u on u.id = b.user_id inner join products p on p.id = b.product_id WHERE u.id = $session_user_id ");
                while($row=$books->fetch_assoc()) {
                  $get = $conn->query("SELECT * FROM bids where product_id = {$row['product_id']} order by bid_amount desc limit 1 ");
                    $output .= "<tr>
                                <td>" . $i++. "</td>
                                <td>" . ucwords($row['name']) . "</td>
                                <td>" . ucwords($row['uname']). "</td>
                                <td>" . number_format($row['amount'],2). "</td>
                                 <td>" . ucwords($row['transaction_code']). "</td>
                                  <td>" . $row['date']. "</td>
                               
                    </tr>";
                    }
                    return $output;
     
 }
       
      require_once('TCPDF/tcpdf.php');  
      $obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);  
      $obj_pdf->SetCreator(PDF_CREATOR);  
      $obj_pdf->SetTitle("Payment reports");  
      $obj_pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);  
      $obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));  
      $obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
      $obj_pdf->SetDefaultMonospacedFont('helvetica');  
      $obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);  
      $obj_pdf->SetMargins(PDF_MARGIN_LEFT, '10', PDF_MARGIN_RIGHT);  
      $obj_pdf->setPrintHeader(false);  
      $obj_pdf->setPrintFooter(false);  
      $obj_pdf->SetAutoPageBreak(TRUE, 10);  
      $obj_pdf->SetFont('helvetica', '', 11);  
      $obj_pdf->AddPage();  
      $content = '';  
      $content .= '  
      <h4 align="center">Payment Report</h4><br /> 
      <table border="1" cellspacing="0" cellpadding="3">  
           <tr>  
                <th width="7%">#</th>  
                <th width="20%">Product</th>
        <th width="20%">Name</th>
        <th width="20%">Amount</th>
        <th width="20%">Transaction Code</th>
        <th width="20%">Date</th>  
           </tr>  
      ';  
      $content .= fetch_data_new();  
      $content .= '</table>';  
      $obj_pdf->writeHTML($content);
      ob_end_clean();
      $obj_pdf->Output('doc.pdf', 'I'); 
?>