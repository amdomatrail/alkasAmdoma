<?php

class Controller
{
    public function render(string $nomDuFichier, array $data = []) : void
    {
        extract($data, EXTR_SKIP,);

        require_once('template/'.$nomDuFichier.'.php');
    }
    function headerLoc(string $cible):never
    {
        header('Location:'.$cible.'.php');
        exit();
    }
    public function checkAllDataTrue(array $data): bool
    {
        foreach ($data as $val) {
            if (!$val) {
                return false;
            }
        }
        return true;
    }
    public function slugify(string $string, string $delimiter = '-'): string
    {
        $oldLocale = setlocale(LC_ALL, '0');
        setlocale(LC_ALL, 'en_US.UTF-8');
        $clean = iconv('UTF-8', 'ASCII//TRANSLIT', $string);
        $clean = preg_replace("/[^a-zA-Z0-9\/_|+ -]/", '', $clean);
        $clean = strtolower($clean);
        $clean = preg_replace("/[\/_|+ -]+/", $delimiter, $clean);
        $clean = trim($clean, $delimiter);
        setlocale(LC_ALL, $oldLocale);

        return $clean;
    }
}