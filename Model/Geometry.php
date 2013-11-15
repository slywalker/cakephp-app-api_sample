<?php
App::uses('AppModel', 'Model');
App::uses('Sanitize', 'Utility');

/**
 * Geometry Model
 *
 */
class Geometry extends AppModel {

	public $virtualFields = [
		'lat' => 'Y(`latlng`)',
		'lng' => 'X(`latlng`)'
	];

	public function conditionCenter($queryParams) {
		$queryParams = Sanitize::clean($queryParams) + [
			'lat' => null,
			'lng' => null
		];

		if (!is_numeric($queryParams['lat']) || !is_numeric($queryParams['lng'])) {
			return [];
		}

		return ["MBRContains(
			GeomFromText(
				Concat(
					'LineString(',
					{$queryParams['lng']} + 1,
					' ',
					{$queryParams['lat']} + 1,
					',',
					{$queryParams['lng']} - 1,
					' ',
					{$queryParams['lat']} - 1,
					')'
				)
			),
			latlng
		)"];
	}

}