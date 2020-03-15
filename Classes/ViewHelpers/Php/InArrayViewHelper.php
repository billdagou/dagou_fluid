<?php
namespace Dagou\DagouFluid\ViewHelpers\Php;

use TYPO3\CMS\Extbase\DomainObject\DomainObjectInterface;
use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper;

class InArrayViewHelper extends AbstractViewHelper {
    public function initializeArguments() {
        $this->registerArgument('array', \Iterator::class, 'Array list.', TRUE);
        $this->registerArgument('strict', 'bool', 'Strict mode', FALSE, FALSE);
    }

    /**
     * @return bool
     */
    public function render(): bool {
        $value = $this->renderChildren();

        if ($value instanceof DomainObjectInterface) {
            /** @var DomainObjectInterface $domainObject */
            foreach ($this->arguments['array'] as $domainObject) {
                if ($value->getUid() === $domainObject->getUid()) {
                    return TRUE;
                }
            }

            return FALSE;
        } else {
            return in_array($value, $this->arguments['array'], $this->arguments['strict']);
        }
    }
}