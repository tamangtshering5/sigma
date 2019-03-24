<?php

namespace App\Http\Controllers\frontend;
use App\Adventure;
use App\Affiliation;
use App\Airline;
use App\BranchOffice;
use App\ChairmanMessage;
use App\CompanyDetail;
use App\DayTour;
use App\DirectorMessage;
use App\Gallery;
use App\Http\Controllers\Controller;

use App\IndiaTour;
use App\Introduction;
use App\OurCompany;
use App\Slider;
use App\SocialSite;
use App\Testimonial;
use App\Ticketing;
use App\Tour;
use App\TourTripDetail;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
class pagesController extends Controller
{
    public function index(){
        $company_detail=CompanyDetail::all();
        $social=SocialSite::all();
        $branch=BranchOffice::all();
        $overseas=OurCompany::all();
        $tour=Tour::all();
        $one_day=DayTour::all();
        $india=IndiaTour::all();
        $adventure=Adventure::all();
        $testimonial=Testimonial::all();
        $slider=Slider::all();
        $affiliation=Affiliation::all();
        return view('frontend.pages.index',compact('company_detail','social','branch','tour','one_day','india','adventure','testimonial','overseas','slider','affiliation'));
    }

    public function about(){
        $company_detail=CompanyDetail::all();
        $social=SocialSite::all();
        $branch=BranchOffice::all();
        $overseas=OurCompany::all();
        $intro=Introduction::all();
        $company=OurCompany::all();
        $airlines=Airline::all();
        $affiliation=Affiliation::all();
        return view('frontend.pages.about',compact('company_detail','social','branch','intro','company','airlines','overseas','affiliation'));
    }

    public function chairman_msg(){
        $company_detail=CompanyDetail::all();
        $social=SocialSite::all();
        $branch=BranchOffice::all();
        $overseas=OurCompany::all();
        $msg=ChairmanMessage::all();
        $affiliation=Affiliation::all();
        return view('frontend.pages.chairman-msg',compact('company_detail','social','branch','msg','overseas','affiliation'));
    }

    public function executive_msg(){
        $company_detail=CompanyDetail::all();
        $social=SocialSite::all();
        $branch=BranchOffice::all();
        $overseas=OurCompany::all();
        $msg=DirectorMessage::all();
        return view('frontend.pages.executive-msg',compact('company_detail','social','branch','msg','overseas','affiliation'));
    }

    public function tour(){
        $company_detail=CompanyDetail::all();
        $social=SocialSite::all();
        $branch=BranchOffice::all();
        $overseas=OurCompany::all();
        $tour=Tour::paginate(8);
        $affiliation=Affiliation::all();
        return view('frontend.pages.tour',compact('company_detail','social','branch','tour','overseas','affiliation'));
    }

    public function one_day(){
        $company_detail=CompanyDetail::all();
        $social=SocialSite::all();
        $branch=BranchOffice::all();
        $overseas=OurCompany::all();
        $one_day=DayTour::paginate(8);
        $affiliation=Affiliation::all();
        return view('frontend.pages.one-day',compact('company_detail','social','branch','one_day','overseas','affiliation'));
    }

    public function india_tour(){
        $company_detail=CompanyDetail::all();
        $social=SocialSite::all();
        $branch=BranchOffice::all();
        $overseas=OurCompany::all();
        $india=IndiaTour::paginate(8);
        $affiliation=Affiliation::all();
        return view('frontend.pages.india-tour',compact('company_detail','social','branch','overseas','india','affiliation'));
    }

    public function adventure(){
        $company_detail=CompanyDetail::all();
        $social=SocialSite::all();
        $branch=BranchOffice::all();
        $overseas=OurCompany::all();
        $adven=Adventure::paginate(8);
        $affiliation=Affiliation::all();
        return view('frontend.pages.adventure',compact('company_detail','social','branch','overseas','adven','affiliation'));
    }

    public function ticketing(){
        $company_detail=CompanyDetail::all();
        $social=SocialSite::all();
        $branch=BranchOffice::all();
        $overseas=OurCompany::all();
        $ticketing=Ticketing::all();
        $affiliation=Affiliation::all();
        return view('frontend.pages.ticketing',compact('company_detail','social','branch','overseas','ticketing','affiliation'));
    }

    public function company(){
        $company_detail=CompanyDetail::all();
        $social=SocialSite::all();
        $branch=BranchOffice::all();
        $overseas=OurCompany::all();
        return view('frontend.pages.companies',compact('company_detail','social','branch','overseas','affiliation'));
    }

    public function gallery(){
        $company_detail=CompanyDetail::all();
        $social=SocialSite::all();
        $branch=BranchOffice::all();
        $overseas=OurCompany::all();
        $gallery=Gallery::all();
        $affiliation=Affiliation::all();
        return view('frontend.pages.gallery',compact('company_detail','social','branch','overseas','gallery','affiliation'));
    }

    public function contact(){
        $company_detail=CompanyDetail::all();
        $social=SocialSite::all();
        $branch=BranchOffice::all();
        $overseas=OurCompany::all();
        $affiliation=Affiliation::all();
        return view('frontend.pages.contact',compact('company_detail','social','branch','overseas','affiliation'));
    }



    /*//////////////packages-details////////////////*/
    public function tour_details($slug){
        $company_detail=CompanyDetail::all();
        $social=SocialSite::all();
        $branch=BranchOffice::all();
        $overseas=OurCompany::all();
        $tour=Tour::where('slug',$slug)->first();
        $add = $tour->popularity+1;
        $tour->popularity = $add;
        $tour->save();
        $popularity=Tour::orderBy('popularity','DESC')->get();
        $trip=Tour::where('slug',$slug)->first();
        $affiliation=Affiliation::all();
        return view('frontend.pages.tour-details',compact('company_detail','social','branch','tour','overseas','popularity','trip','affiliation'));
    }

    public function daytour_details(Request $request){
        $company_detail=CompanyDetail::all();
        $social=SocialSite::all();
        $branch=BranchOffice::all();
        $overseas=OurCompany::all();
        $slug=$request->slug;
        $daytour=DayTour::where('slug',$slug)->first();
        $add = $daytour->popularity+1;
        $daytour->popularity = $add;
        $daytour->save();
        $popularity=DayTour::orderBy('popularity','DESC')->get();
        $trip=DayTour::where('slug',$slug)->first();
        $affiliation=Affiliation::all();
        return view('frontend.pages.one-day-tour-details',compact('company_detail','social','branch','daytour','overseas','popularity','trip','affiliation'));
    }

    public function adventure_details(Request $request){
        $company_detail=CompanyDetail::all();
        $social=SocialSite::all();
        $branch=BranchOffice::all();
        $overseas=OurCompany::all();
        $slug=$request->slug;
        $adven=Adventure::where('slug',$slug)->first();
        $add = $adven->popularity+1;
        $adven->popularity = $add;
        $adven->save();
        $popularity=Adventure::orderBy('popularity','DESC')->get();
        $trip=Adventure::where('slug',$slug)->first();
        $affiliation=Affiliation::all();
        return view('frontend.pages.adventure-details',compact('company_detail','social','branch','adven','overseas','popularity','trip','affiliation'));
    }

    public function indiatour_details(Request $request){
        $company_detail=CompanyDetail::all();
        $social=SocialSite::all();
        $branch=BranchOffice::all();
        $overseas=OurCompany::all();
        $slug=$request->slug;
        $india=IndiaTour::where('slug',$slug)->first();
        $add = $india->popularity+1;
        $india->popularity = $add;
        $india->save();
        $popularity=IndiaTour::orderBy('popularity','DESC')->get();
        $affiliation=Affiliation::all();
        return view('frontend.pages.india-tour-details',compact('company_detail','social','branch','india','overseas','popularity','affiliation'));
    }

    public function company_details($slug){
        $company_detail=CompanyDetail::all();
        $social=SocialSite::all();
        $branch=BranchOffice::all();
        $overseas=OurCompany::all();
        $company=OurCompany::where('slug',$slug)->first();
        $affiliation=Affiliation::all();
        return view('frontend.pages.companies',compact('company_detail','social','branch','overseas','company','affiliation'));
    }
}
