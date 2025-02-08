<?php
session_start();
if (!isset($_SESSION['authenticated']) || $_SESSION['authenticated'] !== true) {
    die(json_encode(['success' => false, 'message' => 'Unauthorized']));
}

header('Content-Type: application/json');

$base_dir = 'pads/';
if (!file_exists($base_dir)) {
    mkdir($base_dir, 0777, true);
}

if (empty($_POST['language']) || empty($_POST['code']) || empty($_POST['pad_password'])) {
    die(json_encode(['success' => false, 'message' => 'All fields are required']));
}

$language = preg_replace('/[^a-zA-Z0-9]/', '', $_POST['language']);
$code = $_POST['code'];
$password = password_hash($_POST['pad_password'], PASSWORD_DEFAULT);

$pad_id = uniqid();
$pad_dir = $base_dir . $pad_id . '/';

if (!mkdir($pad_dir, 0777, true)) {
    die(json_encode(['success' => false, 'message' => 'Failed to create directory']));
}

$pad_info = [
    'language' => $language,
    'password' => $password,
    'created_at' => date('Y-m-d H:i:s')
];

file_put_contents($pad_dir . 'info.json', json_encode($pad_info));
file_put_contents($pad_dir . 'code.txt', $code);

$viewer_template = file_get_contents('viewer_template.php');
file_put_contents($pad_dir . 'index.php', $viewer_template);

echo json_encode([
    'success' => true,
    'url' => '/codepad/pads/' . $pad_id . '/'
]);
?>