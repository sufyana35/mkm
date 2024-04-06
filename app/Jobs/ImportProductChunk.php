<?php

namespace App\Jobs;

use App\Models\Product;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ImportProductChunk implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $uniqueFor = 3600;

    /**
     * Create a new job instance.
     */
    public function __construct(
		public $chunk
	) {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $this->chunk->each(function (array $row) {
            fn () => Product::updateOrCreate([
                'sku' => $row['sku'],
				'name' => $row['name'],
				'description' => $row['description'],
                'brand' => $row['brand'],
           ]);
        });
    }

    public function uniqueId(): string
    {
        return str::uuid()->toString();
    }
}
