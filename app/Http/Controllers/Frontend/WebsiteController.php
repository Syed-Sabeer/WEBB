<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;
use App\Models\Blog;

class WebsiteController extends Controller
{
	public function index()
	{
		$latestBlogs = Blog::where('visibility', 1)->latest()->take(3)->get();
		return view('frontend.index', compact('latestBlogs'));
	}

	public function about()
	{
		return view('frontend.about');
	}

	public function contact()
	{
		return view('frontend.contact');
	}



    public function service()
	{
		return view('frontend.services');
	}

	public function blog()
	{
		return view('frontend.blog');
	}

	public function portfolio()
	{
		return view('frontend.portfolio');
	}

	public function serviceDetail()
	{
		return view('frontend.service-detail');
	}

	public function blogDetail()
	{
		return view('frontend.blog-detail');
	}

}
