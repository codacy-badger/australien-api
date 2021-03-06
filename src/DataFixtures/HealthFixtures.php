<?php
/*
 * This file is part of the Berger Australian Application.
 *
 * (c) Alexandre Tranchant <alexandre.tranchant@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\DataFixtures;

use App\Entity\Health;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class HealthFixtures extends Fixture
{
    /**
     * Load healths into database.
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        //medical sensibility
        $mdr1 = new Health();
        $mdr1->setIdentifier('MDR1');
        $mdr1->setMaximum(1);
        $manager->persist($mdr1);
        $this->addReference('health-mdr1', $mdr1);

        //Hereditary Cataract
        $hsf4 = new Health();
        $hsf4->setIdentifier('HSF4');
        $hsf4->setMaximum(1);
        $manager->persist($hsf4);
        $this->addReference('health-hsf4', $hsf4);

        //colley-eye-anomaly
        $cea = new Health();
        $cea->setIdentifier('CEA');
        $cea->setMaximum(1);
        $manager->persist($cea);
        $this->addReference('health-cea', $cea);

        //progressive atrophy of the retina
        $pra = new Health();
        $pra->setIdentifier('PRA');
        $pra->setMaximum(1);
        $manager->persist($pra);
        $this->addReference('health-pra', $pra);

        //Multifocal Retinopathy
        $cmr = new Health();
        $cmr->setidentifier('CMR');
        $cmr->setMaximum(1);
        $manager->persist($cmr);
        $this->addReference('health-cmr', $cmr);

        //Degenerative myelopathy
        $degm = new Health();
        $degm->setidentifier('DEGM');
        $degm->setMaximum(1);
        $manager->persist($degm);
        $this->addReference('health-degm', $degm);

        //HUU - Hyperuricosuria
        $huu = new Health();
        $huu->setidentifier('HUU');
        $huu->setMaximum(1);
        $manager->persist($huu);
        $this->addReference('health-huu', $huu);

        //MLOC - Merle locus
        $mloc = new Health();
        $mloc->setidentifier('MLOC');
        $mloc->setMaximum(1);
        $manager->persist($mloc);
        $this->addReference('health-mloc', $mloc);

        //NST - natural short tail
        $nst = new Health();
        $nst->setidentifier('NST');
        $nst->setMaximum(1);
        $manager->persist($nst);
        $this->addReference('health-nst', $nst);

        //hip dysplasia
        $hipDysplasia = new Health();
        $hipDysplasia->setIdentifier('hip-dysplasia');
        $hipDysplasia->setMaximum(2);
        $manager->persist($hipDysplasia);
        $this->addReference('health-hipDysplasia', $hipDysplasia);

        //elbow dysplasia
        $elbowDysplasia = new Health();
        $elbowDysplasia->setIdentifier('elbow-dysplasia');
        $elbowDysplasia->setMaximum(2);
        $manager->persist($elbowDysplasia);
        $this->addReference('health-elbowDysplasia', $elbowDysplasia);

        $manager->flush();
        $manager->clear();
    }
}
