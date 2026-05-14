<?php

namespace App\Http\Controllers\SupportTeam;
namespace App\Http\Controllers\SupportTeam;

use App\Http\Controllers\Controller;
use App\Models\Notice;  // આ લાઈન ખાસ હોવી જોઈએ
// use App\Helpers\Qs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
// use Illuminate\Support\Facades\Storage;

class NoticeController extends Controller
{
    public function index()
    {
        $d['notices'] = Notice::orderBy('created_at', 'desc')->get();
        return view('pages.support_team.notices.index', $d);
    }

    public function store(Request $req)
    {
        $data = $req->only(['title', 'body', 'importance']);
        $data['created_by'] = Auth::user()->id;

        if ($req->hasFile('file')) {
            $data['file'] = $req->file('file')->store('notices', 'public');
        }

        Notice::create($data);
        return back()->with('flash_success', 'Notice Created Successfully');
    }

    public function destroy($id)
    {
        Notice::find($id)->delete();
        return back()->with('flash_success', 'Notice Deleted');
    }
}