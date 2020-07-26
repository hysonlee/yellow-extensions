<?php
// Japanese extension, https://github.com/datenstrom/yellow-extensions/tree/master/source/japanese

class YellowJapanese {
    const VERSION = "0.8.21";
    public $yellow;         // access to API
    
    // Handle initialisation
    public function onLoad($yellow) {
        $this->yellow = $yellow;
    }
    
    // Handle update
    public function onUpdate($action) {
        $fileName = $this->yellow->system->get("coreSettingDirectory").$this->yellow->system->get("coreSystemFile");
        if ($action=="install") {
            $this->yellow->system->save($fileName, array("language" => "ja"));
        } elseif ($action=="uninstall" && $this->yellow->system->get("language")=="ja") {
            $language = reset(array_diff($this->yellow->system->getValues("language"), array("ja")));
            $this->yellow->system->save($fileName, array("language" => $language));
        }
    }
}