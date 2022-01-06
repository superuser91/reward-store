<?php

namespace Vgplay\RewardStore\Exceptions;

use Exception;

class UnsupportOperatorException extends Exception
{
    public function __construct($message = 'Không hỗ trợ toán tử so sánh này.')
    {
        parent::__construct($message);
    }
}
