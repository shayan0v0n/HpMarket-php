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

    public function changeUrlToName($url) {
        $explodingUrl = explode("-", $url);
        $implodingUrl = implode(" ", $explodingUrl);
        return $implodingUrl;
    }

    public function getCurrentUrl($URL, $str) {
        $positinURL = strpos($URL, $str);
        $splicedURL = substr($URL, $positinURL + 2);
        $positinURL = strpos($splicedURL, ".");
        $splicedURL = substr($splicedURL, 0, $positinURL);
        return $splicedURL;
    }
}