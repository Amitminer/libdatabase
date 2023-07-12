# libdatabase
remember this database is only for Flyticket plugin.. if you want to use it see codes! and understand it..

## Usage

### Initializing the Database

Before using the `libdatabase` library, you need to initialize the database connection and load the necessary tables. Here's an example of how to initialize the database:

```php
use libdatabase\libdatabase;

// Initialize the database
libdatabase::initDatabase($plugin);
```

Make sure to replace `"/path/to/database.db"` with the actual file path to your database file.

### Adding a Player

To add a player to the database, you can use the `addPlayer` method:

```php
use libdatabase\libdatabase;

$playerName = "JohnDoe";

// Add the player to the database
libdatabase::addPlayer($playerName);
```

### Checking if a Player Exists

You can check if a player exists in the database using the `playerExists` method:

```php
use libdatabase\libdatabase;

$playerName = "JohnDoe";

// Check if the player exists in the database
if (libdatabase::playerExists($playerName)) {
    // Player exists
} else {
    // Player does not exist
}
```

### Removing a Player

To remove a player from the database, you can use the `removePlayer` method:

```php
use libdatabase\libdatabase;

$playerName = "JohnDoe";

// Remove the player from the database
libdatabase::removePlayer($playerName);
```

## Contributing

Contributions to `libdatabase` are welcome! If you find a bug or have a feature suggestion, please open an issue or submit a pull request on GitHub.

## Credits

`libdatabase` is developed and maintained by [Your Name](https://github.com/Amitminer).
