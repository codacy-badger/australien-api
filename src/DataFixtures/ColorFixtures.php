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

use App\Entity\Color;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class ColorFixtures extends Fixture
{
    /**
     * Load colors into database.
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $grisMerle = new Color();
        $grisMerle->setIdentifier('gris-merle');
        $grisMerle->setName('Gris Merle');
        $grisMerle->setMerle(true);
        $grisMerle->setBlack(true);
        $manager->persist($grisMerle);
        $this->addReference('color-gris-merle', $grisMerle);

        $redMerle = new Color();
        $redMerle->setIdentifier('rouge-merle');
        $redMerle->setName('Rouge Merle');
        $redMerle->setMerle(true);
        $redMerle->setRed(true);
        $manager->persist($redMerle);
        $this->addReference('color-rouge-merle', $redMerle);

        $blackTricolor = new Color();
        $blackTricolor->setIdentifier('noir-tricolore');
        $blackTricolor->setName('Noir tricolore');
        $blackTricolor->setBlack(true);
        $manager->persist($blackTricolor);
        $this->addReference('color-noir-tricolor', $blackTricolor);

        $redTricolor = new Color();
        $redTricolor->setIdentifier('rouge-tricolore');
        $redTricolor->setName('Rouge tricolore');
        $redTricolor->setRed(true);
        $manager->persist($redTricolor);
        $this->addReference('color-red-tricolor', $redTricolor);

        $manager->flush();
        $manager->clear();
    }
}
