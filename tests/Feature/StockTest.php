<?php

namespace Tests\Feature;

use App\Models\Stock;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class StockTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_create_stock(): void
    {
        $stock = Stock::factory()->create([
            'nombre_item' => 'Antibiotico',
            'categoria' => 'Medicamentos',
        ]);

        $this->assertDatabaseHas('stock', [
            'nombre_item' => 'Antibiotico',
            'categoria' => 'Medicamentos',
        ]);
    }

    public function test_stock_has_categoria(): void
    {
        $stock = Stock::factory()->create(['categoria' => 'Alimentos']);

        $this->assertEquals('Alimentos', $stock->categoria);
    }

    public function test_stock_can_be_updated(): void
    {
        $stock = Stock::factory()->create(['nombre_item' => 'Original']);

        $stock->update(['nombre_item' => 'Actualizado']);

        $this->assertEquals('Actualizado', $stock->fresh()->nombre_item);
    }

    public function test_stock_can_be_deleted(): void
    {
        $stock = Stock::factory()->create();
        $stockId = $stock->id;

        $stock->delete();

        $this->assertDatabaseMissing('stock', ['id' => $stockId]);
    }

    public function test_stock_has_tratamientos_relationship(): void
    {
        $stock = Stock::factory()->create();
        $tratamientos = $stock->tratamientos()->count();

        $this->assertIsInt($tratamientos);
    }
}
