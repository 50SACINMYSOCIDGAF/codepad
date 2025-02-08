<?php
$pad_dir = dirname(__FILE__);
$info = json_decode(file_get_contents($pad_dir . '/info.json'), true);
$code = file_get_contents($pad_dir . '/code.txt');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Code Pad Viewer</title>
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/11.7.0/styles/default.min.css">
    <script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/11.7.0/highlight.min.js"></script>
    <style>
        body { font-family: Arial, sans-serif; line-height: 1.6; margin: 0; padding: 20px; background-color: #f4f4f4; }
        .container { max-width: 1000px; margin: 0 auto; background-color: #fff; padding: 20px; border-radius: 5px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); }
        pre { margin: 0; padding: 15px; border-radius: 4px; }
        .info { margin-bottom: 20px; color: #666; }
    </style>
</head>
<body>
    <div class="container">
        <div class="info">
            <h2>Code Pad</h2>
            <p>Language: <?php echo htmlspecialchars($info['language']); ?></p>
            <p>Created: <?php echo htmlspecialchars($info['created_at']); ?></p>
        </div>
        <pre><code class="language-<?php echo htmlspecialchars($info['language']); ?>"><?php echo htmlspecialchars($code); ?></code></pre>
    </div>
    <script>hljs.highlightAll();</script>
</body>
</html>