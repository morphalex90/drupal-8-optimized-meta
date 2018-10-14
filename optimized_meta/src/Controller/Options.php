<?php

namespace Drupal\optimized_meta\Controller;

use Drupal\Core\Controller\ControllerBase;

/**
 * Provides route responses for the Example module.
 */
class Options extends ControllerBase {
	
	public function homepage() {
		
		
		$build = [
		  '#markup' => $this->t('Hello World!'),
		];
		return $build;

	}
}