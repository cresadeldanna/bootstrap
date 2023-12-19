<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cresadel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        * {
            margin: 0;
            padding: 0;
        }

        body {
            background-color: #6f7e7c;
        }

        .navbar {
            font-size: 25px;
            color: #F4F2DE;
            font-weight: bold;
            background-color: #272828;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .pic {
            width: 30%;
            height: 30%;
            object-fit: cover;
            background-color: #F4F2DE;
            padding: 20px;
            text-align: center;
            margin-bottom: 2vh;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .content {}

        /* Media query for screens smaller than 576px */
        @media (max-width: 576px) {
            .navbar {
                font-size: 18px;
            }

            .pic {
                width: 80%;
                height: auto;
                margin-top: 20px;
            }

            .container {
                height: auto;
                width: 100%;
                padding: 10px;
                text-align: center;
            }

            .mydiv {
                height: auto;
            }

        }
    </style>
</head>

<body>
    <?php
    $hostname = "localhost";
    $username = "root";
    $password = "";
    $dbname = "dbprofile";
    $conn = new mysqli($hostname, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM profilee";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            // Output data for each row
            $name = $row["name"];
            $description = $row["description"];
            $description2 = $row["description2"];
            $description3 = $row["description3"];
            $intro = $row["intro"];
            $photo = $row["photo"];
        }
    } else {
        echo "No data found.";
    }
    ?>

    <nav class="navbar navbar-expand-lg navbar fixed-top" id="mainNav">
        <div class="container px-4 px-lg-5">


            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="edit.php" style="color: #F4F2DE;">Edit</a></li>
            </ul>

        </div>
    </nav>
    <div class="container-fluid mydiv d-flex" style="height: 100vh;">
        <div class="container d-flex flex-row align-items-center">

            <div class="container d-flex justify-content-center align-items-center flex-column mt-5">
                <div class="pic">
                    <img src="<?php echo $photo; ?>" alt="mypicture" class="mypicture" style="width: 100%; height: 100%; object-fit: cover; border-radius: 15px;">
                </div>
                <div class=" container content" style=" background-color: #F4F2DE; padding: 20px;  text-align: center; position: relative; ">
                    <div>
                        <p class="h1 name mb-0" style="color:#272828;"><?php echo $name; ?></p>
                        <p class="description mt-1"><?php echo $intro; ?></p>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="container-fluid  d-flex  px-lg-5" style=" background-color: #F4F2DE; padding-top: 50px; padding-bottom: 90px;"  >
        <div class="container d-flex flex-column align-items-center pt-5" >
            <h1>ABOUT ME</h1>
            <p class="description mt-1"><?php echo $description; ?></p>
            <br>
            <p class="description mt-1"><?php echo $description2; ?></p>
            <br>
            <p class="description mt-1"><?php echo $description3; ?></p>
        </div>

    </div>


</body>

</html>