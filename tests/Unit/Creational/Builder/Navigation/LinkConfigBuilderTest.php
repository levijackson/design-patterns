<?php

declare(strict_types=1);

namespace levijackson\Pattern\Tests\Unit\Creational\Builder\Navigation;

use PHPUnit\Framework\TestCase;
use levijackson\Pattern\Creational\Builder\Navigation\LinkConfig;
use levijackson\Pattern\Creational\Builder\Navigation\LinkConfigBuilder;

class LinkConfigBuilderTest extends TestCase
{
    public function testBuildBareMinimum(): void {
        $builder = new LinkConfigBuilder();
        $linkName = 'Levi Jackson';
        $linkUrl = 'https://www.levijackson.xyz';
        $linkConfig = $builder->createLink($linkName, $linkUrl);
        $configData = $linkConfig->getLinkConfig()->toArray();

        $this->assertEquals($linkName, $configData['name']);
        $this->assertEquals($linkUrl, $configData['url']);
    }

    public function testFullBuild(): void {
        $builder = new LinkConfigBuilder();
        $linkName = 'Levi Jackson';
        $linkUrl = 'https://www.levijackson.xyz';
        $title = 'View Levi Jackson\'s web site';
        $noFollow = true;
        $noOpener = true;
        $openInNewWindow = true;

        $builder->createLink($linkName, $linkUrl)
            ->setTitle($title)
            ->setRelAttributes($noFollow, $noOpener)
            ->setOpenInNewWindow($openInNewWindow);
            
        $configData = $builder->getLinkConfig()->toArray();

        $this->assertEquals($linkName, $configData['name']);
        $this->assertEquals($linkUrl, $configData['url']);
        $this->assertEquals($title, $configData['title']);
        $this->assertEquals($noFollow, $configData['noFollow']);
        $this->assertEquals($noOpener, $configData['noOpener']);
        $this->assertEquals($openInNewWindow, $configData['openInNewWindow']);
    }
}
