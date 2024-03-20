<?php

namespace Sprint\Migration;


class M20240320174615_add_chapter_IB_products extends Version
{
    protected $description = "Создание разделов ИБ категории продукции";

    protected $moduleVersion = "4.6.1";

    /**
     * @throws Exceptions\HelperException
     * @return bool|void
     */
    public function up()
    {
        $helper = $this->getHelperManager();

        $iblockId = $helper->Iblock()->getIblockIdIfExists(
            'category_products',
            'products'
        );

        $helper->Iblock()->addSectionsFromTree(
            $iblockId,
            array (
  0 => 
  array (
    'NAME' => 'Бытовая техника',
    'CODE' => 'appliances',
    'SORT' => '500',
    'ACTIVE' => 'Y',
    'XML_ID' => NULL,
    'DESCRIPTION' => '',
    'DESCRIPTION_TYPE' => 'text',
  ),
  1 => 
  array (
    'NAME' => 'Автотовары',
    'CODE' => 'auto_products',
    'SORT' => '500',
    'ACTIVE' => 'Y',
    'XML_ID' => NULL,
    'DESCRIPTION' => '',
    'DESCRIPTION_TYPE' => 'text',
  ),
)        );
    }

    public function down()
    {
        $helper = $this->getHelperManager();

        $iblockId = $helper->Iblock()->getIblockIdIfExists(
            'category_products',
            'products'
        );

        foreach ($helper->Iblock()->getSections($iblockId) as $category) {
            $helper->Iblock()->deleteSectionIfExists($iblockId, $category['CODE']);
        }
    }
}
