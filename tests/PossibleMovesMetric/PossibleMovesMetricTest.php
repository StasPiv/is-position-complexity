<?php

namespace StanislavPivovartsev\InterestingStatistics\PositionComplexity\Tests\PossibleMovesMetric;

use PHPUnit\Framework\TestCase;
use StanislavPivovartsev\InterestingStatistics\PositionComplexity\CurrentMovesExtractor;
use StanislavPivovartsev\InterestingStatistics\PositionComplexity\PossibleMovesMetric;

class PossibleMovesMetricTest extends TestCase
{
    /**
     * @dataProvider \StanislavPivovartsev\InterestingStatistics\PositionComplexity\Tests\PossibleMovesMetric\PossibleMovesMetricDataProvider::provideDataForGetScore
     */
    public function testGetScore(string $fen, int $expectedResult): void
    {
        // arrange
        $metric = new PossibleMovesMetric(new \FenParser0x88(), new CurrentMovesExtractor());

        // act
        $actualResult = $metric->getScore($fen);

        // assert
        self::assertSame($expectedResult, $actualResult);
    }

    public function testGetName(): void
    {
        // arrange
        $metric = new PossibleMovesMetric(new \FenParser0x88(), new CurrentMovesExtractor());

        // act
        $actualResult = $metric->getName();

        // assert
        self::assertSame('possibleMoves', $actualResult);
    }
}