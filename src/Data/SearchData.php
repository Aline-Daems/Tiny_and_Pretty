<?php

namespace App\Data;

use App\Entity\baby;
use App\Entity\Kids;
use App\Entity\Category;
use App\Entity\House;
use App\Entity\Size;
use App\Entity\Toys;

class SearchData
{

    /**
     * @var string
     */
    public $maison = '';

    /**
     * @var House[]
     */
    public $house = [];

    /**
     * @var string
     */
    public $enfant = '';

    /**
     * @var Kids[]
     */
    public $Kids = [];

    /**
     * @var string
     */
    public $baby = '';

    /**
     * @var baby[]
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







}
