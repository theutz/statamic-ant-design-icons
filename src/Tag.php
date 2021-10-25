<?php

namespace Theutz\StatamicAntDesignIcons;

use Statamic\Tags\Tags;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class Tag extends Tags
{
    protected static $handle = 'antdesignicon';

    protected static $aliases = ["adicon"];

    private const ICONS_NPM_DIR = "node_modules/@ant-design/icons-svg/inline-svg";

    private const ICONS_FALLBACK_DIR = __DIR__ . "/../dist";

    public function index()
    {
        return $this->wildcard($this->params->get('type'));
    }

    public function wildcard($tag)
    {
        $separator = ":";
        $icon = $this->params->get('icon');
        $class = $this->params->get('class');

        if (Str::contains($tag, $separator)) {
            [$tag, $icon] = explode($separator, $tag);
        }

        return $this->output($tag, $icon, compact('class'));
    }

    protected function output($type, $icon, $attributes = [])
    {
        $file = base_path(self::ICONS_NPM_DIR . "/{$type}/{$icon}.svg");
        debug($file);

        if (!File::exists($file) && !File::exists($file = realpath(self::ICONS_FALLBACK_DIR . "/{$type}/{$icon}.svg"))) {
            return '';
        }

        $contents = File::get($file);

        $attr = '';

        foreach ($attributes as $key => $value) {
            $attr .= " {$key}=\"{$value}\"";
        }

        return preg_replace('/<svg(.*?)>/i', "<svg$1 {$attr}>", $contents);
    }
}
