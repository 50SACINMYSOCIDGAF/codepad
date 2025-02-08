<?php
session_start();
if (!isset($_SESSION['authenticated']) || $_SESSION['authenticated'] !== true) {
    header('Location: /codepad/index.html');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Code Pad Creator</title>
    <link rel="stylesheet" href="/codepad/styles.css">
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Create Code Pad</h1>
            <form action="/codepad/logout.php" method="POST" class="logout-form">
                <button type="submit" class="logout-btn">Logout</button>
            </form>
        </div>
        <form id="codePadForm" action="/codepad/create_pad.php" method="POST">
            <div class="form-group">
                <label for="language">Programming Language:</label>
                <select id="language" name="language" required>
                    <option value="javascript">JavaScript</option>
                    <option value="python">Python</option>
                    <option value="php">PHP</option>
                    <option value="java">Java</option>
                    <option value="cpp">C++</option>
                    <option value="csharp">C#</option>
                    <option value="ruby">Ruby</option>
                </select>
            </div>
            <div class="form-group">
                <label for="code">Code:</label>
                <textarea id="code" name="code" rows="15" required></textarea>
            </div>
            <div class="form-group">
                <label for="pad_password">Pad Password:</label>
                <input type="password" id="pad_password" name="pad_password" required>
            </div>
            <button type="submit">Create Pad</button>
        </form>
    </div>
    <script src="/codepad/script.js"></script>
</body>
</html>