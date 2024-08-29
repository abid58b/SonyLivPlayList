<?php
// URL of the JSON file
$json_url = "https://raw.githubusercontent.com/drmlive/sliv-live-events/main/sonyliv.json"; // Replace with your actual URL

// Get JSON data from the URL
$json_data = file_get_contents($json_url);

// Decode JSON into an associative array
$matches_data = json_decode($json_data, true);

/// Initialize a variable to hold the playlist content
$playlist_content = "#EXTM3U #EXT-X-VERSION:3 x-tvg-url=\"https://www.tsepg.cf/epg.xml.gz\"" . "\n\n";

// Loop through the matches and prepare the content
foreach ($matches_data['matches'] as $match) {
    $event_name = $match['event_name'];
    $match_name = $match['match_name'];
    $image_url = $match['src'];
    $stream_url = $match['pub_stream_url']; // Use 'dai_stream_url' if you prefer that stream

    // Append match details to the playlist content
    $playlist_content .= "#EXTINF:-1 tvg-id=\"SonyLiv\" tvg-logo=\"$image_url\",$event_name - $match_name\n";
    $playlist_content .= "$stream_url\n\n";
}

// Output the playlist content
echo $playlist_content;

?>
