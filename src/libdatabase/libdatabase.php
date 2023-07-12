<?php

namespace libdatabase;

use libdatabase\DatabaseManager;

class libdatabase
{
    /**
     * Initialize the FlyTicket database.
     */
    public static function initDatabase(): void
    {
        DatabaseManager::init();
    }

    /**
     * Add a player to the FlyTicket database.
     *
     * @param string $playerName The name of the player to add.
     * @return bool True if the player was successfully added, false otherwise.
     */
    public static function addPlayer(string $playerName): bool
    {
        return DatabaseManager::addPlayer($playerName);
    }

    /**
     * Check if a player exists in the FlyTicket database.
     *
     * @param string $playerName The name of the player.
     * @return bool True if the player exists, false otherwise.
     */
    public static function playerExists(string $playerName): bool
    {
        return DatabaseManager::playerExists($playerName);
    }

    /**
     * Remove a player from the FlyTicket database.
     *
     * @param string $playerName The name of the player to remove.
     * @return bool True if the player was successfully removed, false otherwise.
     */
    public static function removePlayer(string $playerName): bool
    {
        return DatabaseManager::removePlayer($playerName);
    }
}
