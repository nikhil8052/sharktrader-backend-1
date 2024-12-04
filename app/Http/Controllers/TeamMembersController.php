<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTeamMembersRequest;
use App\Http\Requests\UpdateTeamMembersRequest;
use App\Models\Team;
use App\Models\TeamMembers;
use Exception;
use Illuminate\Support\Facades\Auth;

class TeamMembersController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function create(UpdateTeamMembersRequest $request)
    {
        $data = $request->validated();
        $user = Auth::user();

        try {
            $team = Team::query()->where('teamName', $data['teamName'])->first();

            if (!$team) {
                return redirect()->back()->with('error', 'There is no team with this code');
            }

            if ($user->team->id == $team->id) {
                return redirect()->back()->with('error', 'You are already part of the team');
            }


            TeamMembers::create([
                'user_id' => $user->id,
                'team_id' => $team->id,
                'team_name' => $data['teamName'],
            ]);

            return redirect()->back()->with('success', 'Successfuly added you to the team');
        } catch (Exception $exception) {
            dd($exception);
            return redirect()->back()->with('error', 'Error adding you to the team');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\StoreTeamMembersRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTeamMembersRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\TeamMembers $teamMembers
     * @return \Illuminate\Http\Response
     */
    public function show(TeamMembers $teamMembers)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\TeamMembers $teamMembers
     * @return \Illuminate\Http\Response
     */
    public function edit(TeamMembers $teamMembers)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\UpdateTeamMembersRequest $request
     * @param \App\Models\TeamMembers $teamMembers
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTeamMembersRequest $request, TeamMembers $teamMembers)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\TeamMembers $teamMembers
     * @return \Illuminate\Http\Response
     */
    public function destroy(TeamMembers $teamMembers)
    {
        //
    }
}
