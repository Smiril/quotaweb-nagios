<?php
$location = $_GET["disk"]; // this location where storagedirs are located linux server
$sizefree = floor( disk_free_space( $location )/ ( 1024 * 1024 ) );
$sizedisk = floor( disk_total_space( $location )/ ( 1024 * 1024 ) );
function formatBytes($size1, $decimals = 0){
    $unit = array(
        '0' => 'Byte',
        '1' => 'KB',
        '2' => 'MB',
        '3' => 'GB',
        '4' => 'TB',
        '5' => 'PB',
        '6' => 'EB',
        '7' => 'ZB',
        '8' => 'YB'
    );

    for($i = 0; $size1 >= 1024 && $i <= count($unit); $i++){
        $size1 = $size1 /= 1024;
    }

    return round($size1, $decimals).'';
}

//check on disk to see directory size
    $dirname = $location;
    $io = popen ( '/usr/bin/du -sb ' . $dirname, 'r' );
    $size = fgets ( $io , 4096);
    $sizecurb = substr ( $size, 0, strpos ( $size, "\t" ) );
    pclose ( $io );
// check if user has higher then default quota
    $maxquot = $sizefree;
    $maxspace = $sizedisk; 

//print current usage in MB, and the max available space in MB

echo "-".formatBytes($sizecurb)."-".$maxspace."-".$maxquot."";

//close the connection
?>
