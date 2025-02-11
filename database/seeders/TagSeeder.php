<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tags = [
            'Tecnología' => 'Artículos relacionados con tecnología e innovación.',
            'Ciencia' => 'Contenido sobre descubrimientos científicos y avances.',
            'Negocios' => 'Información sobre emprendimiento y economía.',
            'Salud' => 'Temas relacionados con bienestar y medicina.',
            'Educación' => 'Recursos educativos y metodologías de enseñanza.',
            'Deportes' => 'Noticias y análisis sobre deportes y atletas.',
            'Cultura' => 'Exploración de arte, música y tradiciones.',
            'Política' => 'Análisis de eventos políticos y decisiones gubernamentales.',
            'Viajes' => 'Guías y experiencias de viaje alrededor del mundo.',
            'Entretenimiento' => 'Películas, series y tendencias culturales.'
        ];

        foreach ($tags as $name => $description) {
            Tag::create(compact('name','description'));
        }
    }
}
