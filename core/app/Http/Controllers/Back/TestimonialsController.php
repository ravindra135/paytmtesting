<?php

namespace App\Http\Controllers\Back;

use App\{
    Models\Testimonials,
    Http\Requests\PageRequest,
    Http\Controllers\Controller
};



class TestimonialsController extends Controller
{
    /**
     * Constructor Method.
     *
     * Setting Authentication
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
        $this->middleware('adminlocalize');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

            $items= Testimonials::orderBy('id','desc')->paginate(10);

      return view('back.testimonials.index',compact('items')); 
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
   

      public function add()    {



            return view('back.testimonials.create');

        }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PageRequest $request)
    {
        Page::create($request->all());
        return redirect()->route('back.page.index')->withSuccess(__('New Page Added Successfully.'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Testimonials $page)
    {
        return view('back.testimonials.edit',compact('page'));
    }


    /**
     * Change the status for editing the specified resource.
     *
     * @param  int  $id
     * @param  int  $pos
     * @return \Illuminate\Http\Response
     */
 
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PageRequest $request, Testimonials $page)
    {
        $page->update($request->all());
        return redirect()->route('back.testimonials.index')->withSuccess(__(' Updated Successfully.'));
    }

   
}
