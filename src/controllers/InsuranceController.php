<?php
class InsuranceController {
    public function list() {
        require_once '../src/Views/insurance/list.php';
    }

    public function edit($id) {
        require_once '../src/Views/insurance/edit.php';
    }
}
?>
