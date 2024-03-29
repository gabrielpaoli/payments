<?php
/**
 * @file
 * Contains \Drupal\dashboard\Controller\dashboardController.
 */

namespace Drupal\dashboard\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\Core\Entity\Query\QueryFactory;

class DashboardController extends ControllerBase{

  public function getPayments(){
		$nids = \Drupal::entityQuery('node')->condition('type','payment')->execute();
		$nodes =  \Drupal\node\Entity\Node::loadMultiple($nids);
		//var_dump($nodes);
		return $nodes;
  }

  public function content(){
    return [
      '#theme' => 'dashboard_admin',
  		'#test_var' => $this->getPayments(),
    ];
  }      
}