<?php
include 'database.php';
$id = $_GET['id'];
$sql = "SELECT * FROM `appointment_list` WHERE Id = $id";
$result = mysqli_query($conn, $sql);

if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $name = $row["patient_name"];
    $dname = $row["doctor_name"];
}

if (isset($_POST['submit'])) {
    $patientName = $_POST['patient_name'];
    $doctorName = $_POST['doctor_name'];
    $tests = $_POST['tests'] ?? [];

    // Prepare and execute the INSERT statement
    $insert = $conn->prepare("INSERT INTO `appointment_list` (doctor_name, patient_name, descripition,appoint) VALUES (?, ?, ?, 'reported')");

    // Bind parameters and execute the statement
    $insert->bind_param("sss", $doctorName, $patientName, $testValues);

    // Combine selected tests into a single string
    $testValues = implode(", ", $tests);

    // Execute the statement
    $insert->execute();

    if ($insert) {
        echo '<script>';
        echo 'alert("Report generated successfully!");';
        echo 'window.location.href = "lab_report.php";';
        echo '</script>';
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Lab Report Generator</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="login.css">
    <link rel="stylesheet" href="bootstrap.min.css">
</head>
<body>
    <div class="form-container">
        <form method="POST">
            <h3>Patient Information:</h3>
            <input type="text" name="patient_name" class="box" required placeholder="Enter the patient name" value="<?php echo $name ?? ''; ?>"><br> <!-- Add null coalescing operator to handle undefined variable -->
            <input type="text" name="doctor_name" class="box" required placeholder="Enter the doctor name" value="<?php echo $dname ?? ''; ?>"><!-- Add null coalescing operator to handle undefined variable -->
            <h3>Test Value:</h3>
            <div class="" style="margin:0px;text-align:left;font-size:18px">
                <div class="col"> <input type="checkbox" name="tests[]" value="blood_test"> Blood Test</div>
                <div class="col"><input type="checkbox" name="tests[]" value="urine_test"> Urine Test</div>
                <div class="col"><input type="checkbox" name="tests[]" value="xray"> X-Ray</div>
                <div class="col"><input type="checkbox" name="tests[]" value="ultrasound"> Ultrasound</div>
                <div class="col"><input type="checkbox" name="tests[]" value="genetic_test"> Genetic Test</div>
                <div class="col"> <input type="checkbox" name="tests[]" value="blood_test"> Blood Test</div>
                <div class="col"><input type="checkbox" name="tests[]" value="urine_test"> Urine Test</div>
                <div class="col"><input type="checkbox" name="tests[]" value="xray"> X-Ray</div>
                <div class="col"><input type="checkbox" name="tests[]" value="ultrasound"> Ultrasound</div>
                <div class="col"><input type="checkbox" name="tests[]" value="genetic_test"> Genetic Test</div>
            </div>
            <input type="submit" name="submit" value="Generate Report" class="btn btn-primary">
        </form>
    </div>
</body>
</html>
