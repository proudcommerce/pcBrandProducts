<?php
/**
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * @package pcBrandProducts
 * @copyright ProudCommerce
 * @link www.proudcommerce.com
 **/

namespace ProudCommerce\BrandProducts\Application\Model;

use OxidEsales\Eshop\Core\Registry;

/**
 * Class Article
 * @package ProudCommerce\BrandProducts\Application\Model
 */
class Article extends Article_parent
{
    /**
     * @return object|\OxidEsales\Eshop\Application\Model\ArticleList
     */
    public function getPcBrandProducts()
    {
        if (!empty($this->oxarticles__oxmanufacturerid->value)) {
            $oBrandslist = oxNew(\OxidEsales\Eshop\Application\Model\ArticleList::class);
            $oBrandslist->setSqlLimit(0, Registry::getConfig()->getConfigParam('iNrofSimilarArticles'));
            $sSearch = $this->_generatePcBrandProductsSearchStr();
            $oBrandslist->selectString($sSearch);

            return $oBrandslist;
        }
    }

    /**
     * @return string
     */
    protected function _generatePcBrandProductsSearchStr()
    {
        $sArticleTable = $this->getViewName();
        $sFieldList = $this->getSelectFields();
        $sSearch = "select $sFieldList from $sArticleTable where " . $this->getSqlActiveSnippet() . "  and $sArticleTable.oxissearch = 1 and $sArticleTable.oxmanufacturerid = '" . $this->oxarticles__oxmanufacturerid->value . "' and $sArticleTable.oxid != '" . $this->oxarticles__oxid->value . "'";
        $sSearch .= " and $sArticleTable.oxparentid = '' ";
        $sSearch .= ' order by rand() ';

        return $sSearch;
    }

}
