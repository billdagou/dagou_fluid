<?php
namespace Dagou\DagouFluid\ViewHelpers\Form;

use TYPO3\CMS\Extbase\Annotation\Inject;
use TYPO3\CMS\Extbase\Domain\Model\FileReference;

class UploadViewHelper extends \TYPO3\CMS\Fluid\ViewHelpers\Form\UploadViewHelper {
    /**
     * @var \TYPO3\CMS\Extbase\Security\Cryptography\HashService
     * @Inject
     */
    protected $hashService;
    /**
     * @var \TYPO3\CMS\Extbase\Property\PropertyMapper
     * @Inject
     */
    protected $propertyMapper;

    /**
     * @return string
     */
    public function render(): string {
        $content = '';

        if (($fileReference = $this->getFileReference()) !== NULL) {
            $name = $this->getName();

            if ($fileReference->getUid() === NULL) {
                $content .= '<input type="hidden" name="'.$name.'[__resource]" value="'.htmlspecialchars($this->hashService->appendHmac((string)$fileReference->getOriginalResource()->getOriginalFile()->getUid())).'" />';
            } else {
                $content .= '<input type="hidden" name="'.$name.'[__identity]" value="'.htmlspecialchars($this->hashService->appendHmac((string)$fileReference->getUid())).'" />';
            }

            $this->templateVariableContainer->add('resource', $fileReference);

            $content .= $this->renderChildren();

            $this->templateVariableContainer->remove('resource');
        }

        return $content.parent::render();
    }

    /**
     * @return \TYPO3\CMS\Extbase\Domain\Model\FileReference|NULL
     */
    protected function getFileReference(): ?FileReference {
        if ($this->getMappingResultsForProperty()->hasErrors()) {
            return NULL;
        }

        $value = $this->getValueAttribute();

        if ($value instanceof FileReference) {
            return $value;
        }

        return $this->propertyMapper->convert((string)$value, FileReference::class);
    }
}