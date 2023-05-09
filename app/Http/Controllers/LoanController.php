<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Loan;
use App\Models\User;
use App\Models\LoanCategory;

class LoanController extends Controller
{
     public function index()
    {
        $user = User::all();
        $loans = Loan::with('user')->get();
        // $interest = $this->amount * $this->interest_rate * $this->duration / 12;
        return view('loans.index', compact('loans','user'));
    }

    public function store(Request $request)
    {


        // Store the loan request in the database
        $category_id = $request->category;
        $category_details = LoanCategory::find($category_id);
        $loanCategory = $category_details->name;
        $interest_rate = $category_details->interest_rate;

        // Retrieve the amount of money requested by the user
        $loan_amount = $request->input('loan_amount');

        // Calculate the interest amount
        $interest_amount = ($loan_amount * $interest_rate)/100;

        // Calculate the total amount to be paid back by the user
        $total_amount = $loan_amount + $interest_amount;

        $loan = new Loan();
        $loan->loan_category = $loanCategory;
        $loan->user_id = auth()->user()->id;
        $loan->loan_amount = $loan_amount;
        $loan->interest_amount = $interest_amount;
        $loan->total_amount = $total_amount;
        $loan->status = 'pending';
        $loan->save();
        $loan->loanCategory()->attach($category_id);

        // Redirect the user back to the loan request form with a success message
        return redirect()->back()->with('success', 'Loan request submitted successfully.');
    } 
    public function calculateInterest(){

        $loan_category = $_POST['loan_category'];
        $loan_amount = $_POST['loan_amount'];
        $category_id =  $loan_category;
        $category_details = LoanCategory::find($category_id); 
        $interest_rate = $category_details->interest_rate;
        
        // Calculate the interest amount
        $interest_amount = ($loan_amount * $interest_rate)/100;

        // Calculate the total amount to be paid back by the user
        $total_amount = $loan_amount + $interest_amount;
        $response = array(
        'interest_amount' => $interest_amount,
        'total_amount' => $total_amount
        );
    return response()->json($response);

    }

    public function create()
    {

        $loan_categories = LoanCategory::all();
        $users = User::all();
        return view('loans.create',compact('users','loan_categories'));
    }


    public function approve(Loan $loan)
    {
        // Update the loan status to "approved"
        $loan->status = 'approved';
        $loan->save();

        // Redirect the user back to the loan requests page with a success message
        return redirect()->route('loans.requests')->with('success', 'Loan request approved successfully.');
    }

    public function reject(Loan $loan)
    {
        // Update the loan status to "rejected"
        $loan->status = 'rejected';
        $loan->save();

        // Redirect the user back to the loan requests page with a success message
        return redirect()->route('loans.index')->with('success', 'Loan request rejected successfully.');
    }


    public function show($id)
    {
        $loan = Loan::findOrFail($id);

        return view('loans.show', compact('loan'));
    }


    public function edit($id){

        $loan = Loan::find($id);
        return view('loans.edit',compact('loan'));

    }

    public function update(Request $request, $id)
    {
        $loan = Loan::findOrFail($id);
        $loan->status = $request->input('status');
        $loan->save();

        return redirect()->route('loans.show', ['id' => $loan->id]);
    }

    // public function calculateInterest()
    // {
    //     $interest = $this->principal * $this->interest_rate * $this->duration / 12;
    //     return view ('loans.index',compact('interest'));
    // }

}
