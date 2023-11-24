<?php

$apiKey = 'eyJhbGciOiJIUzI1NiJ9.eyJzdWIiOiJzZXJnaW8udW1lQGhvdG1haWwuY29tIiwianRpIjoiZWZjYTIyZDAtNDQ0ZS00ODliLWFkZTQtNTQ2YzdjMmJjYTQwIiwiaXNzIjoiQUVNRVQiLCJpYXQiOjE3MDA2ODg5MjUsInVzZXJJZCI6ImVmY2EyMmQwLTQ0NGUtNDg5Yi1hZGU0LTU0NmM3YzJiY2E0MCIsInJvbGUiOiIifQ.FCsaWP4fIZ_XxA896QlHO9kj-ai_Rq0YQLefAZZam_w';  

$url = 'https://opendata.aemet.es/opendata/api/prediccion/especifica/montaña/pasada/area/nev1';

$ch = curl_init($url);

curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'cache-control: no-cache',
    'api_key: ' . $apiKey
]);

$response = curl_exec($ch);

if (curl_errno($ch)) {
    echo 'Error: ' . curl_error($ch);
} else {
    echo $response;
}

curl_close($ch);
?>
