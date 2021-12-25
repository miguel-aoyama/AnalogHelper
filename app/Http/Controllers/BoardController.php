<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Board;
use App\Http\Requests\BoardRequest;


class BoardController extends Controller
{
  public function __construct()
  {
    $this->authorizeResource(Board::class, 'board');
  }

  public function create(Request $request, int $id)
  {
    return view('boards.create',['id' => $id]);
  }

  public function store(BoardRequest $request, Board $board)
  {
    $board->fill($request->all());
    $board->user_id = $request->user()->id;
    $board->category_id = $request->id;
    $board->save();
    return redirect()->route('categories.show',[
      'category' => $request->id,
     ]);
  }

  public function edit(Board $board)
  {
    return view('boards.edit',['board' => $board]);
  }

  public function update(BoardRequest $request, Board $board)
  {
    $board->fill($request->all());
    $board->save();
    return redirect()->route('categories.show',[
      'category' => $request->category_id,
    ]);
  }

  public function destroy(Request $request, Board $board)
  {
    $board->delete();
    return redirect()->route('categories.show',[
      'category' => $board->category_id,
    ]);
  }

  public function clone(Request $request, Board $board)
  {
    $oldrow = Board::find($request->id);
    $newrow = $oldrow->replicate();
    $newrow->save();
    return redirect()->route('categories.show',[
      'category' => $request->category_id,
    ]);
  }
}
