<?php

namespace App\Http\Controllers\backend;
use App\AdvenScrollImg;
use App\Adventure;
use App\AdventureItenerary;
use App\AdventureTripDetail;
use App\Affiliation;
use App\Airline;
use App\AssociatedCompany;
use App\BranchOffice;
use App\ChairmanMessage;
use App\CompanyDetail;
use App\DayTour;
use App\DaytourItenerary;
use App\DaytourScrollImg;
use App\DayTripDetail;
use App\DirectorMessage;
use App\Gallery;
use App\Http\Controllers\Controller;
use App\IndiaItenerary;
use App\IndiaScrollImg;
use App\IndiaTour;
use App\IndiaTripDetail;
use App\Introduction;
use App\OurCompany;
use App\Seo;
use App\Slider;
use App\SocialSite;
use App\Testimonial;
use App\Ticketing;
use App\Tour;
use App\TourImgScroll;
use App\TourItenerary;
use App\TourTripDetail;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;

class pagesController extends Controller
{
    public function settings(){
        $datas=CompanyDetail::all();
        $branch=BranchOffice::all();
        $seo=Seo::all();
        $social=SocialSite::all();
        return view('backend.pages.settings',compact('datas','branch','seo','social'));
    }

    public function companydetail_action(Request $request){
        $id=(int)$request->id;
        $data=CompanyDetail::find($id);
        if(Input::hasFile('logo')){
            $file=input::file('logo');
            $filename=time().'.'.$file->getClientOriginalName();
            $file->move(public_path().'/backend/images/companylogos/',$filename);
            $data->company_logo=$filename;
        }

        if(Input::hasFile('celebration')){
            $file=input::file('celebration');
            $filename=time().'.'.$file->getClientOriginalName();
            $file->move(public_path().'/backend/images/companylogos/',$filename);
            $data->celebration_logo=$filename;
        }

        $data->slogan=$request->slogan;
        $data->name=$request->name;
        $data->address=$request->address;
        $data->mail1=$request->email1;
        $data->mail2=$request->email2;
        $data->phone=$request->phone;
        $data->save();
        return redirect()->back()->with('success','updated successfully!!!');
    }

    public function branch_action(Request $request){
        $id=$request->id;
        $data=BranchOffice::find($id);
        $data->office_type=$request->type;
        $data->address=$request->address;
        $data->phone=$request->phone;
        $data->map=$request->map;
        $data->mail=$request->email;
        $data->save();
        return redirect()->back()->with('success','updated successfully!!!');
    }

    public function branch_add(Request $request){
        $datas=new BranchOffice;
        $datas->office_type=$request->type;
        $datas->address=$request->address;
        $datas->phone=$request->phone;
        $datas->map=$request->map;
        $datas->mail=$request->email;
        $datas->save();
        return redirect('/dashboard/settings')->with('success','added successfully!!!');
    }

    public function associates_add(Request $request){
        $datas=new AssociatedCompany;
        $datas->company_name=$request->name;
        $datas->save();
        return redirect('/dashboard/settings')->with('success','added successfully!!!');
    }

    public function associates_del(Request $request){
        $id=(int)$request->id;
        $data=AssociatedCompany::find($id);
        $data->delete();
        return redirect('/dashboard/settings')->with('success','deleted successfully!!!');
    }

    public function social_action(Request $request){
        $id=(int)$request->id;
        $datas=SocialSite::find($id);
        $datas->facebook=$request->facebook;
        $datas->twitter=$request->twitter;
        $datas->instagram=$request->instagram;
        $datas->linkedin=$request->linkedin;
        $datas->google=$request->google;
        $datas->save();
        return redirect('/dashboard/settings')->with('success','updated successfully!!!');
    }

    public function seo_action(Request $request){
        $id=(int)$request->id;
        $data=Seo::find($id);
        $data->title=$request->title;
        $data->keywords=$request->keywords;
        $data->author=$request->author;
        $data->description=$request->description;
        $data->save();
        return redirect()->back()->with('success','updated successfully!!!');

    }

    /*///////////////////tour///////////////////////////////*/
    public function tour(){
        $tour=Tour::all();
        return view('backend.pages.tour',compact('tour'));
    }

    public function tour_action(Request $request){
        $datas=new Tour;
        $request->validate(['slug'=>'unique:tours']);
        if(input::hasFile('image')){
            $file=input::file('image');
            $filename=time().'.'.$file->getClientOriginalName();
            $file->move(public_path().'/backend/images/tour/',$filename);
            $datas->image=$filename;
        }
        $datas->title=$request->title;
        $datas->package=$request->package;
        $datas->overview=$request->overview;
        $datas->slug=$request->slug;
        $datas->discount=$request->discount;
        $datas->save();


        $tourid=$datas['id'];
        if(input::hasFile('scroll_image')){
            foreach ($request->scroll_image as $file) {
                $filename=$file->getClientOriginalName();
                $file->storeAs('/public/backend/images/tour/',$filename);
                $file->move(public_path().'/backend/images/tour/',$filename);
                $data=new TourImgScroll;
                $data->image=$filename;
                $data->Tour_id=$tourid;
                $data->save();
            }
        }

        $ite=new TourItenerary;
        $ite->Tour_id=$tourid;
        $ite->itenerary=$request->itenerary;
        $ite->save();
        if(input::has('next_itenerary')){
            foreach ($request->next_itenerary as $itenerary) {
                $dat=new TourItenerary;
                $dat->Tour_id=$tourid;
                $dat->itenerary=$itenerary;
                $dat->save();
            }
        }

        $trip=new TourTripDetail;
        $trip->Tour_id=$tourid;
        $trip->trip_details=$request->trip_detail;
        $trip->save();
        return redirect('/dashboard/tour')->with('success','added successfully!!!');

    }

    public function tour_edit(Request $request){
        $id=(int)$request->id;
        $datas=Tour::where('id',$id)->first();
        return view('backend.pages.tour-edit',compact('datas'));
    }

    public function touredit_action(Request $request){
        $id=(int)$request->id;
        $datas=Tour::find($id);
        if(Input::hasFile('image')){
            $file=input::file('image');
            $filename=time().'.'.$file->getClientOriginalName();
            $file->move(public_path().'/backend/images/tour',$filename);
            $datas->image=$filename;
        }
        $datas->title=$request->title;
        $datas->package=$request->package;
        $datas->overview=$request->overview;
        $datas->slug=$request->slug;
        $datas->status=$request->status;
        $datas->discount=$request->discount;
        $datas->save();

        $tourid = $datas['id'];

        if ($request->hasFile('scroll_image')) {
            foreach ($request->scroll_image as $file) {
                $filename = $file->getClientOriginalName();
                $file->storeAs('public/backend/images/tour/', $filename);
                $file->move(public_path() . '/backend/images/tour/', $file->getClientOriginalName());
                $data = new TourImgScroll;
                $data->image = $filename;
                $data->Tour_id = $tourid;
                $data->save();
            }
        }


        return redirect()->back()->with('success','updated successfully!!!');
    }

    public function tourtripedit_action(Request $request){
        $id=(int)$request->id;
        $trip=TourTripDetail::find($id);
        $trip->trip_details=$request->trip_detail;
        $trip->save();
        return redirect()->back()->with('success','updated successfully!!!');
    }

    public function tourscroll_del(Request $request){
        $id=(int)$request->id;
        $data=TourImgScroll::find($id);
        $data->delete();
        return redirect()->back()->with('success','deleted successfully!!!');
    }

    public function tour_del(Request $request){
        $id=(int)$request->id;
        $data=Tour::find($id);
        $data->delete();
        return redirect()->back()->with('success','deleted successfully!!!');
    }

    public function touritenerary_del(Request $request){
        $id=(int)$request->id;
        $data=TourItenerary::find($id);
        $data->delete();
        return redirect()->back()->with('success','deleted successfully!!!');
    }

    public function touriteedit_action(Request $request){
        $id=(int)$request->id;
        $data=TourItenerary::find($id);
        $data->itenerary=$request->next_itenerary;
        $data->save();
        return redirect()->back()->with('success','updated successfully!!!');
    }

    public function tourset(Request $request){
        $id=(int)$request->id;
        $datas=Tour::find($id);
        $datas->image=$request->img;
        $datas->save();
        return redirect()->back()->with('success','set successfully!!!');
    }

    /*------------------///day tour///--------------*/
    public function day_tour(){
        $day=DayTour::all();
        return view('backend.pages.day-tour',compact('day'));
    }

    public function daytour_action(Request $request){
        $datas=new DayTour;
        $request->validate(['slug'=>'unique:day_tours']);
        if(input::hasFile('image')){
            $file=input::file('image');
            $filename=time().'.'.$file->getClientOriginalName();
            $file->move(public_path().'/backend/images/daytour',$filename);
            $datas->image=$filename;
        }
        $datas->title=$request->title;
        $datas->package=$request->package;
        $datas->overview=$request->overview;
        $datas->slug=$request->slug;
        $datas->discount=$request->discount;
        $datas->save();

        $tourid=$datas['id'];
        if(input::hasFile('scroll_image')){
            foreach ($request->scroll_image as $file) {
                $filename=$file->getClientOriginalName();
                $file->storeAs('/public/backend/images/daytour/',$filename);
                $file->move(public_path().'/backend/images/daytour/',$filename);
                $data=new DaytourScrollImg;
                $data->image=$filename;
                $data->DayTour_id=$tourid;
                $data->save();
            }
        }

        $ite=new DaytourItenerary;
        $ite->DayTour_id=$tourid;
        $ite->itenerary=$request->itenerary;
        $ite->save();
if(input::has('next_itenerary')){
    foreach ($request->next_itenerary as $itenerary) {
        $dat=new DaytourItenerary;
        $dat->DayTour_id=$tourid;
        $dat->itenerary=$itenerary;
        $dat->save();
    }
}

        $trip=new DayTripDetail;
        $trip->DayTour_id=$tourid;
        $trip->trip_details=$request->trip_detail;
        $trip->save();
return redirect('/dashboard/day-tour')->with('success','added successfully!!!');

    }

    public function daytour_edit(Request $request){
        $id=(int)$request->id;
        $datas=DayTour::where('id',$id)->first();
        return view('backend.pages.day-tour-edit',compact('datas'));
    }

    public function daytouredit_action(Request $request){
        $id=(int)$request->id;
        $datas=DayTour::find($id);
        if(Input::hasFile('image')){
            $file=input::file('image');
            $filename=time().'.'.$file->getClientOriginalName();
            $file->move(public_path().'/backend/images/daytour',$filename);
            $datas->image=$filename;
        }
        $datas->title=$request->title;
        $datas->package=$request->package;
        $datas->overview=$request->overview;
        $datas->status=$request->status;
        $datas->discount=$request->discount;
        $datas->save();

        $tourid = $datas['id'];

        if ($request->hasFile('scroll_image')) {
            foreach ($request->scroll_image as $file) {
                $filename = $file->getClientOriginalName();
                $file->storeAs('public/backend/images/daytour/', $filename);
                $file->move(public_path() . '/backend/images/daytour/', $file->getClientOriginalName());
                $data = new DaytourScrollImg;
                $data->image = $filename;
                $data->Tour_id = $tourid;
                $data->save();
            }
        }
        return redirect()->back()->with('success','updated successfully!!!');
    }

    public function daytouriteedit_action(Request $request){
        $id=(int)$request->id;
        $data=DaytourItenerary::find($id);
        $data->itenerary=$request->next_itenerary;
        $data->save();
        return redirect()->back()->with('success','updated successfully!!!');

    }

    public function daytripedit_action(Request $request){
        $id=(int)$request->id;
        $trip=DayTripDetail::find($id);
        $trip->trip_details=$request->trip_detail;
        $trip->save();
        return redirect()->back()->with('success','updated successfully!!!');
    }

    public function daytourscroll_del(Request $request){
        $id=(int)$request->id;
        $data=DaytourScrollImg::find($id);
        $data->delete();
        return redirect()->back()->with('success','deleted successfully!!!');
    }

    public function daytouritenerary_del(Request $request){
        $id=(int)$request->id;
        $data=DaytourItenerary::find($id);
        $data->delete();
        return redirect()->back()->with('success','deleted successfully!!!');
    }

    public function daytour_del(Request $request){
        $id=(int)$request->id;
        $data=DayTour::find($id);
        $data->delete();
        return redirect()->back()->with('success','deleted successfully!!!');
    }

    public function daytourset(Request $request){
        $id=(int)$request->id;
        $datas=DayTour::find($id);
        $datas->image=$request->img;
        $datas->save();
        return redirect()->back()->with('success','set successfully!!!');
    }

    /*//////////////adventure////////////////*/
    public function adventure(){
        $adven=Adventure::all();
        return view('backend.pages.adventure',compact('adven'));
    }

    public function adventure_action(Request $request){
        $datas=new Adventure;
        $request->validate(['slug'=>'unique:adventures']);
        if(input::hasFile('image')){
            $file=input::file('image');
            $filename=time().'.'.$file->getClientOriginalName();
            $file->move(public_path().'/backend/images/adventure',$filename);
            $datas->image=$filename;
        }
        $datas->title=$request->title;
        $datas->package=$request->package;
        $datas->overview=$request->overview;
        $datas->slug=$request->slug;
        $datas->discount=$request->discount;
        $datas->save();

        $tourid=$datas['id'];
        if(input::hasFile('scroll_image')){
            foreach ($request->scroll_image as $file) {
                $filename=$file->getClientOriginalName();
                $file->storeAs('/public/backend/images/adventure/',$filename);
                $file->move(public_path().'/backend/images/adventure/',$filename);
                $data=new AdvenScrollImg;
                $data->image=$filename;
                $data->Adventure_id=$tourid;
                $data->save();
            }
        }

        $ite=new AdventureItenerary;
        $ite->Adventure_id=$tourid;
        $ite->itenerary=$request->itenerary;
        $ite->save();
        if(input::has('next_itenerary')){
            foreach ($request->next_itenerary as $itenerary) {
                $dat=new AdventureItenerary;
                $dat->Adventure_id=$tourid;
                $dat->itenerary=$itenerary;
                $dat->save();
            }
        }

        $trip=new AdventureTripDetail();
        $trip->Adventure_id=$tourid;
        $trip->trip_details=$request->trip_detail;
        $trip->save();

        return redirect('/dashboard/adventure')->with('success','added successfully!!!');
    }

    public function adventure_del(Request $request){
        $id=(int)$request->id;
        $data=Adventure::find($id);
        $data->delete();

       /* $ite=Adventure::find($id)->advenscrollimg;
        return $ite;*/

        return redirect()->back()->with('success','deleted successfully!!!');
    }

    public function adventure_edit(Request $request){
        $id=(int)$request->id;
        $datas=Adventure::where('id',$id)->first();
        return view('backend.pages.adventure-edit',compact('datas'));
    }

    public function adventureedit_action(Request $request){
        $id=(int)$request->id;
        $datas=Adventure::find($id);
        if(Input::hasFile('image')){
            $file=input::file('image');
            $filename=time().'.'.$file->getClientOriginalName();
            $file->move(public_path().'/backend/images/adventure',$filename);
            $datas->image=$filename;
        }
        $datas->title=$request->title;
        $datas->package=$request->package;
        $datas->overview=$request->overview;
        $datas->status=$request->status;
        $datas->discount=$request->discount;
        $datas->save();

        $tourid = $datas['id'];

        if ($request->hasFile('scroll_image')) {
            foreach ($request->scroll_image as $file) {
                $filename = $file->getClientOriginalName();
                $file->storeAs('public/backend/images/adventure/', $filename);
                $file->move(public_path() . '/backend/images/adventure/', $file->getClientOriginalName());
                $data = new AdvenScrollImg;
                $data->image = $filename;
                $data->Adventure_id = $tourid;
                $data->save();
            }
        }
        return redirect()->back()->with('success','updated successfully!!!');
    }

    public function adveniteedit_action(Request $request){
        $id=(int)$request->id;
        $data=AdventureItenerary::find($id);
        $data->itenerary=$request->next_itenerary;
        $data->save();
        return redirect()->back()->with('success','updated successfully!!!');
    }

    public function advenitenerary_del(Request $request){
        $id=(int)$request->id;
        $data=AdventureItenerary::find($id);
        $data->delete();
        return redirect()->back()->with('success','deleted successfully!!!');
    }

    public function advenscroll_del(Request $request){
        $id=(int)$request->id;
        $data=AdvenScrollImg::find($id);
        $data->delete();
        return redirect()->back()->with('success','deleted successfully!!!');
    }

    public function adventripedit_action(Request $request){
        $id=(int)$request->id;
        $trip=AdventureTripDetail::find($id);
        $trip->trip_details=$request->trip_detail;
        $trip->save();
        return redirect()->back()->with('success','updated successfully!!!');
    }

    public function advenset(Request $request){
        $id=(int)$request->id;
        $datas=Adventure::find($id);
        $datas->image=$request->img;
        $datas->save();
        return redirect()->back()->with('success','set successfully!!!');

    }


    /*////////////our company/////////////*/
    public function company(){
        $company=OurCompany::all();
        return view('backend.pages.company',compact('company'));
    }

    public function company_action(Request $request){
        $request->validate(['slug'=>'unique:our_companies']);
        $datas=new OurCompany;
        $datas->company_name=$request->name;
        if(input::hasFile('image')){
            $file=input::file('image');
            $filename=time().'.'.$file->getClientOriginalName();
            $file->move(public_path().'/backend/images/company',$filename);
            $datas->image=$filename;
        }
        $datas->detail=$request->detail;
        $datas->slug=$request->slug;
        $datas->save();
        return redirect()->back()->with('success','added successfully!!!');
    }

    public function company_edit(Request $request){
        $id=(int)$request->id;
        $datas=OurCompany::find($id);
        return view('backend.pages.company-edit',compact('datas'));
    }

    public function companyedit_action(Request $request){
        $id=(int)$request->id;
        $datas=OurCompany::find($id);
        $datas->company_name=$request->name;
        if(input::hasFile('image')){
            $file=input::file('image');
            $filename=time().'.'.$file->getClientOriginalName();
            $file->move(public_path().'/backend/images/company',$filename);
            $datas->image=$filename;
        }
        $datas->detail=$request->detail;
        $datas->slug=$request->slug;
        $datas->save();
        return redirect()->back()->with('success','updated successfully!!!');

    }

    public function company_del(Request $request){
        $id=(int)$request->id;
        $datas=OurCompany::find($id);
        $datas->delete();
        return redirect()->back()->with('success','deleted successfully!!!');
    }

    /*/////////////about us////////////////////////////*/
    public function about(){
        $intro=Introduction::all();
        $ceo=ChairmanMessage::all();
        $direc=DirectorMessage::all();
        return view('backend.pages.about',compact('intro','ceo','direc'));
    }

    public function intro_action(Request $request){
        $id=(int)$request->id;
        $datas=Introduction::find($id);
        if(input::hasFile('image')){
            $file=input::file('image');
            $filename=time().'.'.$file->getClientOriginalName();
            $file->move(public_path().'/backend/images/about',$filename);
            $datas->image=$filename;
        }
        $datas->intro=$request->intro;
        $datas->goal=$request->goal;
        $datas->why_us=$request->whyus;
        $datas->experiance_years=$request->experience;
        $datas->customers=$request->customer;
        $datas->save();
        return redirect()->back()->with('success','updated successfully!!!');
    }

    public function ceo_message(Request $request){
        $id=(int)$request->id;
        $datas=ChairmanMessage::find($id);
        if(input::hasFile('image')){
            $file=input::file('image');
            $filename=time().'.'.$file->getClientOriginalName();
            $file->move(public_path().'/backend/images/about',$filename);
            $datas->image=$filename;
        }
        $datas->message=$request->message;
        $datas->save();
        return redirect()->back()->with('success','updated successfully!!!');
    }

    public function direc_message(Request $request){
        $id=(int)$request->id;
        $datas=DirectorMessage::find($id);
        if(input::hasFile('image')){
            $file=input::file('image');
            $filename=time().'.'.$file->getClientOriginalName();
            $file->move(public_path().'/backend/images/about',$filename);
            $datas->image=$filename;
        }
        $datas->message=$request->message;
        $datas->save();
        return redirect()->back()->with('success','updated successfully!!!');
    }

    /*///////////////airlines///////////////*/
    public function airlines(){
        $air=Airline::all();
        return view('backend.pages.airlines',compact('air'));
    }

    public function airlines_action(Request $request){
        if ($request->hasFile('scroll_image')) {
            foreach ($request->scroll_image as $file) {
                $filename = $file->getClientOriginalName();
                $file->storeAs('public/backend/images/airline/', $filename);
                $file->move(public_path() . '/backend/images/airline/', $file->getClientOriginalName());
                $data = new Airline;
                $data->image = $filename;
                $data->save();
            }
        }
        return redirect()->back()->with('success','added successfully!!!');
    }

    public function airline_del(Request $request){
        $id=(int)$request->id;
        $data=Airline::find($id);
        $data->delete();
        return redirect()->back()->with('success','deleted successfully!!!');
    }

    /*//////////////testimonial///////////////*/
    public function testimonial(){
        $testi=Testimonial::all();
        return view('backend.pages.testimonial',compact('testi'));
    }

    public function testimonial_action(Request $request){
        $datas=new Testimonial;
        if(input::hasFile('image')){
            $file=input::file('image');
            $filename=time().'.'.$file->getClientOriginalName();
            $file->move(public_path().'/backend/images/testimonial',$filename);
            $datas->image=$filename;
        }
        $datas->name=$request->name;
        $datas->profession=$request->profession;
        $datas->detail=$request->detail;
        $datas->save();
        return redirect('/dashboard/testimonial')->with('success','added successfully!!!');
    }

    public function testimonial_edit(Request $request){
        $id=(int)$request->id;
        $datas=Testimonial::find($id);
        return view('backend.pages.testimonial_edit',compact('datas'));
    }

    public function testimonialedit_action(Request $request){
        $id=(int)$request->id;
        $datas=Testimonial::find($id);
        if(input::hasFile('image')){
            $file=input::file('image');
            $filename=time().'.'.$file->getClientOriginalName();
            $file->move(public_path().'/backend/images/testimonial',$filename);
            $datas->image=$filename;
        }
        $datas->name=$request->name;
        $datas->profession=$request->profession;
        $datas->detail=$request->detail;
        $datas->save();
        return redirect()->back()->with('success','updated successfully!!!');
    }

    public function testimonial_del(Request $request){
        $id=(int)$request->id;
        $datas=Testimonial::find($id);
        $datas->delete();
        return redirect()->back()->with('success','deleted successfully!!!');
    }

    /*//////////india tour/////////////*/
    public function india_tour(){
        $india=IndiaTour::all();
        return view('backend.pages.india-tour',compact('india'));
    }

    public function india_action(Request $request){
        $datas=new IndiaTour;
        $request->validate(['slug'=>'unique:india_tours']);
        if(input::hasFile('image')){
            $file=input::file('image');
            $filename=time().'.'.$file->getClientOriginalName();
            $file->move(public_path().'/backend/images/india_tour',$filename);
            $datas->image=$filename;
        }
        $datas->title=$request->title;
        $datas->package=$request->package;
        $datas->overview=$request->overview;
        $datas->slug=$request->slug;
        $datas->discount=$request->discount;
        $datas->save();

        $tourid=$datas['id'];
        if(input::hasFile('scroll_image')){
            foreach ($request->scroll_image as $file) {
                $filename=$file->getClientOriginalName();
                $file->storeAs('/public/backend/images/india_tour/',$filename);
                $file->move(public_path().'/backend/images/india_tour/',$filename);
                $data=new IndiaScrollImg;
                $data->image=$filename;
                $data->IndiaTour_id=$tourid;
                $data->save();
            }
        }

        $ite=new IndiaItenerary;
        $ite->IndiaTour_id=$tourid;
        $ite->itenerary=$request->itenerary;
        $ite->save();
if(input::has('nest_itenerary')){
    foreach ($request->next_itenerary as $itenerary) {
        $dat=new IndiaItenerary;
        $dat->IndiaTour_id=$tourid;
        $dat->itenerary=$itenerary;
        $dat->save();
    }
}
        $trip=new IndiaTripDetail();
        $trip->IndiaTour_id=$tourid;
        $trip->trip_details=$request->trip_detail;
        $trip->save();
        return redirect('/dashboard/india-tour')->with('success','added successfully!!!');
    }

    public function india_edit(Request $request){
        $id=(int)$request->id;
        $datas=IndiaTour::where('id',$id)->first();
        return view('backend.pages.india_edit',compact('datas'));
    }

    public function indiaedit_action(Request $request){
        $id=(int)$request->id;
        $datas=IndiaTour::find($id);
        if(Input::hasFile('image')){
            $file=input::file('image');
            $filename=time().'.'.$file->getClientOriginalName();
            $file->move(public_path().'/backend/images/india_tour',$filename);
            $datas->image=$filename;
        }
        $datas->title=$request->title;
        $datas->package=$request->package;
        $datas->overview=$request->overview;
        $datas->status=$request->status;
        $datas->discount=$request->discount;
        $datas->save();

        $tourid = $datas['id'];

        if ($request->hasFile('scroll_image')) {
            foreach ($request->scroll_image as $file) {
                $filename = $file->getClientOriginalName();
                $file->storeAs('public/backend/images/india_tour/', $filename);
                $file->move(public_path() . '/backend/images/india_tour/', $file->getClientOriginalName());
                $data = new IndiaScrollImg;
                $data->image = $filename;
                $data->IndiaTour_id = $tourid;
                $data->save();
            }
        }
        return redirect()->back()->with('success','updated successfully!!!');
    }

    public function indiaiteedit_action(Request $request){
        $id=(int)$request->id;
        $data=IndiaItenerary::find($id);
        $data->itenerary=$request->next_itenerary;
        $data->save();
        return redirect()->back()->with('success','updated successfully!!!');
    }

    public function india_del(Request $request){
        $id=(int)$request->id;
        $data=IndiaTour::find($id);
        $data->delete();
        return redirect()->back()->with('success','deleted successfully!!!');
    }

    public function indiaitenerary_del(Request $request){
        $id=(int)$request->id;
        $data=IndiaItenerary::find($id);
        $data->delete();
        return redirect()->back()->with('success','deleted successfully!!!');
    }

    public function indiascroll_del(Request $request){
        $id=(int)$request->id;
        $data=IndiaScrollImg::find($id);
        $data->delete();
        return redirect()->back()->with('success','deleted successfully!!!');
    }

    public function indiatripedit_action(Request $request){
        $id=(int)$request->id;
        $trip=IndiaTripDetail::find($id);
        $trip->trip_details=$request->trip_detail;
        $trip->save();
        return redirect()->back()->with('success','updated successfully!!!');
    }

    public function indiaset(Request $request){
        $id=(int)$request->id;
        $datas=IndiaTour::find($id);
        $datas->image=$request->img;
        $datas->save();
        return redirect()->back()->with('success','set successfully!!!');
    }

    /*//////////////ticketing////////////////*/
    public function ticketing(){
        $ticket=Ticketing::all();
        return view('backend.pages.ticketing',compact('ticket'));
    }

    public function ticketing_action(Request $request){
        $id=(int)$request->id;
        $data=Ticketing::find($id);
        if(input::hasFile('image')){
            $file=input::file('image');
            $filename=time().'.'.$file->getClientOriginalName();
            $file->move(public_path().'/backend/images/ticketing/',$filename);
            $data->image=$filename;
        }
        $data->detail=$request->detail;
        $data->save();
        return redirect()->back()->with('success','updated successfully!!!');
    }

    /*//////////////////gallery/////////////////////*/
    public function gallery(){
        $datas=Gallery::all();
        return view('backend.pages.gallery',compact('datas'));
    }

    public function gallery_action(Request $request){

        if(input::hasFile('scroll_image')){
            foreach ($request->scroll_image as $file) {
                $filename=$file->getClientOriginalName();
                $file->storeAs('/public/backend/images/gallery/',$filename);
                $file->move(public_path().'/backend/images/gallery/',$filename);
                $data=new Gallery;
                $data->image=$filename;
                $data->save();
            }
        }
        return redirect('/dashboard/gallery')->with('success','added successfully!!!');
    }

    public function gallery_del(Request $request){
        $id=(int)$request->id;
        $data=Gallery::find($id);
        $data->delete();
        return redirect()->back()->with('success','deleted successfully!!!');
    }

    public function affiliation(){
        $datas=Affiliation::all();
        return view('backend.pages.affiliation',compact('datas'));
    }

    public function affiliation_action(Request $request){
        $id=(int)$request->id;
        $data=Affiliation::find($id);
        if(input::hasFile('image')){
            $file=input::file('image');
            $filename=time().'.'.$file->getClientOriginalName();
            $file->move(public_path().'/backend/images/affiliation/',$filename);
            $data->image=$filename;
        }
        $data->save();
        return redirect()->back()->with('success','updated successfully!!!');
    }

    public function slider(){
        $datas=Slider::all();
        return view('backend.pages.slider',compact('datas'));
    }

    public function slider_action(Request $request){
        $data=new Slider;
        if ($request->hasFile('scroll_image')) {
            foreach ($request->scroll_image as $file) {
                $filename = $file->getClientOriginalName();
                $file->storeAs('public/backend/images/slider/', $filename);
                $file->move(public_path() . '/backend/images/slider/', $file->getClientOriginalName());
                $data->image = $filename;

            }
        }
        $data->title=$request->title;
        $data->url=$request->url;
        $data->save();
        return redirect()->back()->with('success','added successfully!!!');
    }

    public function slider_del(Request $request){
        $id=(int)$request->id;
        $data=Slider::find($id);
        $data->delete();
        return redirect()->back()->with('success','deleted successfully!!!');
    }

}