<?php

/*
     __  __
    |  |/  |.----.-----.-----.-----.-----.-----.--.--.
    |     < |   _|  _  |     |     |  _  |__ --|  |  |
    |__|\__||__| |_____|__|__|__|__|_____|_____|___  |
                                               |_____|
*/

namespace kronnosy\handler;

use JsonException;
use pocketmine\utils\Config;
use pocketmine\plugin\Plugin;

class ConfigHandler
{
    private static Config $config;

    public static function init(Plugin $plugin): void
    {
        $dataFolder = $plugin->getDataFolder();

        if (!is_dir($dataFolder)) {
            mkdir($dataFolder);
        }

        $configPath = $dataFolder . "config.yml";

        if (!file_exists($configPath)) {
            $plugin->saveResource("config.yml");
        }

        self::$config = new Config($configPath, Config::YAML);
    }

    public static function get(string $key)
    {
        return self::$config->get($key);
    }

    /**
     * @throws JsonException
     */
    public static function set(string $key, $value): void
    {
        self::$config->set($key, $value);
        self::$config->save();
    }

    public static function getAll(): array
    {
        return self::$config->getAll();
    }

    public static function exists(string $key): bool
    {
        return self::$config->exists($key);
    }
}
