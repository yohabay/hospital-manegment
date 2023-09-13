
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
    $diagname = $_POST['result_of_diagnosis'];

    // Prepare and execute the INSERT statement
    $insert = $conn->prepare("INSERT INTO `appointment_list` (doctor_name, patient_name, descripition,Result_of_Diagnosis,appoint) VALUES (?, ?, ?,?, 'Tested')");

    // Bind parameters and execute the statement
    $insert->bind_param("ssss", $doctorName, $patientName, $testValues, $diagname);

    // Combine selected tests into a single string
    $testValues = implode(", ", $tests);

    // Execute the statement
    $insert->execute();

    if ($insert) {
        echo '<script>';
        echo 'alert("Report generated successfully!");';
        echo 'window.location.href = "patient-lab-test.php";';
        echo '</script>';
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Lab Report Generator</title>
    <link rel="stylesheet" href="scs.css">
    <link rel="stylesheet" href="login.css">
    <link rel="stylesheet" href="bootstrap.min.css">
</head>
<body>
    <div class="form-container">
        <form method="POST">
            <h3>Patient Information:</h3>
            <input type="text" name="patient_name" class="box" required placeholder="Enter the patient name" value="<?php echo $name ?? ''; ?>"><br> <!-- Add null coalescing operator to handle undefined variable -->
            <input type="text" name="doctor_name" class="box" required placeholder="Enter the doctor name" value="<?php echo $dname ?? ''; ?>"><!-- Add null coalescing operator to handle undefined variable -->
            <input type="text" name="result_of_diagnosis" class="box" required placeholder="write the laboratory result" value="<?php echo $diagname ?? ''; ?>"><!-- Add null coalescing operator to handle undefined variable -->
            <h3>Tested Value:</h3>
            <div class="" style="margin:0px;text-align:left;font-size:18px">
                <div class="col"> <input type="checkbox" name="tests[]" value="'Hemoglobin' => '14.2 g/dL'"> Blood Test</div>
                <div class="col"><input type="checkbox" name="tests[]" value="'White Blood Cells' => '8.9 x 10^9/L'"> Urine Test</div>
                <div class="col"><input type="checkbox" name="tests[]" value="Platelet Count' => '200 x 10^9/L'"> X-Ray</div>
                <div class="col"><input type="checkbox" name="tests[]" value="'Red Blood Cells' => '4.5 x 10^12/L'"> Ultrasound</div>
                <div class="col"><input type="checkbox" name="tests[]" value=" 'Glucose' => '95 mg/dL'"> Genetic Test</div>
                <div class="col"> <input type="checkbox" name="tests[]" value="'Cholesterol' => '180 mg/dL'"> Blood Test</div>
                <div class="col"><input type="checkbox" name="tests[]" value=" 'Liver Enzymes' => 'ALT: 25 U/L, AST: 30 U/L'"> Urine Test</div>
                <div class="col"><input type="checkbox" name="tests[]" value="'Kidney Function' => 'Creatinine: 0.9 mg/dL, BUN: 12 mg/dL',"> X-Ray</div>
                <div class="col"><input type="checkbox" name="tests[]" value="'Thyroid Function' => 'TSH: 2.5 mIU/L, T4: 1.2 ng/dL'"> Ultrasound</div>
                <div class="col"><input type="checkbox" name="tests[]" value=" 'Urine Analysis' => 'pH: 6.0, Protein: Negative, Glucose: Negative'"> Genetic Test</div>
            </div>
            <input type="submit" name="submit" value="Generate Report" class="btn btn-primary">
        </form>
    </div>
</body>
</html>

