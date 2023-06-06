<?php

namespace App\Charts;

use App\Models\Product;
use ArielMejiaDev\LarapexCharts\LarapexChart;
use Illuminate\Support\Collection;

class MonthlyTransactionChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\LineChart
    {
        // $product = Product::groupBy('created_at')->get();
        $total = Product::all()->count();
        // dd($product);
        // for ($i=0; $i < $total ; $i++) {
        //     $data = [
        //         $product->where('created_at',  )->count(),
        //     ];
        // }

        $label = [
            'stock 1',
            'stock 2',
            'stock 3',
            'stock 4',
            'stock 5',
            'stock 6',
        ];
        $transactions = collect([ Product::chart() ]);

        // $chart = LarapexCharts::lineChart()
        //     ->setTitle('Grafik Penjualan Harian')
        //     ->setXAxis($transactions->pluck('created_at'))
        //     ->addData('Penjualan', $transactions->pluck('total'))
        //     ->setMarkers(['size' => 5])
        //     ->setGrid(true);

        // return view('chart', compact('chart'));

        return $this->chart->lineChart()
            ->setTitle('Transaction')
            ->setSubtitle(date('m'))
            // ->addData('Physical sales', $data)
            ->addData('Digital sales', [70, 29, 85, 28, 55, 45])
            ->setColors(['#ffc63b', '#ff6384'])
            ->setXAxis($label)
            // ->setXAxis($transactions->pluck('created_at'))
            // ->addData('Penjualan', $transactions->pluck('total'))
            ->setFontColor('#ff6384')
            ->setGrid('#3F51B5', 0.1);
    }
}
