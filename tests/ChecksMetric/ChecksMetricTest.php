<?php

namespace StanislavPivovartsev\InterestingStatistics\PositionComplexity\Tests\ChecksMetric;

use PHPUnit\Framework\TestCase;
use StanislavPivovartsev\InterestingStatistics\PositionComplexity\ChecksMetric;
use StanislavPivovartsev\InterestingStatistics\PositionComplexity\CurrentMovesExtractor;

class ChecksMetricTest extends TestCase
{
    /**
     * @dataProvider \StanislavPivovartsev\InterestingStatistics\PositionComplexity\Tests\ChecksMetric\ChecksMetricDataProvider::provideDataForGetScore
     */
    public function testGetScore(string $fen, int $expectedResult): void
    {
        // arrange
        $metric = new ChecksMetric(new \FenParser0x88(), new CurrentMovesExtractor());

        // act
        $actualResult = $metric->getScore($fen);

        // assert
        self::assertSame($expectedResult, $actualResult);
    }
}