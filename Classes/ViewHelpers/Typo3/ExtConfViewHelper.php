<?php
namespace Dagou\DagouFluid\ViewHelpers\Typo3;

use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper;

class ExtConfViewHelper extends AbstractViewHelper {
    public function initializeArguments() {
        $this->registerArgument('extKey', 'string', 'Extension key.', TRUE);
        $this->registerArgument('path', 'string', 'Configuration path.', FALSE, '');
    }

    /**
     * @return mixed
     */
    public function render() {
        $extConf = $GLOBALS['TYPO3_CONF_VARS']['EXTCONF'][$this->arguments['extKey']];

        if ($this->arguments['path']) {
            $subparts = explode('.', $this->arguments['path']);

            foreach ($subparts as $subpart) {
                $extConf = $extConf[$subpart];
            }
        }

        return $extConf;
    }
}