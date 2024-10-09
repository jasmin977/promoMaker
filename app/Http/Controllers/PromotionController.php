<?php

namespace App\Http\Controllers;

use Barryvdh\Snappy\Facades\SnappyImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Inertia\Inertia;

class PromotionController extends Controller
{
    public function generatePromotionImage(Request $request)
    {
        $request->validate([
            'product_name' => 'required|string|max:255',
            'product_mark' => 'nullable|string|max:255',
            'product_qte' => 'nullable|string|max:255',
            'decimal_price' => 'required|numeric|min:0',
            'fractional_price' => 'required|numeric|min:0',
            'decimal_old_price' => 'required|numeric|min:0',
            'fractional_old_price' => 'required|numeric|min:0',
            'percentage' => 'nullable|numeric|min:0',
            'lots' => 'nullable|numeric|min:0',
            'with_percentage' => 'boolean',
            'with_lot' => 'boolean',
            'vertical' => 'boolean',
            'free' => 'nullable|string|max:255',
            'folder_path' => 'required|string|max:255',
        ]);

        $productName = $request->input('product_name');
        $productMark = $request->input('product_mark') ?? '';
        $productQte = $request->input('product_qte') ?? '';
        $decimalPrice = $request->input('decimal_price');
        $fractionalPrice = $request->input('fractional_price');
        $decimalOldPrice = $request->input('decimal_old_price');
        $fractionalOldPrice = $request->input('fractional_old_price');
        $percentage = $request->input('percentage');
        $lots = $request->input('lots');
        $withPercentage = $request->input('with_percentage');
        $withLots = $request->input('with_lot');
        $withFree = $request->input('with_free');
        $vertical = $request->input('vertical');
        $folderPath = $request->input('folder_path');
        $free = $request->input('free');

        $oldPrice = $decimalOldPrice + $fractionalOldPrice / 1000;
        $newPrice = $decimalPrice + $fractionalPrice / 1000;

        $orientation = 'verticale';

        if (!$vertical) {
            $orientation = 'horizontale';
        }
        if ($withPercentage) {
            if (!$percentage) {
                $percentage = ceil((($oldPrice - $newPrice) / $oldPrice) * 100);
            }
            $view = $orientation . '/promotion_image_' . $orientation . '_with_percentage';
        } else if ($withLots) {
            $view = $orientation . '/promotion_image_' . $orientation . '_with_lots';
        } else if ($withFree) {
            $view = $orientation . '/promotion_image_' . $orientation . '_with_gratuite';
        } else {
            $view = $orientation . '/promotion_image_' . $orientation;
        }


        // Render the HTML view with the necessary variables
        $html = view($view, [
            'product_name' => $productName,
            'product_mark' => $productMark,
            'product_qte' => $productQte,
            'decimal_price' => $decimalPrice,
            'fractional_price' => $fractionalPrice,
            'decimal_old_price' => $decimalOldPrice,
            'fractional_old_price' => $fractionalOldPrice,
            'percentage' => $percentage,
            'lots' => $lots,
            'free' => $free

        ])->render();

        $escapedPath = str_replace('\\', '\\\\', $folderPath);

        $imagePath = $escapedPath . '\\' . $productName . '_' . time() . '.png';

        if ($vertical == true) {  // Generate the image using Snappy with A4 dimensions (210mm x 297mm)
            SnappyImage::loadHTML($html)
                ->setOption('quality', 100)
                ->setOption('width', 793)  // A4 width in pixels
                ->setOption('height', 1122) // A4 height in pixels
                ->save($imagePath);
        } else {
            SnappyImage::loadHTML($html)
                ->setOption('quality', 100)
                ->setOption('width', 1122)
                ->setOption('height', 793)
                ->save($imagePath);
        }

        // Check if image was successfully generated
        if (file_exists($imagePath)) {
            // Image generated successfully
            return back()->with('toast', [
                'message' => 'Image generated successfully!',
                'success' => true,
            ])->with('folderPath', $folderPath);
        } else {
            // Image generation failed
            return back()->with('toast', [
                'message' => 'Image generation failed. Please try again.',
                'success' => false,
            ])->with('folderPath', $folderPath);
        }
    }
}
