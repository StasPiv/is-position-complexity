<?php

namespace StanislavPivovartsev\InterestingStatistics\PositionComplexity;

use FenParser0x88;
use StanislavPivovartsev\InterestingStatistics\PositionComplexity\Contract\CurrentMovesExtractorInterface;

class CurrentMovesExtractor implements CurrentMovesExtractorInterface
{
    public function getCurrentMoves(FenParser0x88 $fenParser): array
    {
        $color = $fenParser->getColor();

        $moves = $fenParser->getValidMovesBoardCoordinates($color);

        $currentMoves = [];
        foreach ($moves as $from => $possibleTos) {
            $currentMoves = array_merge(
                $currentMoves,
                array_map(
                    fn(string $possibleTo): array => ['from' => $from, 'to' => $possibleTo],
                    $possibleTos,
                ),
            );

            $piece = $fenParser->getPieceOnSquareBoardCoordinate($from);

            if ($piece['type'] === 'pawn') {
                if ($color === 'black') {
                    foreach ($possibleTos as $possibleTo) {
                        if (in_array($possibleTo, ['a1', 'b1', 'c1', 'd1', 'e1', 'f1', 'g1', 'h1'])) {
                            foreach (['n', 'b', 'r', 'q'] as $promoteTo) {
                                $currentMoves[] = [
                                    'from' => $from,
                                    'to' => $possibleTo,
                                    'promoteTo' => $promoteTo,
                                ];
                            }
                        }
                    }
                }
                if ($color === 'white') {
                    foreach ($possibleTos as $possibleTo) {
                        if (in_array($possibleTo, ['a8', 'b8', 'c8', 'd8', 'e8', 'f8', 'g8', 'h8'])) {
                            foreach (['n', 'b', 'r', 'q'] as $promoteTo) {
                                $currentMoves[] = [
                                    'from' => $from,
                                    'to' => $possibleTo,
                                    'promoteTo' => $promoteTo,
                                ];
                            }
                        }
                    }
                }
            }
        }

        return $currentMoves;
    }
}