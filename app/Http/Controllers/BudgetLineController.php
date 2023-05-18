<?php

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Budget;
use App\Models\BudgetLine;

class BudgetLineController extends Controller
{
    public function index(Budget $budget)
    {
        $budgetLines = $budget->budgetLines;
        return view('budgetlines.index', compact('budget', 'budgetLines'));
    }

    public function create(Budget $budget)
    {
        return view('budgetlines.create', compact('budget'));
    }

    public function store(Request $request, Budget $budget)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'amount' => 'required|numeric|min:0',
        ]);

        $budgetLine = $budget->budgetLines()->create($validatedData);

        return redirect()->route('budgetlines.show', ['budget' => $budget, 'budgetline' => $budgetLine]);
    }

    public function show(Budget $budget, BudgetLine $budgetLine)
    {
        return view('budgetlines.show', compact('budget', 'budgetLine'));
    }

    public function edit(Budget $budget, BudgetLine $budgetLine)
    {
        return view('budgetlines.edit', compact('budget', 'budgetLine'));
    }

    public function update(Request $request, Budget $budget, BudgetLine $budgetLine)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'amount' => 'required|numeric|min:0',
        ]);

        $budgetLine->update($validatedData);

        return redirect()->route('budgetlines.show', ['budget' => $budget, 'budgetline' => $budgetLine]);
    }

    public function destroy(Budget $budget, BudgetLine $budgetLine)
    {
        $budgetLine->delete();

        return redirect()->route('budgetlines.index', $budget);
    }
}