<?php

namespace StanislavPivovartsev\InterestingStatistics\PositionComplexity\Contract;

interface MetricInterface
{
    public function getName(): string;

    public function getScore(string $fen): int;
}