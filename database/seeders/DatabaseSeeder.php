<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Kategorileri Oluştur
        $cat1 = Category::firstOrCreate(
            ['slug' => 'autonomous-systems'],
            ['name' => 'Autonomous Systems', 'description' => 'LiDAR, Radar, and autonomous driving computing units.', 'is_active' => true]
        );

        $cat2 = Category::firstOrCreate(
            ['slug' => 'ev-powertrain'],
            ['name' => 'EV Powertrain', 'description' => 'Electric vehicle battery management and powertrain components.', 'is_active' => true]
        );

        $cat3 = Category::firstOrCreate(
            ['slug' => 'vehicle-identity'],
            ['name' => 'Vehicle Identity & Blockchain', 'description' => 'MOBI standard compliant vehicle ID nodes and secure data chips.', 'is_active' => true]
        );

        // 2. Ürünleri Oluştur
        $products = [
            [
                'category_id' => $cat1->id,
                'name' => 'Solid-State LiDAR Sensor V2',
                'oem_number' => 'OEM-LDR-2026',
                'price' => 1450.00,
                'stock_quantity' => 25,
                'description' => 'Next generation solid-state LiDAR with 250m range and high-resolution point cloud generation for Level 4 autonomy.'
            ],
            [
                'category_id' => $cat1->id,
                'name' => 'V2X Telematics Node',
                'oem_number' => 'OEM-V2X-5G',
                'price' => 320.50,
                'stock_quantity' => 150,
                'description' => '5G enabled Vehicle-to-Everything (V2X) communication module for smart city infrastructure integration.'
            ],
            [
                'category_id' => $cat2->id,
                'name' => 'High-Voltage BMS Controller',
                'oem_number' => 'OEM-BMS-800V',
                'price' => 890.00,
                'stock_quantity' => 40,
                'description' => 'Advanced Battery Management System for 800V architecture EV platforms. Includes predictive thermal monitoring.'
            ],
            [
                'category_id' => $cat2->id,
                'name' => 'Regenerative Braking Sensor',
                'oem_number' => 'OEM-RBS-01',
                'price' => 115.75,
                'stock_quantity' => 8, // Düşük stok uyarısını test etmek için bilerek az verdik
                'description' => 'High-precision sensor for intelligent regenerative braking energy recovery.'
            ],
            [
                'category_id' => $cat3->id,
                'name' => 'MOBI VID Blockchain Node',
                'oem_number' => 'OEM-MOBI-VID',
                'price' => 450.00,
                'stock_quantity' => 200,
                'description' => 'Hardware security module storing the Vehicle Identity (VID) securely on the decentralized ledger.'
            ],
            [
                'category_id' => $cat3->id,
                'name' => 'Predictive Maintenance IoT Hub',
                'oem_number' => 'OEM-IOT-PRED',
                'price' => 275.00,
                'stock_quantity' => 60,
                'description' => 'Edge-computing IoT hub that analyzes component wear-and-tear locally before sending alerts to the fleet manager.'
            ]
        ];

        foreach ($products as $product) {
            Product::firstOrCreate(
                ['slug' => Str::slug($product['name'])],
                array_merge($product, ['is_active' => true])
            );
        }
    }
}