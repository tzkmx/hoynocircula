<?php

namespace Jefrancomix\HoyNoCircula\Parser;

use Symfony\Component\DomCrawler\Crawler;

class SedemaScraperParser
{
    /**
     * @var Crawler
     */
    protected $crawler;
    public function __construct( Crawler $crawler, $content = null)
    {
        $this->crawler = $crawler;
        $this->crawler->add($content);
    }
    public function getInfo( $html = null)
    {
        $this->crawler->add($html);
    }
}
