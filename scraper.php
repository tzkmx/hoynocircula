<?php

require __DIR__ . '/vendor/autoload.php';

function strip_of( $subject, $to_strip ) {
	$search = [ $to_strip, ' ', "\t", "\n" ];
	return str_replace( $search, [ '', '', '', '' ], $subject );
}

use Goutte\Client;

$client = new Client();

$crawler = $client->request( 'GET', 'http://semovi.cdmx.gob.mx' );

/*
{
  page(url: "http://semovi.cdmx.gob.mx/") {
    query(selector: "#Level-1 .Widget-circulate--sm") {
      inclusive: query(selector: ".Widget-box") {
        text: attr(name: "inclu-text")
      }
      date: query(selector: ".Title:first h4") {
        text: content
      }
      hoynocircula: query(selector: ".Widget-child-item:first .Widget-label--lg") {
        terminacion: query(selector: "strong") {
          text
        }
        color: attr(name: "class")
      }
      verifican: query(selector: ".Widget-child-item:last .Widget-label-half") {
        terminacion: query(selector: "strong") {
          text
        }
        color: query(selector: ".Widget-label--lg") {
          attr(name: "class")
        }
      }
      sabado: query(selector: ".Widget-child-item:nth-child(2) .Widget-label--lg") {
        clave: text
      }
    }
  }
}
*/

$widget = $crawler->filter( '#Level-1 .Widget-circulate--sm' )->first();

$inclusive = $widget->filter( '.Widget-box' )->first()->extract( 'inclu-text' )[0];
$date = trim( $widget->filter( '.Title h4' )->first()->text() );
$hoynocircula = $widget->filter( '.Widget-child-item .Widget-label--lg' )->first();
$hoynocircula = [
	'terminacion' => $hoynocircula->filter( 'strong' )->text(),
	'color' => strip_of( $hoynocircula->extract( 'class' ), 'Widget-label--lg' ),
];
$verifican = $widget->filter( '.Widget-child-item' )->last()->filter( '.Widget-label-half' )
	->each(
		function( $node, $i ) {
			 return [
				 'terminacion' => $node->filter( 'strong' )->text(),
				 'color' => strip_of( $node->filter( '.Widget-label--lg' )->extract( 'class' ), 'Widget-label--lg' ),
			 ];
		}
	);
$sabado = $widget->filter( '.Widget-child-item' )->eq( 1 )->filter( '.Widget-label--lg' )
	->each(
		function( $node, $i ) {
				return trim( $node->text() );
		}
	);

echo json_encode( compact( 'inclusive', 'date', 'hoynocircula', 'verifican', 'sabado' ), JSON_PRETTY_PRINT );

