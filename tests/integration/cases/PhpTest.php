<?php
class PhpTest extends phpRack_Test
{
    public function testPhpVersionIsCorrect()
    {
        $this->assert->php->version
            ->atLeast('5.3');
    }

    public function testRequiredPhpExtensionsAreLoaded()
    {
        $this->assert->php->extensions
            ->isLoaded('simplexml')
            ->isLoaded('ctype')
            ->isLoaded('iconv')
            ->isLoaded('Reflection')
            ->isLoaded('session')
            ->isLoaded('soap')
            ->isLoaded('dom');
    }
}