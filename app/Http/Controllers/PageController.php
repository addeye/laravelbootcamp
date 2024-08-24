<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class PageController extends Controller
{

    public function service(){
        return view("pages.service.index",[
            "services" => Service::all()
        ]);
    }

    public function serviceCreate(){
        return view("pages.service.add");
    }

    public function serviceDoCreate(Request $request){
        // dd("sentana teknologi");
        // dd($request->all());

        $service = new Service();
        $service->name = $request->name;
        $service->price = $request->price;
        $service->save();

        return redirect('/service');
    }


    public function serviceEdit($id){
        // dd($id);
        return view("pages.service.edit",[
            "service" => Service::find($id)
        ]);
    }

    public function serviceDoEdit(Request $request, $id){

        $service = Service::find($id);
        $service->name = $request->name;
        $service->price = $request->price;
        $service->save();

        return redirect('/service');
    }


    public function serviceDoDelete($id){
        $service = Service::find($id);
        $service->delete();
        return redirect('/service');
    }

    public function faq(){
        return view("pages.faq.index");
    }

    public function contact(){
        return view("pages.contact.index");
    }

    public function portofolio(){
        return view("pages.portofolio.index");
    }

    public function blog(){
        return view("pages.blog.index");
    }
}
