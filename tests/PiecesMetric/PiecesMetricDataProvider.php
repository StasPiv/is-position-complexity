<?php

namespace StanislavPivovartsev\InterestingStatistics\PositionComplexity\Tests\PiecesMetric;

class PiecesMetricDataProvider
{
    public static function provideDataForGetScore(): \Iterator
    {
        yield '24 pieces' => [
            'fen' => 'rnkq1b1R/p1pppp2/8/1b5Q/4P3/1N6/PPPP1P1P/2B1KB2 w KQkq - 1 1',
            'expectedResult' => 24,
        ];

        yield '32 pieces' => [
            'fen' => 'rnbqkbnr/pppppppp/8/8/8/8/PPPPPPPP/RNBQKBNR w KQkq - 0 1',
            'expectedResult' => 32,
        ];

        yield '4 pieces' => [
            'fen' => '8/1r6/8/3K4/5k2/R7/8/8 w - - 0 1',
            'expectedResult' => 4,
        ];
    }
}