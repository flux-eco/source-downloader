<?php

namespace FluxEco\ShellExecutor\Core\Ports;

class ShellExecutorService
{
    private Shell\ShellClient $shellClient;

    private function __construct(Shell\ShellClient $shellClient)
    {
        $this->shellClient = $shellClient;
    }

    public static function new(Configs\Outbounds $outbounds) : self
    {
        return new self($outbounds->getShellClient());
    }

    final public function execute(array $commandQueue) : void
    {
        $command = implode(' && ', $commandQueue);
        echo $command . PHP_EOL;
        $response = $this->shellClient->execute($command);
        echo $response->getOutput() . PHP_EOL;
    }

}