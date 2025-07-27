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
    <title>API Keys</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">
    <div class="bg-white shadow-lg rounded-lg p-8 w-full max-w-md">
        <h2 class="text-2xl font-bold mb-6 text-center">API Key Manager</h2>
        <?php 
        echo "<form id='apiForm' action='#' name='myForm' method='post' class='space-y-6'>"
        ?>
            <label for="select_api" class="block text-gray-700 font-semibold mb-2">Select An API Key:</label>
            <select name="select" id="select_api" class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-400">
                <?php foreach ($apiKeys as $key => $value) {
                    echo "<option value='$value'>$key</option>";
                }
                ?>
            </select>
            <div class="flex space-x-4 my-3">
                <div>
                    <input type="radio" name="select_copy" id="api_key" value="api_key" class="mr-1" checked />
                    <label for="api_key" class="text-gray-600">KEY</label>
                </div>
                <div>
                    <input type="radio" name="select_copy" id="api_value" value="api_value" class="mr-1" />
                    <label for="api_value" class="text-gray-600">VALUE</label>
                </div>
                <div>
                    <input type="radio" name="select_copy" id="api_combined" value="api_combined" class="mr-1" />
                    <label for="api_combined" class="text-gray-600">KEY=VALUE</label>
                </div>
            </div>
            <button id="copyBtn" type="button" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded transition">Copy</button>
        </form>
    </div>
    <script>
        const apiKeys = <?php echo json_encode($apiKeys); ?>;
        document.getElementById('copyBtn').addEventListener('click', function() {
            const select = document.getElementById('select_api');
            const selectedKey = select.options[select.selectedIndex].text;
            const selectedValue = select.value;
            const radios = document.getElementsByName('select_copy');
            let selectedType = 'api_key';
            for (const radio of radios) {
                if (radio.checked) {
                    selectedType = radio.value;
                    break;
                }
            }
            let copyText = '';
            if (selectedType === 'api_key') {
                copyText = selectedKey;
            } else if (selectedType === 'api_value') {
                copyText = selectedValue;
            } else if (selectedType === 'api_combined') {
                copyText = selectedKey + '=' + selectedValue;
            }
            navigator.clipboard.writeText(copyText).then(() => {
                alert('Copied: ' + copyText);
            }).catch(err => {
                console.error('Failed to copy: ', err);
            });
        });
    </script>
</body>
</html>
