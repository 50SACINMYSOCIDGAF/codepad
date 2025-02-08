<?php
session_start();
$CORRECT_HASH = 'replace_with_bcrypt_hash';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $submitted_password = $_POST['password'] ?? '';
    
    if (password_verify($submitted_password, $CORRECT_HASH)) {
        $_SESSION['authenticated'] = true;
        echo json_encode(['success' => true]);
        exit;
    }
    
    echo json_encode(['success' => false, 'message' => 'Invalid password']);
    exit;
}

header('Location: /codepad/index.html');
exit;
?>