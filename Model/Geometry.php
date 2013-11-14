<?php
App::uses('AppModel', 'Model');
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
		if (empty($queryParams['lat']) || empty($queryParams['lng'])) {
			return [];
		}

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