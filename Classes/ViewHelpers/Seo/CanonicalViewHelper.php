<?php
namespace Dagou\DagouFluid\ViewHelpers\Seo;

use TYPO3\CMS\Seo\Canonical\CanonicalGenerator;
use TYPO3\CMS\Seo\Event\ModifyUrlForCanonicalTagEvent;
use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper;

class CanonicalViewHelper extends AbstractViewHelper {
    /**
     * @return string
     */
    public function render(): string {
        return $this->getCanonicalGenerator()
            ->generate();
    }

    /**
     * @return \TYPO3\CMS\Seo\Canonical\CanonicalGenerator
     */
    protected function getCanonicalGenerator(): CanonicalGenerator {
        return new class() extends CanonicalGenerator {
            /**
             * @return string
             */
            public function generate(): string {
                $event = $this->eventDispatcher->dispatch(new ModifyUrlForCanonicalTagEvent(''));
                $href = $event->getUrl();

                if (empty($href) && (int)$this->typoScriptFrontendController->page['no_index'] === 1) {
                    return '';
                }

                if (empty($href)) {
                    $href = $this->checkContentFromPid();
                }
                if (empty($href)) {
                    $href = $this->checkForCanonicalLink();
                }
                if (empty($href)) {
                    $href = $this->checkDefaultCanonical();
                }

                return $href;
            }
        };
    }
}