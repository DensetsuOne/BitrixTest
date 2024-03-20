<?php
/**@global CMain $APPLICATION */

use Bitrix\Main\Loader;

if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED!==true) die();

class TestList extends CBitrixComponent
{
    public function onPrepareComponentParams($arParams): array
    {
        return $arParams;
    }

    public function executeComponent(): void
    {
        $arParams = &$this->arParams;
        $arResult = &$this->arResult;
        $arResult = [
            "ITEMS" => [],
        ];
        Loader::includeModule('iblock');
        if ($this->StartResultCache()) {
            $dbItems = CIBlockElement::GetList(
                [],
                [
                    'IBLOCK_CODE' => $arParams['IBLOCK_CODE'],
                ],
                false,
                false,
                [
                    'IBLOCK_ID',
                    'ID',
                    'NAME',
                ]
            );

            $arResult = [];
            while ($arItem = $dbItems->Fetch()) {
                $arResult['ITEMS'][] = $arItem;
            }

            $this->includeComponentTemplate();
        } else {
            $this->abortResultCache();
        }
    }
}