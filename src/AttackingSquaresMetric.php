<?php

namespace StanislavPivovartsev\InterestingStatistics\PositionComplexity;

class AttackingSquaresMetric extends AbstractFenMetric
{
    protected function getScoreFromFenParser(): int
    {
        $attackingSquares = explode(',', $this->fenParser->getCaptureAndProtectiveMoves($this->fenParser->getColor()));

        return count($attackingSquares);
    }
}