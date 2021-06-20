<?php

namespace Maartenpaauw\Chart;

use Maartenpaauw\Chart\Data\Axes\Axes;
use Maartenpaauw\Chart\Data\Datasets\Dataset;
use Maartenpaauw\Chart\Data\Datasets\Datasets;
use Maartenpaauw\Chart\Data\Datasets\DatasetsContract;
use Maartenpaauw\Chart\Data\Entries\Entry;
use Maartenpaauw\Chart\Data\Entries\Value\Value;
use Maartenpaauw\Chart\Data\Label\Label;

class DummyChart extends Chart
{
    protected function id(): string
    {
        return 'dummy-chart';
    }

    protected function heading(): string
    {
        return 'Dummy';
    }

    protected function datasets(): DatasetsContract
    {
        return new Datasets(
            new Axes('Country', ['Gold', 'Silver', 'Bronze']),
            [
                new Dataset([
                    new Entry(new Value(46)),
                    new Entry(new Value(37)),
                    new Entry(new Value(38)),
                ], new Label('USA')),
                new Dataset([
                    new Entry(new Value(27)),
                    new Entry(new Value(23)),
                    new Entry(new Value(17)),
                ], new Label('GBR')),
                new Dataset([
                    new Entry(new Value(26)),
                    new Entry(new Value(18)),
                    new Entry(new Value(26)),
                ], new Label('CHN')),
            ]
        );
    }
}
