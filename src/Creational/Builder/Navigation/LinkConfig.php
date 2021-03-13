<?php

declare(strict_types=1);

namespace levijackson\Pattern\Creational\Builder\Navigation;

class LinkConfig {
    
    protected string $name;
    protected string $url;
    protected string $title = '';
    protected bool $noFollow = false;
    protected bool $noOpener = false;
    protected bool $openInNewWindow = false;
    
    public function setName(string $name): void {
        $this->name = $name;
    }

    public function setUrl(string $url): void {
        $this->url = $url;
    }

    public function setTitle(string $title): void {
        $this->title = $title;
    }

    public function setNoFollow(bool $noFollow): void {
        $this->noFollow = $noFollow;
    }

    public function setNoOpener(bool $noOpener): void {
        $this->noOpener = $noOpener;
    }

    public function setOpenInNewWindow(bool $openInNewWindow): void {
        $this->openInNewWindow = $openInNewWindow;
    }
    
    public function toArray(): array {
        return [
            'name' => $this->name,
            'url' => $this->url,
            'title' => $this->title,
            'noFollow' => $this->noFollow,
            'noOpener' => $this->noOpener,
            'openInNewWindow' => $this->openInNewWindow
        ];
    }
}