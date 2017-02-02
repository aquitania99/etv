<?php

namespace Acme\FsTest\Views;

use Acme\FsTest\Config;

class BaseView
{
    protected $templateFile;

    public function __construct()
    {
        //TODO
    }

    protected function render()
    {
        ob_start();
        include('../resources/templates/'.$this->templateFile);
        $contents = ob_get_contents();
        ob_end_clean();

        $layout = file_get_contents('../resources/templates/_layouts/default.php');
        $viewContents = str_replace('#!content!#', $contents, $layout);
        $viewContents = str_replace('#!base_path!#', Config::LOCAL_ROOT.'public/', $viewContents);

        //output massaged content
        echo $viewContents;

        //cleaning message session vars
        if(isset($_SESSION['message'])) $_SESSION['message'] = '';
        if(isset($_SESSION['messageType'])) $_SESSION['messageType'] = '';
    }
}