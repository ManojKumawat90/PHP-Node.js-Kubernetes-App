<?php
$api_url = "http://backend-service.default.svc.cluster.local:3000/api";
$response = file_get_contents($api_url);
$data = json_decode($response, true);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PHP Frontend</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>PHP + Node.js Kubernetes App</h1>
    <p>Backend Response: <?= $data["message"] ?? "No response" ?></p>
    <script src="script.js"></script>
</body>
</html>

