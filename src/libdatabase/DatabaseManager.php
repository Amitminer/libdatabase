<?php

namespace libdatabase;

use libdatabase\libdatabase;
use poggit\libasynql\libasynql;
use poggit\libasynql\DataConnector;
use Closure;
use poggit\libasynql\libs\SOFe\AwaitGenerator\Await;

class DatabaseManager
{
    private static $database;

    public static function init(PluginBase $plugin): void
    {
        self::$database = libasynql::create($plugin, $plugin->getConfig()->get("database"), [
            "sqlite" => "database/sqlite.sql",
            "mysql" => "database/mysql.sql"
        ]);
    }

    /**
     * Get the database connection.
     *
     * @param bool $load Whether to load the database connection or close it.
     */
    public static function getDatabase(bool $load = true): void
    {
        if ($load) {
            self::loadDatabase(); // Load the database
        } else {
            self::closeDatabase(); // Close the database connection
        }
    }

    /**
     * Load the database and initialize necessary tables.
     */
    private static function loadDatabase(): void
    {
        self::$database->executeGeneric("flyticket.createTable");
    }

    /**
     * Close the database connection.
     */
    private static function closeDatabase(): void
    {
        if (isset(self::$database)) {
            self::$database->close(); // Close the database connection
        }
    }

    /**
     * Add a player to the database.
     *
     * @param string $playerName The name of the player to add.
     * @return bool True if the player was successfully added, false otherwise.
     */
    public static function addPlayer(string $playerName): bool
    {
        $result = self::$database->executeInsert("flyticket.addPlayer", [
            "playerName" => $playerName
        ]);

        // Return true if the insert statement was successful, false otherwise
        return $result !== null;
    }

    /**
     * Check if a player exists in the database.
     *
     * @param string $playerName The name of the player.
     * @return bool True if the player exists, false otherwise.
     */
    public static function playerExists(string $playerName): \Generator
    {
        $result = yield self::$database->executeSelectSingle("flyticket.getPlayer", [
            "playerName" => $playerName
        ]);

        return $result !== null;
    }

    /**
     * Remove a player from the database.
     *
     * @param string $playerName The name of the player to remove.
     * @return bool True if the player was successfully removed, false otherwise.
     */
    public static function removePlayer(string $playerName): bool
    {
        $result = false;
        self::$database->executeChange("flyticket.removePlayer", [
            "playerName" => $playerName
        ], function (int $rowCount) use (&$result) {
            $result = $rowCount > 0;
        });

        return $result;
    }
}
