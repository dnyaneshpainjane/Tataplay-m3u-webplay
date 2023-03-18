<?php

$url = $_POST["m3u_url"];

// Define the file path for the JSON file
$file = 'static/data/playlist.json';

// Check if the file already exists and if its modification time is from a different day
if (file_exists($file) && date('Ymd', filemtime($file)) === date('Ymd')) {
    // Use the saved JSON file
    $json = file_get_contents($file);
} else {
    // Fetch the m3u file from the URL
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.3');
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

    $response = curl_exec($ch);
    $statusCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

    if ($statusCode !== 200) {
        throw new Exception("Failed to fetch m3u file. HTTP status code: {$statusCode}");
    }

    // Parse the m3u file
    $lines = explode("\n", $response);
    $channels = array();

    // Define the $channel array with default values
    $channel = array(
        'name' => '',
        'logo' => '',
        'group' => '',
        'url' => '',
        'license_key' => ''
    );

    foreach ($lines as $line) {
        if (strpos($line, '#EXTINF') === 0) {
            $parts = explode(',', $line);
            $channel['name'] = $parts[1];
            preg_match('/tvg-logo="([^"]*)"/', $line, $matches);
            $channel['logo'] = $matches[1];
            if (count($parts) >= 4) {
                $channel['group'] = str_replace('group-title=', '', $parts[3]);
            } else {
                $channel['group'] = '';
            }
        } else if (strpos($line, '#KODIPROP:inputstream.adaptive.license_key=') === 0) {
            $licenseKey = str_replace('#KODIPROP:inputstream.adaptive.license_key=', '', $line);
            if (empty($licenseKey)) {
                throw new Exception("m3u file has no license_key attribute.");
            }
            $channel['license_key'] = $licenseKey;
        } else if (strpos($line, 'http') === 0) {
            $channel['url'] = $line;
            $channels[] = $channel;
            // Reset the $channel array with default values for the next iteration
            $channel = array(
                'name' => '',
                'logo' => '',
                'group' => '',
                'url' => '',
                'license_key' => ''
            );
        }
    }
    // Convert the channels array to JSON format
    $json = json_encode($channels);

    // Save the JSON to a file
    $file = 'static/data/playlist.json';
    $handle = fopen($file, 'w') or die("Unable to open file!");
    fwrite($handle, $json);
    fclose($handle);



    echo "Done. Channels loaded successfully.";}
