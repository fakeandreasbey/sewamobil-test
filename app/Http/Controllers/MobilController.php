<?php

namespace App\Http\Controllers;

use App\Models\Mobil;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Gate;
use Carbon\Carbon;

class MobilController extends Controller
{


    public function index()
    {
        $this->authorize('mobil crud');
        
        if(\request()->ajax()){
            $data = DB::table('mobil')
                    ->orderBy('merek', 'ASC')
                    ->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->editColumn('tarif',function($row){

                    $action   = number_format($row->tarif);

                    return $action;
        
                })
                ->editColumn('status_aktif',function($row){

                    if($row->status_aktif == 0){
                        $action = '<span class="badge badge-light-dark">Tidak Aktif</span>';
                    }else{
                        $action = '<span class="badge badge-light-success">Aktif</span>';
                    }
        
                    return $action;
        
                })
                ->addColumn('fungsi', function($row){        
                    
                    $action = '<button type="button" class="badge badge-light-warning text-start me-2 action" data-bs-toggle="popover" data-bs-container="body" data-bs-placement="top" data-bs-trigger="hover" data-bs-content="Ubah" data-id='.$row->id.' data-jenis="update"><i class="fa-solid fa-pen-to-square"></i></button>';
                    $action .= ' <button type="button" class="badge badge-light-danger text-start me-2 action" data-bs-toggle="popover" data-bs-container="body" data-bs-placement="top" data-bs-trigger="hover" data-bs-content="Hapus" data-id='.$row->id.' data-jenis="delete"><i class="fa-solid fa-xmark"></i></button>';
                    
                    
                    return $action;
                })

                ->rawColumns(['tarif','status_aktif','fungsi'])
                ->make(true);
        }


        return view('mobil.index');

    }



    public function indexMobilMember()
    {
        
        if(\request()->ajax()){
            $data = DB::table('mobil')
                    ->orderBy('merek', 'ASC')
                    ->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->editColumn('tarif',function($row){

                    $action   = number_format($row->tarif);

                    return $action;
        
                })
                ->editColumn('status_aktif',function($row){

                    if($row->status_aktif == 0){
                        $action = '<span class="badge badge-light-dark">Tidak Tersedia</span>';
                    }else{
                        $action = '<span class="badge badge-light-success">Tersedia</span>';
                    }
        
                    return $action;
        
                })

                ->rawColumns(['tarif','status_aktif'])
                ->make(true);
        }


        return view('mobil.index_member');

    }


    public function create()
    {
        $this->authorize('mobil crud');

        return view('mobil.edit', ['mobil' => new Mobil()]);
    }


    public function store(Request $request)
    {
        $this->authorize('mobil crud');

        DB::table('mobil')->insert([
            'merek'       => $request->merek,
            'model'       => $request->model,
            'no_plat'     => $request->no_plat,
            'tarif'       => $request->tarif,
            'status_aktif'=> $request->status_aktif,

        ]);


        return response()->json([
            'status' => 'success',
            'message'=> 'Mobil diinput'
        ]);

    }

    public function edit($id)
    {
        $this->authorize('mobil crud');         

        $mobil = DB::table('mobil')->where('id', '=', $id)->first();

        return view('mobil.edit', compact('mobil'));
                
    }


    public function update(Request $request, $id)
    {
        $this->authorize('mobil crud');            

        $mobil = ['merek'       => $request->merek,
                  'model'       => $request->model,
                  'no_plat'     => $request->no_plat,
                  'tarif'       => $request->tarif,
                  'status_aktif'=> $request->status_aktif,
        ];
        DB::table('mobil')->where('id',$id)->update($mobil);

        return response()->json([
            'status' => 'success',
            'message'=> 'Mobil diperbaharui'
        ]);
                
    }

    public function destroy($id)
    {
        $this->authorize('mobil crud');            

        DB::table('mobil')->where('id', '=', $id)->delete();

        return response()->json([
            'status' => 'success',
            'message'=> 'Mobil dihapus'
        ]);
    }


}
