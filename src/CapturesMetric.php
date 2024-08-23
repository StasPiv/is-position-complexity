<?php

namespace StanislavPivovartsev\InterestingStatistics\PositionComplexity;

class CapturesMetric extends AbstractFenMetric
{
    protected function getScoreFromFenParser(): int
    {
        $color = $this->fenParser->getColor();
        $oppositeColor = \Board0x88Config::$oppositeColors[$color];

        $attackingSquares = explode(',', $this->fenParser->getCaptureAndProtectiveMoves($color));

        $captures = [];

        foreach ($attackingSquares as $square) {
            $pieceOnSquare = $this->fenParser->getPieceOnSquare($square);

            if (!$pieceOnSquare || !isset($pieceOnSquare['type']) || !isset($pieceOnSquare['color'])) {
                continue;
            }

            if ($pieceOnSquare['color'] === $oppositeColor && $pieceOnSquare['type'] !== null) {
                $captures[] = $pieceOnSquare;
            }
        }

        return count($captures);
    }
}