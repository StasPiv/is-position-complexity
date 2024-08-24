<?php

namespace StanislavPivovartsev\InterestingStatistics\PositionComplexity\Tests\AttackingSquaresMetric;

use PHPUnit\Framework\TestCase;
use StanislavPivovartsev\InterestingStatistics\PositionComplexity\AttackingSquaresMetric;

class AttackingSquaresMetricTest extends TestCase
{
    /**
     * @dataProvider \StanislavPivovartsev\InterestingStatistics\PositionComplexity\Tests\AttackingSquaresMetric\AttackingSquaresMetricDataProvider::provideDataForGetScore
     */
    public function testGetScore(string $fen, int $expectedResult): void
    {
        // arrange
        $metric = new AttackingSquaresMetric(new \FenParser0x88());

        // act
        $actualResult = $metric->getScore($fen);

        // assert
        self::assertSame($expectedResult, $actualResult);
    }

    public function testGetName(): void
    {
        // arrange
        $metric = new AttackingSquaresMetric(new \FenParser0x88());

        // act
        $actualResult = $metric->getName();

        // assert
        self::assertSame('attackingSquares', $actualResult);
    }
}