<?php

class Db1Test extends phpRack_Test
{
    public function testConnectionIsAlive()
    {
    }

    public function testRequiredPhpExtensionIsLoaded()
    {
        $this->assert->php->extensions
            ->isLoaded('pdo');
    }
}