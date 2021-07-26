<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Page;

class PageController extends Controller
{
    //





    public function index(){

        $pages = Page::all();





        return view('admin.pages.index', ['pages'=>$pages]);

    }






    public function addPage(Request $request){



         if($request->isMethod('post')){

            $data = $request->all();


            $page= new Page;

            $user = auth()->user();
            $page->user_id=$user->id;

            $page->title=$data['title'];
            $page->url=$data['url'];
            $page->description=$data['description'];
            $page->page_image = $data['page_image']->store('images', 'public');




            if(empty($data['status'])){

                $status=0;
            }
                else{

                    $status=1;


            }

            $page->status=$status;




            $page->save();
         //   return redirect()->back()->with('flash_message_success', 'Page has been aded');

         session()->flash('addpage', 'Page '. $page->title. ' has been created');
         return redirect('admin/pages');




        }


        return view('admin.pages.create');




    }



            public function edit(Page $page){


                return view('admin.pages.edit', ['page' => $page]);
            }








            public function update(Page $page){




                    $inputs= request()->validate([

                    'title' => 'required',
                    'url' => 'required',
                    'description' => 'required',
                    'page_image' => 'file'
                    ]);



                    $inputs['page_image'] = request('page_image')->store('images');





                    $page->update($inputs);

                    return back();



            }




            public function show(Page $page){



                return view('admin.pages.single-page', ['page' => $page]);

            }









    public function destroy(Page $page){



        $page->delete();


        session()->flash('pagedelete','Page has been deleted: '. $page->title);

        return back();

    }










}
