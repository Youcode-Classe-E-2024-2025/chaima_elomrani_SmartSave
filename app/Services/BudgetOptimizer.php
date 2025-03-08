<?php

namespace App\Services;

class BudgetOptimizer
{
    // Constants for the 50/30/20 rule
    const NEEDS_PERCENTAGE = 50;
    const WANTS_PERCENTAGE = 30;
    const SAVINGS_PERCENTAGE = 20;

    /**
     * Calculate budget allocation based on the 50/30/20 rule
     * @param float $totalIncome Total monthly income
     * @return array Budget allocation
     */
    public function calculateFiftyThirtyTwenty(float $totalIncome): array
    {
        return [
            'needs' => $totalIncome * (self::NEEDS_PERCENTAGE / 100),
            'wants' => $totalIncome * (self::WANTS_PERCENTAGE / 100),
            'savings' => $totalIncome * (self::SAVINGS_PERCENTAGE / 100)
        ];
    }

    /**
     * Optimize budget based on goals and priorities
     * @param float $totalIncome Total monthly income
     * @param array $goals Array of goals with amounts and deadlines
     * @param array $expenses Current expenses categorized by type
     * @return array Optimized budget allocation
     */
    public function optimizeBudget(float $totalIncome, array $goals, array $expenses): array
    {
        // Start with 50/30/20 as base allocation
        $baseAllocation = $this->calculateFiftyThirtyTwenty($totalIncome);
        
        // Calculate total monthly goal requirements
        $monthlyGoalRequirements = $this->calculateMonthlyGoalRequirements($goals);
        
        // If savings needed for goals exceed 20%, adjust wants allocation
        if ($monthlyGoalRequirements > $baseAllocation['savings']) {
            $additional = $monthlyGoalRequirements - $baseAllocation['savings'];
            $baseAllocation['wants'] = max(0, $baseAllocation['wants'] - $additional);
            $baseAllocation['savings'] = $monthlyGoalRequirements;
        }
        
        return [
            'allocation' => $baseAllocation,
            'monthly_goal_requirements' => $monthlyGoalRequirements,
            'suggestions' => $this->generateSuggestions($baseAllocation, $expenses)
        ];
    }

    /**
     * Calculate required monthly savings for all goals
     * @param array $goals Array of goals
     * @return float Total monthly savings required
     */
    private function calculateMonthlyGoalRequirements(array $goals): float
    {
        $totalMonthly = 0;
        
        foreach ($goals as $goal) {
            if (!isset($goal['target_amount'], $goal['current_amount'], $goal['target_date'])) {
                continue;
            }
            
            $remaining = $goal['target_amount'] - $goal['current_amount'];
            $monthsLeft = $this->calculateMonthsUntilDate($goal['target_date']);
            
            if ($monthsLeft > 0) {
                $totalMonthly += $remaining / $monthsLeft;
            }
        }
        
        return $totalMonthly;
    }

    /**
     * Calculate months between now and target date
     * @param string $targetDate Target date in Y-m-d format
     * @return int Number of months
     */
    private function calculateMonthsUntilDate(string $targetDate): int
    {
        $now = new \DateTime();
        $target = new \DateTime($targetDate);
        $interval = $now->diff($target);
        
        return ($interval->y * 12) + $interval->m;
    }

    /**
     * Generate budget optimization suggestions
     * @param array $allocation Current allocation
     * @param array $expenses Current expenses
     * @return array Array of suggestions
     */
    private function generateSuggestions(array $allocation, array $expenses): array
    {
        $suggestions = [];
        
        // Compare current expenses against allocation
        foreach ($expenses as $category => $amount) {
            if (isset($allocation[$category]) && $amount > $allocation[$category]) {
                $suggestions[] = sprintf(
                    "Your %s expenses (€%.2f) exceed the recommended amount (€%.2f). Consider reducing these expenses.",
                    $category,
                    $amount,
                    $allocation[$category]
                );
            }
        }
        
        return $suggestions;
    }
} 