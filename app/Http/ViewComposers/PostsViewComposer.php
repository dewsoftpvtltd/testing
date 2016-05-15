<?php 
namespace App\Http\ViewComposers;

use Illuminate\Contracts\View\View;
use App\Domain\Entities\Post;
use App\Domain\Repositories\PostRepository;
use Auth;

class PostsViewComposer {

    protected $posts;

    public function __construct(PostRepository $posts){
            $this->posts = $posts;
    }

    public function compose(View $view) {
        if(Auth::user()){
        $user = Auth::user();//dd($user);
        $userId=Auth::user()->getId();
        $permissions = $user->getPermissions();
        $posts =$this->posts->userAll($user);
        $teacher = $user->hasRoleByName('teacher');
        $manager = $user->hasRoleByName('manager');
        $admin = $user->hasRoleByName('admin');
        $owner = $user->hasRoleByName('owner');
        $parent = $user->hasRoleByName('parent');

        $view->with("teacher", $teacher);
        $view->with("manager", $manager);
        $view->with("admin", $admin);
        $view->with("owner", $owner);
        $view->with("parent", $parent);
        $view->with("posts", $posts);
        $view->with("user", $user);
        $view->with("userId", $userId);
        $view->with("permissions", $permissions);

        
        

        }
    }
}