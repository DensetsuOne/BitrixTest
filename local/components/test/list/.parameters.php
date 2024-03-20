<?php
/**@global CMain $APPLICATION */
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED!==true) die();

global $APPLICATION;

$arComponentParameters["PARAMETERS"] = array(
    "IBLOCK_CODE" => array(
        "PARENT" => "DATA_SOURCE",
        "NAME" => "Код ИБ",
        "TYPE" => "STRING",
        "DEFAULT" => 'category_products',
        'REFRESH' => "N",
    ),
    "CACHE_TIME" => array(
        "DEFAULT" => 3600,
    ),
);