<?php

namespace Maartenpaauw\Chartscss\Statistics;

class Statistics implements StatisticsContract
{
    /**
     * @var StatisticContract[]
     */
    private array $statistics;

    public function __construct(array $statistics = [])
    {
        $this->statistics = $statistics;
    }

    public function add(StatisticContract $statistic): self
    {
        return new self(
            array_merge(
                $this->statistics,
                [$statistic->label() => $statistic],
            ),
        );
    }

    public function get(string $label): StatisticContract
    {
        if (! array_key_exists($label, $this->statistics)) {
            return new NullStatistic();
        }

        return $this->statistics[$label];
    }
}
