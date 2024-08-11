<?php

namespace App\Enums;

enum PerPageOptions: int
{
    case ONE = 1;
    case TWO = 2;
    case THREE = 3;
    case FOUR = 4;
    case FIVE = 5;
    case TEN = 10;
    case FIFTEEN = 15;
    case TWENTY = 20;
    case TWENTY_FIVE = 25;
    case FIFTY = 50;
    case ONE_HUNDRED = 100;
    case TWO_HUNDRED = 200;
    case FIVE_HUNDRED = 500;
}
