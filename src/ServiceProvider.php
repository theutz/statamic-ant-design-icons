<?php

namespace Theutz\StatamicAntDesignIcons;

use Statamic\Providers\AddonServiceProvider;

class ServiceProvider extends AddonServiceProvider
{
    protected $tags = [Tag::class];

    protected $publishables = [Tag::ICONS_FALLBACK_DIR => '/'];
}
