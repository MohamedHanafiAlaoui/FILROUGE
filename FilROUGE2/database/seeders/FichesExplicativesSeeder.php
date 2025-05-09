<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FichesExplicativesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Données génériques pour les fiches explicatives
        $fiches = [
            [
                'image' => 'https://example.com/images/guide1.jpg',
                'name' => 'Guide technique complet',
                'description' => 'Documentation détaillée pour la prise en main',
            ],
            [
                'image' => 'https://example.com/images/guide2.jpg',
                'name' => 'Manuel de procédures',
                'description' => 'Processus étape par étape',
            ],
            [
                'image' => 'https://example.com/images/guide3.jpg',
                'name' => 'Référence rapide',
                'description' => 'Aide-mémoire des principales fonctionnalités',
            ]
        ];

        // Insertion des fiches
        foreach ($fiches as $fiche) {
            $ficheId = DB::table('fiches_explicatives')->insertGetId($fiche);

            // Étapes techniques génériques
            $etapes = [
                [
                    'nameetape' => 'Phase initiale',
                    'descriptionetape' => 'Préparation des éléments nécessaires',
                    'duree_estimee' => 10,
                    'id_FichesExplicatives' => $ficheId
                ],
                [
                    'nameetape' => 'Mise en œuvre',
                    'descriptionetape' => 'Application des procédures principales',
                    'duree_estimee' => 30,
                    'id_FichesExplicatives' => $ficheId
                ],
                [
                    'nameetape' => 'Vérification',
                    'descriptionetape' => 'Contrôle des résultats obtenus',
                    'duree_estimee' => 15,
                    'id_FichesExplicatives' => $ficheId
                ]
            ];

            DB::table('etape_techniques')->insert($etapes);

            // Problèmes génériques
            $problemes = [
                [
                    'symptoms' => 'Résultat inattendu',
                    'solutions' => 'Vérifier les paramètres de configuration',
                    'id_FichesExplicatives' => $ficheId
                ],
                [
                    'symptoms' => 'Processus bloqué',
                    'solutions' => 'Consulter les logs pour identifier la cause',
                    'id_FichesExplicatives' => $ficheId
                ]
            ];

            DB::table('problems')->insert($problemes);
        }
    }
}