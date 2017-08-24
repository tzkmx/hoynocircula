<?php

namespace Jefrancomix\HoyNoCircula\Data;

use Symfony\Component\Validator\Constraints as Assert;
use Jefrancomix\HoyNoCircula\Enum\CalidadAireEnum;

/**
 * class ReportData.
 * Contiene la información de un reporte de SEDEMA sobre
 * calidad del aire, radiación y medidas de protección a la población
 *
 * @package Jefrancomix\HoyNoCircula
 * @author Jesus E. Franco Martinez
 * @link http://148.243.232.113:8002/webserviceSIMAT.asmx/SEDEMA Fuente de datos canónica
 * @see https://gist.github.com/tzkmx/eaad6904729b6b58beeac27c754e042b
 */
class ReportData
{
    public function validImecaIndices()
    {
        return CalidadAireEnum::getIndices();
    }
    /**
     * @Assert\Choice(callback = "validImecaIndices")
     * @var string
     */
    protected $indiceImeca;
    /**
     * @var string
     */
    protected $colorImeca;
    /**
     * @var string[]
     */
    protected $calidadAireRecomendaciones;

    /**
     * @var int
     */
    protected $indiceRadiacion;
    /**
     * @var string
     */
    protected $indiceRadiacionGif;
    /**
     * @var string
     */
    protected $indiceRadiacionHex;
    /**
     * @var string
     */
    protected $indiceRadiacionText;
    /**
     * @var string
     */
    protected $riesgoUV;
    /**
     * @var string[]
     */
    protected $radiacionRecomendaciones;

    /**
     * @var string
     */
    protected $clima;
    /**
     * @var int
     */
    protected $temperatura;

    /**
     * @var string
     */
    protected $verificanUltimoMesColor;
    /**
     * @var string
     */
    protected $verificanUltimoMesColorHex;
    /**
     * @var string
     */
    protected $verificanPrimerMesColor;
    /**
     * @var string
     */
    protected $verificanPrimerMesColorHex;
    /**
     * @var string
     */
    protected $verificanPrimerMesTerminacion;

    /**
     * @var string
     */
    protected $hoyNoCirculaLeyenda;
    /**
     * @var string
     */
    protected $hoyNoCirculaTerminacion;
    /**
     * @var string
     */
    protected $hoyNoCirculaColor;
    /**
     * @var string
     */
    protected $hoyNoCirculaColorHex;
    /**
     * @var string
     */
    protected $hoy2NoCirculaTerminacion;
    /**
     * @var string
     */
    protected $hoy2NoCirculaColor;
    /**
     * @var string
     */
    protected $hoy2NoCirculaColorHex;

    /**
     * @var string
     */
    protected $sabadoNoCirculaLeyenda;
    /**
     * @var string
     */
    protected $sabadoNoCirculaHolograma1;
    /**
     * @var string
     */
    protected $sabadoNoCirculaHolograma1Color;
    /**
     * @var string
     */
    protected $sabadoNoCirculaHolograma2;
    /**
     * @var string
     */
    protected $sabadoNoCirculaHolograma2Color;

    /**
     * @return string
     */
    public function getIndiceImeca()
    {
        return $this->indiceImeca;
    }

    /**
     * @param string $indiceImeca
     */
    public function setIndiceImeca( $indiceImeca)
    {
        $this->indiceImeca = $indiceImeca;
    }
}
