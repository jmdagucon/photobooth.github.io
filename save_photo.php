<?php
if (isset($_POST['photo'])) {
    $data = $_POST['photo'];

    // Remove base64 header
    $data = str_replace('data:image/png;base64,', '', $data);
    $data = str_replace(' ', '+', $data);
    $decodedData = base64_decode($data);

    $filename = 'photo_' . time() . '.png';
    $folder = 'uploads/';
    $filepath = $folder . $filename;

    // Create uploads folder if missing
    if (!file_exists($folder)) {
        mkdir($folder, 0777, true);
    }

    if (file_put_contents($filepath, $decodedData)) {
        echo "✅ Photo saved successfully as: $filename";
    } else {
        echo "❌ Error: Failed to save the photo.";
    }
} else {
    echo "❌ Error: No photo data received.";
}
