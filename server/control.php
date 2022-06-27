<?php


class Control {
    public function changeNameToUrl($name) {
        $splitedName = explode(" ", $name);
        $joinedName = [];
        foreach($splitedName as $item) {
            if ($item !== "-") {
                array_push($joinedName, $item);
            }
        }
        $url = implode("-", $joinedName);
        return $url;
    }
}