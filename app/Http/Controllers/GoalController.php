<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Goals;
use App\Services\BudgetOptimizer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class GoalController extends Controller
{
    protected $budgetOptimizer;

    public function __construct(BudgetOptimizer $budgetOptimizer)
    {
        $this->budgetOptimizer = $budgetOptimizer;
    }

    public function index()
    {
        $goals = Goals::with('category')->get();
        $categories = Category::all();
        
        // Calculate progress for each goal
        $goals = $goals->map(function ($goal) {
            $goal->progress = $this->calculateProgress($goal);
            return $goal;
        });
        
        return view('goals', compact('goals', 'categories'));
    }

    public function create(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required|string|max:100',
            'description' => 'required|string|max:750',
            'current_amount' => 'nullable|numeric|min:0',
            'target_amount' => 'required|numeric|min:0',
            'target_date' => 'required|date',
            'category_id' => 'required|exists:category,id',
        ]);

        $goal = Goals::create([
            'name' => $validateData['name'],
            'description' => $validateData['description'],
            'current_amount' => $validateData['current_amount'] ?? 0,
            'target_amount' => $validateData['target_amount'],
            'target_date' => $validateData['target_date'],
            'category_id' => $validateData['category_id'],
        ]);

        return redirect()->route('goals.index');
    }

    /**
     * Update goal progress by adding funds
     */
    public function addFunds(Request $request, Goals $goal)
    {
        $request->validate([
            'amount' => 'required|numeric|min:0.01',
            'funding_source' => 'required|string',
            'notes' => 'nullable|string|max:500'
        ]);

        $goal->current_amount += $request->amount;
        $goal->save();

        $progress = $this->calculateProgress($goal);

        return response()->json([
            'success' => true,
            'new_balance' => $goal->current_amount,
            'progress' => $progress
        ]);
    }

    /**
     * Calculate progress percentage for a goal
     */
    private function calculateProgress(Goals $goal): array
    {
        $percentageComplete = ($goal->current_amount / $goal->target_amount) * 100;
        
        // Calculate time-based progress
        $startDate = $goal->created_at;
        $targetDate = new \DateTime($goal->target_date);
        $now = new \DateTime();
        
        $totalDays = $startDate->diff($targetDate)->days;
        $daysElapsed = $startDate->diff($now)->days;
        
        // Fix: Calculate time progress correctly
        $timeProgress = ($daysElapsed / max(1, $totalDays)) * 100;
        
        return [
            'percentage' => min(100, round($percentageComplete, 2)),
            'time_progress' => min(100, round($timeProgress, 2)),
            'is_on_track' => $percentageComplete >= $timeProgress,
            'remaining_amount' => $goal->target_amount - $goal->current_amount,
            'days_remaining' => max(0, $totalDays - $daysElapsed)
        ];
    }

    /**
     * Get budget optimization recommendations
     */
    public function getBudgetRecommendations(Request $request)
    {
        $request->validate([
            'monthly_income' => 'required|numeric|min:0'
        ]);

        $goals = Goals::all()->toArray();
        $expenses = [
            'needs' => $request->input('needs_expenses', 0),
            'wants' => $request->input('wants_expenses', 0),
            'savings' => $request->input('savings_expenses', 0)
        ];

        $recommendations = $this->budgetOptimizer->optimizeBudget(
            $request->monthly_income,
            $goals,
            $expenses
        );

        return response()->json($recommendations);
    }

    /**
     * Export goals data in CSV format
     */
    public function exportCsv()
    {
        $goals = Goals::with('category')->get();
        
        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename=goals.csv',
            'Pragma' => 'no-cache',
            'Cache-Control' => 'must-revalidate, post-check=0, pre-check=0',
            'Expires' => '0'
        ];

        $callback = function() use ($goals) {
            $file = fopen('php://output', 'w');
            
            // Add headers
            fputcsv($file, [
                'Name',
                'Category',
                'Description',
                'Current Amount',
                'Target Amount',
                'Progress (%)',
                'Target Date',
                'Created At'
            ]);
            
            // Add data
            foreach ($goals as $goal) {
                $progress = $this->calculateProgress($goal);
                fputcsv($file, [
                    $goal->name,
                    $goal->category->name,
                    $goal->description,
                    $goal->current_amount,
                    $goal->target_amount,
                    $progress['percentage'],
                    $goal->target_date,
                    $goal->created_at->format('Y-m-d')
                ]);
            }
            
            fclose($file);
        };

        return Response::stream($callback, 200, $headers);
    }

    /**
     * Export goals data in PDF format
     */
    public function exportPdf()
    {
        $goals = Goals::with('category')->get();
        
        // Calculate progress for each goal
        $goals = $goals->map(function ($goal) {
            $goal->progress = $this->calculateProgress($goal);
            return $goal;
        });
        
        $pdf = app()->make('dompdf.wrapper');
        $pdf->loadView('exports.goals-pdf', compact('goals'));
        
        return $pdf->download('goals.pdf');
    }
}
