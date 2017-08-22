<?php

require __DIR__ . '/vendor/autoload.php';

function strip_of( $subject, $to_strip ) {
	$search = [ $to_strip, ' ', "\t", "\n" ];
	return str_replace( $search, [ '', '', '', '' ], $subject );
}

use Goutte\Client;

$client = new Client();

$crawler = $client->request( 'GET', 'http://148.243.232.113:8002/webserviceSIMAT.asmx/SEDEMA' );
$data = json_decode( $crawler->filter( 'string' )->text(), 'ARRAY_A' );
$sedema = $data['pollutionMeasurements'];
var_export($sedema);


exit();

$crawler = $client->request( 'GET', 'http://148.243.232.113:8002/webserviceSIMAT.asmx/Ciclistas' );
echo "Ciclistas\n", $crawler->filter( 'string' )->text();
