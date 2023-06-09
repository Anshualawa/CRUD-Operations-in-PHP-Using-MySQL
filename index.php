<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- ----------- BootStrap ------------- -->
    <!-- Option 1: Include in HTML -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js" crossorigin="anonymous"></script>
    <title>PHP</title>

</head>

<body>

    <div class="section">
        <div class="Container m-5 ">
            <div class="">
                <div class="p-2 shadow" id="custumForm" style="display: none;">
                    <form method="post">
                        <label for="name">Name</label>
                        <input type="text" id="name">
                        <label for="email">Email ID</label>
                        <input type="email" id="email">
                        <label for="phohe">Phone</label>
                        <input type="tel" id="phone">
                        <button class="btn btn-light" type="submit">ADD</button>
                    </form>
                </div>


                <table class="table table-hover table-primary shadow rounded">
                    <legend>CRUD Operation</legend>
                    <thead class="table-info shadow  sticky-top">
                        <tr>
                            <th><i class="bi bi-person-bounding-box"></i> Name</th>
                            <th> <i class="bi bi-envelope-at-fill"></i> Email</th>
                            <th> <span class="bi bi-phone"> Phone</span></th>
                            <th colspan="2"><span class="btn btn-light  bi bi-person-plus shadow"
                                    onclick="mypostForm()"></span>
                            </th>
                        </tr>
                    </thead>
                    <tbody id="data">
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- <script>
        var url = "http://localhost:81/mySite/GitHub/CRUD-Operations-in-PHP-Using-MySQL/customers/main.php";


        let options = {
            method: "POST",
            headers: {
                "Content-type": "application/json"
            },
            
            body: JSON.stringify({
                name: 'MALAN',
                email: 'magnet@gmail.com',
                phone: '456566797',
            }),
        }

        fetch(url, options)
            .then((response) => response.json())
            .then((json) => console.log(json))



    </script> -->

    <script src="myProgram.js"></script>
</body>

</html>