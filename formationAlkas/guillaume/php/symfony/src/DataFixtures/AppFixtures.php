<?php

namespace App\DataFixtures;

use App\Entity\Article;
use App\Entity\Comment;
use App\Entity\Category;
use DateTimeImmutable;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');
        for ($i = 1; $i <=3; $i++) {
            $category = new Category();
            $category->setTitle($faker->sentence())
                ->setDescription($faker->paragraph());

            $manager->persist($category);

            for ($j=1; $j<= mt_rand(4,6); $j++){
                $article = new Article();
                $content = "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.";
                $image = "https://picsum.photos/350/150?random=".mt_rand(1, 55000);
                $article->setTitle($faker->sentence())
                    ->setContent($content)
                    ->setImage($image)
                    ->setCreateAt($faker->dateTimeBetween('-6 months'))
                    ->setCategory($category);

                $manager->persist($article);

                for ($k=1; $k<= mt_rand(4,10); $k++){
                    $comment = new Comment();
                    $contents = "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.";
                    $now = new \DateTime();
                    $interval = $now->diff($article->getCreateAt());
                    $days = $interval->days;
                    $minimum = '-'.$days.' days'; // -100 days
                    $date = new DateTimeImmutable('2022-05-01');
                    $date->modify('+'.$days.' day')->format('d/m/Y');


                    $comment-> setAuthor($faker->name())
                        ->setContent($contents);

                    $comment->setCreatedAt($date);
                    $comment->setArticle($article);
                    $manager->persist($comment);
                }

            }
        }

        $manager->flush();
    }
}
