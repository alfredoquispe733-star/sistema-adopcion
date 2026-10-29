<?php

$file = 'D:/laragon/www/sistema-de-adopcion01/resources/views/welcome.blade.php';
$content = file_get_contents($file);

// Find and remove the volunteer section
$start = strpos($content, '<!-- Sección de Voluntariado -->');
if ($start !== false) {
    // Find the end of the volunteer section (next <!-- Footer -->)
    $end = strpos($content, '<!-- Footer -->', $start);
    if ($end !== false) {
        // Remove everything from start to just before Footer
        $content = substr($content, 0, $start).substr($content, $end);
        file_put_contents($file, $content);
        echo "Volunteer section removed successfully.\n";
    } else {
        echo "Footer marker not found after volunteer section.\n";
    }
} else {
    echo "Volunteer section marker not found.\n";
}
