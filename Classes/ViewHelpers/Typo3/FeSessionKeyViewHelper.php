<?php
namespace Dagou\DagouFluid\ViewHelpers\Typo3;

use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper;

class FeSessionKeyViewHelper extends AbstractViewHelper {
    /**
     * @return string
     */
    public function render(): string {
        return $GLOBALS['TSFE']->fe_user->getSessionId().'-'.md5($GLOBALS['TSFE']->fe_user->getSessionId().'/'.$GLOBALS['TYPO3_CONF_VARS']['SYS']['encryptionKey']);
    }
}