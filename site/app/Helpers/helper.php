<?php

function calculateDistanceBetweenTwoAddresses($lat1, $lng1, $lat2, $lng2){
    $lat1 = deg2rad($lat1);
    $lng1 = deg2rad($lng1);

    $lat2 = deg2rad($lat2);
    $lng2 = deg2rad($lng2);

    $delta_lat = $lat2 - $lat1;
    $delta_lng = $lng2 - $lng1;

    $hav_lat = (sin($delta_lat / 2))**2;
    $hav_lng = (sin($delta_lng / 2))**2;

    $distance = 2 * asin(sqrt($hav_lat + cos($lat1) * cos($lat2) * $hav_lng));

    $distance = 6371*$distance;
    // 6371 km ölçümü
    // 3959 mil ölçümü
    return $distance;
}
