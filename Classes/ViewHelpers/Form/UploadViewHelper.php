<?php
namespace Dagou\DagouFluid\ViewHelpers\Form;

use TYPO3\CMS\Extbase\Domain\Model\FileReference;
use TYPO3\CMS\Extbase\Property\PropertyMapper;
use TYPO3\CMS\Extbase\Security\Cryptography\HashService;
use TYPO3\CMS\Fluid\ViewHelpers\Form\AbstractFormFieldViewHelper;

class UploadViewHelper extends AbstractFormFieldViewHelper {
    /**
     * @var string
     */
    protected $tagName = 'input';
    protected HashService $hashService;
    protected PropertyMapper $propertyMapper;

    /**
     * @param \TYPO3\CMS\Extbase\Security\Cryptography\HashService $hashService
     */
    public function injectHashService(HashService $hashService): void {
        $this->hashService = $hashService;
    }

    /**
     * @param \TYPO3\CMS\Extbase\Property\PropertyMapper $propertyMapper
     */
    public function injectPropertyMapper(PropertyMapper $propertyMapper): void {
        $this->propertyMapper = $propertyMapper;
    }

    public function initializeArguments(): void {
        parent::initializeArguments();

        $this->registerTagAttribute('disabled', 'string', 'Specifies that the input element should be disabled when the page loads');
        $this->registerTagAttribute('multiple', 'string', 'Specifies that the file input element should allow multiple selection of files');
        $this->registerTagAttribute('accept', 'string', 'Specifies the allowed file extensions to upload via comma-separated list, example ".png,.gif"');
        $this->registerArgument('errorClass', 'string', 'CSS class to set if there are errors for this ViewHelper', FALSE, 'f3-form-error');
        $this->registerArgument('fieldFirst', 'boolean', 'Insert the field above the rendered content', FALSE, TRUE);

        $this->registerUniversalTagAttributes();
    }

    /**
     * @return string
     * @throws \TYPO3\CMS\Extbase\Property\Exception
     */
    public function render(): string {
        $name = $this->getName();
        $allowedFields = ['name', 'type', 'tmp_name', 'error', 'size'];
        foreach ($allowedFields as $fieldName) {
            $this->registerFieldNameForFormTokenGeneration($name . '[' . $fieldName . ']');
        }
        $this->tag->addAttribute('type', 'file');

        if (isset($this->arguments['multiple'])) {
            $this->tag->addAttribute('name', $name . '[]');
        } else {
            $this->tag->addAttribute('name', $name);
        }

        $fileReference = $this->getFileReference();

        $this->setErrorClassAttribute();

        $this->templateVariableContainer->add('resource', $fileReference);

        $content = $this->renderChildren();

        $this->templateVariableContainer->remove('resource');

        return $this->arguments['fieldFirst'] ?
            $this->renderHiddenFieldForFileReference($fileReference).$this->tag->render().$content :
            $content.$this->renderHiddenFieldForFileReference($fileReference).$this->tag->render();
    }

    /**
     * @param \TYPO3\CMS\Extbase\Domain\Model\FileReference|null $fileReference
     *
     * @return string
     */
    protected function renderHiddenFieldForFileReference(?FileReference $fileReference = NULL): string {
        if ($fileReference !== NULL) {
            $name = $this->getName();

            if ($fileReference->getUid() === NULL) {
                return '<input type="hidden" name="'.$name.'[__resource]" value="'.htmlspecialchars($this->hashService->appendHmac((string)$fileReference->getOriginalResource()->getOriginalFile()->getUid())).'" />';
            } else {
                return '<input type="hidden" name="'.$name.'[__identity]" value="'.htmlspecialchars($this->hashService->appendHmac((string)$fileReference->getUid())).'" />';
            }
        }

        return '';
    }

    /**
     * @return \TYPO3\CMS\Extbase\Domain\Model\FileReference|null
     * @throws \TYPO3\CMS\Extbase\Property\Exception
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