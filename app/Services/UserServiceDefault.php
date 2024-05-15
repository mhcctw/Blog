<?php

namespace App\Services;

use App\Models\User;
use App\Models\Subscription;
use App\Contracts\UserService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Expr\Cast\Object_;

class UserServiceDefault implements UserService{

    public function FindSearch(String $searchText){

        $foundUsers = User::where('name', 'like', "%$searchText%")->get();

        $result = self::ShowUsers($foundUsers);
        return $result;
    }

    public function FindFollowers(User $user){

        $subscribers = $user->subscribersUsers;

        $result = self::ShowUsers($subscribers);
        return $result;

    }

    public function FindFollows(User $user){

        $subscriptions = $user->subscriptionsUsers;

        $result = self::ShowUsers($subscriptions);
        return $result;

    }

    public function ShowUsers(Object $users){        

        

        if(count($users)==0){

            $result = '<p>No users</p>';

        }else{
            $result = '';

            foreach($users as $user){

                $result.= '<div class="col-lg-12 col-md-6">';
                $result.= '<div class="item" style="margin-bottom: 96px; min-height:165px;">
                            <div class="row">';
                // image
                $result.= '<div class="col-lg-3">
                            <div class="image">
                                <img src="'.(!empty($user->photo) ? url('assets/images/avatars/'.$user->photo) : url('assets/images/no_image.png')).'" alt="Avatar">
                            </div>
                        </div>';
    
                $result.= '<div class="col-lg-9">
                            <ul>';
                // name
                $result.= '<li>
                            <h4>'.$user->name.'</h4>
                        </li>';
                
                // posts
                $result.= '<li>
                            <span>Posts:</span>
                            <h6>'.count($user->UsersPosts).'</h6>
                        </li>';
    
                // Followers
                $result.= '<li>
                            <span>Followers:</span>
                            <h6>'.count($user->subscribers).'</h6>
                        </li>';
                
                // Follows
                $result.= '<li>
                            <span>Follows:</span>
                            <h6>'.count($user->subscriptions).'</h6>
                        </li>
                    </ul>';
    
                // link
                $result.= '<a href="/profile/'.$user->id.'"><i class="fa fa-angle-right"></i></a>';
    
                $result.= '</div>
                        </div>
                    </div>
                </div>';
                
            }

        }        
        

        return html_entity_decode($result);

    }

}
?>