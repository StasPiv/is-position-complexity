<?php

namespace StanislavPivovartsev\InterestingStatistics\PositionComplexity;

class PiecesMetric extends AbstractFenMetric
{
    protected function getScoreFromFenParser(): int
    {
        $piecesWhite = $this->fenParser->getPiecesOfAColor('white');
        $piecesBlack = $this->fenParser->getPiecesOfAColor('black');

        return count($piecesWhite) + count($piecesBlack);
    }
}