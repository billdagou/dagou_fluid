<?php
namespace Dagou\DagouFluid\ViewHelpers\Uri;

use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper;

class QqViewHelper extends AbstractViewHelper {
    public function initializeArguments() {
        $this->registerArgument('qq', 'string', 'QQ number.', TRUE);
    }

    /**
     * @return string
     */
    public function render() {
        return 'tencent://message/?uin='.$this->arguments['qq'];
    }
}