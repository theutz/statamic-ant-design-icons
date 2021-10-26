<?php

namespace Theutz\StatamicAntDesignIcons;

use Statamic\Tags\Tags;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class Tag extends Tags
{
    protected static $handle = self::HANDLE;

    public const HANDLE = 'antdesignicons';

    public function __get($name)
    {
        if ($name === 'handle') {
            return $this->handle;
        }

        return null;
    }

    protected static $aliases = ["anticon"];

    private const ICONS_NPM_DIR = "node_modules/@ant-design/icons-svg/inline-svg";

    public const ICONS_FALLBACK_DIR = __DIR__ . "/../resources/icons";

    private const DEFAULT_ICON_TYPE = 'outlined';

    public function index()
    {
        $type = $this->params->get('type', self::DEFAULT_ICON_TYPE);
        $icon = $this->params->get('icon');
        $class = $this->params->get('class');

        return $this->output($type, $icon, compact('class'));
    }

    public function wildcard($tag)
    {
        $separator = ":";
        $icon = $this->params->get('icon');
        $class = $this->params->get('class');
        $type = $this->params->get('type', self::DEFAULT_ICON_TYPE);

        if (Str::contains($tag, $separator)) {
            [$icon, $type] = explode($separator, $tag);
        } else {
            $icon = $tag;
        }

        return $this->output($type, $icon, compact('class'));
    }

    protected function output($type, $icon, $attributes = [])
    {
        $file = base_path(self::ICONS_NPM_DIR . "/{$type}/{$icon}.svg");

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
