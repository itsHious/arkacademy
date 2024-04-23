<?php

namespace App\Http\Controllers;

use App\Models\Players;
use App\Models\Team;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    public function store(Request $r){
        Team::create([
            'name'=>$r->team,
        ]);

        alert()->success('Team Created!','Success!')->persistent();
        return back();
    }

    public function home(){
        

        $team = Team::latest()->get();
        return view('dashboard',compact('team'));
    }

    public function viewteam($id,Request $r){
        $team = Team::where('id',$id)->first();
        if($r->age !== null){
           switch ($r->option) {
            case 'Under':
                $pl = Players::where('team', $id)
                ->where('dob', '>', Carbon::now()->subYears($r->age))
                ->get();                
                return view('teamview',compact('team','pl'));
                break;

            case 'Over':
                $pl = Players::where('team', $id)
                ->where('dob', '<=', Carbon::now()->subYears($r->age))
                ->get();                
                return view('teamview',compact('team','pl'));
                break;
            default:
            alert()->error('No Team Info Found')->persistent();
            return back();
                break;
           }
        }elseif($r->option == 'Between' && $r->toage !== null && $r->fromage !==null){
            // return 'lol';
            $pl = Players::where('team', $id)
              ->whereBetween('dob', [
                  Carbon::now()->subYears($r->toage), // older bound
                  Carbon::now()->subYears($r->fromage)   // younger bound
               ])
               ->get();
                return view('teamview',compact('team','pl'));
        }
        else{
            
            if($team !== null){
                $pl = Players::where('team',$id)->get();
                return view('teamview',compact('team','pl'));
            }else{
                alert()->error('No Team Info Found')->persistent();
                return back();
            }
        }








       
    }


    public function addmember(Request $r,$id){

        $image = $this->pickimage($r);

        Players::create([
            'team'=>$id,
            'surname'=>$r->surname,
            'name'=>$r->name,
            'dob'=>$r->dob,
            'trade'=>$r->trade,
            'position'=>$r->position,
            'edu'=>$r->edu,
            'residence'=>$r->residence,
            'house'=>$r->house,
            'postal'=>$r->postal,
            'phone'=>$r->phone,
            'email'=>$r->email,
            'height_one'=>$r->height_one,
            'height_two'=>$r->height_two,
            'weight'=>$r->weight,
            'allergy'=>$r->allergy,
            'parent'=>$r->parent,
            'parent_phone'=>$r->parent_phone,
            'image'=>$image,
            'comment'=>$r->comment
        ]);

       $team = Team::where('id',$id)->first();
       $team->update([
        'count'=>$team->count+1,
       ]);

        alert()->success('Team Member Created!','Success!')->persistent();
        return back();
    }


    public function pickimage($r){
    
        
            $img = $r->file('image');
                  $extension = $img->getClientOriginalExtension();
                  if ($extension == 'jpg' || $extension == 'jpeg' || $extension == 'png' || $extension == 'webp') {
                      $app_screenshot_name =$img->getClientOriginalName();
                      $path = "Player/";
          
                      $abs_path = storage_path("app/public/$path");
                      $img->move($abs_path, $app_screenshot_name);
                      $file_path_to_store = "storage/$path" . $app_screenshot_name;
                      
          
          
               return $file_path_to_store;
                  }
    }


    public function viewmember($id){
        $mem = Players::where('id',$id)->first();

        return view('viewplayer',compact('mem'));
    }


    public function editmember($id){
        $mem = Players::where('id',$id)->first();
        $team = Team::where('id',$mem->team)->first();
        return view('editmember',compact('mem','team'));
    }


    public function updatemember(Request $r,$id){
        $mem = Players::where('id',$id)->first();

        $mem->update([
            'surname'=>$r->surname,
            'name'=>$r->name,
            'dob'=>$r->dob,
            'trade'=>$r->trade,
            'position'=>$r->position,
            'edu'=>$r->edu,
            'residence'=>$r->residence,
            'house'=>$r->house,
            'postal'=>$r->postal,
            'phone'=>$r->phone,
            'email'=>$r->email,
            'height_one'=>$r->height_one,
            'height_two'=>$r->height_two,
            'weight'=>$r->weight,
            'allergy'=>$r->allergy,
            'parent'=>$r->parent,
            'parent_phone'=>$r->parent_phone,
            'comment'=>$r->comment
           
        ]);

        if($r->has('image')){
            $image = $this->pickimage($r);

            $mem->update([
                'image'=>$image
            ]);
        }

        alert()->success('Update Successful','Success')->persistent();
        return redirect()->route('team.view',$mem->team);
    }

    public function deletemember($id){
        $mem = Players::where('id',$id)->first();
        $team = Team::where('id',$mem->team)->first();

        if($mem !==null){
            $mem->delete();
            $team->update([
                'count'=>$team->count-1
            ]);
            alert()->success('Member Details Deleted','Success')->persistent();
            return back();
        }else{
            alert()->error('Team member Details Not Found','Error');
            return back();
        }
    }


    public function editteam($id){
        $team = Team::where('id',$id)->first();
        return view('editteam',compact('team'));
    }


    public function updateteam(Request $r,$id){
        $team = Team::where('id',$id)->first();

        if($team !==null){
            $team->update([
                'name'=>$r->name
            ]);

            alert()->success('Team updated','Success')->persistent();
            return redirect()->route('dashboard');
        }else{
            alert()->error('Team  Details Not Found','Error');
            return back();
        }
    }


    public function deleteteam($id){
        $team = Team::where('id',$id)->first();

        if($team !==null){
           $mem = Players::where('team',$id)->count();
           if($mem >0){
            alert()->info('Please delete team members on this team before deleting the team','Action Aborted')->persistent();
            return back();
           }else{
            $team->delete();
            alert()->success('Team Deleted','Success')->persistent();
            return redirect()->route('dashboard');
           }
            
        }else{
            alert()->error('Team  Details Not Found','Error');
            return back();
        }
    }
}
