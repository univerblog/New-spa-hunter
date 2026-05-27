<?php

class Gettext
{
    private array $translations = [];

    public function loadPoFile(string $path): void
    {
        if (!is_file($path)) return;

        $content = file_get_contents($path);
        $lines   = explode("\n", $content);

        $msgid  = null;
        $msgstr = null;
        $mode   = null;

        $commit = function () use (&$msgid, &$msgstr) {
            if ($msgid !== null && $msgid !== '' && $msgstr !== null && $msgstr !== '') {
                $this->translations[$msgid] = $msgstr;
            }
            $msgid  = null;
            $msgstr = null;
        };

        foreach ($lines as $line) {
            $line = trim($line);

            if ($line === '' || str_starts_with($line, '#')) {
                $commit();
                continue;
            }

            if (preg_match('/^msgid\s+"(.*)"$/', $line, $m)) {
                $commit();
                $msgid  = stripcslashes($m[1]);
                $msgstr = null;
                $mode   = 'id';
            } elseif (preg_match('/^msgstr\s+"(.*)"$/', $line, $m)) {
                $msgstr = stripcslashes($m[1]);
                $mode   = 'str';
            } elseif (preg_match('/^"(.*)"$/', $line, $m)) {
                $chunk = stripcslashes($m[1]);
                if ($mode === 'id')  $msgid  .= $chunk;
                if ($mode === 'str') $msgstr .= $chunk;
            }
        }

        $commit();
    }

    public function translate(string $msgid): string
    {
        return $this->translations[$msgid] ?? $msgid;
    }
}