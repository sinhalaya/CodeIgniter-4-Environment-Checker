<?php
/**
 * CodeIgniter 4 System Environment Check
 *
 * This script checks your server environment to ensure it meets the requirements
 * for running CodeIgniter 4. It verifies the PHP version, required PHP extensions,
 * and other important configuration details.
 *
 * @author    RMC Software Solutions (@sinhalaya)
 * @license   Open-source
 * @copyright RMC Software Solutions 2021 - 2024
 */

// Set the minimum required PHP version
$minPHPVersion = '7.4';

// List of required PHP extensions for CodeIgniter 4
$requiredExtensions = [
    'json',
    'mbstring',
    'intl',
    'libxml',
    'openssl',
    'curl',
    'pdo',
    'sqlite3',
    'mysqli',
    'xml',
    'ctype',
    'dom',
    'fileinfo',
    'phar',
    'simplexml',
    'zlib',
];

// Additional optional extensions for improved performance or functionality
$optionalExtensions = [
    'xdebug',
    'gd', // For image handling
    'imagick', // For advanced image handling
    'zip', // For zip file handling
    'exif', // For reading image metadata
    'soap', // For SOAP services
    'sodium', // For cryptography
    'iconv', // Character set conversions
];

function checkPHPVersion($minPHPVersion) {
    $currentPHPVersion = phpversion();
    $result = version_compare($currentPHPVersion, $minPHPVersion, '>=');

    return [
        'version' => $currentPHPVersion,
        'required' => $minPHPVersion,
        'status' => $result ? 'OK' : 'Upgrade required',
    ];
}

function checkExtension($extension) {
    return extension_loaded($extension) ? 'Installed' : 'Not Installed';
}

function checkExtensions($extensions) {
    $results = [];
    foreach ($extensions as $extension) {
        $results[$extension] = checkExtension($extension);
    }
    return $results;
}

function checkAdditionalDetails() {
    return [
        'display_errors' => ini_get('display_errors') ? 'Enabled' : 'Disabled',
        'log_errors' => ini_get('log_errors') ? 'Enabled' : 'Disabled',
        'memory_limit' => ini_get('memory_limit'),
        'max_execution_time' => ini_get('max_execution_time') . ' seconds',
        'file_uploads' => ini_get('file_uploads') ? 'Enabled' : 'Disabled',
        'upload_max_filesize' => ini_get('upload_max_filesize'),
        'post_max_size' => ini_get('post_max_size'),
    ];
}

function printCheckResults($title, $results) {
    echo "<h2>$title</h2>";
    echo "<table>";
    echo "<tr><th>Extension</th><th>Status</th></tr>";
    foreach ($results as $key => $status) {
        $statusClass = $status === 'Installed' ? 'ok' : 'fail';
        echo "<tr><td>$key</td><td class='$statusClass'>$status</td></tr>";
    }
    echo "</table>";
}

// Start checking system requirements
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CodeIgniter 4 System Environment Check</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        h1 {
            background-color: #007BFF;
            color: white;
            padding: 15px;
            border-radius: 5px;
        }
        h2 {
            color: #333;
            margin-top: 40px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        td.ok {
            color: green;
            font-weight: bold;
        }
        td.fail {
            color: red;
            font-weight: bold;
        }
        .info {
            background-color: #f9f9f9;
            border-left: 5px solid #007BFF;
            padding: 10px;
            margin: 20px 0;
        }
        .footer {
            margin-top: 40px;
            font-size: 14px;
            color: #777;
            text-align: center;
        }
    </style>
</head>
<body>

<h1>CodeIgniter 4 System Environment Check</h1>

<div class="info">
    <p>This script checks your server's PHP version, required PHP extensions, and additional configuration settings to ensure your environment is ready for CodeIgniter 4.</p>
</div>

<?php
// Check PHP version
$phpVersionCheck = checkPHPVersion($minPHPVersion);
echo "<h2>PHP Version</h2>";
$statusClass = $phpVersionCheck['status'] === 'OK' ? 'ok' : 'fail';
echo "<p>Current PHP Version: <strong>{$phpVersionCheck['version']}</strong></p>";
echo "<p>Required PHP Version: <strong>{$phpVersionCheck['required']}</strong></p>";
echo "<p>Status: <strong class='$statusClass'>{$phpVersionCheck['status']}</strong></p>";

if ($phpVersionCheck['status'] !== 'OK') {
    echo "<p style='color: red;'>Your PHP version is too low. Please upgrade to at least PHP {$minPHPVersion}.</p>";
}

// Check required PHP extensions
$requiredExtensionCheck = checkExtensions($requiredExtensions);
printCheckResults('Required PHP Extensions', $requiredExtensionCheck);

// Check optional PHP extensions
$optionalExtensionCheck = checkExtensions($optionalExtensions);
printCheckResults('Optional PHP Extensions', $optionalExtensionCheck);

// Check additional details
$additionalDetails = checkAdditionalDetails();
echo "<h2>Additional Environment Details</h2>";
echo "<table>";
foreach ($additionalDetails as $key => $value) {
    echo "<tr><td>$key</td><td>$value</td></tr>";
}
echo "</table>";
?>

<div class="footer">
    <p>Environment check completed. Please review the results and ensure all required components are in place before proceeding with the CodeIgniter 4 installation.</p>
</div>

</body>
</html>
