<?php

namespace Vgplay\RewardStore\Exceptions;

use Exception;

class GiftcodeLimitExceededException extends Exception
{
    public function __construct($message = 'Giftcode đã hết, vui lòng quay lại sau')
    {
        parent::__construct($message);
    }
}
