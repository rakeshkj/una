<?php defined('BX_DOL') or die('hack attempt');
/**
 * Copyright (c) UNA, Inc - https://una.io
 * MIT License - https://opensource.org/licenses/MIT
 *
 * @defgroup    UnaStudio UNA Studio
 * @{
 */

class BxDolStudioPolyglotEtemplates extends BxTemplStudioGrid
{
    public function __construct ($aOptions, $oTemplate = false)
    {
        parent::__construct ($aOptions, $oTemplate);

        $this->oDb = new BxDolStudioPolyglotQuery();
    }

    protected function _getDataSql($sFilter, $sOrderField, $sOrderDir, $iStart, $iPerPage)
    {
        $sModule = '';
        if(strpos($sFilter, $this->sParamsDivider) !== false)
            list($sModule, $sFilter) = explode($this->sParamsDivider, $sFilter);

        if($sModule != '')
            $this->_aOptions['source'] .= $this->oDb->prepareAsString(" AND `Module`=?", $sModule);

        return parent::_getDataSql($sFilter, $sOrderField, $sOrderDir, $iStart, $iPerPage);
    }
}

/** @} */
