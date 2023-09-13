<?php
include 'database.php';
$roomCharge = 0;
$doctorFee = 0;
$medicineCost = 0;
$total = 0;

$sql = "SELECT * FROM `patient-recient` ORDER BY Id DESC LIMIT 1";
$result = mysqli_query($conn, $sql);
if ($result && mysqli_num_rows($result) != 0) {
    $row = mysqli_fetch_assoc($result);
    $id = $row["Id"];
    $name = $row["name"];
    $email = $row["email"];
    $address = $row["address"];
    $dname = $row["Doctor_name"];
    $time = $row["time"];
    $symptom = $row["symptom"];
}

// Fetch bill information
$sql = "SELECT * FROM `billinfo` WHERE name='$name' ORDER BY id ASC";
$result = mysqli_query($conn, $sql);
if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $roomCharge = $row['room_fee'];
    $doctorFee = $row['doctor_fee'];
    $medicineCost = $row['medicin_cost'];
    $total = $row['total'];
}
?>


<!-- Rest of the HTML code -->

<!-- </body>
</html> -->
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
  <meta charset="utf-8">
  <title>generate bill</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-print-css/css/bootstrap-print.min.css" media="print">
  <style> 
    .invoice-box {
      max-width: 800px;dding: 3;
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

<div class="invoice-box  ">
  <table cellpadding="0" cellspacing="0">
    <tr class="top">
      <td colspan="2">
      <form method="post">
        <table>
          <tr>
            <td class="title">
              <h3>FIROMSIS HOSPITAL</h3>
            </td>
            <td>
              <?php
              include "database.php";
              $sql="select name,email,address from patient-receint";
              ?>
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
              Patient Name : <?php echo $name;?><br>
              Patient email : <?php echo $email;?><br>
              Patient Addres :<?php echo $address;?><br>
            </td>
            <td>
              Doctor Name :<br>
              <?php echo $dname;?><br>
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
          Room Charge (Per Day):
        </td>
        <td>
        <?php echo $roomCharge;?>
        </td>
      </tr>
      <tr class="item">
        <td>
          Doctor Fee:
        </td>
        <td>
        <?php echo $doctorFee ;?>
        </td>
      </tr>
      <tr class="item">
        <td>
          Medicine Cost:
        </td>
        <td>
        <?php echo $medicineCost ;?>
        </td><br>
        
      </tr>
      <tr class="item last">    
      </tr>

      <tr class="total">
        <td>
        Total:
        </td>
        <td>
        <?php echo $total ;?>
        </td><br>
        <td>
        <script>
function printPage() {
  window.print();
}
</script>
<button onclick="printPage()" class="btn btn-primary">Print this page</button>

        </td>

        <td>
        <a href="discharge.php" class="btn btn-success">back</a>
        </td><br>
        <td>
      </tr>
    </form>
  </table>
</div>

</body>
</html>
