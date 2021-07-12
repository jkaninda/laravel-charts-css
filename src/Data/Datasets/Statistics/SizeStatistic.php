<?php

namespace Maartenpaauw\Chartscss\Data\Datasets\Statistics;

use Maartenpaauw\Chartscss\Data\Datasets\DatasetsContract;
use Maartenpaauw\Chartscss\Statistics\StatisticContract;

class SizeStatistic implements StatisticContract
{
    private DatasetsContract $datasets;

    public function __construct(DatasetsContract $datasets)
    {
        $this->datasets = $datasets;
    }

    public function label(): string
    {
        return 'size';
    }

    public function result(): int
    {
        return count($this->datasets->toArray());
    }
}
