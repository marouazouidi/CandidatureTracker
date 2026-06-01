<?php

namespace App\Http\Controllers;

use App\Http\Requests\CandidatureStoreRequest;
use App\Http\Requests\CandidatureUpdateRequest;
use App\Models\Candidature;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;

class CandidatureController extends Controller
{
    use AuthorizesRequests;
    public function index(Request $request)
    {
        $this->authorize('viewAny', Candidature::class);

        $query = Candidature::where('user_id', Auth::id())
            ->whereNull('deleted_at');

        if ($request->search) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('company_name', 'like', "%{$search}%")
                  ->orWhere('poste_title', 'like', "%{$search}%");
            });
        }

        if ($request->status) {
            $query->where('status', $request->status);
        }

        if ($request->priority) {
            $query->where('priority', $request->priority);
        }

        $sortField = $request->sort ?? 'created_at';
        $sortDir = $request->direction ?? 'desc';
        $allowed = ['company_name', 'date', 'created_at', 'status', 'priority'];
        if (in_array($sortField, $allowed)) {
            $query->orderBy($sortField, $sortDir === 'asc' ? 'asc' : 'desc');
        }

        $candidatures = $query->paginate(10)->withQueryString();

        return view('candidatures.index', compact('candidatures'));
    }

    public function create()
    {
        $this->authorize('create', Candidature::class);
        return view('candidatures.create');
    }

    public function store(CandidatureStoreRequest $request)
    {
        $this->authorize('create', Candidature::class);
        $request->user()->candidatures()->create($request->validated());

        return redirect()->route('candidatures.index');
    }

    public function show(Candidature $candidature)
    {
        $this->authorize('view', $candidature);

        $candidature->load('interviews');

        return view('candidatures.show', compact('candidature'));
    }

    public function edit(Candidature $candidature)
    {
        $this->authorize('update', $candidature);

        return view('candidatures.edit', compact('candidature'));
    }

    public function update(CandidatureUpdateRequest $request, Candidature $candidature)
    {
        $this->authorize('update', $candidature);

        $candidature->update($request->validated());

        return redirect()->route('candidatures.show', $candidature);
    }

    public function archive(Candidature $candidature)
    {
        $this->authorize('delete', $candidature);

        $candidature->delete();

        return redirect()->route('candidatures.index');
    }

    public function archives(Request $request)
    {
        $this->authorize('viewArchived', Candidature::class);

        $query = Candidature::onlyTrashed()
            ->where('user_id', Auth::id());

        if ($request->search) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('company_name', 'like', "%{$search}%")
                  ->orWhere('poste_title', 'like', "%{$search}%");
            });
        }

        if ($request->status) {
            $query->where('status', $request->status);
        }

        $candidatures = $query->latest('deleted_at')->paginate(10)->withQueryString();

        return view('candidatures.archives', compact('candidatures'));
    }

    public function restore(Candidature $candidature)
    {
        $this->authorize('restore', $candidature);

        $candidature->restore();

        return redirect()->route('candidatures.archives');
    }

    public function forceDelete(Candidature $candidature)
    {
        $this->authorize('forceDelete', $candidature);

        $candidature->forceDelete();

        return redirect()->route('candidatures.archives');
    }
}
