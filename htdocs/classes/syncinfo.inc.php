<?php
/**
 * Class for settings syncinfo
 */
class SyncInfo {
	private static $settings_table = 'website_syncinfo';

	public static function save($property, $field, $value, $databaseConnection ) {
		$settingsTable = self::$settings_table;

		if ( !is_array($databaseConnection) ) {
			$databaseConnection = array($databaseConnection);
		}

		foreach ( $databaseConnection as $db ) {
			if ( $property != '' ) {
				$query = "SELECT * FROM $settingsTable WHERE property='" . $property . "' ";
				$stmt = $db->getConnection()->prepare($query);
				$stmt->execute();
				if ( $row = $stmt->fetch() ) {
					$query = "UPDATE $settingsTable SET $field='" . addslashes($value) . "' WHERE property='" . $property . "' ";
					$stmt = $db->getConnection()->prepare($query);
					$stmt->execute();
				}
				else {
					$query = "INSERT INTO $settingsTable (property, $field) VALUES ( '" . $property . "', '" . addslashes($value) . "' ) ";
					$stmt = $db->getConnection()->prepare($query);
					$stmt->execute();
				}
			}
		}
	}

	public function __toString() {
		return "Class: " . get_class($this) . "\n";
	}
}
