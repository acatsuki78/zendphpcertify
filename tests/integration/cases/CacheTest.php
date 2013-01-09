<?php
class CacheTest extends phpRack_Test
{
    public function testPhpApcExtensionsIsLoaded()
    {
        $this->assert->php->extensions
            ->isLoaded('apc');
    }
}