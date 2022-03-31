<?php

namespace FluxEco\ShellExecutor\Core\Ports\Shell;

interface ShellExecutionResult
{
    public function getCode() : int;

    public function getSignal() : int;

    public function getOutput() : ?string;
}