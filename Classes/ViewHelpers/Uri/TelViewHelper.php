<?php
namespace Dagou\DagouFluid\ViewHelpers\Uri;

use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper;

class TelViewHelper extends AbstractViewHelper {
    public function initializeArguments() {
        $this->registerArgument('tel', 'string', 'Phone number.', TRUE);
    }

    /**
     * @return string
     */
    public function render() {
        return 'tel:'.$this->arguments['tel'];
    }
}