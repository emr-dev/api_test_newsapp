<?php


namespace App\Services;


use App\Entity\Article;
use App\Entity\ArticleCategory;
use Doctrine\ORM\EntityManager;

class ParserService
{

    private $em = false;

    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }
    public function start()
    {
        $data = $this->getData();
        foreach ($data as $item){
            $category = $this->getCategory($item);
            $this->createArticle($item,$category);
        }

        return true;

    }
    private function getCategory($item){
        $isset = $this->em->getRepository(ArticleCategory::class)->findOneBy(['name'=>$item['source']['name']]);
        if(!$isset){
            $isset = new ArticleCategory();
            $isset->setName($item['source']['name']);
            $isset->setDescription("Источник");
            $this->em->persist($isset);
            $this->em->flush();
        }
        return $isset;
    }

    private function createArticle($item, ArticleCategory $category){

        $isset = $this->em->getRepository(Article::class)->findOneBy(['name'=>$item['title']]);
        if(!$isset){
            $isset = new Article();
            $isset->setName($item['title']);
            $isset->setCategory($category);
            $isset->setDescription($item['description']);
            $isset->setShortDescription($item['description']);
            $isset->setImage($item['urlToImage']);
            $isset->setDataCreate(new \DateTime($item['publishedAt']));
            $this->em->persist($isset);
            $this->em->flush();
        }
    }

    private function getData(){
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'http://newsapi.org/v2/top-headlines?country=ru&apiKey=9928ed4541264ae28a7917ed070d0546',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array(
                'Cookie: __cfduid=d51ec784757458444a959ab8c74f80e131607014908'
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        $response  = json_decode($response,TRUE);
        return $response['articles'];
    }

}