<?php
namespace Dagou\DagouFluid\ViewHelpers\Uri;

use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper;

class TelViewHelper extends AbstractViewHelper {
    public function initializeArguments() {
        $this->registerArgument('tel', 'string', 'The phone number to be turned into a URI', TRUE);
    }

    /**
     * @return string
     */
    public function render() {
        return 'tel:'.$this->arguments['tel'];
    }
}