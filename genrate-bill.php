<?php
include 'database.php';
$id = $_GET['generatebill'];
$sql = "SELECT * FROM `patient-recient` WHERE Id = $id";
$result = mysqli_query($conn, $sql);

if ($result) {
  $row = mysqli_fetch_assoc($result);
  $name = $row["name"];
  $email = $row["email"];
  $address = $row["address"];
  $doctorname = $row["Doctor_name"];
  $time = $row["time"];
  $symptom = $row["symptom"];
}

$total = 0;
$error = "";

if (isset($_POST['submit'])) {
  $roomCharge = $_POST['roomCharge'];
  $doctorFee = $_POST['doctorFee'];
  $medicineCost = $_POST['medicineCost'];
  $total = $roomCharge + $doctorFee + $medicineCost;

  // Check if the name already exists in the billinfo table
  // $checkQuery = mysqli_query($conn, "SELECT * FROM `billinfo` WHERE name = '$name'");
  // if (mysqli_num_rows($checkQuery) > 0) {
  //   $message = 'You generate  bill before';
  //   header('Location: discharge.php');
  //   // exit;
  // } else {
    $sql = mysqli_query($conn, "INSERT INTO `billinfo` (name, room_fee, doctor_fee, medicin_cost, total) VALUES ('$name', $roomCharge, $doctorFee, $medicineCost, $total)");
    header('Location: print.php');
  }
// }
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
  <meta charset="utf-8">
  <title>Generate Bill</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-print-css/css/bootstrap-print.min.css" media="print">
  <style> 
    .invoice-box {
      max-width: 800px;
      margin-left: 100px;
      border: 1px solid #eee;
      box-shadow: 0 0 10px rgba(0, 0, 0, .15);
      font-size: 16px;
      line-height: 24px;
      font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
      color: #555;
    }

    .invoice-box table {
      width: 100%;
      line-height: inherit;
      text-align: left;
    }

    .invoice-box table td {
      padding: 5px;
      vertical-align: top;
    }

    .invoice-box table tr td:nth-child(2) {
      text-align: right;
    }

    .invoice-box table tr.top table td {
      padding-bottom: 20px;
    }

    .invoice-box table tr.top table td.title {
      font-size: 45px;
      line-height: 45px;
      color: #333;
    }

    .invoice-box table tr.information table td {
      padding-bottom: 40px;
    }

    .invoice-box table tr.heading td {
      background: #eee;
      border-bottom: 1px solid #ddd;
      font-weight: bold;
    }

    .invoice-box table tr.details td {
      padding-bottom: 20px;
    }

    .invoice-box table tr.item td {
      border-bottom: 1px solid #eee;
    }

    .invoice-box table tr.item.last td {
      border-bottom: none;
    }

    .invoice-box table tr.total td:nth-child(2) {
      border-top: 2px solid #eee;
      font-weight: bold;
    }

    @media only screen and (max-width: 600px) {
      .invoice-box table tr.top table td {
        width: 100%;
        display: block;
        text-align: center;
      }

      .invoice-box table tr.information table td {
        width: 100%;
        display: block;
        text-align: center;
      }
    }

    .rtl {
      direction: rtl;
      font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
    }

    .rtl table {
      text-align: right;
    }

    .rtl table tr td:nth-child(2) {
      text-align: left;
    }

    .menu {
      top: 50px;
    }
  </style>
  <link rel="stylesheet" href="bootstrap.min.css">
</head>
<body>
<br><br><br>

<div class="invoice-box">
  <table cellpadding="0" cellspacing="0">
    <tr class="top">
      <td colspan="2">
      <form method="post">
        <table>
          <tr>
            <td class="title">
            <?php
         if(isset($message)){
          echo '<div class="message text-bg-danger p-1">'.$message.'</div>';
         }?>
              <h3>Hospital Management</h3>
            </td>
          
            <td>
              relese Date:<?php echo $time;?><br>
            </td>
          </tr>
        </table>
      </td>
    </tr>
    <tr class="information">
      <td colspan="2">
        <table>
          <tr>
            <td>
              Patient Name: <?php echo $name;?><br>
              Patient Email: <?php echo $email;?><br>
              Patient Address: <?php echo $address;?><br>
            </td>
            <td>
              Doctor Name:<br>
              <?php echo $doctorname;?><br>
            </td>
          </tr>
        </table>
      </td>
    </tr>
    <tr class="heading">
      <td>
        Disease and Symptoms
      </td>
      <td>
      </td>
    </tr>
    <tr class="details">
      <td>
      <?php echo $symptom;?><br>
      </td>
    </tr>
    <tr class="heading">
      <td>
        Item
      </td>
      <td>
        Price
      </td>
    </tr>

  </form>
    <form method="post">

      <tr class="item">
        <td>
          Room Charge (Per Day)
        </td>
        <td>
          <input type="number" name="roomCharge" placeholder="in birr" value="" required>
        </td>
       
      </tr>
      <tr class="item">
        <td>
          Doctor Fee
        </td>
        <td>
          <input type="number" name="doctorFee" placeholder="In birr" value="" required>
        </td>
      </tr>
      <tr class="item">
        <td>
          Medicine Cost
        </td>
    
        <td>
          <input type="number" name="medicineCost" placeholder="in birr" value="" required>
        </td>
      </tr>
      <tr class="item last">
      </tr>

      <tr class="total">
        <td>
          <label for="total" class="text-dark text-center w-100 text-bg-info">Total: <?php echo $total?></label>
        </td>
        
        <td>
          <input type="submit" name="submit" value="Generate Bill" class="btn btn-primary">
        </td>
      </tr>

    </form>
  </table>
</div>

</body>
</html>
