<?php

namespace StanislavPivovartsev\InterestingStatistics\PositionComplexity\Tests\ChecksMetric;

class ChecksMetricDataProvider
{
    public static function provideDataForGetScore(): \Iterator
    {
        yield 'one check' => [
            'fen' => 'rn1qkb2/p1pppp2/8/1b6/2N1P3/8/PPPP1P1P/2BQKBR1 w KQkq - 0 1',
            'expectedResult' => 1,
        ];

        yield 'two checks' => [
            'fen' => 'rn1qkb2/p1pppp2/8/1b5Q/2N1P3/8/PPPP1P1P/2B1KBR1 w KQkq - 1 1',
            'expectedResult' => 2,
        ];

        yield 'three checks' => [
            'fen' => 'rn1qkb1R/p1pppp2/8/1b5Q/2N1P3/8/PPPP1P1P/2B1KB2 w KQkq - 1 1',
            'expectedResult' => 3,
        ];

        yield 'two checks king on c8' => [
            'fen' => 'rnkq1b1R/p1pppp2/8/1b5Q/2N1P3/8/PPPP1P1P/2B1KB2 w KQkq - 1 1',
            'expectedResult' => 2,
        ];

        yield 'zero checks' => [
            'fen' => 'rnkq1b1R/p1pppp2/8/1b5Q/4P3/1N6/PPPP1P1P/2B1KB2 w KQkq - 1 1',
            'expectedResult' => 0,
        ];

        yield 'two checks with promotion' => [
            'fen' => '8/8/8/8/8/1k6/3p4/1K6 b - - 0 1',
            'expectedResult' => 2,
        ];

        yield 'one checks with promotion to knight' => [
            'fen' => '8/2k1P3/8/8/5K2/8/3p4/8 w - - 0 1',
            'expectedResult' => 1,
        ];
    }
}