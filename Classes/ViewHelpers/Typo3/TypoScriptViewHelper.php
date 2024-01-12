<?php
namespace Dagou\DagouFluid\ViewHelpers\Typo3;

use TYPO3\CMS\Core\TypoScript\Parser\TypoScriptParser;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Frontend\Configuration\TypoScript\ConditionMatching\ConditionMatcher;
use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper;

class TypoScriptViewHelper extends AbstractViewHelper {
    /**
     * @var bool
     */
    protected $escapeOutput = FALSE;

    public function initializeArguments(): void {
        $this->registerArgument('cache', 'boolean', 'Enable cache or not.', FALSE, TRUE);
    }

    /**
     * @return string
     */
    public function render(): string {
        $typoScriptParser = GeneralUtility::makeInstance(TypoScriptParser::class);

        $typoScriptParser->parse($this->renderChildren(), GeneralUtility::makeInstance(ConditionMatcher::class));

        return $GLOBALS['TSFE']->cObj->cObjGetSingle(
            $this->arguments['cache'] ? 'COA' : 'COA_INT',
            $typoScriptParser->setup
        );
    }
}