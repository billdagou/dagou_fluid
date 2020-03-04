<?php
namespace Dagou\DagouFluid\ViewHelpers\Http;

use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper;

class DownloadViewHelper extends AbstractViewHelper {
    public function initializeArguments() {
        $this->registerArgument('filename', 'string', 'Downloaded filename');
    }

    public function render() {
        ob_clean();

        $this->viewHelperVariableContainer->add(__CLASS__, 'filename', $this->arguments['filename']);
        $this->viewHelperVariableContainer->add(__CLASS__, 'filesize', 0);

        $content = $this->renderChildren();

        $header = [
            'Content-type' => 'application/octet-stream',
            'Content-Disposition' => 'attachment; filename='.$this->getFilename(),
            'Content-transfer-encoding' => 'binary',
            'Expires' => '0',
            'Cache-Control' => 'must-revalidate post-check=0, pre-check=0',
            'Pragma' => 'public',
        ];

        if ($this->viewHelperVariableContainer->get(__CLASS__, 'filesize')) {
            $header['Content-Length'] = $this->viewHelperVariableContainer->get(__CLASS__, 'filesize');
        }

        $this->viewHelperVariableContainer->remove(__CLASS__, 'filesize');
        $this->viewHelperVariableContainer->remove(__CLASS__, 'filename');

        $this->renderHeader($header);

        echo $content;

        exit();
    }

    /**
     * @return string
     */
    protected function getFilename(): string {
        return str_replace(
            ' ',
            '_',
            $this->viewHelperVariableContainer->get(__CLASS__, 'filename')
        );
    }

    /**
     * @param array $header
     */
    protected function renderHeader(array $header) {
        foreach ($header as $k => $v) {
            header($k.': '.$v);
        }
    }
}