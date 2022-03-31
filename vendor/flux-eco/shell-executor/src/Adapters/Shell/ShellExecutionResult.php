<?php

namespace FluxEco\ShellExecutor\Adapters\Shell;

use FluxEco\ShellExecutor\Core\{Ports};

class ShellExecutionResult implements Ports\Shell\ShellExecutionResult
{
    private int $code;
    private int $signal;
    private ?string $output;

    private function __construct(int $code, int $signal, ?string $output)
    {
        $this->code = $code;
        $this->signal = $signal;
        $this->output = $output;
    }

    public static function fromResponseMessage(?string $responseMessage): self
    {
        return new self(0, 0, $responseMessage);
    }

    public static function fromArray(array $response): self
    {
        return new self($response['code'], $response['signal'], $response['output']);
    }

    public function getCode() : int
    {
        return $this->code;
    }

    public function getSignal() : int
    {
        return $this->signal;
    }

    public function getOutput() : ?string
    {
        return $this->output;
    }
}