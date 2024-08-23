<?php

namespace StanislavPivovartsev\InterestingStatistics\PositionComplexity\Tests\PiecesMetric;

use PHPUnit\Framework\TestCase;
use StanislavPivovartsev\InterestingStatistics\PositionComplexity\PiecesMetric;

class PiecesMetricTest extends TestCase
{
    /**
     * @dataProvider \StanislavPivovartsev\InterestingStatistics\PositionComplexity\Tests\PiecesMetric\PiecesMetricDataProvider::provideDataForGetScore
     */
    public function testGetScore(string $fen, int $expectedResult): void
    {
        // arrange
        $metric = new PiecesMetric(new \FenParser0x88());

        // act
        $actualResult = $metric->getScore($fen);

        // assert
        self::assertSame($expectedResult, $actualResult);
    }
}