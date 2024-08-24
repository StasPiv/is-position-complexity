<?php

namespace StanislavPivovartsev\InterestingStatistics\PositionComplexity;

use FenParser0x88;

abstract class AbstractFenMetric implements Contract\MetricInterface
{
    public function __construct(
        protected readonly FenParser0x88 $fenParser,
    )
    {
    }

    public function getName(): string
    {
        $fullyQualifiedClassName = get_class($this);
        $withoutNamespace = str_replace(__NAMESPACE__ . '\\', '', $fullyQualifiedClassName);
        $withoutSuffix = str_replace('Metric', '', $withoutNamespace);
        $lcName = lcfirst($withoutSuffix);

        return $lcName;
    }

    public function getScore(string $fen): int
    {
        $this->fenParser->setFen($fen);

        return $this->getScoreFromFenParser();
    }

    abstract protected function getScoreFromFenParser(): int;
}