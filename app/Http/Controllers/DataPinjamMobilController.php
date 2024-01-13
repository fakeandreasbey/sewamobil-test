<?php

namespace App\Http\Controllers;

use App\Models\Mobil;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Gate;
use Carbon\Carbon;

class DataPinjamMobilController extends Controller
{


    public function index()
    {
        $this->authorize('mobil crud');
        
        if(\request()->ajax()){
            $data = DB::table('pinjam_mobil')
                    ->leftJoin('users', 'users.id', '=', 'pinjam_mobil.no_member')
                    ->leftJoin('mobil', 'mobil.id', '=', 'pinjam_mobil.id_mobil')
                    ->orderBy('status_pinjam', 'ASC')
                    ->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->editColumn('total',function($row){

                    $action   = number_format($row->total_tagihan);

                    return $action;
        
                })
                ->editColumn('mobil',function($row){

                    $action   = $row->merek.' '.$row->model.' ('.$row->no_plat.')';

                    return $action;
        
                })
                ->editColumn('lama',function($row){

                    $action   = \Carbon\Carbon::parse($row->tanggal_pinjam)->format('d M Y').' s/d '.\Carbon\Carbon::parse($row->tanggal_kembali)->format('d M Y').' ('.$row->lama_sewa.' hari)';

                    return $action;
        
                })
                ->editColumn('status_pinjam',function($row){

                    if($row->status_pinjam == 0){
                        $action = '<span class="badge badge-light-dark">Selesai</span>';
                    }else{
                        $action = '<span class="badge badge-light-success">Sewa</span>';
                    }
        
                    return $action;
        
                })
                ->addColumn('fungsi', function($row){        
                    


                    if($row->status_pinjam == 1){
                        $action = '<button type="button" class="badge badge-light-warning text-start me-2 action" data-bs-toggle="popover" data-bs-container="body" data-bs-placement="top" data-bs-trigger="hover" data-bs-content="Pengembalian" data-id='.$row->id_pinjam.' data-jenis="kembali"><i class="fa-regular fa-circle-stop"></i></button>';
                    }else{
                        $action = '';
                    }

                    return $action;
                })

                ->rawColumns(['total','mobil','lama','status_pinjam','fungsi'])
                ->make(true);
        }


        return view('kembali-mobil.index');

    }



    public function riwayatPinjam()
    {
        
        if(\request()->ajax()){
            $data = DB::table('pinjam_mobil')
                    ->leftJoin('users', 'users.id', '=', 'pinjam_mobil.no_member')
                    ->leftJoin('mobil', 'mobil.id', '=', 'pinjam_mobil.id_mobil')
                    ->where('pinjam_mobil.no_member',Auth::user()->id)
                    ->orderBy('status_pinjam', 'ASC')
                    ->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->editColumn('total',function($row){

                    $action   = number_format($row->total_tagihan);

                    return $action;
        
                })
                ->editColumn('mobil',function($row){

                    $action   = $row->merek.' '.$row->model.' ('.$row->no_plat.')';

                    return $action;
        
                })
                ->editColumn('lama',function($row){

                    $action   = \Carbon\Carbon::parse($row->tanggal_pinjam)->format('d M Y').' s/d '.\Carbon\Carbon::parse($row->tanggal_kembali)->format('d M Y').' ('.$row->lama_sewa.' hari)';

                    return $action;
        
                })
                ->editColumn('status_pinjam',function($row){

                    if($row->status_pinjam == 0){
                        $action = '<span class="badge badge-light-dark">Selesai</span>';
                    }else{
                        $action = '<span class="badge badge-light-success">Sewa</span>';
                    }
        
                    return $action;
        
                })
                ->addColumn('fungsi', function($row){        
                    


                    if($row->status_pinjam == 1){
                        $action = '<button type="button" class="badge badge-light-warning text-start me-2 action" data-bs-toggle="popover" data-bs-container="body" data-bs-placement="top" data-bs-trigger="hover" data-bs-content="Pengembalian" data-id='.$row->id_pinjam.' data-jenis="kembali"><i class="fa-regular fa-circle-stop"></i></button>';
                    }else{
                        $action = '';
                    }

                    return $action;
                })

                ->rawColumns(['total','mobil','lama','status_pinjam','fungsi'])
                ->make(true);
        }


        return view('pinjam-mobil.index_riwayat');

    }





    public function kembali($id)
    {
        $this->authorize('mobil crud');         

        $mobil = DB::table('pinjam_mobil')
                ->leftJoin('users', 'users.id', '=', 'pinjam_mobil.no_member')
                ->leftJoin('mobil', 'mobil.id', '=', 'pinjam_mobil.id_mobil')
                ->where('id_pinjam', '=', $id)
                ->first();

        return view('kembali-mobil.edit', compact('mobil'));
                
    }


    public function kembaliStore(Request $request, $id)
    {
        $this->authorize('mobil crud');            

        //set status pinjam
        $kembali = ['status_pinjam'=> '0',
        ];
        DB::table('pinjam_mobil')->where('id_pinjam',$id)->update($kembali);

        //get mobil
        $mobil = DB::table('pinjam_mobil')
                ->leftJoin('users', 'users.id', '=', 'pinjam_mobil.no_member')
                ->leftJoin('mobil', 'mobil.id', '=', 'pinjam_mobil.id_mobil')
                ->where('id_pinjam', '=', $id)
                ->first();

        //set status mobil
        $stMobil = ['status_aktif'=> '1',
        ];
        DB::table('mobil')->where('id',$mobil->id_mobil)->update($stMobil);

        return response()->json([
            'status' => 'success',
            'message'=> 'Mobil dikembalikan'
        ]);
                
    }


}
