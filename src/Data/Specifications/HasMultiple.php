<?php

namespace Maartenpaauw\Chartscss\Data\Specifications;

use Maartenpaauw\Chartscss\Data\Datasets\DatasetsContract;
use Maartenpaauw\Chartscss\Data\Datasets\Statistics\SizeStatistic;

class HasMultiple implements DatasetsSpecification
{
    public function isSatisfiedBy(DatasetsContract $datasets): bool
    {
        return (new SizeStatistic($datasets))->result() > 1;
    }
}
