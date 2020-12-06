<?php

namespace App\DataFixtures;

use App\Entity\MHClass;
use App\Entity\MHExam;
use App\Entity\MHUser;
use DateTime;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Validator\Constraints\Date;

class AppFixtures extends Fixture
{

    private $encoder;

    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder  = $encoder;
    }
    public function load(ObjectManager $manager)
    {
        $class = new MHClass;
        $class->setName("classe de test");
        $manager->persist($class);
        $faker = Factory::create();
        for ($i = 0; $i < 10; $i++) {
            $teacher = new MHUser();
            $teacher->setName(explode(" ", $faker->name)[0])
                ->setFirstName(explode(" ", $faker->name)[0])
                ->setEmail($faker->email)
                ->setRoles([MHUser::ROLE_ADMIN])
                ->setPassword($this->encoder->encodePassword($teacher, "123456"));
            $manager->persist($teacher);
            $exam = new MHExam();
            $exam->setTitle($faker->text(20))
                ->setAuthor($teacher)
                ->setBeginAt(new DateTime())
                ->setEndAt(new DateTime())
                ->setSession(new DateTime())
                ->setClass($class);
            $manager->persist($exam);
            for ($j = 0; $j < 5; $j++) {
                $student = new MHUser();
                $student
                    ->setName(explode(" ", $faker->name)[0])
                    ->setFirstName(explode(" ", $faker->name)[0])
                    ->setEmail($faker->email)
                    ->setRoles([MHUser::ROLE_STUDENT])
                    ->setPassword($this->encoder->encodePassword($student, "123456"))
                    ->setStudentClass($class);
                $manager->persist($student);
            }
        }

        $manager->flush();
    }
}
