<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>My LEMP Test Page</title>
    <style>
        body { font-family: Arial; background: #f7f7f7; text-align: center; margin-top: 50px; }
        h1 { color: #333; }
        p { font-size: 1.2em; color: #666; }
    </style>
</head>
<body>
    <h1>Valitettavasta ei jaksa laittaa enempää aikaa sivun muokkaukkseen</h1>

    <?php
// Database connection
$servername = "localhost";
$username   = "webuser";
$password   = "MyNewPassword123!";
$dbname     = "lempdb";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->query("SELECT NOW() AS sqltime");
    $row = $stmt->fetch();
    $sql_time = $row['sqltime'];
} catch(PDOException $e) {
    $sql_time = "Database error: " . htmlspecialchars($e->getMessage());
}

// PHP server time
$php_time = date("Y-m-d H:i:s");
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>My Personalized LEMP Page</title>
<style>
    body {
        font-family: 'Segoe UI', Arial, sans-serif;
        background: linear-gradient(135deg, #dbeafe, #fef3c7);
        color: #1e293b;
        text-align: center;
        padding-top: 60px;
    }
    h1 {
        color: #0f172a;
        font-size: 2.5em;
        margin-bottom: 0.5em;
    }
    .card {
        background: white;
        display: inline-block;
        padding: 20px 40px;
        border-radius: 16px;
        box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    }
    p {
        font-size: 1.2em;
    }
    .sql { color: #16a34a; }
    .php { color: #2563eb; }
</style>
</head>
<body>
    <h1>-------------------------------------------------------</h1>
    <div class="card">
        <p>Current <span class="sql">SQL Server Time:</span> <strong><?= htmlspecialchars($sql_time) ?></strong></p>
        <p>Current <span class="php">PHP Server Time:</span> <strong><?= htmlspecialchars($php_time) ?></strong></p>
        <p>Page powered by <strong>Nginx + PHP + MariaDB</strong></p>
    </div>
</body>
</html>
