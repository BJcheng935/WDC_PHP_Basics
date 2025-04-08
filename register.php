<?php
session_start();
$file = __DIR__ . '/auth/users.json';

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    
    // Basic validation
    if (empty($username) || empty($password)) {
        $error = "Please fill all fields";
    } else {
        $users = json_decode(file_get_contents($file), true) ?: [];
        
        // Check if user exists
        foreach ($users as $user) {
            if ($user['username'] === $username) {
                $error = "Username already taken";
                break;
            }
        }
        
        // Register new user
        if (!isset($error)) {
            $users[] = [
                'username' => $username,
                'password' => password_hash($password, PASSWORD_DEFAULT),
                'created_at' => date('Y-m-d H:i:s')
            ];
            
            file_put_contents($file, json_encode($users, JSON_PRETTY_PRINT));
            $_SESSION['username'] = $username;
            header('Location: dashboard.php');
            exit;
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
</head>
<body>
    <h2>Register</h2>
    <?php if (isset($error)): ?>
        <p style="color:red"><?= $error ?></p>
    <?php endif; ?>
    <form method="POST">
        <input type="text" name="username" placeholder="Username" required><br>
        <input type="password" name="password" placeholder="Password" required><br>
        <button type="submit">Register</button>
    </form>
    <p>Already have an account? <a href="login.php">Login</a></p>
</body>
</html>