<?php

namespace StanislavPivovartsev\InterestingStatistics\PositionComplexity;

use StanislavPivovartsev\InterestingStatistics\PositionComplexity\Contract\CurrentMovesExtractorInterface;

class PossibleMovesMetric extends AbstractFenMetric
{
    public function __construct(
        \FenParser0x88                                  $fenParser,
        private readonly CurrentMovesExtractorInterface $currentMovesExtractor,
    )
    {
        parent::__construct($fenParser);
    }

    protected function getScoreFromFenParser(): int
    {
        return count($this->currentMovesExtractor->getCurrentMoves($this->fenParser));
    }
}