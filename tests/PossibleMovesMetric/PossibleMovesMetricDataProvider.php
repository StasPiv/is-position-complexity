<?php

namespace StanislavPivovartsev\InterestingStatistics\PositionComplexity\Tests\PossibleMovesMetric;

use Iterator;

class PossibleMovesMetricDataProvider
{
    public static function provideDataForGetScore(): Iterator
    {
        yield '20 white moves' => [
            'fen' => 'rnbqkbnr/pppppppp/8/8/8/8/PPPPPPPP/RNBQKBNR w KQkq - 0 1',
            'expectedResult' => 20,
        ];

        yield '20 black moves' => [
            'fen' => 'rnbqkbnr/pppppppp/8/8/4P3/8/PPPP1PPP/RNBQKBNR b KQkq e3 0 1',
            'expectedResult' => 20,
        ];

        yield '29 white moves' => [
            'fen' => 'rnbqkbnr/pppp1ppp/8/4p3/4P3/8/PPPP1PPP/RNBQKBNR w KQkq e6 0 1',
            'expectedResult' => 29,
        ];

        yield '0 white moves' => [
            'fen' => '8/8/8/8/8/1k6/8/1K1r4 w - - 0 1',
            'expectedResult' => 0,
        ];
    }
}