<?php

namespace StanislavPivovartsev\InterestingStatistics\PositionComplexity\Contract;

interface MetricInterface
{
    public function getScore(string $fen): int;
}