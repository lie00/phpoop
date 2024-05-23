<?php
require_once('classes/database.php');


if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST['search'])) {
        $searchterm = $_POST['search']; 
        $con = new database();

        try {
            $connection = $con->opencon();
            
            // Check if the connection is successful
            if ($connection) {
                // SQL query with JOIN
                $query = $connection->prepare("SELECT users.User_Id, users.firstname, users.lastname, users.birthday, users.sex, users.username, users.user_profile_picture, CONCAT(user_address.city,', ', user_address.province) AS address FROM users INNER JOIN user_address ON users.User_Id = user_address.User_Id WHERE users.username LIKE ? OR users.User_Id LIKE ? OR CONCAT(user_address.city,', ', user_address.province) LIKE ? OR users.firstname LIKE ?");
                $query->execute(["%$searchterm%","%$searchterm%","%$searchterm%","%$searchterm%"]); 
                $users = $query->fetchAll(PDO::FETCH_ASSOC);

                // Generate HTML for table rows
                $html = '';
                foreach ($users as $user) {
                    $html .= '<tr>';
                    $html .= '<td>' . $user['User_Id'] . '</td>';
                    $html .= '<td><img src="' . htmlspecialchars($user['user_profile_picture']) . '" alt="Profile Picture" style="width: 50px; height: 50px; border-radius: 50%;"></td>';
                    $html .= '<td>' . $user['firstname'] . '</td>';
                    $html .= '<td>' . $user['lastname'] . '</td>';
                    $html .= '<td>' . $user['birthday'] . '</td>';
                    $html .= '<td>' . $user['sex'] . '</td>';
                    $html .= '<td>' . $user['username'] . '</td>';
                    $html .= '<td>' . $user['address'] . '</td>';
                    $html .= '<td>'; // Action column
                    $html .= '<form action="update.php" method="post" style="display: inline;">';
                    $html .= '<input type="hidden" name="id" value="' . $user['User_Id'] . '">';
                    $html .= '<button type="submit" class="btn btn-primary btn-sm">Edit</button>';
                    $html .= '</form>';
                    $html .= '<form method="POST" style="display: inline;">';
                    $html .= '<input type="hidden" name="id" value="' . $user['User_Id'] . '">';
                    $html .= '<input type="submit" name="delete" class="btn btn-danger btn-sm" value="Delete" onclick="return confirm(\'Are you sure you want to delete this user?\')">';
                    $html .= '</form>';
                    $html .= '</td>';
                    $html .= '</tr>';
                }
                echo $html;
            } else {
                echo json_encode(['error' => 'Database connection failed.']);
            }
        } catch (PDOException $e) {
            echo json_encode(['error' => $e->getMessage()]);
        }
    } else {
        echo json_encode(['error' => 'No search query provided.']);
    }
} 