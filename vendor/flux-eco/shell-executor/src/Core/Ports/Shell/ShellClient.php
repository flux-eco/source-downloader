<?php

namespace FluxEco\ShellExecutor\Core\Ports\Shell;

interface ShellClient {
    public function execute(string $command);
}
