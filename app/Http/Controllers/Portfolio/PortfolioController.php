<?php

namespace App\Http\Controllers\Portfolio;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Barryvdh\DomPDF\Facade\Pdf;

class PortfolioController extends Controller
{
    const PDF_NAME = 'Quentin Boulaire, Developpeur Web Fullstack';
    const INFOS = [
        'phone' => "+33 6 77 59 32 07",
        'email' => "code.babblebot@gmail.com",
        'address' => [
            'main' => "94240 L'haÿ-Les-Roses, France",
            'complement' => "119 Rue de Chevilly",
        ],
    ];
    const SKILLS = [
        [
            'title' => 'langages',
            'content' => [
                ['HTML', 'CSS', 'PHP', 'JS', 'SQL'],
            ],
        ],
        [
            'title' => 'Environnements',
            'content' => [
                ['Windows', 'Linux'],
                ['Laragon', 'Nginx'],
                ['VSCode', 'Git/Github', 'Postman'],
            ],
        ],
        [
            'title' => 'frameworks',
            'content' => [
                ['laravel', 'vue', 'booststrap'],
            ],
        ],
        // 'librairies' => [

        // ],
        [
            'title' => 'sketch',
            'content' => [
                ['figma', 'gimp'],
            ],
        ],
    ];
    const LANGUAGES =[
        [
            'title' => 'français',
            'content'=> 'langue maternelle',
        ],
        [
            'title' => 'anglais',
            'content'=> 'Courant (TOEIC 900)',
        ],
    ];
    const INTERESTS =[
        [
            'title' => 'Sports',
            'content' => [
                ['sport en salle', 'DDR/PIU'],
            ],
        ],
        [
            'title' => 'Culture',
            'content' => [
                "Membre d'une troupe de théàtre durant 9 ans",
            ],
        ],
        [
            'title' => 'Informatique',
            'content' => [
                ['Ecriture de scripts, Création de mods'],
            ],
        ],
        [
            'title' => 'Loisirs',
            'content' => [
                ['Jeux-vidéos', 'Origami', 'Travail du cuir'],
            ],
        ],
    ];
    const EXP = [
        [
            'title' => 'Developpeur web fullstack independant',
            'dates' => [
                'start' => '2018',
                'end' => "présent",
            ],
            'missions' => [
                "écoute et analyse des besoins client",
                "Realisation de maquettes",
                "Developpement web front & back",
                "Conception de base de donnée",
                "Maintenance, correction, et évolution",
            ],
        ],
        [
            'title' => 'developpeur web fullstack',
            'dates' => [
                'start' => '2018',
                'end' => '2019'
            ],
            'company' => [
                'name' => 'OSP',
                'location' => 'Paris, France',
            ],
            'missions' => [
                "Developpement d'applications web répondant aux besoins d'ouverture de l'entreprise sur le marché numérique",
                "Conception de cahiers des charges",
                "Developpement front et back",
                "Conception et maintient de bases de données",
            ],
        ],
        [
            'title' => 'Apprenti Ingénieur projet digitaux',
            'dates' => [
                'start' => '2012',
                'end' => '2015'
            ],
            'company' => [
                'name' => 'Renault',
                'location' => 'Le Plessis-Robinson, France',
            ],
            'missions' => [
                "Développement d'une application web utilisée en interne",
                "Participation aux tests et recettes",
                "Maintenance, correction, et évolution de l'application",
            ],
        ],
    ];
    const FORMATIONS = [
        [
            'title' => 'Developpeur Web Fullstack',
            'dates' => [
                'start' => '2017',
                'end' => "2018",
            ],
            'location' => '3W Academy, Paris, France',
        ],
        [
            'title' => 'Ingénieur Généraliste, Systèmes Informatiques et Industriels',
            'dates' => [
                'start' => '2012',
                'end' => "2015",
            ],
            'location' => 'EPF Ecole Polytechnique, Sceaux, France',
        ],
        [
            'title' => 'BTS Mécanique et Automatismes Industriels',
            'dates' => [
                'start' => '2010',
                'end' => "2012",
            ],
            'location' => 'Lycée Gustave Eiffel, Cachan, France',
        ],
    ];

    public function cv(){
        return view('portfolio/cv', [
            'infos' => self::INFOS,
            'skills' => self::SKILLS,
            'languages' => self::LANGUAGES,
            'interests' => self::INTERESTS,
            'experiences' => self::EXP,
            'formations' => self::FORMATIONS,
        ]);
    }

    public function toPDF(){
        // $dompdf = new Dompdf([]);
        PDF::setOption([
            'enable_remote' => true,
            'chroot' => DIR
        ]);

        $pdf = PDF::loadHTML(self::cv()->render());
        // $pdf = $dompdf->loadView('portfolio.cv', [
        //     'infos' => self::INFOS,
        //     'skills' => self::SKILLS,
        //     'experiences' => self::EXP,
        //     'formations' => self::FORMATIONS,
        // ]);

        return $pdf->stream("pdf.pdf", array("Attachment" => false));
    }
}
