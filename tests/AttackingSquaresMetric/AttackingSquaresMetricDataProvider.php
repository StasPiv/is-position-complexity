<?php

namespace StanislavPivovartsev\InterestingStatistics\PositionComplexity\Tests\AttackingSquaresMetric;

class AttackingSquaresMetricDataProvider
{
    public static function provideDataForGetScore(): \Iterator
    {
        yield 'four captures here' => [
            'fen' => 'rn1qkb2/p1pppp2/8/1b6/P3P3/1RN5/1PPP1P1P/2BQKBR1 w KQkq - 0 1',
            'expectedResult' => 57,
        ];

        yield 'three captures here' => [
            'fen' => 'rn1qkb2/p1pppp2/8/1b6/P3P3/2N5/1PPP1P1P/2BQKBR1 w KQkq - 0 1',
            'expectedResult' => 52,
        ];

        yield 'two captures' => [
            'fen' => 'rn1qkb2/p1pppp2/8/1b6/4P3/2N5/PPPP1P1P/2BQKBR1 w KQkq - 0 1',
            'expectedResult' => 52,
        ];

        yield 'one capture' => [
            'fen' => 'rn1qkb2/p1pppp2/8/1b6/4P3/2N5/PPPP1P1P/2BQKBR1 b KQkq - 0 1',
            'expectedResult' => 38,
        ];
    }
}