<?php

namespace App\Http\Controllers;
use App\Models\kayitModel;
use App\Models\adresModel;
use App\Models\adrestipModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class kayitController extends Controller
{
   public function Index(){
       $kayit = kayitModel::select()->get();

       return view('kisi' , ['kayit'=>$kayit]);
   }
    public function adres($tc){
        $adres = adresModel::select()->join('adrestip', 'adrestip.adrestipid', '=', 'adres.adrestipid')->where('tc',$tc)->get();
        $adrestipi = adrestipModel::select()->get();

        return view('adres' ,
            ['adres' => $adres
            ,'adrestip' => $adrestipi
            ,'tc'=> $tc]);
    }


    public function formKaydet(Request $request){
        $insert = new kayitModel();
        $insert->tc = $request->tc;
        $insert->ad = $request->ad;
        $insert->soyad = $request->soyad;
        $insert->tel = $request->tel;
        $insert->save();
        return  [
            'ad' => $insert->ad
            ,'soyad' => $insert->soyad
            ,'tc' => $insert->tc
            ,'tel' => $insert->tel
        ];
    }

    public function veriSil($tc){
       $addresses =  adresModel::where('tc', $tc);
       if($addresses->exists()) {
           $deleteAddresses = $addresses->delete();
       }
        $kayitModel = kayitModel::find($tc)->delete();
       if($kayitModel == 1) {
           if($addresses->exists() && $deleteAddresses != 1) return false;
           return true;
       }
       else return false;
    }

    public function guncelle(Request $request){
        $insert = kayitModel::find($request->tc);
        $insert->ad = $request->ad;
        $insert->soyad = $request->soyad;
        $insert->tel = $request->tel;
        $insert->save();
        return self::Index();
    }

    function guncellen($tc)
    {
        $guncelle = kayitModel::find($tc);
        return view("guncelle", [ "guncelle" => $guncelle ]);
    }
    public function adresekle(Request $request){
         $adresekle = new adresModel();
        $adresekle->adrestipid = $request->adrestipi;
        $adresekle->adresaciklama = $request->adresaciklama;
        $adresekle->tc = $request->tc;
        $adresekle->save();
        return  [
            'adresaciklama' => $adresekle->adresaciklama
            ,'adresid' => $adresekle->adresid
            ,'adrestipid' => $adresekle->adrestipid
            ,'adrestip' => adrestipModel::select('adrestip')->where('adrestipid', $adresekle->adrestipid)->first()->adrestip
            ,'tc' => $adresekle->tc
        ];
    }

}
