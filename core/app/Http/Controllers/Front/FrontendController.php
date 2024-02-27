<?php

namespace App\Http\Controllers\Front;

use Illuminate\{
    Http\Request,
    Support\Facades\Session
};

use App\{
    Models\Item,
    Models\Setting,
    Models\Subscriber,
    Helpers\EmailHelper,
    Http\Controllers\Controller,
    Http\Requests\ReviewRequest,
    Http\Requests\SubscribeRequest,
    Repositories\Front\FrontRepository
};
use App\Helpers\SmsHelper;
use App\Models\Brand;
use App\Models\CampaignItem;
use App\Models\Category;
use App\Models\ChieldCategory;
use App\Models\Fcategory;
use App\Models\HomeCutomize;
use App\Models\Order;
use App\Models\Language;
use App\Models\Post;
use App\Models\Service;
use Jenssegers\Agent\Agent;

use App\Models\Slider;
use App\Models\Subcategory;
use App\Models\TrackOrder;
use Illuminate\Support\Facades\Config;

use function GuzzleHttp\json_decode;

class FrontendController extends Controller
{

    /**
     * Constructor Method.
     *
     * @param  \App\Repositories\Front\FrontRepository $repository
     *
     */
    public function __construct(FrontRepository $repository)
    {
        $this->repository = $repository;
        $setting = Setting::first();
        if($setting->recaptcha == 1){
            Config::set('captcha.sitekey', $setting->google_recaptcha_site_key);
            Config::set('captcha.secret', $setting->google_recaptcha_secret_key);
        }

        $this->middleware('localize');

    }

// -------------------------------- HOME ----------------------------------------

	public function index()
	{
      $setting = Setting::first();

                $agent_test = new Agent();

            $home_customize = HomeCutomize::first();

             $category_vkis = Category::whereStatus(1)->orderby('serial','desc')->get();

            // feature category end
            $home_customize = HomeCutomize::first();
            // popular category


          $sliders = Slider::where('home_page','theme3')->get();
            return view('front.index',[
                'banner_first'   => json_decode($home_customize->banner_first,true),
                'sliders'  => $sliders,
                
                'products' => Item::with('category')->whereStatus(1)->take(8),
                 // 'products' => Item::with('category')->where('is_type','!=','feature')->whereStatus(1),

              'featured' => Item::with('category')->where('is_type','=','feature')->whereStatus(1)->take(8),
                'category_vkis' => $category_vkis,
                'agent' => $agent_test,
            ]);


	}

 public function buy_From(){
        return view('front.buy_From');
    }

    public function review_submit(){
        return view('back.overlay.index');
    }

    public function slider_o_update(Request $request){
        $setting = Setting::find(1);
        $setting->overlay = $request->slider_overlay;
        $setting->save();
        return redirect()->back();
    }


    public function product($slug)
    {

        

        $item = Item::with('category')->whereStatus(1)->whereSlug($slug)->firstOrFail();
        $video = explode('=',$item->video);
        return view('front.catalog.product',[
            'item'          => $item,
           'services' => Service::orderby('id','desc')->get(),
           'slug_Category'=>Category::where('id', $item->category_id)->firstOrFail(),
            'reviews'       => $item->reviews()->where('status',1)->paginate(3),
            'galleries'     => $item->galleries,
            'video'         => $item->video ? end($video) : '',
            'sec_name'      => isset($item->specification_name) ? json_decode($item->specification_name,true) : [],
            'sec_details'   => isset($item->specification_description) ? json_decode($item->specification_description,true) : [],
            'attributes'    => $item->attributes,
            'related_items' => $item->category->items()->whereStatus(1)->where('id','!=',$item->id)->take(8)->get()
        ]);
    }



  public function tvc()
    {
     return view('front.tvc');

    }

	public function blog(Request $request)
	{

        $tagz = '';
        $tags = null;
        $name = Post::pluck('tags')->toArray();
        foreach($name as $nm)
        {
            $tagz .= $nm.',';
        }
        $tags = array_unique(explode(',',$tagz));

        if(Setting::first()->is_blog == 0) return back();

        if($request->ajax()) return view('front.blog.list',['posts' => $this->repository->displayPosts($request)]);

		return view('front.blog.index',['posts' => $this->repository->displayPosts($request),
        'recent_posts'       => Post::orderby('id','desc')->take(4)->get(),
        'categories' => \App\Models\Bcategory::withCount('posts')->whereStatus(1)->get(),
        'tags'       => array_filter($tags)
        ]);


	}

    public function blogDetails($id)
    {
        $items = $this->repository->displayPost($id);

        return view('front.blog.show',[
            'post' => $items['post'],
            'categories' => $items['categories'],
            'tags' => $items['tags'],
            'posts' => $items['posts'],

        ]);
    }


// -------------------------------- FAQ ----------------------------------------

	public function faq()
	{
        if(Setting::first()->is_faq == 0){
            return back();
        }
        $fcategories =  Fcategory::whereStatus(1)->withCount('faqs')->latest('id')->get();
		return view('front.faq.index',['fcategories' => $fcategories]);
	}

	public function show($slug)
	{
        if(Setting::first()->is_faq == 0){
            return back();
        }
        $category =  Fcategory::whereSlug($slug)->first();
		return view('front.faq.show',['category' => $category]);
	}

// -------------------------------- FAQ ----------------------------------------

// -------------------------------- CAMPAIGN ----------------------------------------

	public function compaignProduct()
	{
        if(Setting::first()->is_campaign == 0){
            return back();
        }
        $compaign_items =  CampaignItem::whereStatus(1)->orderby('id','desc')->get();
		return view('front.campaign',['campaign_items' => $compaign_items]);
	}

// -------------------------------- CAMPAIGN ----------------------------------------


// -------------------------------- CURRENCY ----------------------------------------
    public function currency($id){
        Session::put('currency',$id);
        return back();
    }
// -------------------------------- CURRENCY ----------------------------------------


// -------------------------------- LANGUAGE ----------------------------------------
    public function language($id){
        Session::put('language',$id);
        return back();
    }
// -------------------------------- LANGUAGE ----------------------------------------


// -------------------------------- FAQ ----------------------------------------

public function page($slug)
{
    return view('front.page',[
        'page' => $this->repository->displayPage($slug)
    ]);
}

// -------------------------------- CONTACT ----------------------------------------

	public function contact()
	{
        if(Setting::first()->is_contact == 0){
            return back();
        }
		return view('front.contact');
	}

    public function contactEmail(Request $request)
    {
        $request->validate([
                'g-recaptcha-response' => 'required|captcha',
            'first_name' => 'required|max:50',
            'last_name' => 'required|max:50',
            'email' => 'required|email|max:50',
            'phone' => 'required|max:50',
           'message' => 'required|max:150|regex:/^[a-zA-Z0-9 ,.!?-]+$/',

        ]);
        $input = $request->all();

        $setting = Setting::first();
        $name  = $input['first_name'].' '.$input['last_name'];
        $subject = "Email From ".$name;
        $to = $setting->contact_email;
        $phone = $request->phone;
        $from = $request->email;
        $msg = "Name: ".$name."<br/>Email: ".$from."<br/>Phone: ".$phone."<br/>Message: ".$request->message;

        $emailData = [
            'to' => $to,
            'subject' => $subject,
            'body' => $msg,
        ];

        $email = new EmailHelper();
        $email->sendCustomMail($emailData);
        Session::flash('success',__('Thank you for contacting with us, we will get back to you shortly.'));
        return redirect()->back();
    }

// -------------------------------- REVIEW ----------------------------------------

    public function reviews()
    {
        return view('front.reviews');
    }

    public function topReviews()
    {
        return view('front.top-reviews');
    }

    public function reviewSubmit(ReviewRequest $request)
    {
        return response()->json($this->repository->reviewSubmit($request));
    }



// -------------------------------- SUBSCRIBE ----------------------------------------

    public function subscribeSubmit(SubscribeRequest $request)
    {
        Subscriber::create($request->all());
        return response()->json(__('You Have Subscribed Successfully.'));
    }


    // ---------------------------- TRACK ORDER ----------------------------------------//
    public function trackOrder()
    {
        return view('front.track_order');
    }

    public function track(Request $request)
    {
        $order = Order::where('transaction_number',$request->order_number)->first();

        if($order){
            return view('user.order.track',[
                'numbers' => 3,
                'track_orders' => TrackOrder::whereOrderId($order->id)->get()->toArray()
            ]);
        }else{
            return view('user.order.track',[
                'numbers' => 3,
                'error' => 1,
            ]);
        }
    }


    public function maintainance()
    {
        $setting = Setting::first();
        if($setting->is_maintainance == 0){
            return redirect(route('front.index'));
        }
        return view('front.maintainance');
    }



  public function brands()
    {
        if(Setting::first()->is_brands == 0){
            return back();
        }
        return view('front.brand',[
            'brands' => Brand::whereStatus(1)->orderBy('id', 'DESC')->get()
        ]);
    }

    public function finalize()
    {
        return redirect(route('front.index'));
    }


}
