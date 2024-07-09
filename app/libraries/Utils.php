<?php

class Utils
{
    public static function convertEnglishToChineseForSpecificationColumns(int $categoryId): array|null
    {
        $columns = [
            1 => ['最大吊重(t)', '最大吊高(m)', '最大吊重半徑(m)', '作業水深(m)', '其它設備'],
            2 => ['支撐腳長(m)', '最大吊重(t)', '最大吊高(m)', '最大吊重半徑(m)', '作業水深', '其它設備'],
            3 => ['盤纜槽裝載量(t)', '作業水深(m)', '其它設備'],
            4 => ['工作速度(t/Hr)', '作業水深(m)', '其它設備'],
            5 => ['工作速度(t/Hr)', '作業水深(m)', '其它設備'],
            6 => ['繫纜拖力(t)', '其它設備'],
            7 => ['繫纜拖力(t)', '其它設備'],
            8 => ['其它設備'],
            9 => ['動態補償舷梯', '床位數', '其它設備'],
            14 => ['床位數', '其它設備'],
            15 => ['床位數', '其它設備'],
        ];
        return $columns[$categoryId];
    }
}