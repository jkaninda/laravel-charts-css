<?php

namespace Maartenpaauw\Chartscss\Statistics;

interface StatisticContract
{
    public function label(): string;

    public function result();
}
