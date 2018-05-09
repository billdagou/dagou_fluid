<?php
namespace Dagou\DagouFluid\ViewHelpers\Content;

use TYPO3\CMS\Core\TypoScript\Parser\TypoScriptParser;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Configuration\ConfigurationManager;
use TYPO3\CMS\Extbase\Configuration\ConfigurationManagerInterface;
use TYPO3\CMS\Frontend\Configuration\TypoScript\ConditionMatching\ConditionMatcher;
use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper;

class TypoScriptViewHelper extends AbstractViewHelper {
    public function initializeArguments() {
        $this->registerArgument('objectPath', 'string', 'TypoScript object path.');
        $this->registerArgument('cache', 'boolean', 'Enable cache or not.', FALSE, TRUE);
    }

    /**
     * @return string
     */
    public function render() {
        if ($this->arguments['objectPath']) {
            $pathSegments = GeneralUtility::trimExplode('.', $this->arguments['objectPath']);

            if (count($pathSegments)) {
                $configurationManager = GeneralUtility::makeInstance(ConfigurationManager::class);

                $typoScript = $configurationManager->getConfiguration(
                    ConfigurationManagerInterface::CONFIGURATION_TYPE_FULL_TYPOSCRIPT
                );

                foreach ($pathSegments as $segment) {
                    if (!array_key_exists(($segment.'.'), $typoScript)) {
                        return;
                    }

                    $typoScript = $typoScript[$segment.'.'];
                }
            }
        } else {
            $typoScriptParser = GeneralUtility::makeInstance(TypoScriptParser::class);

            $typoScriptParser->parse($this->renderChildren(), GeneralUtility::makeInstance(ConditionMatcher::class));

            $typoScript = $typoScriptParser->setup;
        }

        return $GLOBALS['TSFE']->cObj->cObjGetSingle(
            $this->arguments['cache'] ? 'COA' : 'COA_INT',
            $typoScriptParser->setup
        );
    }
}