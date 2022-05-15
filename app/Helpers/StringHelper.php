<?php

namespace App\Helpers;

class StringHelper
{

    /**
     * Return a preview of long text
     *
     * @param string $text
     * @param int|int $max_characters
     * @return string|string
     */
    public static function textPreview(string $text, int $max_characters = 500) {
        if (mb_strlen($text) <= $max_characters) {
            $result = $text;
        } else {
            // Use mb_substr instead of substr for multibyte characters (in case of wysiwyg editor)
            $result = mb_substr($text, 0, $max_characters) . '...';
        }
        return $result;
    }
}
