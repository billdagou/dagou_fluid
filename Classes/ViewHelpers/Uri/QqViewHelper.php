<?php
namespace Dagou\DagouFluid\ViewHelpers\Uri;

use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper;

class QqViewHelper extends AbstractViewHelper {
    public function initializeArguments() {
        $this->registerArgument('qq', 'string', 'The QQ number to be turned into a URI', TRUE);
    }

    /**
     * @return string
     */
    public function render(): string {
        return 'tencent://message/?uin='.$this->arguments['qq'];
    }
}