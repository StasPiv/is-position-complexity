<?php

namespace StanislavPivovartsev\InterestingStatistics\PositionComplexity;

use Board0x88Config;
use FenParser0x88;
use StanislavPivovartsev\InterestingStatistics\PositionComplexity\Contract\CurrentMovesExtractorInterface;

class ChecksMetric extends AbstractFenMetric
{
    public function __construct(
        FenParser0x88                                   $fenParser,
        private readonly CurrentMovesExtractorInterface $currentMovesExtractor,
    )
    {
        parent::__construct($fenParser);
    }

    protected function getScoreFromFenParser(): int
    {
        $color = $this->fenParser->getColor();
        $oppositeColor = Board0x88Config::$oppositeColors[$color];
        $originalFen = $this->fenParser->getFen();

        $kingSquare = $this->fenParser->getKing($oppositeColor)['s'];
        $checks = [];

        foreach ($this->currentMovesExtractor->getCurrentMoves($this->fenParser) as $currentMove) {
            $this->fenParser->makeMove($currentMove);

            $movesAfterMove = $this->fenParser->getValidMovesAndResult($color);

            $allAttackedSquaresAfterMove = [];
            foreach ($movesAfterMove['moves'] as $tosAfterMove) {
                $allAttackedSquaresAfterMove = array_merge($allAttackedSquaresAfterMove, $tosAfterMove);
            }

            $isCheck = in_array($kingSquare, $allAttackedSquaresAfterMove);

            if ($isCheck) {
                $checks[] = $currentMove;
            }

            $this->fenParser->setFen($originalFen);
        }

        return count($checks);
    }
}