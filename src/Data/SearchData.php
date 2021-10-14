<?php

namespace App\Data;

use App\Entity\Mode;
use App\Entity\Boy;
use App\Entity\Category;
use App\Entity\Maison;
use App\Entity\Size;
use App\Entity\Toys;

class SearchData
{

    /**
     * @var string
     */
    public $maison = '';

    /**
     * @var Maison[]
     */
    public $house = [];

    /**
     * @var string
     */
    public $garcon = '';

    /**
     * @var Boy[]
     */
    public $boys = [];

    /**
     * @var string
     */
    public $mode = '';

    /**
     * @var Mode[]
     */

    public $fashions = [];

    /**
     * @var string
     */
    public $jouet = '';

    /**
     * @var Toys[]
     */

    public $toys = [];

    /**
     * @var Category[]
     */
    public $categories = [];


    /**
     * @var null|integer
     */
    public $max;

    public $min;
    /**
     * @var string
     */

    public $taille ='';
    /**
     * @var Size[]
     */
    public $size = [];





}
