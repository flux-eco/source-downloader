<?php

namespace FluxEco\SourceDownloader\Core\Application\Processes;

use FluxEco\SourceDownloader\Core\{Ports, Application\DownloadHandlers};

class DownloadProcess implements DownloadHandlers\Process
{
    private Ports\Configs\Outbounds $outbounds;
    /**
     * @var DownloadHandlers\CommandHandler[]
     */
    private array $handlerQueue;

    private function __construct(Ports\Configs\Outbounds $outbounds)
    {
        $this->outbounds = $outbounds;
        $this->handlerQueue = [
            DownloadHandlers\DownloadTarGzHandler::new($outbounds, $this),
            DownloadHandlers\GitCommandHandler::new($outbounds, $this),
            $this
        ];
    }

    public static function new(Ports\Configs\Outbounds $outbounds) : self
    {
        return new self($outbounds);
    }

    public function handle(DownloadHandlers\Command $command) : void
    {
        throw new \RuntimeException('No valid handler found: sourceType: ' . $command->getSourceType() . ', source: ' . $command->getSourceType());
    }

    public function process(DownloadHandlers\Command $command) : void
    {
        $nextHandler = $this->handlerQueue[0];
        unset($this->handlerQueue[0]); // remove item at index 0
        $this->handlerQueue = array_values($this->handlerQueue); // 'reindex' array

        $nextHandler->handle($command);
    }
}