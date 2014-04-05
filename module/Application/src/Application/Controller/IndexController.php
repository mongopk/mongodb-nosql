<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2014 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class IndexController extends AbstractActionController
{
    public function indexAction()
    {
        $m = new \MongoClient();

        // select a database
        $db = $m->test;

        // select a collection (analogous to a relational database's table)
        $collection = $db->cartoons;

        // add a record
//        $document = array( "title" => "Calvin and Hobbes", "author" => "Bill Watterson" );
//        $collection->insert($document);
//
//        // add another record, with a different "shape"
//        $document = array( "title" => "XKCD", "online" => true );
//        $collection->insert($document);

        // find everything in the collection
        $cursor = $collection->find();

        // iterate through the results
        foreach ($cursor as $document) {
            var_dump($document);
        }
        return new ViewModel();
    }
}
