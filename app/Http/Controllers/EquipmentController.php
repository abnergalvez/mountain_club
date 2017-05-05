<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EquipmentController extends Controller
{
    public function index()
    {
        return view('admin.equipment.index')
            ->with('equipments',\App\Equipment::all())
            ->with('section','equipo');
    }


    public function store(Request $request)
    {
        if($request->photo_equipment)
        {
            $photo_name = $request->file('photo_equipment')->getClientOriginalName();
            $request->file('photo_equipment')->move( base_path() . '/public/img/equipments', $photo_name);
            $request->request->add(['photo' => $photo_name]);
        }
        else
        {
            $request->request->add(['photo' => 'sin_foto']);
        }

        \App\Equipment::create($request->all());
        return redirect('/equipments');
    }


    public function edit($id)
    {
        return view('admin.equipment.edit')
            ->with('equipment',\App\Equipment::find($id))
            ->with('section','equipo');
    }


    public function update(Request $request, $id)
    {
        if($request->photo_equipment)
        {
            $photo_name = $request->file('photo_equipment')->getClientOriginalName();
            $request->file('photo_equipment')->move( base_path() . '/public/img/equipments', $photo_name);
            $request->request->add(['photo' => $photo_name]);
        }
        else
        {
            $request->request->add(['photo' => 'sin_foto']);
        }
        \App\Equipment::find($id)->update($request->all());
        return redirect('/equipments');
    }


    public function destroy($id)
    {
        \App\Equipment::destroy($id);
        return redirect('/equipments');
    }

    public function listLendEquipments()
    {
        $equipments = \App\Equipment::all();
        $users = \App\User::all();

        $usersAssigned =  $users->filter(function ($user) {
            return $user->isAssigned();
        });

        $usersUnAssigned =  $users->filter(function ($user) {
            return !$user->isAssigned();
        });

        $equipmentsAssigned = $equipments->filter(function ($equipment) {
            return $equipment->isAssigned();
        });

        $equipmentsUnAssigned = $equipments->filter(function ($equipment) {
            return !$equipment->isAssigned();
        });

        return view('admin.equipment.lend_equipment')
            ->with('equipments_assigned',$equipmentsAssigned)
            ->with('equipments_unassigned',$equipmentsUnAssigned)
            ->with('users_assigned',$usersAssigned)
            ->with('users_unassigned',$usersUnAssigned)
            ->with('section','equipo');
    }

    public function saveLendEquipments(Request $request)
    {
        $user= \App\User::find($request->user);

        if($user->equipments)
        {
            $user->equipments()->detach();
        }

        $user->equipments()->attach($request->to);
        return redirect('/lend_equipments');
    }

    public function editLendEquipments($id)
    {
      $user = \App\User::find($id);
      $equipment_registers = $user->equipments;
      $equipments = \App\Equipment::all();
      $diff = $equipments->diff($equipment_registers);

      return view('admin.equipment.edit_lend_equipment')
          ->with('equipments_reg', $equipment_registers)
          ->with('equipments_noreg', $diff)
          ->with('user', $user)
          ->with('section', 'equipo');
    }
}
