<?php

namespace App\Console\Commands;

use App\Repositories\ArticleRepository;
use App\Services\Parsers\ArticlesSave;
use App\Services\Parsers\NersParser;
use Illuminate\Console\Command;
use App\Services\Parsers\ParserInterface;

class ParserNers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'parser:ners';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Parser news from http://ners.ru/rss';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @param NersParser   $nersParser
     * @param ArticlesSave $articlesSave
     *
     * @throws \Exception
     */
    public function handle(ParserInterface $nersParser, ArticlesSave $articlesSave, ArticleRepository $aRep)
    {
        $lastArticle = $aRep->getArticlesForParsingNews($articlesSave::CATEGORY_ALIAS);
        $date        = $lastArticle ? $lastArticle->created_at : new \DateTime('2000');
        $data        = $nersParser->getLast($date);
        $articlesSave->saveHandler($data);
    }
}
