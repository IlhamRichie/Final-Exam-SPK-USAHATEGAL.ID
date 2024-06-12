<?php

namespace App;

class SAW
{
    public $atribut;
    public $bobot;
    public $rel_alternatif;

    public $bobot_normal;
    public $minmax;
    public $normal;
    public $terbobot;
    public $total;
    public $rank;

    function __construct($rel_alternatif, $atribut, $bobot)
    {
        $this->rel_alternatif = $rel_alternatif;
        $this->atribut = $atribut;
        $this->bobot = $bobot;

        $this->get_bobot_normal();
        $this->get_normal();
        $this->terbobot();
        $this->total();
        $this->get_rank();
    }

    function get_rank()
    {
        $arr = $this->total;
        arsort($arr);
        $no = 1;
        foreach ($arr as $key => $val) {
            $this->rank[$key] = $no++;
        }
    }

    function total()
    {
        foreach ($this->terbobot as $key => $val) {
            $this->total[$key] = array_sum($val);
        }
    }
    function terbobot()
    {
        foreach ($this->normal as $key => $val) {
            foreach ($val as $k => $v) {
                $this->terbobot[$key][$k] = $v * $this->bobot_normal[$k];
            }
        }
    }

    function get_normal()
    {
        $arr = array();
        foreach ($this->rel_alternatif as $key => $val) {
            foreach ($val as $k => $v) {
                $arr[$k][$key] = $v;
            }
        }
        foreach ($arr as $key => $val) {
            $this->minmax[$key]['min'] = min($val);
            $this->minmax[$key]['max'] = max($val);
        }

        foreach ($this->rel_alternatif as $key => $val) {
            foreach ($val as $k => $v) {
                $this->normal[$key][$k] = $this->atribut[$k] == 'benefit' ? $v / $this->minmax[$k]['max'] :  $this->minmax[$k]['min'] / $v;
            }
        }
    }

    function get_bobot_normal()
    {
        foreach ($this->bobot as $key => $val) {
            $this->bobot_normal[$key] = $val / array_sum($this->bobot);
        }
    }
}
