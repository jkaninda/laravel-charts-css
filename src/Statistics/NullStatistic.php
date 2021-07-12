<?php

namespace Maartenpaauw\Chartscss\Statistics;

class NullStatistic implements StatisticContract
{
    public function label(): string
    {
        return '';
    }

    public function result(): int
    {
        return 0;
    }
}
