<?php
/**
 * Created by PhpStorm.
 * UserRequest: mohammedsobhei
 * Date: 5/2/18
 * Time: 11:43 PM
 */

namespace App\Repositories\Eloquents;

use App\Repositories\Interfaces\Repository;
use App\Repositories\Uploader;
use App\User;
use App\UserHobby;
use App\UserSocialMedia;
use App\UserGallery;
use App\Like;
use App\Chat;
use App\Country;
use App\Hobby;
use App\Interest;
use App\Religion;
use App\UserInterest;
use App\SocialMedia;
use Illuminate\Support\Facades\Config;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use App\CountrySubscription;


class UserEloquent extends Uploader implements Repository
{

    private $model;

    public function __construct(User $model)
    {
        $this->model = $model;
    }

    function anyData()
    {

        $data = $this->model->orderByDesc('updated_at');

        return datatables()->of($data)
            ->filter(function ($query) {

                if (request()->filled('name')) {
                    $query->where('name', 'LIKE', '%' . request()->get('name') . '%');
                }

                if (request()->filled('email')) {
                    $query->where('email', 'LIKE', '%' . request()->get('email') . '%');
                }

                if (request()->filled('phone')) {
                    $query->where('phone', 'LIKE', '%' . request()->get('phone') . '%');
                }

                if (request()->filled('gender')) {
                    $query->where('gender', request()->get('gender'));
                }
                if (request()->filled('country_id')) {
                    $query->where('country_id', request()->get('country_id'));
                }
                if (request()->filled('is_active')) {
                    $query->where('is_active', request()->get('is_active'));
                }
            })
            ->editColumn('photo', function ($item) {

                if (isset($item->photo))
                    return '<img src="' . $item->photo . '" width="80px" height="80px" class="img-circle">';
            })->addColumn('country_name', function ($item) {

                return isset($item->Country) ? $item->Country->translation()->name : '-';
            })->editColumn('gender', function ($item) {

                return ucfirst($item->gender);
            })->editColumn('is_online', function ($item) {
                if ($item->is_online)
                    return '<span class="label label-success">Online</span>';
                return '<span class="label label-danger">Offline</span>';
            })->editColumn('is_active', function ($item) {
                if ($item->is_active)
                    return '<input type="checkbox" class="make-switch is_active" data-on-text="&nbsp;ON&nbsp;" data-off-text="&nbsp;OFF&nbsp;" name="is_active" data-id="' . $item->id . '" checked  data-on-color="success" data-size="mini" data-off-color="warning">';
                return '<input type="checkbox" class="make-switch is_active" data-on-text="&nbsp;ON&nbsp;" data-off-text="&nbsp;OFF&nbsp;" name="is_active" data-id="' . $item->id . '" data-on-color="success" data-size="mini" data-off-color="warning">';
            })->addColumn('action', function ($item) {
                return '<a href="' . url('/admin/users/' . $item->id . '/view') . '" class="btn btn-circle btn-icon-only blue">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    ';
            })->addIndexColumn()
            ->rawColumns(['is_online', 'is_active', 'photo', 'action'])->toJson();
    }

    function getAll(array $attributes)
    {
        // TODO: Implement getAll() method.
        $data = $this->model->all();
        if (request()->segment(1) == 'api') {
            return response_api(true, 200, null, $data);
        }
        return $data;
    }


    function userActive($id)
    {

        $user = $this->model->find($id['user_id']);

        if (isset($user)) {
            $user->is_active = !$user->is_active;
            if ($user->save())
                return response_api(true, 200);
        }
        return response_api(false, 422);

    }


    function getById($id)
    {
        // TODO: Implement getById() method.
        return $this->model->find($id);
    }

    function profileData($id)
    {
        $user_profile['data'] = User::with(['Country.translationAll', 'Religion.translationAll', 'Hobbies.Hobby.translationAll', 'UserGallery', 'UserSocialMedia.SocialMedia', 'Interests.Interest.translationAll'])->where('id', $id)->first();

        return response()->json($user_profile);
    }

    function editprofile($id)
    {


        $interests = Interest::with('translationAll')->get();
        $interests->map(function ($interest) use ($id){
            if(UserInterest::where(['user_id'=>$id,'interest_id'=>$interest->id])->first())
                $interest->select = true;
            return $interest;
        });

        $hobbies = Hobby::with('translationAll')->get();
        $hobbies->map(function ($hobby) use ($id){
            if(UserHobby::where(['user_id'=>$id,'hobby_id'=>$hobby->id])->first())
                $hobby->select = true;
            return $hobby;
        });

        $response['options'] = [
            'countries' => Country::with('translationAll')->get(),
            'hobbies' => $hobbies,
            'interests' => $interests,
            'social_links' => SocialMedia::doesntHave('UserSocialMedia')->get(),
            'religions' => Religion::with('translationAll')->get(),
        ];

        $response['data'] = User::with(['Country.translationAll', 'Religion.translationAll', 'Hobbies.Hobby.translationAll', 'UserGallery', 'UserSocialMedia.SocialMedia', 'Interests.Interest.translationAll'])->where('id', $id)->first();

        return response()->json($response);
    }

    function editprofileData($attributes)
    {
        $model = auth()->user();
        $model->gender = $attributes['gender'];
        $model->education = $attributes['education'];
        $model->country_id = isset($attributes['country_id']) ? $attributes['country_id'] : null;
        $model->religion_id = $attributes['religion_id'];
        $model->phone = $attributes['phone'];
        $model->dob = \DateTime::createFromFormat('D M d Y H:i:s e+', $attributes['dob']);
        $model->bio = isset($attributes['bio']) ? $attributes['bio'] : '';
        $model->is_complete = 1;
        if ($model->save()) {

            if (isset($attributes['photo'])) {
                $model->photo = $this->storeImageThumb('users', $model->id, $attributes['photo']);
                $model->save();
            }
            if (isset($attributes['cover'])) {
                $model->cover = $this->storeCoverThumb('users', $model->id, $attributes['cover']);
                $model->save();
            }
            if (isset($attributes['hobbies'])) {
                $hobbies = array_map('intval', explode(',', $attributes['hobbies']));
                UserHobby::where('user_id',auth()->user()->id)->forceDelete();
                foreach ($hobbies as $hobby_id) {
                    UserHobby::create([
                        'user_id' => auth()->user()->id,
                        'hobby_id' => $hobby_id,
                    ]);
                }
            }
            if (isset($attributes['interests'])) {
                $interests = array_map('intval', explode(',', $attributes['interests']));
                UserInterest::where('user_id',auth()->user()->id)->forceDelete();
                foreach ($interests as $interest_id) {
                    UserInterest::create([
                        'user_id' => auth()->user()->id,
                        'interest_id' => $interest_id,
                    ]);

                }
            }

            if (isset($attributes['social_links'])) {
                $social_links = json_decode($attributes['social_links']);
                UserSocialMedia::where('user_id',auth()->user()->id)->forceDelete();
                foreach ($social_links as $social_id) {
                    UserSocialMedia::create([
                        'user_id' => auth()->user()->id,
                        'social_id' => $social_id->social_id,
                        'link' =>  $social_id->link,
                    ]);

                }
            }
            return response()->json(['status' => 'true']);
        }
        return response()->json(['status' => 'false']);

    }

    function addGalleryPhoto($images)
    {
        if (isset($images)) {
            foreach ($images as $image) {
                $gallary_img = $this->storeGallaryThumb('users', auth()->user()->id,$image);
                $photo = UserGallery::create([
                    'user_id' => auth()->user()->id,
                    'image' => $gallary_img
                ]);
            }
        }
        $gallary_imgs = UserGallery::where('user_id',auth()->user()->id)->get();
        return response()->json(['status' => true,'gallary_imgs'=>$gallary_imgs ]);
    }

    function addChannel($attributes)
    {
        $channel = Chat::create([
            'user_id_one' => $attributes->user_id_one,
            'user_id_two' => $attributes->user_id_two,
        ]);
        return response()->json($channel);
    }

    function chats()
    {
        $suggest_users = Chat::with(['User2'])->where('user_id_one',auth()->user()->id)->orWhere('user_id_two',auth()->user()->id)->get();

        return response()->json($suggest_users);
    }

    function getChannel($reciver_id)
    {
        $suggest_users = Chat::with(['User','User2'])->where('user_id_one',auth()->user()->id)->orWhere('user_id_two',auth()->user()->id)->limit(6)->get();

        $reciver = User::find($reciver_id);

        $channel = Chat::where([
            'user_id_one' => $reciver_id,
            'user_id_two' => auth()->user()->id,
        ])->orWhere(function ($query) use($reciver_id) {
            $query->where([
            'user_id_one' => auth()->user()->id,
            'user_id_two' => $reciver_id,
            ]);
        })->first();

        if($channel)
            return response()->json(['status' => true,'data'=>$channel,'reciver'=> $reciver,'suggest_users'=>$suggest_users]);

        return response()->json(['status' => false,'reciver'=> $reciver,'suggest_users'=>$suggest_users]);

    }

    function login(array $attributes)
    {
        if (auth()->attempt(['email' => $attributes['email'], 'password' => $attributes['password']], (isset($attributes['rememberme'])) ?: 0)) {
            $user = auth()->user();
            $user_info = User::where('id', $user->id)->first();
            return response()->json(['status' => true, 'user' => $user_info]);
        }
        return response()->json(['status' => false, 'msg' => __('auth.failed_user_pass')]);
    }

    function logout()
    {
        auth()->logout();
        return response()->json(['status' => true]);
    }

    public function forgetPassword($options)
    {

        $user = User::where('email', $options['email'])->first();

        if (!$user) {
            return response()->json(['msg' => __('passwords.user'), 'status' => false]);
        }
        $token = Str::random(32);;
        \DB::table('password_resets')->insert([
            'email' => $options['email'],
            'token' => $token,
        ]);

        $baseUrl = explode("forgetPassword", url()->current())[0];

        $link = $baseUrl . 'public/index.html?#/resetPassword?token=' . $token;

        $from = 'israabssam1994@gmail.com';
        $MAIL_USER_NAME = 'Pal Match Support';
        $to = $options['email'];
        $title = "Pal Match Reset Password Link";
        $mail = Mail::send('emails.sent', ['title' => $title, 'content' => $link], function ($msg) use ($to, $from, $title, $MAIL_USER_NAME) {
            $msg->from($from, $MAIL_USER_NAME)->to($to)->subject($title);
        });

        return response()->json(['msg' => __('passwords.sent'), 'status' => true]);
    }

    public function resetPassword($options)
    {
        $user = auth()->user();
        $password = $options['password'];
        if (isset($options['token'])) {
            $tokenData = \DB::table('password_resets')->where('token', $options['token'])->first();
            if ($tokenData) {
                $user = User::where('email', $tokenData->email)->first();
                if ($user) {
                    $user->password = \Hash::make($password);
                    if ($user->save()) {
                        return response()->json(['msg' => __('passwords.reset'), 'status' => true]);
                    }
                }
            }
        } else if ($user) {
            $user->password = \Hash::make($password);
            if ($user->save()) {
                return response()->json(['msg' => __('passwords.reset'), 'status' => true]);
            }
        }
        return response()->json(['msg' => __('passwords.throttled'), 'status' => false]);

    }

    function completeProfile(array $attributes)
    {
        // TODO: Implement create() method.
        $model = auth()->user();
        $model->gender = $attributes['gender'];
        $model->education = $attributes['education'];
        $model->country_id = isset($attributes['country_id']) ? $attributes['country_id'] : null;
        $model->religion_id = $attributes['religion_id'];
        $model->phone = $attributes['phone'];
        $model->dob = \DateTime::createFromFormat('D M d Y H:i:s e+', $attributes['dob']);
        $model->bio = isset($attributes['bio']) ? $attributes['bio'] : '';
        $model->is_complete = 1;
        if ($model->save()) {

            if (isset($attributes['photo'])) {
                $model->photo = $this->storeImageThumb('users', $model->id, $attributes['photo']);
                $model->save();
            }
            if (isset($attributes['cover'])) {
                $model->cover = $this->storeCoverThumb('users', $model->id, $attributes['cover']);
                $model->save();
            }
            if (isset($attributes['hobby_id'])) {
                $hobbies = array_map('intval', explode(',', $attributes['hobby_id']));
                foreach ($hobbies as $hobby_id) {
                    UserHobby::create([
                        'user_id' => auth()->user()->id,
                        'hobby_id' => $hobby_id,
                    ]);

                }
            }
            if (isset($attributes['interest_id'])) {
                $interests = array_map('intval', explode(',', $attributes['interest_id']));

                foreach ($interests as $interest_id) {
                    UserInterest::create([
                        'user_id' => auth()->user()->id,
                        'interest_id' => $interest_id,
                    ]);

                }
            }
            return response()->json(['status' => 'true']);
        }
        return response()->json(['status' => 'false']);
    }

    function create(array $attributes)
    {
    // TODO: Implement create() method.
        $attributes['password'] = \Hash::make($attributes['password']);
        if (User::create($attributes)) {
            return response()->json(['status' => true, 'msg' => trans('app.success')]);
        }
        return response()->json(['status' => false, 'msg' => trans('app.error')]);
    }

    function update(array $attributes, $id = null)
    {
        // TODO: Implement update() method.
        $blog = $this->model->find($id);
        if (isset($attributes['title']))
            $blog->title = $attributes['title'];
        if (isset($attributes['content']))
            $blog->content = $attributes['content'];
        if (isset($attributes['image']))
            $blog->image = $this->upload($attributes, 'image');

        if ($blog->save())
            return response_api(true, 200, trans('app.success'), $blog);
        return response_api(false, 422, trans('app.error'));


    }

    function delete($id)
    {
        // TODO: Implement delete() method.
        $blog = $this->model->find($id);

        if (isset($blog) && $blog->delete())
            return response_api(true, 200, trans('app.success'), []);
        return response_api(false, 422, trans('app.error'), []);

    }

    public function isAuthenticate()
    {
        if (auth()->check()) {
            $user = auth()->user();
            return response()->json(['status' => true, 'user' => $user]);
        }

        return response()->json(['status' => false, 'message' => '']);
    }

    public static function filterData($options)
    {
        $search_count =0;
        $users = User::with('Country.translationAll');
        if (isset($options['sortByText'])) {
            $search_count++;
            if ($options['sortby'] == 'Name')
                $users->where('name', 'like', '%' . $options['sortByText'] . '%');
            elseif ($options['sortby'] == 'Education')
                $users->where('education', 'like', '%' . $options['sortByText'] . '%');
        }

        if (isset($options['country_id'])) {
            $search_count++;
            $users->where('country_id', $options['country_id']);
        }
        if (isset($options['gender'])) {
            $search_count++;
            $users->where('gender', $options['gender']);
        }
        if (isset($options['religion_id'])) {
            $search_count++;
            $users->where('religion_id', $options['religion_id']);
        }
        if (isset($options['interest_id'])) {
            $search_count++;
            $users->whereHas('Interests', function ($q) use ($options) {
                $q->where('interest_id', $options['interest_id']);
            });
        }
        if (isset($options['hobby_id'])) {
            $search_count++;
            $users->whereHas('Hobbies', function ($q) use ($options) {
                $q->where('hobby_id', $options['hobby_id']);
            });
        }

        $users->where('id', '!=', auth()->user()->id)->where('is_complete', 1);

        if ($search_count == 0)
            $users->orderBy('created_at', 'desc')->limit(9);

        $users = $users->get();
        if (isset($options['age_from']) && isset($options['age_to'])) {
            $users =  $users->whereBetween('age', [$options['age_from'], $options['age_to']]);
        }

        return response()->json($users);

    }

    public static function filterDiscover($options)
    {
        $user = auth()->user();
        $user_id = $user->id;
        $response =['suggests'=>[],'user_Interests'=>[],'user_hobbies'=>[]];


        $users = User::with(['Country.translationAll', 'Religion.translationAll', 'Hobbies.Hobby.translationAll', 'Interests.Interest.translationAll'])->where('id','!=',$user->id)->where('is_complete',1);

        if (isset($options['sortByText'])) {
            if ($options['sortby'] == 'Name')
                $users->where('name', 'like', '%' . $options['sortByText'] . '%');
            elseif ($options['sortby'] == 'Education')
                $users->where('education', 'like', '%' . $options['sortByText'] . '%');
        }

        if (isset($options['country_id'])) {
            $users = $users->where('country_id', $options['country_id']);
        }
        if (isset($options['gender'])) {
            $users = $users->where('gender', $options['gender']);
        }

        if (isset($options['religion_id'])) {
            $users->where('religion_id', $options['religion_id']);
        }
        if (isset($options['interest_id'])) {
            $users->whereHas('Interests', function ($q) use ($options) {
                $q->where('interest_id', $options['interest_id']);
            });
        }
        if (isset($options['hobby_id'])) {
            $users->whereHas('Hobbies', function ($q) use ($options) {
                $q->where('hobby_id', $options['hobby_id']);
            });
        }


        $users = $users->orderBy('created_at','desc')->get();

        if (isset($options['age_from']) && isset($options['age_to'])) {
            $users = $users->whereBetween('age', [$options['age_from'], $options['age_to']]);
        }

        $users->map(function ($userr) use (&$response,$user){

            if($userr->country_id == $user->country_id){
                $userr->suitable_count = $userr->suitable_count + 1;
            }
            if($userr->religion_id == $user->religion_id){
                $userr->suitable_count = $userr->suitable_count + 1;
            }

            $user_hobbies = User::WhereHas('Hobbies.UserHobby', function($k) use ($user) {
                $k->where('user_id', $user->id);
            })->where('id',$userr->id)->count();

            if($user_hobbies>0){
                $userr->suitable_count = $userr->suitable_count + 1;
                if(count($response['user_hobbies'])<6)
                    $response['user_hobbies'][] =  $userr;
            }

            $user_interests = User::WhereHas('Interests.UserInterest', function($k) use ($user) {
                $k->where('user_id', $user->id);
            })->where('id',$userr->id)->count();

            if($user_interests>0){
                $userr->suitable_count = $userr->suitable_count + 1;
                if(count($response['user_Interests'])<4)
                    $response['user_Interests'][] =  $userr;
            }

            //suggests_users
                if($userr->suitable_count > 0 && count($response['suggests'])<6){
                    $response['suggests'][] =  $userr;
                }

            return $userr;
        });
        //suitable_user
            $response['suitable_user'] = $users->sortByDesc("suitable_count")->first();

        //random_user
            $range = rand(0, count($users)-1);
            if($range)
                $response['random_user'] =  $users[$range] ;

        //new_registers
            $response['new_registers'] = $users->take(6);

        if (isset($options['details'])) {
            if($options['details'] == 'suggests'){
                $response['data'] = $response['suggests'];
            }elseif($options['details'] == 'user_hobbies'){
                $response['data'] = $response['user_hobbies'];
            }elseif($options['details'] == 'user_Interests'){
                $response['data'] = $response['user_Interests'];
            }elseif($options['details'] == 'new_registers'){
                $response['data'] = $users;
            }
        }
            return response()->json($response);

    }

    public static function likeUser($options)
    {
        $like = Like::where(['user_id' => auth()->user()->id, 'user_like_id' => $options['user_like_id']])->first();
        if (isset($like)) {
            $like->forceDelete();
            $is_like = 0;
        } else {
            like::create([
                'user_id' => auth()->user()->id,
                'user_like_id' => $options['user_like_id'],
            ]);
            $is_like = 1;
        }

        return response()->json(['status' => true, 'is_like' => $is_like]);

    }

    public static function userLikes()
    {
        $user = auth()->user();
        $users = User::with('Likes.User.Country.translationAll')->whereHas('Likes', function ($q) use ($user) {
            $q->where(['user_id' => $user->id]);
        });

        return response()->json($users->get());

    }

    function subscriptions()
    {
        $subscriptions = CountrySubscription::with(['Subscription.translationAll'])->where('country_id',auth()->user()->country_id)->get();
        return response()->json($subscriptions);
    }

}
