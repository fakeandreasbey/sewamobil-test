<?php

namespace App\Http\Controllers;

use App\Models\Mobil;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Gate;
use Carbon\Carbon;

class PinjamMobilController extends Controller
{


    public function index()
    {
        $currentDateTime = Carbon::now();
        $dateNow   = \Carbon\Carbon::parse($currentDateTime)->format('Y-m-d');

        return view('pinjam-mobil.index', compact('dateNow'));

    }

    public function comboBox(Request $request)
    {

        $search = $request->carimobil;
        
    
            if($request->carimobil == '0'){
                $mobil = DB::table('mobil')->orderby('merek','asc')->select('id','merek','model','no_plat','tarif')->get();
            }else{
                $mobil = DB::table('mobil')->orderby('merek','asc')->select('id','merek','model','no_plat','tarif')
                ->where('merek','LIKE','%'.$request->search.'%')
                ->orWhere('model','LIKE','%'.$request->search.'%')
                ->where('status_aktif','1')
                ->get();
            }

            $response = array();
            foreach($mobil as $item){
                $response[] = array(
                    "id"=>$item->id,
                    "text"=>$item->merek.' '.$item->model.' - Tarif sewa: Rp. '.number_format($item->tarif).'/hari'
                );
            }

            return response()->json($response);
            

    }



    public function getLamaTotal(Request $request)
    {
        //get lama pinjam
        $tanggalAwal = Carbon::parse($request->tanggal_pinjam);
        $tanggalAkhir = Carbon::parse($request->id);

        $lama = $tanggalAwal->diffInDays($tanggalAkhir);

        //get mobil
        $mobil = DB::table('mobil')->select('tarif') ->where('id',$request->id_mobil)->first();
        $total = $lama * $mobil->tarif;

        $keterangan = $lama. 'hari x '.number_format($mobil->tarif).' = '.number_format($total);

        return view('pinjam-mobil.lama_total', compact('lama','total','keterangan'));
        
    }





    public function store(Request $request)
    {
        //get data mobil
        $mobil = DB::table('mobil')->select('tarif') ->where('id',$request->carimobil)->first();

        //insert pinjam mobil
        DB::table('pinjam_mobil')->insert([
            'no_member'       => Auth::user()->id,
            'id_mobil'        => $request->carimobil,
            'tarif_sewa'      => $mobil->tarif,
            'lama_sewa'       => $request->lama_sewa,
            'tanggal_pinjam'  => $request->tanggal_pinjam,
            'tanggal_kembali' => $request->tanggal_kembali,
            'total_tagihan'   => $request->total_tagihan,

        ]);

        //ganti status mobil
        $stPinjam = ['status_aktif'=> '0',
        ];
        DB::table('mobil')->where('id',$request->carimobil)->update($stPinjam);


        return response()->json([
            'status' => 'success',
            'message'=> 'Pinjam berhasil'
        ]);

    }

  




}
