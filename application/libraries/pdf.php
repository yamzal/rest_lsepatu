<?php
class pdf{
    function __construct() {
        // include_once APPPATH . '/third_party'
        require_once APPPATH. '/third_party/dompdf/dompdf_config.inc.php';
    }
}
