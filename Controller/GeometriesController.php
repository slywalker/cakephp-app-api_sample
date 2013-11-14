<?php
App::uses('AppController', 'Controller');

class GeometriesController extends AppController {

	public function beforeFilter() {
		$this->Crud->on('beforePaginate', function(CakeEvent $event) {
			$model = $event->subject->model;
			$request = $event->subject->request;

			$event->subject->paginator->settings += [
				'conditions' => [
					$model->conditionCenter($request->query)
				]
			];
		});

		parent::beforeFilter();
	}

}