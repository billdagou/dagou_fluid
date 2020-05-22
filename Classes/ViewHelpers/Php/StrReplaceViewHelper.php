<?php
namespace Dagou\DagouFluid\ViewHelpers\Php;

use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper;

class StrReplaceViewHelper extends AbstractViewHelper {
    public function initializeArguments() {
        $this->registerArgument('search', 'mixed', 'The value being searched for.', TRUE);
        $this->registerArgument('replace', 'mixed', 'The replacement value.', TRUE);
        $this->registerArgument('count', 'int', 'The number of replacements performed.');
        $this->registerArgument('caseInsensitive', 'boolean', 'Case insensitive.', FALSE, FALSE);
    }

    /**
     * @return string|array
     */
    public function render() {
        if ($this->arguments['caseInsensitive']) {
            return str_ireplace(
                $this->arguments['search'],
                $this->arguments['replace'],
                $this->renderChildren(),
                $this->arguments['count']
            );
        } else {
            return str_replace(
                $this->arguments['search'],
                $this->arguments['replace'],
                $this->renderChildren(),
                $this->arguments['count']
            );
        }
    }
}