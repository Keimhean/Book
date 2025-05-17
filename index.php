<?php
include 'db.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>CRUD Application</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="css/styles.css">
    <link rel ="stylesheet" href="create.php">
    
</head>


// input field username and email
<body>
    <div class="container mt-5">
    <h2 class="gradient-text apple-font">Crud Application By Keimhean.</h2>
        <div class="form-container mb-4">

            <form action="process.php" method="POST">
                <div class="mb-3">
                    <label for="Username" class="form-label">
                        <i class="bi bi-person-fill"></i> Username
                    </label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="mb-3">
                    <label for="Email" class="form-label">
                        <i class="bi bi-envelope"></i> Email
                    </label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <button type="submit" name="create" class="btn btn-primary">
                    <i class="bi bi-plus-circle"></i> Add User
                </button>
            </form>
            
        </div>
       
// Search form
         <form action="index.php" method="GET" class="mb-4">
            <div class="input-group">
                <input type="text" class="form-control" name="search" placeholder="Search ID or email">
                <button class="btn btn-outline-secondary" type="submit">
                    <i class="bi bi-search"></i> Search
                </button>
            </div>
        </form>

// Table to display users
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>
                        <i class="bi bi-list-ul"></i> ID
                    </th>
                    <th>
                        <i class="bi bi-person-fill"></i> Username
                    </th>
                    <th>
                        <i class="bi bi-envelope"></i> Email
                </tr>
            </thead>
            <tbody>
                <?php
                $servername = "localhost";
                $username = "root";
                $password = "0000";
                $database = "myapp";
                $conn = mysqli_connect($servername, $username, $password, $database);

                if (!$conn) {
                    die("Connection failed: " . mysqli_connect_error());
                }

                // Check if the form is submitted
                include 'db.php';
                $search = $_GET['search'] ?? '';
                $query = "SELECT * FROM users WHERE name LIKE '%$search%' OR email LIKE '%$search%'";
                $result = mysqli_query($conn, $query);

                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>
                            <td>{$row['name']}</td>
                            <td>{$row['email']}</td>
                            <td>
                                <a href='edit.php?name={$row['name']}' class='btn btn-warning btn-sm'>Edit</a>
                                <a href='delete.php?name={$row['name']}' class='btn btn-danger btn-sm'>Delete</a>
                            </td>
                          </tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
    </div>
</body>
</html>