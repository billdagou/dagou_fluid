<?php
namespace Dagou\DagouFluid\ViewHelpers\Http;

use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper;

class DownloadViewHelper extends AbstractViewHelper {
    public function initializeArguments() {
        $this->registerArgument('filename', 'string', 'Downloaded filename');
    }

    public function render():void {
        ob_clean();

        $this->viewHelperVariableContainer->add(__CLASS__, 'filename', $this->arguments['filename']);

        $content = $this->renderChildren();

        $header = [
            'Content-Disposition' => 'attachment; filename='.$this->viewHelperVariableContainer->get(__CLASS__, 'filename'),
            'Content-Length' => strlen($content),
            'Content-Transfer-encoding' => 'binary',
            'Content-Type' => 'application/octet-stream',
            'Expires' => '0',
            'Cache-Control' => 'must-revalidate post-check=0, pre-check=0',
            'Pragma' => 'public',
        ];

        $this->viewHelperVariableContainer->remove(__CLASS__, 'filename');

        $this->renderHeader($header);

        echo $content;

        exit();
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