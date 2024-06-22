<?php

namespace App\Http\Controllers;

use App\Models\Quote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuoteController extends Controller
{
    public function index()
    {
        $quotes = Quote::all();
        return view('quotes.index', compact('quotes'));
    }

    public function create()
    {
        return view('quotes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'quote' => 'required|string|max:255',
            'author' => 'nullable|string|max:255',
        ]);

        Quote::create([
            'quote' => $request->quote,
            'author' => $request->author,
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('quotes.index')->with('success', 'Quote added successfully.');
    }

    public function destroy(Quote $quote)
    {
        if (Auth::user()->is_admin) {
            $quote->delete();
            return redirect()->route('quotes.index')->with('success', 'Quote deleted successfully.');
        }

        return redirect()->route('quotes.index')->with('error', 'Unauthorized action.');
    }
}

