<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;
use App\Category;
use App\Comment;
use App\CommentReply;
use App\Permission;
use App\User;

use App\Role;

use App\Media;
use App\Page;

use App\Photo;


class AdminController extends Controller
{
    //

	public function index(){



        $postCount = Post::count();
        $categoryCount = Category::count();
        $commentsCount = Comment::count();
        $repliesCount = CommentReply::count();


        $usersCount = User::count();
        $rolesCount = Role::count();

        $photosCount = Photo::count();



        $pagesCount = Page::count();


		return view('admin.index', compact('postCount', 'categoryCount', 'commentsCount', 'repliesCount', 'usersCount', 'rolesCount',  'pagesCount', 'photosCount'));

	}




}
