<?php
/**
 * LocationFixture
 *
 */
class LocationFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'lat' => array('type' => 'float', 'null' => false, 'default' => '0.000000', 'length' => '9,6', 'key' => 'index'),
		'lng' => array('type' => 'float', 'null' => false, 'default' => '0.000000', 'length' => '9,6'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'lat_lng' => array('column' => array('lat', 'lng'), 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'MyISAM')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'lat' => 1,
			'lng' => 1
		),
	);

}
