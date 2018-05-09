<?php
namespace Dagou\DagouFluid\ViewHelpers\Content;

use TYPO3\CMS\Core\TypoScript\Parser\TypoScriptParser;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Frontend\Configuration\TypoScript\ConditionMatching\ConditionMatcher;
use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper;

class TypoScriptViewHelper extends AbstractViewHelper {
    public function initializeArguments() {
        $this->registerArgument('object', 'string', 'TypoScript object.');
        $this->registerArgument('cache', 'boolean', 'Enable cache or not.', FALSE, TRUE);
    }

    /**
     * @return string
     */
    public function render() {
        $typoScriptParser = GeneralUtility::makeInstance(TypoScriptParser::class);
        $conditionMatcher = GeneralUtility::makeInstance(ConditionMatcher::class);

        $typoScriptParser->parse($this->arguments['object'] ?? $this->renderChildren(), $conditionMatcher);

        return $GLOBALS['TSFE']->cObj->cObjGetSingle(
            $this->arguments['cache'] ? 'COA' : 'COA_INT',
            $typoScriptParser->setup
        );
    }
}