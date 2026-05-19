<?php

namespace App\Http\Controllers;

use App\Http\Requests\InterviewStoreRequest;
use App\Http\Requests\InterviewUpdateRequest;
use App\Models\Candidature;
use App\Models\Interview;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;


class InterviewController extends Controller
{
    use AuthorizesRequests;
    public function index(Candidature $candidature)
    {
        $this->authorize('viewAny', Interview::class);

        $interviews = $candidature->interviews;

        return view('interviews.index', compact('candidature', 'interviews'));
    }

    public function show(Candidature $candidature, Interview $interview)
    {
        $this->authorize('view', $interview);

        return view('interviews.show', compact('candidature', 'interview'));
    }

    public function create(Candidature $candidature)
    {
        $this->authorize('create', $candidature);

        return view('interviews.create', compact('candidature'));
    }

    public function store(InterviewStoreRequest $request, Candidature $candidature)
    {
        $this->authorize('create', $candidature);

        $candidature->interviews()->create($request->validated());

        return redirect()->route('candidatures.show', $candidature);
    }

    public function edit(Candidature $candidature, Interview $interview)
    {
        $this->authorize('update', $interview);

        return view('interviews.edit', compact('candidature', 'interview'));
    }

    public function update(InterviewUpdateRequest $request, Candidature $candidature, Interview $interview)
    {
        $this->authorize('update', $interview);

        $interview->update($request->validated());

        return redirect()->route('candidatures.show', $candidature);
    }

    public function destroy(Candidature $candidature, Interview $interview)
    {
        $this->authorize('delete', $interview);

        $interview->delete();

        return redirect()->route('candidatures.show', $candidature);
    }
}
