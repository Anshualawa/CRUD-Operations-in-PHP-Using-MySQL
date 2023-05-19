<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- ----------- BootStrap ------------- -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js
    "></script>
    <title>Document</title>

</head>

<body>

    <div class="row"> </div>


    <div class="container">
        <div class="row  px-5 text-center">

            <div class="col-lg-3 ">
                <form method="post" class="border  bg-info shadow mx-5 rounded"><input type="submit" name="ShowData"
                        value="Show Data" class="btn"></form>
            </div>

            <div class="col-lg-3 ">
                <form method="post" class="border  bg-success shadow mx-5 rounded"><input type="submit"
                        name="InsertData" value="Insert Data" class="btn"></form>
            </div>

            <div class="col-lg-3 ">
                <form method="post" class="border  bg-danger shadow mx-5 rounded"><input type="submit" name="DeleteData"
                        value="Delete Data" class="btn"></form>
            </div>

            <div class="col-lg-3 ">
                <form method="post" class="border  bg-warning shadow mx-5 rounded"><input type="submit"
                        name="UpdateData" value="Update Data" class="btn"></form>
            </div>

        </div>











        <?php

        if (isset($_POST['ShowData'])) {
            ShowData();
        } else if (isset($_POST['InsertData'])) {
            InsertData();
        } else if (isset($_POST['DeleteData'])) {
            echo 'Delete Data';
            // InsertData();
        } else if (isset($_POST['UpdateData'])) {
            echo 'Upadate Data';
            // InsertData();
        } else {
            ShowData();
        }





        //   ================== Start Fatch Data ==================
        function ShowData()
        {

            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "PracticeDB";
            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);
            // Check connection
            if ($conn->connect_error) {
                echo die("Connection failed: " . $conn->connect_error);
            }
            $sqll = "SELECT id, Full_Name, Email_ID, Contact_Number FROM PracticeDB.MyData";
            $result = $conn->query($sqll);

            if ($result->num_rows > 0) {
                // output data of each row
                echo '<table class="table">';
                echo '<thead class="table-dark text-center "><tr><th>ID</th><th>Full Name</th><th>Eamil ID</th><th>Contact Number</th><th colspan="2">Action</th></tr>';
                echo '<tbody>';
                while ($row = $result->fetch_assoc()) {
                    echo '<tr>'
                        . '<td style="text-align: center;">' . $row['id'] . '</td>'
                        . '<td>' . $row["Full_Name"] . '</td>'
                        . '<td>' . $row["Email_ID"] . '</td>'
                        . '<td>+91' . $row["Contact_Number"] . '</td>'
                        . '<td><span class="btn btn-warning">Update</span></td>'
                        . '<td><span class="btn btn-danger">Delete</span></td>'
                        . '</tr>';
                }
                echo '</tbody></table>';
            } else {
                echo "0 results";
            }
            $conn->close();
        }
        //   ================== End Fatch Data ==================
        

        // ================ start Insert Data ================
        function InsertData()
        {

            echo '<div class="container p-3 bg-light shadow rounded" style="width:295px;margin:10px auto !important">
    ' . '<form method="post">
        ' . '<label for="full_name">Full Name</label><br>
        ' . '<input type="text" name="full_name" required><br><br> 
        ' . '<label for="email_id" >Email ID</label><br>
        ' . '<input type="text" name="email_id" required><br><br>
        ' . '<label for="contact_number" >Contact Number</label><br>
        ' . '<input type="text" name="contact_number" required><br><br>
        ' . '<label for="passwordd" >Create Password</label><br>
        ' . '<input type="text" name="passwordd" required><br><br>
        ' . '<button class="btn btn-success shadow" name="InsertData">Insert</button>
        ' . ' </form></div>';

            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "PracticeDB";
            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);
            // Check connection
            if ($conn->connect_error) {
                echo die("Connection failed: " . $conn->connect_error);
            }
            // prepare and bind
            $stmt = $conn->prepare("INSERT INTO MyData (Full_Name, Email_ID, Contact_Number, Passwordd) VALUES (?, ?, ?, ?)");
            $stmt->bind_param("ssss", $fullName, $emailID, $ContactNumber, $passwordd);

            // set parameters and execute
            $fullName = $_POST['full_name'];
            $emailID = $_POST['email_id'];
            $ContactNumber = $_POST['contact_number'];
            $passwordd = $_POST['passwordd'];
            $stmt->execute();

            $stmt->close();
            $conn->close();
            ShowData();
        }
        // ================ end Insert Data================
        
        ?>

    </div>
</body>

</html>