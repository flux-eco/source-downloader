<?php

namespace FluxEco\ShellExecutor\Adapters\Shell;

use FluxEco\ShellExecutor\Core\{Ports};
use Swoole\Coroutine;

class ShellClient implements Ports\Shell\ShellClient
{

    private function __construct()
    {

    }

    public static function new() : self
    {
        return new self();
    }

    public function execute(string $command) //: Ports\Shell\ShellExecutionResult
    {
        //$response = Coroutine\System::exec($command);
        //return ShellExecutionResult::fromArray(
        //    $response
        //);
        return ShellExecutionResult::fromResponseMessage(shell_exec($command));
    }
}
