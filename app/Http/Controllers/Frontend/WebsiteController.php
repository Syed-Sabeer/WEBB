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
		return view('frontend.services', ['services' => $this->services()]);
	}

	public function blog()
	{
		return view('frontend.blog');
	}

	public function portfolio()
	{
		return view('frontend.portfolio');
	}

	public function serviceDetail(?string $slug = null)
	{
		$services = $this->services();
		$service = collect($services)->firstWhere('slug', $slug) ?: $services[0];
		return view('frontend.service-detail', compact('service', 'services'));
	}

	private function services(): array
	{
		$items = [
			['mobile-app-development','MOBILE APP DEVELOPMENT','Your Next Great Idea Deserves the Attention of Our Mobile App Development Team.','We build intuitive, high-performance iOS and Android applications that turn ideas into engaging products.'],
			['website-app-development','WEBSITE APP DEVELOPMENT','Professional Web Application Development to uplift your ROI','Scalable, secure web applications designed around your workflows, customers, and growth goals.'],
			['ai-ml-development','AI/ML DEVELOPMENT SERVICES','Build robust, reliable software that meets your business needs.','From predictive models to intelligent automation, we make AI practical, measurable, and ready for production.'],
			['seo-content-writing','SEO & CONTENT WRITING','Take control of the digital world with SEO-optimized content.','Research-led content and technical SEO that improve visibility, authority, and qualified organic traffic.'],
			['digital-marketing','DIGITAL MARKETING','Reach your potential customers through social media and digital campaigns.','Performance marketing, social strategy, and conversion-focused campaigns that connect your brand with the right audience.'],
			['website-designing','WEBSITE DESIGNING','We merge aesthetics and creativity with business goals.','Brand-led interfaces and responsive websites that look distinctive and make every interaction easier.'],
			['it-consulting','IT CONSULTING','Unlock the power of technology to move your business forward.','Clear technology roadmaps, architecture guidance, and practical decisions that reduce risk and accelerate delivery.'],
			['it-outsourcing','IT OUTSOURCING','Empowering your business with expert IT outsourcing solutions.','Extend your team with dependable engineers and specialists who integrate with your process and culture.'],
			['blockchain-development','BLOCKCHAIN DEVELOPMENT','Revolutionizing industries through secure decentralized solutions.','Secure blockchain products, smart contracts, and decentralized platforms built for real-world value.'],
			['digital-commerce','DIGITAL COMMERCE','Revolutionize your business with seamless digital commerce experiences.','Flexible commerce platforms that simplify buying journeys, payments, inventory, and customer retention.'],
			['digital-transformation','DIGITAL TRANSFORMATION','Empowering your business with cutting-edge transformation strategies.','Modernize operations, connect data, and create a digital foundation built for continuous improvement.'],
			['emerging-technologies','EMERGING TECHNOLOGIES','Innovating with the latest technology to drive your business forward.','We evaluate and apply emerging technologies where they create useful, sustainable competitive advantage.'],
			['iot-development','IOT DEVELOPMENT','Empowering your business with smart connected IoT solutions.','Connected devices, dashboards, and intelligent workflows that turn real-world data into timely action.'],
			['software-testing','SOFTWARE TESTING','Ensuring flawless performance with comprehensive testing solutions.','Functional, automation, performance, and security testing that protects quality throughout the product lifecycle.'],
			['web-design','WEB DESIGN','Crafting visually stunning websites that elevate your online presence.','Strategic visual systems and conversion-focused web experiences that make your brand memorable.'],
		];
		return collect($items)->values()->map(function ($item, $index) { return ['slug'=>$item[0], 'title'=>$item[1], 'short'=>$item[2], 'description'=>$item[3], 'image'=>'FrontendAssets/img/home-2/service-0'.(($index % 3)+1).'.jpg', 'number'=>str_pad($index+1,2,'0',STR_PAD_LEFT)]; })->all();
	}

	public function blogDetail()
	{
		return view('frontend.blog-detail');
	}

}
