<?php 
class HeaderModifier {
    public function setHeader($headerStr){
        header($headerStr);
    }
}
?>