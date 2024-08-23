<?php

namespace StanislavPivovartsev\InterestingStatistics\PositionComplexity\Contract;

use FenParser0x88;

interface CurrentMovesExtractorInterface
{
    public function getCurrentMoves(FenParser0x88 $fenParser): array;
}