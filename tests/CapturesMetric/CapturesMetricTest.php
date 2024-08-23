<?php

namespace StanislavPivovartsev\InterestingStatistics\PositionComplexity\Tests\CapturesMetric;

use PHPUnit\Framework\TestCase;
use StanislavPivovartsev\InterestingStatistics\PositionComplexity\CapturesMetric;

class CapturesMetricTest extends TestCase
{
    /**
     * @dataProvider \StanislavPivovartsev\InterestingStatistics\PositionComplexity\Tests\CapturesMetric\CapturesMetricDataProvider::provideDataForGetScore
     */
    public function testGetScore(string $fen, int $expectedResult): void
    {
        // arrange
        $metric = new CapturesMetric(new \FenParser0x88());

        // act
        $actualResult = $metric->getScore($fen);

        // assert
        self::assertSame($expectedResult, $actualResult);
    }
}