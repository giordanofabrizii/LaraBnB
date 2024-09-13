<?php
namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Apartment;
use Illuminate\Support\Str;

class UpdateApartmentSlugs extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'apartments:update-slugs';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Aggiorna gli slug di tutti gli appartamenti esistenti';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $apartments = Apartment::all();

        foreach ($apartments as $apartment) {
            $apartment->slug = Str::slug($apartment->name, '-') . '-' . Str::random(5);
            $apartment->save();
            $this->info('Aggiornato slug per: ' . $apartment->name);
        }

        $this->info('Tutti gli slug sono stati aggiornati.');
        return 0;
    }
}
