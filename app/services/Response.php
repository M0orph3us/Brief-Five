<?php
trait Response
{
    public function render(string $view, array $data = null)
    {
        if (!empty($data)) {
            foreach ($data as $key => $value) {
                ${$key} = $value;
            }
        }
        $viewFile = __DIR__ . "/../views/$view.php";
        require_once $viewFile;
    }
}