<?php 

    $apiKeys = [
        "Api Name" => "Api Key",
        "Api Name 2" => "Api Key 2"
    ];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Api Keys</title>
    <script>
        function copyToClipboard(value) {
            navigator.clipboard.writeText(value).then(() => {
                alert("Copied: " + value);
            }).catch(err => {
                console.error("Failure: ", err);
            });
        }
    </script>
    <style>
        li * { 
            margin : 10px }
    </style>
</head>
<body>
    <h2>My Api Keys</h2>
    <p>The keys will be copied as ApiName=ApiKey.<br> Example: OPENAI_API_KEY=sk-proj123456</p>
    <ul>
        <?php
            foreach ($apiKeys as $key => $value) { 
                echo "<li>{$key}<button onclick=\"copyToClipboard('{$key}={$value}')\">Key+Value</button>
                <button onclick=\"copyToClipboard('{$key}')\">Key</button>
                <button onclick=\"copyToClipboard('{$value}')\">Value</button></li>";
            }
        ?>
    </ul>
</body>
</html>

