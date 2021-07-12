<?php

namespace Maartenpaauw\Chartscss\Statistics;

interface StatisticsContract
{
    public function add(StatisticContract $statistic): self;

    public function get(string $label): StatisticContract;
}
