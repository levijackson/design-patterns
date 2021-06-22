<?php

declare(strict_types=1);

namespace levijackson\Pattern\Creational\Builder\Navigation;

class LinkConfigBuilder {

    protected LinkConfig $link;

    public function createLink(string $name, string $url): self {
        $this->link = new LinkConfig();
        $this->link->setName($name);
        $this->link->setUrl($url);

        return $this;
    }

    public function setTitle(string $title): self {
        $this->link->setTitle($title);

        return $this;
    }

    public function setRelAttributes(bool $noFollow, bool $noOpener): self {
        $this->link->setNoFollow($noFollow);
        $this->link->setNoOpener($noOpener);

        return $this;
    }

    public function setOpenInNewWindow(bool $openInNewWindow): self {
        $this->link->setOpenInNewWindow($openInNewWindow);

        return $this;
    }

    public function getLinkConfig(): LinkConfig {
        return $this->link;
    }
}