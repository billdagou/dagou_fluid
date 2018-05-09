<?php
namespace Dagou\DagouFluid\ViewHelpers\Content;

use TYPO3\CMS\Core\TypoScript\Parser\TypoScriptParser;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Configuration\ConfigurationManagerInterface;
use TYPO3\CMS\Frontend\Configuration\TypoScript\ConditionMatching\ConditionMatcher;
use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper;

class TypoScriptViewHelper extends AbstractViewHelper {
    /**
     * @var bool
     */
    protected $escapeOutput = FALSE;
    /**
     * @var \TYPO3\CMS\Extbase\Configuration\ConfigurationManagerInterface
     */
    protected $configurationManager;

    /**
     * @param \TYPO3\CMS\Extbase\Configuration\ConfigurationManagerInterface $configurationManager
     */
    public function injectConfigurationManager(ConfigurationManagerInterface $configurationManager) {
        $this->configurationManager = $configurationManager;
    }

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
                $cObject = '';
                $typoScript = $this->configurationManager->getConfiguration(
                    ConfigurationManagerInterface::CONFIGURATION_TYPE_FULL_TYPOSCRIPT
                );

                foreach ($pathSegments as $segment) {
                    if (!array_key_exists(($segment.'.'), $typoScript)) {
                        return;
                    }

                    $cObject = $typoScript[$segment];
                    $typoScript = $typoScript[$segment.'.'];
                }
            }
        } else {
            $typoScriptParser = GeneralUtility::makeInstance(TypoScriptParser::class);

            $typoScriptParser->parse($this->renderChildren(), GeneralUtility::makeInstance(ConditionMatcher::class));

            $cObject = $this->arguments['cache'] ? 'COA' : 'COA_INT';
            $typoScript = $typoScriptParser->setup;
        }
        print_r($cObject);
        print_r($typoScript);

        return $GLOBALS['TSFE']->cObj->cObjGetSingle($cObject, $typoScript);
    }
}