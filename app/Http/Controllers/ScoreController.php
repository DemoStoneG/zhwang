<?php

namespace App\Http\Controllers;

use App\Models\Scorename;
use Illuminate\Http\Request;

class ScoreController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->input('keyword');
        $sortBy = $request->input('sort_by', 'name');
        $sortOrder = $request->input('sort_order', 'asc');

        $query = Scorename::query();

        if ($keyword) {
            $query->where('name', 'like', "%{$keyword}%");
        }

        if (in_array($sortBy, ['name', 'score']) && in_array($sortOrder, ['asc', 'desc'])) {
            $query->orderBy($sortBy, $sortOrder);
        }

        $scores = $query->paginate(8);

        return view('scores.index', compact('scores', 'keyword', 'sortBy', 'sortOrder'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'score' => 'required|numeric',
        ]);

        Scorename::create($validated);

        return redirect('/scores')->with('success', '添加成功');
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'score' => 'required|numeric',
        ]);

        $score = Scorename::findOrFail($id);
        $score->update($validated);

        return redirect('/scores')->with('success', '更新成功');
    }

    public function destroy($id)
    {
        $score = Scorename::findOrFail($id);
        $score->delete();

        return redirect('/scores')->with('success', '删除成功');
    }
}
