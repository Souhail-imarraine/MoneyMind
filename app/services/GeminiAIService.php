<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class GeminiAIService
{
    protected $apiKey;

    public function __construct()
    {
        $this->apiKey = "AIzaSyDJQPxXpnx8z0-ap12fnVv9Mr1sMrrP4Ik";
    }

    public function getAdvice($userData)
    {
        try {
            $prompt = "En tant que conseiller financier, analysez ces informations:\n\n"
                   . "- Nom: {$userData['name']}\n"
                   . "- Revenu mensuel: {$userData['income']} DH\n"
                   . "- Dépenses ce mois: {$userData['expenses']} DH\n\n"
                   . "Donnez un conseil financier personnalisé en français en une phrase.";

            $response = Http::post('https://generativelanguage.googleapis.com/v1beta/models/gemini-2.0-flash:generateContent?key=' . $this->apiKey, [
                'contents' => [
                    [
                        'parts' => [
                            ['text' => $prompt]
                        ]
                    ]
                ]
            ]);

            if ($response->successful()) {
                return $response['candidates'][0]['content']['parts'][0]['text'];
            }

            return "Analyse de vos données en cours...";

        } catch (\Exception $e) {
            return "Conseil temporairement indisponible.";
        }
    }
}
