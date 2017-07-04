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

      if(!$user->equipments->isEmpty())
        {
            $equipments_tmp = [];
            $request_to = [];
            foreach ($user->equipments as $equipment)
            {
                array_push($equipments_tmp , "$equipment->id");
            }
            $tox = $request->to;
             $lengz = count($request->to);
            for($i=0; $i<$lengz; $i++)
            {
                array_push($request_to , $tox[$i]);
            }

            $equipos_antes = collect( $equipments_tmp );
            $equipos_despues = collect( $request_to );

            if($request->to)
            {
                $arr_inter = $equipos_despues->intersect($equipos_antes);

                if($arr_inter->count() > 0 )
                {

                    $arr_diff1 =$equipos_antes->diff($arr_inter);
                    $arr_diff2 = $equipos_despues->diff($arr_inter);


                    if($arr_diff1->count() > 0 )
                    {
                        foreach($arr_diff1 as $diff1)
                        {
                            $hist = new \App\HistLoan;
                            $hist->user_id = $user->id;
                            $hist->equipment_id = $diff1;
                            $hist->case = 'return';
                            $hist->save();
                        }
                    }
                    if($arr_diff2->count() > 0 )
                    {


                        foreach($arr_diff2 as $diff2)
                        {
                            $hist = new \App\HistLoan;
                            $hist->user_id = $user->id;
                            $hist->equipment_id = $diff2;
                            $hist->case = 'loan';
                            $hist->save();
                        }
                        //prestar $arr_diff2;
                    }


                }
                else
                {
                    $to = $request->to;
                    $leng = count($to);
                    for($i=0; $i<$leng; $i++)
                    {
                        $hist = new \App\HistLoan;
                        $hist->user_id = $user->id;
                        $hist->equipment_id = $to[$i];
                        $hist->case = 'loan';
                        $hist->save();
                    }


                    $leng = count($equipments_tmp);
                    for($i=0; $i<$leng; $i++)
                    {
                        $hist = new \App\HistLoan;
                        $hist->user_id = $user->id;
                        $hist->equipment_id = $equipments_tmp[$i];
                        $hist->case = 'return';
                        $hist->save();
                    }

                }



            }
            else
            {


                $leng = count($equipments_tmp);
                for($i=0; $i<$leng; $i++)
                {
                    $hist = new \App\HistLoan;
                    $hist->user_id = $user->id;
                    $hist->equipment_id = $equipments_tmp[$i];
                    $hist->case = 'return';
                    $hist->save();
                }
                // dd($equipments_tmp);
                 //devolvio todo!
            }
        }
        else
        {
            if($request->to)
            {
                $to = $request->to;
                $leng = count($to);
                for($i=0; $i<$leng; $i++)
                {
                    $hist = new \App\HistLoan;
                    $hist->user_id = $user->id;
                    $hist->equipment_id = $to[$i];
                    $hist->case = 'loan';
                    $hist->save();
                }

            }

        }

    if($user->equipments)
        {
            $user->equipments()->detach();
        }
        $user->equipments()->attach($request->to, array('return' => $request->return_date));
        return redirect('/lend_equipments');
    }

    public function listHistoryLendEquipments()
    {
        return view('admin.equipment.history_lend')->with('lend_equipments',\App\HistLoan::all());
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
