<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit;
}

include 'connection.php';

$username = $_SESSION['user'];
$query = "SELECT * FROM users WHERE username='$username'";
$result = mysqli_query($conn, $query);
$user = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="card shadow-lg p-4" style="width: 100%; max-width: 600px;">
            <div class="card-body text-center">
                <h2 class="text-primary mb-4">Selamat Datang, <?php echo htmlspecialchars($_SESSION['user']); ?>!</h2>
                
                <div class="mb-4">
                    <?php if ($user['photo']): ?>
                        <img src="<?php echo $user['photo']; ?>" class="img-fluid rounded-circle img-profile" alt="Foto Profil">
                    <?php else: ?>
                        <img src="default-profile.png" class="img-fluid rounded-circle img-profile" alt="Default Foto Profil">
                    <?php endif; ?>
                </div>

                <h4 class="mb-4 text-muted">NPM: <?php echo $user['npm']; ?></h4>

                <a href="logout.php" class="btn btn-danger w-100 mb-2" style="border-radius: 25px;">Logout</a>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
