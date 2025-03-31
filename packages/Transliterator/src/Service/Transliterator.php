<?php
namespace Solidarity\Transliterator\Service;

/**
 * Transliterator class
 */
class Transliterator
{
    private array $transliterationMap = [
        'а' => 'a',
        'б' => 'b',
        'в' => 'v',
        'г' => 'g',
        'д' => 'd',
        'ђ' => 'đ',
        'е' => 'e',
        'ж' => 'ž',
        'з' => 'z',
        'и' => 'i',
        'ј' => 'j',
        'к' => 'k',
        'л' => 'l',
        'љ' => 'lj',
        'м' => 'm',
        'н' => 'n',
        'њ' => 'nj',
        'о' => 'o',
        'п' => 'p',
        'р' => 'r',
        'с' => 's',
        'т' => 't',
        'ћ' => 'ć',
        'у' => 'u',
        'ф' => 'f',
        'х' => 'h',
        'ц' => 'c',
        'ч' => 'č',
        'џ' => 'dž',
        'ш' => 'š'
    ];

    /**
     * @param $text
     *
     * @return string
     */
    public function transliterate($text) : string
    {
        if (empty($text)) {
            return $text;
        }
        if (!$this->isCyrillic($text)) {
            return $text;
        }

        return str_replace(
            array_keys($this->transliterationMap),
            array_values($this->transliterationMap),
            $text
        );
    }

    /**
     * @param $text
     *
     * @return bool
     */
    public function isCyrillic($text) : bool
    {
        $foundCount = 0;
        str_replace(array_keys($this->transliterationMap), '', $text, $foundCount);

        return $foundCount > 0;
    }
}
