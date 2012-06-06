<?php

namespace Desarrolla2\FrontendBundle\Repository;

use Doctrine\ORM\EntityRepository;
use Desarrolla2\FrontendBundle\Entity\Query;

/*
 * This file is part of the Imager package.
 * 
 * Short description   
 *
 * @author Daniel González <daniel.gonzalez@freelancemadrid.es>
 * @date May 10, 2012, 12:15:36 AM
 * 
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

class QueryRepository extends EntityRepository
{

    var $max_results = 50;

    public function addQuery($query_string = null)
    {
        if ($query_string) {
            $em = $this->getEntityManager();

            $query = $em->createQuery(
                            'SELECT q FROM FrontendBundle:Query q' .
                            ' WHERE q.name = :name' .
                            ' ORDER BY q.updated DESC'
                    )->setParameter('name', $query_string)
                    ->getOneOrNullResult();

            if (!$query) {
                $query = new Query($query_string);
            } else {
                $query->setUpdated(new \DateTime());
                $query->setHits($query->getHits() + 1);
            }

            $em->persist($query);
            $em->flush();
        }
    }

    public function getLatest()
    {
        $query = $this->getEntityManager()->createQuery(
                'SELECT q FROM FrontendBundle:Query q' .
                ' ORDER BY q.updated DESC'
        );
        return $query->setFirstResult(1)->setMaxResults($this->max_results)->getResult();
    }

    public function getMostHits()
    {
        $query = $this->getEntityManager()->createQuery(
                'SELECT q FROM FrontendBundle:Query q' .
                ' ORDER BY q.hits DESC'
        );
        return $query->setMaxResults($this->max_results)->getResult();
    }

}